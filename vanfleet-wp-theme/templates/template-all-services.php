<?php
/**
 * Template Name: Van Fleet All Services
 * Lists all published plumbing and electrical service pages.
 */
get_header();
$g = vanfleet_global();

/* ── Service lists — hardcoded so descriptions, CTAs, and URLs match the
   published WP pages exactly regardless of data-services.php slug sharing.
   Icon resolution uses service-card.php $icons map via the 'slug' key.
   ──────────────────────────────────────────────────────────────────────── */
$plumbing_services = [
  [
    'title'       => 'Emergency Plumbing',
    'slug'        => 'plumbing',
    'description' => '24/7 emergency plumbing for burst pipes, major leaks, sewage backups, no hot water, and urgent plumbing issues across Chester County.',
    'cta'         => 'Call 24/7 Emergency Service',
    'url'         => home_url( '/plumbing/plumber/' ),
  ],
  [
    'title'       => 'Plumbing Repair',
    'slug'        => 'plumbing',
    'description' => 'Professional plumbing repairs for leaks, fixtures, toilets, faucets, pipes, and common home plumbing problems — upfront, flat-rate pricing.',
    'cta'         => 'Request Plumbing Repair',
    'url'         => home_url( '/plumbing/plumber/' ),
  ],
  [
    'title'       => 'Drain Cleaning',
    'slug'        => 'plumbing/drain-cleaning',
    'description' => 'Drain cleaning service for slow drains, clogs, backups, and recurring drainage issues — flat-rate pricing, same-day available.',
    'cta'         => 'Schedule Drain Cleaning',
    'url'         => home_url( '/plumbing/plumber/' ),
  ],
  [
    'title'       => 'Leak Detection &amp; Pipe Repair',
    'slug'        => 'plumbing/leak-detection-pipe-repair',
    'description' => 'Leak detection and pipe repair for hidden leaks, damaged pipes, water stains, and water pressure issues.',
    'cta'         => 'Request Leak Repair',
    'url'         => home_url( '/plumbing/plumber/' ),
  ],
  [
    'title'       => 'Water Heater Repair',
    'slug'        => 'water-heaters',
    'description' => 'Water heater repair for leaks, no hot water, strange noises, pilot issues, and inconsistent temperature — upfront, flat-rate pricing.',
    'cta'         => 'Request Water Heater Repair',
    'url'         => home_url( '/all-offers/water-heater-repair-diagnostic/' ),
  ],
  [
    'title'       => 'Water Heater Replacement',
    'slug'        => 'water-heaters',
    'description' => 'Water heater replacement and installation for traditional and high-efficiency systems — same-day service available.',
    'cta'         => 'Schedule Water Heater Replacement',
    'url'         => home_url( '/electrical/water-heater-installations/' ),
  ],
  [
    'title'       => 'Tankless Water Heaters',
    'slug'        => 'services/tankless-water-heaters',
    'description' => 'Upgrade to endless hot water. Van Fleet installs and services tankless water heaters with same-day availability and flat-rate pricing.',
    'cta'         => 'Ask About Tankless',
    'url'         => home_url( '/plumbing/tankless-water-heaters/' ),
  ],
  [
    'title'       => 'Sump Pumps',
    'slug'        => 'services/sump-pumps',
    'description' => 'Protect your basement from flooding. Van Fleet installs, repairs, and replaces sump pumps fast — 24/7 emergency service available.',
    'cta'         => 'Schedule Sump Pump Service',
    'url'         => home_url( '/plumbing/sump-pumps/' ),
  ],
  [
    'title'       => 'Well Pumps',
    'slug'        => 'services/well-pumps',
    'description' => 'Lost water pressure or no water at all? Van Fleet diagnoses and repairs well pumps fast with same-day service and flat-rate pricing.',
    'cta'         => 'Request Well Pump Service',
    'url'         => home_url( '/plumbing/well-pumps/' ),
  ],
  [
    'title'       => 'Water Softener',
    'slug'        => 'services/water-softener',
    'description' => 'Hard water damaging your pipes and appliances? Van Fleet installs and services water softeners with upfront pricing and same-day availability.',
    'cta'         => 'Request Water Softener Service',
    'url'         => home_url( '/plumbing/water-softener/' ),
  ],
];

