<?php
/**
 * Template Name: Service Page
 * Template Post Type: page
 *
 * Reusable service page template converted from designfiles/site/service.html.
 * All variable content is pulled from ACF fields (if ACF active) or post meta,
 * with data-file / computed defaults when fields are empty.
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

/* ── Current service data (slug-based fallback) ─────────────── */
$cur_service = vanfleet_current_service();

/* ── Related services (siblings or top-level hubs) ──────────── */
$related_parent_slug = $cur_service['parent'] ?? '';
$related = [];
foreach ( vanfleet_services() as $s ) {
	if ( $cur_service && $s['slug'] === $cur_service['slug'] ) continue;
	if ( $related_parent_slug && ( $s['parent'] ?? '' ) === $related_parent_slug ) {
		$related[] = $s;
	}
}
if ( empty( $related ) ) {
	foreach ( vanfleet_services( 'hub' ) as $s ) {
		if ( $s['slug'] !== ( $related_parent_slug ?: ( $cur_service['slug'] ?? '' ) ) ) {
			$related[] = $s;
		}
	}
}
$related = array_slice( $related, 0, 6 );

/* ── Scalar fields ──────────────────────────────────────────── */
$service_category  = $f( 'service_category',  $cur_service['category'] ?? 'Plumbing Service' );
$hero_heading      = $f( 'service_hero_heading', $title );
$hero_intro        = $f( 'service_hero_intro',   $cur_service['description'] ?? "Van Fleet Services provides expert {$title} throughout Chester County, PA — fast response, licensed pros, and upfront flat-rate pricing." );
$contact_heading   = $f( 'service_contact_heading', 'Get a Free Estimate' );
$contact_sub       = $f( 'service_contact_sub',     "We'll call you back fast." );

/* ── Breadcrumbs ────────────────────────────────────────────── */
$parent_hub_label = $f( 'service_parent_hub_label', '' );
$parent_hub_url   = $f( 'service_parent_hub_url',   '' );
if ( ! $parent_hub_label && $cur_service ) {
	$hub_slug         = explode( '/', $cur_service['slug'] )[0];
	$parent_hub_label = ucfirst( str_replace( '-', ' ', $hub_slug ) );
	$parent_hub_url   = vanfleet_url( $hub_slug );
}

/* ── Content section ────────────────────────────────────────── */
$content_eyebrow  = $f( 'service_content_eyebrow', 'What We Do' );
$content_heading  = $f( 'service_content_heading',  "Complete {$title}" );
$content_intro    = $f( 'service_content_intro',    "Whether you need a quick repair or a full replacement, our licensed technicians handle every type and brand." );
$photo_id         = (int) $f( 'service_photo_id', 0 );
$photo_url        = $f( 'service_photo_url', $cur_service['image'] ?? '' );
$photo_alt        = esc_attr( $cur_service['image_alt'] ?? "{$title} — Van Fleet Services" );
$process_heading  = $f( 'service_process_heading', 'How Service Works' );

/* ── Sidebar ────────────────────────────────────────────────── */
$sidebar_heading  = $f( 'service_sidebar_heading', "Talk to a Pro Now" );
$sidebar_body     = $f( 'service_sidebar_body',    "We answer 24/7 — no call centers." );
$sidebar_link_heading = $f( 'service_related_heading', 'Related Services' );

/* ── Reviews/FAQ/Emergency ──────────────────────────────────── */
$reviews_heading   = $f( 'service_reviews_heading',   'What Local Homeowners Say' );
$faq_heading       = $f( 'service_faq_heading',       "{$title} Questions" );
$emergency_heading = $f( 'service_emergency_heading',  "Need Emergency {$title}?" );
$emergency_body    = $f( 'service_emergency_body',     "We dispatch fast across Chester County — call any time, day or night." );

/* ── Repeater fields ────────────────────────────────────────── */
$hero_bullets      = $fr( 'service_hero_bullets' );
$checklist_items   = $fr( 'service_checklist_items' );
$process_steps     = $fr( 'service_process_steps' );
$related_services  = $fr( 'service_related_services' );
$reviews           = $fr( 'service_reviews' );
$faqs              = $fr( 'service_faqs' );

/* ── Defaults ───────────────────────────────────────────────── */
if ( empty( $hero_bullets ) ) {
	$hero_bullets = [
		[ 'label' => 'Same-day service' ],
		[ 'label' => 'Licensed &amp; insured pros' ],
		[ 'label' => 'Upfront flat-rate pricing' ],
		[ 'label' => '24/7 emergency calls' ],
	];
}

if ( empty( $process_steps ) ) {
	$process_steps = [
		[ 'title' => 'Call or Book',          'description' => 'Reach us 24/7 or request service online.' ],
		[ 'title' => 'Diagnose &amp; Quote',  'description' => 'We inspect and give a flat-rate price first.' ],
		[ 'title' => 'Repair or Replace',     'description' => 'Licensed pros complete the job cleanly.' ],
	];
}

