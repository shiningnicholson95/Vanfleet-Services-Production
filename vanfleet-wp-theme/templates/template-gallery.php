<?php
/**
 * Template Name: Van Fleet Gallery Page
 * Imported from Claude Design — "Van Fleet - Gallery.html" (VFGalleryPage component).
 *
 * Backend-driven the same way templates/template-reviews.php is: gallery items
 * and categories come from inc/data-gallery.php, not hardcoded here. Category
 * filtering is a real server-side GET-param filter (no JS) — same pattern as
 * the Reviews page — so each category is its own crawlable, bookmarkable URL.
 * Replace each .vf-photo-placeholder with a real project photo as one becomes
 * available (see templates/template-about.php for the established swap pattern).
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',    'url' => home_url( '/' ) ],
  [ 'label' => 'Gallery', 'url' => null ],
];

$all_items = vanfleet_data( 'gallery' );

$categories = [];
foreach ( $all_items as $i ) {
  $cat = $i['cat'] ?? 'General';
  if ( ! in_array( $cat, $categories, true ) ) $categories[] = $cat;
}

$cat_slug   = isset( $_GET['vf_gallery_cat'] ) ? sanitize_title( wp_unslash( $_GET['vf_gallery_cat'] ) ) : '';
$active_cat = '';
foreach ( $categories as $cat ) {
  if ( sanitize_title( $cat ) === $cat_slug ) { $active_cat = $cat; break; }
}

$visible_items = $active_cat
  ? array_values( array_filter( $all_items, fn( $i ) => ( $i['cat'] ?? 'General' ) === $active_cat ) )
  : $all_items;
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Our Work',
  'title'     => 'Project Gallery',
  'intro'     => 'Real plumbing and electrical work across Chester County. Browse by category to see jobs like yours.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section vf-section--gray">
  <div class="vf-container">

    <div class="vf-chips">
      <a class="vf-chip<?php echo $active_cat === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url( remove_query_arg( 'vf_gallery_cat' ) ); ?>">
        All <span class="vf-chip__count"><?php echo (int) count( $all_items ); ?></span>
      </a>
      <?php foreach ( $categories as $cat ): ?>
        <?php $count = count( array_filter( $all_items, fn( $i ) => ( $i['cat'] ?? 'General' ) === $cat ) ); ?>
        <a class="vf-chip<?php echo $active_cat === $cat ? ' is-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'vf_gallery_cat', sanitize_title( $cat ), remove_query_arg( 'vf_gallery_cat' ) ) ); ?>">
          <?php echo esc_html( $cat ); ?> <span class="vf-chip__count"><?php echo (int) $count; ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if ( $visible_items ): ?>
      <div class="vf-grid vf-grid--3">
        <?php foreach ( $visible_items as $item ): ?>
          <figure class="vf-card" style="margin:0;padding:0;overflow:hidden">
            <div class="vf-photo-placeholder" style="height:230px;margin:0;border-radius:0">
              <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/06/home-vanfleet-services-llc.jpeg' ) ); ?>" alt="<?php echo esc_attr( $item['caption'] ?? ( 'Van Fleet Services — ' . $item['cat'] ) ); ?>" loading="lazy" decoding="async">
            </div>
            <figcaption style="padding:14px 16px;display:flex;align-items:center;justify-content:space-between;gap:10px">
              <span style="font-size:14.5px;color:var(--text-body);font-weight:600"><?php echo esc_html( $item['caption'] ); ?></span>
              <span class="vf-badge"><?php echo esc_html( $item['cat'] ); ?></span>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p style="text-align:center;color:var(--text-muted);padding:40px 0">No projects in this category yet.</p>
    <?php endif; ?>

  </div>
</section>

<section class="vf-section" style="padding-top:0">
  <div class="vf-container">
    <?php vanfleet_partial( 'template-parts/components/emergency-cta', [
      'title' => 'Want Work Like This in Your Home?',
      'text'  => "Call now or schedule service — we'll give you an honest, upfront quote.",
    ] ); ?>
  </div>
</section>

</main>
<?php get_footer(); ?>
