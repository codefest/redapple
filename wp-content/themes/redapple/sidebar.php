<aside role="complementary" class="primary-sidebar">
	<?php if( !dynamic_sidebar( 'top-sidebar' )): ?>
		<section class="widget">
			<?php get_search_form(); ?>
		</section>
		<section class="widget">
			<h3 class="widget-title">Categories</h3>
			<?php wp_list_categories( array(
				'title_li' => ''
			) ); ?>
		</section>

	<?php endif; ?>

	<div class="secondary-widgets">
		<?php dynamic_sidebar( 'secondary-sidebar' ); ?>
	</div>
	<div class="secondary-widgets">
		<?php dynamic_sidebar( 'tertiary-sidebar' ); ?>
	</div>
</aside>

