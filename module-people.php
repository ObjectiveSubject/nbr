<?php  
/* 

People Module 

*/
?>

<aside id="people-module" class="widget widget-people bg-84">
	<h2>People</h2>
	<article <?php post_class(); ?>>
		<?php echo(get_field('people')); ?>
	</article>
</aside>