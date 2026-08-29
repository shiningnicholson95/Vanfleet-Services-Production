<?php
/**
 * JSON-LD schema output — verified business facts only.
 * No review schema is generated for placeholder or unverified reviews.
 */
add_action( 'wp_head', function () {
  if ( ! vanfleet_custom_schema_enabled() ) return;

  $g      = vanfleet_global();
  $graph  = [];

  /* ── LocalBusiness (every page) ── */
  $graph[] = [
    '@type'           => [ 'LocalBusiness', 'Plumber', 'Electrician' ],
    '@id'             => home_url( '/#localbusiness' ),
    'name'            => $g['business_name'],
    'alternateName'   => $g['alternate_brand_name'],
    'url'             => home_url( '/' ),
    'telephone'       => $g['phone_tel'],
    'email'           => $g['email'],
    'address'         => [
      '@type'           => 'PostalAddress',
      'streetAddress'   => $g['address']['street'],
      'addressLocality' => $g['address']['city'],
      'addressRegion'   => $g['address']['state'],
      'postalCode'      => $g['address']['zip'],
      'addressCountry'  => $g['address']['country'],
    ],
    'areaServed'      => 'Chester Springs, Chester County, Downingtown, Exton, West Chester, Phoenixville, Malvern, Glenmoore, Coatesville, Pottstown, King of Prussia, and surrounding Southeastern Pennsylvania communities',
    'openingHours'    => [ 'Mo-Fr 08:00-20:00', 'Sa-Su 08:00-17:00' ],
    'hasCredential'   => $g['licenses'],
  ];

  /* ── WebSite ── */
  $graph[] = [
    '@type' => 'WebSite',
    '@id'   => home_url( '/#website' ),
    'url'   => home_url( '/' ),
    'name'  => $g['brand_name'],
  ];

  /* ── Service page schema ── */
  $service = vanfleet_current_service();
  if ( $service ) {
    $graph[] = [
      '@type'       => 'Service',
      'name'        => $service['title'],
      'description' => $service['description'],
      'provider'    => [ '@id' => home_url( '/#localbusiness' ) ],
      'areaServed'  => 'Chester County, Pennsylvania',
      'url'         => home_url( '/' . ltrim( $service['slug'], '/' ) . '/' ),
    ];

    /* FAQPage for service — only if service has its own faqs */
    $faqs = $service['faqs'] ?? [];
    if ( ! empty( $faqs ) ) {
      $graph[] = [
        '@type'      => 'FAQPage',
        'mainEntity' => array_map( fn( $f ) => [
          '@type' => 'Question',
          'name'  => $f['question'],
          'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $f['answer'] ],
        ], $faqs ),
      ];
    }
  }

  /* ── Location page schema ── */
  $loc = vanfleet_current_location();
  if ( $loc ) {
    /* BreadcrumbList for location pages */
    $graph[] = [
      '@type'           => 'BreadcrumbList',
      'itemListElement' => [
        [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home',          'item' => home_url( '/' ) ],
        [ '@type' => 'ListItem', 'position' => 2, 'name' => 'Service Areas', 'item' => home_url( '/service-areas/' ) ],
        [ '@type' => 'ListItem', 'position' => 3, 'name' => $loc['city'] ],
      ],
    ];

    /* Location-specific FAQPage */
    $city  = $loc['city'];
    $state = $loc['state'];
    $graph[] = [
      '@type'      => 'FAQPage',
      'mainEntity' => [
        [
          '@type' => 'Question',
          'name'  => "Do you offer emergency service in {$city}?",
          'acceptedAnswer' => [ '@type' => 'Answer', 'text' => "Yes — Van Fleet Services provides 24/7 emergency plumbing throughout {$city} and the surrounding Chester County area. Call (267) 300-4526 any time." ],
        ],
        [
          '@type' => 'Question',
          'name'  => "What plumbing and electrical services do you offer in {$city}?",
          'acceptedAnswer' => [ '@type' => 'Answer', 'text' => "We provide plumbing repairs, drain cleaning, water heater service, well and sump pump service, leak detection, electrical repairs, panel upgrades, lighting, outlets, and 24/7 emergency service in {$city}, {$state}." ],
        ],
        [
          '@type' => 'Question',
          'name'  => "Are you licensed in {$city}?",
          'acceptedAnswer' => [ '@type' => 'Answer', 'text' => "Yes. Van Fleet Services LLC is fully licensed and insured in Pennsylvania (PA HIC #PA156506, MP-23-14) and serves homeowners throughout {$city} and Chester County." ],
        ],
      ],
    ];
  }

  /* ── Home page + dedicated FAQ page: global FAQs ── */
  if ( is_front_page() || is_page_template( 'templates/template-faq.php' ) ) {
    $faqs = vanfleet_data( 'faqs' );
    $graph[] = [
      '@type'      => 'FAQPage',
      'mainEntity' => array_map( fn( $f ) => [
        '@type' => 'Question',
        'name'  => $f['question'],
        'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $f['answer'] ],
      ], $faqs ),
    ];
  }

  /* ── BreadcrumbList for service pages ── */
  if ( $service ) {
    $items = [ [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ] ];
    $pos = 2;
    if ( ! empty( $service['parent'] ) ) {
      foreach ( vanfleet_services() as $s ) {
        if ( $s['slug'] === $service['parent'] ) {
          $items[] = [ '@type' => 'ListItem', 'position' => $pos++, 'name' => $s['title'], 'item' => home_url( '/' . $s['slug'] . '/' ) ];
          break;
        }
      }
    }
    $items[] = [ '@type' => 'ListItem', 'position' => $pos, 'name' => $service['title'] ];
    $graph[] = [ '@type' => 'BreadcrumbList', 'itemListElement' => $items ];
  }

  echo '<script type="application/ld+json">'
    . wp_json_encode(
        [ '@context' => 'https://schema.org', '@graph' => $graph ],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
      )
    . '</script>' . "\n";

}, 20 );
