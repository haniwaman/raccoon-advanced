<?php
/**
 * SNS Buttons
 */

?>

<?php if ( 'select01' === get_theme_mod( 'raccoon_parts_sns_select_type' ) ) : ?>

<!-- p-sns-buttons -->
<nav class="p-sns-buttons">
	<ul>
	<?php if ( get_theme_mod( 'raccoon_parts_sns_check_twitter' ) ) : ?>
		<li><a class="m-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter"></i><?php esc_html_e( 'Tweet', 'raccoon' ); ?></a></li>
<?php endif; ?>
	<?php if ( get_theme_mod( 'raccoon_parts_sns_check_facebook' ) ) : ?>
		<li><a class="m-facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-facebook-f"></i><?php esc_html_e( 'Share', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	<?php if ( get_theme_mod( 'raccoon_parts_sns_check_hatena' ) ) : ?>
		<li><a class="m-hatena" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" target="_blank"><i>B!</i><?php esc_html_e( 'Hatena', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	<?php if ( get_theme_mod( 'raccoon_parts_sns_check_line' ) ) : ?>
		<li><a class="m-line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-line"></i><?php esc_html_e( 'LINE', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	<?php if ( get_theme_mod( 'raccoon_parts_sns_check_pocket' ) ) : ?>
		<li><a class="m-pocket" href="https://getpocket.com/edit?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-get-pocket"></i><?php esc_html_e( 'Pocket', 'raccoon' ); ?></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'raccoon_parts_sns_check_rss' ) ) : ?>
		<li><a class="m-rss" href="<?php bloginfo( 'rss2_url' ); ?>" rel="nofollow" target="_blank"><i class="fas fa-rss-square"></i><?php esc_html_e( 'RSS', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	</ul>
</nav><!-- /p-sns-buttons -->

<?php endif; ?>
