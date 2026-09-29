<?php
/** Service request form panel — custom AJAX frontend, Gravity Forms backend. */
$form_title = $args['title'] ?? 'Request Service';
$form_sub   = $args['sub']   ?? "Tell us what you need — we'll call you right back.";
?>
<div class="vf-contact-panel">
  <h3><?php echo esc_html( $form_title ); ?></h3>
  <p class="vf-contact-panel__sub"><?php echo esc_html( $form_sub ); ?></p>
  <div class="vf-contact-panel__fields">
    <form class="vf-hero-form" id="vf-hero-form" method="post" novalidate>
      <?php wp_nonce_field( 'vanfleet_home_hero_request_service', 'vf_nonce' ); ?>
      <input type="hidden" name="source_page" value="<?php echo esc_attr( vanfleet_current_page_title() ); ?>">
      <input type="hidden" name="source_url" value="<?php echo esc_url( vanfleet_current_url() ); ?>">
      <label class="vf-field">
        <span>Full name <span class="vf-field__req" aria-hidden="true">*</span></span>
        <input type="text" name="full_name" placeholder="Jane Homeowner" required autocomplete="name">
      </label>
      <label class="vf-field">
        <span>Phone <span class="vf-field__req" aria-hidden="true">*</span></span>
        <input type="tel" name="phone" placeholder="(610) 555-0142" required autocomplete="tel">
      </label>
      <label class="vf-field">
        <span>Email <span class="vf-field__req" aria-hidden="true">*</span></span>
        <input type="email" name="email" placeholder="you@email.com" required autocomplete="email">
      </label>
      <label class="vf-field">
        <span>Service address <span class="vf-field__req" aria-hidden="true">*</span></span>
        <input type="text" name="address" placeholder="123 Main St, West Chester, PA" required autocomplete="street-address">
      </label>
      <label class="vf-field">
        <span>Service needed</span>
        <select name="vf_service">
          <option value="Plumbing Repair">Plumbing Repair</option>
          <option value="Emergency Plumbing">Emergency Plumbing</option>
          <option value="Water Heater">Water Heater</option>
          <option value="Drain Cleaning">Drain Cleaning</option>
          <option value="Well / Sump Pump">Well / Sump Pump</option>
          <option value="Electrical">Electrical</option>
          <option value="Other">Other</option>
        </select>
      </label>
      <label class="vf-field">
        <span>How can we help?</span>
        <textarea name="message" rows="3" placeholder="Describe the issue…"></textarea>
      </label>
      <div class="vf-hero-form__status" role="status" aria-live="polite" aria-atomic="true" hidden></div>
      <button type="submit" class="vf-btn vf-btn--primary vf-btn--full vf-hero-form__submit">Request Service</button>
      <p class="vf-contact-panel__note">Or call us 24/7 — we answer the phone.</p>
    </form>
  </div>
</div>
