<?php
/**
 * Plugin Name: VF Fix Downingtown Slug (DELETE AFTER USE)
 * Description: One-time: renames the live "Downington" location page (title
 * and URL slug) to the correct spelling "Downingtown", matching
 * inc/data-locations.php and every other reference in the theme.
 * Activate this plugin once (Plugins → find "VF Fix Downingtown Slug" →
 * Activate), check the admin notice for the result, then deactivate and
 * delete it.
 */

add_action( 'admin_notices', function () {

  $existing = get_posts( [
    'post_type'      => 'page',
    'post_status'    => 'any',
    'name'           => 'downington',
    'posts_per_page' => 1,
  ] );

  if ( empty( $existing ) ) {
    $already = get_posts( [
      'post_type'      => 'page',
      'post_status'    => 'any',
      'name'           => 'downingtown',
      'posts_per_page' => 1,
    ] );
    if ( ! empty( $already ) ) {
      echo '<div class="notice notice-success"><p><strong>VF Fix Downingtown Slug:</strong> Already renamed — page ID ' . (int) $already[0]->ID . ' already has slug "downingtown". Nothing to do — deactivate and delete this plugin now.</p></div>';
    } else {
      echo '<div class="notice notice-error"><p><strong>VF Fix Downingtown Slug:</strong> No page found with slug "downington" or "downingtown". Nothing to fix — check the slug manually under Pages.</p></div>';
    }
    return;
  }

  $post_id = $existing[0]->ID;

  $result = wp_update_post( [
    'ID'         => $post_id,
    'post_name'  => 'downingtown',
    'post_title' => 'Downingtown',
  ], true );

  if ( is_wp_error( $result ) ) {
    echo '<div class="notice notice-error"><p><strong>VF Fix Downingtown Slug:</strong> Failed — ' . esc_html( $result->get_error_message() ) . '</p></div>';
    return;
  }

  flush_rewrite_rules();

  $url = get_permalink( $post_id );
  echo '<div class="notice notice-success"><p><strong>VF Fix Downingtown Slug — Done</strong></p><p>Renamed page ID ' . (int) $post_id . ' → title "Downingtown", slug "downingtown".</p><p>New URL: <a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $url ) . '</a></p><p style="margin-top:8px;font-weight:600;color:#b00">Deactivate and delete this plugin now. Then clear the Kinsta full-page cache and WP Rocket cache so the change shows up for guests.</p></div>';
} );
