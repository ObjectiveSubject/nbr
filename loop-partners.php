<article id="post-<?php the_ID(); ?>" <?php post_class('partner'); ?>>
	<header class="entry-header">
		<?php if (get_field('partner_logo')) : ?>
		<h2 class="entry-title"><img src="<?php echo get_field('partner_logo'); ?>" class="partner_logo" alt="<?php the_title(); ?>"/></h2>
		<?php else : ?>
			<h2><?php the_title(); ?></h2>
		<?php endif; ?>
	</header>
	
	<?php if (get_the_post_thumbnail()) : ?>
	<div class="entry-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>
	
	<div class="entry-content">
			<?php the_content(); ?>
	</div>
</article>