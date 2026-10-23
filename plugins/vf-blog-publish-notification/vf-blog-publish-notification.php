<?php
/**
 * Plugin Name: Van Fleet - Blog Publish Notification
 * Description: Emails Van Fleet Services admins when a new blog post is published on vanfleetservice.com, whether published manually or by its schedule. Sends once per post.
 * Version: 1.0.0
 * Author: Van Fleet Services LLC
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const VF_BLOG_NOTIFY_RECIPIENTS = array( 'vanfleetservices@gmail.com', 'simplifi.us@gmail.com' );

/**
 * wp_after_insert_post runs after categories and meta are saved (unlike
 * transition_post_status in the block editor), and also runs when WP-Cron
 * publishes a scheduled post.
 */
add_action( 'wp_after_insert_post', 'vf_blog_publish_notify', 10, 4 );

function vf_blog_publish_notify( $post_id, $post, $update, $post_before ) {
	if ( 'post' !== $post->post_type || 'publish' !== $post->post_status ) {
		return;
	}
	if ( $post_before && 'publish' === $post_before->post_status ) {
		return; // Ordinary edit of an already-published post.
	}
	if ( get_post_meta( $post_id, '_vf_publish_notified', true ) ) {
		return; // Already announced (e.g. unpublished and republished).
	}

	$categories = wp_list_pluck( get_the_category( $post_id ), 'name' );
	$excerpt    = has_excerpt( $post_id ) ? get_the_excerpt( $post ) : wp_trim_words( $post->post_content, 40 );
	$how        = ( $post_before && 'future' === $post_before->post_status ) ? 'Scheduled publish' : 'Published manually';

	$subject = sprintf( 'Van Fleet Services — New blog post published: %s', get_the_title( $post ) );
	$body    = sprintf(
		'<h2>%1$s</h2>
		<p><a href="%2$s">%2$s</a></p>
		<p><strong>Author:</strong> %3$s<br>
		<strong>Published:</strong> %4$s (%5$s)<br>
		<strong>Categories:</strong> %6$s</p>
		<p>%7$s</p>',
		esc_html( get_the_title( $post ) ),
		esc_url( get_permalink( $post ) ),
		esc_html( get_the_author_meta( 'display_name', $post->post_author ) ),
		esc_html( get_the_date( 'M j, Y g:i a', $post ) ),
		esc_html( $how ),
		esc_html( $categories ? implode( ', ', $categories ) : 'None' ),
		esc_html( $excerpt )
	);

	$sent = wp_mail( VF_BLOG_NOTIFY_RECIPIENTS, $subject, $body, array( 'Content-Type: text/html; charset=UTF-8' ) );

	if ( $sent ) {
		update_post_meta( $post_id, '_vf_publish_notified', 1 );
	}
}