if ( empty( $faqs ) ) {
	$faqs = [
		[
			'question' => "How quickly can you respond for {$title}?",
			'answer'   => "We offer same-day and next-day appointments throughout Chester County. For emergencies, we prioritize and dispatch immediately.",
		],
		[
			'question' => "Do you provide upfront pricing for {$title}?",
			'answer'   => "Yes — we diagnose the issue, then give you a flat-rate price to approve before any work begins. No surprise fees.",
		],
		[
			'question' => "Are you licensed for {$title} in Pennsylvania?",
			'answer'   => "Yes. Van Fleet Services is fully licensed and insured. PA HIC #PA156506, MP-23-14. We stand behind every job.",
		],
	];
}

if ( empty( $reviews ) ) {
	$reviews = array_slice( vanfleet_data( 'reviews' ), 0, 3 );
}

if ( empty( $related_services ) ) {
	$related_services = array_slice(
		array_filter( vanfleet_services(), fn( $s ) => ( $s['slug'] ?? '' ) !== ( $cur_service['slug'] ?? '_none_' ) ),
		0, 6
	);
}

/* ── Form shortcode ─────────────────────────────────────────── */
$form_shortcode = '';
if ( function_exists( 'vanfleet_form_shortcode' ) ) {
	$form_shortcode = vanfleet_form_shortcode( 'service' );
} elseif ( vanfleet_global( 'form_shortcode' ) ) {
	$form_shortcode = vanfleet_global( 'form_shortcode' );
}

/* ── Shared escaped values ──────────────────────────────────── */
$tel         = esc_url( vanfleet_tel_href() );
$tel_display = esc_html( $g['phone_display'] );
$contact_url = esc_url( vanfleet_url( 'contact-us' ) );
$home_url    = esc_url( home_url( '/' ) );
?>
<main id="primary">

<!-- ── 1. PAGE HERO ──────────────────────────────────────────── -->
<section class="vf-page-hero">
  <div class="vf-page-hero__dot-bg" aria-hidden="true"></div>
  <div class="vf-container vf-page-hero__inner">

    <nav class="vf-breadcrumbs vf-breadcrumbs--dark" aria-label="Breadcrumb">
      <a href="<?php echo $home_url; ?>">Home</a>
      <?php if ( $parent_hub_label && $parent_hub_url ) : ?>
      <span class="vf-breadcrumbs__sep" aria-hidden="true">/</span>
      <a href="<?php echo esc_url( $parent_hub_url ); ?>"><?php echo esc_html( $parent_hub_label ); ?></a>
      <?php endif; ?>
      <span class="vf-breadcrumbs__sep" aria-hidden="true">/</span>
      <span class="vf-breadcrumbs__current"><?php echo esc_html( $title ); ?></span>
    </nav>

    <div class="vf-page-hero__grid">
      <div>
        <span class="vf-hero__badge">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
          <?php echo esc_html( strtoupper( $service_category ) ); ?> &middot; CHESTER COUNTY
        </span>
        <span class="vf-page-hero__eyebrow"><?php echo esc_html( $service_category ); ?></span>
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
            <?php echo wp_kses_post( $label ); ?>
          </span>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <div id="contact" class="vf-contact-card">
        <h3><?php echo esc_html( $contact_heading ); ?></h3>
        <p><?php echo esc_html( $contact_sub ); ?></p>
        <?php if ( $form_shortcode ) : ?>
          <?php echo do_shortcode( $form_shortcode ); ?>
        <?php else : ?>
        <div class="vf-form-row">
          <div class="vf-form-field"><label for="hf-name">Full name</label><input id="hf-name" type="text" name="full_name" placeholder="Jane Homeowner" autocomplete="name"></div>
          <div class="vf-form-field"><label for="hf-phone">Phone</label><input id="hf-phone" type="tel" name="phone" placeholder="(610) 555-0142" autocomplete="tel"></div>
        </div>
        <div class="vf-form-field">
          <label for="hf-service">Service needed</label>
          <select id="hf-service" name="service_needed">
            <option><?php echo esc_html( $title ); ?></option>
            <option>Emergency Service</option>
            <option>Plumbing Repair</option>
            <option>Drain Cleaning</option>
            <option>Water Heater</option>
            <option>Electrical Repair</option>
            <option>Other</option>
          </select>
        </div>
        <div class="vf-form-field">
          <label for="hf-message">How can we help?</label>
          <textarea id="hf-message" name="message" placeholder="Describe the issue…"></textarea>
        </div>
        <a class="vf-form-submit" href="<?php echo $tel; ?>" role="button">Request Service</a>
        <p style="text-align:center;font-size:13px;color:var(--gray-500);margin-top:12px">Or call us 24/7 — we answer the phone.</p>
        <?php endif; ?>
      </div>
    </div>

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

