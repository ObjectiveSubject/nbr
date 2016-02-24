<?php
/**
 * Student Award Archive.
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area bg-80">
		<div id="content" class="site-content" role="main">

			<?php
				$award_name = single_term_title( '', false );
			?>

			<?php if ( term_description() ) : ?>
			<header class="page-header bg-84">
				<h1 class="page-title">About the <?php echo $award_name; ?></h1>
			</header><!-- .page-header -->

			<div class="page-header award-content bg-0">
				<?php echo apply_filters('the_content', term_description()); ?>
			</div>
			<?php endif; ?>

			<header class="page-header bg-84">
				<h1><?php echo $award_name; ?> Winners</h1>
			</header><!-- .page-header -->

			<?php // Grant Winners ------------------ // ?>
			<div class="grant-winners clear">
				<?php
				$count = 1;
				while ( have_posts() ) : the_post();

					if ($count % 2 == 0) { $evenodd = 'even'; } else { $evenodd = 'odd'; }
					$post_grant_schools = get_the_terms( $post->ID, 'schools' );
					$grant_years = get_the_terms( $post->ID, 'grant-year' ); ?>

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
								<p class="project-year small"><a href="<?php echo(site_url('/student-grants/grant-year/' . $grant_year->slug)); ?>"><?php echo( $grant_year->name ); ?></a></p>
							<?php } ?>
						<?php endif; ?>

						<?php if ( $post_grant_schools ) : ?>
							<?php foreach ( $post_grant_schools as $post_grant_school ) { ?>
								<p class="project-school small uppercase"><a href="<?php echo(site_url('/student-grants/schools/' . $post_grant_school->slug)); ?>"><?php echo( $post_grant_school->name ); ?></a></p>
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
					</div>
				</article>

				<?php $count++; endwhile; ?>
			</div>

			<?php nbr_content_nav( 'nav-below' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
