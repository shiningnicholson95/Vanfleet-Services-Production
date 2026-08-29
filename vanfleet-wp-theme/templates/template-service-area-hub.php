<?php
/**
 * Template Name: Van Fleet Service Area Hub
 * Lists all Van Fleet service areas with city descriptions and links.
 */
get_header();
$g = vanfleet_global();

$crumbs = [
  [ 'label' => 'Home',          'url' => home_url( '/' ) ],
  [ 'label' => 'Service Areas', 'url' => null ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'            => $crumbs,
  'eyebrow'           => 'Service Area',
  'title'             => 'Plumbing &amp; Electrical Service Areas in Chester County &amp; SE Pennsylvania',
  'intro'             => 'Van Fleet Services is based in Chester Springs and provides licensed plumbing and electrical service to homeowners throughout Chester County and the surrounding region.',
  'bullets'           => [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ],
  'cta_primary_label' => 'Call Now · 24/7',
] ); ?>

<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- All Service Area Cards — compact blocks matching homepage location grid -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Coverage</p>
      <h2>Towns We Serve</h2>
      <p class="vf-lead">We cover Chester County and surrounding communities — same-day plumbing and electrical service available in every area listed below.</p>
    </div>
    <?php vanfleet_partial( 'template-parts/components/service-area-grid', [ 'compact' => true, 'limit' => 20 ] ); ?>
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
        <h3 style="font-size:24px;color:#fff;margin:0 0 6px">Need Service in Your Area?</h3>
        <p style="color:var(--navy-100);font-size:15px;margin:0">We dispatch fast across Chester County — call any time, day or night.</p>
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
