<?php
/** High-urgency emergency callout card — red gradient, 24/7 messaging. */
$title = $args['title'] ?? 'Need Urgent Plumbing Help?';
$text  = $args['text'] ?? 'Burst pipe, no hot water, or a flooding basement? We answer 24/7 and dispatch fast across Chester County.';
?>
<section class="vf-section--emergency-wrap">
  <div class="vf-container">
    <div class="vf-emergency-card">
      <div class="vf-emergency-card__body">
        <span class="vf-emergency-card__icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
        </span>
        <div>
          <h3><?php echo esc_html( $title ); ?></h3>
          <p><?php echo esc_html( $text ); ?></p>
        </div>
      </div>
      <a class="vf-btn vf-btn--emergency-white" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        24/7 Emergency Line
      </a>
    </div>
  </div>
</section>
