<?php
/**
 * Auto-register the "Request Service" Gravity Form on first deploy.
 * Runs once on init, stores the resulting form ID in a WP option so
 * vanfleet_global() can expose it without touching data-global.php.
 */
add_action( 'init', function () {
	if ( ! class_exists( 'GFAPI' ) ) return;

	$stored = (int) get_option( 'vf_gf_request_service_id', 0 );
	if ( $stored > 0 && false !== GFAPI::get_form( $stored ) ) return;

	$form_id = GFAPI::add_form( [
		'title'             => 'Request Service',
		'description'       => '',
		'labelPlacement'    => 'top_label',
		'descriptionPlacement' => 'below',
		'subLabelPlacement' => 'below',
		'button'            => [
			'type'     => 'text',
			'text'     => 'Request Service',
			'imageUrl' => '',
		],
		'fields' => [
			[
				'id'          => 1,
				'label'       => 'Full name',
				'type'        => 'text',
				'isRequired'  => true,
				'placeholder' => 'Jane Homeowner',
				'size'        => 'large',
				'cssClass'    => '',
			],
			[
				'id'          => 2,
				'label'       => 'Phone',
				'type'        => 'phone',
				'isRequired'  => true,
				'placeholder' => '(610) 555-0142',
				'phoneFormat' => 'standard',
				'size'        => 'large',
				'cssClass'    => '',
			],
			[
				'id'         => 3,
				'label'      => 'Service needed',
				'type'       => 'select',
				'isRequired' => false,
				'size'       => 'large',
				'cssClass'   => '',
				'choices'    => [
					[ 'text' => 'Plumbing Repair',    'value' => 'Plumbing Repair',    'isSelected' => true  ],
					[ 'text' => 'Emergency Plumbing', 'value' => 'Emergency Plumbing', 'isSelected' => false ],
					[ 'text' => 'Water Heater',       'value' => 'Water Heater',       'isSelected' => false ],
					[ 'text' => 'Drain Cleaning',     'value' => 'Drain Cleaning',     'isSelected' => false ],
					[ 'text' => 'Well / Sump Pump',   'value' => 'Well / Sump Pump',   'isSelected' => false ],
					[ 'text' => 'Electrical',         'value' => 'Electrical',         'isSelected' => false ],
					[ 'text' => 'Other',              'value' => 'Other',              'isSelected' => false ],
				],
			],
			[
				'id'          => 4,
				'label'       => 'How can we help?',
				'type'        => 'textarea',
				'isRequired'  => false,
				'placeholder' => 'Describe the issue…',
				'size'        => 'large',
				'cssClass'    => '',
			],
			/* Submission-source tracking — see inc/helpers.php's vanfleet_current_page_title()/vanfleet_current_url(). */
			[ 'id' => 6, 'label' => 'Source Page', 'type' => 'hidden', 'inputName' => 'source_page', 'allowsPrepopulate' => true ],
			[ 'id' => 7, 'label' => 'Source URL',  'type' => 'hidden', 'inputName' => 'source_url',  'allowsPrepopulate' => true ],
		],
		'confirmations' => [
			'default_confirmation' => [
				'id'        => 'default_confirmation',
				'name'      => 'Default Confirmation',
				'isDefault' => true,
				'type'      => 'message',
				'message'   => "<p>Thank you! We’ll call you right back. For urgent issues, call us at (267) 300-4526.</p>",
				'url'       => '',
			],
		],
	] );

	if ( ! is_wp_error( $form_id ) ) {
		update_option( 'vf_gf_request_service_id', (int) $form_id );
	}
}, 20 );

/**
 * Auto-register the "Financing Application" Gravity Form on first deploy.
 * Same pattern as "Request Service" above — stores the form ID in a WP
 * option so the AJAX handler below can resolve field IDs reliably.
 */
