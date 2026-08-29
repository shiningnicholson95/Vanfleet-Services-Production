<?php
/**
 * Template Name: Van Fleet Offers Page
 * Imported from Claude Design — "Van Fleet - Offers.html" (OffersPage component).
 * Backend-driven: add, remove, or update coupons in inc/data-offers.php —
 * not here. 'tone' on each entry (orange/navy/blue) controls the card's
 * accent color.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',   'url' => home_url( '/' ) ],
  [ 'label' => 'Offers', 'url' => null ],
];

$offers = vanfleet_data( 'offers' );
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Special Offers',
  'title'     => 'Current Coupons & Savings',
  'intro'     => 'Save on the plumbing and electrical work your home needs. Mention the code when you book or show it to your technician.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section vf-section--gray">
  <div class="vf-container">

    <div class="vf-grid vf-grid--2">
      <?php foreach ( $offers as $offer ): ?>
        <?php vanfleet_partial( 'template-parts/components/offer-card', [ 'offer' => $offer ] ); ?>
      <?php endforeach; ?>
    </div>

    <p style="text-align:center;margin-top:28px;font-size:13px;color:var(--text-muted);max-width:70ch;margin-inline:auto">
      One coupon per service call. Cannot be combined with other offers. Mention or present coupon at time of service. Not valid on diagnostic fees or prior work. Restrictions may apply — call for details.
    </p>

  </div>
</section>

<?php vanfleet_partial( 'template-parts/components/emergency-cta', [
  'title' => 'Ready to Claim Your Savings?',
  'text'  => 'Call now or schedule service and mention your coupon code — we\'ll take care of the rest.',
] ); ?>

</main>
<?php get_footer(); ?>
