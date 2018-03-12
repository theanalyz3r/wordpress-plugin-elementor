<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Class Qordoba_Custom_Fields_Table
 */
class Qordoba_Custom_Fields_Table extends WP_List_Table {

	/**
	 * @const int
	 */
	const ITEMS_PER_PAGE = 20;

	/**
	 * @var array
	 */
	protected static $post_custom_fields = array();

	/**
	 * Qordoba_Custom_Fields_Table constructor.
	 */
	public function __construct() {
		parent::__construct( array(
			'singular' => __( 'Customer', 'qordoba' ),
			'plural'   => __( 'Customers', 'qordoba' ),
			'ajax'     => false
		) );

	}

	/**
	 * @param string $glue
	 *
	 * @return string
	 */
	protected static function excluded_custom_fields_list( $glue = ',' ) {
		$list = array(
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
			'_pingme',
			'_encloseme',
			'_elementor_data',
			'_elementor_source_image_hash',
			'_elementor_edit_mode',
			'_elementor_version',
			'_elementor_css',
			'_elementor_template_type',
			'rule',
			'position',
			'hide_on_screen',
		);
		foreach ( $list as $key => &$item ) {
			$list[ $key ] = "'{$item}'";
		}

		return implode( $glue, $list );
	}

	/**
	 * Retrieve customers data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_custom_fields( $per_page = self::ITEMS_PER_PAGE, $page_number = 1 ) {

		global $wpdb;
		$offset = ( $page_number - 1 ) * $per_page;

		if ( self::is_acf_plugin_exist() ) {
			$sql = sprintf( 'SELECT DISTINCT (meta_key), meta_value FROM %s WHERE meta_key LIKE \'%s\'', $wpdb->postmeta, 'field_%' );
		} else {
			$sql = sprintf( 'SELECT DISTINCT (meta_key), meta_value FROM %s WHERE meta_key NOT LIKE \'%s\'', $wpdb->postmeta, '_qor%' );
		}

		$sql .= sprintf( ' AND meta_key NOT IN (%s) LIMIT %d OFFSET %d', self::excluded_custom_fields_list(), $per_page, $offset );

		return $wpdb->get_results( $sql, ARRAY_A );
	}


	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count() {
		global $wpdb;

		if ( self::is_acf_plugin_exist() ) {
			$sql = sprintf( 'SELECT COUNT(DISTINCT (meta_key), meta_value) FROM %s WHERE meta_key LIKE \'%s\'', $wpdb->postmeta, 'field_%' );
		} else {
			$sql = sprintf( 'SELECT COUNT(DISTINCT (meta_key), meta_value) FROM %s WHERE meta_key NOT LIKE \'%s\'', $wpdb->postmeta, '_qor%' );
		}

		$sql .= sprintf( " AND meta_key NOT IN (%s)", self::excluded_custom_fields_list() );

		return $wpdb->get_var( $sql );
	}

	/**
	 * @return bool
	 */
	public static function is_acf_plugin_exist() {
		return class_exists( 'acf' );
	}

	/**
	 *
	 */
	public function no_items() {
		_e( 'There are no fields found for translating.', 'qordoba' );
	}

	/**
	 * @param $data
	 * @param $key
	 *
	 * @return string
	 */
	private function extract_acf_value( $data, $key ) {
		static $valueData = array();
		$value = '';
		if ( 0 === count( $valueData ) ) {
			$data = unserialize( $data['meta_value'] );
		}
		if ( isset( $data[ $key ] ) ) {
			$value = ucfirst( $data[ $key ] );
		}

		return $value;
	}

