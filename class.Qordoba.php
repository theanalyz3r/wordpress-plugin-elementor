<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use Qordoba\Document;

/**
 * Class Qordoba
 */
class Qordoba {
	/**
	 * @var Qordoba
	 */
	private static $instance;

	/**
	 * @var null
	 */
	protected $_module;

	/**
	 * @var false|Qordoba_Options
	 */
	protected $options;

	/**
	 * @var array
	 */
	protected $modules = array(
		'Polylang' => 'Qordoba_Module_Polylang',
		'WPML'      => 'Qordoba_Module_WPML',
	);

	/**
	 * @var Document
	 */
	protected $_api = null;

	/**
	 * @var null|Qordoba_Actions
	 */
	public $actions = null;

	/**
	 * Qordoba constructor.
	 */
	private function __construct() {
		if ( is_admin() ) {
			add_action( 'wp_loaded', array( $this, 'init' ) );
		}

		$this->options = new Qordoba_Options();
		$this->actions = new Qordoba_Actions();
	}

	/**
	 *
	 */
	private function __clone() {
	}

	/**
	 * @return null|Qordoba
	 */
	public static function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 *
	 */
	public function init() {
		$this->modules = apply_filters( 'qordoba_available_modules', $this->modules );
		$this->load_module();
	}

	/**
	 * @return null|Qordoba_Module_Default
	 */
	protected function load_module() {
		if ( null !== $this->_module ) {
			return $this->_module;
		}

		foreach ( $this->modules as $name => $module ) {
			if ( ! class_exists( $module ) ) {
				continue;
			}

			if ( true === call_user_func( array( $module, 'plugin_enabled' ) ) ) {
				return $this->_module = new $module();
			}
		}

		require_once QORDOBA_PLUGIN_DIR . '/modules/class.Qordoba_Module_Default.php';

		return $this->_module = new Qordoba_Module_Default();
	}

	/**
	 * @return null|Qordoba_Options
	 */
	public function options() {
		return $this->options;
	}

	/**
	 * @return bool
	 */
	public function get_project_language() {
		$project = $this->get_project_meta_data();

		if ( $project ) {
			return $this->map_qordoba_lang( $project->source_language->code );
		} else {
			return false;
		}
	}

	/**
	 * @return null|Qordoba_Module_Default
	 */
	public function module() {
		return $this->load_module();
	}

	/**
	 * @return array
	 */
	public function get_modules() {
		return $this->modules;
	}

	/**
	 * @return null|Document
	 * @throws Exception
	 */
	public function api() {
		if ( null !== $this->_api ) {
			return $this->_api;
		}

		return $this->_api = $this->new_qordoba_document();
	}

	/**
	 * @return array
	 */
	public function get_project_languages() {
		$project_meta = $this->get_project_meta_data();

		if ( is_object( $project_meta ) && property_exists( $project_meta, 'target_languages' ) ) {
			return $this->get_project_meta_data()->target_languages;
		}

		return array();
	}

	/**
	 * @return bool|mixed
	 */
	public function get_project_meta_data() {
		if ( ! $this->qordoba_api_configured() ) {
			return false;
		}

		$project = get_transient( 'qor_project_metadata' );

		if ( false === $project || $project->id != $this->options->get( 'project_id' ) || $project->organization_id != $this->options->get( 'organization_id' ) ) {
			try {
				$project = $this->api()->getProject()->getMetadata()->project;
				set_transient( 'qor_project_metadata', $project, HOUR_IN_SECONDS );
			} catch ( Exception $e ) {
				return false;
			}

		}

		return $project;
	}

	/**
	 * @param null $object_id
	 * @param string $object_type
	 *
	 * @return bool
	 */
	public function current_user_can_translate( $object_id = null, $object_type = 'post' ) {
		return current_user_can( 'manage_options' );
	}

	/**
	 * @return bool
	 */
	public function qordoba_api_configured() {
		return $this->options->get( 'login' ) && $this->options->get( 'password' ) && $this->options->get( 'project_id' ) && $this->options->get( 'organization_id' );
	}

	/**
	 * @param string $type
	 *
	 * @return Document
	 * @throws Exception
	 */
	public function new_qordoba_document( $type = Qordoba_Object::OBJECT_DATA_TYPE_HTML ) {
		if ( ! $this->qordoba_api_configured() ) {
			throw new Exception( 'Missing Qordoba API configuration (login, password, organization id or project id)' );
		}

		$document = new Qordoba\Document(
			QORDOBA_API_URL,
			$this->options->get( 'login' ),
			$this->options->get( 'password' ),
			$this->options->get( 'project_id' ),
			$this->options->get( 'organization_id' )
		);

		$document->setType( $type );

		return $document;
	}

