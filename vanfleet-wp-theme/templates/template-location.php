<?php
/**
 * Template Name: Van Fleet Location Page
 * Applies to all service-area location pages.
 */
get_header();

$g   = vanfleet_global();
$loc = ( isset( $vf_override_location_slug ) ? vanfleet_location_by_slug( $vf_override_location_slug )
       : ( isset( $vf_override_slug ) ? vanfleet_location_by_slug( $vf_override_slug )
       : vanfleet_current_location() ) ) ?: [
  'city'    => get_the_title(),
  'state'   => 'PA',
  'county'  => 'Chester County',
  'slug'    => '',
  'intro'   => 'Van Fleet Services provides licensed plumbing and electrical service in this area.',
];

$city    = $loc['city'];
$state   = $loc['state'];
$county  = $loc['county'];

/* ── Breadcrumbs ── */
$crumbs = [
  [ 'label' => 'Home',          'url' => home_url( '/' ) ],
  [ 'label' => 'Service Areas', 'url' => vanfleet_url( 'service-areas' ) ],
  [ 'label' => $city,           'url' => null ],
];

/* ── Nearby locations (all other locations, exclude current) ── */
$nearby = array_values( array_filter(
  vanfleet_locations(),
  fn( $l ) => ( $l['slug'] ?? '' ) !== ( $loc['slug'] ?? '' )
) );

/* ── Location FAQs — dynamically generated from location data ── */
$faqs = [
  [
    'question' => "Do you offer emergency service in {$city}?",
    'answer'   => "Yes — we provide 24/7 emergency plumbing throughout {$city} and the surrounding {$county} area. Call (267) 300-4526 any time.",
  ],
  [
    'question' => "How fast can you get to {$city}?",
    'answer'   => "Because we're local to Chester Springs, we often offer same-day appointments in {$city}, and we prioritize emergencies above all else.",
  ],
  [
    'question' => "What plumbing and electrical services do you offer in {$city}?",
    'answer'   => "We provide the full range — plumbing repairs, drain cleaning, water heater service, well and sump pump service, leak detection, electrical repairs, panel upgrades, lighting, outlets, and 24/7 emergency service in {$city}, {$state}.",
  ],
  [
    'question' => 'What payment options do you accept?',
    'answer'   => 'We accept all major credit and debit cards. Financing is available on larger jobs like water heater replacements and panel upgrades.',
  ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'  => $crumbs,
  'eyebrow' => 'Service Area · ' . $county,
  'title'   => "Plumbing &amp; Electrical Services in {$city}, {$state}",
  'intro'   => $loc['intro'],
  'bullets' => [ 'Local crews', 'Same-day service', '24/7 emergency', 'Upfront pricing' ],
  'cta_primary_label'   => 'Call Now · 24/7',
  'cta_secondary_label' => 'Schedule Service',
] ); ?>

<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- Local intro + sticky sidebar -->
<section class="vf-section">
  <div class="vf-container vf-content-split">

    <!-- Left body -->
    <div class="vf-content-split__body">
      <p class="vf-eyebrow">Local to <?php echo esc_html( $city ); ?></p>
      <h2>Your Trusted <?php echo esc_html( $city ); ?> Plumber &amp; Electrician</h2>
      <p class="vf-lead">We know <?php echo esc_html( $city ); ?> homes — from older properties to newer builds. Our local crews arrive on time and treat your home with respect.</p>
      <div class="vf-cta-row">
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call 24/7
        </a>
        <a class="vf-btn vf-btn--secondary" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
      </div>
      <div class="vf-photo-placeholder" style="margin-top:var(--space-8);height:280px">
        <img
          src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>"
          alt="Van Fleet Services serving <?php echo esc_attr( $city ); ?>"
          loading="lazy"
          decoding="async"
          width="800"
          height="280"
        >
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

      <?php
      global $wpdb;
      $svc_ids = array_map( 'intval', (array) $wpdb->get_col(
        "SELECT DISTINCT post_id FROM {$wpdb->postmeta}
         WHERE meta_key = '_wp_page_template'
           AND meta_value LIKE '%template-service%'
           AND meta_value NOT LIKE '%hub%'"
      ) );
      $related_services_q = empty( $svc_ids ) ? null : new WP_Query( [
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'post__in'       => $svc_ids,
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ] );
      if ( $related_services_q && $related_services_q->have_posts() ) : ?>
      <div class="vf-internal-links">
        <h3>Related Services</h3>
        <ul>
          <?php while ( $related_services_q->have_posts() ) : $related_services_q->the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              <?php echo vf_clean_page_title( get_the_title() ); ?>
            </a>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </div>
      <?php endif; ?>

      <?php
      $location_pages_q = vf_get_locations_query( -1, [], [ (int) get_the_ID() ] );
      if ( $location_pages_q->have_posts() ) : ?>
      <div class="vf-internal-links">
        <h3>Service Areas</h3>
        <ul>
          <?php while ( $location_pages_q->have_posts() ) : $location_pages_q->the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              <?php echo vf_clean_page_title( get_the_title() ); ?>
            </a>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </div>
      <?php endif; ?>
    </aside>

  </div>
