<?php
/**
 * The Template for displaying Student Grant single posts.
 *
 * @package nbr
 */

get_header(); ?>

	<?php
	$grant_years = get_the_terms( $post->ID,'grant-year');
	$post_awards = get_the_terms( $post->ID, 'student_award' );
	$awards_classes = '';
	$this_grant_year = '';
	if ( $grant_years ) {
		foreach ( $grant_years as $grant_year ) {
			$this_grant_year = $grant_year->name;
		}
	}
	if ( $post_awards ) {
		foreach ( $post_awards as $award ) {
			$awards_classes .= $award->slug . ' ';
		}
	} ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content single-student-grant width-75 bg-76 <?php echo ( $awards_classes ) ? 'student_award-'. $awards_classes : ''; ?>" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<header class="page-header bg-70">
				<h1 class="page-title"><em><?php the_field('project_title'); ?></em></h1>
				<h2 class="page-subtitle"><?php the_field('project_subtitle'); ?></h2>

				<?php // Partners --------------------- //
					if ( get_field('partners') ) :
					$partners = get_field('partners'); ?>
					<div class="partners clear bg-76">
						<h6 class="module-label">In association with</h6>
						<?php foreach ( $partners as $partner ) : ?>
						<a href="<?php echo site_url('/partners/'.$this_grant_year); ?>" class="partner"><img src="<?php the_field('partner_logo', $partner->ID); ?>"/></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</header>

			<?php if ( get_field('project_trailer') || get_field('project_still_frame') ) : ?>
			<div class="entry-media bg-72">
				<?php if( get_field('project_trailer') ) : ?>
					<?php the_field('project_trailer'); ?>
				<?php elseif ( get_field('project_still_frame') ) : ?>
					<img src="<?php the_field('project_still_frame'); ?>" alt="<?php the_field('project_title'); ?> project still frame" />
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<div class="share-grant clear bg-80">
				<span class="cta">Share this project:&nbsp;&nbsp;&nbsp;</span>
				<div class="share-button-wrap twitter">
					<span class="icon">Twitter</span>
					<span class="link">
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-text="<?php echo get_the_title().' @NBRfilm'; ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</span>
				</div>
				<div class="share-button-wrap facebook">
					<span class="icon">Facebook</span>
					<span class="link">
						<div class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-type="button_count"></div>
					</span>
				</div>
				<div class="share-button-wrap email">
					<a href="mailto:?subject=NBR%20<?php echo $this_grant_year; ?>%20Grant%20Winner%20|%20<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="icon">Email</a>
				</div>
			</div>


			<?php if ( get_the_excerpt() || get_the_content() ) : ?>
			<div class="width-66">
				<div class="entry-summary bg-74">
					<?php the_excerpt(); ?>
				</div>
				<div class="entry-content bg-72">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endif; ?>


			<div class="width-33">

				<div class="project-details">
					<?php if ( $post_awards ) : ?>
						<p class="small uppercase"><strong>Awarded</strong></p>
						<?php if ( $post_awards ) : ?>
							<p class="project-awards small uppercase">
								<?php foreach ( $post_awards as $award ) : ?>
								<a class="<?php echo "award-{$award->slug}"; ?>" href="<?php echo get_term_link($award); ?>"><strong><?php echo "{$this_grant_year} {$award->name}"; ?></strong></a>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
						<p>&nbsp;</p>
					<?php endif; ?>
					<?php if ( get_field('project_details') ) {
						the_field('project_details');
					} ?>
				</div>
			</div>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<div id="secondary" class="widget-area grant-years width-25" role="complementary">
			<?php get_template_part('module-grant-years'); ?>
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>
