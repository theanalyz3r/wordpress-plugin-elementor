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
 * Class Qordoba_Module_WPML
 */
class Qordoba_Module_WPML extends Qordoba_Module {

	/**
	 * @const string
	 */
	const POST_STATUS_INHERIT = 'inherit';
	/**
	 * @const string
	 */
	const POST_STATUS_PENDING = 'pending';
	/**
	 * @var array
	 */
	private $get_site_languages;

	/**
	 * Qordoba_Module_WPML constructor.
	 */
	public function __construct() {
		$this->translated_post_types = array( 'post' => 'post', 'page' => 'page' );
		$this->translated_taxonomies = array( 'category' => 'category', 'post_tag' => 'post_tag' );

		add_action( 'pll_save_strings_translations', array( $this, 'send_strings' ) );
		add_action( 'wp_ajax_qordoba_pll_download_strings', array( $this, 'qordoba_pll_download_strings' ) );
		add_action( 'qordoba_after_options_extra', array( $this, 'options_extra_content' ) );

		parent::__construct();
	}

	/**
	 * @return bool
	 */
	public static function plugin_enabled() {
		return defined( 'ICL_PLUGIN_INACTIVE' ) && ! ICL_PLUGIN_INACTIVE;
	}

	/**
	 * @param int|string $post_id
	 * @param string $language_code
	 * @param array $translation
	 *
	 * @return bool|int|WP_Error
	 */
	public function save_post_translation( $post_id, $language_code, $translation ) {
		global $sitepress;

		$post_id = (int) $sitepress->get_object_id( $post_id );

		if ( $language_code === $this->project_lang ) {
			return false;
		}

		$source_id = $this->get_source_post_id( $post_id );
		$source    = get_post( $source_id );

		if ( ! $source_id || ! $source || is_wp_error( $source ) ) {
			return false;
		}

		$defaults = array(
			'post_title'   => $source->post_title,
			'post_content' => '',
			'post_excerpt' => '',
			'post_type'    => 'post',
			'post_status'  => self::POST_STATUS_PENDING,
		);

		$translation = wp_parse_args( $translation, $defaults );

		$translated_post    = array(
			'ID'           => null,
			'post_title'   => $translation['post_title'],
			'post_content' => $translation['post_content'],
			'post_excerpt' => $translation['post_excerpt'],
			'post_type'    => $source->post_type,
		);
		$translated_post_id = $sitepress->get_object_id( $post_id, $source->post_type, false, $language_code );
		if ( $translated_post_id ) {
			$translated_post['ID'] = $translated_post_id;
			if ( isset( $translation['elementor'] ) ) {
				$this->save_elementor_data( $translated_post_id, $translation['elementor'] );
			}

			if ( isset( $translation['custom_fields'] ) ) {
				$this->save_translated_meta( $translated_post_id, $translation['custom_fields'] );
			}

			wp_update_post( $translated_post );
		} else {
			$translated_post['post_status'] = self::POST_STATUS_PENDING;
			$translated_post_id             = wp_insert_post( $translated_post );
			if ( $translated_post_id ) {
				$trid = $sitepress->get_element_trid( $source_id, 'post_' . $source->post_type );
				$sitepress->set_element_language_details(
					$translated_post_id,
					'post_' . $source->post_type,
					$trid,
					$language_code,
					$this->get_default_language(),
					false
				);
				$sitepress->copy_custom_fields($source_id, $translated_post_id);
				if ( isset( $translation['elementor'] ) ) {
					$this->save_elementor_data( $translated_post_id, $translation['elementor'] );
				}

				if ( isset( $translation['custom_fields'] ) ) {
					$this->save_translated_meta( $translated_post_id, $translation['custom_fields'] );
				}
			}
		}

		return $translated_post_id;
	}

	/**
	 * @param int $translation_id
	 *
	 * @return mixed
	 */
	public function get_source_post_id( $translation_id ) {
		global $sitepress;

		return $sitepress->get_object_id( $translation_id );
	}

