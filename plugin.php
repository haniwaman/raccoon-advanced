<?php
/*
Plugin Name: Raccoon Advanced
Description: WordPressテーマRaccoonを機能面から拡張するためのプラグイン。
License: GPLv2 or later
*/

/**
 * Load CSS and JavaScript
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function rca_script() {

	/* CSS */
	wp_enqueue_style( 'fontawesome', plugins_url( '/src/lib/fontawesome/css/all.min.css', __FILE__ ), array(), '5.8.2', 'all' );

	/* JavaScript */
	wp_enqueue_script( 'stickyfill', plugins_url( '/src/lib/stickyfill/stickyfill.min.js', __FILE__ ), array(), '2.1.0', true );
	wp_enqueue_script( 'object-fit-images', plugins_url( '/src/lib/object-fit-images/ofi.min.js', __FILE__ ), array(), '3.2.4', true );
	wp_enqueue_script( 'intersection-observer', plugins_url( '/src/lib/intersection-observer/intersection-observer.js', __FILE__ ), array(), '2.1.0', true );
	wp_enqueue_script( 'raccoon-advanced', plugins_url( '/src/js/script.js', __FILE__ ), array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'rca_script', 9 );


/**
 * Load CSS and JavaScript for WP Admin
 *
 * @return void
 */
function rca_admin_script() {
	wp_enqueue_style( 'admin', plugins_url( '/src/css/admin.css', __FILE__ ), array(), '1.0.1', 'all' );
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'admin', plugins_url( '/src/js/admin.js', __FILE__ ), array( 'wp-color-picker' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'rca_admin_script', 9 );

/**
 * Add WP Admin Columns
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/columns/base.php';


/**
 * Add WP Admin Fields
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/fields/base.php';


/**
 * Change Category Color
 *
 * @param string $color 変更前のカラーコード.
 * @param object $term 対象のタームオブジェクト.
 * @return string $color 変更後のカラーコード.
 */
function rca_raccoon_term_color( $color, $term ) {

	if ( get_term_meta( $term['id'], 'rca_term_color' ) ) {
		$color = get_term_meta( $term['id'], 'rca_term_color' )[0];
	}
	return $color;
}
add_filter( 'raccoon_term_color', 'rca_raccoon_term_color', 10, 2 );


/**
 * 投稿ページのヘッダーメタの下
 *
 * @return void
 */
function rca_single_meta_bottom() {
	if ( 'select01' === get_theme_mod( 'raccoon_parts_sns_select_place' ) || 'select03' === get_theme_mod( 'raccoon_parts_sns_select_place' ) ) {
		get_template_part( 'parts/sns' );
	}
}
add_filter( 'raccoon_single_meta_bottom', 'rca_single_meta_bottom' );


/**
 * 投稿ページのタグ一覧の下
 *
 * @return void
 */
function rca_single_tags_bottom() {
	if ( 'select02' === get_theme_mod( 'raccoon_parts_sns_select_place' ) || 'select03' === get_theme_mod( 'raccoon_parts_sns_select_place' ) ) {
		get_template_part( 'parts/sns' );
	}
}
add_filter( 'raccoon_single_tags_bottom', 'rca_single_tags_bottom' );


/**
 * Customizer
 */
require_once plugin_dir_path( __FILE__ ) . 'customizer/parts.php';
require_once plugin_dir_path( __FILE__ ) . 'customizer/color.php';



/**
 * Add Text Before </head>Tag
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_head
 */
function rca_wp_head() {

	require_once plugin_dir_path( __FILE__ ) . '/customizer/export.php';
}
add_action( 'wp_head', 'rca_wp_head' );
