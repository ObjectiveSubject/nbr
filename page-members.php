<?php
/**
 * Template Name: Members
 */

get_header(); ?>

	<div id="primary" class="content-area members-page">
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

			<?php 
			$args = array('post_type'=>'post', 'category_name'=>'member-news', 'posts_per_page'=>-1);
			$member_news = new WP_Query($args);
			if ($member_news->have_posts()) : ?>

				<div class="member-posts">
					<header class="page-header bg-70">
						<h2 class="page-title">Member News</h2>
					</header><!-- .entry-header -->
					
					<?php while($member_news->have_posts()) : $member_news->the_post();
						get_template_part('loop-feed');
					endwhile; ?>
				</div>

			<?php endif; ?>

		</div><!-- #content -->
		
		<div id="secondary" class="widget-area awards width-25" role="complementary">
			<?php get_template_part('module-awards'); ?>
		</div><!-- #secondary -->
				
	</div><!-- #primary -->
	
<?php get_footer(); ?>
