<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package nbr
 */

get_header(); ?>

	<div id="primary" class="content-area ">
		<div id="content" class="site-content" role="main">

			<header class="page-header bg-72">
				<h1 class="page-title">Oops! It looks like nothing was found here.<br/>Perhaps try a search or one of the links below</h1>
			</header><!-- .page-header -->
			
			<div class="width-25">
			<?php get_template_part('module-news'); ?>
			</div>
			<div class="width-25">
			<?php get_template_part('module-qa'); ?>
			</div>
			<div class="width-25">
			<?php get_template_part('module-archives'); ?>
			</div>
			<div class="width-25">
			<?php get_template_part('module-awards'); ?>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>