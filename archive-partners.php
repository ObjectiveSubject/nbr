<?php

$partner_years = get_terms( array( 'taxonomy' => 'partner-year', 'orderby' => 'name', 'order' => 'DESC' ) );
$this_year = $partner_years[1];
$location = site_url('/partners/'.$this_year->slug);
wp_redirect( $location );
exit;

//get_header(); ?>

<!--
	<div id="primary" class="content-area partners-list">
		<div id="content" class="site-content width-75 bg-76" role="main">

		<header class="page-header bg-70">
			<h1 class="page-title"><?php single_term_title(); ?> Partners</h1>
		</header>

		<?php while ( have_posts() ) : the_post();

			get_template_part('loop-partners');

		endwhile; ?>

		</div>

		<div id="secondary" class="widget-area awards width-25" role="complementary">
			<aside id="awards-module" class="widget widget-awards bg-84">
				<?php get_template_part('module-recent-gala'); ?>
			</aside>
		</div>

	</div>
-->

<?php //get_footer(); ?>
