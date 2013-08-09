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


<main role="main">

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if(has_post_thumbnail()){
			the_post_thumbnail( 'medium' , array('class'	=>	'entry-thumb'));
		} ?>		

		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>
		<span class="entry-categories"><?php the_category(', '); ?></span>

		<div class="entry-content"><?php 
		if(is_singular()){
			the_content('Read the rest of this entry »');
			}else{
			the_excerpt();
			} ?></div>

		<footer class="post-meta clearfix">

			<time datetime="<?php the_time( 'c' ) ?>" class="entry-date">
				<span class="month"><?php the_time( 'M' ) ?></span>
				<span class="day"><?php the_time( 'j' ) ?></span>
			</time>

			<?php the_tags(); ?> 
			</footer>
	</article>	
	<?php endwhile; ?>
	<?php else : ?>
	<h2>Sorry, no posts found</h2>
<?php endif; ?>

</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>