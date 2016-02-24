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
					$this_year = $post_grant_year->name;
				}
				$post_awards = get_the_terms( $post->ID, 'student_award' ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class($evenodd); ?>>
					<div class="wrapper clear">
						<?php if(get_field('project_still_frame')): ?>
							<div class="project-image"><a href="<?php the_permalink(); ?>"><img src="<?php the_field('project_still_frame'); ?>" alt="Student Grant" /></a></div>
						<?php else : ?>
							<div class="project-image placeholder"><a href="<?php the_permalink(); ?>"><img src="<?php echo(get_template_directory_uri().'/images/monogram.png'); ?>" alt="Student Grant Still Project Still Frame" /></a></div>
						<?php endif; ?>

						<?php if ( $post_grant_years ) : ?>
							<?php foreach ( $post_grant_years as $post_grant_year ) : ?>
								<p class="project-year small"><a href="<?php echo(site_url('/student-grants/grant-year/' . $post_grant_year->slug)); ?>"><?php echo $post_grant_year->name; ?></a></p>
							<?php endforeach; ?>
						<?php endif; ?>

						<p class="project-author"><?php the_field('project_author'); ?></p>
						<p class="project-title"><a href="<?php the_permalink(); ?>"><em><?php the_field('project_title'); ?></em></a></p>

						<?php if ( $post_awards ) : ?>
							<?php foreach ( $post_awards as $post_award ) : ?>
								<p class="project-award small push uppercase <?php echo $post_award->slug; ?>"><a href="<?php echo(site_url('/student-grants/awards/' . $post_award->slug )); ?>"><?php echo $this_year .' '. $post_award->name; ?> Winner</a></p>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</article>

				<?php $count++; endwhile; ?>
			</div>
			<?php nbr_content_nav( 'nav-below' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