	/**
	 * @param $qordoba_lang
	 *
	 * @return bool
	 */
	public function map_qordoba_lang( $qordoba_lang ) {
		$languages = $this->options->get( 'languages' );

		if ( ! array( $languages ) || empty( $languages ) ) {
			return false;
		}

		$languages = array_flip( $languages );

		// return language that module will understand
		return isset( $languages[ $qordoba_lang ] ) ? $languages[ $qordoba_lang ] : false;
	}

	/**
	 * @param $module_lang
	 *
	 * @return bool
	 */
	public function map_module_lang( $module_lang ) {
		$languages = $this->options->get( 'languages' );

		if ( ! array( $languages ) || empty( $languages ) ) {
			return false;
		}

		return isset( $languages[ $module_lang ] ) ? $languages[ $module_lang ] : false;
	}

	/**
	 * @param $post_id
	 * @param bool $languages
	 *
	 * @return bool
	 */
	public function send_post( $post_id, $languages = false ) {
		$flatMetaData = array();
		$source_id    = $this->module()->get_source_post_id( $post_id );
		$source_post  = get_post( $source_id );

		if ( ! $source_id || ! $source_post || is_wp_error( $source_post ) ) {
			return false;
		}

		if ( $this->is_elementor_plugin_exists() ) {

			$meta     = $this->get_post_meta_data( $post_id );
			$metaData = array();

			if ( is_array( $meta ) && 0 < count( $meta ) ) {

				foreach ( $meta as $item ) {
					$itemData     = is_string( $item ) ? json_decode( $item, true ) : $item;
					$metaData[]   = $this->recursive_meta_parser( $itemData );
					$flatMetaData = call_user_func_array( 'array_merge', $metaData );
				}
				$object = new Qordoba_Object( $source_post, $this->prepare_meta_data( $flatMetaData ) );
				$object->upload();

			} else {
				$object = new Qordoba_Object( $source_post );
				$object->upload();
			}
		} else {
			$object = new Qordoba_Object( $source_post );
			$object->upload();
		}

		update_post_meta( $source_id, '_qor_queued', current_time( 'timestamp' ) );
		delete_post_meta( $source_id, '_qor_updated' );
	}

	/**
	 * @param array $elements
	 *
	 * @return array
	 */
	private function prepare_meta_data( $elements = array() ) {
		$qordoba_meta_data = array();
		foreach ( $elements as $id => $item ) {
			if ( isset( $item['title'] ) ) {
				$qordoba_meta_data[ $id . "_title" ] = trim( strip_tags( $item['title'] ) );
			}
			if ( isset( $item['title_text'] ) ) {
				$qordoba_meta_data[ $id . "_title_text" ] = trim( $item['title_text'] );
			}
			if ( isset( $item['text'] ) ) {
				$qordoba_meta_data[ $id . "_text" ] = trim( $item['text'] );
			}
			if ( isset( $item['description_text'] ) ) {
				$qordoba_meta_data[ $id . "_description_text" ] = trim( $item['description_text'] );
			}
			if ( isset( $item['description'] ) ) {
				$qordoba_meta_data[ $id . "_description" ] = trim( $item['description'] );
			}
			if ( isset( $item['editor'] ) ) {
				$qordoba_meta_data[ $id . "_editor" ] = trim( $item['editor'] );
			}
			if ( isset( $item['testimonial_name'] ) ) {
				$qordoba_meta_data[ $id . "_testimonial_name" ] = trim( strip_tags( $item['testimonial_name'] ) );
			}
			if ( isset( $item['testimonial_content'] ) ) {
				$qordoba_meta_data[ $id . "_testimonial_content" ] = trim( $item['testimonial_content'] );
			}
			if ( isset( $item['html'] ) ) {
				$qordoba_meta_data[ $id . "_html" ] = trim( $item['html'] );
			}
		}

		return $qordoba_meta_data;
	}

