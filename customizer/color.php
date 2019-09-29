<?php
/**
 * Raccoon Customizer Color
 */

if ( ! function_exists( 'rca_customize_color' ) ) {
	/**
	 * Add Customizer Color
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function rca_customize_color( $wp_customize ) {

		// SNS.
		$wp_customize->add_section(
			'raccoon_colors_sns',
			array(
				'title'    => __( 'SNS', 'raccoon' ),
				'panel'    => 'raccoon_colors',
				'priority' => 2,
			)
		);

		// Twitter Color.
		$wp_customize->add_setting(
			'raccoon_colors_sns_twitter',
			array(
				'default'           => '#1da1f2',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_sns_twitter',
				array(
					'label'    => __( 'Twitter', 'raccoon' ),
					'section'  => 'raccoon_colors_sns',
					'settings' => 'raccoon_colors_sns_twitter',
					'priority' => 1,
				)
			)
		);

		// Facebook Color.
		$wp_customize->add_setting(
			'raccoon_colors_sns_facebook',
			array(
				'default'           => '#3b5998',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_sns_facebook',
				array(
					'label'    => __( 'Facebook', 'raccoon' ),
					'section'  => 'raccoon_colors_sns',
					'settings' => 'raccoon_colors_sns_facebook',
					'priority' => 1,
				)
			)
		);

		// Hatena Bookmark Color.
		$wp_customize->add_setting(
			'raccoon_colors_sns_hatena',
			array(
				'default'           => '#018fde',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_sns_hatena',
				array(
					'label'    => __( 'Hatena Bookmark', 'raccoon' ),
					'section'  => 'raccoon_colors_sns',
					'settings' => 'raccoon_colors_sns_hatena',
					'priority' => 1,
				)
			)
		);

		// LINE Color.
		$wp_customize->add_setting(
			'raccoon_colors_sns_line',
			array(
				'default'           => '#00b902',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_sns_line',
				array(
					'label'    => __( 'LINE', 'raccoon' ),
					'section'  => 'raccoon_colors_sns',
					'settings' => 'raccoon_colors_sns_line',
					'priority' => 1,
				)
			)
		);

		// Pocket Color.
		$wp_customize->add_setting(
			'raccoon_colors_sns_pocket',
			array(
				'default'           => '#ef4156',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_sns_pocket',
				array(
					'label'    => __( 'Pocket', 'raccoon' ),
					'section'  => 'raccoon_colors_sns',
					'settings' => 'raccoon_colors_sns_pocket',
					'priority' => 1,
				)
			)
		);

		// RSS Color.
		$wp_customize->add_setting(
			'raccoon_colors_sns_rss',
			array(
				'default'           => '#ea781a',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_sns_rss',
				array(
					'label'    => __( 'RSS', 'raccoon' ),
					'section'  => 'raccoon_colors_sns',
					'settings' => 'raccoon_colors_sns_rss',
					'priority' => 1,
				)
			)
		);
	}
}
add_action( 'customize_register', 'rca_customize_color' );
