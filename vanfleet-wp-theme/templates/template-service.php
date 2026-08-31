<?php
/**
 * Template Name: Van Fleet Service Page
 * Applies to individual service pages (type = service).
 */
get_header();

$g       = vanfleet_global();
$service = ( isset( $vf_override_slug ) ? vanfleet_service_by_slug( $vf_override_slug ) : vanfleet_current_service() ) ?: [
  'title'           => get_the_title(),
  'slug'            => '',
  'type'            => 'service',
  'parent'          => null,
  'description'     => 'Professional plumbing and electrical service for Chester County homeowners.',
  'cta'             => 'Request Service',
  'primary_keyword' => '',
  'features'        => [],
  'faqs'            => [],
];

/* ── Breadcrumbs ── */
$crumbs = [ [ 'label' => 'Home', 'url' => home_url( '/' ) ] ];
if ( ! empty( $service['parent'] ) ) {
  $parent = null;
  foreach ( vanfleet_services() as $s ) {
    if ( $s['slug'] === $service['parent'] ) { $parent = $s; break; }
  }
  if ( $parent ) {
    $crumbs[] = [ 'label' => $parent['title'], 'url' => vanfleet_service_url( $parent ) ];
  }
}
$crumbs[] = [ 'label' => $service['title'], 'url' => null ];

/* ── Related services (siblings or top-level hubs) ── */
$parent_slug = $service['parent'] ?? '';
$related = [];
foreach ( vanfleet_services() as $s ) {
  if ( $s['slug'] === $service['slug'] ) continue;
  if ( $parent_slug && ( $s['parent'] ?? '' ) === $parent_slug ) {
    $related[] = $s;
  }
}
if ( empty( $related ) ) {
  foreach ( vanfleet_services( 'hub' ) as $s ) {
    if ( $s['slug'] !== ( $service['parent'] ?? $service['slug'] ) ) {
      $related[] = $s;
    }
  }
}
$related = array_slice( $related, 0, 6 );

/* ── Service-specific FAQs → fall back to global ── */
$faqs = ! empty( $service['faqs'] ) ? $service['faqs'] : vanfleet_data( 'faqs' );

/* ── Hero eyebrow ── */
$eyebrow = ! empty( $service['parent'] )
  ? ucwords( str_replace( '-', ' ', $service['parent'] ) ) . ' Service'
  : 'Service';
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'  => $crumbs,
  'eyebrow' => $eyebrow,
  'title'   => $service['title'] . ' in Chester County, PA',
  'intro'   => $service['description'],
  'bullets' => [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ],
  'cta_primary_label' => $service['cta'],
] ); ?>

<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- Main content: left body + right sticky sidebar -->
<section class="vf-section">
  <div class="vf-container vf-content-split">

    <!-- Left column -->
    <div class="vf-content-split__body">

      <?php if ( ! empty( $service['features'] ) ): ?>
        <p class="vf-eyebrow">What We Do</p>
        <h2><?php echo esc_html( 'Complete ' . $service['title'] ); ?></h2>
        <p class="vf-lead" style="max-width:52ch;margin-bottom:var(--space-8)">Our licensed local pros handle every aspect of <?php echo esc_html( strtolower( $service['title'] ) ); ?> for Chester County homeowners.</p>
        <ul class="vf-checklist">
          <?php foreach ( $service['features'] as $feature ): ?>
            <li><?php echo esc_html( $feature ); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <div class="vf-photo-placeholder" style="margin:var(--space-8) 0;height:260px;">
        <img
          src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>"
          alt="<?php echo esc_attr( $service['image_alt'] ?? ( $service['title'] . ' — Van Fleet Services' ) ); ?>"
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

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $content = get_the_content();
        if ( $content ) : ?>
          <div class="vf-page-content"><?php the_content(); ?></div>
        <?php endif; endwhile; endif; ?>

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

      <?php if ( ! empty( $related ) ) : ?>
        <div class="vf-internal-links">
          <h3>Related Services</h3>
          <ul>
            <?php foreach ( $related as $r ) : ?>
              <li>
                <a href="<?php echo esc_url( vanfleet_service_url( $r ) ); ?>">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                  <?php echo esc_html( $r['title'] ); ?>
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
      <h2><?php echo esc_html( $service['title'] . ' Questions' ); ?></h2>
    </div>
    <?php vanfleet_partial( 'template-parts/components/faq-accordion', [ 'faqs' => $faqs ] ); ?>
  </div>
</section>

<!-- Service Areas -->
<section class="vf-section vf-section--tint" id="areas">
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

<!-- Emergency CTA — navy banner matching approved service.html design -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-emergency" style="background:linear-gradient(120deg,var(--navy-700),var(--blue-600));color:#fff;border-radius:var(--radius-xl);padding:var(--space-10) var(--space-12);display:flex;align-items:center;justify-content:space-between;gap:var(--space-8);flex-wrap:wrap">
      <div class="vf-emergency__phone-icon" aria-hidden="true" style="width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </div>
      <div class="vf-emergency__body" style="flex:1;min-width:200px">
        <h3 style="font-size:24px;color:#fff;margin:0 0 6px">Need Emergency <?php echo esc_html( $service['title'] ); ?>?</h3>
        <p style="color:var(--navy-100);font-size:15px;margin:0">We dispatch fast across Chester County — call any time, day or night.</p>
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
