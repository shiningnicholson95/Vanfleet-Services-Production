<?php
/**
 * Template Name: Van Fleet Financing Page
 * Imported from Claude Design — "Van Fleet - Financing.html" (VFFinancingPage component).
 *
 * The application form posts to the real "Financing Application" Gravity
 * Form via AJAX (same pattern as the homepage hero form) — see
 * inc/setup-gravity-form.php and template-parts/components/financing-form.php.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',      'url' => home_url( '/' ) ],
  [ 'label' => 'Financing', 'url' => null ],
];

$plans = [
  [ 'icon' => 'dollar',      'title' => '0% Intro Financing',  'text' => 'Qualifying projects may include promotional 0% interest for an introductory period.' ],
  [ 'icon' => 'clock',       'title' => 'Low Monthly Payments', 'text' => 'Spread the cost of major work into predictable, manageable monthly payments.' ],
  [ 'icon' => 'checkCircle', 'title' => 'Fast, Easy Approval',  'text' => 'A short application and a quick decision — so your project doesn\'t have to wait.' ],
];

$icons = [
  'dollar'      => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
  'clock'       => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
  'checkCircle' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="8 12.5 10.5 15 16 9"/></svg>',
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Plumbing & Electrical Financing',
  'title'     => 'Affordable Payments for Bigger Projects',
  'intro'     => "Don't let a water heater, panel upgrade, or repipe wait. Flexible financing lets you get the work done now and pay over time — with quick, easy approval.",
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<!-- Flexible Options -->
<section class="vf-section">
  <div class="vf-container">
    <div class="vf-section-head">
      <span class="vf-eyebrow">Flexible Options</span>
      <h2>Plans That Fit Your Budget</h2>
      <p class="vf-lead">Apply in minutes. Many homeowners get a decision fast, with no impact to browse your options.</p>
    </div>
    <div class="vf-grid vf-grid--3">
      <?php foreach ( $plans as $p ): ?>
        <div class="vf-card">
          <div class="vf-trust-badge__icon" style="width:52px;height:52px"><?php echo $icons[ $p['icon'] ]; ?></div>
          <h3 style="margin:var(--space-4) 0 8px;font-size:20px"><?php echo esc_html( $p['title'] ); ?></h3>
          <p style="margin:0;font-size:15px;line-height:1.55;color:var(--text-body)"><?php echo esc_html( $p['text'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Application -->
<section class="vf-section vf-section--gray">
  <div class="vf-container vf-split" style="align-items:start">

    <div>
      <div class="vf-section-head--left">
        <span class="vf-eyebrow">Get Started</span>
        <h2>Request Financing Info</h2>
        <p class="vf-lead">Tell us about your project and we'll walk you through the best financing options — no obligation.</p>
      </div>
      <ul class="vf-checklist" style="grid-template-columns:1fr">
        <li>Soft pre-qualification available</li>
        <li>Apply for water heaters, panels, repipes &amp; more</li>
        <li>Friendly local team, not a call center</li>
      </ul>
      <div style="display:flex;gap:12px;flex-wrap:wrap">
        <span class="vf-badge vf-badge--green">Licensed &amp; Insured</span>
        <span class="vf-badge vf-badge--navy">No Obligation</span>
      </div>
    </div>

    <div class="vf-contact-card">
      <?php vanfleet_partial( 'template-parts/components/financing-form' ); ?>
    </div>

  </div>
</section>

<?php vanfleet_partial( 'template-parts/components/emergency-cta', [
  'title' => 'Have Questions About Financing?',
  'text'  => "Call us — we'll walk you through your options and answer anything you're not sure about.",
] ); ?>

</main>
<?php get_footer(); ?>
