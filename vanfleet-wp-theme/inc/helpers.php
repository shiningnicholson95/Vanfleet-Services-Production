<?php
/** Shared data, rendering, URL, and escaping helpers. */
function vanfleet_data(string $name): array { static $cache=[]; if(!isset($cache[$name])){ $file=get_template_directory().'/inc/data-'.$name.'.php'; $cache[$name]=file_exists($file)? require $file:[]; } return $cache[$name]; }
function vanfleet_global(string $key='', $default=null){ $data=vanfleet_data('global'); $gf=(int)get_option('vf_gf_request_service_id',0); if($gf>0)$data['gf_hero_form_id']=$gf; return $key===''?$data:($data[$key]??$default); }
function vanfleet_tel_href(): string { return 'tel:' . vanfleet_global('phone_tel'); }
function vanfleet_url(string $path): string { return esc_url(home_url('/'.trim($path,'/').'/')); }
function vanfleet_service_url(array $service): string { return vanfleet_url($service['slug']); }
function vanfleet_location_url(array $location): string { $slug=$location['slug']??''; $slug=preg_replace('#^locations/#','',$slug); return vanfleet_url('locations/'.$slug); }
function vanfleet_services(?string $type=null): array { $s=vanfleet_data('services'); return $type?array_values(array_filter($s,fn($i)=>$i['type']===$type)):$s; }
function vanfleet_locations(): array { return vanfleet_data('locations'); }
function vanfleet_service_by_slug(string $slug): ?array { foreach(vanfleet_services() as $s){ if($s['slug']===$slug) return $s; } return null; }
function vanfleet_location_by_slug(string $slug): ?array { foreach(vanfleet_locations() as $l){ if($l['slug']===$slug) return $l; } return null; }
function vanfleet_current_service(): ?array { $slug=trim(parse_url($_SERVER['REQUEST_URI']??'',PHP_URL_PATH),'/'); foreach(vanfleet_services() as $s){ if($s['slug']===$slug) return $s; } return null; }
function vanfleet_current_location(): ?array { $slug=basename(trim(parse_url($_SERVER['REQUEST_URI']??'',PHP_URL_PATH),'/')); foreach(vanfleet_locations() as $l){ if($l['slug']===$slug) return $l; } return null; }
function vanfleet_offer_pages(): array { return vanfleet_data('offer-pages'); }
function vanfleet_offer_page_by_slug(string $slug): ?array { foreach(vanfleet_offer_pages() as $o){ if($o['slug']===$slug) return $o; } return null; }
function vanfleet_offer_page_url(array $offer): string { return vanfleet_url($offer['slug']); }
function vanfleet_current_offer_page(): ?array { $slug=trim(parse_url($_SERVER['REQUEST_URI']??'',PHP_URL_PATH),'/'); foreach(vanfleet_offer_pages() as $o){ if($o['slug']===$slug) return $o; } return null; }
function vanfleet_location_services(): array { return vanfleet_data('location-services'); }
function vanfleet_location_service_city(string $city_slug): ?array { return vanfleet_location_services()['cities'][$city_slug] ?? null; }
function vanfleet_location_service_by_slug(string $slug): ?array { return vanfleet_location_services()['pages'][$slug] ?? null; }
function vanfleet_location_services_for_city(string $city_slug): array { return array_values(array_filter(vanfleet_location_services()['pages'], fn($p) => $p['city_slug'] === $city_slug)); }

/**
 * Site-wide (non-location-specific) Electrical service pages — same source
 * used by the footer's Electrical column ('footer-electrical' nav menu, or
 * this hardcoded fallback if no menu is assigned), reused so the
 * /electrical/{city}-pa/ sidebars can list them alongside each city's own
 * service pages without duplicating the link list in two places.
 */
function vanfleet_generic_electrical_services(): array {
  $locations = get_nav_menu_locations();
  if ( ! empty( $locations['footer-electrical'] ) ) {
    $items = wp_get_nav_menu_items( $locations['footer-electrical'] );
    if ( $items ) {
      return array_map( fn( $item ) => [ 'label' => $item->title, 'url' => $item->url ], $items );
    }
  }
  return [
    [ 'label' => 'Water Heaters',              'url' => home_url( '/electrical/water-heaters/' ) ],
    [ 'label' => 'Water Heater Installations', 'url' => home_url( '/electrical/water-heater-installations/' ) ],
    [ 'label' => 'EV Charger Installation',    'url' => home_url( '/electrical/ev-charger-installation/' ) ],
    [ 'label' => 'Service Panel Installation', 'url' => home_url( '/electrical/service-panel-installation/' ) ],
  ];
}

