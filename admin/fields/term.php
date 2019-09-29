<?php
/**
 * My Fields Functions
 */


if ( ! function_exists( 'rca_term_fields_edit' ) ) {

	/**
	 * Add Original Fields to WP Admin Term Edit
	 *
	 * @param object $term Term Object.
	 * @return void
	 */
	function rca_term_fields_edit( $term ) {

		$term_meta = get_term_meta( $term->term_id );
		$term_name = '';
		switch ( $term->taxonomy ) {
			case 'category':
				$term_name = __( 'Category', 'raccoon' );
				break;
			case 'post_tag':
				$term_name = __( 'Tag', 'raccoon' );
				break;
			default:
				$term_name = __( 'Term', 'raccoon' );
				break;
		}
		?>

<tr class="form-field">
	<th><label><?php esc_html_e( 'Color', 'raccoon' ); ?></label></th>
	<td>
		<input name="rca_term_color" class="my-color-picker" type="text" value="
		<?php
		if ( isset( $term_meta['rca_term_color'][0] ) ) {
			echo esc_html( $term_meta['rca_term_color'][0] );}
		?>
		" size="40">
		<p class="description"><?php echo esc_html( $term_name ) . esc_html__( ' Color', 'raccoon' ); ?></p>
	</td>
</tr>
<tr class="form-field">
	<th><label><?php esc_html_e( 'Image', 'raccoon' ); ?></label></th>
	<td>
		<div class="my-img-btns">
			<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( 'Select Image', 'raccoon' ); ?></div>
			<div class="my-btn my-img-clear"><?php esc_html_e( 'Clear Image', 'raccoon' ); ?></div>
		</div><!-- /my-img-btns -->
		<input name="rca_term_img" class="my-img-url" type="hidden" value="
		<?php
		if ( isset( $term_meta['rca_term_img'][0] ) ) {
			echo esc_html( $term_meta['rca_term_img'][0] );}
		?>
		" size="40">
		<div class="my-img-show">
			<?php if ( isset( $term_meta['rca_term_img'][0] ) ) : ?>
				<img src="<?php echo esc_html( $term_meta['rca_term_img'][0] ); ?>">
			<?php endif; ?>
		</div><!-- /my-img-show -->
	<p class="description"><?php echo esc_html( $term_name ) . esc_html__( ' Image', 'raccoon' ); ?></p>
	</td>
</tr>
		<?php
	}
}
add_action( 'edit_category_form_fields', 'rca_term_fields_edit' );
add_action( 'edit_tag_form_fields', 'rca_term_fields_edit' );

if ( ! function_exists( 'rca_term_fields_set' ) ) {

	/**
	 * Add Original Fields to WP Admin Term Add
	 *
	 * @param object $term Term Slug.
	 * @return void
	 */
	function rca_term_fields_set( $term ) {

		$default_color = '#757575';
		$term_name     = '';
		switch ( $term ) {
			case 'category':
				$term_name = __( 'Category', 'raccoon' );
				break;
			case 'post_tag':
				$term_name = __( 'Tag', 'raccoon' );
				break;
			default:
				$term_name = __( 'Term', 'raccoon' );
				break;
		}
		?>

<div class="form-field">
	<label for="color"><?php esc_html_e( 'Color', 'raccoon' ); ?></label>
	<input name="rca_term_color" class="my-color-picker" type="text" value="<?php echo esc_html( $default_color ); ?>" size="40">
	<p class="description"><?php echo esc_html( $term_name ) . esc_html__( ' Color', 'raccoon' ); ?></p>
</div><!-- /form-field -->

<div class="form-field">
	<label><?php esc_html_e( 'Image', 'raccoon' ); ?></label>
	<div class="my-img-btns">
		<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( 'Select Image', 'raccoon' ); ?></div>
		<div class="my-btn my-img-clear"><?php esc_html_e( 'Clear Image', 'raccoon' ); ?></div>
	</div><!-- /my-img-btns -->
	<input name="rca_term_img" class="my-img-url" type="hidden" value="" size="40">
	<div class="my-img-show">
		<?php if ( isset( $term_meta['rca_term_img'][0] ) ) : ?>
			<img src="<?php echo esc_html( $term_meta['rca_term_img'][0] ); ?>">
		<?php endif; ?>
	</div><!-- /my-img-show -->
	<p class="description"><?php echo esc_html( $term_name ) . esc_html__( ' Image', 'raccoon' ); ?></p>
</div><!-- /form-field -->
		<?php
	}
}
add_action( 'category_add_form_fields', 'rca_term_fields_set' );
add_action( 'post_tag_add_form_fields', 'rca_term_fields_set' );

/**
 * Save Term Fileds
 *
 * @param int $term_id Term ID.
 * @return void
 */
function rca_term_fileds_save( $term_id ) {

	if ( isset( $_POST['rca_term_color'] ) ) {
		update_term_meta( $term_id, 'rca_term_color', sanitize_hex_color( trim( $_POST['rca_term_color'] ) ) );
	}

	if ( isset( $_POST['rca_term_img'] ) ) {
		update_term_meta( $term_id, 'rca_term_img', esc_url_raw( trim( $_POST['rca_term_img'] ) ) );
	}
}
add_action( 'created_term', 'rca_term_fileds_save' );
add_action( 'edited_term', 'rca_term_fileds_save' );
