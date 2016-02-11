<?php  
/*

News Module 

*/
?>

<aside id="news-module" class="widget widget-news bg-86 blue-hover">
	<h2>News</h2>
	<?php 
	$args = array('post_type'=>'post', 'category_name'=>'news', 'posts_per_page'=>2);
	$news = new WP_Query ($args);
	
	while ( $news->have_posts() ) : $news->the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h6><?php echo get_the_date('F Y'); ?></h6> 
			<p><a href="<?php the_permalink(); ?>"><?php if (get_field('feature_related_film')) { ?><em><?php echo(get_field('feature_related_film')); ?></em> &ndash; <?php } the_title(); ?></a></p>
		</article>
	
	<?php endwhile; wp_reset_query(); ?>
	<a href="<?php echo(site_url('category/news')); ?>" class="view-all-page big">VIEW ALL</a>
</aside>