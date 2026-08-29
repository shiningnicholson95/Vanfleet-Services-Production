<?php
/**
 * Review card — stars, quote, reviewer name + location.
 * Renders a placeholder card when review data is not available.
 */
$review = $args['review'] ?? null;
$rating = isset( $review['rating'] ) ? (int) $review['rating'] : 5;
$quote  = $review['review_text'] ?? '';
$name   = $review['reviewer_name'] ?? '';
$loc    = $review['location'] ?? '';
$source = $review['source'] ?? '';
$initial = $name ? mb_strtoupper( mb_substr( $name, 0, 1 ) ) : '?';

if ( ! $quote || strpos( $quote, '[Insert' ) !== false ):
?>
<figure class="vf-review-card vf-review-card--placeholder">
  <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--gray-300)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
  <p>Verified customer reviews coming soon.</p>
</figure>
<?php else: ?>
<figure class="vf-review-card">
  <span class="vf-review-card__stars" aria-label="<?php echo esc_attr( $rating ); ?> out of 5 stars">
    <?php for ( $i = 0; $i < 5; $i++ ): ?>
      <svg width="18" height="18" viewBox="0 0 24 24" fill="<?php echo $i < $rating ? 'var(--color-star)' : 'var(--gray-200)'; ?>" stroke="none" aria-hidden="true"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.6 1.5 6.8L12 17.8 5.9 20.4l1.5-6.8L2.2 9l6.9-.7L12 2z"/></svg>
    <?php endfor; ?>
  </span>
  <blockquote class="vf-review-card__quote">"<?php echo esc_html( $quote ); ?>"</blockquote>
  <figcaption class="vf-review-card__meta">
    <span class="vf-review-card__avatar" aria-hidden="true"><?php echo esc_html( $initial ); ?></span>
    <span class="vf-review-card__info">
      <strong><?php echo esc_html( $name ); ?></strong>
      <span><?php echo esc_html( $loc . ( $source ? ' · ' . $source : '' ) ); ?></span>
    </span>
  </figcaption>
</figure>
<?php endif; ?>
