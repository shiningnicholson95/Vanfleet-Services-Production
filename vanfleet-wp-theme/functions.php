<?php
/** Bootstrap theme modules. */
$vanfleet_files = [
  'inc/setup.php','inc/helpers.php','inc/plugin-integrations.php','inc/enqueue.php','inc/shortcodes.php','inc/schema.php',
  'inc/setup-gravity-form.php',
];
foreach ($vanfleet_files as $file) {
  require_once get_template_directory() . '/' . $file;
}

/**
 * Flush rewrite rules on theme activation only — never on every page load.
 * Ensures WordPress page-hierarchy URLs (/parent-slug/child-slug/) are
 * recognised immediately after this theme is (re)activated.
 */
function vf_flush_rewrite_rules_on_activate() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'vf_flush_rewrite_rules_on_activate' );

/**
 * One-time rewrite flush gated by a version flag stored in wp_options.
 * Bump VF_REWRITE_VERSION after any deploy that changes page hierarchy
 * (new parent/child page pairs) to refresh rewrite rules without a manual
 * Settings → Permalinks save. Runs once per version, then no-ops.
 */
define( 'VF_REWRITE_VERSION', '1.0.5' );

/**
 * WordPress's own page rewrite rules treat a purely-numeric trailing path
 * segment as pagination ("/parent-slug/2/" = page 2 of a paginated post),
 * so a real child page slugged e.g. "150" (templates/template-offer-150.php,
 * /all-offers/150/) gets misread as "page 150 of /all-offers/" and
 * redirect_canonical() bounces it back to the unpaginated parent URL.
 * This 'top' rule wins the match first and routes straight to the real
 * child page's pagename instead, for any numeric slug under /all-offers/.
 */
add_action( 'init', function () {
  add_rewrite_rule( '^all-offers/([0-9]+)/?$', 'index.php?pagename=all-offers/$matches[1]', 'top' );
} );

function vf_maybe_flush_rewrites() {
  if ( get_option( 'vf_rewrite_version' ) !== VF_REWRITE_VERSION ) {
    flush_rewrite_rules( false );
    update_option( 'vf_rewrite_version', VF_REWRITE_VERSION );
  }
}
add_action( 'init', 'vf_maybe_flush_rewrites' );

/**
 * Strip common site-name suffixes from page titles displayed in sidebar lists.
 * Removes patterns like "– Vanfleet Services LLC", "- VFS", "— Vanfleet Services".
 */
function vf_clean_page_title( $title ) {
  $title = preg_replace( '/\s[–—-]+\s*(Vanfleet\s*Services?\s*(LLC)?|VFS?)\s*$/i', '', $title );
  /* The live "Downington" page title has a typo (missing "t") — correct it here for display until the page itself is renamed. */
  $title = preg_replace( '/\bDowington\b/i', 'Downingtown', $title );
  return esc_html( trim( $title ) );
}

/**
 * Returns a WP_Query of all published pages assigned a "location" page
 * template — both the generic templates/template-location.php and the
 * per-city templates/template-location-{slug}.php variants. Same
 * `_wp_page_template LIKE` discovery pattern already used by the "Service
 * Areas" sidebar list in templates/template-location.php, reused here so
 * the homepage/about-page location grids stay in sync automatically: a new
 * location page appears the moment it's published, with no code change.
 *
 * Ordered by menu_order ASC — control display order via WP admin
 * Page Attributes → Order.
 *
 * @param int $limit -1 for all, or a positive number to cap results.
 * @return WP_Query
 */
function vf_get_locations_query( int $limit = -1, array $exclude_slugs = [], array $exclude_ids = [] ): WP_Query {
  global $wpdb;
  // NOT LIKE '%template-location-service%' keeps this to the 14 general
  // /​{city}/ location pages — template-location.php and its per-city
  // variants — and out of the 39 /electrical/{city}-pa/[{service}/] pages,
  // whose templates also happen to contain the substring "template-location".
  $ids = array_map( 'intval', (array) $wpdb->get_col(
    "SELECT DISTINCT post_id FROM {$wpdb->postmeta}
     WHERE meta_key = '_wp_page_template'
       AND meta_value LIKE '%template-location%'
       AND meta_value NOT LIKE '%template-location-service%'"
  ) );

  // Never surface the /locations/ hub page itself as a card.
  $parent = get_page_by_path( 'locations' );
  if ( $parent ) {
    $ids = array_values( array_diff( $ids, [ $parent->ID ] ) );
  }

  // Matched by post_name rather than get_page_by_path(): these location
  // pages are children of the "Locations" hub, so their real path is
  // "locations/{slug}" — get_page_by_path() on the bare slug never matches.
  if ( $exclude_slugs ) {
    $wanted = array_map( 'sanitize_title', $exclude_slugs );
    foreach ( $ids as $k => $id ) {
      if ( in_array( get_post_field( 'post_name', $id ), $wanted, true ) ) {
        unset( $ids[ $k ] );
      }
    }
    $ids = array_values( $ids );
  }

  if ( $exclude_ids ) {
    $ids = array_values( array_diff( $ids, array_map( 'intval', $exclude_ids ) ) );
  }

  if ( empty( $ids ) ) {
    return new WP_Query( [ 'post__in' => [ 0 ] ] );
  }

  return new WP_Query( [
    'post_type'      => 'page',
    'post_status'    => 'publish',
    'post__in'       => $ids,
    'posts_per_page' => $limit,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  ] );
}

/**
 * Remove rewrite rules that shadow native WordPress page-hierarchy
 * resolution for /locations/{slug}/ and /services/{slug}/ child pages.
 *
 * 1. Locations: inc/setup.php registers "^locations/{slug}/?$" → bare
 *    "pagename={slug}" with no parent prefix. Since the real location
 *    pages are children of the "Locations" page, get_page_by_path()
 *    requires the full "locations/{slug}" path to resolve — the bare
 *    pagename always 404s.
 * 2. Services: a "service-categories" taxonomy (registered outside the
 *    theme — plugin/WPCode) generates "^services/{term}/?$" →
 *    "service-categories=$matches[1]", intercepting /services/{slug}/
 *    before the native page rule can resolve the child page. Also
 *    guards against the original "post_type=" CPT conflict the WPCode
 *    "URL Rewrite Rules Fixer" snippet was built to remove, independent
 *    of whether that snippet stays active.
 *
 * Removing these here (rather than only in setup.php / WPCode) keeps the
 * fix in place even if either of those is reverted, and lets WordPress's
 * native page-hierarchy rule — which already produces the correct
 * full-path pagename — take over.
 */
add_filter( 'rewrite_rules_array', function ( $rules ) {
  foreach ( $rules as $pattern => $query ) {
    $is_broken_locations_rule = strpos( $pattern, '^locations/' ) === 0
      && preg_match( '#^index\.php\?pagename=[^/]+$#', $query );

    $is_conflicting_services_rule = strpos( $pattern, 'services' ) !== false
      && ( strpos( $query, 'post_type=' ) !== false || strpos( $query, 'service-categories=' ) !== false );

    if ( $is_broken_locations_rule || $is_conflicting_services_rule ) {
      unset( $rules[ $pattern ] );
    }
  }
  return $rules;
}, 999 );