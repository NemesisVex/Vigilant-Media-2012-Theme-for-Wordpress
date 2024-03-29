<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="content-column-1">

	<?php if ( is_archive() ) : ?>
<header>
	<h2 class="archive-title">
		Archive:
		<?php if ( is_date() ) : ?>
			<?php echo get_the_date('F Y'); ?>
		<?php elseif( is_author() ) : ?>
			<?php echo get_the_author(); ?>
		<?php elseif ( is_category() ) : ?>
			<?php echo single_cat_title( '', false ); ?>
		<?php elseif ( is_tag() ) : ?>
			<?php echo single_tag_title( '', false ); ?>
		<?php endif; ?>
	</h2>
</header>
	<?php endif; ?>
<?php if ( is_search()) : ?>
<header>
	<h2 class="archive-title">
	Search results for: <?php echo get_search_query(); ?>
	</h2>
</header>
<?php endif; ?>
			<?php if ( have_posts() ) : ?>

				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php //twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</div><!-- #content-column-1 -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>