</section>

<!-- Services offered in this location -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Services</p>
      <h2>What We Offer in <?php echo esc_html( $city ); ?></h2>
      <p class="vf-lead">One local team for all your home's plumbing and electrical needs.</p>
    </div>
    <?php
    $loc_services = [
      [ 'title' => 'Plumbing Repair',     'description' => 'Leaks, clogs, running toilets, and everyday fixes done fast and clean.',              'slug' => 'plumbing/plumbing-repair',            'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/plumber' ) ],
      [ 'title' => 'Water Heater Service','description' => 'Repair & replacement for tank and tankless — hot water back the same day.',           'slug' => 'water-heaters/water-heater-repair',   'cta' => 'Learn more', 'url' => vanfleet_url( 'electrical/water-heaters' ) ],
      [ 'title' => 'Drain Cleaning',      'description' => 'Slow or backed-up drains cleared with no mess and no guesswork.',                     'slug' => 'plumbing/drain-cleaning',             'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/plumber' ) ],
      [ 'title' => 'Well & Sump Pumps',   'description' => 'Well pumps, sump pumps, and sewage ejector service to keep you dry.',                 'slug' => 'pump-services',                       'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/well-pumps' ) ],
      [ 'title' => 'Electrical Repair',   'description' => 'Panel upgrades, lighting, outlets, and switches by licensed electricians.',           'slug' => 'electrical/electrical-repair',        'cta' => 'Learn more', 'url' => vanfleet_url( 'electrical/service-panel-installation' ) ],
      [ 'title' => 'Leak & Pipe Repair',  'description' => 'Precision leak detection and lasting pipe repair before damage spreads.',             'slug' => 'plumbing/leak-detection-pipe-repair', 'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/plumber' ) ],
    ];
    ?>
    <div class="vf-grid vf-grid--3">
      <?php foreach ( $loc_services as $s ):
        vanfleet_partial( 'template-parts/components/service-card', [ 'service' => $s ] );
      endforeach; ?>
    </div>
    <div class="vf-section__cta"><?php echo vanfleet_button( 'View All Services', vanfleet_url( 'all-services' ), 'secondary' ); ?></div>
  </div>
</section>

<!-- Reviews -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow"><?php echo esc_html( $city ); ?> Reviews</p>
      <h2>Neighbors Who Trust Us</h2>
    </div>
    <div class="vf-reviews-grid">
      <?php foreach ( array_slice( vanfleet_data( 'reviews' ), 0, 3 ) as $r ) {
        vanfleet_partial( 'template-parts/components/review-card', [ 'review' => $r ] );
      } ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="vf-section vf-section--tint">
  <div class="vf-container vf-narrow">
    <div class="vf-section-head">
      <p class="vf-eyebrow">FAQ</p>
      <h2><?php echo esc_html( $city ); ?> Service Questions</h2>
    </div>
    <?php vanfleet_partial( 'template-parts/components/faq-accordion', [ 'faqs' => $faqs ] ); ?>
  </div>
</section>

<!-- Nearby areas -->
<?php if ( ! empty( $nearby ) ): ?>
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Nearby</p>
      <h2>Also Serving These Areas</h2>
    </div>
    <div class="vf-areas-grid">
      <?php foreach ( $nearby as $n ):
        vanfleet_partial( 'template-parts/components/location-card', [ 'location' => $n, 'compact' => true ] );
      endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Emergency CTA — navy banner matching service page design -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-emergency" style="background:linear-gradient(120deg,var(--navy-700),var(--blue-600));color:#fff;border-radius:var(--radius-xl);padding:var(--space-10) var(--space-12);display:flex;align-items:center;justify-content:space-between;gap:var(--space-8);flex-wrap:wrap">
      <div class="vf-emergency__phone-icon" aria-hidden="true" style="width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </div>
      <div class="vf-emergency__body" style="flex:1;min-width:200px">
        <h3 style="font-size:24px;color:#fff;margin:0 0 6px">Need Emergency Service in <?php echo esc_html( $city ); ?>?</h3>
        <p style="color:var(--navy-100);font-size:15px;margin:0">We dispatch fast across <?php echo esc_html( $county ); ?> — call any time, day or night.</p>
      </div>
      <div class="vf-emergency__actions" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
        <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="display:inline-flex;align-items:center;gap:8px;padding:13px 24px;border-radius:var(--radius-pill);font-family:var(--font-heading);font-weight:700;font-size:var(--fs-sm);background:#fff;color:var(--color-cta);box-shadow:var(--shadow-lg);border:2px solid transparent;text-decoration:none">
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