$electrical_services = [
  [
    'title'       => 'EV Charger Installation',
    'slug'        => 'services/ev-charger-installation',
    'description' => 'Charge at home the right way. Van Fleet installs Level 2 EV chargers with licensed electrical work, permit handling, and upfront pricing.',
    'cta'         => 'Schedule EV Charger Installation',
    'url'         => home_url( '/electrical/ev-charger-installation/' ),
  ],
  [
    'title'       => 'Service Panel Installation',
    'slug'        => 'services/service-panel-installation',
    'description' => 'Outdated panel or need more capacity? Van Fleet installs and upgrades electrical service panels safely, to code, with permit handling included.',
    'cta'         => 'Ask About Panel Installation',
    'url'         => home_url( '/electrical/service-panel-installation/' ),
  ],
  [
    'title'       => 'Water Heaters',
    'slug'        => 'water-heaters',
    'description' => 'No hot water? Van Fleet repairs and replaces tank and tankless water heaters fast — often the same day — with upfront, flat-rate pricing.',
    'cta'         => 'Get Water Heater Help',
    'url'         => home_url( '/electrical/water-heaters/' ),
  ],
  [
    'title'       => 'Water Heater Installations',
    'slug'        => 'water-heaters',
    'description' => 'New construction or replacement install — Van Fleet handles full water heater installations with same-day availability and upfront flat-rate pricing.',
    'cta'         => 'Schedule Water Heater Installation',
    'url'         => home_url( '/electrical/water-heater-installations/' ),
  ],
];

$crumbs = [
  [ 'label' => 'Home',         'url' => home_url( '/' ) ],
  [ 'label' => 'All Services', 'url' => null ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'            => $crumbs,
  'eyebrow'           => 'Our Services',
  'title'             => 'Complete Plumbing &amp; Electrical Services in Chester County, PA',
  'intro'             => 'Van Fleet Services provides licensed, flat-rate plumbing and electrical service for homeowners across Chester County — same-day appointments and 24/7 emergency response.',
  'bullets'           => [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ],
  'cta_primary_label' => 'Call Now · 24/7',
] ); ?>

<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- Plumbing Services -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Plumbing</p>
      <h2>Plumbing Services</h2>
      <p class="vf-lead">Reliable repairs, installations, and 24/7 emergency response for every plumbing need in Chester County — team with upfront, flat-rate pricing.</p>
    </div>
    <div class="vf-grid vf-grid--3">
      <?php foreach ( $plumbing_services as $s ):
        vanfleet_partial( 'template-parts/components/service-card', [ 'service' => $s ] );
      endforeach; ?>
    </div>
  </div>
</section>

<!-- Electrical Services -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Electrical</p>
      <h2>Electrical Services</h2>
      <p class="vf-lead">Licensed electrical work for Chester County homes — EV chargers, panel upgrades, water heaters, and more with upfront flat-rate pricing.</p>
    </div>
    <div class="vf-grid vf-grid--3">
      <?php foreach ( $electrical_services as $s ):
        vanfleet_partial( 'template-parts/components/service-card', [ 'service' => $s ] );
      endforeach; ?>
    </div>
  </div>
</section>

<!-- Service Areas -->
<section class="vf-section" id="areas">
  <div class="vf-container vf-split vf-split--areas">
    <div>
      <p class="vf-eyebrow">Service Area</p>
      <h2>Proudly Serving Chester County &amp; SE Pennsylvania</h2>
      <p class="vf-lead">Based in Chester Springs and covering the surrounding towns. Don't see yours? Give us a call.</p>
      <?php echo vanfleet_button( 'See All Service Areas', vanfleet_url( 'service-areas' ), 'secondary' ); ?>
    </div>
    <div><?php vanfleet_partial( 'template-parts/components/service-area-grid' ); ?></div>
  </div>
</section>

<!-- Emergency CTA -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-emergency" style="background:linear-gradient(120deg,var(--navy-700),var(--blue-600));color:#fff;border-radius:var(--radius-xl);padding:var(--space-10) var(--space-12);display:flex;align-items:center;justify-content:space-between;gap:var(--space-8);flex-wrap:wrap">
      <div style="width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0" aria-hidden="true">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </div>
      <div style="flex:1;min-width:200px">
        <h3 style="font-size:24px;color:#fff;margin:0 0 6px">Need a Plumber or Electrician in Chester County?</h3>
        <p style="color:var(--navy-100);font-size:15px;margin:0">We dispatch fast — call any time, day or night.</p>
      </div>
      <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
        <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="display:inline-flex;align-items:center;gap:8px;padding:13px 24px;border-radius:var(--radius-md);font-family:var(--font-heading);font-weight:700;font-size:var(--fs-sm);background:#fff;color:var(--color-cta);box-shadow:var(--shadow-lg);border:2px solid transparent;text-decoration:none">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call <?php echo esc_html( $g['phone_display'] ); ?>
        </a>
        <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'contact-us' ) ); ?>">Schedule Service</a>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
