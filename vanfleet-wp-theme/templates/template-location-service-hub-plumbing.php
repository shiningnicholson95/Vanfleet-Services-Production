<?php
/**
 * Van Fleet Plumbing City Hub — shared render.
 * Renders the bare "/plumbing/{city}-pa/" page. Layout mirrors
 * templates/template-service.php (the approved /plumbing/plumber/ design —
 * page-hero, content-split body/sidebar, reviews, FAQ, emergency CTA) with
 * content looked up from inc/data-location-services.php via
 * $vf_override_ls_city (set by the per-page
 * templates/template-location-service-hub-{city}.php wrapper).
 */
get_header();

$g         = vanfleet_global();
$city_slug = $vf_override_ls_city ?? basename( trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' ) );
$city      = vanfleet_location_service_city( $city_slug ) ?: [
  'city'          => get_the_title(),
  'state'         => 'PA',
  'county'        => 'Chester County',
  'intro'         => 'Van Fleet Services provides licensed plumbing service for homeowners in this area.',
  'bullets'       => [],
  'body_sections' => [],
];

$city_name = $city['city'];
$state     = $city['state'];
$county    = $city['county'];
$services  = vanfleet_location_services_for_city( $city_slug );

/* ── Breadcrumbs ── */
$crumbs = [
  [ 'label' => 'Home',       'url' => home_url( '/' ) ],
  [ 'label' => 'Plumbing',   'url' => vanfleet_url( 'plumbing' ) ],
  [ 'label' => "{$city_name}, {$state}", 'url' => null ],
];

/* ── Services in this city — location-specific combo pages, plus any
   site-wide Plumbing service Van Fleet offers that isn't already
   represented above (e.g. Water Heaters, EV Charger Installation). ── */
$existing_service_slugs = array_column( $services, 'service_slug' );
$generic_services = array_values( array_filter(
  vanfleet_generic_plumbing_services(),
  fn( $l ) => ! in_array( basename( rtrim( (string) wp_parse_url( $l['url'], PHP_URL_PATH ), '/' ) ), $existing_service_slugs, true )
) );

/* ── Service Areas — every Van Fleet location, excluding the current city ── */
$service_areas = array_values( array_filter(
  vanfleet_locations(),
  fn( $l ) => strcasecmp( $l['city'], $city_name ) !== 0
) );

$faqs = ! empty( $city['faqs'] ) ? $city['faqs'] : vanfleet_location_service_faqs( 'hub', $city_name );
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'  => $crumbs,
  'eyebrow' => 'Plumbing Service · ' . $county,
  'title'   => "Plumbing Services in {$city_name}, {$state}",
  'intro'   => ! empty( $city['plumbing_intro'] ) ? $city['plumbing_intro'] : "Van Fleet Services LLC provides licensed plumbing service for {$city_name} homeowners — repairs, installations, and 24/7 emergency response from a local, trusted team.",
  'bullets' => [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ],
  'cta_primary_label' => 'Call Now · 24/7',
] ); ?>

