<?php
/**

Template Name: Partners

 */

get_header(); ?>

	<div id="primary" class="content-area">	
		<div id="content" class="site-content width-75 bg-76" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
			<header class="page-header bg-70">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<ul class="partner-links clear">
					<?php 
					while (has_sub_field('partners')) : ?>
					<li><a href="<?php echo (get_sub_field('partner_link')); ?>" class="big"><?php echo (get_sub_field('partner_name')); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</header>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class('partners'); ?>>
				<div class="entry-content">
					<?php while ( has_sub_field('partners')) : ?>
						<div class="partner">
							<img src="<?php echo(get_sub_field('partner_image')); ?>" width="750" />
							<h2><?php echo(get_sub_field('partner_name')); ?></h2>
							<p><?php echo(get_sub_field('partner_description')); ?></p>
						</div>
					<?php endwhile; ?> 
				</div>
			</article>
			
		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<div id="secondary" class="widget-area awards width-25" role="complementary">
			<aside id="awards-module" class="widget widget-awards bg-84">
				<?php
				$spnsr_year_slctn = get_field('sponsor_year');
				$sponsor_year = $spnsr_year_slctn->slug;
/*
				$award_years = get_terms('award-years', array('orderby'=>'name', 'order'=>'DESC'));
				$recent_year = $award_years[0]->slug;
*/
				$galas = new WP_Query(array('post_type'=>'galas', 'award-years'=> $sponsor_year ));
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
