<?php
/** Schedule Service request — custom AJAX frontend, Gravity Forms backend (mirrors financing-form.php's pattern). */
?>
<form class="vf-schedule-form" id="vf-schedule-form" method="post" novalidate>
  <h3>Request Your Appointment</h3>
  <p class="vf-contact-panel__sub">Fields marked * are required. We'll never share your info.</p>
  <?php wp_nonce_field( 'vanfleet_schedule_service_request', 'vf_schedule_nonce' ); ?>
  <input type="hidden" name="source_page" value="<?php echo esc_attr( vanfleet_current_page_title() ); ?>">
  <input type="hidden" name="source_url" value="<?php echo esc_url( vanfleet_current_url() ); ?>">

  <div class="vf-schedule-form__urgency">
    <span class="vf-schedule-form__urgency-label">How urgent is it?</span>
    <div class="vf-urgency" role="radiogroup" aria-label="How urgent is it?">
      <label class="vf-urgency__option" style="--tone:var(--color-emergency)">
        <input type="radio" name="urgency" value="Emergency — now" class="vf-urgency__input">
        <span>Emergency — now</span>
      </label>
      <label class="vf-urgency__option" style="--tone:var(--color-primary)">
        <input type="radio" name="urgency" value="Soon — this week" class="vf-urgency__input" checked>
        <span>Soon — this week</span>
      </label>
      <label class="vf-urgency__option" style="--tone:var(--color-secondary)">
        <input type="radio" name="urgency" value="Flexible" class="vf-urgency__input">
        <span>Flexible</span>
      </label>
    </div>
  </div>

  <div class="vf-form-row">
    <div class="vf-form-field">
      <label for="sf-name">Full name <span class="vf-field__req" aria-hidden="true">*</span></label>
      <input id="sf-name" type="text" name="full_name" placeholder="Jane Homeowner" required autocomplete="name">
    </div>
    <div class="vf-form-field">
      <label for="sf-phone">Phone <span class="vf-field__req" aria-hidden="true">*</span></label>
      <input id="sf-phone" type="tel" name="phone" placeholder="(610) 555-0142" required autocomplete="tel">
    </div>
  </div>

  <div class="vf-form-row">
    <div class="vf-form-field">
      <label for="sf-email">Email</label>
      <input id="sf-email" type="email" name="email" placeholder="you@email.com" autocomplete="email">
    </div>
    <div class="vf-form-field">
      <label for="sf-city">Town / City</label>
      <input id="sf-city" type="text" name="city" placeholder="West Chester" autocomplete="address-level2">
    </div>
  </div>

  <div class="vf-form-field">
    <label for="sf-address">Service address</label>
    <input id="sf-address" type="text" name="service_address" placeholder="123 Main St, West Chester, PA" autocomplete="street-address">
  </div>

  <div class="vf-form-row">
    <div class="vf-form-field">
      <label for="sf-service">Service needed <span class="vf-field__req" aria-hidden="true">*</span></label>
      <select id="sf-service" name="service_needed" required>
        <option value="">Select a service…</option>
        <option>Plumbing Repair</option>
        <option>Emergency Plumbing</option>
        <option>Drain Cleaning</option>
        <option>Leak Detection</option>
        <option>Water Heater</option>
        <option>Tankless Water Heater</option>
        <option>Well / Sump Pump</option>
        <option>Sewage Ejector Pump</option>
        <option>Electrical Repair</option>
        <option>Panel Upgrade</option>
        <option>Lighting / Outlets</option>
        <option>Other</option>
      </select>
    </div>
    <div class="vf-form-field">
      <label for="sf-date">Preferred date</label>
      <input id="sf-date" type="date" name="preferred_date">
    </div>
  </div>

  <div class="vf-form-field">
    <span class="vf-schedule-form__label">Preferred time</span>
    <div class="vf-time-grid">
      <label class="vf-time-option"><input type="radio" name="preferred_time" value="Morning (8–12)"> Morning (8–12)</label>
      <label class="vf-time-option"><input type="radio" name="preferred_time" value="Afternoon (12–4)"> Afternoon (12–4)</label>
      <label class="vf-time-option"><input type="radio" name="preferred_time" value="Evening (4–7)"> Evening (4–7)</label>
    </div>
  </div>

  <div class="vf-form-field">
    <label for="sf-message">Describe the issue</label>
    <textarea id="sf-message" name="message" rows="4" placeholder="Tell us what's going on…"></textarea>
  </div>

  <div class="vf-hero-form__status" role="status" aria-live="polite" aria-atomic="true" hidden></div>

  <button type="submit" class="vf-btn vf-btn--primary vf-btn--full vf-schedule-form__submit">Request Appointment</button>
  <p class="vf-contact-panel__note">Prefer to talk? Call us 24/7 at <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="font-weight:700"><?php echo esc_html( vanfleet_global( 'phone_display' ) ); ?></a></p>
</form>
