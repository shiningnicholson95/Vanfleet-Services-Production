<?php
/**
 * Template Name: Van Fleet Offer Detail Page
 * Shared render for individual offer pages under the /all-offers/ parent
 * (e.g. /all-offers/plumbing-leak-repair-diagnostic/). Applied via a thin
 * wrapper template that sets $vf_override_offer_slug — see
 * templates/template-offer-plumbing-leak-repair-diagnostic.php.
 * Design matches the approved offer-page reference (navy page-hero banner +
 * price bar + bordered detail block + Process/Reviews sections, mirroring
 * the /all-offers hub banner and the /plumbing/plumber/ page's bottom
 * sections — release 4.0).
 */
get_header();

$g     = vanfleet_global();
$offer = ( isset( $vf_override_offer_slug ) ? vanfleet_offer_page_by_slug( $vf_override_offer_slug ) : vanfleet_current_offer_page() ) ?: [
  'slug'       => '',
  'price'      => '',
  'title'      => get_the_title(),
  'intro'      => 'What you get from Van Fleet Services:',
  'bullets'    => [],
  'note'       => 'Call for Conditions & Restrictions',
  'disclaimer' => '',
];

/* ── Breadcrumbs — Home > All Offers > {this offer's title} ── */
$crumbs = [
  [ 'label' => 'Home',       'url' => home_url( '/' ) ],
  [ 'label' => 'All Offers', 'url' => vanfleet_url( 'all-offers' ) ],
  [ 'label' => $offer['title'], 'url' => null ],
];

/* ── Banner subtitle — one line of context under the H1, ~120 characters ── */
$banner_subtitle = "Book your " . strtolower( $offer['title'] ) . ' today — clear answers, upfront pricing, and no pressure from Van Fleet Services.';

/* ── "What you get" subtitle — intelligently references the price, free or paid ── */
$is_free = (bool) preg_match( '/free/i', $offer['price'] );
$detail_subtitle = $is_free
  ? "This {$offer['title']} won't cost you a thing — schedule it today and get expert advice with zero risk."
  : "For just {$offer['price']}, here's exactly what's included when you schedule your {$offer['title']} with Van Fleet Services.";
?>
<main id="primary">

<div class="vf-offer-hero">
<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => $offer['price'],
  'title'     => $offer['title'],
  'intro'     => $banner_subtitle,
  'bullets'   => [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ],
  'show_form' => false,
] ); ?>
</div>

<!-- Offer detail -->
<section class="vf-offer-detail">
  <div class="vf-container">
  <div class="vf-offer-detail__inner">
    <p class="vf-eyebrow">What's Included</p>
    <h2>What You Get From Van Fleet Services</h2>
    <p class="vf-lead" style="max-width:52ch;margin-bottom:var(--space-8)"><?php echo esc_html( $detail_subtitle ); ?></p>

    <?php if ( ! empty( $offer['bullets'] ) ): ?>
      <ul class="vf-offer-detail__list">
        <?php foreach ( $offer['bullets'] as $bullet ): ?>
          <li><?php echo esc_html( $bullet ); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <?php if ( ! empty( $offer['note'] ) ): ?>
      <p><?php echo esc_html( $offer['note'] ); ?></p>
    <?php endif; ?>

    <?php if ( ! empty( $offer['disclaimer'] ) ): ?>
      <p class="vf-offer-detail__disclaimer"><strong>Disclaimer:</strong> <?php echo esc_html( $offer['disclaimer'] ); ?></p>
    <?php endif; ?>

    <?php echo vanfleet_button( $g['phone_display'], vanfleet_tel_href(), 'primary' ); ?>
  </div>
  </div>
</section>

<!-- Our Process -->
<section class="vf-section">
  <div class="vf-container">
    <p class="vf-eyebrow">Our Process</p>
    <h2>How Service Works</h2>
    <div class="vf-process-steps vf-process-steps--3">
      <div class="vf-process-step" style="background:var(--gray-50);border-radius:var(--radius-lg);padding:var(--space-6)"><span class="vf-process-step__num" style="width:32px;height:32px;border-radius:50%;font-size:14px;background:var(--navy-700);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:var(--space-4)">1</span><h4>Call or Book</h4><p>Reach us 24/7 by phone or request service online.</p></div>
      <div class="vf-process-step" style="background:var(--gray-50);border-radius:var(--radius-lg);padding:var(--space-6)"><span class="vf-process-step__num" style="width:32px;height:32px;border-radius:50%;font-size:14px;background:var(--navy-700);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:var(--space-4)">2</span><h4>Diagnose &amp; Quote</h4><p>We inspect the issue and give you a flat-rate price to approve first.</p></div>
      <div class="vf-process-step" style="background:var(--gray-50);border-radius:var(--radius-lg);padding:var(--space-6)"><span class="vf-process-step__num" style="width:32px;height:32px;border-radius:50%;font-size:14px;background:var(--navy-700);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:var(--space-4)">3</span><h4>Fixed Right</h4><p>Licensed local pros complete the job cleanly and back their work.</p></div>
    </div>
  </div>
</section>

<!-- Reviews -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Reviews</p>
      <h2>What Local Homeowners Say</h2>
    </div>
    <div class="vf-reviews-grid">
      <?php foreach ( array_slice( vanfleet_data( 'reviews' ), 0, 3 ) as $r ) {
        vanfleet_partial( 'template-parts/components/review-card', [ 'review' => $r ] );
      } ?>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
