<?php
/**
 * The Template for displaying Gala single posts.
 *
 * @package nbr
 */

get_header(); ?>

	<div id="primary" class="content-area bg-82">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<header class="gala-header bg-80 clear <?php if(get_field('gala_sponsor')) { echo('has-sponsor'); } ?>">
			<div class="width-75">
				<div class="page-header">
					<?php
					$post_award_years = get_the_terms( $post->ID, 'award-years' );
					foreach ( $post_award_years as $post_award_year ) { $this_year = $post_award_year->slug; }
					?>
					<h1 class="page-title"><?php the_title(); ?><span class="faded-text divider">&nbsp;&nbsp;|&nbsp;&nbsp;</span><span class="faded-text award-link"><a href="<?php echo site_url('/award-years/'.$this_year); ?>">See The Winners</a></span></h1>

<!--
					<?php if(get_field('partners')) : ?>
						<div class="partners clear bg-82">
							<h6 class="module-label">In association with</h6>
							<?php while (have_rows('partners')) : the_row('partners'); ?>
								<?php $partner = get_sub_field('partner_object'); ?>
								<a href="<?php echo site_url('/partners/'.$this_year); ?>" class="partner"><img src="<?php the_field('partner_logo', $partner->ID); ?>"/></a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
-->

					<?php // Partners --------------------- //
						$args = array('post_type'=>'partners', 'award-years'=>$this_year);
						$partners = get_posts($args);
						if (!empty($partners)) : ?>
						<div class="partners clear bg-82">
							<h6 class="module-label">In association with</h6>
							<?php foreach ($partners as $partner) : ?>
							<a href="<?php echo site_url('/partners/'.$this_year); ?>" class="partner"><img src="<?php the_field('partner_logo', $partner->ID); ?>"/></a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<div class="share-button-wrap twitter">
						<span class="icon">Twitter</span>
						<span class="link">
							<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-text="<?php echo 'Great photos from the #NBRGala! H/t to @NBRfilm '; ?>">Tweet</a>
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
						<a href="mailto:?subject=National%20Board%20of%20Review%20|%20<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="icon">Email</a>
					</div>

					<div class="thumb-nav">
						<ul class="gala_slides_tabs" data-slick='{ "prevArrow": ".thumb-nav.prev", "nextArrow": ".thumb-nav.next" }'>
							<?php while(has_sub_field('gala_slideshow')): ?>
							<li>
								<?php $image = get_sub_field('gala_image'); $url = $image['url']; ?>
								<a href="#" style="background-image: url('<?php echo($url); ?>');"></a>
							</li>
							<?php endwhile; ?>
						</ul>
						<a href="#" class="slick-nav thumb-nav prev yellow-hover">Previous</a>
						<a href="#" class="slick-nav thumb-nav next yellow-hover">Next</a>
					</div>
				</div>
			</div>
			<div class="gala-years width-25 bg-70">
				<div class="wrapper bg-70">
					<h2>Galas</h2>
					<?php
					$args = array('post_type'=>'galas', 'posts_per_page'=>-1);
					$galas = new WP_Query($args); ?>
					<ul class="drawer">
					<?php while ( $galas->have_posts() ) : $galas->the_post(); ?>
						<?php $years = get_the_terms($post->ID, 'award-years'); ?>
						<li><a href="<?php the_permalink(); ?>"><?php foreach($years as $year) { echo($year->name); } ?></a></li>
					<?php endwhile; ?>
					</ul>
					<?php wp_reset_query(); ?>
					<a href="#" class="view-all-drawer">View All Years</a>
				</div>
			</div>
		</header>

		<div class="entry-media gala clear">

			<ul class="gala-slideshow bg-86 clear" data-slick='{ "prevArrow": ".main-slick-nav.prev", "nextArrow": ".main-slick-nav.next" }'>
				<?php while(has_sub_field('gala_slideshow')): ?>
					<?php
					$image = get_sub_field('gala_image');
					$url = $image['url'];
					$alt = $image['alt'];
					$title = $image['title'];
					$caption = $image['caption'];
					?>
					<li>
						<div class="image bg-82">
							<div class="image-wrapper">
								<img src="<?php echo($url); ?>" alt="<?php if($alt){echo($alt);} else {echo($title);} ?>" title="<?php echo($title); ?>" />
							</div>
						</div>
						<div class="title-caption">
							<h2><?php echo($title); ?></h2>
							<p><?php echo($caption); ?></p>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
			<a href="#" class="slick-nav main-slick-nav prev">Previous</a>
			<a href="#" class="slick-nav main-slick-nav next">Next</a>
		</div>

		<div class="width-50 bg-80">
			<div class="entry-content">
				<?php the_content(); ?>
				<a href="<?php echo site_url('/award-years/'.$this_year); ?>" class="view-all-page big">See The Winners</a>
			</div>
		</div>
		<div class="width-50">
			<div class="entry-summary">
				<p class="quote"><?php the_field('gala_quote'); ?></p>
				<p class="author"><?php the_field('gala_quote_source'); ?></p>
			</div>
		</div>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
