<?php
/** Safe wrappers for optional plugins including ACF, forms, and SEO tools. */
function vanfleet_has_acf(): bool { return function_exists('get_field'); }
function vanfleet_acf(string $field, $default=null, $post_id=null){ return vanfleet_has_acf() ? (get_field($field,$post_id) ?: $default) : $default; }
function vanfleet_form_shortcode(string $context='default'): string { $acf=vanfleet_acf($context.'_form_shortcode',''); if($acf) return $acf; $global=vanfleet_global('form_shortcode',''); return is_string($global)?$global:''; }
function vanfleet_seo_plugin_has_schema(): bool { return defined('RANK_MATH_VERSION') || defined('WPSEO_VERSION'); }
function vanfleet_custom_schema_enabled(): bool { if(defined('VANFLEET_DISABLE_SCHEMA') && VANFLEET_DISABLE_SCHEMA) return false; return (bool) apply_filters('vanfleet_enable_custom_schema', !vanfleet_seo_plugin_has_schema()); }