	/**
	 * @param $post_id
	 * @param array $data
	 *
	 * @return array
	 */
	public function save_elementor_data( $post_id, array $data = array() ) {
		$elementor_post_meta = get_post_meta( $post_id, '_elementor_data' );
		$source_id           = $this->get_source_post_id( $post_id );
		$elementor_data      = array();
		if ( ! $elementor_post_meta ) {
			$elementor_post_meta = get_post_meta( $source_id, '_elementor_data' );
		}
		if ( is_array( $elementor_post_meta ) && isset( $elementor_post_meta[0] ) ) {
			$sourceMeta = json_decode( $elementor_post_meta[0], true );
			if ( ! $sourceMeta ) {
				$sourceMeta = maybe_unserialize( $elementor_post_meta[0] );
			}
			foreach ( $data as $key => $value ) {
				$tmp = explode( '_', $key );
				if ( isset( $tmp[0] ) ) {
					$id = $tmp[0];
					if ( isset( $tmp[1], $tmp[2] ) ) {
						$name                           = $tmp[1] . '_' . $tmp[2];
						$elementor_data[ $id ][ $name ] = $value;
					}
					if ( isset( $tmp[1] ) && ! isset( $tmp[2] ) ) {
						$name                           = $tmp[1];
						$elementor_data[ $id ][ $name ] = $value;
					}
				}
			}
			foreach ( $elementor_data as $dataKey => $dataItem ) {
				$this->recursive_meta_replays( $sourceMeta, $dataKey, $dataItem );
			}
			if ( 0 < count( $sourceMeta ) ) {
				update_post_meta( $post_id, '_elementor_data', $sourceMeta );
			}
		}

		return $elementor_data;
	}

	/**
	 * @param $source
	 * @param $id
	 * @param array $replacement
	 */
	private function recursive_meta_replays( &$source, $id, $replacement = array() ) {
		foreach ( $source as &$element ) {
			if ( isset( $element['id'] ) && ( $id === $element['id'] ) ) {
				if ( isset( $replacement['title_text'] ) ) {
					$element['settings']['title_text'] = $replacement['title_text'];
				}
				if ( isset( $replacement['text'] ) ) {
					$element['settings']['text'] = $replacement['text'];
				}
				if ( isset( $replacement['title'] ) ) {
					$element['settings']['title'] = $replacement['title'];
				}
				if ( isset( $replacement['description_text'] ) ) {
					$element['settings']['description_text'] = $replacement['description_text'];
				}
				if ( isset( $replacement['editor'] ) ) {
					$element['settings']['editor'] = $replacement['editor'];
				}
				if ( isset( $replacement['testimonial_content'] ) ) {
					$element['settings']['testimonial_content'] = $replacement['testimonial_content'];
				}
				if ( isset( $replacement['html'] ) ) {
					$element['settings']['html'] = $replacement['html'];
				}
				if ( isset( $replacement['testimonial_name'] ) ) {
					$element['settings']['testimonial_name'] = $replacement['testimonial_name'];
				}
			}
			if ( isset( $element['elements'] ) ) {
				$this->recursive_meta_replays( $element['elements'], $id, $replacement );
			}
			if ( isset( $element[0] ) ) {
				foreach ( $element as &$item ) {
					if ( isset( $item['elements'] ) && count( $item['elements'] ) ) {
						$this->recursive_meta_replays( $item['elements'], $id, $replacement );
					}
				}
			}
		}
	}

	/**
	 * Saves translated meta data
	 *
	 * @param int $tr_id ID of translation in the appropriate language
	 * @param array $meta array of meta data where meta keys are indexes:
	 *   'meta_key' => array('value 1', 'value2')
	 * @param string $object_type
	 */
	public function save_translated_meta( $tr_id, $meta, $object_type = Qordoba_Object::OBJECT_TYPE_POST ) {

		if ( empty( $meta ) || ! is_array( $meta ) ) {
			return;
		}

		foreach ( $meta as $key => $values ) {
			if ( empty( $key ) ) {
				continue;
			}

			$values = (array) $values;

			if ( Qordoba_Object::OBJECT_TYPE_POST === $object_type ) {
				get_post_meta( $tr_id, $key );
				delete_post_meta( $tr_id, $key );
			} elseif ( Qordoba_Object::OBJECT_TYPE_TERM === $object_type ) {
				get_term_meta( $tr_id, $key );
				delete_term_meta( $tr_id, $key );
			}

			foreach ( $values as $index => $value ) {
				if ( Qordoba_Object::OBJECT_TYPE_POST === $object_type ) {
					add_post_meta( $tr_id, $key, $value, true );
				} elseif ( Qordoba_Object::OBJECT_TYPE_TERM === $object_type ) {
					add_term_meta( $tr_id, $key, $value );
				}
			}
		}
	}