	/**
	 * @param $data
	 *
	 * @return bool
	 */
	private function is_acf_field( $data ) {
		return ( 0 === strpos( $data['meta_key'], 'field_' ) );
	}

	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		if ( $this->is_acf_field( $item ) ) {
			switch ( $column_name ) {
				case 'meta_key':
					return strip_tags( $this->extract_acf_value( $item, 'label' ) );
				case 'meta_value':
					return strip_tags( $this->extract_acf_value( $item, 'name' ) );
				case 'meta_type':
					return strip_tags( $this->extract_acf_value( $item, 'type' ) );
				case 'meta_translation':
					return $this->is_checked( $item ) ? 'Yes' : '';
				default:
					return '';
			}
		} else {
			switch ( $column_name ) {
				case 'meta_key':
					return strip_tags( $item[ $column_name ] );
				case 'meta_value':
					return strip_tags( $item[ $column_name ] );
				case 'meta_type':
					return 'Text';
				case 'meta_translation':
					return $this->is_checked( $item ) ? 'Yes' : '';
				default:
					return '';
			}
		}
	}

	/**
	 * @param $item
	 *
	 * @return bool
	 */
	public function is_checked( $item ) {
		if ( 0 === count( self::$post_custom_fields ) ) {
			$options = get_option( 'qordoba_options', array() );
			if ( isset( $options['post_fields'] ) ) {
				self::$post_custom_fields = $options['post_fields'];
			}
		}

		return in_array( $item['meta_key'], self::$post_custom_fields );
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	public function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="bulk[]" value="%s"/>', $item['meta_key'] );
	}


	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_name( $item ) {
		return isset( $item['meta_key'] ) ? trim( $item['meta_key'] ) : '';
	}


	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		return array(
			'cb'               => '<input type="checkbox" />',
			'meta_key'         => __( 'Fields Label', 'qordoba' ),
			'meta_value'       => __( 'Fields Name', 'qordoba' ),
			'meta_type'        => __( 'Fields Type', 'qordoba' ),
			'meta_translation' => __( 'Fields Translation', 'qordoba' ),
		);
	}


	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		return array();
	}

	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		return array(
			'bulk-save'   => __( 'Save', 'qordoba' ),
			'bulk-remove' => __( 'Remove', 'qordoba' )
		);
	}


	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->process_bulk_action();
		$this->_column_headers = $this->get_column_info();


		$per_page     = $this->get_items_per_page( 'fields_per_page', self::ITEMS_PER_PAGE );
		$current_page = $this->get_pagenum();

		$this->set_pagination_args( array(
			'total_items' => self::record_count(),
			'per_page'    => $per_page
		) );

		$this->items = self::get_custom_fields( $per_page, $current_page );
	}

	/**
	 *
	 */
	public function process_bulk_action() {
		if ( isset( $_POST['action'] ) || isset( $_POST['action2'] ) ) {
			if ( ( 'bulk-remove' === $_POST['action'] ) || ( 'bulk-remove' === $_POST['action2'] ) ) {
				if ( ( isset( $_POST['bulk'] ) && is_array( $_POST['bulk'] ) ) ) {
					$options = get_option( 'qordoba_options', array() );
					foreach ( $_POST['bulk'] as $key => $item ) {
						unset( $options['post_fields'][ array_search( $item, $options['post_fields'] ) ] );
					}
					$this->update_options( $options );
					$this->clear_wp_cache();
				}
			}
			if ( ( 'bulk-save' === $_POST['action'] ) || ( 'bulk-save' === $_POST['action2'] ) ) {
				if ( ( isset( $_POST['bulk'] ) && is_array( $_POST['bulk'] ) ) ) {
					$options = get_option( 'qordoba_options', array() );
					foreach ( $_POST['bulk'] as $key => $item ) {
						$options['post_fields'][] = $item;
					}
					$this->update_options( $options );
					$this->clear_wp_cache();
				}
			}
		}
	}

	/**
	 * @return bool
	 */
	private function clear_wp_cache() {
		return wp_cache_delete( 'alloptions', 'options' );
	}

	/**
	 * @param $data
	 */
	public function update_options( $data ) {
		global $wpdb;
		$sql = sprintf( 'UPDATE %s SET option_value = \'%s\' WHERE option_name = \'qordoba_options\';', $wpdb->options, maybe_serialize( $data ) );
		$wpdb->query( $sql );
	}
}


/**
 * Class SP_Plugin
 */
class SP_Plugin {

	/**
	 * @var
	 */
	static $instance;

	/**
	 * @var
	 */
	public $customers_obj;

	/**
	 * SP_Plugin constructor.
	 */
	public function __construct() {
		add_filter( 'set-screen-option', array( __CLASS__, 'set_screen' ), 10, 3 );
		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
	}

	/**
	 * @param $status
	 * @param $option
	 * @param $value
	 *
	 * @return mixed
	 */
	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	/**
	 *
	 */
	public function plugin_menu() {
		$hook = add_submenu_page(
			qor()->module()->get_menu_parent_slug(),
			__( 'Custom Fields', 'qordoba' ),
			__( 'Custom Fields', 'qordoba' ),
			'manage_options',
			'qordoba_custom_fields',
			array( $this, 'plugin_settings_page' )
		);
		add_action( "load-$hook", array( $this, 'screen_option' ) );
	}


	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page() {
		?>
        <div class="wrap">
            <h2>Custom Fields</h2>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
								<?php
								$this->customers_obj->prepare_items();
								$this->customers_obj->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
		<?php
	}

	/**
	 *
	 */
	public function screen_option() {
		$option = 'per_page';
		$args   = array(
			'label'   => 'Custom Fields',
			'default' => Qordoba_Custom_Fields_Table::ITEMS_PER_PAGE,
			'option'  => 'fields_per_page'
		);
		add_screen_option( $option, $args );
		$this->customers_obj = new Qordoba_Custom_Fields_Table();
	}

	/**
	 * @return SP_Plugin
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}


add_action(
	'plugins_loaded', function () {
	SP_Plugin::get_instance();
} );