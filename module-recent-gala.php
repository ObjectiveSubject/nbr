<?php
//$spnsr_year_slctn = get_field('sponsor_year');
//$sponsor_year = $spnsr_year_slctn->slug;

$award_years = get_terms('award-years', array('orderby'=>'name', 'order'=>'DESC'));
$recent_year = $award_years[0]->slug;
$galas = new WP_Query(array('post_type'=>'galas', 'award-years'=> $recent_year )); ?>

<? while ($galas->have_posts()) : $galas->the_post(); ?>
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