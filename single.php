<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'blog' ); ?>
<?php endwhile; endif; ?>
<footer class="footer">
</footer>
<?php get_footer(); ?>