/**
 * Site-wide (non-location-specific) Plumbing service pages — the /plumbing/{city}-pa/
 * hub and combo page sidebars, mirroring vanfleet_generic_electrical_services() above.
 */
function vanfleet_generic_plumbing_services(): array {
  return [
    [ 'label' => 'Plumber',                'url' => home_url( '/plumbing/plumber/' ) ],
    [ 'label' => 'Sump Pumps',             'url' => home_url( '/plumbing/sump-pumps/' ) ],
    [ 'label' => 'Tankless Water Heaters', 'url' => home_url( '/plumbing/tankless-water-heaters/' ) ],
    [ 'label' => 'Water Softener',         'url' => home_url( '/plumbing/water-softener/' ) ],
    [ 'label' => 'Well Pumps',             'url' => home_url( '/plumbing/well-pumps/' ) ],
  ];
}

/**
 * Service-specific FAQs for an /electrical/{city}-pa/[{service}/] page,
 * with {city} interpolated in. $key is a location-service 'service_slug'
 * (e.g. 'ev-charger-installation') or 'hub' for the bare city page. Used as
 * the fallback when a page's own scraped 'faqs' array is empty, so pages
 * never fall back to the site-wide FAQ list (which is mostly plumbing
 * questions and reads as unrelated on an electrical-only page).
 */
function vanfleet_location_service_faqs( string $key, string $city_name ): array {
  $set = vanfleet_data( 'location-service-faqs' )[ $key ] ?? [];
  return array_map( fn( $f ) => [
    'question' => str_replace( '{city}', $city_name, $f['question'] ),
    'answer'   => str_replace( '{city}', $city_name, $f['answer'] ),
  ], $set );
}
function vanfleet_button(string $label,string $href,string $variant='primary'): string { return '<a class="vf-btn vf-btn--'.esc_attr($variant).'" href="'.esc_url($href).'">'.esc_html($label).'</a>'; }
function vanfleet_partial(string $slug,array $args=[]): void { get_template_part($slug,null,$args); }

/**
 * Current page title / URL — rendered into hidden "Source Page"/"Source URL"
 * fields on every lead-capture form (see inc/setup-gravity-form.php) so the
 * admin notification email shows exactly which page a lead came from. Since
 * the same form partial is reused across many pages, this is resolved at
 * render time from the current request rather than hardcoded per page.
 */
function vanfleet_current_page_title(): string {
  $id    = get_queried_object_id();
  $title = $id ? get_the_title( $id ) : '';
  if ( $title === '' ) $title = wp_get_document_title();
  return function_exists( 'vf_clean_page_title' ) ? vf_clean_page_title( $title ) : wp_strip_all_tags( $title );
}
function vanfleet_current_url(): string { return home_url( add_query_arg( null, null ) ); }

/**
 * Injects an id="" into every <h2> in rendered post content and returns a
 * matching table-of-contents array, so legal/long-form pages can build a
 * sidebar TOC straight from whatever H2 headings an editor adds in the
 * block editor — no separate "sections" data structure to keep in sync.
 */
function vanfleet_content_with_toc( string $html ): array {
  $toc = [];
  if ( preg_match_all( '/<h2[^>]*>(.*?)<\/h2>/is', $html, $matches, PREG_OFFSET_CAPTURE ) ) {
    $count = count( $matches[0] );
    for ( $i = 0; $i < $count; $i++ ) {
      $heading_text = trim( wp_strip_all_tags( $matches[1][ $i ][0] ) );
      $toc[] = [ 'id' => sanitize_title( $heading_text ), 'heading' => $heading_text ];
    }
    /* Replace from the end backwards so earlier byte offsets stay valid. */
    for ( $i = $count - 1; $i >= 0; $i-- ) {
      $full_match = $matches[0][ $i ][0];
      $offset     = $matches[0][ $i ][1];
      $new_tag    = preg_replace( '/^<h2/i', '<h2 id="' . esc_attr( $toc[ $i ]['id'] ) . '"', $full_match, 1 );
      $html       = substr_replace( $html, $new_tag, $offset, strlen( $full_match ) );
    }
  }
  return [ 'content' => $html, 'toc' => $toc ];
}
