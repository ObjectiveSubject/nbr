<?php
/*

Student Grant Years Module

*/
?>

<?php //Get the Grant Year of the current Student Grant
$post_grant_years = get_the_terms( $post->ID, 'grant-year' );
foreach ( $post_grant_years as $post_grant_year ) { $year = $post_grant_year->slug; }
?>
<?php
$args = array(
			'post_type'=>'student-grants',
			'tax_query' => array(
				array(
					'taxonomy' => 'grant-year',
					'field' => 'slug',
					'terms' => $year
				)
			),
			'posts_per_page'=>-1
			);
$grant_winners = new WP_Query ($args);
?>

<aside id="grants-module" class="widget widget-grants bg-86">
	<div class="grant-header bg-82">
		<h2><?php echo($year); ?><br>Student Grant Awardees</h2>
		<ul class="grant-tax-list clear">
			<li class="grant-tax">
				<ul class="grant-year-list drawer">
					<?php
					$grant_years = get_terms('grant-year', array('order'=>'DESC'));
					foreach ($grant_years as $grant_year) { ?>
					<li><a href="<?php echo(site_url('/student-grants/grant-year/' . $grant_year->slug)); ?>"><?php echo($grant_year->name) ?></a></li>
					<?php } ?>
				</ul>
				<a href="#" class="view-all-drawer">View All Years</a>
			</li>
		</ul>
	</div>
	<div class="grant-winners">
		<?php while ( $grant_winners->have_posts() ) : $grant_winners->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php
				$post_awards = get_the_terms( $post->ID, 'student_award' );
				$this_post_grant_years = get_the_terms( $post->ID, 'grant-year' );
				foreach ( $this_post_grant_years as $this_post_grant_year ) {
					$this_year = $this_post_grant_year->slug;
				}

				if(get_field('project_trailer') || get_the_excerpt() || get_the_content() ) : ?>
					<a href="<?php the_permalink(); ?>" class="clear">
				<?php else : ?>
					<a href="<?php echo(site_url('/student-grants/grant-year/' . $this_year)); ?>" class="clear">
				<?php endif; ?>

					<?php if (get_field('project_still_frame')) : ?>
					<img src="<?php the_field('project_still_frame'); ?>" alt="Student Grant" />
					<?php else : ?>
					<img src="<?php echo(get_template_directory_uri().'/images/monogram.png'); ?>" alt="Student Grant Still Project Still Frame" class="placeholder" />
					<?php endif; ?>

					<p class="project-title"><?php the_field('project_title'); ?></p>
					<p class="project-author small uppercase"><?php the_field('project_author'); ?></p>

					<?php if ( $post_awards ) : ?>
						<?php foreach ( $post_awards as $post_award ) : ?>
							<p class="project-award small push uppercase"><?php echo $this_year .' '. $post_award->name; ?> Winner</p>
						<?php endforeach; ?>
					<?php endif; ?>
				</a>

			</article>
		<?php endwhile; ?>
	</div>
</aside>

<?php wp_reset_query(); ?>
