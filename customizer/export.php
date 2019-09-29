<?php
/**
 * Export Customize CSS
 */

echo '<style>';

/* Twitter Color */
if ( get_theme_mod( 'raccoon_colors_sns_twitter' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-twitter{background:' . get_theme_mod( 'raccoon_colors_sns_twitter' ) . ';}' );
}

/* Facebook Color */
if ( get_theme_mod( 'raccoon_colors_sns_facebook' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-facebook{background:' . get_theme_mod( 'raccoon_colors_sns_facebook' ) . ';}' );
}

/* Hatena Bookmark Color */
if ( get_theme_mod( 'raccoon_colors_sns_hatena' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-hatena{background:' . get_theme_mod( 'raccoon_colors_sns_hatena' ) . ';}' );
}

/* LINE Color */
if ( get_theme_mod( 'raccoon_colors_sns_line' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-line{background:' . get_theme_mod( 'raccoon_colors_sns_line' ) . ';}' );
}

/* Pocket Color */
if ( get_theme_mod( 'raccoon_colors_sns_pocket' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-pocket{background:' . get_theme_mod( 'raccoon_colors_sns_pocket' ) . ';}' );
}

/* RSS Color */
if ( get_theme_mod( 'raccoon_colors_sns_rss' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-rss{background:' . get_theme_mod( 'raccoon_colors_sns_rss' ) . ';}' );
}

echo '</style>';

