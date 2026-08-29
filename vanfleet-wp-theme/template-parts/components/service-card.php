<?php
/**
 * Service card component — icon chip, title, description, CTA link.
 * Whole card is a link per the design system ServiceCard component.
 */
$s = $args['service'] ?? [];
if ( ! $s ) return;

$icons = [
  /* Hub-level (base slug) icons */
  'plumbing'      => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
  'water-heaters' => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>',
  'pump-services' => '<path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/>',
  'electrical'    => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
  /* Full-slug overrides for services with distinct icons */
  'plumbing/drain-cleaning'             => '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>',
  'plumbing/leak-detection-pipe-repair' => '<path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"/>',
  /* Canonical service page slugs (services/ prefix, PRD 1.9) */
  'services/plumber'                    => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
  'services/water-heaters'              => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>',
  'services/water-heater-installations' => '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/><path d="M19 14v6m-3-3h6"/>',
  'services/tankless-water-heaters'     => '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>',
  'services/sump-pumps'                 => '<path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/>',
  'services/well-pumps'                 => '<path d="M3.34 19a10 10 0 1 1 17.32 0"/><line x1="12" y1="3" x2="12" y2="12"/>',
  'services/water-softener'             => '<path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5-2 1.6-3 3.5-3 5.5a7 7 0 0 0 7 7z"/>',
  'services/ev-charger-installation'    => '<path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"/><line x1="23" y1="13" x2="23" y2="11"/><polyline points="11 6 7 12 13 12 9 18"/>',
  'services/service-panel-installation' => '<rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><path d="M7 8h2m4 0h2M7 12h2m4 0h2"/>',
];

$slug = $s['slug'] ?? '';
$base = explode( '/', $slug )[0];
$svg_path = $s['icon'] ?? $icons[ $slug ] ?? $icons[ $base ] ?? '<circle cx="12" cy="12" r="10"/>';
?>
<a class="vf-service-card" href="<?php echo esc_url( $s['url'] ?? vanfleet_service_url( $s ) ); ?>">
  <span class="vf-service-card__icon">
    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $svg_path; ?></svg>
  </span>
  <h3><?php echo esc_html( $s['title'] ); ?></h3>
  <p><?php echo esc_html( $s['description'] ); ?></p>
  <span class="vf-service-card__link"><?php echo esc_html( $s['cta'] ); ?><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
</a>
