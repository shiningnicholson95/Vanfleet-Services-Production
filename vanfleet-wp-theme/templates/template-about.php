<?php
/**
 * Template Name: Van Fleet About Page
 * Imported from Claude Design — "Van Fleet - About.html" (VFAboutPage component).
 */
get_header();

/* ── Breadcrumbs ── */
$crumbs = [
  [ 'label' => 'Home',     'url' => home_url( '/' ) ],
  [ 'label' => 'About Us', 'url' => null ],
];

/* ── Values ── */
$values = [
  [ 'icon' => 'shield',      'title' => 'Honesty First',          'text' => 'Upfront, flat-rate pricing you approve before we start. No surprises, no upsells.' ],
  [ 'icon' => 'clock',       'title' => 'Respect for Your Time',  'text' => 'On-time arrivals, same-day options, and true 24/7 emergency response.' ],
  [ 'icon' => 'check',       'title' => 'Done Right Once',        'text' => 'Licensed, trained technicians and quality workmanship backed by our guarantee.' ],
  [ 'icon' => 'mapPin',      'title' => 'Local & Invested',       'text' => 'We live here. Your neighbors are our customers, and our reputation is everything.' ],
];

/* ── Team ── */
$team = [
  [ 'name' => 'Owner / Master Plumber', 'role' => 'Founder',              'photo' => home_url( '/wp-content/uploads/2026/07/vanfleet-owner.png' ),       'photo_pos' => 'center top' ],
  [ 'name' => 'Service Technician',     'role' => 'Plumbing & Electrical', 'photo' => home_url( '/wp-content/uploads/2026/07/vanfleet-technician.png' ),  'photo_pos' => 'center top' ],
  [ 'name' => 'Office & Dispatch',      'role' => 'Customer Care',         'photo' => home_url( '/wp-content/uploads/2026/07/vanfleet-office-staff.png' ), 'photo_pos' => 'center 35%' ],
];

$icons = [
  'shield' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
  'clock'  => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
  'check'  => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>',
  'mapPin' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'  => $crumbs,
  'eyebrow' => 'About Van Fleet Services',
  'title'   => 'Your Local Plumbing & Electrical Team in Chester County',
  'intro'   => 'Van Fleet Services is a locally owned plumbing and electrical company built on honest work and real relationships. We help homeowners across Chester Springs and the surrounding towns keep their homes safe, comfortable, and running.',
  'bullets' => [],
] ); ?>

<!-- Stat strip -->
<div style="background:#fff;border-bottom:1px solid var(--border-default)">
  <div class="vf-container vf-grid vf-grid--4" style="padding-block:var(--space-8)">
    <?php foreach ( [
      [ '15+',  'Years serving Chester County' ],
      [ '200+', '5-star local reviews' ],
      [ '24/7', 'Emergency availability' ],
      [ '100%', 'Licensed &amp; insured' ],
    ] as [ $value, $label ] ): ?>
      <div style="text-align:center">
        <div style="font-family:var(--font-heading);font-weight:var(--fw-extrabold);font-size:40px;color:var(--color-primary);line-height:1"><?php echo esc_html( $value ); ?></div>
        <div style="font-size:14.5px;color:var(--text-muted);margin-top:8px;font-weight:600"><?php echo wp_kses_post( $label ); ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Our Story -->
<section class="vf-section">
  <div class="vf-container vf-grid vf-grid--2" style="align-items:center;gap:var(--space-12)">
    <div>
      <p class="vf-eyebrow">Our Story</p>
      <h2>Built on Trust, One Home at a Time</h2>
      <p class="vf-lead">Van Fleet started with a simple idea: homeowners deserve a plumber and electrician they can actually trust — someone who picks up the phone, shows up on time, and charges a fair, honest price.</p>
      <p>Today we're proud to be one of Chester County's go-to local home-service teams. From a leaky faucet to a full panel upgrade or a midnight burst pipe, we treat every home like it's our own — and we stand behind every job we do.</p>
      <div class="vf-cta-row">
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call 24/7
        </a>
        <a class="vf-btn vf-btn--secondary" href="<?php echo esc_url( vanfleet_url( 'contact-us' ) ); ?>">Contact Us</a>
      </div>
    </div>
    <div class="vf-photo-placeholder" style="height:400px">
      <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>" alt="Van Fleet Services team" loading="lazy" decoding="async">
    </div>
  </div>
</section>

<!-- Values -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Our Values</p>
      <h2>What You Can Count On</h2>
      <p class="vf-lead">The standards behind every Van Fleet service call.</p>
    </div>
    <div class="vf-grid vf-grid--4">
      <?php foreach ( $values as $v ): ?>
        <div class="vf-card">
          <div class="vf-trust-badge__icon" style="width:52px;height:52px"><?php echo $icons[ $v['icon'] ]; ?></div>
          <h3 style="margin:var(--space-4) 0 8px;font-size:19px"><?php echo esc_html( $v['title'] ); ?></h3>
          <p style="margin:0;font-size:15px;line-height:1.55;color:var(--text-body)"><?php echo esc_html( $v['text'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Team -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Meet the Team</p>
      <h2>The People Behind Van Fleet</h2>
      <p class="vf-lead">Friendly, licensed local pros who treat your home with respect.</p>
    </div>
    <div class="vf-grid vf-grid--3" style="max-width:900px;margin-inline:auto">
      <?php foreach ( $team as $m ): ?>
        <div style="background:var(--surface-card);border:1px solid var(--border-default);border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-md)">
          <div style="height:260px;overflow:hidden">
            <img src="<?php echo esc_url( $m['photo'] ); ?>" alt="<?php echo esc_attr( $m['name'] ); ?>" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover;object-position:<?php echo esc_attr( $m['photo_pos'] ?? 'center top' ); ?>">
          </div>
          <div style="padding:var(--space-5)">
            <h4 style="margin:0 0 3px;font-size:17px"><?php echo esc_html( $m['name'] ); ?></h4>
            <p style="margin:0;font-size:14px;color:var(--text-muted)"><?php echo esc_html( $m['role'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Where We Work -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Where We Work</p>
      <h2>Serving Chester County &amp; SE Pennsylvania</h2>
      <p class="vf-lead">Based in Chester Springs and covering the surrounding communities.</p>
    </div>
    <div class="vf-grid vf-grid--4">
      <?php foreach ( vanfleet_locations() as $loc ):
        vanfleet_partial( 'template-parts/components/location-card', [ 'location' => $loc, 'compact' => true ] );
      endforeach; ?>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="vf-section--cta-dark">
  <div class="vf-container vf-cta-dark__body">
    <h2>Ready to Work With a Team You Can Trust?</h2>
    <p class="vf-lead">Call now or schedule service — we'll treat your home like our own.</p>
    <div class="vf-cta-row vf-cta-row--center">
      <?php echo vanfleet_button( 'Call Now · 24/7', vanfleet_tel_href(), 'primary' ); ?>
      <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'contact-us' ) ); ?>">Contact Us</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
