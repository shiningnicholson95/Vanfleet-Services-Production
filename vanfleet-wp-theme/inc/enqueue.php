<?php
/** Enqueue split CSS and minimal vanilla JS. */
add_action('wp_enqueue_scripts', function () {
  $uri = get_template_directory_uri();
  $ver = wp_get_theme()->get('Version');
  $dir = get_template_directory();
  // filemtime() per-file so every CSS edit self-busts the cache — a shared
  // static $ver here previously meant edits to these files needed a manual
  // style.css version bump or they'd serve stale CSS from cache/CDN.
  wp_enqueue_style('vanfleet-tokens',     $uri . '/assets/css/tokens.css',     [],                      filemtime( $dir . '/assets/css/tokens.css' ) );
  wp_enqueue_style('vanfleet-base',       $uri . '/assets/css/base.css',       ['vanfleet-tokens'],     filemtime( $dir . '/assets/css/base.css' ) );
  wp_enqueue_style('vanfleet-layout',     $uri . '/assets/css/layout.css',     ['vanfleet-base'],       filemtime( $dir . '/assets/css/layout.css' ) );
  wp_enqueue_style('vanfleet-components', $uri . '/assets/css/components.css', ['vanfleet-layout'],     filemtime( $dir . '/assets/css/components.css' ) );
  wp_enqueue_style('vanfleet-pages',      $uri . '/assets/css/pages.css',      ['vanfleet-components'], filemtime( $dir . '/assets/css/pages.css' ) );
  wp_enqueue_style('vanfleet-responsive', $uri . '/assets/css/responsive.css', ['vanfleet-pages'],      filemtime( $dir . '/assets/css/responsive.css' ) );

  // Global fixes — button shape + hero badge (loads last, highest priority)
  wp_enqueue_style(
    'vanfleet-global-fixes',
    $uri . '/assets/css/global-fixes.css',
    ['vanfleet-responsive'],
    filemtime( get_template_directory() . '/assets/css/global-fixes.css' )
  );

  // Release 3.1 — Mobile responsive fix (loads after global-fixes, overrides safely)
  wp_enqueue_style(
    'vanfleet-mobile',
    $uri . '/assets/css/mobile.css',
    ['vanfleet-global-fixes'],
    filemtime( get_template_directory() . '/assets/css/mobile.css' )
  );

  // Critical inline overrides — survive stale CSS file cache on the server.
  wp_add_inline_style('vanfleet-components', '
.vf-nav .vf-nav__list{display:flex !important;gap:24px;align-items:center;list-style:none !important;margin:0;padding:0 !important}
.vf-nav .vf-nav__list>li{position:relative;list-style:none !important}
.vf-nav .sub-menu{display:block !important;position:absolute !important;top:calc(100% + 8px);left:0;background:#fff;border-radius:8px;box-shadow:0 4px 20px rgba(11,18,51,.14);border:1px solid var(--border-default);list-style:none !important;margin:0;padding:6px 0;min-width:210px;opacity:0 !important;visibility:hidden !important;pointer-events:none !important;transform:translateY(4px);transition:opacity .18s ease,transform .18s ease,visibility .18s;z-index:300}
.vf-nav .vf-has-dropdown:hover>.sub-menu,.vf-nav .vf-has-dropdown.is-open>.sub-menu{opacity:1 !important;visibility:visible !important;transform:translateY(0);pointer-events:auto !important}
.vf-nav .sub-menu li{list-style:none !important}
.vf-btn,.vf-btn--primary,.vf-btn--secondary,.vf-btn--outline-white,.vf-btn--white,.vf-btn--emergency{border-radius:var(--radius-md) !important}
.vf-call-btn,.vf-hero-call-btn,.vf-hero-schedule-btn{border-radius:var(--radius-md) !important}
');
  wp_enqueue_script('vanfleet-main',      $uri . '/assets/js/main.js',         [],                      $ver, true);
  wp_localize_script( 'vanfleet-main', 'vfConfig', [
    'ajaxUrl' => admin_url( 'admin-ajax.php' ),
  ] );

  // Service page template CSS (conditional — matches both root and templates/ variants)
  if ( is_page_template( 'page-template-service.php' ) || is_page_template( 'templates/template-service.php' ) || is_page_template( 'templates/template-service-hub.php' ) ) {
    wp_enqueue_style(
      'vf-service-page',
      $uri . '/assets/css/page-template-service.css',
      [ 'vanfleet-responsive' ],
      filemtime( get_template_directory() . '/assets/css/page-template-service.css' )
    );
  }

  // Location page template CSS (conditional — only on pages using page-template-location.php)
  if ( is_page_template( 'page-template-location.php' ) ) {
    wp_enqueue_style(
      'vf-location-page',
      $uri . '/assets/css/page-template-location.css',
      [ 'vanfleet-responsive' ],
      filemtime( get_template_directory() . '/assets/css/page-template-location.css' )
    );
  }

  // Offer page template CSS (conditional — matches the hub and every
  // templates/template-offer-{slug}.php wrapper by prefix, so new offer
  // pages don't need a matching edit here each time).
  $vf_template = get_page_template_slug();
  if ( $vf_template && str_starts_with( $vf_template, 'templates/template-offer' ) ) {
    wp_enqueue_style(
      'vf-offer-page',
      $uri . '/assets/css/page-template-offer.css',
      [ 'vanfleet-responsive' ],
      filemtime( get_template_directory() . '/assets/css/page-template-offer.css' )
    );
  }

  // Location + service combo page CSS (conditional — matches the shared
  // hub/detail templates and every templates/template-location-service-*.php
  // wrapper by prefix, so new city/service pages don't need a matching edit
  // here each time). Reuses the existing service + location page styles.
  if ( $vf_template && str_starts_with( $vf_template, 'templates/template-location-service' ) ) {
    wp_enqueue_style(
      'vf-service-page',
      $uri . '/assets/css/page-template-service.css',
      [ 'vanfleet-responsive' ],
      filemtime( get_template_directory() . '/assets/css/page-template-service.css' )
    );
    wp_enqueue_style(
      'vf-location-page',
      $uri . '/assets/css/page-template-location.css',
      [ 'vf-service-page' ],
      filemtime( get_template_directory() . '/assets/css/page-template-location.css' )
    );
  }
});
