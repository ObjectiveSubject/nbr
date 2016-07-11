<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nbr
 */

get_header(); ?>

	<?php
		$grant_years 	= get_terms( array( 'taxonomy' => 'grant-year', 'order' => 'DESC' ) );
		$grant_schools 	= get_terms( array( 'taxonomy' => 'schools', 'orderby' => 'title', 'order' => 'ASC' ) );
		$student_awards = get_terms( array( 'taxonomy' => 'student_award', 'orderby' => 'term_order' ) );
		$this_year 		= single_term_title( '', false );
		$has_partners 	= false;
		while ( have_posts() ) : the_post();
			if ( get_post_type() == 'partners' ) {
				$has_partners = true;
				break;
			}
		endwhile; rewind_posts();
	?>

	<section id="primary" class="content-area bg-80">
		<div id="content" class="site-content" role="main">

			<header class="page-header flex bleed bg-70">

				<div class="header-half width-50">
					<div class="wrapper">
						<h1 class="page-title"><?php echo $this_year; ?> Student Grants</h1>
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
						</ul>
					</div>
				</div>

				<?php if ( $has_partners ) : ?>
				<div class="header-half grant-partners width-50 bg-76">
					<div class="wrapper">
						<?php if ( $student_awards ) :?>
							<p class="uppercase hug">
								<?php foreach ($student_awards as $student_award) : ?>
								<a class="<?php echo $student_award->slug; ?>" href="<?php echo get_term_link($student_award); ?>"><?php echo $student_award->name; ?></a><br>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>

			</header><!-- .page-header -->

			<?php // Grant Winners ------------------ // ?>
			<div class="grant-winners clear">
				<?php
				$count = 1;
				while ( have_posts() ) : the_post();
				if (get_post_type() == 'student-grants') :

					if ($count % 2 == 0) { $evenodd = 'even'; } else { $evenodd = 'odd'; }
					$post_grant_schools = get_the_terms( $post->ID, 'schools' );
					$post_awards = get_the_terms( $post->ID, 'student_award' ); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class($evenodd); ?>>
					<div class="wrapper clear">
						<?php if (get_field('project_still_frame')) : ?>
							<div class="project-image"><a href="<?php the_permalink(); ?>">
								<img src="<?php the_field('project_still_frame'); ?>" alt="Student Grant" />
							</a></div>
						<?php else : ?>
							<div class="project-image placeholder">
								<img src="<?php echo(get_template_directory_uri().'/images/monogram.png'); ?>" alt="Student Grant Still Project Still Frame" />
							</div>
						<?php endif; ?>

						<?php if ( $post_grant_schools ) : ?>
							<?php foreach ( $post_grant_schools as $post_grant_school ) { ?>
								<p class="project-school small uppercase"><a href="<?php echo get_term_link($post_grant_school); ?>"><?php echo $post_grant_school->name; ?></a></p>
							<?php } ?>
						<?php endif; ?>

						<p class="project-author"><?php the_field('project_author'); ?></p>
						<p class="project-title">
							<?php if(get_field('project_trailer') || get_the_excerpt() || get_the_content() ) { ?>
								<a href="<?php the_permalink(); ?>"><em><?php the_field('project_title'); ?></em></a>
							<?php } else {
								echo '<em>' . get_field('project_title') . '</em>';
							} ?>
						</p>

						<?php if ( $post_awards ) : ?>
							<p class="project-awards small push uppercase">
								<?php foreach ( $post_awards as $post_award ) : ?>
								<a class="<?php echo "award-{$post_award->slug}"; ?>" href="<?php echo get_term_link($post_award); ?>"><?php echo $this_year .' '. $post_award->name; ?> Winner</a><br/>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
					</div>
				</article>

				<?php $count++; endif; endwhile; ?>
			</div>

			<?php nbr_content_nav( 'nav-below' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
