<?php
/**
 * Template Name: Location Page
 * Template Post Type: page
 *
 * Reusable location page template converted from designfiles/site/location.html.
 * All variable content is pulled from ACF fields (if ACF active) or post meta,
 * with computed / data-file defaults when fields are empty.
 */

get_header();

$id    = get_the_ID();
$title = get_the_title();
$g     = vanfleet_global();

/* ── Field helpers ──────────────────────────────────────────── */
$f = function ( string $key, $default = '' ) use ( $id ) {
	$val = function_exists( 'get_field' )
		? get_field( $key )
		: get_post_meta( $id, $key, true );
	return ( $val !== false && $val !== null && $val !== '' ) ? $val : $default;
};

$fr = function ( string $key ) use ( $id ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $key );
		return is_array( $val ) ? $val : [];
	}
	$val = get_post_meta( $id, $key, true );
	return is_array( $val ) ? $val : [];
};

/* ── Scalar fields ──────────────────────────────────────────── */
$location_name     = esc_html( $title );
$hero_heading      = $f( 'location_hero_heading', "Plumbing &amp; Electrical in {$title}, PA" );
$hero_intro        = $f( 'location_hero_intro',   "Van Fleet Services sends licensed local crews to {$title} and nearby Chester County communities — fast response, upfront pricing, and 24/7 emergency coverage." );
$intro_heading     = $f( 'location_intro_heading', "Your Local Plumbing &amp; Electrical Team" );
$intro_body        = $f( 'location_intro_body',    "Van Fleet serves {$title} homeowners with the same speed and care we bring to every Chester County community. Whether it's a leaking pipe, a tripped breaker, or a water heater that's given up — our licensed technicians respond fast, diagnose honestly, and fix it right the first time." );
$photo_id          = (int) $f( 'location_photo_id', 0 );
$services_eyebrow  = $f( 'location_services_eyebrow', "Services in {$title}" );
$services_heading  = $f( 'location_services_heading', 'What We Do Here' );
$reviews_heading   = $f( 'location_reviews_heading',  "What {$title} Homeowners Say" );
$faq_heading       = $f( 'location_faq_heading',      "Questions About {$title} Service" );
$emergency_heading = $f( 'location_emergency_heading', "Plumbing or Electrical Emergency in {$title}?" );
$emergency_body    = $f( 'location_emergency_body',    'Our crews are close by and ready 24/7 — call now for fast response.' );

/* ── Repeater fields ────────────────────────────────────────── */
$hero_bullets = $fr( 'location_hero_bullets' );
$reviews      = $fr( 'location_reviews' );
$faqs         = $fr( 'location_faqs' );

/* ── Defaults for empty repeaters ──────────────────────────── */
if ( empty( $hero_bullets ) ) {
	$hero_bullets = [
		[ 'label' => "Local crews in {$title}" ],
		[ 'label' => 'Same-day appointments' ],
		[ 'label' => '24/7 emergency calls' ],
		[ 'label' => 'Upfront pricing' ],
	];
}

if ( empty( $faqs ) ) {
	$faqs = [
		[
			'question' => "Do you serve all of {$title}?",
			'answer'   => "Yes — we cover all of {$title} and the surrounding area including Chester County communities. If you're nearby, call us.",
		],
		[
			'question' => "How fast can you get to {$title} for an emergency?",
			'answer'   => "We dispatch from Chester Springs, which puts us within 15–25 minutes of most {$title} addresses. We answer around the clock and prioritize emergencies.",
		],
		[
			'question' => "What's included in a service call to {$title}?",
			'answer'   => "Our tech will inspect, diagnose, and give you a flat-rate price before starting any work. No hidden trip fees — you only pay if you approve the job.",
		],
	];
}

if ( empty( $reviews ) ) {
	$reviews = array_slice( vanfleet_data( 'reviews' ), 0, 3 );
}

/* ── Service cards ──────────────────────────────────────────── */
$services = array_slice( vanfleet_services(), 0, 6 );

$service_icons = [
	'plumbing'      => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
	'water-heaters' => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>',
	'pump-services' => '<path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/>',
	'electrical'    => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
	'plumbing/drain-cleaning'             => '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>',
	'plumbing/leak-detection-pipe-repair' => '<path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/>',
];

