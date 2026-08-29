<?php
/**
 * Template Name: Van Fleet Terms Page
 * Content sourced from Terms-and-Privacy-Policy/terms.md and hardcoded below
 * (rather than pulled from the WP block editor) so it can be reviewed and
 * deployed through code. The sidebar table of contents is still generated
 * automatically from the H2 headings in $content_html, via
 * vanfleet_content_with_toc() in inc/helpers.php — keep numbering in the
 * heading text itself ("1. Acceptance of Terms") if you add or reorder
 * sections. Page title, breadcrumb, and "Last updated" date still come from
 * the WP Page this template is assigned to.
 */
get_header();

if ( have_posts() ): while ( have_posts() ): the_post();

  $crumbs = [
    [ 'label' => 'Home',          'url' => home_url( '/' ) ],
    [ 'label' => get_the_title(), 'url' => null ],
  ];

  $content_html = <<<HTML
<h2>1. Acceptance of Terms</h2>
<p>By accessing this website or scheduling service with Van Fleet Services LLC, you agree to these Terms of Service and our Privacy Policy.</p>
<p>If you do not agree, please do not use the site or our services.</p>

<h2>2. Our Services</h2>
<p>Van Fleet Services provides residential plumbing and electrical services throughout Chester County and surrounding Southeastern Pennsylvania communities. Service availability, scheduling, and pricing may vary and are confirmed at the time of booking.</p>

<h2>3. Estimates &amp; Pricing</h2>
<p>We provide upfront, flat-rate pricing before work begins. Estimates are valid for the period stated and may change if the scope of work changes or unforeseen conditions are discovered.</p>

<h2>4. Payment</h2>
<p>Payment is due upon completion of work unless otherwise agreed in writing. We accept major credit cards and offer financing on qualifying jobs.</p>

<h2>5. Workmanship Warranty</h2>
<p>Our work is backed by a workmanship guarantee. Manufacturer warranties on parts and equipment are passed through to you. Warranty terms are provided with your invoice.</p>

<h2>6. Limitation of Liability</h2>
<p>To the fullest extent permitted by law, Van Fleet Services is not liable for indirect or consequential damages. Our total liability is limited to the amount paid for the specific service in question.</p>

<h2>7. Contact Us</h2>
<p>Questions about these terms? Contact Van Fleet Services LLC by phone or email — details are on our Contact page.</p>
HTML;

  $content_with_toc = vanfleet_content_with_toc( $content_html );
  $toc              = $content_with_toc['toc'];
  ?>
  <main id="primary">

  <?php vanfleet_partial( 'template-parts/sections/page-hero', [
    'crumbs'    => $crumbs,
    'eyebrow'   => 'Legal',
    'title'     => get_the_title(),
    'intro'     => 'These terms govern your use of the Van Fleet Services website and the services we provide. Please read them carefully.',
    'bullets'   => [],
    'show_form' => false,
  ] ); ?>

  <section class="vf-section">
    <div class="vf-container vf-legal-grid">

      <?php if ( $toc ): ?>
        <aside class="vf-legal-toc vf-sidebar">
          <p class="vf-legal-toc__label">On this page</p>
          <ul>
            <?php foreach ( $toc as $item ): ?>
              <li><a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['heading'] ); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </aside>
      <?php endif; ?>

      <div class="vf-legal-body">
        <p class="vf-legal-body__updated">Last updated: <?php echo esc_html( get_the_modified_date() ); ?></p>

        <?php echo $content_with_toc['content']; ?>

        <div class="vf-legal-body__cta">
          <h3>Questions about these terms?</h3>
          <p>We're happy to help — reach us any time.</p>
          <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            Call Us
          </a>
        </div>
      </div>

    </div>
  </section>

  </main>
  <?php
endwhile; endif;

get_footer();