	/**
	 * @param string $field
	 *
	 * @return bool
	 */
	public function get_default_language( $field = 'slug' ) {
		global $sitepress;

		return $sitepress->get_default_language();
	}

	/**
	 * @param $post_id
	 * @param $lang
	 */
	public function get_post_translation( $post_id, $lang ) {
		return array();
	}

	/**
	 * @param $term_id
	 * @param $lang
	 * @param $translation
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function save_term_translation( $term_id, $lang, $translation ) {
		$term_id = (int) $term_id;

		if ( $lang === $this->project_lang ) {
			return false;
		}

		$source_id = $this->get_source_term_id( $term_id );
		$source    = get_term( $source_id );

		if ( ! $source_id || ! $source || is_wp_error( $source ) ) {
			return false;
		}

		$tr_term = array(
			'name'        => ! empty( $translation['name'] ) ? $translation['name'] : $source->name,
			'description' => ! empty( $translation['description'] ) ? $translation['description'] : $source->description,
		);

//		if ( $tr_term_id = PLL()->model->term->get( $source_id, $lang ) ) {
//			if ( isset( $translation['custom_fields'] ) ) {
//				$this->save_translated_meta( $tr_term_id, $translation['custom_fields'], 'term' );
//			}
//
//			wp_update_term( $tr_term_id, $source->taxonomy, $tr_term );
//		} else {
//			if ( $source->parent && $tr_parent = PLL()->model->term->get_translation( $source->parent, $lang ) ) {
//				$tr_term['parent'] = $tr_parent;
//			}
//
//			$tr_term['slug'] = sanitize_title( $tr_term['name'] );
//
//			if ( term_exists( $tr_term['slug'], $source->taxonomy ) ) {
//				$tr_term['slug'] .= "-$lang";
//			}
//
//			$i    = 0;
//			$slug = $tr_term['slug'];
//
//			while ( term_exists( $tr_term['slug'], $source->taxonomy ) && $i < 100 ) {
//				$i ++;
//				$tr_term['slug'] = $slug . "-$i";
//			}
//
//			$tr_term_object = wp_insert_term( $tr_term['name'], $source->taxonomy, $tr_term );
//
//			if ( ! is_wp_error( $tr_term_object ) ) {
//				$tr_term_id = $tr_term_object['term_id'];
//
//				PLL()->model->term->set_language( $tr_term_object['term_id'], $lang );
//
//				$source_translations          = PLL()->model->term->get_translations( $source_id );
//				$source_translations[ $lang ] = $tr_term_id;
//
//				PLL()->model->term->save_translations( $source_id, $source_translations );
//			} else {
//				throw new Exception( $tr_term_object->get_error_message() );
//			}
//		}

//		return $tr_term_id;
	}

	/**
	 * @param $translation_id
	 *
	 * @return mixed
	 */
	public function get_source_term_id( $translation_id ) {
		global $sitepress;

		return $sitepress->get_object_id( $translation_id );
	}

	/**
	 * @param $post_id
	 *
	 * @return array
	 */
	public function get_post_languages( $post_id ) {
		return array();
	}

	/**
	 * @param bool $include_project_lang
	 *
	 * @return null
	 */
	public function get_site_languages( $include_project_lang = true ) {
		global $sitepress;
		if ( ! $this->site_languages ) {
			$languages = $sitepress->get_active_languages();

			$this->get_site_languages = array();

			foreach ( $languages as $i => $language ) {
				if ( isset( $language['code'] ) && ( $language['code'] === $this->project_lang ) ) {
					continue;
				}
				$this->site_languages[ $language ] = $this->site_languages[ $i ] = array(
					'id'     => $language['code'],
					'name'   => $language['english_name'],
					'locale' => strtolower( $language['default_locale'] ),
				);
			}
		}

		return $this->site_languages;
	}