/* ── Shared escaped values ──────────────────────────────────── */
$tel         = esc_url( vanfleet_tel_href() );
$tel_display = esc_html( $g['phone_display'] );
$contact_url = esc_url( vanfleet_url( 'contact-us' ) );
$home_url    = esc_url( home_url( '/' ) );
$areas_url   = esc_url( vanfleet_url( 'service-areas' ) );
?>
<main id="primary">

<!-- ── 1. PAGE HERO ──────────────────────────────────────────── -->
<section class="vf-page-hero">
  <div class="vf-page-hero__dot-bg" aria-hidden="true"></div>
  <div class="vf-container vf-page-hero__inner">

    <nav class="vf-breadcrumbs vf-breadcrumbs--dark" aria-label="Breadcrumb">
      <a href="<?php echo $home_url; ?>">Home</a>
      <span class="vf-breadcrumbs__sep" aria-hidden="true">/</span>
      <a href="<?php echo $areas_url; ?>">Service Areas</a>
      <span class="vf-breadcrumbs__sep" aria-hidden="true">/</span>
      <span class="vf-breadcrumbs__current"><?php echo $location_name; ?></span>
    </nav>

    <span class="vf-hero__badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
      Licensed Plumbing &amp; Electrical &middot; <?php echo esc_html( strtoupper( $title ) ); ?>
    </span>
    <span class="vf-page-hero__eyebrow">Service Area</span>
    <h1><?php echo wp_kses_post( $hero_heading ); ?></h1>
    <p class="vf-page-hero__intro"><?php echo wp_kses_post( $hero_intro ); ?></p>

    <div class="vf-cta-row">
      <a class="vf-hero-call-btn" href="<?php echo $tel; ?>">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span class="vf-hero-call-btn__text">
          <span class="vf-hero-call-btn__label">Call Now · 24/7</span>
          <span class="vf-hero-call-btn__number"><?php echo $tel_display; ?></span>
        </span>
      </a>
      <a class="vf-hero-schedule-btn" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
    </div>

    <?php if ( ! empty( $hero_bullets ) ) : ?>
    <div class="vf-page-hero__bullets">
      <?php foreach ( $hero_bullets as $bullet ) :
        $label = is_array( $bullet ) ? ( $bullet['label'] ?? '' ) : (string) $bullet;
        if ( ! $label ) continue;
      ?>
      <span>
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="var(--orange-300)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <?php echo esc_html( $label ); ?>
      </span>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div>
</section>

<!-- ── 2. TRUST BAR ───────────────────────────────────────────── -->
<div class="vf-trustbar">
  <div class="vf-container vf-trustbar__grid">
    <div class="vf-trust-badge">
      <div class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
      <div class="vf-trust-badge__text"><strong>Licensed &amp; Insured</strong><span>PA HIC registered</span></div>
    </div>
    <div class="vf-trust-badge">
      <div class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
      <div class="vf-trust-badge__text"><strong>5-Star Rated</strong><span>200+ local reviews</span></div>
    </div>
    <div class="vf-trust-badge">
      <div class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <div class="vf-trust-badge__text"><strong>24/7 Emergency</strong><span>We answer the phone</span></div>
    </div>
    <div class="vf-trust-badge">
      <div class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
      <div class="vf-trust-badge__text"><strong>Upfront Pricing</strong><span>Approve before we start</span></div>
    </div>
  </div>
</div>

<!-- ── 3. LOCAL INTRO SPLIT ──────────────────────────────────── -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-local-split">
      <div>
        <span class="vf-eyebrow"><?php echo $location_name; ?>, PA</span>
        <h2><?php echo wp_kses_post( $intro_heading ); ?></h2>
        <p><?php echo wp_kses_post( $intro_body ); ?></p>
        <div class="vf-cta-row">
          <a class="vf-btn vf-btn--primary" href="<?php echo $tel; ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            Call <?php echo $tel_display; ?>
          </a>
          <a class="vf-btn vf-btn--secondary" href="<?php echo $contact_url; ?>">Schedule Online</a>
        </div>
      </div>

      <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>" alt="<?php echo esc_attr( "{$title} — Van Fleet Services" ); ?>" width="600" height="320" loading="lazy" decoding="async" style="height:320px;width:100%;object-fit:cover;border-radius:var(--radius-xl)">
    </div>
  </div>
</section>

