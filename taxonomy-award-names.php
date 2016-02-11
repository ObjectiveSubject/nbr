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
			
			<?php $award_names = get_terms('award-names', array('orderby'=>'title'));?>
			
			<header class="page-header bg-70">
				<h1 class="page-title"><?php single_term_title( '', true ); ?><span class="faded-text">&nbsp;&nbsp;|&nbsp;&nbsp;Archive</span></h1>
				<ul class="award-tax-list clear">
					<li class="award-tax">
						<ul class="award-name-list drawer">
							<?php foreach ($award_names as $award_name) { ?>
							<li><a href="<?php echo(site_url('/award-names/' . $award_name->slug)); ?>"><?php echo($award_name->name) ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Awards</a>
					</li>
				</ul>
			</header><!-- .page-header -->		
						
			<div class="clear">			
			<?php while ( have_posts() ) : the_post(); ?>
			<?php static $count = 0;
				if ($count == -1) { break; }
				else { ?>

						
				<?php 
				$formats = get_the_terms($post->ID, 'award-formats');
				if ($formats > 0) { 
					foreach ($formats as $format) { 
						$format_slug = $format->slug; 
					}
				}
				$post_award_years = get_the_terms( $post->ID, 'award-years' ); 
				foreach ( $post_award_years as $post_award_year ) { 
					$this_year_slug = $post_award_year->slug; 
					$this_year_name = $post_award_year->name;
					}
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( $format_slug . ' ' . $featured); ?>>
					<div class="wrapper">
						<h6 class="award-name"><a href="<?php echo(site_url('/award-years/' . $this_year_slug)); ?>"><?php echo $this_year_name; ?></a>&nbsp;<?php the_field('award_name'); ?></h6>
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
			
			<?php $count++; } ?>
			<?php endwhile; ?>
			</div>
						
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>