<!-- ── 3. CONTENT + SIDEBAR ──────────────────────────────────── -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-content-split">

      <!-- Main content column -->
      <div>
        <div class="vf-section-head--left">
          <span class="vf-eyebrow"><?php echo esc_html( $content_eyebrow ); ?></span>
          <h2><?php echo wp_kses_post( $content_heading ); ?></h2>
          <p class="vf-lead"><?php echo wp_kses_post( $content_intro ); ?></p>
        </div>

        <?php if ( ! empty( $checklist_items ) ) : ?>
        <ul class="vf-checklist">
          <?php foreach ( $checklist_items as $item ) :
            $label = is_array( $item ) ? ( $item['label'] ?? $item['item'] ?? '' ) : (string) $item;
            if ( ! $label ) continue;
          ?>
          <li><?php echo esc_html( $label ); ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>" alt="<?php echo esc_attr( "{$title} — Van Fleet Services" ); ?>" width="760" height="280" loading="lazy" decoding="async" style="height:280px;width:100%;object-fit:cover;border-radius:var(--radius-lg);margin-bottom:var(--space-10)">

        <?php if ( ! empty( $process_steps ) ) : ?>
        <div class="vf-section-head--left" style="margin-bottom:var(--space-6)">
          <span class="vf-eyebrow">Our Process</span>
          <h2><?php echo esc_html( $process_heading ); ?></h2>
        </div>
        <div class="vf-process-steps vf-process-steps--3">
          <?php foreach ( array_slice( $process_steps, 0, 3 ) as $i => $step ) :
            $step_title = is_array( $step ) ? ( $step['title'] ?? '' ) : '';
            $step_desc  = is_array( $step ) ? ( $step['description'] ?? $step['desc'] ?? '' ) : '';
          ?>
          <div class="vf-process-step">
            <div class="vf-process-step__num"><?php echo $i + 1; ?></div>
            <h4><?php echo wp_kses_post( $step_title ); ?></h4>
            <p><?php echo wp_kses_post( $step_desc ); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <aside class="vf-sidebar">
        <div class="vf-sidebar-call" style="background:var(--navy-600);color:#fff;border-radius:var(--radius-lg);padding:var(--space-6)">
          <h3 style="color:#fff;font-size:20px;margin:0 0 6px"><?php echo esc_html( $sidebar_heading ); ?></h3>
          <p style="color:var(--navy-100);font-size:14.5px;margin:0 0 var(--space-4);line-height:1.5"><?php echo esc_html( $sidebar_body ); ?></p>
          <a class="vf-btn vf-btn--primary" href="<?php echo $tel; ?>" style="width:100%;justify-content:center;border-radius:var(--radius-pill)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            Call 24/7
          </a>
        </div>

        <?php if ( ! empty( $related ) ) : ?>
        <div class="vf-internal-links">
          <h3><?php echo esc_html( $sidebar_link_heading ); ?></h3>
          <ul>
            <?php foreach ( $related as $r ) : ?>
            <li>
              <a href="<?php echo esc_url( vanfleet_service_url( $r ) ); ?>">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                <?php echo esc_html( $r['title'] ); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

      </aside>

    </div>
  </div>
</section>

<!-- ── 4. REVIEWS ────────────────────────────────────────────── -->
<section class="vf-section vf-section--gray">
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

<!-- ── 5. FAQ ─────────────────────────────────────────────────── -->
<section class="vf-section">
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

<!-- ── 6. SERVICE AREAS ───────────────────────────────────────── -->
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

<!-- ── 6. EMERGENCY CTA ──────────────────────────────────────── -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-emergency" style="background:linear-gradient(120deg,var(--navy-700),var(--blue-600));color:#fff;border-radius:var(--radius-xl);padding:var(--space-10) var(--space-12);display:flex;align-items:center;justify-content:space-between;gap:var(--space-8);flex-wrap:wrap">
      <div class="vf-emergency__phone-icon" aria-hidden="true">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </div>
      <div class="vf-emergency__body">
        <h3><?php echo wp_kses_post( $emergency_heading ); ?></h3>
        <p><?php echo wp_kses_post( $emergency_body ); ?></p>
      </div>
      <div class="vf-emergency__actions">
        <a href="<?php echo $tel; ?>" style="display:inline-flex;align-items:center;gap:8px;padding:13px 24px;border-radius:var(--radius-pill);font-family:var(--font-heading);font-weight:700;font-size:var(--fs-sm);background:#fff;color:var(--color-cta);box-shadow:var(--shadow-lg);border:2px solid transparent;text-decoration:none">
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