<!-- ── 4. SERVICES GRID ───────────────────────────────────────── -->
<section class="vf-section vf-section--gray">
  <div class="vf-container">
    <div class="vf-section-head">
      <span class="vf-eyebrow"><?php echo wp_kses_post( $services_eyebrow ); ?></span>
      <h2><?php echo esc_html( $services_heading ); ?></h2>
      <p class="vf-lead">From everyday repairs to 24/7 emergencies — licensed, upfront-priced, and done right.</p>
    </div>
    <div class="vf-services-grid">
      <?php foreach ( $services as $s ) :
        $s_slug     = $s['slug'] ?? '';
        $s_base     = explode( '/', $s_slug )[0];
        $svg_path   = $service_icons[ $s_slug ] ?? $service_icons[ $s_base ] ?? '<circle cx="12" cy="12" r="10"/>';
        $s_url      = esc_url( vanfleet_service_url( $s ) );
        $s_title    = esc_html( $s['title'] ?? '' );
        $s_desc     = esc_html( $s['description'] ?? '' );
        $s_cta      = esc_html( $s['cta'] ?? 'Learn more' );
      ?>
      <div class="vf-service-card">
        <div class="vf-service-card__icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $svg_path; ?></svg>
        </div>
        <h3><?php echo $s_title; ?></h3>
        <p><?php echo $s_desc; ?></p>
        <a href="<?php echo $s_url; ?>"><?php echo $s_cta; ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── 5. REVIEWS ────────────────────────────────────────────── -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <span class="vf-eyebrow">Reviews</span>
      <h2><?php echo esc_html( $reviews_heading ); ?></h2>
    </div>
    <div class="vf-reviews-grid">
      <?php
      $review_count = 0;
      foreach ( $reviews as $r ) :
        if ( $review_count >= 3 ) break;
        $quote   = is_array( $r ) ? ( $r['review_text'] ?? $r['quote'] ?? '' ) : '';
        $name    = is_array( $r ) ? ( $r['reviewer_name'] ?? $r['name'] ?? '' ) : '';
        $loc     = is_array( $r ) ? ( $r['location'] ?? $r['location_label'] ?? '' ) : '';
        $source  = is_array( $r ) ? ( $r['source'] ?? $r['platform'] ?? '' ) : '';
        $initial = $name ? mb_strtoupper( mb_substr( $name, 0, 1 ) ) : '?';
        if ( ! $quote || strpos( $quote, '[Insert' ) !== false ) continue;
        $review_count++;
      ?>
      <div class="vf-review-card">
        <div class="vf-review-card__stars" aria-label="5 out of 5 stars">
          <?php for ( $i = 0; $i < 5; $i++ ) : ?>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--color-star)" stroke="none" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="vf-review-card__quote">"<?php echo esc_html( $quote ); ?>"</p>
        <div class="vf-review-card__footer">
          <div class="vf-review-card__avatar" aria-hidden="true"><?php echo esc_html( $initial ); ?></div>
          <div>
            <div class="vf-review-card__name"><?php echo esc_html( $name ); ?></div>
            <div class="vf-review-card__meta"><?php echo esc_html( trim( $loc . ( $source ? ' · ' . $source : '' ) ) ); ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── 6. FAQ ─────────────────────────────────────────────────── -->
<section class="vf-section vf-section--gray">
  <div class="vf-container" style="max-width:820px">
    <div class="vf-section-head">
      <span class="vf-eyebrow">FAQ</span>
      <h2><?php echo esc_html( $faq_heading ); ?></h2>
    </div>
    <div class="vf-faq">
      <?php foreach ( $faqs as $faq ) :
        $q = is_array( $faq ) ? ( $faq['question'] ?? '' ) : '';
        $a = is_array( $faq ) ? ( $faq['answer']   ?? '' ) : '';
        if ( ! $q ) continue;
      ?>
      <div class="vf-faq__item">
        <h3>
          <button class="vf-faq__button" type="button" data-faq-button aria-expanded="false">
            <?php echo esc_html( $q ); ?>
            <svg class="vf-faq__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
        </h3>
        <div class="vf-faq__answer"><p><?php echo wp_kses_post( $a ); ?></p></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── 7. EMERGENCY CTA ──────────────────────────────────────── -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-emergency">
      <div class="vf-emergency__phone-icon" aria-hidden="true">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </div>
      <div class="vf-emergency__body">
        <h3><?php echo wp_kses_post( $emergency_heading ); ?></h3>
        <p><?php echo wp_kses_post( $emergency_body ); ?></p>
      </div>
      <div class="vf-emergency__actions">
        <a href="<?php echo $tel; ?>" class="vf-btn vf-btn--white">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call <?php echo $tel_display; ?>
        </a>
        <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
