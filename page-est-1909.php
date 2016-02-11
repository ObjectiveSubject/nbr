<?php
/**

Template Name: Established 1909

 */

get_header(); ?>

	<div id="primary" class="content-area">		
		<div id="content" class="site-content width-75 bg-0" role="main">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<header class="page-header bg-12">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<div id="secondary" class="widget-area archives width-25" role="complementary">
			<aside id="archives-module" class="widget widget-archives bg-82 light-blue-hover">
				<h2>From the Archives</h2>
				<?php 
				$args = array('post_type'=>'post', 'category_name'=>'from-the-archive', 'posts_per_page'=>3);
				$archives = new WP_Query ($args);
				
				while ( $archives->have_posts() ) : $archives->the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<a href="<?php the_permalink(); ?>" class="clear">
							<h6><?php the_date('F Y'); ?></h6> 
							<p class="big"><?php if (get_field('feature_related_film')) { ?><em><?php echo(get_field('feature_related_film')); ?></em> &ndash; <?php } the_title(); ?></p>
							<?php the_post_thumbnail(); ?>
						</a>
					</article>
				
				<?php endwhile; ?>
				
				<?php wp_reset_query(); ?>
				<a href="<?php echo(site_url('category/from-the-archive')); ?>" class="view-all-page big">VIEW ALL</a>
			</aside>
		</div><!-- #secondary -->

	</div><!-- #primary -->

<?php get_footer(); ?>
