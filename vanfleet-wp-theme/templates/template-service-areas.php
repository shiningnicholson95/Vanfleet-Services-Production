<?php
/**
 * Template Name: Van Fleet Service Areas
 * "All Service Area" hub page — was previously assigned the generic
 * Service Hub template (shared with /plumbing/ and /electrical/), which
 * rendered a mismatched "Explore All Service Area" fallback section.
 * The card grid below lists the 12 towns Van Fleet serves (all of
 * inc/data-locations.php except the Chester Springs home base and Exton,
 * per PRD 7.1), replacing both the old services grid and the separate,
 * redundant locations split-section that used to sit further down the page.
 */
get_header();

$g = vanfleet_global();

$crumbs = [
  [ 'label' => 'Home', 'url' => home_url( '/' ) ],
  [ 'label' => get_the_title(), 'url' => null ],
];

$faqs = vanfleet_data( 'faqs' );
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'            => $crumbs,
  'eyebrow'           => 'Service Areas',
  'title'             => 'Plumbing &amp; Electrical Service Areas in Chester County, PA',
  'intro'             => 'Van Fleet Services provides licensed, flat-rate plumbing and electrical service for homeowners across Chester County — same-day appointments and 24/7 emergency response.',
  'bullets'           => [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ],
  'cta_primary_label' => 'Call Now · 24/7',
] ); ?>

<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- Service Areas -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Service Area</p>
      <h2>Proudly Serving Chester County &amp; SE Pennsylvania</h2>
      <p class="vf-lead">Based in Chester Springs and covering the surrounding towns. Don't see yours? Give us a call.</p>
    </div>
    <?php
    $pin_icon = '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>';
    $service_area_cards = [
      [ 'title' => 'Glenmoore',       'slug' => 'glenmoore',       'description' => 'Local plumbing & electrical experts for homes and businesses.' ],
      [ 'title' => 'Kennett Square',  'slug' => 'kennett-square',  'description' => 'Fast, reliable plumbing & electrical services you can count on.' ],
      [ 'title' => 'King of Prussia', 'slug' => 'king-of-prussia', 'description' => 'Professional plumbing & electrical solutions delivered with care.' ],
      [ 'title' => 'Malvern',         'slug' => 'malvern',         'description' => 'Quality plumbing & electrical repairs, installations, and maintenance.' ],
      [ 'title' => 'Coatesville',     'slug' => 'coatesville',     'description' => 'Trusted local plumbing & electrical service with prompt response.' ],
      [ 'title' => 'Thorndale',       'slug' => 'thorndale',       'description' => 'Dependable plumbing & electrical services for every home.' ],
      [ 'title' => 'Phoenixville',    'slug' => 'phoenixville',    'description' => 'Complete plumbing & electrical solutions from licensed professionals.' ],
      [ 'title' => 'Downingtown',     'slug' => 'downingtown',     'description' => 'Expert plumbing & electrical services with upfront, honest pricing.' ],
      [ 'title' => 'Pottstown',       'slug' => 'pottstown',       'description' => 'Residential plumbing & electrical repairs done right the first time.' ],
      [ 'title' => 'Glen Mills',      'slug' => 'glen-mills',      'description' => 'Reliable plumbing & electrical services backed by local experience.' ],
      [ 'title' => 'West Chester',    'slug' => 'west-chester',    'description' => 'Your neighborhood experts for plumbing & electrical needs.' ],
      [ 'title' => 'Berwyn',          'slug' => 'berwyn',          'description' => 'Professional plumbing & electrical services with exceptional workmanship.' ],
    ];
    ?>
    <div class="vf-grid vf-grid--3">
      <?php foreach ( $service_area_cards as $card ):
        vanfleet_partial( 'template-parts/components/service-card', [ 'service' => [
          'title'       => $card['title'],
          'description' => $card['description'],
          'slug'        => $card['slug'],
          'cta'         => 'Learn more',
          'url'         => vanfleet_url( 'locations/' . $card['slug'] ),
          'icon'        => $pin_icon,
        ] ] );
      endforeach; ?>
    </div>
  </div>
</section>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $content = get_the_content();
  if ( $content ) : ?>
    <section class="vf-section">
      <div class="vf-container vf-narrow">
        <div class="vf-page-content"><?php the_content(); ?></div>
      </div>
    </section>
  <?php endif; endwhile; endif; ?>

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
      <h2>Service Area Questions</h2>
    </div>
    <?php vanfleet_partial( 'template-parts/components/faq-accordion', [ 'faqs' => $faqs ] ); ?>
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
