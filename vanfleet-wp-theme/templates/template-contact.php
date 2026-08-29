<?php
/**
 * Template Name: Van Fleet Contact Page
 * Rebuilt from Claude Design import — "Van Fleet - Contact.html" (VFContactPage component).
 * The design's generic ContactForm is replaced with contact-form-block.php,
 * this theme's existing Gravity Forms-backed "Request Service" form
 * (see inc/setup-gravity-form.php — auto-registered GF form +
 * vanfleet_handle_hero_request_service AJAX handler).
 */
get_header();

$g = vanfleet_global();

/* ── Breadcrumbs ── */
$crumbs = [
  [ 'label' => 'Home',    'url' => home_url( '/' ) ],
  [ 'label' => 'Contact', 'url' => null ],
];

/* ── Contact FAQs (preserved from prior template) ── */
$faqs = [
  [
    'question' => 'How do I schedule service with Van Fleet?',
    'answer'   => "Call us anytime at (267) 300-4526, or fill out the request form above and we'll call you right back to confirm a time.",
  ],
  [
    'question' => 'What areas do you serve?',
    'answer'   => 'We serve Chester Springs, Chester County, and surrounding Southeastern Pennsylvania communities including Downingtown, Exton, West Chester, Phoenixville, and more.',
  ],
  [
    'question' => 'Do you offer emergency service?',
    'answer'   => "Yes — we're available 24 hours a day, 7 days a week for urgent plumbing and electrical emergencies.",
  ],
  [
    'question' => 'Are you licensed and insured?',
    'answer'   => 'Yes. Van Fleet Services LLC is fully licensed and insured in Pennsylvania — PA HIC #PA156506, MP-23-14.',
  ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Contact Van Fleet Services',
  'title'     => 'Get in Touch — We Answer the Phone',
  'intro'     => "Need a plumber or electrician in Chester County? Call us anytime, or send a service request and we'll get right back to you. Real people, fast response, no call centers.",
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<!-- Reach us: contact methods + hours, sticky request form -->
<section class="vf-section">
  <div class="vf-container vf-grid vf-grid--2" style="gap:var(--space-12);align-items:start">

    <!-- Left: methods + hours -->
    <div>
      <p class="vf-eyebrow">Reach Us</p>
      <h2>The Fastest Way Is to Call</h2>
      <p class="vf-lead">For emergencies, calling always gets the quickest response.</p>

      <div style="display:flex;flex-direction:column;gap:var(--space-5);margin:var(--space-6) 0 var(--space-8)">

        <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="display:flex;gap:16px;align-items:flex-start;text-decoration:none">
          <span class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
          <span>
            <span style="display:block;font-family:var(--font-heading);font-size:13px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--text-muted);margin-bottom:3px">Call or Text 24/7</span>
            <span style="display:block;font-family:var(--font-heading);font-weight:700;font-size:19px;color:var(--text-heading)"><?php echo esc_html( $g['phone_display'] ); ?></span>
            <span style="display:block;font-size:14px;color:var(--text-muted);margin-top:2px">Plumbing &amp; electrical — emergencies welcome</span>
          </span>
        </a>

        <a href="mailto:<?php echo esc_attr( $g['email'] ); ?>" style="display:flex;gap:16px;align-items:flex-start;text-decoration:none">
          <span class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 6 12 13 2 6"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg></span>
          <span>
            <span style="display:block;font-family:var(--font-heading);font-size:13px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--text-muted);margin-bottom:3px">Email</span>
            <span style="display:block;font-family:var(--font-heading);font-weight:700;font-size:19px;color:var(--text-heading)"><?php echo esc_html( $g['email'] ); ?></span>
            <span style="display:block;font-size:14px;color:var(--text-muted);margin-top:2px">We reply within one business day</span>
          </span>
        </a>

        <div style="display:flex;gap:16px;align-items:flex-start">
          <span class="vf-trust-badge__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg></span>
          <span>
            <span style="display:block;font-family:var(--font-heading);font-size:13px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--text-muted);margin-bottom:3px">Service Area</span>
            <span style="display:block;font-family:var(--font-heading);font-weight:700;font-size:19px;color:var(--text-heading)"><?php echo esc_html( $g['address']['city'] . ', ' . $g['address']['state'] ); ?></span>
            <span style="display:block;font-size:14px;color:var(--text-muted);margin-top:2px">Serving all of Chester County &amp; SE Pennsylvania</span>
          </span>
        </div>
      </div>

      <div class="vf-card">
        <h3 style="margin:0 0 14px;font-size:18px;display:flex;align-items:center;gap:10px">
          <span style="color:var(--color-secondary);display:inline-flex"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
          Business Hours
        </h3>
        <table style="width:100%;border-collapse:collapse;font-size:15.5px">
          <tbody>
            <tr><td style="padding:11px 0;color:var(--text-body);font-weight:600">Monday – Friday</td><td style="padding:11px 0;text-align:right;color:var(--text-heading);font-weight:600"><?php echo esc_html( str_replace( 'Monday - Friday, ', '', $g['hours']['weekday'] ) ); ?></td></tr>
            <tr style="border-top:1px solid var(--border-default)"><td style="padding:11px 0;color:var(--text-body);font-weight:600">Saturday &amp; Sunday</td><td style="padding:11px 0;text-align:right;color:var(--text-heading);font-weight:600"><?php echo esc_html( str_replace( 'Saturday & Sunday, ', '', $g['hours']['weekend'] ) ); ?></td></tr>
            <tr style="border-top:1px solid var(--border-default)"><td style="padding:11px 0;color:var(--text-body);font-weight:600">Emergencies</td><td style="padding:11px 0;text-align:right;color:var(--color-emergency);font-weight:700">Available 24/7</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Right: sticky request form (Gravity Forms-backed) -->
    <div id="contact" class="vf-sidebar">
      <?php vanfleet_partial( 'template-parts/components/contact-form-block', [
        'title' => 'Request Service',
        'sub'   => "Tell us what you need — we'll call you right back.",
      ] ); ?>
    </div>

  </div>
</section>

<!-- Map slot -->
<section class="vf-section vf-section--tint" style="padding-top:0">
  <div class="vf-container">
    <?php
    $map_address = $g['address']['street'] . ', ' . $g['address']['city'] . ', ' . $g['address']['state'] . ' ' . $g['address']['zip'];
    $map_src     = 'https://www.google.com/maps?q=' . rawurlencode( $map_address ) . '&output=embed';
    ?>
    <iframe src="<?php echo esc_url( $map_src ); ?>" title="<?php echo esc_attr( 'Map to ' . $g['brand_name'] . ' — ' . $map_address ); ?>" style="width:100%;height:340px;border:0;border-radius:var(--radius-lg)" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>

<!-- FAQ -->
<section class="vf-section">
  <div class="vf-container vf-narrow">
    <div class="vf-section-head">
      <p class="vf-eyebrow">FAQ</p>
      <h2>Contact &amp; Scheduling Questions</h2>
    </div>
    <?php vanfleet_partial( 'template-parts/components/faq-accordion', [ 'faqs' => $faqs ] ); ?>
  </div>
</section>

<!-- Emergency CTA -->
<?php vanfleet_partial( 'template-parts/components/emergency-cta' ); ?>

<!-- Final CTA -->
<section class="vf-section--cta-dark">
  <div class="vf-container vf-cta-dark__body">
    <h2>Still Have Questions?</h2>
    <p class="vf-lead">Call now for fast, friendly, upfront service — or scroll up to request service online and we'll reach out right away.</p>
    <div class="vf-cta-row vf-cta-row--center">
      <?php echo vanfleet_button( 'Call Now · 24/7', vanfleet_tel_href(), 'primary' ); ?>
      <a class="vf-btn vf-btn--outline-white" href="#contact">Request Service</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
