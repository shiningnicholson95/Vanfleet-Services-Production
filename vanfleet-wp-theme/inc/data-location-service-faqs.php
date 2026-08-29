<?php
/**
 * Service-specific FAQ sets for the /electrical/{city}-pa/[{service}/] pages.
 * Keyed by service_slug (matches inc/data-location-services.php 'pages'
 * entries), plus a 'hub' set for the bare /electrical/{city}-pa/ city pages.
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

];