	/**
	 * @return string
	 */
	public function get_menu_parent_slug() {
		return 'sitepress-multilingual-cms/menu/languages.php';
	}

	/**
	 *
	 * @throws Exception
	 * @throws \Qordoba\Exception\DocumentException
	 */
	public function send_strings() {
//		$strings = PLL_Admin_Strings::get_strings();

		$version = $this->get_strings_version();
		$version ++;

		$document = qor()->new_qordoba_document( Qordoba_Object::OBJECT_DATA_TYPE_JSON );
		$document->setName( 'site-strings' );
		$document->setTag( (string) $version );
//		$sections = array_fill_keys( wp_list_pluck( $strings, 'context' ), null );
//
//		foreach ( $sections as $context => $section ) {
//			$sections[ $context ] = $document->addSection( $context );
//		}
//
//		foreach ( $strings as $id => $string ) {
//			$sections[ $string['context'] ]->addTranslationString( $id, $string['string'] );
//		}

		$document->createTranslation();

		update_option( 'qor_strings_version', $version );

	}

	/**
	 * @return int
	 */
	public function get_strings_version() {
		return (int) get_option( 'qor_strings_version' );
	}

	/**
	 *
	 */
	public function qordoba_pll_download_strings() {
		if ( ! check_ajax_referer( 'qordoba_send_bulk',
				'qor_nonce',
				false ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json( array(
				'error'        => true,
				'errorMessage' => __( 'Access denied or your session has expired.' ),
			) );

			wp_die();
		}

		try {
			$updated_languages = $this->download_string_translations();
		} catch ( Exception $e ) {
			wp_send_json( array(
				'error'        => true,
				'errorMessage' => $e->getMessage(),
			) );
		}

		wp_send_json(
			array(
				'error'     => false,
				'languages' => $updated_languages,
				'updated'   => count( $updated_languages ),
				'total'     => 0,
			)
		);
	}

	/**
	 * @return array
	 * @throws Exception
	 */
	public function download_string_translations() {
		$updated_languages = array();

//		$strings = PLL_Admin_Strings::get_strings();

		$version = $this->get_strings_version();

		$document = qor()->new_qordoba_document( Qordoba_Object::OBJECT_DATA_TYPE_JSON );
		$document->setName( 'site-strings' );
		$document->setTag( (string) $version );


		$languages = $document->fetchTranslation();

		foreach ( $languages as $language => $context ) {

			if ( ! $lang = qor()->map_qordoba_lang( $language ) ) {
				continue;
			}

//			$lang = PLL()->model->get_language( $lang );

//			$mo = new PLL_MO();
//			$mo->import_from_db( $lang );

//			foreach ( $context as $translations ) {
//				foreach ( $translations as $key => $translation ) {
//					if ( isset( $strings[ $key ] ) ) {
//						$mo->add_entry( $mo->make_entry( $strings[ $key ]['string'], $translation ) );
//						$updated_languages[ $lang->slug ] = $lang->name;
//					}
//
//				}
//			}
//
//			$mo->export_to_db( $lang );
		}

		return $updated_languages;
	}

	/**
	 * @param $lang
	 * @param array $extra_args
	 *
	 * @return array
	 */
	public function get_posts_by_lang( $lang, $extra_args = array() ) {
		$extra_args['lang'] = trim( $lang );

		return parent::get_posts_by_lang( $lang, $extra_args );
	}

	/**
	 * @param $lang
	 * @param array $extra_args
	 *
	 * @return array|int|WP_Error
	 */
	public function get_terms_by_lang( $lang, $extra_args = array() ) {
		$extra_args['lang'] = trim( $lang );

		return parent::get_terms_by_lang( $lang, $extra_args );
	}

	/**
	 *
	 */
	public function options_extra_content() {
		qor()->view(
			'views/modules/wpml/options-extra',
			array(
				'version' => $this->get_strings_version(),
			)
		);
	}
}
