<?php
/**
 * Template Name: Van Fleet Blog Page
 * Imported from Claude Design — "Van Fleet - Blog.html" (VFBlogPage component).
 *
 * Fully backend-driven: posts, categories, counts, featured image, and the
 * featured post all come from WP Admin → Posts. To feature a specific post,
 * mark it "Stick this post to the front page" in the post editor — otherwise
 * the latest published post is used automatically.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home', 'url' => home_url( '/' ) ],
  [ 'label' => 'Blog', 'url' => null ],
];

/* ── Category filter via ?vf_cat=slug (real WP categories) ── */
$cat_slug   = isset( $_GET['vf_cat'] ) ? sanitize_title( wp_unslash( $_GET['vf_cat'] ) ) : '';
$categories = get_categories( [ 'hide_empty' => true ] );
$paged      = max( 1, (int) get_query_var( 'paged' ) ?: (int) get_query_var( 'page' ) ?: 1 );

/* ── Featured post: native WP sticky post, falls back to latest ── */
$show_featured = ( $cat_slug === '' && $paged === 1 );
$featured_id   = 0;

if ( $show_featured ) {
  $sticky = get_option( 'sticky_posts' );
  $featured_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];
  if ( ! empty( $sticky ) ) {
    $featured_args['post__in']           = $sticky;
    $featured_args['ignore_sticky_posts'] = true;
  }
  $featured_q = new WP_Query( $featured_args );
  if ( $featured_q->have_posts() ) {
    $featured_q->the_post();
    $featured_id = get_the_ID();
    wp_reset_postdata();
  }
}

/* ── Main grid query ── */
$query_args = [
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 9,
  'paged'          => $paged,
  'orderby'        => 'date',
  'order'          => 'DESC',
];
if ( $cat_slug )    $query_args['category_name'] = $cat_slug;
if ( $featured_id ) $query_args['post__not_in']  = [ $featured_id ];

$posts_q = new WP_Query( $query_args );
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Tips & Resources',
  'title'     => 'Van Fleet Home-Service Blog',
  'intro'     => 'Practical plumbing and electrical advice for Chester County homeowners — from the local pros who fix it every day.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section">
  <div class="vf-container">

    <?php if ( $featured_id ): ?>
      <a class="vf-blog-card vf-blog-card--featured" href="<?php echo esc_url( get_permalink( $featured_id ) ); ?>" style="margin-bottom:40px">
        <div class="vf-blog-card__media">
          <?php if ( has_post_thumbnail( $featured_id ) ): ?>
            <?php echo get_the_post_thumbnail( $featured_id, 'large', [ 'loading' => 'eager', 'decoding' => 'async' ] ); ?>
          <?php else: ?>
            <div class="vf-photo-placeholder" style="height:100%;margin:0;border-radius:0" aria-hidden="true">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.82)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8Z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
              <span>Add cover photo</span>
            </div>
          <?php endif; ?>
        </div>
        <div class="vf-blog-card__body">
          <?php
          $f_word_count = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $featured_id ) ) );
          $f_read_min   = max( 1, (int) ceil( $f_word_count / 200 ) );
          $f_cats       = get_the_category( $featured_id );
          $f_cat_name   = $f_cats ? $f_cats[0]->name : '';
          ?>
          <div class="vf-blog-card__meta">
            <?php if ( $f_cat_name ): ?><span class="vf-badge"><?php echo esc_html( $f_cat_name ); ?></span><?php endif; ?>
            <span class="vf-blog-card__date"><?php echo esc_html( $f_read_min ); ?> min read</span>
          </div>
          <h2><?php echo esc_html( get_the_title( $featured_id ) ); ?></h2>
          <p><?php echo esc_html( wp_trim_words( get_the_excerpt( $featured_id ), 30 ) ); ?></p>
          <span class="vf-blog-card__readmore">
            Read article
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </span>
        </div>
      </a>
    <?php endif; ?>

    <!-- Category chips — real WP categories with live post counts -->
    <div class="vf-chips">
      <a class="vf-chip<?php echo $cat_slug === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url( remove_query_arg( [ 'vf_cat', 'paged' ] ) ); ?>">
        All <span class="vf-chip__count"><?php echo (int) wp_count_posts()->publish; ?></span>
      </a>
      <?php foreach ( $categories as $c ): ?>
        <a class="vf-chip<?php echo $cat_slug === $c->slug ? ' is-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'vf_cat', $c->slug, remove_query_arg( 'paged' ) ) ); ?>">
          <?php echo esc_html( $c->name ); ?> <span class="vf-chip__count"><?php echo (int) $c->count; ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if ( $posts_q->have_posts() ): ?>
      <div class="vf-grid vf-grid--3">
        <?php while ( $posts_q->have_posts() ): $posts_q->the_post(); ?>
          <?php vanfleet_partial( 'template-parts/components/blog-card' ); ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

      <?php
      $pagination = paginate_links( [
        'total'     => $posts_q->max_num_pages,
        'current'   => $paged,
        'mid_size'  => 1,
        'prev_text' => '←',
        'next_text' => '→',
        'type'      => 'array',
      ] );
      if ( $pagination ): ?>
        <nav class="vf-pagination" aria-label="Blog pagination">
          <?php foreach ( $pagination as $link ) echo wp_kses_post( $link ); ?>
        </nav>
      <?php endif; ?>

    <?php else: ?>
      <p class="vf-lead" style="text-align:center;padding:var(--space-12) 0">
        <?php echo $cat_slug ? 'No posts in this category yet.' : 'No posts yet — check back soon.'; ?>
      </p>
    <?php endif; ?>

  </div>
</section>

<!-- Newsletter -->
<section style="background:var(--surface-section)">
  <div class="vf-container" style="padding-block:var(--space-12);text-align:center;max-width:620px">
    <h2 style="font-size:var(--fs-h3);margin:0 0 10px">Get Home-Care Tips in Your Inbox</h2>
    <p style="margin:0 0 20px;color:var(--text-body)">Seasonal maintenance reminders and money-saving advice. No spam.</p>
    <form class="vf-newsletter" id="vf-newsletter-form" style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap" novalidate>
      <?php wp_nonce_field( 'vanfleet_newsletter_signup', 'vf_newsletter_nonce' ); ?>
      <input type="hidden" name="source_page" value="<?php echo esc_attr( vanfleet_current_page_title() ); ?>">
      <input type="hidden" name="source_url" value="<?php echo esc_url( vanfleet_current_url() ); ?>">
      <input type="email" name="email" placeholder="you@email.com" required style="flex:0 1 320px;font-size:16px;padding:12px 14px;border:1.5px solid var(--border-strong);border-radius:var(--radius-sm)">
      <button type="submit" class="vf-btn vf-btn--primary vf-newsletter__submit">Subscribe</button>
      <div class="vf-hero-form__status" role="status" aria-live="polite" aria-atomic="true" hidden style="flex-basis:100%"></div>
    </form>
  </div>
</section>

</main>
<?php get_footer(); ?>
