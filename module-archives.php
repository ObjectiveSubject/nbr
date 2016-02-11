<?php  
/*

News Module 

*/
?>

<aside id="archives-module" class="widget widget-archives bg-82 light-blue-hover">
	<h2>From the Archives</h2>
	<?php 
	$args = array('post_type'=>'post', 'category_name'=>'from-the-archive', 'posts_per_page'=>1);
	$archives = new WP_Query ($args);
	
	while ( $archives->have_posts() ) : $archives->the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
			<h6><?php the_date('F Y'); ?></h6> 
			<p class="title big"><a href="<?php the_permalink(); ?>"><?php if (get_field('feature_related_film')) { ?><em><?php echo(get_field('feature_related_film')); ?></em> &ndash; <?php } the_title(); ?></a></p>
			<p class="excerpt"><?php if (get_the_excerpt()) {echo get_the_excerpt();} ?></p>
		</article>
	
	<?php endwhile; wp_reset_query(); ?>
	<a href="<?php echo(site_url('category/from-the-archive')); ?>" class="view-all-page big">VIEW ALL</a>
</aside>