<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area bg-80">
		<div id="content" class="site-content" role="main">

			<?php
			$grant_years 	= get_terms( array( 'taxonomy' => 'grant-year', 'order' => 'DESC' ) );
			$grant_schools 	= get_terms( array( 'taxonomy' => 'schools', 'orderby' => 'title', 'order' => 'ASC' ) );
			$student_awards = get_terms( array( 'taxonomy' => 'student_award', 'orderby' => 'term_order' ) );
			?>
			<header class="page-header bg-70">
				<h1 class="page-title"><?php single_term_title( '', true ); ?> Student Awards</h1>
				<ul class="grant-tax-list clear">
					<li class="grant-tax">
						<ul class="grant-year-list drawer">
							<?php foreach ($grant_years as $grant_year) { ?>
							<li><a href="<?php echo get_term_link($grant_year); ?>"><?php echo $grant_year->name; ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Years</a>
					</li>
					<li class="grant-tax">
						<ul class="grant-school-list drawer">
							<?php foreach ($grant_schools as $grant_school) { ?>
							<li><a href="<?php echo get_term_link($grant_school); ?>"><?php echo $grant_school->name; ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Schools</a>
					</li>
					<li class="grant-tax">
						<ul class="grant-award-list drawer">
							<?php foreach ($student_awards as $student_award) { ?>
							<li><a href="<?php echo get_term_link($student_award); ?>"><?php echo $student_award->name; ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Awards</a>
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
								<p class="project-year small"><a href="<?php echo get_term_link($post_grant_year); ?>"><?php echo $post_grant_year->name; ?></a></p>
							<?php endforeach; ?>
						<?php endif; ?>

						<p class="project-author"><?php the_field('project_author'); ?></p>
						<p class="project-title"><a href="<?php the_permalink(); ?>"><em><?php the_field('project_title'); ?></em></a></p>

						<?php if ( $post_awards ) : ?>
							<p class="project-awards small push uppercase">
								<?php foreach ( $post_awards as $post_award ) : ?>
								<a class="<?php echo "award-{$post_award->slug}"; ?>" href="<?php echo get_term_link($post_award); ?>"><?php echo $this_year .' '. $post_award->name; ?> Winner</a><br>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
					</div>
				</article>

				<?php $count++; endwhile; ?>
			</div>
			<?php nbr_content_nav( 'nav-below' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
