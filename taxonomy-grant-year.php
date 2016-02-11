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
			$this_year = single_term_title( '', false );
			?>	
			<header class="page-header bg-70">
				<h1 class="page-title"><?php echo $this_year; ?> Student Grant Awardees</h1>

				<?php // Partners --------------------- //
				$has_partners = false;
				
				while ( have_posts() ) : the_post();
					if (get_post_type() == 'partners') { 
						$has_partners = true; 
						break; 
					} 
				endwhile; rewind_posts(); ?>
				
				<?php if ($has_partners) : ?>
				<h6 class="module-label">In association with</h6>
				<div class="partners clear bg-76">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if (get_post_type() == 'partners') : ?>
						<a href="<?php echo site_url('/partners/'.$this_year); ?>" class="partner"><img src="<?php the_field('partner_logo', $partner->ID); ?>"/></a>
						<?php endif; ?>
					<?php endwhile; rewind_posts(); ?>
				</div>
				<?php endif; ?>

				<?php // Grant Years & Schools -------- // ?>
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

			<?php // Grant Winners ------------------ // ?>
			<div class="grant-winners clear">				
				<?php 
				$count = 1;
				while ( have_posts() ) : the_post(); 
				if (get_post_type() == 'student-grants') :
				
					if ($count % 2 == 0) { $evenodd = 'even'; } else { $evenodd = 'odd'; }
					$post_grant_schools = get_the_terms( $post->ID, 'schools' );
					foreach ( $post_grant_schools as $post_grant_school ) { 
						$school_name = $post_grant_school->name; 
						$school_slug = $post_grant_school->slug; 
					} ?>
						
					<article id="post-<?php the_ID(); ?>" <?php post_class('green-hover '.$evenodd); ?>>
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
						<p class="project-school"><a href="<?php echo(site_url('/student-grants/schools/' . $school_slug)); ?>"><?php echo($school_name); ?></a></p>
						<p class="project-author"><?php the_field('project_author'); ?></p>
						<p class="project-title">
							<?php if(get_field('project_trailer') || get_the_excerpt() || get_the_content() ) { ?>
							<a href="<?php the_permalink(); ?>"><?php the_field('project_title'); ?></a>
							<?php } else { the_field('project_title'); } ?>
						</p>
					</div>
				</article>
	
				<?php $count++; endif; endwhile; ?>
			</div>
			
			<?php nbr_content_nav( 'nav-below' ); ?>
			
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>