<?php
/**
 * Single blog post — Imported from Claude Design "Van Fleet - Blog Post.html"
 * (VFBlogPostPage component). Renders any post created in WP Admin → Posts;
 * the per-post article body comes from the_content(), so no copy lives here.
 */
get_header();

if ( ! have_posts() ) :
?>
<main id="primary" class="vf-section"><div class="vf-container"><h1>Content coming soon</h1></div></main>
<?php
get_footer();
return;
endif;

the_post();

$post_id    = get_the_ID();
$title      = get_the_title();
$cats       = get_the_category();
$cat_name   = $cats ? $cats[0]->name : 'Plumbing';
$cat_id     = $cats ? $cats[0]->term_id : 0;
$word_count = str_word_count( wp_strip_all_tags( get_the_content() ) );
$read_min   = max( 1, (int) ceil( $word_count / 200 ) );

$author_name = vanfleet_global( 'brand_name' );
$initials    = '';
foreach ( array_slice( preg_split( '/\s+/', trim( $author_name ) ), 0, 2 ) as $word ) {
  $initials .= mb_strtoupper( mb_substr( $word, 0, 1 ) );
}
if ( ! $initials ) $initials = 'VF';

/* ── Resolve the Blog listing page URL (whichever page uses template-blog.php) ── */
global $wpdb;
$blog_page_id = $wpdb->get_var( $wpdb->prepare(
  "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_page_template' AND meta_value = %s LIMIT 1",
  'templates/template-blog.php'
) );
$blog_url = $blog_page_id ? get_permalink( $blog_page_id ) : vanfleet_url( 'blog' );

$crumbs = [
  [ 'label' => 'Home', 'url' => home_url( '/' ) ],
  [ 'label' => 'Blog', 'url' => $blog_url ],
  [ 'label' => $title, 'url' => null ],
];

/* ── Related posts: same category first, falls back to latest ── */
$related_args = [
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'post__not_in'   => [ $post_id ],
  'orderby'        => 'date',
  'order'          => 'DESC',
];
if ( $cat_id ) $related_args['cat'] = $cat_id;
$related_q = new WP_Query( $related_args );
if ( ! $related_q->have_posts() && $cat_id ) {
  unset( $related_args['cat'] );
  $related_q = new WP_Query( $related_args );
}
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => $cat_name . ' · ' . $read_min . ' min read',
  'title'     => $title,
  'intro'     => wp_strip_all_tags( get_the_excerpt() ),
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<article class="vf-section">
  <div class="vf-container vf-content-split">

    <div class="vf-content-split__body" style="max-width:720px">

      <?php if ( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail( 'large', [ 'loading' => 'eager', 'decoding' => 'async', 'style' => 'height:360px;width:100%;object-fit:cover;border-radius:var(--radius-xl);margin-bottom:28px' ] ); ?>
      <?php else: ?>
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="eager" decoding="async" style="height:360px;width:100%;object-fit:cover;border-radius:var(--radius-xl);margin-bottom:28px">
      <?php endif; ?>

      <div class="vf-post-meta">
        <span class="vf-post-meta__avatar" aria-hidden="true"><?php echo esc_html( $initials ); ?></span>
        <div>
          <div class="vf-post-meta__name"><?php echo esc_html( $author_name ); ?></div>
        </div>
      </div>

      <div class="vf-post-content"><?php the_content(); ?></div>

      <div style="margin-top:28px;padding:26px;background:var(--surface-section);border-radius:var(--radius-lg);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:16px">
        <div>
          <h3 style="margin:0 0 4px;font-size:20px">Need Help With This?</h3>
          <p style="margin:0;color:var(--text-body);font-size:15px">Get a fast, honest assessment from a local pro.</p>
        </div>
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call 24/7
        </a>
      </div>

    </div>

    <aside class="vf-sidebar">

      <?php if ( $related_q->have_posts() ): ?>
        <div class="vf-card vf-related-articles">
          <h3 style="margin:0 0 4px;font-size:16px">Related Articles</h3>
          <?php while ( $related_q->have_posts() ): $related_q->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
              <span class="vf-related-articles__cat"><?php $rc = get_the_category(); echo esc_html( $rc ? $rc[0]->name : '' ); ?></span>
              <div class="vf-related-articles__title"><?php the_title(); ?></div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>

      <div class="vf-sidebar-call" style="background:var(--navy-600);color:#fff;border-radius:var(--radius-lg);padding:var(--space-6)">
        <h3 style="color:#fff;font-size:20px;margin:0 0 6px">Need Service Now?</h3>
        <p style="color:var(--navy-100);font-size:14.5px;margin:0 0 var(--space-4);line-height:1.5">We answer 24/7.</p>
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>" style="width:100%;justify-content:center;border-radius:var(--radius-pill)">Schedule Service</a>
      </div>

    </aside>

  </div>
</article>

</main>
<?php get_footer(); ?>
