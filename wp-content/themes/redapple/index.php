<?php
/**
 * Default template.
 *
 * @package WordPress
 * @subpackage redapple
 * @since redapple 0.1
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<main role="main">

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php the_content('Read the rest of this entry »'); ?>
		
	<?php endwhile; ?>
	<?php else : ?>
	//Something that happens when a post isn’t found.
<?php endif; ?>

</main>

<?php get_footer(); ?>