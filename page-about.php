<?php
/**

Template Name: About Page

 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content width-75 bg-0" role="main">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<header class="page-header bg-12">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>				
				</article>
				
				<?php if(get_field('nbr_organizations')): ?>
				<div id="outreach-orgs" class="bg-12">
					<ul class="clear">
					<?php while(has_sub_field('nbr_organizations')): ?>
						<li style="background-image:url('<?php the_sub_field("outreach_org_image"); ?>'); background-repeat: no-repeat; background-position: center center;"></li>
					<?php endwhile; ?>
					</ul>
				</div>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<div id="secondary" class="widget-area news people width-25" role="complementary">
			<?php get_template_part('module-news'); ?>
			<?php get_template_part('module-people'); ?>
		</div><!-- #secondary -->
		
	</div><!-- #primary -->
	
	

<?php get_footer(); ?>