<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- Main content: left body + right sticky sidebar -->
<section class="vf-section">
  <div class="vf-container vf-content-split">

    <!-- Left column -->
    <div class="vf-content-split__body">

      <p class="vf-eyebrow">What We Do</p>
      <h2>Complete Plumbing Service in <?php echo esc_html( $city_name ); ?></h2>
      <p class="vf-lead" style="max-width:52ch;margin-bottom:var(--space-8)">Our licensed local plumbers handle every part of home plumbing work for <?php echo esc_html( $city_name ); ?> homeowners.</p>
      <ul class="vf-checklist">
        <li>Plumber &amp; general repairs</li>
        <li>Sump pump installation and repair</li>
        <li>Well pump installation and repair</li>
        <li>Water softener installation</li>
        <li>Tankless and tank-style water heaters</li>
        <li>24/7 emergency plumbing</li>
      </ul>

      <?php if ( ! empty( $city['plumbing_body_sections'] ) ): ?>
        <div class="vf-page-content">
          <?php foreach ( $city['plumbing_body_sections'] as $section ): ?>
            <?php if ( ! empty( $section['heading'] ) ): ?><h2><?php echo esc_html( $section['heading'] ); ?></h2><?php endif; ?>
            <?php foreach ( (array) ( $section['paragraphs'] ?? [] ) as $p ): ?>
              <p><?php echo esc_html( $p ); ?></p>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="vf-photo-placeholder" style="margin:var(--space-8) 0;height:260px;">
        <img
          src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>"
          alt="Plumbing service — Van Fleet Services in <?php echo esc_attr( $city_name ); ?>, <?php echo esc_attr( $state ); ?>"
          loading="lazy"
          decoding="async"
          width="800"
          height="260"
        />
      </div>

      <p class="vf-eyebrow">Our Process</p>
      <h2>How Service Works</h2>
      <div class="vf-process-steps vf-process-steps--3">
        <div class="vf-process-step" style="background:var(--gray-50);border-radius:var(--radius-lg);padding:var(--space-6)"><span class="vf-process-step__num" style="width:32px;height:32px;border-radius:50%;font-size:14px;background:var(--navy-700);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:var(--space-4)">1</span><h4>Call or Book</h4><p>Reach us 24/7 by phone or request service online.</p></div>
        <div class="vf-process-step" style="background:var(--gray-50);border-radius:var(--radius-lg);padding:var(--space-6)"><span class="vf-process-step__num" style="width:32px;height:32px;border-radius:50%;font-size:14px;background:var(--navy-700);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:var(--space-4)">2</span><h4>Diagnose &amp; Quote</h4><p>We inspect the issue and give you a flat-rate price to approve first.</p></div>
        <div class="vf-process-step" style="background:var(--gray-50);border-radius:var(--radius-lg);padding:var(--space-6)"><span class="vf-process-step__num" style="width:32px;height:32px;border-radius:50%;font-size:14px;background:var(--navy-700);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:var(--space-4)">3</span><h4>Fixed Right</h4><p>Licensed local pros complete the job cleanly and back their work.</p></div>
      </div>

    </div>

    <!-- Right sticky sidebar -->
    <aside class="vf-sidebar">
      <div class="vf-sidebar-call" style="background:var(--navy-600);color:#fff;border-radius:var(--radius-lg);padding:var(--space-6)">
        <h3 style="color:#fff;font-size:20px;margin:0 0 6px">Talk to a Pro Now</h3>
        <p style="color:var(--navy-100);font-size:14.5px;margin:0 0 var(--space-4);line-height:1.5">We answer 24/7 — no call centers.</p>
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="width:100%;justify-content:center;border-radius:var(--radius-pill)">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call 24/7
        </a>
      </div>

      <?php if ( ! empty( $services ) || ! empty( $generic_services ) ): ?>
        <div class="vf-internal-links">
          <h3>Services in <?php echo esc_html( $city_name ); ?></h3>
          <ul>
            <?php foreach ( $services as $s ): ?>
              <li>
                <a href="<?php echo esc_url( vanfleet_url( $s['slug'] ) ); ?>">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                  <?php echo esc_html( $s['title'] ); ?>
                </a>
              </li>
            <?php endforeach; ?>
            <?php foreach ( $generic_services as $gs ): ?>
              <li>
                <a href="<?php echo esc_url( $gs['url'] ); ?>">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                  <?php echo esc_html( $gs['label'] ); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ( ! empty( $service_areas ) ): ?>
        <div class="vf-internal-links">
          <h3>Service Areas</h3>
          <ul>
            <?php foreach ( $service_areas as $l ): ?>
              <li>
                <a href="<?php echo esc_url( vanfleet_location_url( $l ) ); ?>">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                  <?php echo esc_html( $l['city'] . ', ' . $l['state'] ); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    </aside>

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

<!-- FAQ -->
<section class="vf-section">
  <div class="vf-container vf-narrow">
    <div class="vf-section-head">
      <p class="vf-eyebrow">FAQ</p>
      <h2><?php echo esc_html( $city_name ); ?> Plumbing Questions</h2>
    </div>
    <?php vanfleet_partial( 'template-parts/components/faq-accordion', [ 'faqs' => $faqs ] ); ?>
  </div>
</section>

<!-- Emergency CTA — navy banner matching approved service.html design -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-emergency" style="background:linear-gradient(120deg,var(--navy-700),var(--blue-600));color:#fff;border-radius:var(--radius-xl);padding:var(--space-10) var(--space-12);display:flex;align-items:center;justify-content:space-between;gap:var(--space-8);flex-wrap:wrap">
      <div class="vf-emergency__phone-icon" aria-hidden="true" style="width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </div>
      <div class="vf-emergency__body" style="flex:1;min-width:200px">
        <h3 style="font-size:24px;color:#fff;margin:0 0 6px">Need Emergency Service in <?php echo esc_html( $city_name ); ?>?</h3>
        <p style="color:var(--navy-100);font-size:15px;margin:0">We dispatch fast across <?php echo esc_html( $county ); ?> — call any time, day or night.</p>
      </div>
      <div class="vf-emergency__actions" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
        <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="display:inline-flex;align-items:center;gap:8px;padding:13px 24px;border-radius:8px;font-family:var(--font-heading);font-weight:700;font-size:var(--fs-sm);background:#fff;color:var(--color-cta);box-shadow:var(--shadow-lg);border:2px solid transparent;text-decoration:none">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call <?php echo esc_html( $g['phone_display'] ); ?>
        </a>
        <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>" style="display:inline-flex;align-items:center;padding:13px 24px;border-radius:var(--radius-pill);font-family:var(--font-heading);font-weight:700;font-size:var(--fs-sm);background:transparent;color:#fff;border:2px solid rgba(255,255,255,.5);text-decoration:none">Schedule Service</a>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