add_action( 'init', function () {
	if ( ! class_exists( 'GFAPI' ) ) return;

	$stored = (int) get_option( 'vf_gf_financing_id', 0 );
	if ( $stored > 0 && false !== GFAPI::get_form( $stored ) ) return;

	$form_id = GFAPI::add_form( [
		'title'             => 'Financing Application',
		'description'       => '',
		'labelPlacement'    => 'top_label',
		'descriptionPlacement' => 'below',
		'subLabelPlacement' => 'below',
		'button'            => [
			'type'     => 'text',
			'text'     => 'Submit Request',
			'imageUrl' => '',
		],
		'fields' => [
			[ 'id' => 1, 'label' => 'Full name',   'type' => 'text',     'isRequired' => true, 'placeholder' => 'Jane Homeowner',   'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 2, 'label' => 'Phone',       'type' => 'phone',    'isRequired' => true, 'placeholder' => '(610) 555-0142',   'phoneFormat' => 'standard', 'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 3, 'label' => 'Email',       'type' => 'email',    'isRequired' => true, 'placeholder' => 'you@email.com',    'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 4, 'label' => 'Town / City', 'type' => 'text',     'isRequired' => true, 'placeholder' => 'West Chester',     'size' => 'large', 'cssClass' => '' ],
			[
				'id' => 5, 'label' => 'Project type', 'type' => 'select', 'isRequired' => false, 'size' => 'large', 'cssClass' => '',
				'choices' => [
					[ 'text' => 'Water Heater Replacement', 'value' => 'Water Heater Replacement', 'isSelected' => true  ],
					[ 'text' => 'Tankless Water Heater',     'value' => 'Tankless Water Heater',     'isSelected' => false ],
					[ 'text' => 'Electrical Panel Upgrade',  'value' => 'Electrical Panel Upgrade',  'isSelected' => false ],
					[ 'text' => 'Whole-Home Repipe',         'value' => 'Whole-Home Repipe',         'isSelected' => false ],
					[ 'text' => 'Well / Sump Pump',          'value' => 'Well / Sump Pump',          'isSelected' => false ],
					[ 'text' => 'Other',                     'value' => 'Other',                     'isSelected' => false ],
				],
			],
			[
				'id' => 6, 'label' => 'Estimated amount', 'type' => 'select', 'isRequired' => false, 'size' => 'large', 'cssClass' => '',
				'choices' => [
					[ 'text' => 'Under $1,000',       'value' => 'Under $1,000',       'isSelected' => true  ],
					[ 'text' => '$1,000 – $3,000',    'value' => '$1,000 – $3,000',    'isSelected' => false ],
					[ 'text' => '$3,000 – $6,000',    'value' => '$3,000 – $6,000',    'isSelected' => false ],
					[ 'text' => '$6,000 – $10,000',   'value' => '$6,000 – $10,000',   'isSelected' => false ],
					[ 'text' => 'Over $10,000',       'value' => 'Over $10,000',       'isSelected' => false ],
				],
			],
			[ 'id' => 7, 'label' => 'Anything we should know?', 'type' => 'textarea', 'isRequired' => false, 'placeholder' => 'Tell us about your project…', 'size' => 'large', 'cssClass' => '' ],
			/* Submission-source tracking — see inc/helpers.php's vanfleet_current_page_title()/vanfleet_current_url(). */
			[ 'id' => 8, 'label' => 'Source Page', 'type' => 'hidden', 'inputName' => 'source_page', 'allowsPrepopulate' => true ],
			[ 'id' => 9, 'label' => 'Source URL',  'type' => 'hidden', 'inputName' => 'source_url',  'allowsPrepopulate' => true ],
		],
		'confirmations' => [
			'default_confirmation' => [
				'id'        => 'default_confirmation',
				'name'      => 'Default Confirmation',
				'isDefault' => true,
				'type'      => 'message',
				'message'   => "<p>Thank you! A Van Fleet team member will reach out to discuss your financing options. Questions? Call us at (267) 300-4526.</p>",
				'url'       => '',
			],
		],
	] );

	if ( ! is_wp_error( $form_id ) ) {
		update_option( 'vf_gf_financing_id', (int) $form_id );
	}
}, 20 );

/**
 * Auto-register the "Newsletter Signup" Gravity Form on first deploy.
 * Same pattern as the forms above. Notifications are defined inline here
 * (rather than added later via a one-off script) since the form doesn't
 * pre-exist — same admin/customer routing and voice as Request Service,
 * Financing Application, and Schedule Service.
 */
add_action( 'init', function () {
	if ( ! class_exists( 'GFAPI' ) ) return;

	$stored = (int) get_option( 'vf_gf_newsletter_id', 0 );
	if ( $stored > 0 && false !== GFAPI::get_form( $stored ) ) return;

	$form_id = GFAPI::add_form( [
		'title'             => 'Newsletter Signup',
		'description'       => '',
		'labelPlacement'    => 'top_label',
		'descriptionPlacement' => 'below',
		'subLabelPlacement' => 'below',
		'button'            => [
			'type'     => 'text',
			'text'     => 'Subscribe',
			'imageUrl' => '',
		],
		'fields' => [
			[ 'id' => 1, 'label' => 'Email', 'type' => 'email', 'isRequired' => true, 'placeholder' => 'you@email.com', 'size' => 'large', 'cssClass' => '' ],
			/* Submission-source tracking — see inc/helpers.php's vanfleet_current_page_title()/vanfleet_current_url(). */
			[ 'id' => 2, 'label' => 'Source Page', 'type' => 'hidden', 'inputName' => 'source_page', 'allowsPrepopulate' => true ],
			[ 'id' => 3, 'label' => 'Source URL',  'type' => 'hidden', 'inputName' => 'source_url',  'allowsPrepopulate' => true ],
		],
		'confirmations' => [
			'default_confirmation' => [
				'id'        => 'default_confirmation',
				'name'      => 'Default Confirmation',
				'isDefault' => true,
				'type'      => 'message',
				'message'   => "<p>You're subscribed! Watch your inbox for seasonal maintenance tips from Van Fleet Services.</p>",
				'url'       => '',
			],
		],
		'notifications' => [
			'newsletter_admin_notification' => [
				'id'         => 'newsletter_admin_notification',
				'name'       => 'Admin Notification',
				'service'    => 'wordpress',
				'event'      => 'form_submission',
				'toType'     => 'email',
				'toEmail'    => 'vanfleetservices@gmail.com',
				'to'         => 'vanfleetservices@gmail.com',
				'toField'    => '',
				'routing'    => null,
				'fromName'   => 'Vanfleet Services LLC',
				'from'       => 'support@vanfleetservice.com',
				'replyTo'    => '',
				'bcc'        => 'simplifi.us@gmail.com',
				'cc'         => '',
				'subject'    => 'New Van Fleet newsletter signup — {Email:1}',
				'message'    => "A new newsletter signup has been submitted.\r\n\r\n&nbsp;\r\n\r\n{all_fields}\r\n\r\nSubmission Source\r\nPage: {Source Page:2}\r\nURL: {Source URL:3}",
				'disableAutoformat' => false,
				'notification_conditional_logic_object' => '',
				'notification_conditional_logic' => '0',
				'conditionalLogic' => null,
				'enableAttachments' => false,
			],
			'newsletter_customer_notification' => [
				'id'         => 'newsletter_customer_notification',
				'name'       => 'Customer Notification',
				'service'    => 'wordpress',
				'event'      => 'form_submission',
				'toType'     => 'email',
				'toEmail'    => '{Email:1}',
				'to'         => '{Email:1}',
				'toField'    => '',
				'routing'    => null,
				'fromName'   => 'Vanfleet Services Support',
				'from'       => 'support@vanfleetservice.com',
				'replyTo'    => '',
				'bcc'        => 'vanfleetservices@gmail.com,simplifi.us@gmail.com',
				'cc'         => '',
				'subject'    => "You're Subscribed — Van Fleet Services",
				'message'    => "Hi there,\r\n\r\nThanks for subscribing to Van Fleet Services home-care tips! You'll get seasonal maintenance reminders and money-saving advice straight to your inbox — no spam, ever.\r\n\r\nBest Regards,\r\n\r\nSteve Vanfleet\r\n\r\nvanfleetservice.com\r\n\r\n<a class=\"vf-call-btn\" href=\"tel:+12673004526\"><span class=\"vf-call-btn__text\">(267) 300-4526</span></a>",
				'disableAutoformat' => false,
				'notification_conditional_logic_object' => '',
				'notification_conditional_logic' => '0',
				'conditionalLogic' => null,
				'enableAttachments' => false,
			],
		],
	] );

	if ( ! is_wp_error( $form_id ) ) {
		update_option( 'vf_gf_newsletter_id', (int) $form_id );
	}
}, 20 );

/**
 * Auto-register the "Schedule Service" Gravity Form on first deploy.
 * Same pattern as "Financing Application" above.
 */
add_action( 'init', function () {
	if ( ! class_exists( 'GFAPI' ) ) return;

	$stored = (int) get_option( 'vf_gf_schedule_service_id', 0 );
	if ( $stored > 0 && false !== GFAPI::get_form( $stored ) ) return;

	$form_id = GFAPI::add_form( [
		'title'             => 'Schedule Service',
		'description'       => '',
		'labelPlacement'    => 'top_label',
		'descriptionPlacement' => 'below',
		'subLabelPlacement' => 'below',
		'button'            => [
			'type'     => 'text',
			'text'     => 'Request Appointment',
			'imageUrl' => '',
		],
		'fields' => [
			[ 'id' => 1, 'label' => 'Full name',       'type' => 'text',  'isRequired' => true,  'placeholder' => 'Jane Homeowner',                'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 2, 'label' => 'Phone',           'type' => 'phone', 'isRequired' => true,  'placeholder' => '(610) 555-0142',                'phoneFormat' => 'standard', 'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 3, 'label' => 'Email',           'type' => 'email', 'isRequired' => false, 'placeholder' => 'you@email.com',                 'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 4, 'label' => 'Town / City',     'type' => 'text',  'isRequired' => false, 'placeholder' => 'West Chester',                  'size' => 'large', 'cssClass' => '' ],
			[ 'id' => 5, 'label' => 'Service address', 'type' => 'text',  'isRequired' => false, 'placeholder' => '123 Main St, West Chester, PA', 'size' => 'large', 'cssClass' => '' ],
			[
				'id' => 6, 'label' => 'Service needed', 'type' => 'select', 'isRequired' => true, 'size' => 'large', 'cssClass' => '',
				'choices' => [
					[ 'text' => 'Plumbing Repair',       'value' => 'Plumbing Repair',       'isSelected' => true  ],
					[ 'text' => 'Emergency Plumbing',    'value' => 'Emergency Plumbing',    'isSelected' => false ],
					[ 'text' => 'Drain Cleaning',        'value' => 'Drain Cleaning',        'isSelected' => false ],
					[ 'text' => 'Leak Detection',        'value' => 'Leak Detection',        'isSelected' => false ],
					[ 'text' => 'Water Heater',          'value' => 'Water Heater',          'isSelected' => false ],
					[ 'text' => 'Tankless Water Heater', 'value' => 'Tankless Water Heater', 'isSelected' => false ],
					[ 'text' => 'Well / Sump Pump',      'value' => 'Well / Sump Pump',      'isSelected' => false ],
					[ 'text' => 'Sewage Ejector Pump',   'value' => 'Sewage Ejector Pump',   'isSelected' => false ],
					[ 'text' => 'Electrical Repair',     'value' => 'Electrical Repair',     'isSelected' => false ],
					[ 'text' => 'Panel Upgrade',         'value' => 'Panel Upgrade',         'isSelected' => false ],
					[ 'text' => 'Lighting / Outlets',    'value' => 'Lighting / Outlets',    'isSelected' => false ],
					[ 'text' => 'Other',                 'value' => 'Other',                 'isSelected' => false ],
				],
			],
			[ 'id' => 7, 'label' => 'Preferred date', 'type' => 'date', 'isRequired' => false, 'dateFormat' => 'mdy', 'size' => 'large', 'cssClass' => '' ],
			[
				'id' => 8, 'label' => 'Preferred time', 'type' => 'radio', 'isRequired' => false, 'cssClass' => '',
				'choices' => [
					[ 'text' => 'Morning (8–12)',   'value' => 'Morning (8–12)',   'isSelected' => false ],
					[ 'text' => 'Afternoon (12–4)', 'value' => 'Afternoon (12–4)', 'isSelected' => false ],
					[ 'text' => 'Evening (4–7)',    'value' => 'Evening (4–7)',    'isSelected' => false ],
				],
			],
			[
				'id' => 9, 'label' => 'Urgency', 'type' => 'radio', 'isRequired' => false, 'cssClass' => '',
				'choices' => [
					[ 'text' => 'Emergency — now',  'value' => 'Emergency — now',  'isSelected' => false ],
					[ 'text' => 'Soon — this week', 'value' => 'Soon — this week', 'isSelected' => true  ],
					[ 'text' => 'Flexible',         'value' => 'Flexible',         'isSelected' => false ],
				],
			],
			[ 'id' => 10, 'label' => 'Describe the issue', 'type' => 'textarea', 'isRequired' => false, 'placeholder' => "Tell us what's going on…", 'size' => 'large', 'cssClass' => '' ],
			/* Submission-source tracking — see inc/helpers.php's vanfleet_current_page_title()/vanfleet_current_url(). */
			[ 'id' => 11, 'label' => 'Source Page', 'type' => 'hidden', 'inputName' => 'source_page', 'allowsPrepopulate' => true ],
			[ 'id' => 12, 'label' => 'Source URL',  'type' => 'hidden', 'inputName' => 'source_url',  'allowsPrepopulate' => true ],
		],
		'confirmations' => [
			'default_confirmation' => [
				'id'        => 'default_confirmation',
				'name'      => 'Default Confirmation',
				'isDefault' => true,
				'type'      => 'message',
				'message'   => "<p>Thank you! We'll confirm your appointment shortly. For emergencies, call us at (267) 300-4526.</p>",
				'url'       => '',
			],
		],
	] );

	if ( ! is_wp_error( $form_id ) ) {
		update_option( 'vf_gf_schedule_service_id', (int) $form_id );
	}
}, 20 );

/* ── Hero form AJAX handler ── */
add_action( 'wp_ajax_vanfleet_home_hero_request_service',        'vanfleet_handle_hero_request_service' );
add_action( 'wp_ajax_nopriv_vanfleet_home_hero_request_service', 'vanfleet_handle_hero_request_service' );

function vanfleet_handle_hero_request_service(): void {
	if ( ! isset( $_POST['vf_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vf_nonce'] ) ), 'vanfleet_home_hero_request_service' ) ) {
		wp_send_json_error( [ 'message' => 'Security check failed.' ], 403 );
	}

	if ( ! class_exists( 'GFAPI' ) ) {
		wp_send_json_error( [ 'message' => 'Form system unavailable.' ], 500 );
	}

	$gf_form_id = (int) get_option( 'vf_gf_request_service_id', 0 );
	if ( $gf_form_id <= 0 ) {
		wp_send_json_error( [ 'message' => 'Form not configured.' ], 500 );
	}

	$form = GFAPI::get_form( $gf_form_id );
	if ( ! $form ) {
		wp_send_json_error( [ 'message' => 'Form not found.' ], 500 );
	}

	$full_name    = sanitize_text_field( wp_unslash( $_POST['full_name'] ?? '' ) );
	$phone        = sanitize_text_field( wp_unslash( $_POST['phone']     ?? '' ) );
	$email        = sanitize_email( wp_unslash( $_POST['email']         ?? '' ) );
	$service      = sanitize_text_field( wp_unslash( $_POST['vf_service'] ?? '' ) );
	$message      = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$source_page  = sanitize_text_field( wp_unslash( $_POST['source_page'] ?? '' ) );
	$source_page_url = esc_url_raw( wp_unslash( $_POST['source_url'] ?? '' ) );

	if ( empty( $full_name ) || empty( $phone ) || empty( $email ) ) {
		wp_send_json_error( [ 'message' => 'Please fill in your name, phone number, and email.' ], 422 );
	}

	/* Resolve field IDs dynamically from the form definition. Hidden fields are
	   disambiguated by inputName ("Parameter name" in the admin UI) since both
	   share type 'hidden' and simple type-matching can't tell them apart. */
	$map = [ 'name' => null, 'phone' => null, 'email' => null, 'service' => null, 'message' => null, 'source_page' => null, 'source_url' => null ];
	foreach ( $form['fields'] as $field ) {
		if ( $field->type === 'text'     && $map['name']    === null ) $map['name']    = $field->id;
		elseif ( $field->type === 'phone'    && $map['phone']   === null ) $map['phone']   = $field->id;
		elseif ( $field->type === 'email'    && $map['email']   === null ) $map['email']   = $field->id;
		elseif ( $field->type === 'select'   && $map['service'] === null ) $map['service'] = $field->id;
		elseif ( $field->type === 'textarea' && $map['message'] === null ) $map['message'] = $field->id;
		elseif ( $field->type === 'hidden'   && ( $field->inputName ?? '' ) === 'source_page' ) $map['source_page'] = $field->id;
		elseif ( $field->type === 'hidden'   && ( $field->inputName ?? '' ) === 'source_url' )  $map['source_url']  = $field->id;
	}

	$entry = [
		'form_id'      => $gf_form_id,
		'date_created' => current_time( 'mysql', true ),
		'is_starred'   => 0,
		'is_read'      => 0,
		'ip'           => sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ),
		'source_url'   => esc_url_raw( wp_get_referer() ?: home_url( '/' ) ),
		'currency'     => 'USD',
		'status'       => 'active',
	];

	if ( $map['name']    !== null ) $entry[ (string) $map['name'] ]    = $full_name;
	if ( $map['phone']   !== null ) $entry[ (string) $map['phone'] ]   = $phone;
	if ( $map['email']   !== null ) $entry[ (string) $map['email'] ]   = $email;
	if ( $map['service'] !== null ) $entry[ (string) $map['service'] ] = $service;
	if ( $map['message'] !== null ) $entry[ (string) $map['message'] ] = $message;
	if ( $map['source_page'] !== null ) $entry[ (string) $map['source_page'] ] = $source_page;
	if ( $map['source_url']  !== null ) $entry[ (string) $map['source_url'] ]  = $source_page_url;

	$entry_id = GFAPI::add_entry( $entry );

	if ( is_wp_error( $entry_id ) ) {
		wp_send_json_error( [ 'message' => 'Could not save your request. Please call us directly at (267) 300-4526.' ], 500 );
	}

	/* Trigger any configured GF notifications. */
	$saved_entry = GFAPI::get_entry( $entry_id );
	if ( ! is_wp_error( $saved_entry ) ) {
		GFAPI::send_notifications( $form, $saved_entry, 'form_submission' );
	}

	wp_send_json_success( [
		'message'  => "Thank you! We'll call you right back. For urgent issues, call us at (267) 300-4526.",
		'entry_id' => $entry_id,
	] );
}

