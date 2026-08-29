<?php
/** Coupon-style offer card — colored value block + dashed code badge. */
$offer = $args['offer'] ?? [];
$tone  = $offer['tone'] ?? 'navy';
?>
<article class="vf-offer-card vf-offer-card--<?php echo esc_attr( $tone ); ?>">
  <div class="vf-offer-card__value">
    <span class="vf-offer-card__amount"><?php echo esc_html( $offer['value'] ?? '' ); ?></span>
    <span class="vf-offer-card__tag">Coupon</span>
  </div>
  <div class="vf-offer-card__body">
    <h3 class="vf-offer-card__label"><?php echo esc_html( $offer['label'] ?? '' ); ?></h3>
    <p class="vf-offer-card__sub"><?php echo esc_html( $offer['sub'] ?? '' ); ?></p>
    <span class="vf-offer-card__code"><?php echo esc_html( $offer['code'] ?? '' ); ?></span>
    <div class="vf-offer-card__footer">
      <span class="vf-offer-card__exp"><?php echo esc_html( $offer['exp'] ?? '' ); ?></span>
      <a class="vf-offer-card__redeem" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">Redeem
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  </div>
</article>
