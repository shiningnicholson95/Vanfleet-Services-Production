<?php
/**
 * Template Name: Van Fleet Legal Page
 * Imported from Claude Design — "Van Fleet - Terms.html" (LegalPage/TermsPage component).
 * Reusable for Terms, Privacy Policy, Accessibility, Warranty, etc. — assign this
 * same template to any page. Write the body as normal block-editor content using
 * H2 headings for each section; the sidebar table of contents is generated
 * automatically from those H2s (see vanfleet_content_with_toc() in inc/helpers.php).
 * "Last updated" uses the page's own modified date — no manual date field needed.
 */
get_header();

if ( have_posts() ): while ( have_posts() ): the_post();

  $crumbs = [
    [ 'label' => 'Home',          'url' => home_url( '/' ) ],
    [ 'label' => get_the_title(), 'url' => null ],
  ];

  $intro             = get_the_excerpt() ?: 'Please read this page carefully. If you have any questions, contact us any time.';
  $content_with_toc  = vanfleet_content_with_toc( get_the_content() );
  $toc               = $content_with_toc['toc'];
  ?>
  <main id="primary">

  <?php vanfleet_partial( 'template-parts/sections/page-hero', [
    'crumbs'    => $crumbs,
    'eyebrow'   => 'Legal',
    'title'     => get_the_title(),
    'intro'     => $intro,
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

        <?php echo apply_filters( 'the_content', $content_with_toc['content'] ); ?>

        <div class="vf-legal-body__cta">
          <h3>Questions about this policy?</h3>
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
