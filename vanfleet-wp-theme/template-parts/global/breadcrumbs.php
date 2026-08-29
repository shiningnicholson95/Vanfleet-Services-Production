<?php
/**
 * Breadcrumb trail.
 * Accepts $args['items'] — array of ['label' => string, 'url' => string|null].
 * Falls back to Home > page title when no items are passed.
 * Use $args['variant'] = 'dark' on dark-background heroes.
 */
$items   = $args['items'] ?? [];
$variant = $args['variant'] ?? '';

if ( empty( $items ) ) {
  $items = [
    [ 'label' => 'Home', 'url' => home_url( '/' ) ],
    [ 'label' => get_the_title() ?: get_bloginfo( 'name' ), 'url' => null ],
  ];
}

$class = 'vf-breadcrumbs' . ( $variant === 'dark' ? ' vf-breadcrumbs--dark' : '' );
?>
<nav class="<?php echo esc_attr( $class ); ?>" aria-label="Breadcrumb">
  <?php
  $last = count( $items ) - 1;
  foreach ( $items as $i => $item ):
    $is_last = ( $i === $last );
  ?>
    <?php if ( ! $is_last && ! empty( $item['url'] ) ): ?>
      <a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
      <span class="vf-breadcrumbs__sep" aria-hidden="true">/</span>
    <?php else: ?>
      <span aria-current="<?php echo $is_last ? 'page' : 'false'; ?>"><?php echo esc_html( $item['label'] ); ?></span>
      <?php if ( ! $is_last ): ?><span class="vf-breadcrumbs__sep" aria-hidden="true">/</span><?php endif; ?>
    <?php endif; ?>
  <?php endforeach; ?>
</nav>
