<?php
/**
 * Plugin Name: VF Create Location Pages (DELETE AFTER USE)
 * Description: One-time: creates 8 /service-areas/ child pages for Glen Mills, Berwyn,
 * Kennett Square, King of Prussia, Thorndale, Exton, Glenmoore, and Malvern — each
 * assigned its dedicated per-city "Van Fleet Location – {City}" template (already in
 * templates/), matching inc/data-locations.php (slugs already present there).
 * Deactivate and delete after running.
 */

add_action( 'admin_notices', function () {

  // Find "Service Areas" parent page
  $parent_query = get_posts( [
    'post_type'      => 'page',
    'post_status'    => 'any',
    'name'           => 'service-areas',
    'posts_per_page' => 1,
  ] );
  if ( empty( $parent_query ) ) {
    echo '<div class="notice notice-error"><p><strong>VF Create Location Pages:</strong> No page with slug "service-areas" found. Create the Service Areas parent page first.</p></div>';
    return;
  }
  $parent_id = $parent_query[0]->ID;

  $pages = [
    [ 'title' => 'Glen Mills, PA',      'slug' => 'glen-mills-pa',      'template' => 'templates/template-location-glen-mills.php' ],
    [ 'title' => 'Berwyn, PA',          'slug' => 'berwyn-pa',          'template' => 'templates/template-location-berwyn.php' ],
    [ 'title' => 'Kennett Square, PA',  'slug' => 'kennett-square-pa',  'template' => 'templates/template-location-kennett-square.php' ],
    [ 'title' => 'King of Prussia, PA', 'slug' => 'king-of-prussia-pa', 'template' => 'templates/template-location-king-of-prussia.php' ],
    [ 'title' => 'Thorndale, PA',       'slug' => 'thorndale-pa',       'template' => 'templates/template-location-thorndale.php' ],
    [ 'title' => 'Exton, PA',           'slug' => 'exton-pa',           'template' => 'templates/template-location-exton.php' ],
    [ 'title' => 'Glenmoore, PA',       'slug' => 'glenmoore-pa',       'template' => 'templates/template-location-glenmoore.php' ],
    [ 'title' => 'Malvern, PA',         'slug' => 'malvern-pa',         'template' => 'templates/template-location-malvern.php' ],
  ];

  $created = [];
  $skipped = [];

  foreach ( $pages as $page ) {
    // Check if page already exists at this slug under the parent
    $existing = get_posts( [
      'post_type'      => 'page',
      'post_status'    => 'any',
      'name'           => $page['slug'],
      'post_parent'    => $parent_id,
      'posts_per_page' => 1,
    ] );

    if ( ! empty( $existing ) ) {
      $skipped[] = $page['title'] . ' (ID ' . $existing[0]->ID . ', already exists)';
      continue;
    }

    $post_id = wp_insert_post( [
      'post_title'   => $page['title'],
      'post_name'    => $page['slug'],
      'post_status'  => 'publish',
      'post_type'    => 'page',
      'post_parent'  => $parent_id,
    ] );

    if ( is_wp_error( $post_id ) ) {
      $created[] = '❌ ' . $page['title'] . ': ' . $post_id->get_error_message();
      continue;
    }

    update_post_meta( $post_id, '_wp_page_template', $page['template'] );
    $url = get_permalink( $post_id );
    $created[] = '✅ <a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $page['title'] ) . '</a> (ID ' . $post_id . ') → ' . esc_html( $url );
  }

  // Flush rewrite rules so slugs resolve immediately
  flush_rewrite_rules();

  echo '<div class="notice notice-success"><p><strong>VF Create Location Pages — Results</strong> (parent: ID ' . $parent_id . ')</p><ul style="margin-left:16px;list-style:disc">';
  foreach ( $created as $line ) echo '<li>' . $line . '</li>';
  foreach ( $skipped as $line ) echo '<li>⏭ ' . esc_html( $line ) . '</li>';
  echo '</ul><p style="margin-top:8px;font-weight:600;color:#b00">Deactivate and delete this plugin now.</p></div>';
} );
