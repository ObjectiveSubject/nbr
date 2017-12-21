<?php
/**
 * The Template for displaying all single posts.
 *
 * @package nbr
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content width-75 bg-0" role="main">

		<?php while ( have_posts() ) : the_post();
			$cats = get_the_terms($post->ID, 'category');
			  foreach ($cats as $cat) {
				  $cat_term = $cat->slug;
			  }
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="page-header bg-12">
				<h1 class="page-title"><?php if (get_field('feature_related_film')) { ?><em><?php echo(get_field('feature_related_film')); ?></em> &ndash; <?php } the_title(); ?></h1>
				<div class="entry-meta text-50">
					<?php if ($cat_term == 'q-and-a') : ?>
					<h6><?php the_date('F j, Y'); ?></h6>
					<?php else : ?>
					<h6><?php the_date('F Y'); ?></h6>
					<?php endif; ?>
<!--
					<p>by <?php
						if (get_field('feature_author')) {  echo( get_field('feature_author') ); }
						else { the_author(); }
					?></p>
-->
				</div>
			</header>

			<div class="entry-media post">

			  	<script>
					<?php var_dump( get_field('feature_slideshow_images') ); ?>  
				</script>

				<?php if( have_rows('feature_slideshow_images') ): ?>
				<ul class="post-slides nbr-slider" data-slick='{ "prevArrow": ".slick-nav.prev", "nextArrow": ".slick-nav.next" }'>
					
					<?php while( have_rows('feature_slideshow_images') ) : the_row(); ?>

						<li>
							<div class="image bg-80">
								<div class="image-wrapper">
									<img src="<?php the_sub_field('feature_slideshow_image'); ?>" alt="slideshow image"/>
								</div>
							</div>
							<?php 
							$feature_slideshow_image_caption = get_sub_field('feature_slideshow_image_caption');
							if ( $feature_slideshow_image_caption ) : ?>
								<div class="caption bg-12"><?php echo $feature_slideshow_image_caption; ?></div>
							<?php endif; ?>
						</li>

					<?php endwhile; ?>

				</ul>
				<div class="slick-nav-arrows">
					<a href="#" class="slick-nav prev">Previous</a>
					<a href="#" class="slick-nav next">Next</a>
				</div>
				<?php endif; ?>
			</div>

			<div class="entry-content">
				<?php the_content(); ?>
				<div class="share clear">
					<h6>Share</h6>
					<div class="share-button-wrap twitter">
						<span class="icon">Twitter</span>
						<span class="link">
							<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-text="<?php echo get_the_title().' @NBRfilm'; ?>">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</span>
					</div>
					<div class="share-button-wrap facebook">
						<span class="icon">Facebook</span>
						<span class="link">
							<div class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-type="button_count"></div>
						</span>
					</div>
					<div class="share-button-wrap email">
						<?php $title = str_replace(array("&#038;","&amp;"), " and ", get_the_title()); ?>
						<a href="mailto:?subject=National%20Board%20of%20Review%20|%20<?php if (get_field('feature_related_film')) { ?><?php echo(get_field('feature_related_film')); ?>&nbsp;&ndash;&nbsp;<?php } echo $title; ?>&amp;body=<?php the_permalink(); ?>" class="icon">Email</a>
					</div>
				</div>
			</div>

		</article>
		<?php endwhile; ?>

		</div><!-- #content -->
		<div id="secondary" class="widget-area news archives qa width-25" role="complementary">
			<?php get_template_part('module-qa'); ?>
			<?php get_template_part('module-news'); ?>
			<?php get_template_part('module-archives'); ?>
		</div>
	</div><!-- #primary -->



<?php get_footer(); ?>