	/**
	 * @param array $element
	 * @param array $elementsData
	 *
	 * @return array
	 */
	private function recursive_meta_parser( $element = array(), $elementsData = array() ) {
		foreach ( $element as $item ) {
			if ( isset( $item['settings']['title'] ) ) {
				$elementsData[ $item['id'] ]['title'] = $item['settings']['title'];
			}
			if ( isset( $item['settings']['title_text'] ) ) {
				$elementsData[ $item['id'] ]['title_text'] = $item['settings']['title_text'];
			}
			if ( isset( $item['settings']['text'] ) ) {
				$elementsData[ $item['id'] ]['text'] = $item['settings']['text'];
			}
			if ( isset( $item['settings']['description_text'] ) ) {
				$elementsData[ $item['id'] ]['description_text'] = $item['settings']['description_text'];
			}
			if ( isset( $item['settings']['description'] ) ) {
				$elementsData[ $item['id'] ]['description'] = $item['settings']['description'];
			}
			if ( isset( $item['settings']['editor'] ) ) {
				$elementsData[ $item['id'] ]['editor'] = $item['settings']['editor'];
			}
			if ( isset( $item['settings']['testimonial_content'] ) ) {
				$elementsData[ $item['id'] ]['testimonial_content'] = $item['settings']['testimonial_content'];
			}
			if ( isset( $item['settings']['testimonial_name'] ) ) {
				$elementsData[ $item['id'] ]['testimonial_name'] = $item['settings']['testimonial_name'];
			}
			if ( isset( $item['settings']['html'] ) ) {
				$elementsData[ $item['id'] ]['html'] = $item['settings']['html'];
			}
			if ( isset( $item['elements'] ) && ( 0 < count( $item['elements'] ) ) ) {
				$elementsData = $this->recursive_meta_parser( $item['elements'], $elementsData );
			}
		}

		return $elementsData;
	}

	/**
	 * @return bool
	 */
	private function is_elementor_plugin_exists() {
		return defined( 'ELEMENTOR_VERSION' );
	}

	/**
	 * @param $post_id
	 * @param string $metaKey
	 *
	 * @return mixed
	 */
	private function get_post_meta_data( $post_id, $metaKey = '_elementor_data' ) {
		return get_post_meta( $post_id, $metaKey );
	}

	/**
	 * @param $post_id
	 * @param bool $languages
	 * @param bool $override
	 *
	 * @return bool|false|ID|int
	 * @throws Exception
	 */
	public function download_post( $post_id, $languages = false, $override = false ) {
		remove_action( 'post_updated', 'wp_save_post_revision' );
		$source_id   = $this->module()->get_source_post_id( $post_id );
		$source_post = get_post( $source_id );

		if ( ! $source_id || ! $source_post || is_wp_error( $source_post ) ) {
			return false;
		}

		$object       = new Qordoba_Object( $source_post );
		$translations = $object->download();
		$new_version  = (int) $object->get_version();


		foreach ( $translations as $lang => $translation ) {
			$lang          = $this->map_qordoba_lang( $lang );
			$saved_version = (int) get_post_meta( $source_id, "_qor_version_$lang", true );

			if ( $lang && ( $override || $saved_version < $new_version ) ) {
				$translation_id = $this->module()->save_post_translation( $source_id, $lang, $translation );

				if ( $translation_id && $new_version ) {
					update_post_meta( $source_id, "_qor_version_$lang", $new_version );
				}
			}
		}

		if ( $this->translated_versions_match( $source_id, 'post' ) ) {
			delete_post_meta( $source_id, '_qor_queued' );
			delete_post_meta( $source_id, '_qor_updated' );
		} else {
			update_post_meta( $source_id, '_qor_queued', current_time( 'timestamp' ) );
		}
		add_action( 'post_updated', 'wp_save_post_revision' );

		return $source_id;
	}

	/**
	 * @param $term_id
	 *
	 * @return bool
	 */
	public function send_term( $term_id ) {
		$source_id   = $this->module()->get_source_term_id( $term_id );
		$source_term = get_term( $source_id );

		if ( ! $source_id || ! $source_term || is_wp_error( $source_term ) ) {
			return false;
		}

		$object = new Qordoba_Object( $source_term );
		$object->upload();

		update_term_meta( $source_id, '_qor_queued', current_time( 'timestamp' ) );
		delete_term_meta( $source_id, '_qor_updated' );
	}

