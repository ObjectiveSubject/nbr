<?php
/**

Template Name: Partners

 */
global $post;
$galaPartners = array();
$grantPartners = array();

get_header(); ?>

	<div id="primary" class="content-area partners-list partners-page">
		<div id="content" class="site-content width-75 bg-76" role="main">

			<header class="page-header bg-70">
				<h1 class="page-title">Partners</h1>
			</header>

			<?php
			$args = array('post_type'=>'partners');
			$partners = new WP_Query($args);
			while ( $partners->have_posts() ) : $partners->the_post();

				if (has_term('gala-partner', 'partner-type')) { ?>
					<? array_push($galaPartners, $post);
				}
				if (has_term('student-grant-partner', 'partner-type')) { ?>
					<? array_push($grantPartners, $post);
				}

			endwhile; ?>

			<?php if (!empty($galaPartners)) : ?>
			<div class="gala-partners">
				<header class="page-header">
					<h2 class="page-title">Gala Partners</h2>
				</header>
				<? foreach($galaPartners as $galaPartner) {
					$post = $galaPartner; setup_postdata($post);
					get_template_part('loop-partners');
				} wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>

			<?php if (!empty($grantPartners)) : ?>
			<div class="grant-partners">
				<header class="page-header">
					<h2 class="page-title">Student Grant Partners</h2>
				</header>
				<? foreach($grantPartners as $grantPartner) {
					$post = $grantPartner; setup_postdata($post);
					get_template_part('loop-partners');
				} wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>

		</div><!-- #content -->

		<div id="secondary" class="widget-area awards width-25" role="complementary">
			<aside id="awards-module" class="widget widget-awards bg-84">
				<?php
				$award_years = get_terms( array( 'taxonomy' => 'award-years', 'orderby'=>'name', 'order'=>'DESC' ) );
				$recent_year = $award_years[0]->slug;

				$galas = new WP_Query(array('post_type'=>'galas', 'award-years'=> $recent_year ));
				while ($galas->have_posts()) : $galas->the_post(); ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if (get_field('gala_sponsor') ) : ?>
					<div class="award-sponsor">
						<h6>Presented by</h6>
						<img src="<?php the_field('gala_sponsor'); ?>" alt="Gala Sponsor" />
					</div>
					<?php endif; ?>
					<div class="entry-media">
						<?php
						$slides = get_field('gala_slideshow'); $count = count($slides);
						if ($count > 0) { $img_one = $slides[0]; }
						if ($count > 1) { $img_two = $slides[1]; }
						if ($count > 2) { $img_three = $slides[2]; }
						?>
						<ul class="gala-images clear">
							<?php if ($count > 0) {
								$img_one_object = $img_one['gala_image'];
								$img_one_url = $img_one_object['url'];
								$img_one_alt = $img_one_object['alt'];
								?>
								<li><a href="<?php the_permalink(); ?>"><img src="<?php echo($img_one_url); ?>" alt="<?php echo($img_one_alt); ?>" /></a></li>
							<?php } ?>
							<?php if ($count > 1) {
								$img_two_object = $img_two['gala_image'];
								$img_two_url = $img_two_object['url'];
								$img_two_alt = $img_two_object['alt'];
								?>
								<li><a href="<?php the_permalink(); ?>"><img src="<?php echo($img_two_url); ?>" alt="<?php echo($img_two_alt); ?>" /></a></li>
							<?php } ?>
								<?php if ($count > 2) {
								$img_three_object = $img_three['gala_image'];
								$img_three_url = $img_three_object['url'];
								$img_three_alt = $img_three_object['alt'];
								?>
								<li><a href="<?php the_permalink(); ?>"><img src="<?php echo($img_three_url); ?>" alt="<?php echo($img_three_alt); ?>" /></a></li>
							<?php } ?>
						</ul>
					</div>
				<?php endwhile; ?>
			</aside>
		</div><!-- #secondary -->

	</div><!-- #primary -->

<?php get_footer(); ?>
