<?php  
/*

Q and A Module

*/
?>

<aside id="qa-module" class="widget widget-qa bg-84 dark-teal-hover">
	<h2>Q&amp;As</h2>
	<?php 
	$args = array('post_type'=>'post', 'category_name'=>'q-and-a', 'posts_per_page'=>2);
	$qa_s = new WP_Query ($args);
	
	while ( $qa_s->have_posts() ) : $qa_s->the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
			<h6><?php echo get_the_date('F j, Y'); ?></h6> 
			<p><a href="<?php the_permalink(); ?>"><em><?php echo(get_field('feature_related_film').'</em> &ndash; '.get_the_title()); ?></a></p>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</article>
	
	<?php endwhile; wp_reset_query(); ?>
	<a href="<?php echo(site_url('category/q-and-a')); ?>" class="view-all-page big">VIEW ALL</a>
</aside>