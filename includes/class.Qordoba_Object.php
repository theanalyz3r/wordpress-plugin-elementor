<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

/**
 * Class Qordoba_Object
 */
class Qordoba_Object {

	/**
	 * @const string
	 */
	const DOCUMENT_TITLE_SEPARATOR = '-';
	/**
	 * @const string
	 */
	const CUSTOM_FIELD_DIVIDER = '_';
	/**
	 *
	 */
	const OBJECT_TYPE_POST = 'post';
	/**
	 *
	 */
	const OBJECT_TYPE_TERM = 'term';
	/**
	 *
	 */
	const OBJECT_DATA_TYPE_JSON = 'json';
	/**
	 *
	 */
	const OBJECT_DATA_TYPE_HTML = 'html';

	/**
	 * @var null
	 */
	protected $document = null;
	/**
	 * @var bool
	 */
	protected $loaded = false;
	/**
	 * @var null|WP_Post|WP_Term
	 */
	protected $object = null;
	/**
	 * @var int|null
	 */
	protected $object_id = null;
	/**
	 * @var null|string
	 */
	protected $object_type = null;
	/**
	 * @var null|string
	 */
	protected $object_name = null;
	/**
	 * @var array
	 */
	protected $sent_documents = array();
	/**
	 * @var int
	 */
	protected $version = 0;
	/**
	 * @var array
	 */
	protected $meta = array();

	/**
	 * @var array
	 */
	protected $translated_meta = array();

	/**
	 * Qordoba_Object constructor.
	 *
	 * @param $object
	 * @param array $additional_meta
	 *
	 * @throws Exception
	 */
	public function __construct( $object, $additional_meta = array() ) {

		if ( $object instanceof WP_Post ) {
			$this->translated_meta = apply_filters( "qor_translated_{$object->post_type}_meta", qor()->options()->get( 'post_fields' ) );
			$this->object_type     = self::OBJECT_TYPE_POST;
			$this->object_name     = $object->post_title . ' ' . $object->post_type;
			$this->object_id       = $object->ID;
			$this->meta            = $additional_meta;
		} elseif ( $object instanceof WP_Term ) {
			$this->translated_meta = apply_filters( "qor_translated_{$object->taxonomy}_meta", qor()->options()->get( 'term_fields' ) );
			$this->object_type     = self::OBJECT_TYPE_TERM;
			$this->object_name     = $object->taxonomy;
			$this->object_id       = $object->term_id;
			$this->meta            = $additional_meta;
		} else {
			throw new Exception( 'Invalid $object, should be an instance of either WP_Post or WP_Term' );
		}

		if ( ! $this->translated_meta || ! is_array( $this->translated_meta ) ) {
			$this->translated_meta = array();
		}

		$this->object = $object;

		$this->version = (int) $this->get_meta( '_qor_version', true );
	}

	/**
	 * @param null $language
	 *
	 * @return array
	 */
	public function download_bak( $language = null ) {
		$this->document->setTag( $this->version );
		$translations = $this->document->fetchTranslation( $language );

		$result = array();

		foreach ( $translations as $lang => $translation ) {
			$result[ $lang ] = array();

			foreach ( $translation as $section => $content ) {
				if ( 'custom_fields' == $section ) {
					$content = $this->parse_custom_fields( $content );
				}

				$result[ $lang ][ $section ] = is_object( $content ) ? (array) $content : $content;
			}
		}

		return $result;
	}

	/**
	 * @param null $language
	 *
	 * @return array
	 * @throws Exception
	 */
	public function download( $language = null ) {
		$result = array();

		$sent_documents = $this->get_meta( '_qor_sent_docs', true );
		$fields         = $this->get_fields();
		$elementorData  = $this->download_document(
			$this->format_custom_field( 'elementor', $this->version ), null, self::OBJECT_DATA_TYPE_JSON
		);
		foreach ( $fields as $field ) {
			$document_name = $this->format_object_field( $field );
			if ( in_array( $document_name, $sent_documents ) ) {
				$translations = $this->download_document( $document_name );
				foreach ( $translations as $lang => $translation ) {
					if ( ! isset( $result[ $lang ] ) ) {
						$result[ $lang ] = array();
					}
					$result[ $lang ][ $field ] = trim( wp_kses( $translation, wp_kses_allowed_html( self::OBJECT_TYPE_POST ) ) );
				}

			}
		}
		if ( $elementorData && ( 0 < count( $elementorData ) ) ) {
			foreach ( $elementorData as $lang => $translation ) {
				if ( ! isset( $result[ $lang ] ) ) {
					$result[ $lang ] = array();
				}
				$result[ $lang ]['elementor'] = $translation;
			}
		}
		$this->download_custom_fields( $result );

		return $result;
	}

