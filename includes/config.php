<?php
/**
 * includes/config.php — single source of truth for site-wide variables.
 * Populated from build-plan.json (Phase 1 scaffold). Framework files read
 * these; per-page files set their own $pageTitle/$metaDescription/$canonicalUrl
 * before including head.php.
 */

/* ---------- Identity ---------- */
$slug        = 'dog-ladys-pet-camp';              // MUST equal the build directory name
$siteName    = "Dog Lady's Pet Camp";
$tagline     = 'Dogs-only boarding & grooming in Franklin, Ohio';
$ownerName   = 'April Davidson';
$tier        = 'basic';                            // build-plan.json tier — gates nav/footer sections
$industry    = 'other';                            // pet boarding & grooming (dogs only)
$description = "Dog Lady's Pet Camp is a dogs-only boarding and grooming facility at 4265 Pennyroyal Rd in Franklin, Ohio, serving Franklin-area pet owners since 2000. Services include overnight kennel boarding and professional dog grooming for dogs of all breeds and sizes.";

/* ---------- Domain / URLs ---------- */
// build-plan.json has no production_domain → default to the preview host.
$domain   = 'dog-ladys-pet-camp.pageone.cloud';
$siteUrl  = 'https://' . $domain;                  // always a valid absolute URL
// NOTE: $canonicalUrl is intentionally NOT set here — each page sets it
// ($siteUrl . path) before including head.php.

/* ---------- Contact ---------- */
$phone          = '(937) 743-9956';
$phoneSecondary = '';
$phoneDigits    = '+19377439956';                  // for tel:/sms: links
$email          = 'dogladyspetcamp@yahoo.com';

$address = [
    'street' => '4265 Pennyroyal Rd',
    'city'   => 'Franklin',
    'state'  => 'OH',
    'zip'    => '45005',
];

$businessHours = '';                               // not supplied in intake — leave blank
$acceptsSms    = false;                            // integrations.accepts_sms is null → treat as not accepted

/* ---------- Keywords ---------- */
$primaryKeyword    = 'dog boarding Franklin OH';
$secondaryKeywords = [
    'dog grooming Franklin Ohio',
    'dog kennel Springboro',
    'pet boarding near me',
];

/* ---------- Services ---------- */
// Master service list from build-plan.json services[]. Slugs match the
// directory/index.php pages later phases build.
$services = [
    [
        'name'        => 'Dog Boarding (Overnight Kennel)',
        'slug'        => 'dog-boarding-overnight-kennel',
        'description' => 'Comfortable overnight kennel boarding for dogs of all breeds and sizes, with fresh water, regular potty breaks, and a quiet evening routine.',
        'keywords'    => 'dog boarding (overnight kennel) Franklin OH',
    ],
    [
        'name'        => 'Dog Grooming',
        'slug'        => 'dog-grooming',
        'description' => 'Professional full-service dog grooming for every breed and coat type, from a Franklin groomer with decades of hands-on experience.',
        'keywords'    => 'dog grooming Franklin OH',
    ],
    [
        'name'        => 'Bath & Blow Dry',
        'slug'        => 'bath-blow-dry',
        'description' => 'A thorough bath and full blow-dry that leaves your dog clean, fresh, and comfortable.',
        'keywords'    => 'bath & blow dry Franklin OH',
    ],
    [
        'name'        => 'Brush-Out & Undercoat Removal',
        'slug'        => 'brush-out-undercoat-removal',
        'description' => 'Deep brush-out and undercoat removal to cut shedding and keep double-coated dogs comfortable.',
        'keywords'    => 'brush-out & undercoat removal Franklin OH',
    ],
    [
        'name'        => 'Nail Trimming',
        'slug'        => 'nail-trimming',
        'description' => 'Quick, low-stress nail trims to keep your dog walking comfortably.',
        'keywords'    => 'dog nail trimming Franklin OH',
    ],
];

/* ---------- Service areas ---------- */
$serviceAreas = [
    'Franklin',
    'Springboro',
    'Middletown',
    'Carlisle',
    'Lebanon',
    'Miamisburg',
];

/* ---------- Social ---------- */
// No social platform profiles supplied in intake.
$socialLinks = [];

/* ---------- Google Business Profile / maps ---------- */
$gbpPlaceId       = 'ChIJixajeeRhQIgR5k4knnGLPSs';
$gbpUrl           = 'https://maps.google.com/?cid=3115799837310996198';
$directionsUrl    = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJixajeeRhQIgR5k4knnGLPSs';
$reviewRequestUrl = 'https://search.google.com/local/writereview?placeid=ChIJixajeeRhQIgR5k4knnGLPSs';
$gbpMapEmbed      = '';                             // integrations.gbp_map_embed is null

/* ---------- Analytics ---------- */
$googleAnalyticsId = 'G-XXXXXXXXXX';                // placeholder — replace at launch

/* ---------- Brand colors ----------
 * No logo supplied (assets.logo is null) and design.colors carries no concrete
 * values, so these are provisional warm/human pet-care defaults. Phase 2 design
 * analysis must confirm or replace them before the palette is locked.
 */
$colors = [
    'primary'   => '#2F6E63',   // deep teal-green
    'secondary' => '#E8A44C',   // warm amber
    'accent'    => '#C24E3A',   // clay red
];

/* ---------- Company history ---------- */
$yearEstablished = 2000;                            // "serving Franklin-area pet owners since 2000"
$yearsInBusiness = 26;                              // content.years

/* ---------- Cache / assets ---------- */
$cssVersion = '1';   // SINGLE source of the framework.css cache-bust — bump on every framework.css change; pages must NEVER set their own.

/* ---------- Lead form ---------- */
$formAction = 'https://db.pageone.cloud/functions/v1/leads/dog-ladys-pet-camp';

/* ---------- Lead attribution (v6.3) ---------- */
require_once __DIR__ . '/attribution.php';
