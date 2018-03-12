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
 * Class Qordoba_Options
 */
class Qordoba_Options {
	/**
	 * @var null
	 */
	protected $options;

	/**
	 * @var string
	 */
	protected $wp_options_field = 'qordoba_options';

	/**
	 * Qordoba_Options constructor.
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 *
	 */
	protected function init_hooks() {
		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'register_menu' ) );
			add_action( 'admin_init', array( $this, 'register_settings' ) );
		}
	}

	/**
	 * @param bool $option
	 *
	 * @return bool|string
	 */
	public function get( $option = false ) {
		if ( !$this->options ) {
			$this->options = get_option( $this->wp_options_field, array() );
		}

		if ( $option ) {
			return isset( $this->options[ $option ] ) ? $this->options[ $option ] : false;
		}

		return $this->options;
	}

	/**
	 *
	 */
	public function register_settings() {
		register_setting(
			'qordoba_options_group',
			$this->wp_options_field,
			array( $this, 'sanitize_field_values' )
		);

		$this->add_settings_general();
		$this->add_settings_custom_fields();
	}

	/**
	 *
	 */
	protected function add_settings_general() {
		add_settings_section(
			'qordoba_general_settings',
			__( 'General', 'qordoba' ),
			false,
			'qordoba'
		);

		add_settings_field(
			'token',
			'Token',
			array( $this, 'render_text_field' ),
			'qordoba',
			'qordoba_general_settings',
			array( 'field_id' => 'token' )
		);

		add_settings_field(
			'login',
			'Login',
			array( $this, 'render_text_field' ),
			'qordoba',
			'qordoba_general_settings',
			array( 'field_id' => 'login' )
		);

		add_settings_field(
			'password',
			'Password',
			array( $this, 'render_password_field' ),
			'qordoba',
			'qordoba_general_settings',
			array( 'field_id' => 'password' ) );

		add_settings_field(
			'project_id',
			'Project ID',
			array( $this, 'render_number_field' ),
			'qordoba',
			'qordoba_general_settings',
			array( 'field_id' => 'project_id' )
		);

		add_settings_field(
			'organization_id',
			'Organization ID',
			array( $this, 'render_number_field' ),
			'qordoba',
			'qordoba_general_settings',
			array( 'field_id' => 'organization_id' )
		);

		add_settings_field(
			'languages',
			'Languages',
			array( $this, 'render_languages_field' ),
			'qordoba',
			'qordoba_general_settings'
		);

		add_settings_field(
			'cron_schedule',
			__( 'Cron Schedule' ),
			array( $this, 'render_cron_schedule_field' ),
			'qordoba',
			'qordoba_general_settings'
		);
	}

	/**
	 *
	 */
	protected function add_settings_custom_fields() {
		add_settings_field(
			'term_fields',
			'Term Fields',
			array( $this, 'term_custom_fields' ),
			'qordoba',
			'qordoba_custom_fields_settings'
		);
	}

	/**
	 * @return array
	 */
	protected function exclude_custom_fields() {
		$exclude_fields = array(
			'_edit_last',
			'_edit_lock',
			'_pll_strings_translations',
			'_qor_version',
			'_thumbnail_id',
			'_wp_attached_file',
			'_wp_attachment_metadata',
			'_wp_desired_post_slug',
			'_wp_page_template',
			'_wp_trash_meta_status',
			'_wp_trash_meta_time',
		);

		return $exclude_fields;
	}

	/**
	 *
	 */
	public function term_custom_fields() {
		global $wpdb;

		$sql           = sprintf( 'SELECT meta_key FROM %s  WHERE meta_key NOT LIKE \'_qor%\'  GROUP BY meta_key', $wpdb->termmeta );
		$custom_fields = $wpdb->get_col( $sql );

		$custom_fields = array_diff( $custom_fields, $this->exclude_custom_fields() );
		$checked       = $this->get( 'term_fields' );

		if ( ! $checked ) {
			$checked = array();
		}

		if ( empty( $custom_fields ) ) {
			printf( '<p>%s</p>', __( 'There are no fieds found for translating.', 'qordoba' ) );
		} else {
			$this->render_custom_fields( 'term_fields', $custom_fields, $checked );
		}
	}

	/**
	 * @param $name
	 * @param $custom_fields
	 * @param $checked
	 */
	public function render_custom_fields( $name, $custom_fields, $checked ) {
		//$name = sprintf('%s[%s][]', $this->wp_options_field, $name);

//		$vars = array(
//			'name'          => sprintf( '%s[%s][]', $this->wp_options_field, $name ),
//			'custom_fields' => $custom_fields,
//			'checked'       => $checked,
//		);

//		qor()->view( 'views/options-custom-fields', $vars );
		//include QORDOBA_PLUGIN_DIR . '/views/options-custom-fields.php';
	}

	/**
	 * @param $values
	 *
	 * @return array
	 */
	public function sanitize_field_values( $values ) {
		$new_values = array();

		if ( isset( $values['token'] ) ) {
			$new_values['token'] = sanitize_text_field( $values['token'] );
		}

		if ( isset( $values['login'] ) ) {
			$new_values['login'] = sanitize_text_field( $values['login'] );
		}

		if ( isset( $values['password'] ) ) {
			$new_values['password'] = sanitize_text_field( $values['password'] );
		}

		if ( isset( $values['organization_id'] ) ) {
			$new_values['organization_id'] = absint( $values['organization_id'] );
		}

		if ( isset( $values['project_id'] ) ) {
			$new_values['project_id'] = absint( $values['project_id'] );
		}

		$new_values['cron_schedule'] = isset( $values['cron_schedule'] ) ? absint( $values['cron_schedule'] ) : 0;

		$site_languages          = qor()->module()->get_site_languages();
		$new_values['languages'] = array();

		foreach ( $site_languages as $slug => $lang ) {
			if ( isset( $values["lang_$slug"] ) ) {
				$new_values['languages'][ $slug ] = sanitize_text_field( $values["lang_$slug"] );
			}
		}

		$field_options = array( 'post_fields', 'term_fields' );

		foreach ( $field_options as $field_option ) {
			if ( isset( $values[ $field_option ] ) ) {
				$custom_fields               = empty( $values[ $field_option ] ) || ! is_array( $values[ $field_option ] ) ? array() : $values[ $field_option ];
				$new_values[ $field_option ] = array();

				foreach ( $custom_fields as $custom_field ) {
					$new_values[ $field_option ][] = sanitize_text_field( $custom_field );
				}
			}
		}

		return $new_values;
	}

	/**
	 *
	 */
	public function print_section_info() {
		printf( '<div class="description">%s</div>', __( 'General options descriptive text', 'qordoba' ) );
	}

	/**
	 * @return array
	 */
	protected function suggest_languages() {
		$site_languages = qor()->module()->get_site_languages();
		$result         = array();

		foreach ( $site_languages as $slug => $lang ) {
			$result[ $slug ] = strtolower( str_replace( '_', '-', $lang['locale'] ) );
		}

		return $result;
	}

	/**
	 *
	 */
	public function render_languages_field() {
		if ( false === qor()->get_project_meta_data() ) {
			_e( 'Project data cannot be loaded. Please ensure you have entered valid login/password and correct organization/project', 'qordoba' );

			return;
		}

		$site_languages = qor()->module()->get_site_languages();
		$values         = $this->get( 'languages' );

		try {
			$project_languages = qor()->get_project_languages();
			array_unshift( $project_languages, qor()->get_project_meta_data()->source_language );
		} catch ( Exception $e ) {
			printf( __( 'Error: %s', 'qordoba' ), $e->getMessage() );

			return;
		}

		$suggested = false;

		if ( empty( $values ) ) {
			$suggested = $values = $this->suggest_languages( $project_languages );

		}

		foreach ( $site_languages as $slug => $lang ) {
			$field_name = sprintf( '%s[lang_%s]', $this->wp_options_field, $slug );
			$selected   = isset( $values[ $slug ] ) ? $values[ $slug ] : false;

			?>

            <p>
                <label for="<?php print $field_name; ?>"><?php printf( '%s (%s): ', $lang['name'], $slug ); ?></label>
                <select name="<?php print $field_name; ?>">
                    <option value=""><?php _e( 'Select Language', 'qordoba' ); ?></option>

					<?php foreach ( $project_languages as $qor_lang ): ?>
                        <option value="<?php print $qor_lang->code; ?>" <?php selected( $selected, $qor_lang->code ); ?>><?php printf( '%s (%s)', $qor_lang->name, $qor_lang->code ); ?></option>
					<?php endforeach; ?>
                </select>
            </p>

			<?php

		}

		if ( $suggested ) {
			printf( '<p><strong>%s</strong><p>', __( 'Languages not saved, please click "Save Changes"', 'qordoba' ) );
		}

		if ( ! qor()->get_project_language() ) {
			printf( '<p><strong>%s</strong><p>', __( 'Main language is not configured!', 'qordoba' ) );
		}
	}

	/**
	 *
	 */
	public function render_cron_schedule_field() {
		$options = array(
			__( '-never-', 'qordoba' )       => 0,
			__( 'Hourly', 'qordoba' )        => HOUR_IN_SECONDS,
			__( 'Every 2 hours', 'qordoba' ) => HOUR_IN_SECONDS * 2,
			__( 'Every 3 hours', 'qordoba' ) => HOUR_IN_SECONDS * 3,
			__( 'Every 5 hours', 'qordoba' ) => HOUR_IN_SECONDS * 5,
			__( 'Daily', 'qordoba' )         => DAY_IN_SECONDS,
			__( 'Weekly', 'qordoba' )        => WEEK_IN_SECONDS,
		);

		$vars = array(
			'name'     => 'qordoba_options[cron_schedule]',
			'id'       => 'cron_schedule',
			'label'    => __( 'Automatically download new translations for posts/terms:', 'qordoba' ),
			'options'  => $options,
			'selected' => (int) $this->get( 'cron_schedule' ),
		);

		qor()->view( 'views/options-dropdown', $vars );
	}

	/**
	 * @param $args
	 *
	 * @return bool
	 */
	public function render_text_field( $args ) {
		if ( empty( $args['field_id'] ) ) {
			print 'Missing field_id';

			return false;
		}

		$value = $this->get( $args['field_id'] ) ? esc_attr( $this->get( $args['field_id'] ) ) : '';

		printf(
			'<input type="text" id="%1$s" name="%2$s[%1$s]" class="regular-text code" value="%3$s" />',
			$args['field_id'],
			$this->wp_options_field,
			$value
		);
	}

	/**
	 * @param $args
	 *
	 * @return bool
	 */
	public function render_password_field( $args ) {
		if ( empty( $args['field_id'] ) ) {
			print 'Missing field_id';

			return false;
		}

		$value = $this->get( $args['field_id'] ) ? esc_attr( $this->get( $args['field_id'] ) ) : '';

		printf(
			'<input type="password" id="%1$s" name="%2$s[%1$s]" class="regular-text code" value="%3$s" />',
			$args['field_id'],
			$this->wp_options_field,
			$value
		);
	}

	/**
	 * @param $args
	 *
	 * @return bool
	 */
	public function render_number_field( $args ) {
		if ( empty( $args['field_id'] ) ) {
			print 'Missing field_id';

			return false;
		}

		$value = $this->get( $args['field_id'] ) ? esc_attr( $this->get( $args['field_id'] ) ) : '';

		printf(
			'<input type="number" id="%1$s" name="%2$s[%1$s]" class="small-text code" value="%3$s" />',
			$args['field_id'],
			$this->wp_options_field,
			$value
		);
	}

	/**
	 *
	 */
	public function register_menu() {
		add_submenu_page(
			qor()->module()->get_menu_parent_slug(),
			__( 'Qordoba Settings', 'qordoba' ),
			__( 'Qordoba', 'qordoba' ),
			'manage_options',
			'qordoba',
			array( $this, 'render_options_page' )
		);
	}

	/**
	 *
	 */
	public function render_options_page() {
		$updated_posts = count( qor()->get_updated_posts() );
		$updated_terms = count( qor()->get_updated_terms() );

		$queued_posts = count( qor()->get_queued_posts() );
		$queued_terms = count( qor()->get_queued_terms() );

		$vars = array(
			'updated_posts'       => $updated_posts,
			'updated_terms'       => $updated_terms,
			'has_updated_content' => $updated_posts || $updated_terms,

			'queued_posts'       => $queued_posts,
			'queued_terms'       => $queued_terms,
			'has_queued_content' => ( $queued_posts || $queued_terms ),
		);

		qor()->view( 'views/options', $vars );
		wp_enqueue_script( 'qordoba-options' );
	}
}
