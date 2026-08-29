<?php
/**
 * Location card. compact=true renders the small town-link design for grids;
 * compact=false (default) renders the full card for the service-areas hub.
 *
 * Pass either:
 *   - 'location' => the static data-array row (city/state/county/intro/slug), or
 *   - 'title' + 'url' directly (used by service-area-grid.php for the
 *     dynamic, WP_Query-driven location-page list — see vf_get_locations_query()).
 */
$l       = $args['location'] ?? [];
$compact = $args['compact'] ?? false;
if ( ! $l && empty( $args['title'] ) ) return;
$url = $args['url'] ?? ( $l ? vanfleet_location_url( $l ) : '' );

/* $title is always pre-escaped HTML here — either passed in already-escaped
 * (vf_clean_page_title() escapes internally, matching its other call sites
 * which echo it directly) or escaped below from the raw data-array row. */
$title      = $args['title'] ?? ( $l ? esc_html( $l['city'] . ', ' . $l['state'] ) : '' );
$city_short = $args['title'] ?? ( $l ? esc_html( $l['city'] ) : $title );
?>
<?php if ( $compact ): ?>
<a class="vf-location-card" href="<?php echo esc_url( $url ); ?>">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex:0 0 auto"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
  <span>
    <strong><?php echo $title; ?></strong>
    <span>Plumbing &amp; electrical</span>
  </span>
</a>
<?php else: ?>
<article class="vf-card">
  <p class="vf-eyebrow"><?php echo esc_html( $l['county'] ?? '' ); ?></p>
  <h3><?php echo $title; ?></h3>
  <p><?php echo esc_html( $l['intro'] ?? '' ); ?></p>
  <a class="vf-card__link" href="<?php echo esc_url( $url ); ?>">Service in <?php echo $city_short; ?></a>
</article>
<?php endif; ?>
