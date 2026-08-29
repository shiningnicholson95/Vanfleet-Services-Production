<?php
/**
 * Template Name: Van Fleet All Offers Hub
 * Parent listing page (slug: all-offers) for individual offer detail pages
 * built with templates/template-offer-detail.php.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',       'url' => home_url( '/' ) ],
  [ 'label' => 'All Offers', 'url' => null ],
];
$offer_pages = vanfleet_offer_pages();
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'All Offers',
  'title'     => 'Current Service Offers',
  'intro'     => 'Flat-rate diagnostics and service offers for Chester County homeowners.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section vf-section--gray">
  <div class="vf-container">
    <?php if ( $offer_pages ): ?>
      <div class="vf-grid vf-grid--3">
        <?php foreach ( $offer_pages as $offer ): ?>
          <a class="vf-offer-tile" href="<?php echo esc_url( vanfleet_offer_page_url( $offer ) ); ?>">
            <span class="vf-offer-tile__price"><?php echo esc_html( $offer['price'] ); ?></span>
            <span class="vf-offer-tile__title"><?php echo esc_html( $offer['title'] ); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

</main>
<?php get_footer(); ?>