	/**
	 * @param $term_id
	 * @param bool $languages
	 * @param bool $override
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function download_term( $term_id, $languages = false, $override = false ) {
		$source_id   = $this->module()->get_source_term_id( $term_id );
		$source_term = get_term( $source_id );

		if ( ! $source_id || ! $source_term || is_wp_error( $source_term ) ) {
			return false;
		}

		$object       = new Qordoba_Object( $source_term );
		$translations = $object->download();
		$new_version  = (int) $object->get_version();

		foreach ( $translations as $lang => $translation ) {
			$lang          = $this->map_qordoba_lang( $lang );
			$saved_version = (int) get_term_meta( $source_id, "_qor_version_$lang", true );

			if ( $lang && ( $override || $saved_version < $new_version ) ) {
				$translation_id = $this->module()->save_term_translation( $source_id, $lang, $translation );

				if ( $translation_id && $object->get_version() ) {
					update_term_meta( $source_id, "_qor_version_$lang", $object->get_version() );
				}
			}
		}

		if ( $this->translated_versions_match( $source_id, 'term' ) ) {
			delete_term_meta( $source_id, '_qor_queued' );
			delete_term_meta( $source_id, '_qor_updated' );
		} else {
			update_term_meta( $source_id, '_qor_queued', current_time( 'timestamp' ) );
		}

		return $source_id;
	}

	/**
	 * @param $object_id
	 * @param string $object_type
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function translated_versions_match( $object_id, $object_type = 'post' ) {
		if ( $object_type == 'post' ) {
			$meta = get_post_meta( $object_id );
		} elseif ( 'term' == $object_type ) {
			$meta = get_term_meta( $object_id );
		} else {
			throw new Exception( "Wrong object type $object_type, excpected either post or term" );
		}

		$versions  = array();
		$version   = isset( $meta['_qor_version'] ) ? (int) reset( $meta['_qor_version'] ) : 0;
		$languages = $this->module()->get_site_languages( false );

		foreach ( $languages as $l ) {
			$key        = sprintf( '_qor_version_%s', $l['id'] );
			$versions[] = isset( $meta[ $key ] ) ? (int) reset( $meta[ $key ] ) : 0;
		}

		return empty( $versions ) ? false : $version <= array_sum( $versions ) / count( $versions );
	}

	/**
	 * @return bool
	 */
	public function doing_automatic_translation() {
		return $this->get_lock() > current_time( 'timestamp' );
	}

	/**
	 * @return int
	 */
	public function get_lock() {
		return (int) get_option( '_qor_lock', 0 );
	}

	/**
	 * @return bool
	 */
	public function cron_job_ready() {
		$cron_period = max( HOUR_IN_SECONDS, qor()->options()->get( 'cron_schedule' ) );

		return ! $this->doing_automatic_translation() && current_time( 'timestamp' ) > $this->get_lock() + $cron_period;
	}

	/**
	 * @param $expires
	 *
	 * @return bool
	 */
	protected function set_lock( $expires ) {
		$expires = (int) $expires;

		return update_option( '_qor_lock', $expires );
	}

	/**
	 * @param int $max_time
	 * @param int $max_items
	 * @param bool $timestamp
	 *
	 * @return array
	 * @throws Exception
	 */
	public function download_pending_translations( $max_time = MINUTE_IN_SECONDS, $max_items = 50, $timestamp = false ) {
		$safe_extra_time = 5 * MINUTE_IN_SECONDS;

		// increase execution time, has no effect if PHP is running in safe mode!
		set_time_limit( $max_time + $safe_extra_time );

		$start        = current_time( 'timestamp' );
		$lock_expires = $this->get_lock();

		if ( $start < $lock_expires ) {
			throw new Exception( sprintf( 'Another process has started downloading translations (please wait %d seconds)', $lock_expires - $start ) );
		}

		$new_lock_expires = $start + $max_time + $safe_extra_time;
		$this->set_lock( $new_lock_expires );

		$post_ids = $this->get_queued_posts( - 1, $timestamp );
		$term_ids = $this->get_queued_terms( 0, $timestamp );

		$result = array(
			'updated' => 0,
			'total'   => count( $post_ids ) + count( $term_ids ),
		);

		foreach ( $post_ids as $post_id ) {
			if ( current_time( 'timestamp' ) > $start + $max_time || $result['updated'] >= $max_items ) {
				break;
			} elseif ( $new_lock_expires !== (int) get_option( '_qor_lock' ) ) {
				throw new Exception( 'Lock overridden by another process!' );
			}

			try {
				$this->download_post( $post_id );
			} catch ( Exception $e ) {
				$this->set_lock( current_time( 'timestamp' ) );
				throw $e;
			}

			$result['updated'] ++;
		}

		foreach ( $term_ids as $term_id ) {
			if ( current_time( 'timestamp' ) > $start + $max_time || $result['updated'] >= $max_items ) {
				break;
			} elseif ( $new_lock_expires !== (int) get_option( '_qor_lock' ) ) {
				throw new Exception( 'Lock overridden by another process!' );
			}

			try {
				$this->download_term( $term_id );
			} catch ( Exception $e ) {
				$this->set_lock( current_time( 'timestamp' ) );
				throw $e;
			}

			$result['updated'] ++;
		}

		$this->set_lock( current_time( 'timestamp' ) );

		return $result;
	}

