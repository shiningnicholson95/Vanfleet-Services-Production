<?php
/** Generic WordPress fallback template. */
get_header(); ?>
<main id="primary" class="site-main vf-section"><div class="vf-container vf-content"><?php if (have_posts()) : while (have_posts()) : the_post(); ?><article <?php post_class(); ?>><h1><?php the_title(); ?></h1><?php the_content(); ?></article><?php endwhile; else: ?><h1>Content coming soon</h1><?php endif; ?></div></main>
<?php get_footer();
