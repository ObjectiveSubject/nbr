<?php
/**
 * Student Award Archive.
 *
 * @package nbr
 */

get_header(); ?>

	<?php
	$grant_years = get_terms('grant-year', array('order'=>'DESC'));
	$grant_schools = get_terms('schools');
	$student_awards = get_terms('student_award');
	$queried_object = get_queried_object();
	$award_name = single_term_title( '', false );
	$archive_title = get_field('term_archive_title', $queried_object) ?>

	<section id="primary" class="content-area bg-80">
		<div id="content" class="site-content" role="main">

			<?php if ( term_description() ) : ?>

				<header class="page-header bg-84">
					<h1 class="page-title"><?php echo ($archive_title) ? $archive_title : "About the {$award_name}"; ?></h1>
				</header><!-- .page-header -->

				<div class="page-header award-content bg-0">
					<div class="term-image">
						<?php $image = get_field('term_image', $queried_object); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
						<span class="caption"><?php echo $image['caption']; ?></span>
					</div>
					<?php echo apply_filters('the_content', term_description()); ?>
				</div>

			<?php endif; ?>

			<header class="page-header bg-84">
				<h1><?php echo $award_name; ?> Winners</h1>
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

			<?php // Grant Winners ------------------ // ?>
			<div class="grant-winners clear infinite-scroll-container">
				<?php
				$count = 1;
				while ( have_posts() ) : the_post();

					if ($count % 2 == 0) { $evenodd = 'even'; } else { $evenodd = 'odd'; }
					$post_grant_schools = get_the_terms( $post->ID, 'schools' );
					$grant_years = get_the_terms( $post->ID, 'grant-year' );
					$post_awards = get_the_terms( $post->ID, 'student_award' );
					$this_year = $grant_years[0]->name; ?>

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

						<?php if ( $grant_years ) : ?>
							<?php foreach ( $grant_years as $grant_year ) { ?>
								<p class="project-year small"><a href="<?php echo get_term_link($grant_year); ?>"><?php echo( $grant_year->name ); ?></a></p>
							<?php } ?>
						<?php endif; ?>

						<?php if ( $post_grant_schools ) : ?>
							<?php foreach ( $post_grant_schools as $post_grant_school ) { ?>
								<p class="project-school small uppercase"><a href="<?php echo get_term_link($post_grant_school); ?>"><?php echo( $post_grant_school->name ); ?></a></p>
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
								<?php foreach ( $post_awards as $post_award ) :
									if ( $queried_object->term_id !== $post_award->term_id ) : ?>
										<a class="<?php echo "award-{$post_award->slug}"; ?>" href="<?php echo get_term_link($post_award); ?>"><?php echo $this_year .' '. $post_award->name; ?> Winner</a><br/>
									<?php endif; ?>
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
