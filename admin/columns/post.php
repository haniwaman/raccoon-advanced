<?php
/**
 * My Post Columns
 */

if ( ! function_exists( 'rca_add_post_columns' ) ) {
	/**
	 * Add Original Columns to WP Admin Posts
	 *
	 * @param array $columns Before Columns Array.
	 * @return array $columns After Columns Array.
	 */
	function rca_add_post_columns( $columns ) {
		global $post_type;
		if ( in_array( $post_type, array( 'post', 'page' ), true ) ) {
			$columns['thumbnail'] = __( 'iCatch Image', 'raccoon' );
			$index_id             = 1;
			$columns              = array_merge(
				array_slice( $columns, 0, $index_id ),
				[ 'id' => 'ID' ],
				array_slice( $columns, $index_id )
			);

		}
		return $columns;
	}
}
add_filter( 'manage_posts_columns', 'rca_add_post_columns' );
add_filter( 'manage_pages_columns', 'rca_add_post_columns' );

if ( ! function_exists( 'rca_show_post_columns' ) ) {
	/**
	 * Show Original Columns to WP Admin Posts
	 *
	 * @param string $column_name Column Name.
	 * @param int    $post_id Post ID.
	 * @return void
	 */
	function rca_show_post_columns( $column_name, $post_id ) {
		if ( 'thumbnail' === $column_name ) {
			$thumbnail_id = get_post_thumbnail_id( $post_id );
			if ( $thumbnail_id ) {
				$thumbnail_img = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );
				echo '<img src="' . esc_url( $thumbnail_img[0] ) . '">';
			} else {
				echo esc_html_e( 'iCatch Image is not set', 'raccoon' );
			}
		} elseif ( 'id' === $column_name ) {
			echo esc_html( $post_id );
		}
	}
}
add_action( 'manage_posts_custom_column', 'rca_show_post_columns', 10, 2 );
add_action( 'manage_pages_custom_column', 'rca_show_post_columns', 10, 2 );


if ( ! function_exists( 'rca_sort_post_columns' ) ) {
	/**
	 * Add Original Sortable Columns to WP Admin Posts
	 *
	 * @param array $columns Before Columns Array.
	 * @return array $columns After Columns Array.
	 */
	function rca_sort_post_columns( $columns ) {
		$columns['id'] = 'ID';
		return $columns;
	}
}
add_filter( 'manage_edit-post_sortable_columns', 'rca_sort_post_columns' );
add_filter( 'manage_edit-page_sortable_columns', 'rca_sort_post_columns' );
