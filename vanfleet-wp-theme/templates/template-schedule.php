<?php
/**
 * Template Name: Van Fleet Schedule Page
 * Imported from Claude Design — "Van Fleet - Schedule.html" (VFSchedulePage component).
 *
 * The appointment-request form posts to the real "Schedule Service" Gravity
 * Form via AJAX (same pattern as the homepage hero / financing forms) — see
 * inc/setup-gravity-form.php and template-parts/components/schedule-form.php.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',             'url' => home_url( '/' ) ],
  [ 'label' => 'Schedule Service', 'url' => null ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Book an Appointment',
  'title'     => 'Schedule Plumbing or Electrical Service',
  'intro'     => "Tell us what you need and when works for you. We'll confirm your appointment fast — or for emergencies, call and we'll dispatch right away.",
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section">
  <div class="vf-container vf-content-split">

    <div class="vf-content-split__body">
      <div class="vf-card" style="padding:30px">
        <?php vanfleet_partial( 'template-parts/components/schedule-form' ); ?>
      </div>
    </div>

    <aside class="vf-sidebar">

      <div style="background:var(--color-emergency);color:#fff;border-radius:var(--radius-lg);padding:var(--space-6);box-shadow:var(--shadow-emergency)">
        <h3 style="color:#fff;margin:0 0 6px;font-size:20px">Plumbing Emergency?</h3>
        <p style="color:rgba(255,255,255,.92);font-size:14.5px;margin:0 0 var(--space-4);line-height:1.5">Don't wait on a form — call now and we'll dispatch fast.</p>
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="width:100%;justify-content:center">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call 24/7
        </a>
      </div>

      <div class="vf-card">
        <h3 style="margin:0 0 var(--space-4);font-size:18px">What Happens Next</h3>
        <?php
        $next_steps = [
          [ 'icon' => 'phone', 'title' => 'We call to confirm',   'text' => 'A real person reaches out to lock in your time.' ],
          [ 'icon' => 'truck', 'title' => 'A pro arrives on time', 'text' => 'Licensed, background-checked, and tidy.' ],
          [ 'icon' => 'dollar', 'title' => 'Upfront quote',        'text' => 'You approve the flat-rate price before any work.' ],
        ];
        $step_icons = [
          'phone'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
          'truck'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>',
          'dollar' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
        ];
        foreach ( $next_steps as $i => $step ): ?>
          <div style="display:flex;gap:14px;<?php echo $i < count( $next_steps ) - 1 ? 'margin-bottom:18px' : ''; ?>">
            <span style="flex:0 0 auto;color:var(--color-secondary)"><?php echo $step_icons[ $step['icon'] ]; ?></span>
            <div>
              <div style="font-family:var(--font-heading);font-weight:700;font-size:15.5px;color:var(--text-heading)"><?php echo esc_html( $step['title'] ); ?></div>
              <div style="font-size:14px;color:var(--text-muted);line-height:1.45"><?php echo esc_html( $step['text'] ); ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div style="display:flex;flex-wrap:wrap;gap:12px">
        <span class="vf-badge vf-badge--green">Licensed &amp; Insured</span>
        <span class="vf-badge vf-badge--navy">Same-Day Available</span>
        <span class="vf-badge vf-badge--orange">Upfront Pricing</span>
      </div>

    </aside>

  </div>
</section>

</main>
<?php get_footer(); ?>