/* ── Financing form AJAX handler ── */
add_action( 'wp_ajax_vanfleet_financing_request',        'vanfleet_handle_financing_request' );
add_action( 'wp_ajax_nopriv_vanfleet_financing_request', 'vanfleet_handle_financing_request' );

function vanfleet_handle_financing_request(): void {
	if ( ! isset( $_POST['vf_financing_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vf_financing_nonce'] ) ), 'vanfleet_financing_request' ) ) {
		wp_send_json_error( [ 'message' => 'Security check failed.' ], 403 );
	}

	if ( ! class_exists( 'GFAPI' ) ) {
		wp_send_json_error( [ 'message' => 'Form system unavailable.' ], 500 );
	}

	$gf_form_id = (int) get_option( 'vf_gf_financing_id', 0 );
	if ( $gf_form_id <= 0 ) {
		wp_send_json_error( [ 'message' => 'Form not configured.' ], 500 );
	}

	$form = GFAPI::get_form( $gf_form_id );
	if ( ! $form ) {
		wp_send_json_error( [ 'message' => 'Form not found.' ], 500 );
	}

	$full_name = sanitize_text_field( wp_unslash( $_POST['full_name'] ?? '' ) );
	$phone     = sanitize_text_field( wp_unslash( $_POST['phone']     ?? '' ) );
	$email     = sanitize_email( wp_unslash( $_POST['email']         ?? '' ) );
	$city      = sanitize_text_field( wp_unslash( $_POST['city']     ?? '' ) );
	$project   = sanitize_text_field( wp_unslash( $_POST['project_type']     ?? '' ) );
	$amount    = sanitize_text_field( wp_unslash( $_POST['estimated_amount'] ?? '' ) );
	$message   = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$consent   = ! empty( $_POST['consent'] );
	$source_page      = sanitize_text_field( wp_unslash( $_POST['source_page'] ?? '' ) );
	$source_page_url  = esc_url_raw( wp_unslash( $_POST['source_url'] ?? '' ) );

	if ( empty( $full_name ) || empty( $phone ) || empty( $email ) || ! is_email( $email ) || empty( $city ) || ! $consent ) {
		wp_send_json_error( [ 'message' => 'Please fill in all required fields and confirm consent.' ], 422 );
	}

	$entry = [
		'form_id'      => $gf_form_id,
		'date_created' => current_time( 'mysql', true ),
		'is_starred'   => 0,
		'is_read'      => 0,
		'ip'           => sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ),
		'source_url'   => esc_url_raw( wp_get_referer() ?: home_url( '/' ) ),
		'currency'     => 'USD',
		'status'       => 'active',
		'1'            => $full_name,
		'2'            => $phone,
		'3'            => $email,
		'4'            => $city,
		'5'            => $project,
		'6'            => $amount,
		'7'            => $message,
		'8'            => $source_page,
		'9'            => $source_page_url,
	];

	$entry_id = GFAPI::add_entry( $entry );

	if ( is_wp_error( $entry_id ) ) {
		wp_send_json_error( [ 'message' => 'Could not save your request. Please call us directly at (267) 300-4526.' ], 500 );
	}

	$saved_entry = GFAPI::get_entry( $entry_id );
	if ( ! is_wp_error( $saved_entry ) ) {
		GFAPI::send_notifications( $form, $saved_entry, 'form_submission' );
	}

	wp_send_json_success( [
		'message'  => "Thank you! A Van Fleet team member will reach out to discuss your financing options. Questions? Call us at (267) 300-4526.",
		'entry_id' => $entry_id,
	] );
}

