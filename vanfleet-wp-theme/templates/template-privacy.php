<?php
/**
 * Template Name: Van Fleet Privacy Page
 * Content sourced from Terms-and-Privacy-Policy/privacy-policy.md and
 * hardcoded below (rather than pulled from the WP block editor) so it can
 * be reviewed and deployed through code. The sidebar table of contents is
 * still generated automatically from the H2 headings in $content_html, via
 * vanfleet_content_with_toc() in inc/helpers.php — keep numbering in the
 * heading text itself ("1. Information We Collect") if you add or reorder
 * sections. Page title and breadcrumb still come from the WP Page this
 * template is assigned to; the effective date below matches the source doc.
 */
get_header();

if ( have_posts() ): while ( have_posts() ): the_post();

  $crumbs = [
    [ 'label' => 'Home',          'url' => home_url( '/' ) ],
    [ 'label' => get_the_title(), 'url' => null ],
  ];

  $content_html = <<<HTML
<h2>1. Information We Collect</h2>
<p>We collect information you provide directly and information collected automatically when you use our Services.</p>
<p><strong>Information you provide directly may include:</strong></p>
<ul>
<li>Name, email address, phone number, and mailing address</li>
<li>Payment information (credit card or other payment data)</li>
<li>Details submitted through our "Book Online" forms or contact tools</li>
<li>Survey, review, or feedback responses</li>
</ul>
<p><strong>Information collected automatically may include:</strong></p>
<ul>
<li>IP address, browser type, pages visited, and time spent on our site</li>
<li>Device identifiers and diagnostic data (including mobile device details)</li>
<li>Cookies and similar tracking technologies</li>
<li>Call recordings, phone number, and call date/time when you contact us by phone</li>
</ul>
<p><strong>Information from third parties:</strong> We may occasionally obtain contact details from external sources for direct mail, marketing, or promotional purposes.</p>

<h2>2. Job Applicants</h2>
<p>If you apply for a position with us, we may also collect:</p>
<ul>
<li>Resume, cover letter, work history, and education information</li>
<li>Work authorization status, skills, and certifications</li>
<li>Reference information and any other details you voluntarily provide</li>
</ul>
<p>This information is used solely to evaluate your application and fulfill related legal requirements.</p>

<h2>3. How We Use Your Information</h2>
<p>We use collected information to:</p>
<ul>
<li>Deliver, maintain, and improve our Services</li>
<li>Process bookings and respond to inquiries</li>
<li>Provide customer support</li>
<li>Send service updates, reviews, and feedback requests (with your authorization)</li>
<li>Detect and address technical issues</li>
<li>Offer relevant marketing and promotional communications, unless you opt out</li>
</ul>
<p>You may opt out of non-essential communications at any time by using the unsubscribe link in any email or text, or by contacting us at <a href="mailto:vanfleetservices@gmail.com">vanfleetservices@gmail.com</a>.</p>

<h2>4. Cookies &amp; Tracking</h2>
<p>We use cookies and similar technologies to operate our website, remember your preferences, and support remarketing. Types of cookies we use include Session, Preference, and Security cookies.</p>
<p>You may disable cookies through your browser settings, though doing so may limit access to some parts of our site.</p>
<p>We also use Google Analytics to monitor site usage. You can opt out via the Google Analytics Opt-out Browser Add-on. For more, visit Google's Privacy Policy.</p>

<h2>5. Behavioral Remarketing</h2>
<p>We may use remarketing services — including Google Ads and Facebook — to show relevant ads after you visit our site. We do not receive or retain Personal Information through these services.</p>
<p>To opt out:</p>
<ul>
<li>Google Ads: <a href="https://google.com/settings/ads" target="_blank" rel="noopener">google.com/settings/ads</a></li>
<li>Facebook: <a href="https://facebook.com/help/568137493302217" target="_blank" rel="noopener">facebook.com/help/568137493302217</a></li>
<li>All participating companies (USA): <a href="https://aboutads.info/choices" target="_blank" rel="noopener">aboutads.info/choices</a></li>
</ul>

<h2>6. Disclosure of Information</h2>
<p>We do not sell your personal information.</p>
<p>We may share your information with:</p>
<ul>
<li>Service providers who assist in delivering our Services, under confidentiality agreements</li>
<li>Law enforcement or public authorities when required by law or valid legal request</li>
<li>Affiliated companies or business successors in connection with a merger, acquisition, or sale of assets</li>
</ul>

<h2>7. Data Transfer</h2>
<p>Your information may be stored and processed in the United States. By using our Services and submitting information, you consent to this transfer and processing, subject to the protections described in this policy.</p>

<h2>8. Data Security</h2>
<p>We take reasonable measures to protect your Personal Information. However, no internet transmission or electronic storage method is completely secure, and we cannot guarantee absolute security.</p>

<h2>9. Third-Party Links</h2>
<p>Our website may contain links to third-party sites. We have no control over and assume no responsibility for the privacy practices of those sites. We recommend reviewing their privacy policies independently.</p>

<h2>10. Children's Privacy</h2>
<p>Our Services are not directed to anyone under the age of 18. We do not knowingly collect Personal Information from minors. If you believe your child has provided us with personal data, please contact us and we will remove it promptly.</p>

<h2>11. Do Not Track</h2>
<p>We do not currently respond to Do Not Track (DNT) signals. You may enable or disable DNT in your browser's settings at any time.</p>

<h2>12. Contact Us</h2>
<p>Questions about this Privacy Policy? Contact Van Fleet Services LLC by phone or email — details are available on our Contact page.</p>
HTML;

  $content_with_toc = vanfleet_content_with_toc( $content_html );
  $toc              = $content_with_toc['toc'];
  ?>
  <main id="primary">

  <?php vanfleet_partial( 'template-parts/sections/page-hero', [
    'crumbs'    => $crumbs,
    'eyebrow'   => 'Legal',
    'title'     => get_the_title(),
    'intro'     => 'This Privacy Policy explains how Van Fleet Services LLC collects, uses, and protects your information when you use our website or services.',
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
        <p class="vf-legal-body__updated">Effective Date: September 1st, 2023</p>
        <p>By using our website at <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener"><?php echo esc_html( home_url( '/' ) ); ?></a>, scheduling service, or contacting us by phone, you agree to this Privacy Policy. If you do not agree, please do not use our site or services.</p>

        <?php echo $content_with_toc['content']; ?>

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
