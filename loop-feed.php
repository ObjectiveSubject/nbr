<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
	
	<?php if (has_post_thumbnail() || get_post_type() == "attachment" ) : ?>
	<div class="width-25">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-image"><?php the_post_thumbnail(); ?></div>
		<?php elseif ( get_post_type() == "attachment" ) : ?>
			<div class="entry-image"><?php the_content(); ?></div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
	<div class="width-50">
		<header class="entry-header">
			
			<?php if ( get_post_type() == "post" ) : ?>
				<h6 class="entry-date"><?php the_date('F Y'); ?></h6>
			<?php endif; ?>
			

			<h2 class="entry-title">
				<?php if ( get_post_type() == "awards" ) : 
					$award_years = get_the_terms($post->ID,'award-years');	
					foreach ($award_years as $award_year) { $year = $award_year->slug; } ?>
				
					<a href="<?php echo ( site_url('/award-years/') . $year ); ?>" rel="bookmark"><?php the_title(); ?></a>
				
				<?php elseif ( get_post_type() == "attachment" ) : ?>
					
					<a href="<?php echo get_permalink($post->post_parent); ?>" rel="bookmark"><?php the_title(); ?></a>
				
				<?php else : ?>
				
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				
				<?php endif; ?>
			</h2>
			
			
<!--
			<?php if ( get_post_type() == "post" ) : ?>
				<h6 class="entry-author">by <?php 
					if (get_field('feature_author')) {  echo( get_field('feature_author') ); }
					else { the_author(); } 
				?></h6>
			<?php endif; ?>
-->
			
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php if (get_post_type() == "attachment") : 
				
			else : 
				if ( get_the_excerpt() ) : the_excerpt(); 
				else : the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nbr' ) ); 
				endif; 
			endif; ?>
		</div><!-- .entry-content -->
	</div>
	
</article><!-- #post-## -->