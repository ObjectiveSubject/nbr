<?php
/*

Template Name: Features

 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
			<div id="qa-block" class="bg-82 dark-teal-hover">
				<div class="articles">
					<?php 
					$args = array('post_type'=>'post', 'category_name'=>'q-and-a', 'posts_per_page'=>1); 
					$qa_posts = new WP_Query($args);
					
					while ( $qa_posts->have_posts() ) : $qa_posts->the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
						<div class="qa-text width-25">
							<h2>Q&amp;A</h2>
							<p class="big view-all"><a href="<?php echo(site_url('/category/q-and-a')); ?>" title="See all Q and A features" >SEE ALL</a></p>
							<h6><?php the_date('F j, Y'); ?></h6> 
							<p class="big"><a href="<?php the_permalink(); ?>"><?php echo('<em>'.get_field('feature_related_film').'</em> &ndash; '.get_the_title()); ?></a></p>
						</div>
						<div class="qa-image width-75">
							<?php the_post_thumbnail(); ?>
						</div>
					</article><!-- #post-## -->				
		
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
			<div id="news-block" class="width-50 bg-84 blue-hover">
				<div class="articles">
					<h2>News</h2>
					<p class="big view-all"><a href="<?php echo(site_url('/category/news')); ?>" title="See all News features" >SEE ALL</a></p>
					<?php 
					$args = array('post_type'=>'post', 'category_name'=>'news', 'posts_per_page'=>4); 
					$news_posts = new WP_Query($args);
					
					while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h6><?php the_date('F Y'); ?></h6> 
							<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
						</article><!-- #post-## -->				
									
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
			<div id="archives-block" class="width-50 bg-86 light-blue-hover">
				<div class="articles">
					<h2>From the Archives</h2>
					<p class="big view-all"><a href="<?php echo(site_url('/category/from-the-archive')); ?>" title="See all From The Archive features" >SEE ALL</a></p>
					<?php 
					$args = array('post_type'=>'post', 'category_name'=>'from-the-archive', 'posts_per_page'=>1); 
					$news_posts = new WP_Query($args);
					
					while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h6><?php the_date('F Y'); ?></h6> 
							<p class="big"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
							<?php the_excerpt(); ?> 
							
							<p class="big"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">READ THE FULL ARTICLE</a></p>
						</article><!-- #post-## -->	
						
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
