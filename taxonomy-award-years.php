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

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( has_term('format-standard', 'award-formats', get_the_ID()) ) {

						get_template_part('content', 'award-year-award');

					} ?>

				<?php endwhile; rewind_posts(); ?>

			</div>


			<div class="multi-list clear">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( has_term('format-multiple', 'award-formats', get_the_ID()) ) {

						get_template_part('content', 'award-year-award');

					} ?>

				<?php endwhile; ?>

			</div>


		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