/* ── Schedule Service form AJAX handler ── */
add_action( 'wp_ajax_vanfleet_schedule_service_request',        'vanfleet_handle_schedule_service_request' );
add_action( 'wp_ajax_nopriv_vanfleet_schedule_service_request', 'vanfleet_handle_schedule_service_request' );

function vanfleet_handle_schedule_service_request(): void {
	if ( ! isset( $_POST['vf_schedule_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vf_schedule_nonce'] ) ), 'vanfleet_schedule_service_request' ) ) {
		wp_send_json_error( [ 'message' => 'Security check failed.' ], 403 );
	}

	if ( ! class_exists( 'GFAPI' ) ) {
		wp_send_json_error( [ 'message' => 'Form system unavailable.' ], 500 );
	}

	$gf_form_id = (int) get_option( 'vf_gf_schedule_service_id', 0 );
	if ( $gf_form_id <= 0 ) {
		wp_send_json_error( [ 'message' => 'Form not configured.' ], 500 );
	}

	$form = GFAPI::get_form( $gf_form_id );
	if ( ! $form ) {
		wp_send_json_error( [ 'message' => 'Form not found.' ], 500 );
	}

	$full_name = sanitize_text_field( wp_unslash( $_POST['full_name']       ?? '' ) );
	$phone     = sanitize_text_field( wp_unslash( $_POST['phone']           ?? '' ) );
	$email     = sanitize_email( wp_unslash( $_POST['email']                ?? '' ) );
	$city      = sanitize_text_field( wp_unslash( $_POST['city']            ?? '' ) );
	$address   = sanitize_text_field( wp_unslash( $_POST['service_address'] ?? '' ) );
	$service   = sanitize_text_field( wp_unslash( $_POST['service_needed']  ?? '' ) );
	$date      = sanitize_text_field( wp_unslash( $_POST['preferred_date']  ?? '' ) );
	$time      = sanitize_text_field( wp_unslash( $_POST['preferred_time']  ?? '' ) );
	$urgency   = sanitize_text_field( wp_unslash( $_POST['urgency']         ?? '' ) );
	$message   = sanitize_textarea_field( wp_unslash( $_POST['message']     ?? '' ) );
	$source_page      = sanitize_text_field( wp_unslash( $_POST['source_page'] ?? '' ) );
	$source_page_url  = esc_url_raw( wp_unslash( $_POST['source_url'] ?? '' ) );

	if ( empty( $full_name ) || empty( $phone ) || empty( $service ) ) {
		wp_send_json_error( [ 'message' => 'Please fill in your name, phone, and the service needed.' ], 422 );
	}

	$entry = [
		'form_id'      => $gf_form_id,
		'date_created' => current_time( 'mysql', true ),
		'is_starred'   => 0,
		'is_read'      => 0,
		'ip'           => sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ),
		'source_url'   => esc_url_raw( wp_get_referer() ?: home_url( '/' ) ),
		'currency'     => 'USD',
		'status'       => 'active',
		'1'            => $full_name,
		'2'            => $phone,
		'3'            => $email,
		'4'            => $city,
		'5'            => $address,
		'6'            => $service,
		'7'            => $date,
		'8'            => $time,
		'9'            => $urgency,
		'10'           => $message,
		'11'           => $source_page,
		'12'           => $source_page_url,
	];

	$entry_id = GFAPI::add_entry( $entry );

	if ( is_wp_error( $entry_id ) ) {
		wp_send_json_error( [ 'message' => 'Could not save your request. Please call us directly at (267) 300-4526.' ], 500 );
	}

	$saved_entry = GFAPI::get_entry( $entry_id );
	if ( ! is_wp_error( $saved_entry ) ) {
		GFAPI::send_notifications( $form, $saved_entry, 'form_submission' );
	}

	wp_send_json_success( [
		'message'  => "Thank you! We'll confirm your appointment shortly. For emergencies, call us at (267) 300-4526.",
		'entry_id' => $entry_id,
	] );
}

