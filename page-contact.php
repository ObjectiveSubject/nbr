<?php
/**

Template Name: Contact

 */

get_header(); ?>

	<div id="primary" class="content-area bg-76">
		<div id="content" class="site-content width-75" role="main">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<header class="page-header bg-70">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>		

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content clear">
						<div class="general"><?php echo(get_field('general_contact_info')); ?></div>
						<div class="secondary"><?php echo(get_field('secondary_contact_info')); ?></div>
					</div>
				</article>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<div id="secondary" class="widget-area news archives width-25" role="complementary">
			<?php get_template_part('module-news'); ?>
			<?php get_template_part('module-archives'); ?>
		</div><!-- #secondary -->
		
	</div><!-- #primary -->

<?php get_footer(); ?>
