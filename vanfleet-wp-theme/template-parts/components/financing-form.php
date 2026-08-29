<?php
/** Financing application — custom AJAX frontend, Gravity Forms backend (mirrors contact-form-block.php's pattern). */
?>
<form class="vf-financing-form" id="vf-financing-form" method="post" novalidate>
  <h3>Financing Application</h3>
  <?php wp_nonce_field( 'vanfleet_financing_request', 'vf_financing_nonce' ); ?>
  <input type="hidden" name="source_page" value="<?php echo esc_attr( vanfleet_current_page_title() ); ?>">
  <input type="hidden" name="source_url" value="<?php echo esc_url( vanfleet_current_url() ); ?>">

  <div class="vf-form-row">
    <div class="vf-form-field">
      <label for="ff-name">Full name <span class="vf-field__req" aria-hidden="true">*</span></label>
      <input id="ff-name" type="text" name="full_name" placeholder="Jane Homeowner" required autocomplete="name">
    </div>
    <div class="vf-form-field">
      <label for="ff-phone">Phone <span class="vf-field__req" aria-hidden="true">*</span></label>
      <input id="ff-phone" type="tel" name="phone" placeholder="(610) 555-0142" required autocomplete="tel">
    </div>
  </div>

  <div class="vf-form-row">
    <div class="vf-form-field">
      <label for="ff-email">Email <span class="vf-field__req" aria-hidden="true">*</span></label>
      <input id="ff-email" type="email" name="email" placeholder="you@email.com" required autocomplete="email">
    </div>
    <div class="vf-form-field">
      <label for="ff-city">Town / City <span class="vf-field__req" aria-hidden="true">*</span></label>
      <input id="ff-city" type="text" name="city" placeholder="West Chester" required autocomplete="address-level2">
    </div>
  </div>

  <div class="vf-form-field">
    <label for="ff-project">Project type</label>
    <select id="ff-project" name="project_type">
      <option>Water Heater Replacement</option>
      <option>Tankless Water Heater</option>
      <option>Electrical Panel Upgrade</option>
      <option>Whole-Home Repipe</option>
      <option>Well / Sump Pump</option>
      <option>Other</option>
    </select>
  </div>

  <div class="vf-form-field">
    <label for="ff-amount">Estimated amount</label>
    <select id="ff-amount" name="estimated_amount">
      <option>Under $1,000</option>
      <option>$1,000 – $3,000</option>
      <option>$3,000 – $6,000</option>
      <option>$6,000 – $10,000</option>
      <option>Over $10,000</option>
    </select>
  </div>

  <div class="vf-form-field">
    <label for="ff-message">Anything we should know?</label>
    <textarea id="ff-message" name="message" rows="3" placeholder="Tell us about your project…"></textarea>
  </div>

  <label class="vf-form-consent">
    <input type="checkbox" name="consent" required>
    <span>I agree to be contacted about financing options. This is a request for information, not a credit application.</span>
  </label>

  <div class="vf-hero-form__status" role="status" aria-live="polite" aria-atomic="true" hidden></div>

  <button type="submit" class="vf-btn vf-btn--primary vf-btn--full vf-financing-form__submit">Submit Request</button>
  <p class="vf-contact-panel__note">Financing subject to credit approval through our lending partners.</p>
</form>