/* ── Newsletter Signup form AJAX handler ── */
add_action( 'wp_ajax_vanfleet_newsletter_signup',        'vanfleet_handle_newsletter_signup' );
add_action( 'wp_ajax_nopriv_vanfleet_newsletter_signup', 'vanfleet_handle_newsletter_signup' );

function vanfleet_handle_newsletter_signup(): void {
	if ( ! isset( $_POST['vf_newsletter_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vf_newsletter_nonce'] ) ), 'vanfleet_newsletter_signup' ) ) {
		wp_send_json_error( [ 'message' => 'Security check failed.' ], 403 );
	}

	if ( ! class_exists( 'GFAPI' ) ) {
		wp_send_json_error( [ 'message' => 'Form system unavailable.' ], 500 );
	}

	$gf_form_id = (int) get_option( 'vf_gf_newsletter_id', 0 );
	if ( $gf_form_id <= 0 ) {
		wp_send_json_error( [ 'message' => 'Form not configured.' ], 500 );
	}

	$form = GFAPI::get_form( $gf_form_id );
	if ( ! $form ) {
		wp_send_json_error( [ 'message' => 'Form not found.' ], 500 );
	}

	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$source_page      = sanitize_text_field( wp_unslash( $_POST['source_page'] ?? '' ) );
	$source_page_url  = esc_url_raw( wp_unslash( $_POST['source_url'] ?? '' ) );

	if ( empty( $email ) || ! is_email( $email ) ) {
		wp_send_json_error( [ 'message' => 'Please enter a valid email address.' ], 422 );
	}

	$entry = [
		'form_id'      => $gf_form_id,
		'date_created' => current_time( 'mysql', true ),
		'is_starred'   => 0,
		'is_read'      => 0,
		'ip'           => sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ),
		'source_url'   => esc_url_raw( wp_get_referer() ?: home_url( '/' ) ),
		'currency'     => 'USD',
		'status'       => 'active',
		'1'            => $email,
		'2'            => $source_page,
		'3'            => $source_page_url,
	];

	$entry_id = GFAPI::add_entry( $entry );

	if ( is_wp_error( $entry_id ) ) {
		wp_send_json_error( [ 'message' => 'Could not subscribe you right now. Please try again shortly.' ], 500 );
	}

	$saved_entry = GFAPI::get_entry( $entry_id );
	if ( ! is_wp_error( $saved_entry ) ) {
		GFAPI::send_notifications( $form, $saved_entry, 'form_submission' );
	}

	wp_send_json_success( [
		'message'  => "You're subscribed! Watch your inbox for seasonal maintenance tips.",
		'entry_id' => $entry_id,
	] );
}

/**
 * {site_logo_url} merge tag for notification emails — resolved via home_url()
 * at send time, not baked into the stored notification message, so the logo
 * keeps working after a staging→live domain change without editing the forms.
 */
add_filter( 'gform_replace_merge_tags', function ( $text ) {
	if ( strpos( $text, '{site_logo_url}' ) !== false ) {
		$text = str_replace( '{site_logo_url}', esc_url( home_url( '/wp-content/uploads/2024/04/Van-Fleet-logo.png.webp' ) ), $text );
	}
	return $text;
}, 10, 1 );

