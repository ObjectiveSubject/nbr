<?php
/**

Template Name: Partners

 */
global $post;
$galaPartners = array();
$grantPartners = array();
$currentTerm = get_queried_object();
$partner_years = get_terms('partner-year', array('order'=>'DESC')); 

get_header(); ?>

	<div id="primary" class="content-area partners-list">	
		
		<div id="content" class="site-content width-75 bg-76" role="main">
		
			<header class="page-header bg-72">
				<h1 class="page-title"><? single_term_title(); ?> Partners</h1>
				
				<?php // Partner Years -------- // ?>
				<ul class="partner-tax-list clear">
					<li class="partner-tax">
						<ul class="partner-year-list drawer">
							<?php foreach ($partner_years as $partner_year) { ?>
							<li><a href="<?php echo(site_url('/partners/' . $partner_year->slug)); ?>"><?php echo($partner_year->name) ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Years</a>
					</li>
				</ul>				
				
			</header>
		
			<?php	while ( have_posts() ) : the_post();
				
				if (has_term('gala-partner', 'partner-type') && has_term($currentTerm->slug, 'award-years')) { ?>
					<? array_push($galaPartners, $post);		
				} 
				if (has_term('student-grant-partner', 'partner-type') && has_term($currentTerm->slug, 'grant-year')) { ?>
					<? array_push($grantPartners, $post);
				}
				
			endwhile; ?>

			<?php if (!empty($galaPartners)) : ?>
			<div class="gala-partners">
				<header class="page-header">
					<h2 class="page-title">Gala Partners</h2>
				</header>
				<? foreach($galaPartners as $galaPartner) {
					$post = $galaPartner;
					setup_postdata($post);
					get_template_part('loop-partners');
				} wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>
			
			<?php if (!empty($grantPartners)) : ?>
			<div class="grant-partners">
				<header class="page-header">
					<h2 class="page-title">Student Grant Partners</h2>
				</header>
				<? foreach($grantPartners as $grantPartner) {
					$post = $grantPartner;
					setup_postdata($post);
					get_template_part('loop-partners');
				} wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>
	
		</div><!-- #content -->
		
		<div id="secondary" class="widget-area awards width-25" role="complementary">
			<aside id="awards-module" class="widget widget-awards bg-84">
				<?php get_template_part('module-recent-gala'); ?>
			</aside>
		</div><!-- #secondary -->
		
	</div><!-- #primary -->

<?php get_footer(); ?>
