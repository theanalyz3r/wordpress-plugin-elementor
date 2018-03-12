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
 * Class Qordoba_Module
 */
abstract class Qordoba_Module {

	/**
	 * @var array
	 */
	public $translated_post_types = array();
	/**
	 * @var array
	 */
	public $translated_taxonomies = array();
	/**
	 * @var bool|string
	 */
	public $project_lang = 'en';
	/**
	 * @var null
	 */
	protected $site_languages;

	/**
	 * Qordoba_Module constructor.
	 */
	public function __construct() {
		$this->project_lang = qor()->get_project_language();

		$this->init_hooks();
	}

	/**
	 * @param $post_id
	 * @param $language_code
	 * @param $translation
	 *
	 * @return mixed
	 */
	abstract public function save_post_translation( $post_id, $language_code, $translation );

	/**
	 * Get ID of the source translation, assuming source translation
	 *  is in the project's language. Return $translation_id if it's already a source
	 *  or if all translation are saved in the same post.
	 *
	 * @param $translation_id ID of the post
	 *
	 * @return int|false ID of the source post, $translation_id if it's already a source
	 *   or FALSE if translation does not exist in project's language
	 */
	abstract public function get_source_post_id( $translation_id );

	/**
	 * @param $translation_id
	 *
	 * @return mixed
	 */
	abstract public function get_source_term_id( $translation_id );

	/**
	 * @param $post_id
	 * @param $lang
	 *
	 * @return mixed
	 */
	abstract public function get_post_translation( $post_id, $lang );

	/**
	 * @param $term_id
	 * @param $lang
	 * @param $translation
	 *
	 * @return mixed
	 */
	abstract public function save_term_translation( $term_id, $lang, $translation );

	/**
	 * @param $post_id
	 *
	 * @return mixed
	 */
	abstract public function get_post_languages( $post_id );

	/**
	 * @return mixed
	 */
	abstract public function get_default_language();

	/**
	 * @param bool $include_default
	 *
	 * @return mixed
	 */
	abstract public function get_site_languages( $include_default = true );

	/**
	 * @param $lang
	 * @param array $extra_args
	 *
	 * @return array
	 */
	public function get_posts_by_lang( $lang, $extra_args = array() ) {
		$default_args = array(
			'post_type' => $this->translated_post_types,
		);

		return get_posts( wp_parse_args( $extra_args, $default_args ) );
	}

	/**
	 * @param $lang
	 * @param array $extra_args
	 *
	 * @return array|int|WP_Error
	 */
	public function get_terms_by_lang( $lang, $extra_args = array() ) {
		$default_args = array(
			'taxonomy'   => $this->translated_taxonomies,
			'hide_empty' => false,
		);

		return get_terms( wp_parse_args( $extra_args, $default_args ) );
	}

	/**
	 * Check if main translation plugin is activated, like Polylang or WPML
	 * For instance, Polylang could be detected by checking if 'pll_current_language'
	 *   function is enabled
	 *
	 * @return bool
	 */
	public static function plugin_enabled() {
		return function_exists( 'pll_current_language' );
    }

	/**
	 * The Qordoba options page will be nested under the returned menu slug.
	 * By default the Qordoba options page is located under Settings menu.
	 *
	 * @param string Parent plugin menu slug
	 *
	 * @return string
	 */
	public function get_menu_parent_slug() {
		return 'options-general.php';
	}

