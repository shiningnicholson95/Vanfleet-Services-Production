<?php
/** Site header — matches chrome.jsx design: utility bar + sticky header + mobile drawer. */
$g = vanfleet_global();
$logo_url = site_url( '/wp-content/uploads/2024/04/Van-Fleet-logo.png.webp' );

/* Fallback nav links used when no WordPress primary menu is assigned. */
$vf_nav_fallback = static function() {
  foreach ( [
    [ 'Plumbing',      'plumbing'      ],
    [ 'Electrical',    'electrical'    ],
    [ 'Water Heaters', 'water-heaters' ],
    [ 'Pumps',         'pump-services' ],
    [ 'Service Areas', 'service-areas' ],
    [ 'Reviews',       'reviews'       ],
    [ 'About',         'about'         ],
  ] as [ $label, $path ] ) {
    echo '<a href="' . esc_url( vanfleet_url( $path ) ) . '">' . esc_html( $label ) . '</a>';
  }
};

/* Args shared by both desktop and mobile nav wp_nav_menu calls. */
$vf_menu_args = [
  'theme_location' => 'primary',
  'container'      => false,
  'items_wrap'     => '<ul class="vf-nav__list">%3$s</ul>',
  'walker'         => new VF_Nav_Walker(),
  'depth'          => 2,
  'fallback_cb'    => '__return_false',
];
?>

<!-- Utility Bar -->
<div class="vf-topbar">
  <div class="vf-container vf-topbar__inner">
    <span class="vf-topbar__location">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--blue-300)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Serving Chester Springs &amp; all of Chester County, PA
    </span>
    <span class="vf-topbar__right">
      <span>
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--blue-300)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        Open 24/7 for Emergencies
      </span>
      <span>
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--blue-300)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Licensed &amp; Insured
      </span>
    </span>
  </div>
</div>

<!-- Primary Header -->
<header class="vf-header" role="banner">
  <div class="vf-container vf-header__inner">

    <!-- Logo -->
    <a class="vf-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $g['brand_name'] ); ?> — Home">
      <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $g['brand_name'] ); ?>" class="vf-logo-img" width="158" height="46" loading="eager" decoding="async">
    </a>

    <!-- Desktop Nav -->
    <nav class="vf-nav" aria-label="Primary navigation">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( $vf_menu_args );
      } else {
        $vf_nav_fallback();
      }
      ?>
    </nav>

    <!-- Header Actions -->
    <div class="vf-header__actions">
      <!-- Navy call button -->
      <a class="vf-call-btn" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
        <span class="vf-call-btn__icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </span>
        <span class="vf-call-btn__text">
          <small>CALL US 24/7</small>
          <?php echo esc_html( $g['phone_display'] ); ?>
        </span>
      </a>
      <!-- Schedule button -->
      <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
      <!-- Mobile hamburger -->
      <button class="vf-menu-toggle" type="button" aria-label="Open menu" aria-controls="vf-drawer" aria-expanded="false" data-drawer-toggle>
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>

  </div>
</header>

<!-- Mobile Drawer -->
<div class="vf-drawer" id="vf-drawer" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Navigation menu">
  <div class="vf-drawer__overlay" data-drawer-close tabindex="-1"></div>
  <div class="vf-drawer__panel">
    <div class="vf-drawer__top">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $g['brand_name'] ); ?>" class="vf-logo-img" width="100" height="38">
      </a>
      <button class="vf-drawer__close" data-drawer-close aria-label="Close menu">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
    <nav class="vf-drawer__nav" aria-label="Mobile navigation">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( $vf_menu_args );
      } else {
        $vf_nav_fallback();
      }
      ?>
    </nav>
    <div class="vf-drawer__cta">
      <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call Us 24/7
      </a>
      <a class="vf-btn vf-btn--secondary" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a>
    </div>
  </div>
</div>
