<?php
/**
 * The template for displaying the archive of Awards by Year.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nbr
 */

get_header(); ?>

	<section id="primary" class="content-area bg-76">
		<div id="content" class="site-content" role="main">

			<?php $award_names = get_terms('award-names', array('orderby'=>'title'));?>

			<header class="page-header bg-70">
				<h1 class="page-title"><?php single_term_title( '', true ); ?><span class="faded-text">&nbsp;&nbsp;|&nbsp;&nbsp;Archive</span></h1>
				<ul class="award-tax-list clear">
					<li class="award-tax">
						<ul class="award-name-list drawer">
							<?php foreach ($award_names as $award_name) { ?>
							<li><a href="<?php echo(site_url('/award-names/' . $award_name->slug)); ?>"><?php echo($award_name->name) ?></a></li>
							<?php } ?>
						</ul>
						<a href="#" class="view-all-drawer">View All Awards</a>
					</li>
				</ul>
			</header><!-- .page-header -->

			<div class="standard clear">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( has_term('format-standard', 'award-formats', get_the_ID()) ) {

						get_template_part('content', 'award-name-award');

					} ?>

				<?php endwhile; rewind_posts(); ?>
			</div>

			<div class="multi-list clear">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( has_term('format-multiple', 'award-formats', get_the_ID()) ) {

						get_template_part('content', 'award-name-award');

					} ?>

				<?php endwhile; ?>
			</div>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
