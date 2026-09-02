<?php
/**
 * Service-specific FAQ sets for the /electrical/{city}-pa/[{service}/] and
 * /plumbing/{city}-pa/[{service}/] pages.
 * Keyed by service_slug (matches inc/data-location-services.php 'pages'
 * entries), plus a 'hub' set for the bare /electrical/{city}-pa/ city pages
 * and a 'plumbing-hub' set for the bare /plumbing/{city}-pa/ city pages.
 * {city} is replaced with the current city name at render time — see
 * vanfleet_location_service_faqs() in inc/helpers.php.
 */
return [

  'hub' => [
    ['question' => 'What electrical services do you offer in {city}?', 'answer' => 'We handle panel upgrades, EV charger installation, whole-home generators, ceiling fan installation, security system wiring, and general electrical repairs for homeowners throughout {city} and the surrounding area.'],
    ['question' => 'Are you licensed for electrical work in Pennsylvania?', 'answer' => 'Yes. Van Fleet Services is a licensed and insured electrical contractor in Pennsylvania (PA HIC #PA156506, MP-23-14), and every job in {city} is completed to code.'],
    ['question' => 'Do you offer 24/7 emergency electrical service in {city}?', 'answer' => 'Yes — electrical emergencies like power loss, sparking outlets, or a tripped main breaker get priority dispatch any time, day or night.'],
    ['question' => 'Can you provide same-day electrical service in {city}?', 'answer' => 'Often, yes. For common repairs and diagnostics we offer same-day appointments in {city} whenever our schedule allows.'],
    ['question' => 'Do I need a permit for electrical work in {city}?', 'answer' => 'It depends on the scope of the project. We advise you on permit requirements up front and handle the paperwork where one is needed.'],
  ],

  'ceiling-fan-installation' => [
    ['question' => 'How long does ceiling fan installation take?', 'answer' => "Most ceiling fan installations take 1–2 hours, including removing an old fixture and confirming the electrical box can safely support the fan's weight."],
    ['question' => "Can you install a ceiling fan where there's no existing wiring?", 'answer' => "Yes. We can run new wiring and install a fan-rated electrical box in {city} homes that don't currently have one."],
    ['question' => 'Do you install ceiling fans with lights and remote controls?', 'answer' => 'Yes — we install combination fan/light units and wire in remote or wall-mounted smart controls.'],
    ['question' => 'Is my existing electrical box safe for a ceiling fan?', 'answer' => "Not always — a standard light box isn't rated for the weight and motion of a fan. We check this first and upgrade the box if needed before installing."],
    ['question' => 'How much does ceiling fan installation cost?', 'answer' => 'We give you a flat-rate quote before any work begins, based on whether new wiring or a fan-rated box is required.'],
  ],

  'electric-panel-upgrade' => [
    ['question' => 'When does an electrical panel need to be upgraded?', 'answer' => 'Frequently tripping breakers, a 60A or 100A panel in an older home, plans to add an EV charger or major appliances, or a panel over 25–30 years old are all signs it\'s time.'],
    ['question' => 'How long does a panel upgrade take?', 'answer' => 'Most panel upgrades take 4–8 hours. We coordinate the utility shutoff and any required inspection for your {city} home.'],
    ['question' => "Will a panel upgrade increase my home's value?", 'answer' => 'Yes — a modern, code-compliant panel is something buyers and home inspectors look for, and 200A service is now standard in most homes.'],
    ['question' => 'Do I need a permit for a panel upgrade?', 'answer' => 'Yes, and we handle the permit application and inspection scheduling as part of the job.'],
    ['question' => 'What size panel do I need?', 'answer' => "We size the panel to your home's current and future electrical load, including any planned additions like an EV charger or generator."],
  ],

  'ev-charger-installation' => [
    ['question' => 'What is a Level 2 EV charger?', 'answer' => 'A Level 2 charger runs on a 240V circuit and charges most EVs overnight — 4 to 8 times faster than a standard 120V outlet.'],
    ['question' => 'Do I need a permit for EV charger installation?', 'answer' => 'Usually yes. We handle the permit process and make sure the installation meets {city} and Pennsylvania electrical codes.'],
    ['question' => 'Will my existing panel support an EV charger?', 'answer' => 'We assess your panel\'s capacity during the estimate and give you a clear quote if an upgrade is needed.'],
    ['question' => 'How long does EV charger installation take?', 'answer' => 'Most installations take 2–4 hours if the panel has available capacity; longer if a panel upgrade is required first.'],
    ['question' => 'Can you install a charger for any EV brand?', 'answer' => 'Yes — we install Level 2 chargers compatible with Tesla, Ford, Chevrolet, Rivian, and all major EV brands.'],
  ],

  'security-system-installation' => [
    ['question' => 'What does a security system installation include?', 'answer' => 'We run and terminate wiring for cameras, door/window sensors, and control panels, and make sure everything is properly powered and connected.'],
    ['question' => 'Can you wire a security system into a smart home setup?', 'answer' => 'Yes — we install systems that integrate with smart hubs, mobile apps, and existing home automation.'],
    ['question' => 'Do you install both wired and wireless security systems?', 'answer' => "Yes. We install hardwired systems for maximum reliability and wireless components where running new wiring isn't practical."],
    ['question' => 'How long does security system installation take?', 'answer' => 'Most residential installations in {city} take 3–6 hours depending on the number of cameras and sensors involved.'],
    ['question' => 'Will installing cameras require any electrical work?', 'answer' => 'Yes — cameras and panels need a dedicated power source, and we handle all the electrical connections as licensed electricians.'],
  ],

  'whole-home-generator' => [
    ['question' => 'How does a whole-home generator work?', 'answer' => 'A whole-home generator connects to your electrical panel through an automatic transfer switch, so power switches on within seconds of an outage.'],
    ['question' => 'What size generator do I need for my home?', 'answer' => "We calculate your home's electrical load — including HVAC, well pump, and appliances — to recommend the right generator size."],
    ['question' => 'Do you handle the permit and gas hookup for generator installation?', 'answer' => 'Yes — we coordinate the electrical permit, the transfer switch installation, and work with your gas provider or propane supplier for fuel hookup.'],
    ['question' => 'How long does whole-home generator installation take?', 'answer' => 'Most installations take 1–2 days, including the electrical transfer switch, gas line coordination, and startup testing.'],
    ['question' => 'Do generators need regular maintenance?', 'answer' => "Yes — we recommend an annual check to test the transfer switch, battery, and fuel system so it's ready when you need it."],
  ],

  'electrician' => [
    ['question' => 'What kind of electrical work can your electricians handle?', 'answer' => 'From dead outlets and flickering lights to panel upgrades, rewiring, and new installations — our licensed electricians handle the full range of residential electrical work in {city}.'],
    ['question' => 'Do you offer same-day electrician service?', 'answer' => 'Yes — for most common repairs and diagnostics, we offer same-day appointments whenever our schedule allows.'],
    ['question' => 'Are your electricians licensed and insured?', 'answer' => 'Yes. Every electrician on our team is licensed, insured, and background-checked before ever stepping into your home.'],
    ['question' => 'Can an electrician diagnose the cause of tripping breakers?', 'answer' => "Yes — we trace the circuit, identify whether it's an overload, a short, or a failing breaker, and fix the root cause, not just reset it."],
    ['question' => 'Do you offer 24/7 emergency electrician service?', 'answer' => 'Yes — for issues like power loss, sparking outlets, or exposed wiring, we dispatch an electrician to {city} any time, day or night.'],
  ],

  'plumbing-hub' => [
    ['question' => 'What plumbing services do you offer in {city}?', 'answer' => 'We handle drain cleaning, leak detection and pipe repair, water heater installation and repair, well and sump pump service, water softeners, and general plumbing repairs for homeowners throughout {city} and the surrounding area.'],
    ['question' => 'Are you licensed for plumbing work in Pennsylvania?', 'answer' => 'Yes. Van Fleet Services is a licensed and insured plumbing contractor in Pennsylvania (PA HIC #PA156506, MP-23-14), and every job in {city} is completed to code.'],
    ['question' => 'Do you offer 24/7 emergency plumbing service in {city}?', 'answer' => 'Yes — plumbing emergencies like burst pipes, major leaks, or sewage backups get priority dispatch any time, day or night.'],
    ['question' => 'Can you provide same-day plumbing service in {city}?', 'answer' => 'Often, yes. For common repairs and diagnostics we offer same-day appointments in {city} whenever our schedule allows.'],
    ['question' => 'Do you offer financing for plumbing work in {city}?', 'answer' => 'Yes — we offer flexible financing through Wisetack for larger jobs like water heater replacements and re-piping.'],
  ],

  'water-softener' => [
    ['question' => 'How do I know if I need a water softener?', 'answer' => 'Signs of hard water include scale buildup around faucets and fixtures, spotty dishes, dull laundry, and dry skin or hair after showering — common issues across {city} due to local water hardness.'],
    ['question' => 'How does a water softener work?', 'answer' => 'Most systems use an ion exchange process, passing hard water through resin beads that capture calcium and magnesium and replace them with sodium or potassium ions.'],
    ['question' => 'How often does a water softener need maintenance?', 'answer' => 'We recommend an annual check of the resin bed and a refill of the brine tank as needed, which keeps the system softening water effectively year-round.'],
    ['question' => 'Will a water softener increase my water bill?', 'answer' => "Any increase is minor — a properly sized system uses water efficiently, and the savings on appliance lifespan and detergent use typically offset it."],
    ['question' => 'How long does water softener installation take?', 'answer' => 'Most installations in {city} homes take 2–4 hours, including connecting the system to your main water line and testing it.'],
  ],

  'well-pumps' => [
    ['question' => 'What type of well pump do I need?', 'answer' => 'It depends on your well depth — submersible pumps suit deep wells, jet pumps work well for shallow wells around 25 feet or less, and constant pressure pumps maintain steady water pressure regardless of demand.'],
    ['question' => 'How do I know my well pump needs repair or replacement?', 'answer' => 'Watch for inconsistent water pressure, a pump that cycles on and off frequently, unusual noises, or a noticeable drop in water flow — all signs it\'s time for a technician to take a look.'],
    ['question' => 'Do you offer emergency well pump repair?', 'answer' => 'Yes — a failed well pump means no water at all, so we prioritize emergency dispatch to {city} homes any time, day or night.'],
    ['question' => 'How long does well pump installation take?', 'answer' => 'Most installations take a few hours for a straightforward replacement, though depth and access can extend the job for new installations.'],
    ['question' => 'Do you test well water quality?', 'answer' => 'Yes — as part of our well pump service we can test your water and recommend treatment if quality issues come up.'],
  ],

  'sump-pumps' => [
    ['question' => "Do I need a sump pump if I've never had flooding?", 'answer' => "If your basement or crawl space sits below grade, a sump pump is cheap insurance against heavy rain or snowmelt — the kind of water event that only has to happen once to cause serious damage."],
    ['question' => 'What\'s included in sump pump maintenance?', 'answer' => 'We inspect and test the pump\'s operation, the discharge line, the check valve, and the backup battery system so it\'s ready to run when you actually need it.'],
    ['question' => 'Do you install battery backup sump pumps?', 'answer' => 'Yes — a battery backup keeps your sump pump running during a power outage, which is exactly when basement flooding risk is highest.'],
    ['question' => 'How quickly can you respond to a sump pump emergency?', 'answer' => 'Sump pump failures are most urgent during heavy rain, so we prioritize 24/7 emergency dispatch to {city} homes for exactly this reason.'],
    ['question' => 'How long does sump pump installation take?', 'answer' => 'Most installations take a few hours, including sizing the pump to your home and installing the discharge line to code.'],
  ],

  'water-heaters' => [
    ['question' => 'How do I know if my water heater needs repair or replacement?', 'answer' => 'Inconsistent hot water, rust-colored water, unusual noises, or a unit over 10–12 years old are all signs to have it inspected before it fails completely.'],
    ['question' => 'What size water heater do I need?', 'answer' => "We size the unit to your household's hot water demand, fuel type, and available installation space during the estimate."],
    ['question' => 'Do you repair both gas and electric water heaters?', 'answer' => 'Yes — our technicians service and repair gas, electric, and tankless water heaters from all major brands.'],
    ['question' => 'Do you offer emergency water heater repair?', 'answer' => 'Yes — a water heater that fails completely is a same-day priority for us, with 24/7 dispatch available across {city}.'],
    ['question' => 'How long does a water heater replacement take?', 'answer' => 'Most replacements are completed in a single visit, typically 2–4 hours depending on the unit type and any code updates needed.'],
  ],

  'tankless-water-heaters' => [
    ['question' => 'How is a tankless water heater different from a traditional tank?', 'answer' => 'A tankless unit heats water on demand instead of storing and reheating it, which means it never runs out of hot water and typically uses less energy over time.'],
    ['question' => 'Do I need to upgrade my gas line or electrical panel for a tankless unit?', 'answer' => 'Sometimes — tankless units can require more gas flow or electrical capacity than a standard outlet or line provides, so we check this during the estimate.'],
    ['question' => 'How long does tankless water heater installation take?', 'answer' => 'Most installations in {city} take about half a day, including mounting the unit and connecting gas or electric, water, and venting.'],
    ['question' => 'Do tankless water heaters require maintenance?', 'answer' => 'Yes — we recommend an annual flush to clear mineral buildup from the heat exchanger, which keeps the unit running efficiently.'],
    ['question' => 'Are tankless water heaters worth the higher upfront cost?', 'answer' => 'For most households, yes — the energy savings, longer lifespan, and endless hot water typically offset the higher installation cost over time.'],
  ],

  'plumber' => [
    ['question' => 'What plumbing problems can you fix?', 'answer' => 'From leaky faucets and clogged drains to burst pipes, water heater issues, and sewage backups — our licensed plumbers handle the full range of residential plumbing in {city}.'],
    ['question' => 'Do you offer 24/7 emergency plumber service?', 'answer' => 'Yes — for burst pipes, major leaks, or no hot water, we dispatch a plumber to {city} any time, day or night.'],
    ['question' => 'Do you offer financing for plumbing repairs?', 'answer' => 'Yes — we offer flexible financing through Wisetack for larger repairs and replacements.'],
    ['question' => 'Can you handle both repairs and full re-piping?', 'answer' => 'Yes — from a single fixture repair to re-piping an older home, our team handles jobs of any size.'],
    ['question' => 'How quickly can a plumber get to my home?', 'answer' => 'For common repairs we often offer same-day appointments in {city}, and true emergencies get priority dispatch.'],
  ],

  'water-heater-installation' => [
    ['question' => 'What types of water heaters do you install?', 'answer' => 'We install traditional tank units in gas and electric, tankless on-demand systems, and solar water heaters, based on your household\'s hot water needs.'],
    ['question' => 'How long does water heater installation take?', 'answer' => 'Most installations in {city} are completed in a single visit, typically 2–4 hours from removal of the old unit to final testing.'],
    ['question' => 'Do you remove and dispose of my old water heater?', 'answer' => 'Yes — removal and responsible disposal of your old unit is included as part of the installation.'],
    ['question' => 'Do you handle the permit for water heater installation?', 'answer' => 'Yes — where a permit is required, we handle the application and inspection scheduling as part of the job.'],
    ['question' => 'Will you test the system after installation?', 'answer' => 'Yes — every installation ends with a full test for leaks, proper venting, and safe operation before we consider the job done.'],
  ],

];
