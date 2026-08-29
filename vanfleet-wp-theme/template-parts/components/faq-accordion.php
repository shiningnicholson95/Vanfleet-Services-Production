<?php
/**
 * Accessible FAQ accordion with chevron toggle.
 * Pass 'visible' => N to cap how many questions are shown — the rest are
 * still rendered in the markup (not deleted) but hidden via CSS, so they
 * stay easy to re-enable later.
 */
$faqs          = $args['faqs'] ?? vanfleet_data( 'faqs' );
$wrapper_class = isset( $args['wrapper_class'] ) ? ' ' . esc_attr( $args['wrapper_class'] ) : '';
$visible       = $args['visible'] ?? count( $faqs );
$chevron       = '<svg class="vf-faq__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>';
?>
<div class="vf-faq<?php echo $wrapper_class; ?>">
  <?php foreach ( $faqs as $i => $faq ) : ?>
    <div class="vf-faq__item"<?php echo $i >= $visible ? ' style="display:none"' : ''; ?>>
      <h3>
        <button class="vf-faq__button" type="button" data-faq-button aria-expanded="false">
          <?php echo esc_html( $faq['question'] ); ?>
          <?php echo $chevron; ?>
        </button>
      </h3>
      <div class="vf-faq__panel"><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
    </div>
  <?php endforeach; ?>
</div>
