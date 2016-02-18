<?php
/**

The Home Page

*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
			$args = array('pagename'=>'home');
			$home_page = new WP_Query($args);
			while ($home_page->have_posts()) : $home_page->the_post();
			?>
			<div class="entry-media home bg-80 teal-hover">
				<?php if(get_field('home_page_slides')) : ?>
				<ul class="home-slides nbr-slider" data-slick='{ "prevArrow": ".slick-nav.prev", "nextArrow": ".slick-nav.next" }'>
					<?php while (has_sub_field('home_page_slides')) : ?>
						<?php
						$post_object = get_sub_field('home_slide_link_object');
						$post_link = $post_object->guid;
						$post_title = $post_object->post_title;
						?>
						<li>
							<div class="slide-image bg-86"><img src="<?php the_sub_field('home_slide_image'); ?>" alt="home slide image" /></div>
							<div class="slide-content">
								<?php if (get_sub_field('home_slide_title')) : ?>
								<div class="h2">
									<a href="<?php echo($post_link); ?>" title="<?php echo($post_title); ?>"><?php the_sub_field('home_slide_title'); ?></a>
								</div>
								<?php endif; ?>
								<?php if (get_sub_field('home_slide_content_image')) { ?>
								<div class="sponsor">
									<h6><?php the_sub_field('home_slide_content_text'); ?></h6>
									<img src="<?php the_sub_field('home_slide_content_image'); ?>"/>
								</div>
								<?php } ?>
								<a href="<?php echo($post_link); ?>" title="<?php echo($post_title); ?>" class="slide-link big"><?php the_sub_field('home_slide_link_text'); ?></a>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="slick-nav-arrows">
					<a href="#" class="slick-nav prev">Previous</a>
					<a href="#" class="slick-nav next">Next</a>
				</div>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>

			<div class="home-features clear">
				<div class="archives feature width-25">
				<?php get_template_part('module-archives'); ?>
				</div>
				<div class="qa feature width-25">
				<?php get_template_part('module-qa'); ?>
				</div>
				<div class="news feature width-50">
				<?php get_template_part('module-news'); ?>
				</div>
			</div>


			<div class="home-about clear">
					<?php
					$args = array('pagename'=>'home');
					$home_page = new WP_Query($args);
					while ($home_page->have_posts()) : $home_page->the_post();
					?>
					<div class="content width-75">
						<div class="wrapper">
							<?php the_field('home_about_content'); ?>
						</div>
					</div>
					<div class="image width-25"><img src="<?php the_field('home_about_image'); ?>" alt="about national board of review image"/></div>
					<?php endwhile; ?>
			</div>




		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
