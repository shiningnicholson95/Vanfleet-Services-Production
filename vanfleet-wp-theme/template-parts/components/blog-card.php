<?php
/**
 * Blog post card — used inside a WP_Query loop (expects the_post() already called).
 * Pulls title, excerpt, date, category, and featured image straight from the
 * current post in the WordPress Posts admin — nothing hardcoded.
 */
$word_count = str_word_count( wp_strip_all_tags( get_the_content() ) );
$read_min   = max( 1, (int) ceil( $word_count / 200 ) );
$cats       = get_the_category();
$cat_name   = $cats ? $cats[0]->name : '';
?>
<a class="vf-blog-card" href="<?php the_permalink(); ?>">
  <div class="vf-blog-card__media">
    <?php if ( has_post_thumbnail() ): ?>
      <?php the_post_thumbnail( 'medium_large', [ 'loading' => 'lazy', 'decoding' => 'async' ] ); ?>
    <?php else: ?>
      <div class="vf-photo-placeholder" style="height:100%;margin:0;border-radius:0" aria-hidden="true">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.82)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8Z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        <span>Add cover photo<?php echo $cat_name ? ' · ' . esc_html( $cat_name ) : ''; ?></span>
      </div>
    <?php endif; ?>
  </div>
  <div class="vf-blog-card__body">
    <div class="vf-blog-card__meta">
      <?php if ( $cat_name ): ?><span class="vf-badge"><?php echo esc_html( $cat_name ); ?></span><?php endif; ?>
      <span class="vf-blog-card__date"><?php echo esc_html( $read_min ); ?> min read</span>
    </div>
    <h3><?php the_title(); ?></h3>
    <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
    <span class="vf-blog-card__readmore">
      Read article
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
    </span>
  </div>
</a>
