<?php
/** Theme utility shortcodes for backend/plugin content. */
add_shortcode('vanfleet_phone', fn()=>esc_html(vanfleet_global('phone_display')));
add_shortcode('vanfleet_call_button', fn($atts=[])=>vanfleet_button($atts['label']??'Call Now', vanfleet_tel_href(), 'primary'));
