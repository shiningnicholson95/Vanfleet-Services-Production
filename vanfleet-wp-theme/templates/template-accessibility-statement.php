<?php
/**
 * Template Name: Van Fleet Accessibility Statement
 * Content hardcoded from vanfleetservice.com/about-us/accessibility-statement/
 * Contact details updated to match data-global.php (email, phone, address).
 */
get_header();
$g = vanfleet_global();

$crumbs = [
  [ 'label' => 'Home',                   'url' => home_url( '/' ) ],
  [ 'label' => 'About Us',              'url' => vanfleet_url( 'about-vanfleet-services' ) ],
  [ 'label' => 'Accessibility Statement', 'url' => null ],
];

$toc = [
  [ 'id' => 'measures',    'heading' => 'Measures to Support Accessibility' ],
  [ 'id' => 'conformance', 'heading' => 'Conformance Status' ],
  [ 'id' => 'feedback',    'heading' => 'Feedback' ],
  [ 'id' => 'technical',   'heading' => 'Technical Specifications' ],
  [ 'id' => 'limitations', 'heading' => 'Known Limitations' ],
  [ 'id' => 'assessment',  'heading' => 'Assessment Approach' ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Legal',
  'title'     => 'Accessibility Statement',
  'intro'     => 'Van Fleet Services LLC is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section">
  <div class="vf-container vf-legal-grid">

    <aside class="vf-legal-toc vf-sidebar">
      <p class="vf-legal-toc__label">On this page</p>
      <ul>
        <?php foreach ( $toc as $item ): ?>
          <li><a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['heading'] ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </aside>

    <div class="vf-legal-body">
      <p class="vf-legal-body__updated">Last updated: <?php echo esc_html( get_the_modified_date() ); ?></p>

      <p>This is an accessibility statement for Van Fleet Services LLC.</p>

      <h2 id="measures">Measures to Support Accessibility</h2>
      <p>Van Fleet Services LLC takes the following measures to ensure accessibility of vanfleetservices.com:</p>
      <ul>
        <li>Include accessibility as part of our mission statement.</li>
        <li>Include accessibility throughout our internal policies.</li>
        <li>Integrate accessibility into our procurement practices.</li>
        <li>Provide continual accessibility training for our staff.</li>
        <li>Assign clear accessibility goals and responsibilities.</li>
        <li>Employ formal accessibility quality assurance methods.</li>
      </ul>

      <h2 id="conformance">Conformance Status</h2>
      <p>The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA. Van Fleet Services LLC is partially conformant with WCAG 2.1 level AA. This means some content does not fully conform to the accessibility standard.</p>

      <h2 id="feedback">Feedback</h2>
      <p>We welcome your feedback on the accessibility of our website. Please let us know if you encounter accessibility barriers:</p>
      <ul>
        <li>Phone: <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>"><?php echo esc_html( $g['phone_display'] ); ?></a></li>
        <li>E-mail: <?php echo esc_html( $g['email'] ); ?></li>
        <li>Postal address: <?php echo esc_html( $g['address']['street'] . ', ' . $g['address']['city'] . ', ' . $g['address']['state'] . ' ' . $g['address']['zip'] . ', ' . $g['address']['country'] ); ?></li>
      </ul>
      <p>We try to respond to feedback within 2 business days.</p>

      <h2 id="technical">Technical Specifications</h2>
      <p>Accessibility of our website relies on the following technologies to work with the particular combination of web browser and any assistive technologies or plugins installed on your computer:</p>
      <ul>
        <li>HTML</li>
        <li>CSS</li>
        <li>JavaScript</li>
      </ul>

      <h2 id="limitations">Known Limitations</h2>
      <p>Despite our best efforts to ensure accessibility, there may be some limitations. Below is a description of known limitations and potential solutions. Please contact us if you observe an issue not listed below.</p>
      <ol>
        <li><strong>User-uploaded images:</strong> Uploaded images may lack text alternatives. We typically repair reported issues within 10 business days.</li>
        <li><strong>Archived documents:</strong> Older documents may not work with current assistive technologies due to outdated formats. We convert documents upon request within 3 business days.</li>
      </ol>

      <h2 id="assessment">Assessment Approach</h2>
      <p>Van Fleet Services LLC assessed the accessibility of this website by self-evaluation.</p>

      <div class="vf-legal-body__cta">
        <h3>Accessibility questions?</h3>
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
<?php get_footer(); ?>
