<?php
/** Theme setup, menus, and supports. */
add_action('after_setup_theme', function () {
  load_theme_textdomain('vanfleet', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
  add_theme_support('custom-logo', ['height'=>80,'width'=>260,'flex-height'=>true,'flex-width'=>true]);
  register_nav_menus([
    'primary'          => __( 'Primary Menu',          'vanfleet' ),
    'footer'           => __( 'Footer Menu',           'vanfleet' ),
    'footer-plumbing'  => __( 'Footer Plumbing Menu',  'vanfleet' ),
    'footer-electrical'=> __( 'Footer Electrical Menu','vanfleet' ),
    'footer-locations' => __( 'Footer Location Menu', 'vanfleet' ),
  ]);
});

/**
 * Nav walker — outputs <li> items with .sub-menu support and a toggle button
 * for items that have children (depth 0 only). Used for both desktop and mobile drawer.
 */
if ( ! class_exists( 'VF_Nav_Walker' ) ) :
class VF_Nav_Walker extends Walker_Nav_Menu {
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    $output .= '<ul class="sub-menu">';
  }
  public function end_lvl( &$output, $depth = 0, $args = null ) {
    $output .= '</ul>';
  }
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $classes      = (array) $item->classes;
    $has_children = in_array( 'menu-item-has-children', $classes, true );
    $is_current   = in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-ancestor', $classes, true );

    $li_class = 'menu-item';
    if ( $has_children ) $li_class .= ' vf-has-dropdown';
    if ( $is_current )   $li_class .= ' current-menu-item';

    $output .= '<li class="' . esc_attr( $li_class ) . '">';
    $output .= '<a href="' . esc_url( $item->url ) . '"'
      . ( $is_current ? ' aria-current="page"' : '' ) . '>'
      . esc_html( $item->title ) . '</a>';

    if ( $has_children && 0 === $depth ) {
      $output .= '<button class="vf-dropdown-toggle" type="button" aria-expanded="false" aria-label="Toggle ' . esc_attr( $item->title ) . ' submenu">'
        . '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>'
        . '</button>';
    }
  }
  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= '</li>';
  }
}
endif;

/* Back-compat alias so any code referencing VF_Flat_Nav_Walker doesn't fatal. */
if ( ! class_exists( 'VF_Flat_Nav_Walker' ) ) {
  class_alias( 'VF_Nav_Walker', 'VF_Flat_Nav_Walker' );
}

/* ── Contact page redirect: legacy /contact/ → /contact-us/ ── */
add_action( 'template_redirect', function () {
  $path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
  if ( $path === 'contact' ) {
    wp_safe_redirect( vanfleet_url( 'contact-us' ), 301 );
    exit;
  }
} );

/* ── Downingtown location page redirect: legacy misspelled /locations/downington/ → /locations/downingtown/
   Only takes effect once the live page has actually been renamed (see _fix-downingtown-slug.php) — until
   then /locations/downingtown/ has no page behind it, so this would 404 rather than help. ── */
add_action( 'template_redirect', function () {
  $path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
  if ( $path === 'locations/downington' ) {
    wp_safe_redirect( vanfleet_url( 'locations/downingtown' ), 301 );
    exit;
  }
} );

/* ── Location rewrite rules ── */
add_action( 'init', function () {
  $location_slugs = [
    'chester-springs', 'chester-county', 'downingtown', 'exton', 'west-chester',
    'phoenixville', 'malvern', 'glenmoore', 'coatesville', 'pottstown',
    'king-of-prussia', 'thorndale', 'glen-mills', 'berwyn', 'kennett-square',
  ];
  foreach ( $location_slugs as $slug ) {
    add_rewrite_rule( '^locations/' . $slug . '/?$', 'index.php?pagename=' . $slug, 'top' );
  }
}, 1 );
