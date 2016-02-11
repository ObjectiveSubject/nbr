<?php
/**
 * The Template for displaying all single posts.
 *
 * @package nbr
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content width-75 bg-0" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header class="page-header bg-12">
				<h1 class="page-title"><?php if (get_field('feature_related_film')) { ?><em><?php echo(get_field('feature_related_film')); ?></em> &ndash; <?php } the_title(); ?></h1>
				<div class="entry-meta text-50">
					<h6><?php the_date('F Y'); ?></h6>
					<p>by <?php 
						if (get_field('feature_author')) {  echo( get_field('feature_author') ); }
						else { the_author(); } 
					?></p>
				</div>
			</header>

Single Attachment page		<?php endwhile; ?>

		</div><!-- #content -->
		<div id="secondary" class="widget-area news archives qa width-25" role="complementary">
			<?php get_template_part('module-qa'); ?>
			<?php get_template_part('module-news'); ?>
			<?php get_template_part('module-archives'); ?>
		</div>
	</div><!-- #primary -->

	

<?php get_footer(); ?>