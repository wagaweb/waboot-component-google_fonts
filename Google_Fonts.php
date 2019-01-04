<?php
/**
Component Name: Google Fonts
Description: Adds google fonts to Waboot
Category: Styles
Tags: Styles
Version: 1.0.0
Author: Waboot Team <info@waboot.io>
Author URI: http://www.waboot.io
 */

class Google_Fonts extends \WBF\modules\components\Component{
	public function setup() {
		parent::setup();
	}

	public function run() {
		parent::run();
	}

	public function register_options() {
		parent::register_options();
		$orgzr = \WBF\modules\options\Organizer::getInstance();

		$orgzr->add_section('google_fonts', _x('Google Fonts','Theme Options tab','waboot'));

		$orgzr->set_section('google_fonts');

		$orgzr->set_group("css_injection");

		$updateFontCacheLink = \class_exists(\WBF\includes\GoogleFontsRetriever::class) && \function_exists('\WBF\includes\GoogleFontsRetriever::get_update_font_cache_link') ? \WBF\includes\GoogleFontsRetriever::get_update_font_cache_link() : '#';

		$orgzr->add(array(
			'name' => _x('Google Fonts API Key', 'Theme options', 'waboot'),
			'desc' => sprintf(_x('Add here your google fonts api key. Update the fonts cache by clicking <a href="%s">here</a>.', 'Theme options', 'waboot'),$updateFontCacheLink),
			'class' => 'half_option',
			'id' => 'google_fonts_api_key',
			'std' => '',
			'type' => 'text'
		));

		$orgzr->add([
			'name' => _x('Fonts to load', "Theme Options", 'waboot'),
			'id' => 'fonts',
			'css_selectors' => ['body,p,ul', 'h1,h2,h3', 'h4,h5,h6'],
			'std' => [],
			'type' => 'fonts_selector',
			'fonts_type' => 'google',
			'save_action' => "\\Waboot\\functions\\deploy_theme_options_css"
		]);

		$orgzr->reset_group();
		$orgzr->reset_section();
	}
}
