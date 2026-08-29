<?php
/**
 * Template Name: Van Fleet Sitemap
 * HTML sitemap for all published pages, services, and service-area locations.
 * Data-driven via vanfleet_locations(); all other URLs are hardcoded from
 * known WP page slugs so they stay accurate without a DB query.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home',    'url' => home_url( '/' ) ],
  [ 'label' => 'Sitemap', 'url' => null ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Site Navigation',
  'title'     => 'Sitemap',
  'intro'     => 'A complete index of all pages on the Van Fleet Services website.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section">
  <div class="vf-container">

    <!-- Main Pages -->
    <div class="vf-sitemap-section">
      <h2 class="vf-sitemap-section__heading">Main Pages</h2>
      <ul class="vf-sitemap-links vf-sitemap-links--inline">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'about-vanfleet-services' ) ); ?>">About Us</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'contact-us' ) ); ?>">Contact Us</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>">Schedule Service</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'about/faqs' ) ); ?>">FAQ</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'reviews' ) ); ?>">Reviews</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'about/financing' ) ); ?>">Financing</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'blog' ) ); ?>">Blog</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'all-services' ) ); ?>">All Services</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'service-areas' ) ); ?>">Service Areas</a></li>
      </ul>
    </div>

    <!-- Services -->
    <div class="vf-sitemap-section">
      <h2 class="vf-sitemap-section__heading">Services</h2>
      <div class="vf-grid vf-grid--2">

        <!-- Plumbing -->
        <div>
          <h3 class="vf-sitemap-group__heading">
            <a href="<?php echo esc_url( vanfleet_url( 'plumbing' ) ); ?>">Plumbing</a>
          </h3>
          <ul class="vf-sitemap-links">
            <li><a href="<?php echo esc_url( home_url( '/plumbing/plumber/' ) ); ?>">Plumber</a></li>
            <li><a href="<?php echo esc_url( home_url( '/plumbing/tankless-water-heaters/' ) ); ?>">Tankless Water Heaters</a></li>
            <li><a href="<?php echo esc_url( home_url( '/plumbing/sump-pumps/' ) ); ?>">Sump Pumps</a></li>
            <li><a href="<?php echo esc_url( home_url( '/plumbing/well-pumps/' ) ); ?>">Well Pumps</a></li>
            <li><a href="<?php echo esc_url( home_url( '/plumbing/water-softener/' ) ); ?>">Water Softener</a></li>
          </ul>
        </div>

        <!-- Electrical -->
        <div>
          <h3 class="vf-sitemap-group__heading">
            <a href="<?php echo esc_url( vanfleet_url( 'electrical' ) ); ?>">Electrical</a>
          </h3>
          <ul class="vf-sitemap-links">
            <li><a href="<?php echo esc_url( home_url( '/electrical/water-heaters/' ) ); ?>">Water Heaters</a></li>
            <li><a href="<?php echo esc_url( home_url( '/electrical/water-heater-installations/' ) ); ?>">Water Heater Installations</a></li>
            <li><a href="<?php echo esc_url( home_url( '/electrical/ev-charger-installation/' ) ); ?>">EV Charger Installation</a></li>
            <li><a href="<?php echo esc_url( home_url( '/electrical/service-panel-installation/' ) ); ?>">Service Panel Installation</a></li>
          </ul>
        </div>

      </div>
    </div>

    <!-- Service Areas -->
    <div class="vf-sitemap-section">
      <h2 class="vf-sitemap-section__heading">
        <a href="<?php echo esc_url( vanfleet_url( 'service-areas' ) ); ?>">Service Areas</a>
      </h2>
      <ul class="vf-sitemap-links vf-sitemap-links--grid">
        <?php foreach ( vanfleet_locations() as $loc ): ?>
          <li><a href="<?php echo esc_url( vanfleet_location_url( $loc ) ); ?>"><?php echo esc_html( $loc['city'] . ', ' . $loc['state'] ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Legal & Info -->
    <div class="vf-sitemap-section">
      <h2 class="vf-sitemap-section__heading">Legal &amp; Info</h2>
      <ul class="vf-sitemap-links vf-sitemap-links--inline">
        <li><a href="<?php echo esc_url( vanfleet_url( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'terms' ) ); ?>">Terms of Service</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'accessibility-statement' ) ); ?>">Accessibility Statement</a></li>
        <li><a href="<?php echo esc_url( vanfleet_url( 'sitemap' ) ); ?>">Sitemap</a></li>
      </ul>
    </div>

  </div>
</section>

</main>
<?php get_footer(); ?>
