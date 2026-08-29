<?php /** Homepage template. */ get_header(); $g = vanfleet_global(); ?>
<main id="primary">

<!-- Hero -->
<section class="vf-hero">
  <div class="vf-container vf-hero__grid">
    <div>
      <span class="vf-hero__badge"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--orange-300)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>Licensed Plumbing &amp; Electrical · Chester County</span>
      <h1>Reliable Plumbing &amp; Electrical Services in Chester Springs, PA</h1>
      <p class="vf-lead">Van Fleet Services helps homeowners across Chester County with plumbing repairs, water heaters, well &amp; sump pumps, electrical work, and 24/7 emergencies.</p>
      <div class="vf-cta-row">
        <?php echo vanfleet_button( 'Call Now · 24/7', vanfleet_tel_href(), 'primary' ); ?>
        <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
      </div>
      <ul class="vf-hero__checkmarks">
        <li>Same-day service</li>
        <li>Upfront pricing</li>
        <li>5-star rated</li>
        <li>Locally owned</li>
      </ul>
    </div>
    <div class="vf-hero__form" id="contact">
      <?php vanfleet_partial( 'template-parts/components/contact-form-block' ); ?>
    </div>
  </div>
</section>

<!-- Trust Bar -->
<?php vanfleet_partial( 'template-parts/components/trust-bar' ); ?>

<!-- Services -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Our Services</p>
      <h2>Plumbing &amp; Electrical, Done Right</h2>
      <p class="vf-lead">From a dripping faucet to a full panel upgrade, one trusted local team handles it all.</p>
    </div>
    <?php
    $home_services = [
      [ 'title' => 'Plumbing Repair',    'description' => 'Leaks, clogs, running toilets, and everyday fixes done fast and clean.',                       'slug' => 'plumbing/plumbing-repair',            'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/plumber' ) ],
      [ 'title' => 'Water Heater Service','description' => 'Repair & replacement for tank and tankless — hot water back the same day.',                  'slug' => 'water-heaters/water-heater-repair',   'cta' => 'Learn more', 'url' => vanfleet_url( 'electrical/water-heaters' ) ],
      [ 'title' => 'Drain Cleaning',     'description' => 'Slow or backed-up drains cleared with no mess and no guesswork.',                              'slug' => 'plumbing/drain-cleaning',             'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/plumber' ) ],
      [ 'title' => 'Well & Sump Pumps',  'description' => 'Well pumps, sump pumps, and sewage ejector service to keep you dry.',                          'slug' => 'pump-services',                       'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/well-pumps' ) ],
      [ 'title' => 'Electrical Repair',  'description' => 'Panel upgrades, lighting, outlets, and switches by licensed electricians.',                    'slug' => 'electrical/electrical-repair',        'cta' => 'Learn more', 'url' => vanfleet_url( 'electrical/service-panel-installation' ) ],
      [ 'title' => 'Leak & Pipe Repair', 'description' => 'Precision leak detection and lasting pipe repair before damage spreads.',                      'slug' => 'plumbing/leak-detection-pipe-repair', 'cta' => 'Learn more', 'url' => vanfleet_url( 'plumbing/plumber' ) ],
    ];
    ?>
    <div class="vf-grid vf-grid--3">
      <?php foreach ( $home_services as $s ) { vanfleet_partial( 'template-parts/components/service-card', [ 'service' => $s ] ); } ?>
    </div>
    <div class="vf-section__cta"><?php echo vanfleet_button( 'View All Services', vanfleet_url( 'all-services' ), 'secondary' ); ?></div>
  </div>
</section>

<!-- Why Van Fleet -->
<section class="vf-section">
  <div class="vf-container vf-split">
    <div class="vf-photo-placeholder">
      <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>" alt="Van Fleet technician &amp; truck" loading="lazy" decoding="async">
    </div>
    <div>
      <p class="vf-eyebrow">Why Chester County Trusts Van Fleet</p>
      <h2>Your Neighbors. Your Plumbers &amp; Electricians.</h2>
      <p class="vf-lead">We live and work here. When you call Van Fleet, you get a licensed local pro who treats your home like their own.</p>
      <div class="vf-feature-grid">
        <div class="vf-feature">
          <span class="vf-feature__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
          <div><h4>Licensed &amp; insured</h4><p>Fully credentialed PA plumbing &amp; electrical pros.</p></div>
        </div>
        <div class="vf-feature">
          <span class="vf-feature__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
          <div><h4>Fast response</h4><p>Same-day appointments and true 24/7 emergency service.</p></div>
        </div>
        <div class="vf-feature">
          <span class="vf-feature__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
          <div><h4>Honest pricing</h4><p>Flat-rate quotes approved before any work begins.</p></div>
        </div>
        <div class="vf-feature">
          <span class="vf-feature__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></span>
          <div><h4>Done right once</h4><p>Quality workmanship backed by our guarantee.</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Emergency CTA -->
<?php vanfleet_partial( 'template-parts/components/emergency-cta' ); ?>

<!-- Process -->
<section class="vf-section vf-section--tint">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">How It Works</p>
      <h2>Simple, Straightforward Service</h2>
      <p class="vf-lead">From your first call to the final fix, we keep it easy and transparent.</p>
    </div>
    <?php vanfleet_partial( 'template-parts/components/process-steps' ); ?>
  </div>
</section>

<!-- Reviews -->
<section class="vf-section" id="reviews">
  <div class="vf-container">
    <div class="vf-section-head">
      <p class="vf-eyebrow">Reviews</p>
      <h2>Homeowners Across Chester County Trust Us</h2>
      <p class="vf-lead">Real reviews from real neighbors in the towns we serve.</p>
    </div>
    <div class="vf-reviews-grid">
      <?php foreach ( array_slice( vanfleet_data( 'reviews' ), 0, 3 ) as $r ) { vanfleet_partial( 'template-parts/components/review-card', [ 'review' => $r ] ); } ?>
    </div>
  </div>
</section>

<!-- Service Areas -->
<section class="vf-section vf-section--tint" id="areas">
  <div class="vf-container vf-split vf-split--areas">
    <div>
      <p class="vf-eyebrow">Service Area</p>
      <h2>Proudly Serving Chester County &amp; SE Pennsylvania</h2>
      <p class="vf-lead">Based in Chester Springs and covering the surrounding towns. Don't see yours? Give us a call.</p>
      <?php echo vanfleet_button( 'See All Service Areas', vanfleet_url( 'service-areas' ), 'secondary' ); ?>
    </div>
    <div><?php vanfleet_partial( 'template-parts/components/service-area-grid' ); ?></div>
  </div>
</section>

<!-- FAQ -->
<section class="vf-section">
  <div class="vf-container vf-narrow">
    <div class="vf-section-head">
      <p class="vf-eyebrow">FAQ</p>
      <h2>Common Questions</h2>
      <p class="vf-lead">Quick answers about service, pricing, and coverage.</p>
    </div>
    <?php vanfleet_partial( 'template-parts/components/faq-accordion' ); ?>
  </div>
</section>

<!-- Final CTA -->
<section class="vf-section--cta-dark">
  <div class="vf-container vf-cta-dark__body">
    <h2>Need a Plumber or Electrician in Chester County?</h2>
    <p class="vf-lead">Call now for fast, friendly, upfront service — or schedule online and we'll reach out right away.</p>
    <div class="vf-cta-row vf-cta-row--center">
      <?php echo vanfleet_button( 'Call Now · 24/7', vanfleet_tel_href(), 'primary' ); ?>
      <a class="vf-btn vf-btn--outline-white" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
