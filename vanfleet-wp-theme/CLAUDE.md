# Claude Development Notes

## Project purpose
Lightweight custom WordPress theme for Van Fleet Services LLC / Van Fleet Plumbing & Electrical focused on calls, service requests, emergency leads, local SEO, speed, accessibility, and Kinsta deployment.

## Structure
- `assets/css/`: split CSS architecture. `tokens.css` contains design tokens only; `base.css`, `layout.css`, `components.css`, `pages.css`, and `responsive.css` layer styles in enqueue order.
- `assets/js/main.js`: minimal vanilla JavaScript for mobile menu and FAQ accordion.
- `inc/`: setup, enqueue, helpers, plugin integrations, structured data arrays, shortcodes, and schema.
- `template-parts/global/`: header, footer, breadcrumbs, and mobile CTA.
- `template-parts/components/`: focused reusable UI components.
- `template-parts/sections/`: reserved modular section partials for future page-specific editing.
- `templates/`: WordPress page templates for services, locations, hubs, contact, reviews, and landing pages.

## Add a service page
1. Add or update a service item in `inc/data-services.php` with `title`, `slug`, `type`, `primary_keyword`, `description`, and `cta`.
2. Create a WordPress page matching the slug path.
3. Assign `Van Fleet Service Page` for individual services or `Van Fleet Service Hub` for hubs.
4. Add unique editor/ACF content for deeper SEO copy.

## Add a location page
1. Add a location item in `inc/data-locations.php`.
2. Create a child page under `/service-areas/` using the same slug.
3. Assign `Van Fleet Location Page`.
4. Add unique local copy in the page editor or ACF to avoid thin duplicate pages.

## Update global CTAs
Edit `inc/data-global.php` for phone, CTA labels, contact URL, emergency text, and form shortcode fallback.

## Plugin shortcodes
Forms are rendered by `template-parts/components/contact-form-block.php`. Add Gravity Forms, Fluent Forms, WPForms, or Contact Form 7 shortcodes via ACF fields or `inc/data-global.php`.

## Do not modify without approval
Do not change verified phone, address, license numbers, hours, legal footer, or schema identity unless the business verifies new details.

## Future Claude usage
Keep files modular and avoid large duplicated blocks. Prefer editing data arrays and small components over hard-coded template duplication.
