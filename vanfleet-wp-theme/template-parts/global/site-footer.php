<?php
/** Site footer — matches chrome.jsx Footer: 5-col grid with verified business data only. */
$g = vanfleet_global();
$logo_url = get_template_directory_uri() . '/assets/van-fleet-logo.webp';

/**
 * Pull nav items from a registered menu location.
 * Returns array of [ 'label' => string, 'url' => string ] or empty array.
 */
function _vf_footer_menu_links( string $location ): array {
  $locations = get_nav_menu_locations();
  if ( empty( $locations[ $location ] ) ) return [];
  $items = wp_get_nav_menu_items( $locations[ $location ] );
  if ( ! $items ) return [];
  $out = [];
  foreach ( $items as $item ) {
    $out[] = [ 'label' => $item->title, 'url' => $item->url ];
  }
  return $out;
}

/* Use WP menu if assigned, otherwise fall back to hardcoded URLs. */
$plumbing_links = _vf_footer_menu_links( 'footer-plumbing' ) ?: [
  [ 'label' => 'Plumber',                'url' => home_url( '/plumbing/plumber/' ) ],
  [ 'label' => 'Sump Pumps',             'url' => home_url( '/plumbing/sump-pumps/' ) ],
  [ 'label' => 'Water Softener',         'url' => home_url( '/plumbing/water-softener/' ) ],
  [ 'label' => 'Tankless Water Heaters', 'url' => home_url( '/plumbing/tankless-water-heaters/' ) ],
  [ 'label' => 'Well Pumps',             'url' => home_url( '/plumbing/well-pumps/' ) ],
];

$electrical_links = _vf_footer_menu_links( 'footer-electrical' ) ?: [
  [ 'label' => 'Water Heaters',              'url' => home_url( '/electrical/water-heaters/' ) ],
  [ 'label' => 'Water Heater Installations', 'url' => home_url( '/electrical/water-heater-installations/' ) ],
  [ 'label' => 'EV Charger Installation',    'url' => home_url( '/electrical/ev-charger-installation/' ) ],
  [ 'label' => 'Service Panel Installation', 'url' => home_url( '/electrical/service-panel-installation/' ) ],
];

$location_menu_links = _vf_footer_menu_links( 'footer-locations' );
?>

<footer class="vf-footer">
  <div class="vf-container">
    <div class="vf-footer-grid">

      <!-- Brand Column -->
      <div class="vf-footer__brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $g['brand_name'] ); ?>" class="vf-footer__logo" width="120" height="46">
        </a>
        <p>Trusted local plumbing &amp; electrical service for homeowners across Chester County, PA.</p>
        <a class="vf-footer__phone" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--orange-400)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <?php echo esc_html( $g['phone_display'] ); ?>
        </a>
        <p class="vf-footer__address"><?php echo esc_html( $g['address']['street'] . ', ' . $g['address']['city'] . ', ' . $g['address']['state'] . ' ' . $g['address']['zip'] ); ?></p>
        <div class="vf-footer__social">
          <a href="https://www.facebook.com/vanfleetservices" target="_blank" rel="noopener noreferrer" aria-label="Van Fleet Services on Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073C24 5.445 18.627 0 12 0S0 5.445 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047v-2.66c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.971h-1.513c-1.491 0-1.956.93-1.956 1.885v2.265h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
          </a>
          <a href="https://www.instagram.com/vanfleetservices" target="_blank" rel="noopener noreferrer" aria-label="Van Fleet Services on Instagram">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          </a>
        </div>
        <?php vanfleet_partial( 'template-parts/components/google-review-badge', [ 'url' => $g['google_review_url'], 'variant' => 'dark' ] ); ?>
      </div>

      <!-- Plumbing Column -->
      <div>
        <h4 class="vf-footer__col-heading">Plumbing</h4>
        <ul class="vf-footer__nav-list">
          <?php foreach ( $plumbing_links as $link ): ?>
            <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?php echo esc_url( vanfleet_url( 'all-services' ) ); ?>">All Services &rarr;</a></li>
        </ul>
      </div>

      <!-- Electrical Column -->
      <div>
        <h4 class="vf-footer__col-heading">Electrical</h4>
        <ul class="vf-footer__nav-list">
          <?php foreach ( $electrical_links as $link ): ?>
            <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <h4 class="vf-footer__col-heading" style="margin-top:var(--space-6)">Hours</h4>
        <?php
        $wday = str_replace( [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ], [ 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ], $g['hours']['weekday'] );
        $wend = str_replace( [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ], [ 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ], $g['hours']['weekend'] );
        ?>
        <p class="vf-footer__hours"><?php echo esc_html( $wday ); ?><br><?php echo esc_html( $wend ); ?><br><span style="color:var(--orange-300);font-weight:600">24/7 Emergency</span></p>
      </div>

      <!-- Service Areas Column -->
      <div>
        <h4 class="vf-footer__col-heading">Service Areas</h4>
        <ul class="vf-footer__nav-list">
          <?php if ( $location_menu_links ): ?>
            <?php foreach ( $location_menu_links as $link ): ?>
              <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
            <?php endforeach; ?>
          <?php else: ?>
            <?php foreach ( array_slice( vanfleet_locations(), 0, 6 ) as $loc ): ?>
              <li><a href="<?php echo esc_url( vanfleet_location_url( $loc ) ); ?>"><?php echo esc_html( $loc['city'] . ', ' . $loc['state'] ); ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>
          <li><a href="<?php echo esc_url( vanfleet_url( 'service-areas' ) ); ?>">All Service Areas &rarr;</a></li>
        </ul>
      </div>

    </div><!-- .vf-footer-grid -->

    <!-- Legal Row -->
    <div class="vf-footer__legal">
      <span><?php echo esc_html( $g['footer_legal'] ); ?></span>
      <span class="vf-footer__legal-links">
        <a href="<?php echo esc_url( vanfleet_url( 'privacy-policy' ) ); ?>">Privacy</a>
        <a href="<?php echo esc_url( vanfleet_url( 'terms' ) ); ?>">Terms</a>
        <a href="<?php echo esc_url( vanfleet_url( 'accessibility-statement' ) ); ?>">Accessibility</a>
        <a href="<?php echo esc_url( vanfleet_url( 'sitemap' ) ); ?>">Sitemap</a>
      </span>
    </div>

  </div>
</footer>
