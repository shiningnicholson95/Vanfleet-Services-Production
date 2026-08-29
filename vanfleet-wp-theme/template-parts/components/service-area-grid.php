<?php
/**
 * Service area grid — compact mode for home page, full cards for hub page.
 * compact=true (default) renders small town-link cards in a 3-col grid.
 *
 * Cards are discovered dynamically via vf_get_locations_query() (all
 * published location-template pages) so a newly published location page
 * appears here automatically, with no code change. Falls back to the
 * static inc/data-locations.php list if no location pages are published yet.
 */
$compact       = $args['compact'] ?? true;
$limit         = $args['limit'] ?? 12;
$exclude_slugs = $args['exclude_slugs'] ?? [];

$locations_q = vf_get_locations_query( $limit, $exclude_slugs );
?>
<div class="vf-areas-grid">
  <?php if ( $locations_q->have_posts() ): ?>
    <?php while ( $locations_q->have_posts() ): $locations_q->the_post(); ?>
      <?php vanfleet_partial( 'template-parts/components/location-card', [
        'title'   => vf_clean_page_title( get_the_title() ),
        'url'     => get_permalink(),
        'compact' => $compact,
      ] ); ?>
    <?php endwhile; wp_reset_postdata(); ?>
  <?php else: ?>
    <?php
    $static = array_values( array_filter( vanfleet_locations(), fn( $l ) => ! in_array( $l['slug'], $exclude_slugs, true ) ) );
    $static = $limit > 0 ? array_slice( $static, 0, $limit ) : $static;
    ?>
    <?php foreach ( $static as $l ): ?>
      <?php vanfleet_partial( 'template-parts/components/location-card', [ 'location' => $l, 'compact' => $compact ] ); ?>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
