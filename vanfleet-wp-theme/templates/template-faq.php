<?php
/**
 * Template Name: Van Fleet FAQ Page
 * Imported from Claude Design — "Van Fleet - FAQ.html" (FaqPage component).
 * Backend-driven: all questions, answers, categories, and counts come from
 * inc/data-faqs.php (the same source the home page accordion and FAQPage
 * schema already use) — add or recategorize FAQs there, not here.
 */
get_header();

$crumbs = [
  [ 'label' => 'Home', 'url' => home_url( '/' ) ],
  [ 'label' => 'FAQ',  'url' => null ],
];

$all_faqs   = vanfleet_data( 'faqs' );
$categories = [];
foreach ( $all_faqs as $faq ) {
  $cat = $faq['category'] ?? 'General';
  if ( ! in_array( $cat, $categories, true ) ) $categories[] = $cat;
}

$cat_slug = isset( $_GET['vf_faq_cat'] ) ? sanitize_title( wp_unslash( $_GET['vf_faq_cat'] ) ) : '';
$active_cat = '';
foreach ( $categories as $cat ) {
  if ( sanitize_title( $cat ) === $cat_slug ) { $active_cat = $cat; break; }
}

$groups = $active_cat ? [ $active_cat ] : $categories;
?>
<main id="primary">

<?php vanfleet_partial( 'template-parts/sections/page-hero', [
  'crumbs'    => $crumbs,
  'eyebrow'   => 'Frequently Asked Questions',
  'title'     => 'Answers to Common Questions',
  'intro'     => 'Browse by topic, or call us any time — we\'re always happy to help a Chester County neighbor.',
  'bullets'   => [],
  'show_form' => false,
] ); ?>

<section class="vf-section">
  <div class="vf-container vf-content-split">

    <div class="vf-content-split__body">
      <div class="vf-chips">
        <a class="vf-chip<?php echo $active_cat === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url( remove_query_arg( 'vf_faq_cat' ) ); ?>">
          All <span class="vf-chip__count"><?php echo (int) count( $all_faqs ); ?></span>
        </a>
        <?php foreach ( $categories as $cat ): ?>
          <?php $count = count( array_filter( $all_faqs, fn( $f ) => ( $f['category'] ?? 'General' ) === $cat ) ); ?>
          <a class="vf-chip<?php echo $active_cat === $cat ? ' is-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'vf_faq_cat', sanitize_title( $cat ), remove_query_arg( 'vf_faq_cat' ) ) ); ?>">
            <?php echo esc_html( $cat ); ?> <span class="vf-chip__count"><?php echo (int) $count; ?></span>
          </a>
        <?php endforeach; ?>
      </div>

      <?php foreach ( $groups as $group ):
        $items = array_values( array_filter( $all_faqs, fn( $f ) => ( $f['category'] ?? 'General' ) === $group ) );
        if ( ! $items ) continue;
        ?>
        <div style="margin-bottom:36px">
          <h2 style="font-size:var(--fs-h3);margin:0 0 8px;display:flex;align-items:center;gap:10px">
            <span style="width:8px;height:24px;background:var(--color-secondary);border-radius:99px;display:inline-block"></span><?php echo esc_html( $group ); ?>
          </h2>
          <?php vanfleet_partial( 'template-parts/components/faq-accordion', [ 'faqs' => $items ] ); ?>
        </div>
      <?php endforeach; ?>
    </div>

    <aside class="vf-sidebar">
      <div class="vf-sidebar-call" style="background:var(--navy-600);color:#fff;border-radius:var(--radius-lg);padding:var(--space-6)">
        <h3 style="color:#fff;font-size:20px;margin:0 0 6px">Still Have Questions?</h3>
        <p style="color:var(--navy-100);font-size:14.5px;margin:0 0 var(--space-4);line-height:1.5">Talk to a real local pro — no call centers.</p>
        <a class="vf-btn vf-btn--primary" href="<?php echo esc_url( vanfleet_tel_href() ); ?>" style="width:100%;justify-content:center;border-radius:var(--radius-pill)">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.5a19.79 19.79 0 0 1-3.07-8.68A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.6a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Call 24/7
        </a>
      </div>
      <div class="vf-card">
        <h3 style="margin:0 0 10px;font-size:17px">Ready to book?</h3>
        <a class="vf-btn vf-btn--secondary" href="<?php echo esc_url( vanfleet_url( 'schedule-service' ) ); ?>" style="width:100%;justify-content:center">Schedule Service</a>
      </div>
    </aside>

  </div>
</section>

</main>
<?php get_footer(); ?>
