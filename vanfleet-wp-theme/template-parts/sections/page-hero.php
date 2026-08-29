<?php
/**
 * Shared interior page hero — dark navy gradient, 2-col, breadcrumbs inside.
 * Args:
 *   crumbs  — array of ['label', 'url'] for breadcrumb trail
 *   eyebrow — small label above the h1
 *   title   — the h1 text
 *   intro   — lead paragraph
 *   bullets — array of trust/benefit strings shown with checkmarks
 *   cta_primary_label — primary button label (defaults to 'Call Now · 24/7')
 *   cta_secondary_label — secondary button label (defaults to 'Schedule Service')
 *   show_form — whether to render the contact form column (default true).
 *               Set false for a compact single-column hero (About/Contact-style).
 */
$crumbs    = $args['crumbs'] ?? [];
$eyebrow   = $args['eyebrow'] ?? '';
$title     = $args['title'] ?? get_the_title();
$intro     = $args['intro'] ?? '';
$bullets   = $args['bullets'] ?? [ 'Same-day service', 'Upfront pricing', 'Licensed pros', '24/7 emergency' ];
$cta_pri   = $args['cta_primary_label'] ?? 'Call Now · 24/7';
$cta_sec   = $args['cta_secondary_label'] ?? 'Schedule Service';
$show_form = $args['show_form'] ?? true;
?>
<section class="vf-page-hero">
  <div class="vf-container" style="position:relative">

    <?php vanfleet_partial( 'template-parts/global/breadcrumbs', [
      'items'   => $crumbs,
      'variant' => 'dark',
    ] ); ?>

    <div class="<?php echo $show_form ? 'vf-page-hero__grid' : ''; ?>" style="<?php echo $show_form ? '' : 'max-width:760px'; ?>">
      <div>
        <?php if ( $eyebrow ): ?>
          <span class="vf-page-hero__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
        <?php endif; ?>
        <h1><?php echo esc_html( $title ); ?></h1>
        <?php if ( $intro ): ?>
          <p class="vf-lead"><?php echo esc_html( $intro ); ?></p>
        <?php endif; ?>
        <div class="vf-cta-row">
          <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <?php echo esc_html( $cta_pri ); ?>
          </a>
          <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">
            <?php echo esc_html( $cta_sec ); ?>
          </a>
        </div>
        <?php if ( $bullets ): ?>
          <ul class="vf-hero__checkmarks">
            <?php foreach ( $bullets as $b ): ?>
              <li><?php echo esc_html( $b ); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <?php if ( $show_form ): ?>
        <div class="vf-page-hero__form" id="contact">
          <?php vanfleet_partial( 'template-parts/components/contact-form-block', [
            'context' => 'service',
            'title'   => 'Get a Free Estimate',
            'sub'     => "We'll call you back fast.",
          ] ); ?>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>
