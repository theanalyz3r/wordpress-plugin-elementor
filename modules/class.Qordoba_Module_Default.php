<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class Qordoba_Module_Default extends Qordoba_Module {

  public function __construct() {
    parent::__construct();

    $this->translated_post_types = array('post', 'page');
    $this->translated_taxonomies = array('category', 'post_tag');
  }

  public function save_post_translation($post_id, $language_code, $translation) {
    return; // nothing to do here
  }

  public function get_source_post_id($translation_id) {
    return $translation_id;
  }

  public function get_post_translation($post_id, $lang) {
    return get_post($post_id);
  }

  public function get_source_term_id($translation_id) {
    return $translation_id;
  }

  public function save_term_translation($term_id, $lang, $translation) {

  }

  public function get_post_languages($post_id) {
    return array( $this->get_default_language() );
  }

  public function get_default_language() {
    return get_locale();
  }

  public function get_site_languages($include_default = true) {
    if ( null === $this->site_languages ) {
      $this->site_languages = array(
        'en' => array(
          'id'     => 'en',
          'locale' => 'en_US',
          'name'   => 'English',
        ),
      );
    }

    return $this->site_languages;
  }

  public static function plugin_enabled() {
    // There are no appropriate plugins found if we made it to here
    return true;
  }

  public function qordoba_metabox_post($post) {
    printf('<p class="">%s</p>', __('Please install one of Wordpress Multilingual plugins to start translating content with Qordoba. Supported plugins are:', 'qordoba'));
    print '<ol><li>' . implode('</li><li>', array_keys(qor()->get_modules())) . '</li></ol>';
  }
}
