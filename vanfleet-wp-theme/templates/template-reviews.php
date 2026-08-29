<?php
/**
 * Template Name: Van Fleet Reviews
 * Imported from Claude Design — "Van Fleet - Reviews.html" (ReviewsPage component).
 * Backend-driven: reviews, categories, counts, and the rating summary all
 * come from inc/data-reviews.php — add reviews there, not here. The summary
 * (average rating, count, star breakdown) is calculated live from that data
 * rather than hardcoded, so it's never out of sync and never overstates
 * what's actually on file. Only verified:true reviews are ever eligible for
 * schema markup (see inc/schema.php) — none currently are.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',    'url' => home_url( '/' ) ],
  [ 'label' => 'Reviews', 'url' => null ],
];

$all_reviews = vanfleet_data( 'reviews' );

$categories = [];
foreach ( $all_reviews as $r ) {
  $cat = $r['category'] ?? 'General';
  if ( ! in_array( $cat, $categories, true ) ) $categories[] = $cat;
}

$cat_slug   = isset( $_GET['vf_review_cat'] ) ? sanitize_title( wp_unslash( $_GET['vf_review_cat'] ) ) : '';
$active_cat = '';
foreach ( $categories as $cat ) {
  if ( sanitize_title( $cat ) === $cat_slug ) { $active_cat = $cat; break; }
}

$visible_reviews = $active_cat
  ? array_values( array_filter( $all_reviews, fn( $r ) => ( $r['category'] ?? 'General' ) === $active_cat ) )
  : $all_reviews;

/* Live rating summary — derived from the data file, never hardcoded. */
$total = count( $all_reviews );
$avg   = $total ? array_sum( array_column( $all_reviews, 'rating' ) ) / $total : 0;
$breakdown = [ 5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0 ];
foreach ( $all_reviews as $r ) {
  $star = (int) ( $r['rating'] ?? 0 );
  if ( isset( $breakdown[ $star ] ) ) $breakdown[ $star ]++;
}

$google_url   = vanfleet_global( 'google_review_url' );
$facebook_url = vanfleet_global( 'facebook_review_url' );
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Customer Reviews',
  'title'     => 'What Chester County Homeowners Say About Us',
  'intro'     => 'Real reviews from real neighbors. We\'re proud of our reputation — and we work hard to earn it on every visit.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<div style="background:#fff;border-bottom:1px solid var(--border-default)">
  <div class="vf-container vf-rating-summary">
    <div class="vf-rating-summary__score">
      <div class="vf-rating-summary__number"><?php echo esc_html( $total ? number_format( $avg, 1 ) : '—' ); ?></div>
      <span class="vf-review-card__stars" aria-label="<?php echo esc_attr( round( $avg ) ); ?> out of 5 stars">
        <?php for ( $i = 0; $i < 5; $i++ ): ?>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="<?php echo $i < round( $avg ) ? 'var(--color-star)' : 'var(--gray-200)'; ?>" stroke="none" aria-hidden="true"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.6 1.5 6.8L12 17.8 5.9 20.4l1.5-6.8L2.2 9l6.9-.7L12 2z"/></svg>
        <?php endfor; ?>
      </span>
      <div class="vf-rating-summary__count"><?php echo (int) $total; ?> customer reviews</div>
    </div>
    <div class="vf-rating-summary__bars">
      <?php for ( $star = 5; $star >= 1; $star-- ):
        $pct = $total ? round( $breakdown[ $star ] / $total * 100 ) : 0;
        ?>
        <div class="vf-rating-bar">
          <span class="vf-rating-bar__label"><?php echo $star; ?>★</span>
          <span class="vf-rating-bar__track"><span class="vf-rating-bar__fill" style="width:<?php echo (int) $pct; ?>%"></span></span>
          <span class="vf-rating-bar__pct"><?php echo (int) $pct; ?>%</span>
        </div>
      <?php endfor; ?>
    </div>
    <div class="vf-rating-summary__actions">
      <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">Call 24/7</a>
      <a class="vf-btn vf-btn--secondary" href="#leave">Leave a Review</a>
    </div>
  </div>
</div>

<section class="vf-section vf-section--gray">
  <div class="vf-container">

    <div class="vf-chips">
      <a class="vf-chip<?php echo $active_cat === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url( remove_query_arg( 'vf_review_cat' ) ); ?>">
        All <span class="vf-chip__count"><?php echo (int) $total; ?></span>
      </a>
      <?php foreach ( $categories as $cat ): ?>
        <?php $count = count( array_filter( $all_reviews, fn( $r ) => ( $r['category'] ?? 'General' ) === $cat ) ); ?>
        <a class="vf-chip<?php echo $active_cat === $cat ? ' is-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'vf_review_cat', sanitize_title( $cat ), remove_query_arg( 'vf_review_cat' ) ) ); ?>">
          <?php echo esc_html( $cat ); ?> <span class="vf-chip__count"><?php echo (int) $count; ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if ( $visible_reviews ): ?>
      <div class="vf-grid vf-grid--3">
        <?php foreach ( $visible_reviews as $r ): ?>
          <?php vanfleet_partial( 'template-parts/components/review-card', [ 'review' => $r ] ); ?>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="vf-lead" style="text-align:center;padding:var(--space-12) 0">No reviews in this category yet.</p>
    <?php endif; ?>

  </div>
</section>

<section id="leave" class="vf-section" style="padding-bottom:0">
  <div class="vf-container" style="text-align:center;max-width:640px;margin-inline:auto">
    <p class="vf-eyebrow">Share Your Experience</p>
    <h2>Had a Great Visit? Tell the World.</h2>
    <p class="vf-lead">Your review helps other Chester County homeowners find a plumber they can trust.</p>
    <?php if ( $google_url || $facebook_url ): ?>
      <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:12px">
        <?php if ( $google_url ): ?>
          <?php vanfleet_partial( 'template-parts/components/google-review-badge', [ 'url' => $google_url, 'variant' => 'light' ] ); ?>
        <?php endif; ?>
        <?php if ( $facebook_url ): ?>
          <a class="vf-btn vf-btn--secondary" href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener">Review Us on Facebook</a>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <p class="vf-lead" style="color:var(--text-muted)">Review links coming soon.</p>
    <?php endif; ?>
  </div>
</section>

<?php vanfleet_partial( 'template-parts/components/emergency-cta' ); ?>

</main>
<?php get_footer(); ?>
