<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package nbr
 */
?>

	</div><!-- #main -->
	
	<!-- Begin MailChimp Signup Form -->
	<div id="mc_embed_signup" data-selector="stay-in-touch">
	<form action="http://nbrmp.us6.list-manage.com/subscribe/post?u=a51129fca8202da905dcacba3&amp;id=c1b6f91d79" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
		<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button closebtn">
	</form>
	</div>
	<!--End mc_embed_signup-->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo site_url(); ?>">National Board of Review &copy; 2013 </a>
		</div><!-- .site-info -->
		<nav id="footer-navigation" class="nav navigation-footer clear" role="navigation">
			<h1 class="menu-toggle"><a href="#page" alt="Menu">Menu</a></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'nbr' ); ?>"><?php _e( 'Skip to content', 'nbr' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'column_one' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'column_two' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'column_three' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'column_four' ) ); ?>
		</nav><!-- #site-navigation -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18375348-2']);
  _gaq.push(['_setDomainName', 'nationalboardofreview.org']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>