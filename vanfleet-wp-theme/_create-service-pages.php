<?php
/**
 * Plugin Name: VF Create Service Pages (DELETE AFTER USE)
 * Description: One-time: creates 9 /services/ child pages. Deactivate and delete after running.
 */

add_action( 'admin_notices', function () {

  // Find or create "Services" parent page
  $parent_query = get_posts( [
    'post_type'      => 'page',
    'post_status'    => 'any',
    'name'           => 'services',
    'posts_per_page' => 1,
  ] );
  if ( empty( $parent_query ) ) {
    echo '<div class="notice notice-error"><p><strong>VF Create Service Pages:</strong> No page with slug "services" found. Create the Services parent page first.</p></div>';
    return;
  }
  $parent_id = $parent_query[0]->ID;

  $pages = [
    [
      'title'    => 'Plumber',
      'slug'     => 'plumber',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Water Heaters',
      'slug'     => 'water-heaters',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Water Heater Installations',
      'slug'     => 'water-heater-installations',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Tankless Water Heaters',
      'slug'     => 'tankless-water-heaters',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'EV Charger Installation',
      'slug'     => 'ev-charger-installation',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Service Panel Installation',
      'slug'     => 'service-panel-installation',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Sump Pumps',
      'slug'     => 'sump-pumps',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Well Pumps',
      'slug'     => 'well-pumps',
      'template' => 'templates/template-service.php',
    ],
    [
      'title'    => 'Water Softener',
      'slug'     => 'water-softener',
      'template' => 'templates/template-service.php',
    ],
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

  echo '<div class="notice notice-success"><p><strong>VF Create Service Pages — Results</strong> (parent: ID ' . $parent_id . ')</p><ul style="margin-left:16px;list-style:disc">';
  foreach ( $created as $line ) echo '<li>' . $line . '</li>';
  foreach ( $skipped as $line ) echo '<li>⏭ ' . esc_html( $line ) . '</li>';
  echo '</ul><p style="margin-top:8px;font-weight:600;color:#b00">Deactivate and delete this plugin now.</p></div>';
} );