	/**
	 *
	 */
	public function init_hooks() {
		if ( is_admin() ) {
			add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );

			foreach ( $this->translated_taxonomies as $tax ) {
				add_action( "{$tax}_edit_form_fields", array( $this, 'qordoba_metabox_term' ) );
			}

		}

	}

	/**
	 * @param $post_type
	 *
	 * @return bool
	 */
	public function is_translated_post_type( $post_type ) {
		return in_array( $post_type, $this->translated_post_types );
	}

	/**
	 * @param $taxonomy
	 *
	 * @return bool
	 */
	public function is_translated_taxonomy( $taxonomy ) {
		return in_array( $taxonomy, $this->translated_taxonomies );
	}

	/**
	 *
	 */
	public function register_meta_boxes() {
		add_meta_box(
			'qordoba_metabox',
			__( 'Translate with Qordoba', 'qordoba' ),
			array( $this, 'qordoba_metabox_post' ),
			$this->translated_post_types,
			'side',
			'high'
		);
	}

	/**
	 * @param $term
	 */
	public function qordoba_metabox_term( $term ) {
		$source_id            = qor()->module()->get_source_term_id( $term->term_id );
		$site_languages       = $this->get_site_languages( false );
		$configured_languages = qor()->options()->get( 'languages' );

		foreach ( $site_languages as $id => &$lang ) {
			$lang['version']    = (int) get_term_meta( $source_id, "_qor_version_{$lang['id']}", true );
			$lang['configured'] = ! empty( $configured_languages[ $id ] );
		}

		$vars = array(
			'source_version' => (int) get_term_meta( $source_id, '_qor_version', true ),
			'languages'      => $site_languages,
			'updated'        => (bool) get_term_meta( $source_id, '_qor_updated' ),
		);

		?>

        <tr id="qordoba_metabox" class="form-field term-qordoba-wrap">
            <th scope="row">
                <label><?php _e( 'Translate with Qordoba', 'qordoba' ); ?></label>
            </th>
            <td>
				<?php if ( ! qor()->qordoba_api_configured() || ! qor()->get_project_meta_data() ): ?>
					<?php printf( __( 'Please configure project on the <a href="%s">Qordoba Options Page</a>.', 'qordoba' ), admin_url( 'admin.php?page=qordoba' ) ); ?>
				<?php elseif ( ! qor()->get_project_language() ): ?>
					<?php printf( __( 'Please configure "%s" language on the <a href="%s">Qordoba Options</a> page.', 'qordoba' ), qor()->get_project_meta_data()->source_language->name, admin_url( 'admin.php?page=qordoba' ) ); ?>
				<?php elseif ( ! $source_id ): ?>
					<?php printf( __( 'Please translate this term to "%s" first (Project source language).', 'qordoba' ), qor()->module()->get_default_language( 'name' ) ); ?>
				<?php else: ?>
					<?php qor()->view( 'views/metabox-translations', $vars ); ?>
					<?php $this->qordoba_metabox_buttons( $term ); ?>
				<?php endif; ?>
            </td>
        </tr>

		<?php
	}

	/**
	 * @param $post
	 *
	 * @return int
	 */
	public function qordoba_metabox_post( $post ) {
		if ( ! qor()->qordoba_api_configured() || ! qor()->get_project_meta_data() ) {
			return printf( __( 'Please configure project on the <a href="%s">Qordoba Options Page</a>.', 'qordoba' ), admin_url( 'admin.php?page=qordoba' ) );
		} elseif ( ! qor()->get_project_language() ) {
			return printf( __( 'Please configure "%s" language on the <a href="%s">Qordoba Options</a> page.', 'qordoba' ), qor()->get_project_meta_data()->source_language->name, admin_url( 'admin.php?page=qordoba' ) );
		}

		$source_id = qor()->module()->get_source_post_id( $post->ID );

		if ( ! $source_id ) {
			return printf( __( 'Please translate this post to "%s" first (Project source language).', 'qordoba' ), qor()->module()->get_default_language( 'name' ) );
		}

		$site_languages       = $this->get_site_languages( false );
		$configured_languages = qor()->options()->get( 'languages' );

		foreach ( $site_languages as $id => &$lang ) {
			$lang['version']    = (int) get_post_meta( $source_id, "_qor_version_{$lang['id']}", true );
			$lang['configured'] = ! empty( $configured_languages[ $id ] );
		}

		$vars = array(
			'source_version' => (int) get_post_meta( $source_id, '_qor_version', true ),
			'languages'      => $site_languages,
			'updated'        => (bool) get_post_meta( $source_id, '_qor_updated' ),
		);

		qor()->view( 'views/metabox-translations', $vars );

		$this->qordoba_metabox_buttons( $post );
	}

	/**
	 * @param $object
	 */
	public function qordoba_metabox_buttons( $object ) {
		if ( $object instanceof WP_Post ) {
			$object_type = 'post';
			$object_id   = $object->ID;
		} elseif ( $object instanceof WP_Term ) {
			$object_type = 'term';
			$object_id   = $object->term_id;
		} else {
			_e( '$object should be instance of either WP_Post or WP_Term', 'qordoba' );

			return;
		}

		wp_nonce_field( 'qordoba_widget_action', 'qor_nonce' );

		printf( '<button type="submit" class="button button-primary qordoba-send button-large" name="save" value="qordoba_send">%s</button> ', __( 'Save & Send', 'qordoba' ) );
		printf( '<button type="button" class="button button-primary qordoba-download button-large">%s</button> ', __( 'Download', 'qordoba' ) );

		printf( '<img class="qordoba-loading" style="display: none;" src="%s">', admin_url( 'images/loading.gif' ) );

		$widget_data = array(
			'object_type' => $object_type,
			'object_id'   => $object_id,
		);

		wp_localize_script( 'qordoba-widget', 'qor_widget_data', $widget_data );
		wp_enqueue_script( 'qordoba-widget' );
	}

}
