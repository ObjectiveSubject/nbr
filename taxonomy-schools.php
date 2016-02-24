<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area bg-76">
		<div id="content" class="site-content" role="main">

			<?php
			$grant_years = get_terms('grant-year', array('order'=>'DESC'));
			$grant_schools = get_terms('schools');
			?>
			<header class="page-header bg-70">
				<h1 class="page-title"><?php single_term_title( '', true ); ?> Student Grant Awardees</h1>
				<ul class="grant-tax-list clear">
					<li class="grant-tax">
						<ul class="grant-year-list drawer">
							<?php foreach ($grant_years as $grant_year) { ?>
							<li><a href="<?php echo(site_url('/student-grants/grant-year/' . $grant_year->slug)); ?>"><?php echo($grant_year->name) ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Years</a>
					</li>
					<li class="grant-tax">
						<ul class="grant-school-list drawer">
							<?php foreach ($grant_schools as $grant_school) { ?>
							<li><a href="<?php echo(site_url('/student-grants/schools/' . $grant_school->slug)); ?>"><?php echo($grant_school->name) ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Schools</a>
					</li>
				</ul>
			</header><!-- .page-header -->

			<div class="grant-winners clear">
				<?php
				$count = 1;
				while ( have_posts() ) : the_post();
				if ($count % 2 == 0) { $evenodd = 'even'; } else { $evenodd = 'odd'; } ?>
				<?php
				$post_grant_years = get_the_terms( $post->ID, 'grant-year' );
				foreach ( $post_grant_years as $post_grant_year ) {
					$grantyear_name = $post_grant_year->name;
					$grantyear_slug = $post_grant_year->slug;
					}
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('green-hover '.$evenodd); ?>>
					<div class="wrapper clear">
						<?php if(get_field('project_still_frame')): ?>
						<div class="project-image"><a href="<?php the_permalink(); ?>"><img src="<?php the_field('project_still_frame'); ?>" alt="Student Grant" /></a></div>
						<?php else : ?>
						<div class="project-image placeholder"><a href="<?php the_permalink(); ?>"><img src="<?php echo(get_template_directory_uri().'/images/monogram.png'); ?>" alt="Student Grant Still Project Still Frame" /></a></div>
						<?php endif; ?>
						<p class="project-year small"><a href="<?php echo(site_url('/student-grants/grant-year/' . $grantyear_slug)); ?>"><?php echo($grantyear_name); ?></a></p>
						<p class="project-author"><?php the_field('project_author'); ?></p>
						<p class="project-title"><a href="<?php the_permalink(); ?>"><?php the_field('project_title'); ?></a></p>
					</div>
				</article>

				<?php $count++; endwhile; ?>
			</div>
			<?php nbr_content_nav( 'nav-below' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
