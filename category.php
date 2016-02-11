<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area width-75 bg-76">
	
		<header class="page-header bg-70">
			<h1 class="page-title">Features: <?php single_cat_title( '', true ); ?></h1>
		</header><!-- .page-header -->
	
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
					
					<?php if (has_post_thumbnail()): ?>
					<div class="width-25">
						<div class="entry-image"><?php the_post_thumbnail(); ?></div>
					</div>
					<?php endif; ?>
					
					<div class="width-75">			
						<header class="entry-header">
							<h6 class="entry-date"><?php the_date('F j, Y'); ?></h6>
							<?php if (is_category('q-and-a')) : ?>
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><em><?php echo(get_field('feature_related_film').'</em> &ndash; '.get_the_title()); ?></a></h3>
							<?php else : ?>
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<?php endif; ?>
							<h6 class="entry-author">by <?php 
								if (get_field('feature_author')) {  echo( get_field('feature_author') ); }
								else { the_author(); } 
							?></h6>
						</header><!-- .entry-header -->
					
						<div class="entry-content">
							<?php if ( get_the_excerpt() ) : ?>
								<?php the_excerpt(); ?>
							<?php else : ?>
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nbr' ) ); ?>
							<?php endif; ?>
						</div><!-- .entry-content -->
					</div>
					
				</article><!-- #post-## -->
			
			<?php endwhile; ?>
			
			<?php wp_pagenavi(); ?>
			
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

	<div id="secondary" class="widget-area news archives qa width-25" role="complementary">
		<?php if ( !is_category('news')) { get_template_part('module-news'); } ?>
		<?php if ( !is_category('from-the-archive')) { get_template_part('module-archives'); } ?>
		<?php if ( !is_category('q-and-a')) { get_template_part('module-qa'); } ?>
	</div><!-- #secondary -->

<?php get_footer(); ?>