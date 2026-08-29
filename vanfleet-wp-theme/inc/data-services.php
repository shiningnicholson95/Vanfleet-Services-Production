<?php
/** Structured service data — title, slug, type, keywords, description, features, faqs. */
return [

  /* ── PLUMBING HUB ───────────────────────────────────────── */
  [
    'title'           => 'Plumbing Services',
    'slug'            => 'plumbing',
    'type'            => 'hub',
    'parent'          => null,
    'primary_keyword' => 'plumbing services Chester Springs PA',
    'description'     => 'Reliable plumbing service for repairs, leaks, drains, fixtures, water heaters, pumps, and urgent plumbing problems across Chester County.',
    'cta'             => 'Get Plumbing Help',
    'features'        => [
      'Leaks, drains, and fixture repairs',
      'Water heater repair and replacement',
      'Well and sump pump service',
      'Pipe repair and replacement',
      '24/7 emergency plumbing',
      'Drain cleaning and clog removal',
    ],
    'faqs'            => [
      ['question' => 'What plumbing services do you offer?',      'answer' => 'Van Fleet Services handles repairs, drain cleaning, water heater service, well and sump pumps, pipe repair, leak detection, and 24/7 emergency plumbing across Chester County.'],
      ['question' => 'Do you offer same-day plumbing service?',   'answer' => 'Yes — for most common repairs and water heater issues, we offer same-day service. Call (267) 300-4526 and we will do our best to get a technician to you quickly.'],
      ['question' => 'Are you licensed for plumbing in Pennsylvania?', 'answer' => 'Yes. Van Fleet Services LLC is licensed and insured for plumbing in Pennsylvania. License details: PA HIC #PA156506 and MP-23-14.'],
    ],
  ],

  /* ── EMERGENCY PLUMBING ─────────────────────────────────── */
  [
    'title'           => 'Emergency Plumbing',
    'slug'            => 'services/plumber',
    'image'           => '2026/06/plumbing-vanfleet-services.png',
    'image_alt'       => 'Plumber service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => 'plumbing',
    'primary_keyword' => 'emergency plumber Chester Springs PA',
    'description'     => '24/7 emergency plumbing for burst pipes, major leaks, sewage backups, no hot water, and urgent plumbing issues across Chester County.',
    'cta'             => 'Call 24/7 Emergency Service',
    'features'        => [
      'Burst pipe emergency response',
      'Major leak containment and repair',
      'Sewage backup clearing',
      'No hot water — same-day service',
      'Flooding prevention response',
      'After-hours dispatch, 24 hours / 7 days',
    ],
    'faqs'            => [
      ['question' => 'How quickly can you respond to a plumbing emergency?', 'answer' => 'We dispatch as fast as possible. For most Chester County emergencies, we aim to have a technician on the way within the hour. Call (267) 300-4526 any time.'],
      ['question' => 'What counts as a plumbing emergency?',               'answer' => 'Burst pipes, active major leaks, sewage backup, flooding, no hot water with small children or elderly residents, and anything creating water damage risk.'],
      ['question' => 'Is emergency plumbing service available 24/7?',       'answer' => 'Yes. Van Fleet Services answers the phone 24 hours a day, 7 days a week for plumbing emergencies throughout Chester Springs and Chester County.'],
    ],
  ],

  /* ── PLUMBING REPAIR ────────────────────────────────────── */
  [
    'title'           => 'Plumbing Repair',
    'slug'            => 'services/plumber',
    'type'            => 'service',
    'parent'          => 'plumbing',
    'primary_keyword' => 'plumbing repair Chester Springs PA',
    'description'     => 'Professional plumbing repairs for leaks, fixtures, toilets, faucets, pipes, and common home plumbing problems.',
    'cta'             => 'Request Plumbing Repair',
    'features'        => [
      'Leaking pipes and broken fixtures',
      'Running toilets and dripping faucets',
      'Low water pressure diagnosis',
      'Shut-off valve replacement',
      'Fixture installation and upgrades',
      'Supply line and hose bib repair',
    ],
    'faqs'            => [
      ['question' => 'How much does a plumbing repair cost?',        'answer' => 'We provide a flat-rate quote before any work begins — you approve the price first, so there are never surprise charges.'],
      ['question' => 'Can you repair all types of plumbing fixtures?', 'answer' => 'Yes — faucets, toilets, valves, supply lines, shut-offs, and more. If the part is available, we handle it.'],
      ['question' => 'Do you fix leaks the same day?',               'answer' => 'In most cases yes. Call (267) 300-4526 and we will schedule the earliest available appointment, often the same day.'],
    ],
  ],

  /* ── DRAIN CLEANING ─────────────────────────────────────── */
  [
    'title'           => 'Drain Cleaning',
    'slug'            => 'services/plumber',
    'type'            => 'service',
    'parent'          => 'plumbing',
    'primary_keyword' => 'drain cleaning Chester Springs PA',
    'description'     => 'Drain cleaning service for slow drains, clogs, backups, and recurring drainage issues.',
    'cta'             => 'Schedule Drain Cleaning',
    'features'        => [
      'Slow and stopped drain clearing',
      'Kitchen grease and food clogs',
      'Bathroom hair and soap clogs',
      'Main sewer line clearing',
      'Recurring clog diagnosis',
      'Preventive drain maintenance',
    ],
    'faqs'            => [
      ['question' => 'How do I know if I need drain cleaning?',          'answer' => 'Slow drains, gurgling sounds, bad odors from drains, or water backing up in multiple fixtures are all signs that professional drain cleaning will help.'],
      ['question' => 'Can you clear a main sewer line clog?',            'answer' => 'Yes. We have the equipment to clear main sewer line blockages as well as individual fixture clogs.'],
      ['question' => 'Will drain cleaning fix my recurring clog problem?', 'answer' => 'Professional drain cleaning removes buildup that store-bought products leave behind. We also diagnose root causes to prevent the clog from coming back.'],
    ],
  ],

  /* ── LEAK DETECTION & PIPE REPAIR ──────────────────────── */
  [
    'title'           => 'Leak Detection and Pipe Repair',
    'slug'            => 'services/plumber',
    'type'            => 'service',
    'parent'          => 'plumbing',
    'primary_keyword' => 'leak detection Chester Springs PA',
    'description'     => 'Leak detection and pipe repair for hidden leaks, damaged pipes, water stains, and water pressure issues.',
    'cta'             => 'Request Leak Repair',
    'features'        => [
      'Hidden and under-slab leak detection',
      'Water line diagnosis and repair',
      'Copper and PEX pipe repair',
      'Water stain and damage investigation',
      'Pressure testing and meter checks',
      'Pipe joint and fitting repair',
    ],
    'faqs'            => [
      ['question' => 'How do you find a hidden leak?',              'answer' => 'We use pressure testing and visual inspection to pinpoint hidden leaks before opening walls unnecessarily, saving time and repair cost.'],
      ['question' => 'Can a small leak cause serious damage?',       'answer' => 'Yes — even a slow drip inside a wall can cause mold, structural damage, and higher water bills. Early detection saves money and prevents bigger problems.'],
      ['question' => 'Do you repair both copper and plastic pipes?', 'answer' => 'Yes. We repair and replace copper, PEX, CPVC, and galvanized piping in residential homes.'],
    ],
  ],

  /* ── WATER HEATER HUB ───────────────────────────────────── */
  [
    'title'           => 'Water Heater Services',
    'slug'            => 'water-heaters',
    'type'            => 'hub',
    'parent'          => null,
    'primary_keyword' => 'water heater services Chester Springs PA',
    'description'     => 'Water heater repair, replacement, tankless water heater service, and no-hot-water help.',
    'cta'             => 'Get Water Heater Help',
    'features'        => [
      'Tank water heater repair and replacement',
      'Tankless water heater installation',
      'No hot water — same-day service',
      'All brands and models',
      'Gas and electric units',
      'Sediment flush and anode rod service',
    ],
    'faqs'            => [
      ['question' => 'How long does a water heater last?',           'answer' => 'Most tank heaters last 8–12 years; tankless units can last 20 or more. If yours is over 10 years and failing, replacement is often the smarter investment.'],
      ['question' => 'Repair or replace — which is better?',         'answer' => 'We give you an honest recommendation based on the unit\'s age, the cost of repair, and your hot-water needs. No upselling.'],
      ['question' => 'Do you install tankless water heaters?',        'answer' => 'Yes. We size, install, and service tankless systems for endless hot water and lower energy bills.'],
    ],
  ],

  /* ── WATER HEATER REPAIR ────────────────────────────────── */
  [
    'title'           => 'Water Heater Repair',
    'slug'            => 'water-heaters/water-heater-repair',
    'type'            => 'service',
    'parent'          => 'water-heaters',
    'primary_keyword' => 'water heater repair Chester Springs PA',
    'description'     => 'Water heater repair for leaks, no hot water, strange noises, pilot issues, and inconsistent temperature.',
    'cta'             => 'Request Water Heater Repair',
    'features'        => [
      'No hot water diagnosis and repair',
      'Leaking tank inspection and fix',
      'Pilot light and ignition issues',
      'Thermostat and element replacement',
      'Gas valve and burner service',
      'Sediment flush and performance restore',
    ],
    'faqs'            => [
      ['question' => 'Why does my water heater make a popping noise?', 'answer' => 'Popping or rumbling usually means sediment has built up in the tank. A flush can often restore performance and extend the life of the unit.'],
      ['question' => 'My water heater is leaking — is it repairable?', 'answer' => 'It depends on where it\'s leaking. A leaking pressure relief valve is usually repairable; a leaking tank typically means replacement is the better option.'],
      ['question' => 'How long does water heater repair take?',         'answer' => 'Most repairs are completed in 1–2 hours. We carry common parts and repair most issues on the first visit.'],
    ],
  ],

  /* ── WATER HEATER REPLACEMENT ───────────────────────────── */
  [
    'title'           => 'Water Heater Replacement',
    'slug'            => 'water-heaters/water-heater-replacement',
    'type'            => 'service',
    'parent'          => 'water-heaters',
    'primary_keyword' => 'water heater replacement Chester Springs PA',
    'description'     => 'Water heater replacement and installation for traditional and high-efficiency systems.',
    'cta'             => 'Schedule Water Heater Replacement',
    'features'        => [
      'Tank water heater replacement',
      'Same-day installation available',
      'All major brands and sizes',
      'Gas and electric models',
      'Old unit removal and disposal',
      'Code-compliant installation',
    ],
    'faqs'            => [
      ['question' => 'How long does water heater replacement take?', 'answer' => 'Most standard replacements take 2–4 hours. We handle removal of the old unit and cleanup, so you\'re not left with the work.'],
      ['question' => 'What size water heater do I need?',            'answer' => 'We assess your household size and hot-water usage and recommend the right tank size or tankless system. No oversizing or underselling.'],
      ['question' => 'Do you offer same-day water heater replacement?', 'answer' => 'Yes — for most jobs, we can install a new water heater the same day you call, depending on parts availability and schedule.'],
    ],
  ],

  /* ── TANKLESS WATER HEATERS ─────────────────────────────── */
  [
    'title'           => 'Tankless Water Heaters',
    'slug'            => 'services/tankless-water-heaters',
    'image'           => '2026/06/tankless-water-heater-vanfleet-services.png',
    'image_alt'       => 'Tankless water heater installation — Van Fleet Services',
    'type'            => 'service',
    'parent'          => 'water-heaters',
    'primary_keyword' => 'tankless water heater installation Chester Springs PA',
    'description'     => 'Tankless water heater installation, replacement, service, and upgrade guidance.',
    'cta'             => 'Ask About Tankless Water Heaters',
    'features'        => [
      'Tankless water heater installation',
      'Conversion from tank systems',
      'Endless on-demand hot water',
      'Energy-efficient upgrade option',
      'Gas and electric models',
      'Annual descaling and service',
    ],
    'faqs'            => [
      ['question' => 'Is tankless worth it over a tank heater?',       'answer' => 'Tankless heaters provide endless hot water, use less energy, and last longer. They cost more upfront but often save money over time. We help you decide what fits your home.'],
      ['question' => 'How long does a tankless installation take?',     'answer' => 'Most installations take 3–5 hours. If gas line upgrades or venting changes are needed, it may take longer.'],
      ['question' => 'Do tankless water heaters need maintenance?',     'answer' => 'Yes — annual descaling (flushing) keeps performance high and prevents mineral buildup, especially in areas with hard water.'],
    ],
  ],

  /* ── PUMP SERVICES HUB ──────────────────────────────────── */
  [
    'title'           => 'Pump Services',
    'slug'            => 'pump-services',
    'type'            => 'hub',
    'parent'          => null,
    'primary_keyword' => 'pump services Chester Springs PA',
    'description'     => 'Well pump, sump pump, and sewage ejector pump services for Chester County homes.',
    'cta'             => 'Request Pump Service',
    'features'        => [
      'Well pump repair and replacement',
      'Sump pump service and backup',
      'Sewage ejector pump repair',
      'Pressure tank diagnosis',
      'Emergency pump dispatch',
      'No-water and flooding response',
    ],
    'faqs'            => [
      ['question' => 'How do I know if my well pump is failing?',       'answer' => 'Signs include no water, low pressure, sputtering flow, air in the lines, or the pump running constantly. Call us and we will diagnose the issue fast.'],
      ['question' => 'Do you service both well pumps and sump pumps?',  'answer' => 'Yes — Van Fleet handles well pumps, sump pumps, sewage ejector pumps, and related pressure tanks and controls.'],
      ['question' => 'Is pump failure a 24/7 emergency?',               'answer' => 'Yes. A failed well pump means no water, and a failed sump pump during heavy rain can cause flooding. We dispatch for pump emergencies any time.'],
    ],
  ],

  /* ── WELL PUMP ──────────────────────────────────────────── */
  [
    'title'           => 'Well Pump Services',
    'slug'            => 'services/well-pumps',
    'image'           => '2026/06/well-pumps-vanfleet-services.png',
    'image_alt'       => 'Well pump service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => 'pump-services',
    'primary_keyword' => 'well pump service Chester Springs PA',
    'description'     => 'Well pump troubleshooting, repair, replacement, and pressure issue support.',
    'cta'             => 'Request Well Pump Service',
    'features'        => [
      'Well pump troubleshooting',
      'Submersible pump replacement',
      'Pressure tank service',
      'No-water emergency diagnosis',
      'Electrical connections and controls',
      'Pump controller and switch repair',
    ],
    'faqs'            => [
      ['question' => 'Why do I suddenly have no water from my well?',   'answer' => 'The most common causes are a failed well pump, a tripped circuit breaker, a blown pressure switch, or a failed pressure tank. We diagnose all of these.'],
      ['question' => 'How long does well pump replacement take?',        'answer' => 'Most submersible pump replacements take 3–5 hours depending on the well depth and access.'],
      ['question' => 'Do you offer emergency well pump service?',        'answer' => 'Yes — a well pump failure means no water, so we treat it as an emergency and dispatch as quickly as possible.'],
    ],
  ],

  /* ── SUMP PUMP ──────────────────────────────────────────── */
  [
    'title'           => 'Sump Pump Services',
    'slug'            => 'services/sump-pumps',
    'image'           => '2026/06/sumps-pumps-vanfleet-services.png',
    'image_alt'       => 'Sump pump service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => 'pump-services',
    'primary_keyword' => 'sump pump service Chester Springs PA',
    'description'     => 'Sump pump repair, replacement, backup pump setup, and storm-readiness service.',
    'cta'             => 'Schedule Sump Pump Service',
    'features'        => [
      'Sump pump repair and replacement',
      'Battery backup pump installation',
      'Float switch replacement',
      'Pit inspection and cleaning',
      'Storm-season readiness check',
      'Alarm testing and setup',
    ],
    'faqs'            => [
      ['question' => 'How often should a sump pump be serviced?',        'answer' => 'We recommend an annual check, ideally before the spring rainy season. We test the pump, float, and discharge line.'],
      ['question' => 'Should I get a battery backup sump pump?',         'answer' => 'Yes — a battery backup protects you during power outages, which often coincide with the storms that cause basement flooding.'],
      ['question' => 'My sump pump is running constantly — is that bad?', 'answer' => 'Constant running often means a stuck or failed float switch, a short discharge line, or a pump too small for your water table. Let us inspect it.'],
    ],
  ],

  /* ── SEWAGE EJECTOR PUMP ────────────────────────────────── */
  [
    'title'           => 'Sewage Ejector Pump Services',
    'slug'            => 'pump-services/sewage-ejector-pumps',
    'type'            => 'service',
    'parent'          => 'pump-services',
    'primary_keyword' => 'sewage ejector pump service Chester Springs PA',
    'description'     => 'Sewage ejector pump repair and replacement for basements, bathrooms, and lower-level plumbing.',
    'cta'             => 'Request Ejector Pump Service',
    'features'        => [
      'Ejector pump repair',
      'Full pump replacement',
      'Pit and basin inspection',
      'Check valve replacement',
      'Alarm system testing',
      'Lower-level bathroom support',
    ],
    'faqs'            => [
      ['question' => 'What does a sewage ejector pump do?',              'answer' => 'A sewage ejector pump moves waste from below-grade bathrooms (basement toilets, showers) up to the main sewer line.'],
      ['question' => 'What are signs my ejector pump is failing?',       'answer' => 'Slow-flushing toilets, sewage odors, alarms, or sewage backup in a basement bathroom all point to an ejector pump problem.'],
      ['question' => 'Do you replace the whole pump or just parts?',     'answer' => 'We repair what can be cost-effectively fixed (valves, floats, switches) and recommend full replacement when the pump motor is failing.'],
    ],
  ],

  /* ── ELECTRICAL HUB ─────────────────────────────────────── */
  [
    'title'           => 'Electrical Services',
    'slug'            => 'electrical',
    'image'           => '2026/06/service-panel-installation-vanfleet-services.png',
    'image_alt'       => 'Service panel installation — Van Fleet Services',
    'type'            => 'hub',
    'parent'          => null,
    'primary_keyword' => 'electrical services Chester Springs PA',
    'description'     => 'Electrical repairs, panel upgrades, lighting installation, outlets, switches, and home electrical improvements.',
    'cta'             => 'Request Electrical Service',
    'features'        => [
      'Electrical panel upgrades',
      'Outlet and switch installation',
      'Lighting installation',
      'Circuit breaker service',
      'GFCI and AFCI protection',
      'Electrical safety inspections',
    ],
    'faqs'            => [
      ['question' => 'Are you licensed for electrical work in Pennsylvania?', 'answer' => 'Yes. Van Fleet Services is a licensed and insured electrical contractor in Pennsylvania (MP-23-14). Every job is completed to code.'],
      ['question' => 'What electrical services do you offer?',               'answer' => 'Panel upgrades, outlet and switch installation, lighting, GFCI protection, circuit breaker service, and general residential electrical repairs.'],
      ['question' => 'Do I need a permit for electrical work?',              'answer' => 'It depends on the scope. We advise on permit requirements and handle the process where needed.'],
    ],
  ],

  /* ── ELECTRICAL REPAIR ──────────────────────────────────── */
  [
    'title'           => 'Electrical Repair',
    'slug'            => 'services/service-panel-installation',
    'type'            => 'service',
    'parent'          => 'electrical',
    'primary_keyword' => 'electrical repair Chester Springs PA',
    'description'     => 'Electrical repair for outlets, switches, lighting, breakers, panels, and common home electrical issues.',
    'cta'             => 'Request Electrical Repair',
    'features'        => [
      'Dead outlet and switch repair',
      'Tripping breaker diagnosis',
      'Flickering light repair',
      'GFCI outlet reset and replacement',
      'Ceiling fan and fixture wiring',
      'Circuit troubleshooting',
    ],
    'faqs'            => [
      ['question' => 'Why do my outlets keep losing power?',             'answer' => 'A tripped GFCI outlet, a tripped breaker, or loose wiring are the most common causes. We diagnose and fix the root issue, not just reset the breaker.'],
      ['question' => 'Is a flickering light a serious electrical problem?', 'answer' => 'Sometimes. Occasional dimming under heavy load can be normal, but constant flickering often points to a loose connection or an overloaded circuit that needs attention.'],
      ['question' => 'Can you fix an outlet the same day?',              'answer' => 'Usually yes. Simple outlet and switch repairs are quick jobs we can typically complete on the same day you call.'],
    ],
  ],

  /* ── ELECTRICAL PANEL ───────────────────────────────────── */
  [
    'title'           => 'Electrical Panel Upgrades',
    'slug'            => 'services/service-panel-installation',
    'type'            => 'service',
    'parent'          => 'electrical',
    'primary_keyword' => 'electrical panel upgrade Chester Springs PA',
    'description'     => 'Electrical panel upgrade service for safer, more reliable power capacity.',
    'cta'             => 'Ask About Panel Upgrades',
    'features'        => [
      'Panel replacement and upgrade',
      '100A to 200A service upgrades',
      'Sub-panel installation',
      'Breaker replacement and repair',
      'Meter base and service entrance',
      'Code compliance and safety',
    ],
    'faqs'            => [
      ['question' => 'When does an electrical panel need to be upgraded?', 'answer' => 'Signs include frequently tripping breakers, a 60A or 100A panel in an older home, adding an EV charger or major appliances, or a panel over 25–30 years old.'],
      ['question' => 'How long does a panel upgrade take?',               'answer' => 'Most panel upgrades take 4–8 hours. We coordinate the utility shutoff and inspection as needed.'],
      ['question' => 'Will a panel upgrade increase my home\'s value?',   'answer' => 'Yes — buyers and home inspectors look for modern, code-compliant electrical panels. A 200A service is now standard for modern homes.'],
    ],
  ],

  /* ── LIGHTING ───────────────────────────────────────────── */
  [
    'title'           => 'Lighting Installation',
    'slug'            => 'services/service-panel-installation',
    'type'            => 'service',
    'parent'          => 'electrical',
    'primary_keyword' => 'lighting installation Chester Springs PA',
    'description'     => 'Indoor and outdoor lighting installation for homes and property improvements.',
    'cta'             => 'Schedule Lighting Installation',
    'features'        => [
      'Recessed and can lighting',
      'Outdoor and security lighting',
      'Ceiling fan installation',
      'Under-cabinet lighting',
      'Dimmer switch installation',
      'Landscape and pathway lighting',
    ],
    'faqs'            => [
      ['question' => 'Can you install recessed lighting in existing ceilings?', 'answer' => 'Yes. We install LED recessed lights in existing ceilings with minimal patching. We run the wiring and handle all electrical connections.'],
      ['question' => 'Do you install ceiling fans?',                             'answer' => 'Yes — ceiling fan installation, replacement, and wiring. We also install ceiling fan switches and dimmer-compatible controls.'],
      ['question' => 'Can you add outdoor lighting for security?',               'answer' => 'Yes. We install motion-sensor lights, pathway lighting, and hard-wired security lighting around your home\'s exterior.'],
    ],
  ],

  /* ── OUTLETS & SWITCHES ─────────────────────────────────── */
  [
    'title'           => 'Outlet and Switch Installation',
    'slug'            => 'services/service-panel-installation',
    'type'            => 'service',
    'parent'          => 'electrical',
    'primary_keyword' => 'outlet and switch installation Chester Springs PA',
    'description'     => 'Outlet, switch, dimmer, and GFCI installation for safer, more convenient electrical use.',
    'cta'             => 'Request Outlet or Switch Service',
    'features'        => [
      'Standard outlet installation',
      'GFCI outlet installation',
      'USB and smart outlet installation',
      'Dimmer switch installation',
      '3-way and 4-way switch wiring',
      'Outlet and switch relocation',
    ],
    'faqs'            => [
      ['question' => 'Where are GFCI outlets required?',              'answer' => 'GFCI protection is required by code in kitchens, bathrooms, garages, basements, outdoors, and near water sources. We assess your home and install where needed.'],
      ['question' => 'Can you add outlets to a room that doesn\'t have enough?', 'answer' => 'Yes. We add circuits or extend existing ones to place outlets where you need them.'],
      ['question' => 'Do you install smart switches and dimmers?',    'answer' => 'Yes — we install Lutron, Leviton, and other smart lighting controls and ensure they are wired and configured correctly.'],
    ],
  ],

  /* ═══════════════════════════════════════════════════════════
     /services/ CHILD PAGES — PRD 1.9
     Slugs prefixed with "services/" to match WP URL paths
     resolved by vanfleet_current_service() via REQUEST_URI.
     ═══════════════════════════════════════════════════════════ */

  /* ── PLUMBER ────────────────────────────────────────────── */
  [
    'title'           => 'Plumber',
    'slug'            => 'plumbing/plumber',
    'image'           => '2026/06/plumbing-vanfleet-services.png',
    'image_alt'       => 'Plumber service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'licensed plumber Chester County PA',
    'description'     => 'Van Fleet Services provides fast, reliable plumbing repairs and installations across Chester County — same-day service available with flat-rate pricing.',
    'cta'             => 'Get Plumbing Help',
    'features'        => [
      'Leaks, drains, and fixture repairs',
      'Water heater repair and replacement',
      'Well and sump pump service',
      'Pipe repair and replacement',
      '24/7 emergency plumbing',
      'Drain cleaning and clog removal',
    ],
    'faqs'            => [
      ['question' => 'What plumbing services do you offer?',            'answer' => 'Van Fleet Services handles repairs, drain cleaning, water heater service, well and sump pumps, pipe repair, leak detection, and 24/7 emergency plumbing across Chester County.'],
      ['question' => 'Do you offer same-day plumbing service?',         'answer' => 'Yes — for most common repairs and water heater issues, we offer same-day service. Call (267) 300-4526 and we will do our best to get a technician to you quickly.'],
      ['question' => 'Are you licensed for plumbing in Pennsylvania?',  'answer' => 'Yes. Van Fleet Services LLC is licensed and insured for plumbing in Pennsylvania. License details: PA HIC #PA156506 and MP-23-14.'],
    ],
  ],

  /* ── WATER HEATERS ──────────────────────────────────────── */
  [
    'title'           => 'Water Heaters',
    'slug'            => 'electrical/water-heaters',
    'image'           => '2020/03/slide2.jpg',
    'image_alt'       => 'Water heater service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'water heater repair replacement Chester County PA',
    'description'     => 'No hot water? Van Fleet repairs and replaces tank and tankless water heaters fast — often the same day — with upfront, flat-rate pricing.',
    'cta'             => 'Get Water Heater Help',
    'features'        => [
      'Tank water heater repair and replacement',
      'Tankless water heater installation',
      'No hot water — same-day service',
      'All brands and models serviced',
      'Gas and electric units',
      'Sediment flush and anode rod service',
    ],
    'faqs'            => [
      ['question' => 'How long does a water heater last?',      'answer' => 'Most tank heaters last 8–12 years; tankless units can last 20 or more. If yours is over 10 years and failing, replacement is often the smarter investment.'],
      ['question' => 'Repair or replace — which is better?',    'answer' => 'We give you an honest recommendation based on the unit\'s age, the cost of repair, and your hot-water needs. No upselling.'],
      ['question' => 'Do you offer same-day water heater service?', 'answer' => 'Yes — for most water heater repairs and replacements in Chester County, we offer same-day service. Call (267) 300-4526.'],
    ],
  ],

  /* ── WATER HEATER INSTALLATIONS ─────────────────────────── */
  [
    'title'           => 'Water Heater Installations',
    'slug'            => 'electrical/water-heater-installations',
    'image'           => '2026/04/water-heater-isntallation.webp',
    'image_alt'       => 'Water heater installation — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'water heater installation Chester County PA',
    'description'     => 'New construction or replacement install — Van Fleet handles full water heater installations with same-day availability and upfront flat-rate pricing.',
    'cta'             => 'Schedule Water Heater Installation',
    'features'        => [
      'Tank water heater installation',
      'Same-day installation available',
      'All major brands and sizes',
      'Gas and electric models',
      'Old unit removal and disposal',
      'Code-compliant installation',
    ],
    'faqs'            => [
      ['question' => 'How long does water heater installation take?',      'answer' => 'Most standard installations take 2–4 hours. We handle removal of the old unit and cleanup.'],
      ['question' => 'What size water heater do I need?',                  'answer' => 'We assess your household size and hot-water usage and recommend the right tank size. No oversizing or underselling.'],
      ['question' => 'Do you offer same-day water heater installation?',   'answer' => 'Yes — for most jobs, we can install a new water heater the same day you call, depending on parts availability.'],
    ],
  ],

  /* ── TANKLESS WATER HEATERS ─────────────────────────────── */
  [
    'title'           => 'Tankless Water Heaters',
    'slug'            => 'plumbing/tankless-water-heaters',
    'image'           => '2026/06/tankless-water-heater-vanfleet-services.png',
    'image_alt'       => 'Tankless water heater installation — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'tankless water heater installation Chester County PA',
    'description'     => 'Upgrade to endless hot water. Van Fleet installs and services tankless water heaters with same-day availability and flat-rate pricing.',
    'cta'             => 'Ask About Tankless Water Heaters',
    'features'        => [
      'Tankless water heater installation',
      'Conversion from tank systems',
      'Endless on-demand hot water',
      'Energy-efficient upgrade option',
      'Gas and electric models',
      'Annual descaling and service',
    ],
    'faqs'            => [
      ['question' => 'Is tankless worth it over a tank heater?',       'answer' => 'Tankless heaters provide endless hot water, use less energy, and last longer. They cost more upfront but often save money over time. We help you decide what fits your home.'],
      ['question' => 'How long does a tankless installation take?',     'answer' => 'Most installations take 3–5 hours. If gas line upgrades or venting changes are needed, it may take longer.'],
      ['question' => 'Do tankless water heaters need maintenance?',     'answer' => 'Yes — annual descaling keeps performance high and prevents mineral buildup, especially in areas with hard water like Chester County.'],
    ],
  ],

  /* ── EV CHARGER INSTALLATION ────────────────────────────── */
  [
    'title'           => 'EV Charger Installation',
    'slug'            => 'electrical/ev-charger-installation',
    'image'           => '2026/03/Electrical-Services.webp',
    'image_alt'       => 'EV charger installation — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'EV charger installation Chester County PA',
    'description'     => 'Charge at home the right way. Van Fleet installs Level 2 EV chargers with licensed electrical work, permit handling, and upfront pricing.',
    'cta'             => 'Schedule EV Charger Installation',
    'features'        => [
      'Level 2 home EV charger installation',
      'Panel capacity assessment',
      'Permit handling included',
      'All major charger brands supported',
      'Dedicated circuit installation',
      'Code-compliant licensed electrical work',
    ],
    'faqs'            => [
      ['question' => 'What is a Level 2 EV charger?',                       'answer' => 'A Level 2 charger uses a 240V circuit and charges most EVs overnight. It is 4–8× faster than a standard 120V outlet — the right solution for home charging.'],
      ['question' => 'Do I need a permit for EV charger installation?',      'answer' => 'Usually yes. We handle the permit process and ensure the installation meets local electrical codes.'],
      ['question' => 'Will my existing panel support an EV charger?',        'answer' => 'We assess your panel capacity during the estimate. If an upgrade is needed, we give you a clear quote before any work begins.'],
    ],
  ],

  /* ── SERVICE PANEL INSTALLATION ─────────────────────────── */
  [
    'title'           => 'Service Panel Installation',
    'slug'            => 'electrical/service-panel-installation',
    'image'           => '2026/06/service-panel-installation-vanfleet-services.png',
    'image_alt'       => 'Service panel installation — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'electrical service panel installation Chester County PA',
    'description'     => 'Outdated panel or need more capacity? Van Fleet installs and upgrades electrical service panels safely, to code, with permit handling included.',
    'cta'             => 'Ask About Panel Installation',
    'features'        => [
      'Service panel replacement and upgrade',
      '100A to 200A service upgrades',
      'Sub-panel installation',
      'Breaker replacement and repair',
      'Permit handling included',
      'Code-compliant licensed work',
    ],
    'faqs'            => [
      ['question' => 'When does an electrical panel need to be upgraded?', 'answer' => 'Signs include frequently tripping breakers, a 60A or 100A panel in an older home, adding an EV charger, or a panel over 25–30 years old.'],
      ['question' => 'How long does a panel installation take?',           'answer' => 'Most panel upgrades take 4–8 hours. We coordinate the utility shutoff and inspection as needed.'],
      ['question' => 'Do you handle the permits for panel work?',          'answer' => 'Yes — we handle permit applications and coordinate with the local authority having jurisdiction so you don\'t have to.'],
    ],
  ],

  /* ── SUMP PUMPS ─────────────────────────────────────────── */
  [
    'title'           => 'Sump Pumps',
    'slug'            => 'plumbing/sump-pumps',
    'image'           => '2026/06/sumps-pumps-vanfleet-services.png',
    'image_alt'       => 'Sump pump service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'sump pump installation repair Chester County PA',
    'description'     => 'Protect your basement from flooding. Van Fleet installs, repairs, and replaces sump pumps fast — 24/7 emergency service available.',
    'cta'             => 'Schedule Sump Pump Service',
    'features'        => [
      'Sump pump repair and replacement',
      'Battery backup pump installation',
      'Float switch replacement',
      'Pit inspection and cleaning',
      'Storm-season readiness check',
      '24/7 emergency sump pump service',
    ],
    'faqs'            => [
      ['question' => 'How often should a sump pump be serviced?',         'answer' => 'We recommend an annual check, ideally before the spring rainy season. We test the pump, float, and discharge line.'],
      ['question' => 'Should I get a battery backup sump pump?',          'answer' => 'Yes — a battery backup protects you during power outages, which often coincide with the storms that cause basement flooding.'],
      ['question' => 'My sump pump is running constantly — is that bad?', 'answer' => 'Constant running often means a stuck float switch, a short discharge line, or a pump too small for your water table. Let us inspect it.'],
    ],
  ],

  /* ── WELL PUMPS ─────────────────────────────────────────── */
  [
    'title'           => 'Well Pumps',
    'slug'            => 'plumbing/well-pumps',
    'image'           => '2026/06/well-pumps-vanfleet-services.png',
    'image_alt'       => 'Well pump service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'well pump repair installation Chester County PA',
    'description'     => 'Lost water pressure or no water at all? Van Fleet diagnoses and repairs well pumps fast with same-day service and flat-rate pricing.',
    'cta'             => 'Request Well Pump Service',
    'features'        => [
      'Well pump troubleshooting and repair',
      'Submersible pump replacement',
      'Pressure tank service',
      'No-water emergency diagnosis',
      'Electrical connections and controls',
      'Pump controller and switch repair',
    ],
    'faqs'            => [
      ['question' => 'Why do I suddenly have no water from my well?',  'answer' => 'The most common causes are a failed well pump, a tripped circuit breaker, a blown pressure switch, or a failed pressure tank. We diagnose all of these.'],
      ['question' => 'How long does well pump replacement take?',       'answer' => 'Most submersible pump replacements take 3–5 hours depending on the well depth and access.'],
      ['question' => 'Do you offer emergency well pump service?',       'answer' => 'Yes — a well pump failure means no water, so we treat it as an emergency and dispatch as quickly as possible.'],
    ],
  ],

  /* ── WATER SOFTENER ─────────────────────────────────────── */
  [
    'title'           => 'Water Softener',
    'slug'            => 'plumbing/water-softener',
    'image'           => '2026/06/water-softeners-vanfleet-services.png',
    'image_alt'       => 'Water softener service — Van Fleet Services',
    'type'            => 'service',
    'parent'          => null,
    'primary_keyword' => 'water softener installation Chester County PA',
    'description'     => 'Hard water damaging your pipes and appliances? Van Fleet installs and services water softeners with upfront pricing and same-day availability.',
    'cta'             => 'Request Water Softener Service',
    'features'        => [
      'Water softener installation',
      'Water softener repair and replacement',
      'Whole-home soft water solution',
      'Hard water assessment',
      'Salt-based and salt-free systems',
      'System setup and programming',
    ],
    'faqs'            => [
      ['question' => 'Do I need a water softener in Chester County?',      'answer' => 'Chester County has moderately hard water. A softener protects pipes, appliances, and water heaters from mineral buildup and extends their lifespan.'],
      ['question' => 'How long does water softener installation take?',    'answer' => 'Most installs take 2–3 hours. We size the system to your household and water hardness level.'],
      ['question' => 'Does a water softener need maintenance?',            'answer' => 'Salt-based systems need regular salt refills. We can set up a maintenance plan or service your existing softener.'],
    ],
  ],

];