	/**
	 * @param int $max_time
	 *
	 * @return array
	 */
	public function send_updated_translations( $max_time = MINUTE_IN_SECONDS ) {
		$posts  = $this->get_updated_posts();
		$terms  = $this->get_updated_terms();
		$start  = current_time( 'timestamp' );
		$result = array(
			'updated' => 0,
			'total'   => count( $posts ) + count( $terms ),
		);

		try {
			foreach ( $posts as $post_id ) {
				if ( current_time( 'timestamp' ) > $start + $max_time ) {
					return $result;
				}

				$this->send_post( $post_id );
				$result['updated'] ++;

			}

			foreach ( $terms as $term_id ) {
				if ( current_time( 'timestamp' ) > $start + $max_time ) {
					return $result;
				}

				$this->send_term( $term_id );
				$result['updated'] ++;
			}
		} catch ( Exception $e ) {
			$result['error'] = $e->getMessage();

			return $result;
		}

		return $result;

	}

	/**
	 * @param int $count
	 *
	 * @return array
	 */
	public function get_updated_posts( ) {
		$args = array(
			'fields'         => 'ids',
			'post_type'      => $this->module()->translated_post_types,
			'posts_per_page' => - 1,
			'meta_query'     => array(
				'relation' => 'OR',
				array(
					'key'     => '_qor_version',
					'compare' => 'NOT EXISTS'
				),
				array(
					'key'     => '_qor_updated',
					'compare' => 'EXISTS',
				),
			),
		);

		$lang = $this->module()->get_default_language( 'slug' );

		return $this->module()->get_posts_by_lang( $lang, $args );
	}

	/**
	 * @param int $number
	 *
	 * @return array|int|WP_Error
	 */
	public function get_updated_terms( $number = 0 ) {
		$args = array(
			'fields'     => 'ids',
			'taxonomy'   => $this->module()->translated_taxonomies,
			'hide_empty' => false,
			'number'     => $number,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key'     => '_qor_version',
					'compare' => 'NOT EXISTS'
				),
				array(
					'key'     => '_qor_updated',
					'compare' => 'EXISTS',
				),
			),
		);

		$lang = $this->module()->get_default_language( 'slug' );

		return $this->module()->get_terms_by_lang( $lang, $args );
	}

	/**
	 * @param int $count
	 * @param bool $timestamp
	 *
	 * @return array
	 */
	public function get_queued_posts( $count = - 1, $timestamp = false ) {
		$args = array(
			'fields'         => 'ids',
			'post_type'      => $this->module()->translated_post_types,
			'posts_per_page' => $count,
			'meta_key'       => '_qor_queued',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
		);

		if ( $timestamp ) {
			$args['meta_value']   = (int) $timestamp;
			$args['meta_compare'] = '<';
		}

		$lang = $this->module()->get_default_language( 'slug' );

		return $this->module()->get_posts_by_lang( $lang, $args );
	}

	/**
	 * @param int $number
	 * @param bool $timestamp
	 *
	 * @return array|int|WP_Error
	 */
	public function get_queued_terms( $number = 0, $timestamp = false ) {
		$args = array(
			'taxonomy' => $this->module()->translated_taxonomies,
			'fields'   => 'ids',
			'number'   => $number,
			'meta_key' => '_qor_queued',
			'orderby'  => 'meta_value_num',
			'order'    => 'ASC',
		);

		if ( $timestamp ) {
			$args['meta_value']   = (int) $timestamp;
			$args['meta_compare'] = '<';
		}

		$lang = $this->module()->get_default_language( 'slug' );

		return $this->module()->get_terms_by_lang( $lang, $args );
	}

	/**
	 * @param $template
	 * @param array $variables
	 *
	 * @return mixed
	 */
	public function view( $template, $variables = array() ) {
		if ( ! $variables ) {
			$variables = array();
		}

		extract( $variables );

		if ( $filename = locate_template( sprintf( 'qordoba/%s.php', $template ), false ) ) {
			return include( $filename );
		}

		return include sprintf( '%s/%s.php', QORDOBA_PLUGIN_DIR, $template );
	}

}
