<?php
/**
 * Internal links card — compact 2-col grid of arrow links.
 * Used on service and location hub pages.
 * Args:
 *   title  — card heading (default: 'Featured Services')
 *   links  — array of ['label' => string, 'url' => string]
 *            If not passed, falls back to first 6 service cards.
 */
$title = $args['title'] ?? 'Featured Services';
$links = $args['links'] ?? [];

if ( empty( $links ) ) {
  foreach ( array_slice( vanfleet_services( 'hub' ), 0, 6 ) as $s ) {
    $links[] = [ 'label' => $s['title'], 'url' => vanfleet_service_url( $s ) ];
  }
}
?>
<div class="vf-internal-links">
  <h3><?php echo esc_html( $title ); ?></h3>
  <ul>
    <?php foreach ( $links as $link ): ?>
      <li>
        <a href="<?php echo esc_url( $link['url'] ); ?>">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          <?php echo esc_html( $link['label'] ); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
