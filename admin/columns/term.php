<?php
/**
 * My Term Columns
 */

if ( ! function_exists( 'rca_add_terms_columns' ) ) {
	/**
	 * Add Original Columns to WP Admin Terms
	 *
	 * @param array $columns Before Columns Array.
	 * @return array $columns After Columns Array.
	 */
	function rca_add_terms_columns( $columns ) {
		$index                = 1;
		$columns              = array_merge(
			array_slice( $columns, 0, $index ),
			[ 'id' => 'ID' ],
			array_slice( $columns, $index )
		);
		$columns['color']     = __( 'Color', 'raccoon' );
		$columns['thumbnail'] = __( 'Image', 'raccoon' );
		return $columns;
	}
}
add_filter( 'manage_edit-category_columns', 'rca_add_terms_columns' );
add_filter( 'manage_edit-post_tag_columns', 'rca_add_terms_columns' );

if ( ! function_exists( 'rca_show_terms_columns' ) ) {
	/**
	 * Show Original Columns to WP Admin Terms
	 *
	 * @param string $content Contents.
	 * @param string $column_name Column Name.
	 * @param int    $term_id Term ID.
	 * @return string $content Contents.
	 */
	function rca_show_terms_columns( $content, $column_name, $term_id ) {
		if ( 'id' === $column_name ) {
			$content = esc_html( $term_id );
		} elseif ( 'color' === $column_name ) {
			$term_meta = get_term_meta( $term_id );
			if ( isset( $term_meta['rca_term_color'][0] ) ) {
				$content = '<span style="color:' . esc_attr( $term_meta['rca_term_color'][0] ) . '">' . esc_html( $term_meta['rca_term_color'][0] ) . '</span>';
			} else {
				$content = __( 'Color is not set', 'raccoon' );
			}
		} elseif ( 'thumbnail' === $column_name ) {
			$term_meta = get_term_meta( $term_id );
			if ( isset( $term_meta['rca_term_img'][0] ) ) {
				$content = '<img src="' . esc_html( $term_meta['rca_term_img'][0] ) . '">';
			} else {
				$content = __( 'Image is not set', 'raccoon' );
			}
		}
		return $content;
	}
}
add_action( 'manage_category_custom_column', 'rca_show_terms_columns', 10, 3 );
add_action( 'manage_post_tag_custom_column', 'rca_show_terms_columns', 10, 3 );


if ( ! function_exists( 'rca_sort_terms_columns' ) ) {
	/**
	 * Add Original Sortable Columns to WP Admin Terms
	 *
	 * @param array $columns Before Columns Array.
	 * @return array $columns After Columns Array.
	 */
	function rca_sort_terms_columns( $columns ) {
		$columns['id'] = 'ID';
		return $columns;
	}
}
add_filter( 'manage_edit-category_sortable_columns', 'rca_sort_terms_columns' );
add_filter( 'manage_edit-post_tag_sortable_columns', 'rca_sort_terms_columns' );