	/**
	 * @return int
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * @param $custom_fields
	 *
	 * @return array
	 */
	protected function parse_custom_fields( $custom_fields ) {
		$result = array();

		foreach ( $custom_fields as $name => $value ) {
			if ( 1 === preg_match( '/(.*)_(\d+)$/', $name, $matches ) ) {
				$meta_key = $matches[1];
				$i        = $matches[2];
				if ( ! isset( $result[ $meta_key ] ) ) {
					$result[ $meta_key ] = array();
				}
				$result[ $meta_key ][ $i ] = $value;
			}

		}

		return $result;
	}

	/**
	 *
	 */
	public function upload() {
		$this->version ++;
		$this->update_meta( '_qor_version', $this->version );
		$format = ( 0 < count( $this->meta ) ) ? self::OBJECT_DATA_TYPE_JSON : self::OBJECT_DATA_TYPE_HTML;

		$fields               = $this->get_fields();
		$this->sent_documents = array();

		foreach ( $fields as $field ) {
			$name = $this->format_object_field( $field );
			if ( isset( $this->object->{$field} ) && ! empty( $this->object->{$field} ) ) {
				$this->send_document( $name, $this->object->{$field} );
			}
		}
		$this->send_custom_fields( $format );
		$this->update_meta( '_qor_sent_docs', $this->sent_documents );
	}

	/**
	 * @param string $field
	 *
	 * @return string
	 */
	protected function format_object_field( $field ) {
		return $this->sanitize_name( sprintf( '%s-%d-%s', $this->object_name, $this->object_id, $field ) );
	}

	/**
	 * @param string $field
	 * @param int $index
	 *
	 * @return string
	 */
	protected function format_custom_field( $field, $index ) {
		return $this->sanitize_name(
			sprintf( '%s-%d_custom-field-%s-%d', $this->object_name, $this->object_id, $field, $index )
		);
	}

	/**
	 * @param string $field
	 * @param int $index
	 *
	 * @return string
	 */
	protected function format_custom_field_key( $field, $index ) {
		return $this->sanitize_name( sprintf( '%s-%d', $field, $index ) );
	}

	/**
	 * @return array
	 */
	protected function get_fields() {
		$fields = array();

		if ( self::OBJECT_TYPE_POST === $this->object_type ) {
			$fields = apply_filters( "qor_translated_{$this->object->post_type}_fields", array(
				'post_title',
				'post_content',
				'post_excerpt'
			) );
			$fields = array_unique( $fields );

		} elseif ( self::OBJECT_TYPE_TERM == $this->object_type ) {
			$fields = apply_filters( "qor_translated_{$this->object->taxonomy}_fields", array(
				'name',
				'description'
			) );
			$fields = array_unique( $fields );
		}

		return $fields;
	}

	/**
	 * @param $name
	 *
	 * @return mixed
	 */
	protected function sanitize_name( $name ) {
		return preg_replace( '/[^a-zA-Z0-9]/', self::DOCUMENT_TITLE_SEPARATOR, $name );
	}

	/**
	 * @param $name
	 * @param $content
	 * @param string $type
	 *
	 * @throws Exception
	 * @throws \Qordoba\Exception\DocumentException
	 */
	protected function send_document( $name, $content, $type = 'html' ) {
		$name = $this->sanitize_name( $name );

		if ( empty( $content ) ) {
			return;
		}

		$document = qor()->new_qordoba_document( $type );
		$document->setName( $name );
		$document->setTag( (string) $this->version );

		if ( Qordoba_Object::OBJECT_DATA_TYPE_JSON === $type && ( 0 < count( $this->meta ) ) ) {
			foreach ( $this->meta as $key => $item ) {
				$document->addTranslationString( $key, $item );
			}
			$document->createTranslation();
		} else {
			$document->addTranslationContent( $content );
			$document->createTranslation();
		}

		$this->sent_documents[] = $name;
	}

	/**
	 * @param $name
	 * @param null $language
	 * @param string $type
	 *
	 * @return array
	 * @throws Exception
	 */
	protected function download_document( $name, $language = null, $type = self::OBJECT_DATA_TYPE_HTML ) {
		$name     = $this->sanitize_name( $name );
		$document = qor()->new_qordoba_document( $type );
		$document->setName( $name );
		$document->setTag( (string) $this->version );

		return $document->fetchTranslation();
	}

	/**
	 * @param array $meta
	 * @param string $field
	 *
	 * @return string
	 */
	protected function get_key_by_field($meta = array(), $field = '') {
		$translate_field_key = '';
		if ('' !== $field) {
			foreach ($meta as $key => $value) {
				if (isset($value[0]) && ($value[0] === $field)) {
					$translate_field_key = ltrim($key, self::CUSTOM_FIELD_DIVIDER);
					break;
				}
			}
		}
		return $translate_field_key;
	}

