<?php
/**
 * The template for displaying the archive of Awards by Year.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area bg-76">
		<div id="content" class="site-content" role="main">
			<?php 
			$award_years = get_terms('award-years', array('order'=>'DESC'));
			$current_year = $wp_query->queried_object->name;
			?>
			
			<header class="page-header bg-70">
				<h1 class="page-title"><?php single_term_title( '', true ); ?> Award Winners
					<?php $args = array('post_type'=>'galas', 'award-years'=> $current_year ); $galas = new WP_Query($args); 
					while ($galas->have_posts()) : $galas->the_post(); ?>
						<span class="faded-text divider">&nbsp;|&nbsp;</span><a href="<?php the_permalink(); ?>" class="faded-text gala-link"><?php the_title(); ?></a>
					<?php endwhile; wp_reset_query(); ?>
				</h1>
				<ul class="award-tax-list clear">
					<li class="award-tax">
						<ul class="award-year-list drawer">
							<?php foreach ($award_years as $award_year) { ?>
							<li><a href="<?php echo(site_url('/award-years/' . $award_year->slug)); ?>"><?php echo($award_year->name) ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Years</a>
					</li>
				</ul>
			</header><!-- .page-header -->		
						
			<div class="standard clear">			
			<?php while ( have_posts() ) : the_post();
			
			if (get_field('award_featured')) {
				$featured = get_field('award_featured');
				$featured = $featured[0];
			} else {
				$featured = '';
			} ?>

			<?php static $count = 0;
				if ($count == 101) { break; }
				else { ?>
						
				<?php 
				$formats = get_the_terms($post->ID, 'award-formats');
					if ($formats > 0) { 
						foreach ($formats as $format) { 
							$format_slug = $format->slug; 
						}
					}
				if (get_the_terms( $post->ID, 'award-names' )) {
					$post_award_names = get_the_terms( $post->ID, 'award-names' ); 
					foreach ( $post_award_names as $post_award_name ) { 
						$this_award_name_slug = $post_award_name->slug; 
						$this_award_name_name = $post_award_name->name;
						}
				}
				?>

				<?php if ( $format_slug == 'format-standard' ) : ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('format-standard ' . $featured); ?>>
						<div class="wrapper">
							<h6 class="award-name"><a href="<?php echo(site_url('/award-names/' . $this_award_name_slug)); ?>"><?php the_field('award_name'); ?></a></h6>
							<?php 
							if (get_field('award_recipients')) { ?>
								<p class="recipients">
								<?php while (has_sub_field('award_recipients')) {	
								$recipient = get_sub_field('recipient_name');
								?>
								<a href="<?php echo(site_url('/?s=' . $recipient)); ?>"><?php echo($recipient); ?></a>&nbsp;
								<?php } ?>
								</p> 
							<?php }
							if (get_field('films')) { ?>
								<p class="films">
								<?php while (has_sub_field('films')) {
								$film = get_sub_field('film_title');
								?>
								<a href="<?php echo(site_url('/?s=' . $film)); ?>"><?php echo($film) ?></a>&nbsp;
								<?php } ?>
								</p>
							<?php } ?>
						</div>
					</article>
				<?php endif; ?>
			
			<?php $count++; } ?>
			<?php endwhile; rewind_posts(); ?>
			</div>


			<div class="multi-list clear">
				<?php while ( have_posts() ) : the_post(); ?>			
							
					<?php 
					$formats = get_the_terms($post->ID, 'award-formats');
						if ($formats > 0) { 
							foreach ($formats as $format) { 
								$format_slug = $format->slug; 
							}
						}
					if (get_the_terms( $post->ID, 'award-names' )) {
						$post_award_names = get_the_terms( $post->ID, 'award-names' ); 
						foreach ( $post_award_names as $post_award_name ) { 
							$this_award_name_slug = $post_award_name->slug; 
							$this_award_name_name = $post_award_name->name;
							}
					}
					?>
	
					<?php if ( $format_slug == 'format-multiple' ) : ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('format-multiple'); ?>>
							<div class="wrapper">
								<h6 class="award-name"><a href="<?php echo(site_url('/award-names/' . $this_award_name_slug)); ?>"><?php the_field('award_name'); ?></a><span class="note">&nbsp;&nbsp;(in alphabetical order)</span></h6>
								<?php 
								if (get_field('award_recipients')) { ?>
									<p class="recipients">
									<?php while (has_sub_field('award_recipients')) {	
									$recipient = get_sub_field('recipient_name');
									?>
									<a href="<?php echo(site_url('/?s=' . $recipient)); ?>"><?php echo($recipient); ?></a>&nbsp;
									<?php } ?>
									</p> 
								<?php }
								if (get_field('films')) { ?>
									<p class="films">
									<?php while (has_sub_field('films')) {
									$film = get_sub_field('film_title');
									?>
									<a href="<?php echo(site_url('/?s=' . $film)); ?>"><?php echo($film) ?></a>&nbsp;
									<?php } ?>
									</p>
								<?php } ?>
							</div>
						</article>
					<?php endif; ?>
					
				<?php endwhile; rewind_posts(); ?>
			</div>

						
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>