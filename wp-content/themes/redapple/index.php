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
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span class="entry-categories"><?php the_category( ); ?></span>

		<div class="entry-content"><?php the_content('Read the rest of this entry »'); ?></div>

		<footer class="post-meta">Posted on <time datetime="<?php the_time( 'c' ) ?>"><?php the_time( 'F j, Y' ) ?></timestamp> | <?php the_tags(); ?> </footer>
	</article>	
	<?php endwhile; ?>
	<?php else : ?>
	<h2>Sorry, no posts found</h2>
<?php endif; ?>

</main>

<?php get_footer(); ?>