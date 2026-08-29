<?php
/**
 * Template Name: Van Fleet Privacy Policy
 * Content migrated from vanfleetservice.com/privacy-policy/
 * Updated: old email/domain replaced with data-global.php values.
 */
get_header();
$g = vanfleet_global();

$crumbs = [
  [ 'label' => 'Home',           'url' => home_url( '/' ) ],
  [ 'label' => 'Privacy Policy', 'url' => null ],
];

$toc = [
  [ 'id' => 'collection',  'heading' => 'Information Collection and Use' ],
  [ 'id' => 'use',         'heading' => 'Use of Data' ],
  [ 'id' => 'transfer',    'heading' => 'Transfer of Data' ],
  [ 'id' => 'disclosure',  'heading' => 'Disclosure of Data' ],
  [ 'id' => 'security',    'heading' => 'Security of Data' ],
  [ 'id' => 'dnt',         'heading' => 'Do Not Track' ],
  [ 'id' => 'links',       'heading' => 'Links to Other Sites' ],
  [ 'id' => 'children',    'heading' => "Children's Privacy" ],
  [ 'id' => 'contact',     'heading' => 'Contact Us' ],
];
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Legal',
  'title'     => 'Privacy Policy',
  'intro'     => 'Van Fleet Services respects your privacy. This policy explains how we collect, use, and protect your information when you use our services.',
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
      <p><strong>Effective date:</strong> September 1, 2023</p>

      <p><strong>Van Fleet Services</strong><br>
      Phone: <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>"><?php echo esc_html( $g['phone_display'] ); ?></a><br>
      Email: <a href="mailto:<?php echo esc_attr( $g['email'] ); ?>"><?php echo esc_html( $g['email'] ); ?></a></p>

      <p>Van Fleet Services operates <?php echo esc_html( home_url( '/' ) ); ?> (the "Service"). We respect your privacy and it is important to us. This policy applies to in-person services, our website, and telephone assistance, collectively referred to as "Services." By using our Services, you accept this policy.</p>

      <h2 id="collection">Information Collection and Use</h2>
      <p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>

      <h3>Information You Provide Directly</h3>
      <p><strong>Personal Information</strong></p>
      <p>We may ask you to provide certain personally identifiable information, including but not limited to:</p>
      <ul>
        <li>Name and contact details (first/last name, email address, phone number, mailing address, city, state, zip code)</li>
        <li>Payment information (credit card or other payment method)</li>
        <li>Communications via phone, text, chat, or online contact forms</li>
        <li>Responses submitted through our "Book Online" form</li>
        <li>Survey or review feedback</li>
      </ul>

      <p><strong>Job Applicants</strong></p>
      <p>For employment applications, we may collect:</p>
      <ul>
        <li>Contact information and work authorization status</li>
        <li>Resume, cover letter, work experience, and education history</li>
        <li>Professional licenses, certifications, and references</li>
        <li>Publicly available information you provide (salary history, expected compensation)</li>
      </ul>
      <p>This information is used solely to assess your suitability for employment. It may come from you directly, your contacts, hiring agents, previous employers, or educational institutions.</p>

      <p><strong>Information from Third Parties</strong></p>
      <p>We occasionally acquire contact details from external sources for direct mail campaigns or marketing and promotional purposes.</p>

      <h3>Information Collected Automatically</h3>
      <p><strong>Usage Data</strong></p>
      <p>When you visit our website, we may automatically collect information your browser sends, including:</p>
      <ul>
        <li>IP address, browser type and version</li>
        <li>Pages visited, time and date of visit, time spent on pages</li>
        <li>Device identifiers and diagnostic data</li>
      </ul>
      <p>When accessing the Service via mobile, we may also collect device model, unique identifier, mobile operating system, and mobile browser details.</p>

      <p><strong>Location Data</strong></p>
      <p>We use and store information about your location based on your IP address (city or county level) to provide website features, improve personalization, and enable targeted marketing. You can enable or disable location services through your device settings.</p>

      <p><strong>Tracking &amp; Cookies</strong></p>
      <p>We use cookies and similar tracking technologies to monitor activity and improve our Service. Cookies contain limited data with a distinctive identifier sent to your browser and stored on your device. We also use beacons, tags, and scripts for site enhancement and analysis. You can direct your browser to decline cookies, though this may restrict access to certain features.</p>
      <p>Types of cookies we use:</p>
      <ul>
        <li><strong>Session Cookies</strong> — required for website operation</li>
        <li><strong>Preference Cookies</strong> — remember your preferences and settings</li>
        <li><strong>Security Cookies</strong> — used for security purposes</li>
      </ul>

      <h3>Analytics</h3>
      <p><strong>Google Analytics</strong></p>
      <p>Google Analytics is a web analytics service offered by Google that tracks and reports website traffic. Google uses the data collected to track and monitor use of our Service and may share it with other Google services. Google may use the data to contextualize and personalize the ads of its own advertising network. You can opt out via the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener noreferrer">Google Analytics opt-out browser add-on</a>. For more information, visit <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Google's Privacy Policy</a>.</p>

      <p><strong>Behavioral Remarketing</strong></p>
      <p>We use remarketing services to advertise on third-party websites after you visit our Service. We and our vendors use cookies to inform, optimize, and serve ads based on your past visits.</p>
      <ul>
        <li><strong>Google Ads:</strong> Provided by Google Inc. You can opt out via <a href="https://www.google.com/settings/ads" target="_blank" rel="noopener noreferrer">Google Ads Settings</a>.</li>
        <li><strong>Facebook:</strong> Provided by Facebook Inc. You can learn about interest-based advertising and opt out through <a href="https://www.facebook.com/help/568137493302217" target="_blank" rel="noopener noreferrer">Facebook's ad settings</a>. We do not receive or retain personal information through behavioral remarketing.</li>
      </ul>

      <h2 id="use">Use of Data</h2>
      <p>Van Fleet Services uses the collected data for the following purposes:</p>
      <ul>
        <li>Delivering, maintaining, and improving our Services</li>
        <li>Notifying you of changes to our Services</li>
        <li>Enabling interactive features when you choose to do so</li>
        <li>Providing customer support</li>
        <li>Gathering analytical insights to enhance Services, including review and feedback forms (with authorization)</li>
        <li>Monitoring usage and detecting technical issues</li>
        <li>Offering targeted advertisements</li>
        <li>Sending updates, exclusive deals, and promotional content similar to previous interests, unless you have opted out</li>
      </ul>
      <p>Apart from essential communications for requested services, you can decline direct communications by following unsubscribe instructions in any message or by contacting us at <a href="mailto:<?php echo esc_attr( $g['email'] ); ?>"><?php echo esc_html( $g['email'] ); ?></a>.</p>

      <h2 id="transfer">Transfer of Data</h2>
      <p>Your information, including Personal Information, may be transferred to and stored on computers located outside your state, province, country, or other governmental jurisdiction where data protection laws may differ from those of your location.</p>
      <p>If you access our Services from outside the United States, or provide us with information from outside the U.S., your data will be transferred to and processed in the United States. Your continued use of our Services constitutes agreement to this transfer.</p>
      <p>Van Fleet Services will take all reasonably necessary steps to ensure your data is treated securely and in accordance with this Privacy Policy. We do not transfer Personal Information to any organization or country unless adequate controls are in place, including appropriate data security measures.</p>

      <h2 id="disclosure">Disclosure of Data</h2>
      <p><strong>We do not and will not sell your personal information to third parties.</strong></p>

      <h3>Disclosure to Service Providers</h3>
      <p>We may disclose your information to third-party service providers to deliver, maintain, and enhance our Services. These providers are contractually required to maintain confidentiality and use your information only as specified. Service providers may include financial processors, hosting platforms, review solicitors, and marketing or communication providers.</p>

      <h3>Disclosure to Law Enforcement</h3>
      <p>Van Fleet Services may be required to disclose your Personal Information if required to do so by law or in response to valid requests by public authorities (e.g., a court or a government agency).</p>

      <h3>Legal Requirements</h3>
      <p>We may disclose Personal Information in good-faith belief that such action is necessary to:</p>
      <ul>
        <li>Comply with a legal obligation</li>
        <li>Protect and defend the rights or property of Van Fleet Services</li>
        <li>Investigate or prevent potential misconduct related to our Services</li>
        <li>Protect the personal safety of users or the public</li>
        <li>Address legal liability</li>
      </ul>

      <h3>Corporate Relationships</h3>
      <p>We may share information with affiliated companies and subsidiaries. We may also share information in connection with a merger, acquisition, asset sale, funding, or business dissolution, in accordance with this policy.</p>

      <h2 id="security">Security of Data</h2>
      <p>While we prioritize the security of your data, no internet transmission method or electronic storage system can assure complete security. We employ commercially reasonable safeguarding measures for your Personal Information, but cannot guarantee absolute security.</p>

      <h2 id="dnt">Do Not Track</h2>
      <p>We do not support Do Not Track ("DNT"). Do Not Track is a preference you can set in your web browser to inform websites that you do not want to be tracked. You can enable or disable Do Not Track via your browser's Preferences or Settings menu.</p>

      <h2 id="links">Links to Other Sites</h2>
      <p>Our Service may contain links to external websites not operated by us. Clicking a third-party link will direct you to that site. We strongly recommend reviewing the Privacy Policy of every site you visit. We assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>

      <h2 id="children">Children's Privacy</h2>
      <p>Our Service does not address anyone under the age of 18 ("Children"). We do not knowingly collect Personal Information from individuals under 18. If you are a parent or guardian and believe your child has provided us with Personal Information, please contact us immediately. If we discover we have collected Personal Information from a minor without confirmed parental consent, we will delete that data from our servers.</p>

      <h2 id="contact">Contact Us</h2>
      <p>If you have any questions about this Privacy Policy, please contact us:</p>
      <ul>
        <li>Phone: <a href="<?php echo esc_url( vanfleet_tel_href() ); ?>"><?php echo esc_html( $g['phone_display'] ); ?></a></li>
        <li>Email: <a href="mailto:<?php echo esc_attr( $g['email'] ); ?>"><?php echo esc_html( $g['email'] ); ?></a></li>
        <li>Address: <?php echo esc_html( $g['address']['street'] . ', ' . $g['address']['city'] . ', ' . $g['address']['state'] . ' ' . $g['address']['zip'] ); ?></li>
      </ul>

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
<?php get_footer(); ?>
