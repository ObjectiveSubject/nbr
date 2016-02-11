<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package nbr
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content width-75 bg-76" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<header class="page-header bg-70">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<div id="secondary" class="widget-area awards width-25" role="complementary">
			<?php get_template_part('module-awards'); ?>
		</div><!-- #secondary -->
				
	</div><!-- #primary -->
	
<?php get_footer(); ?>
