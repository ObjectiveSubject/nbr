<?php

$post_award_years = get_the_terms( $post->ID, 'award-years' ); 
foreach ( $post_award_years as $post_award_year ) { $this_year = $post_award_year->slug; }
					
wp_redirect(site_url('/award-years/'.$this_year)); exit;

?>