	/**
	 * @param string $type
	 *
	 * @throws Exception
	 * @throws \Qordoba\Exception\DocumentException
	 */
	protected function send_custom_fields( $type = self::OBJECT_DATA_TYPE_HTML ) {

		if ( is_array( $this->meta ) && ( 0 < count( $this->meta ) ) ) {
			$this->send_document( $this->format_custom_field( 'elementor', $this->version ), $this->meta, self::OBJECT_DATA_TYPE_JSON );
		}

		if ( Qordoba_Custom_Fields_Table::is_acf_plugin_exist() ) {
			$meta = $this->get_meta();

			if ( ! $meta || ( 0 === count( $meta ) ) ) {
				return;
			}

			$document = qor()->new_qordoba_document( Qordoba_Object::OBJECT_DATA_TYPE_JSON );
			$document->setName( $this->get_custom_fields_document_name() );
			if ( $this->translated_meta ) {
				$translate_item_count = 0;
				$keys = array();
				foreach ( $this->translated_meta as $field ) {
					$keys[] = $this->get_key_by_field( $meta, $field );
				}

				foreach ( $meta as $key => $value ) {
					if ( in_array( $key, $keys ) ) {
						++ $translate_item_count;
						$document->addTranslationString( $key, $value );
					}
				}
				if ( 0 < $translate_item_count ) {
					$document->setTag( (string) $this->version );
					$document->createTranslation();
				}
			}



		} else {
			$meta = $this->get_meta();
			$meta = array_intersect_key( $meta, array_flip( $this->translated_meta ) );
			if ( ! $meta || ( 0 === count( $meta ) ) ) {
				return;
			}

			$document = qor()->new_qordoba_document( self::OBJECT_DATA_TYPE_JSON );
			$document->setName( $this->get_custom_fields_document_name() );
			foreach ( $meta as $key => $values ) {
				foreach ( $values as $i => $value ) {
					$document->addTranslationString( $this->format_custom_field_key( $key, $i ), $value );
				}
			}
			$document->setTag( (string) $this->version );
			$document->createTranslation();
		}
	}

	/**
	 * @param $result
	 *
	 * @return array
	 * @throws Exception
	 */
	protected function download_custom_fields( &$result ) {
		$meta = $this->get_meta();

		if ( Qordoba_Custom_Fields_Table::is_acf_plugin_exist() ) {
			if ( ! $meta && empty( $result ) ) {
				return array();
			}
			$document_name      = $this->get_custom_fields_document_name();
			$field_translations = $this->download_document( $document_name, null, self::OBJECT_DATA_TYPE_JSON );
			foreach ( $field_translations as $lang => $translations ) {
				foreach ( $translations as $translation_key => $translation_value ) {
					$custom_field_key = $this->get_custom_field_key( $translation_key );
					if ( '' !== $custom_field_key ) {
						$result[ $lang ]['custom_fields'][ (string) $custom_field_key ] = $translation_value;
					}
				}
			}
		} else {
			if ( ! $meta && empty( $result ) ) {
				return array();
			}

			$meta               = array_intersect_key( $meta, array_flip( $this->translated_meta ) );
			$document_name      = $this->get_custom_fields_document_name();
			$field_translations = $this->download_document( $document_name, null, self::OBJECT_DATA_TYPE_JSON );

			foreach ( $meta as $key => $values ) {
				foreach ( $result as $lang => $translated_object ) {
					$result[ $lang ]['custom_fields'] = array();
				}
			}
			foreach ( $field_translations as $lang => $translations ) {
				foreach ( $translations as $translation_key => $translation_value ) {
					$custom_field_key = $this->get_custom_field_key( $translation_key );
					if ( '' !== $custom_field_key ) {
						$result[ $lang ]['custom_fields'][ $custom_field_key ] = $translation_value;
					}
				}
			}
		}
	}

	/**
	 * @param string $title
	 *
	 * @return string
	 */
	protected function get_custom_field_key( $title = '' ) {
		$titleRow = explode( self::DOCUMENT_TITLE_SEPARATOR, $title );
		if ( empty( $titleRow[ count( $titleRow ) - 1 ] ) ) {
			unset( $titleRow[ count( $titleRow ) - 1 ] );
		}

		return implode( self::CUSTOM_FIELD_DIVIDER, $titleRow );
	}

	/**
	 * @param bool $key
	 * @param bool $single
	 *
	 * @return mixed
	 */
	public function get_meta( $key = false, $single = false ) {
		return call_user_func( "get_{$this->object_type}_meta", $this->object_id, $key, $single );
	}

	/**
	 * @param $key
	 * @param $value
	 * @param string $prev_value
	 *
	 * @return mixed
	 */
	public function update_meta( $key, $value, $prev_value = '' ) {
		return call_user_func( "update_{$this->object_type}_meta", $this->object_id, $key, $value, $prev_value );
	}

	/**
	 * @param $key
	 * @param string $value
	 *
	 * @return mixed
	 */
	public function delete_meta( $key, $value = '' ) {
		return call_user_func( "delete_{$this->object_type}_meta", $this->object_id, $key, $value );
	}

	/**
	 * @return mixed
	 */
	protected function get_custom_fields_document_name() {

		return $this->sanitize_name( $this->object->post_title . ' ' . $this->object->ID . ' ' . 'custom-fields' );
	}
}