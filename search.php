<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area bg-76">	
		<div id="content" class="site-content" role="main">

		<header class="page-header bg-72">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'nbr' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->


		<?php 
		if ( have_posts() ) : 
	
			while ( have_posts() ) : the_post();
				
				get_template_part('loop-feed');

			endwhile; 
			
		else :

			get_template_part( 'no-results', 'search' );

		endif; 
		?>

		</div><!-- #content -->
		<?php wp_pagenavi(); ?>
	</section><!-- #primary -->

<?php get_footer(); ?>