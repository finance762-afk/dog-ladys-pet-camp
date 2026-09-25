<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Services listing page) ---------- */
$currentPage     = 'services';
$pageType        = 'other';
$pageTitle       = "Dog Boarding & Grooming Services in Franklin, OH | Dog Lady's Pet Camp";
$pageDescription = "Full list of dog boarding and grooming services at Dog Lady's Pet Camp in Franklin, Ohio. Overnight boarding, full grooming, bath & blow dry, undercoat removal, and nail trimming.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/services/';

/* Breadcrumb schema */
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => $siteUrl . '/'
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Services',
            'item' => $canonicalUrl
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="services-page-styles">
  .services-hero { background: var(--color-surface); min-height: 380px; }
  .services-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--space-xl); margin-top: var(--space-2xl); }
  .service-card-with-image { background: var(--color-paper); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow); transition: transform 0.2s, box-shadow 0.2s; }
  .service-card-with-image:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
  .service-card__image { position: relative; width: 100%; aspect-ratio: 16/10; overflow: hidden; }
  /* Branded covers — a brand-coloured panel with the service icon stands in for a photo */
  .svc-cover { position: absolute; inset: 0; display: grid; place-items: center; overflow: hidden; }
  .svc-cover svg { width: 76px; height: 76px; color: rgba(255,255,255,.94); position: relative; z-index: 1; }
  .svc-cover::before { content: ""; position: absolute; inset: 0; background: radial-gradient(130% 120% at 12% 0%, rgba(255,255,255,.22), transparent 55%); }
  .svc-cover::after { content: ""; position: absolute; right: -30px; bottom: -30px; width: 150px; height: 150px; border: 18px solid rgba(255,255,255,.10); border-radius: 50%; }
  .svc-cover--1 { background: linear-gradient(140deg, color-mix(in srgb, var(--color-primary) 82%, black), var(--color-primary)); }
  .svc-cover--2 { background: linear-gradient(140deg, var(--color-secondary), color-mix(in srgb, var(--color-secondary) 62%, black)); }
  .svc-cover--3 { background: linear-gradient(140deg, var(--color-accent), var(--color-accent-dark)); }
  .service-card__body { padding: var(--space-lg); }
  .service-card__icon { color: var(--color-accent); margin-bottom: var(--space-sm); }
  .service-card__body h3 { font-size: var(--fs-lg); font-weight: 700; margin-bottom: var(--space-sm); color: var(--color-ink); }
  .service-card__desc { color: var(--color-ink-2); margin-bottom: var(--space-md); line-height: 1.6; }
  .service-card__body ul { list-style: none; padding: 0; margin-bottom: var(--space-md); display: grid; gap: var(--space-xs); }
  .service-card__body li { font-size: var(--fs-sm); color: var(--color-ink-2); display: flex; gap: var(--space-xs); align-items: start; }
  .service-card__body li svg { color: var(--color-accent); flex-shrink: 0; margin-top: 0.15rem; }
  .service-card__cta { display: inline-flex; align-items: center; gap: var(--space-xs); font-weight: 600; color: var(--color-accent); text-decoration: none; transition: gap 0.2s; }
  .service-card__cta:hover { gap: var(--space-sm); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior services-hero section">
    <div class="container">
      <div class="hero-copy" style="max-width:65ch;margin:0 auto;text-align:center">
        <p class="eyebrow">What We Do</p>
        <h1>Dog Boarding & Grooming Services in <span class="text-accent">Franklin, Ohio</span></h1>
        <p class="hero-answer">
          Dog Lady's Pet Camp offers overnight kennel boarding and professional dog grooming for dogs of all breeds and sizes in Franklin, Ohio. Every service is owner-operated by April Davidson, who has 29 years of hands-on grooming and veterinary-aide experience.
        </p>

        <div class="hero-actions" style="justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-primary btn-lg" data-open-estimate>
            <?php icon('calendar', 20); ?>
            Book a Service
          </button>
          <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
            <?php icon('phone', 20); ?>
            Call <?php echo $phone; ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Grid Section -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">All Services</p>
        <h2>What dog boarding and grooming services do you offer?</h2>
        <p class="answer-block">
          Dog Lady's Pet Camp offers overnight kennel boarding, full-service dog grooming, bath and blow dry, brush-out and undercoat removal, and nail trimming. All services are available for dogs of every breed and size, and all are owner-operated by April Davidson.
        </p>
      </div>

      <?php /* CLIENT PHOTO SLOT — services hub cards.
               One client photo exists today (used once, on the homepage hero), so each
               card shows a branded icon panel. When April sends photos, replace each
               .svc-cover span with a <picture> (avif source + webp srcset from
               /assets/images/<name>-480/-960/-1600, width="640" height="400",
               loading="lazy" decoding="async", alt mentioning Franklin, OH). */ ?>
      <div class="services-grid">

        <!-- Dog Boarding Card -->
        <article class="service-card-with-image card-tint-1">
          <div class="service-card__image">
            <span class="svc-cover svc-cover--1" aria-hidden="true"><?php icon('home', 76); ?></span>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon">
              <?php icon('home', 32); ?>
            </div>
            <h3>Dog Boarding (Overnight Kennel)</h3>
            <p class="service-card__desc">Comfortable overnight kennel boarding for dogs of all breeds and sizes.</p>
            <ul>
              <li><?php icon('check', 16); ?> <span>Fresh water & regular breaks</span></li>
              <li><?php icon('check', 16); ?> <span>Quiet evening routine</span></li>
              <li><?php icon('check', 16); ?> <span>All breeds & sizes welcome</span></li>
            </ul>
            <a href="/dog-boarding-overnight-kennel/" class="service-card__cta">
              Learn More <?php icon('arrow-right', 18); ?>
            </a>
          </div>
        </article>

        <!-- Dog Grooming Card -->
        <article class="service-card-with-image card-tint-2">
          <div class="service-card__image">
            <span class="svc-cover svc-cover--2" aria-hidden="true"><?php icon('scissors', 76); ?></span>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon">
              <?php icon('scissors', 32); ?>
            </div>
            <h3>Dog Grooming</h3>
            <p class="service-card__desc">Full-service grooming for every breed and coat type.</p>
            <ul>
              <li><?php icon('check', 16); ?> <span>Breed-specific styling</span></li>
              <li><?php icon('check', 16); ?> <span>Every coat type</span></li>
              <li><?php icon('check', 16); ?> <span>Decades of experience</span></li>
            </ul>
            <a href="/dog-grooming/" class="service-card__cta">
              Learn More <?php icon('arrow-right', 18); ?>
            </a>
          </div>
        </article>

        <!-- Bath & Blow Dry Card -->
        <article class="service-card-with-image card-tint-3">
          <div class="service-card__image">
            <span class="svc-cover svc-cover--3" aria-hidden="true"><?php icon('droplets', 76); ?></span>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon">
              <?php icon('droplets', 32); ?>
            </div>
            <h3>Bath & Blow Dry</h3>
            <p class="service-card__desc">A thorough bath and full blow-dry that leaves your dog fresh and clean.</p>
            <ul>
              <li><?php icon('check', 16); ?> <span>Deep-clean bath</span></li>
              <li><?php icon('check', 16); ?> <span>Full blow-dry finish</span></li>
              <li><?php icon('check', 16); ?> <span>Gentle, low-stress</span></li>
            </ul>
            <a href="/bath-blow-dry/" class="service-card__cta">
              Learn More <?php icon('arrow-right', 18); ?>
            </a>
          </div>
        </article>

        <!-- Brush-Out & Undercoat Removal Card -->
        <article class="service-card-with-image card-tint-1">
          <div class="service-card__image">
            <span class="svc-cover svc-cover--1" aria-hidden="true"><?php icon('layers', 76); ?></span>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon">
              <?php icon('layers', 32); ?>
            </div>
            <h3>Brush-Out & Undercoat Removal</h3>
            <p class="service-card__desc">Deep brush-out and undercoat removal that cuts shedding at home.</p>
            <ul>
              <li><?php icon('check', 16); ?> <span>Less shedding at home</span></li>
              <li><?php icon('check', 16); ?> <span>Great for double coats</span></li>
              <li><?php icon('check', 16); ?> <span>Keeps dogs comfortable</span></li>
            </ul>
            <a href="/brush-out-undercoat-removal/" class="service-card__cta">
              Learn More <?php icon('arrow-right', 18); ?>
            </a>
          </div>
        </article>

        <!-- Nail Trimming Card -->
        <article class="service-card-with-image card-tint-2">
          <div class="service-card__image">
            <span class="svc-cover svc-cover--2" aria-hidden="true"><?php icon('check-circle', 76); ?></span>
          </div>
          <div class="service-card__body">
            <div class="service-card__icon">
              <?php icon('check-circle', 32); ?>
            </div>
            <h3>Nail Trimming</h3>
            <p class="service-card__desc">Quick, calm nail trims that keep your dog walking comfortably.</p>
            <ul>
              <li><?php icon('check', 16); ?> <span>Fast & low-stress</span></li>
              <li><?php icon('check', 16); ?> <span>Steady, gentle handling</span></li>
              <li><?php icon('check', 16); ?> <span>Add-on or standalone</span></li>
            </ul>
            <a href="/nail-trimming/" class="service-card__cta">
              Learn More <?php icon('arrow-right', 18); ?>
            </a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section cta-band" style="background:var(--color-ink);color:var(--color-paper)">
    <div class="container">
      <div class="cta-content" style="max-width:56ch;margin:0 auto;text-align:center">
        <h2 style="color:var(--color-paper)">Ready to Book a Service?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> to book boarding, grooming, or any of our services. April will answer your questions and find a time that works for you.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Book a Service</button>
          <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
            <?php icon('phone', 20); ?>
            <?php echo $phone; ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- Estimate Dialog (mobile form) -->
<dialog id="estimate-dialog" class="estimate-dialog">
  <div class="dialog-header">
    <h3>Book a Service</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-services-name" required autocomplete="name">
      <label for="dialog-services-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-services-phone" required autocomplete="tel">
      <label for="dialog-services-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-services-email" required autocomplete="email">
      <label for="dialog-services-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-services-service" required>
        <option value="" disabled selected></option>
        <?php foreach ($services as $svc): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endforeach; ?>
      </select>
      <label for="dialog-services-service">Service Needed</label>
    </div>

    <!-- TCPA consent -->
    <div class="form-consent-fieldset">
      <label class="form-consent-item">
        <input type="checkbox" name="email_opt_in" value="yes">
        <span>I'd like to receive email updates from <?php echo htmlspecialchars($siteName); ?>.</span>
      </label>
      <?php if ($acceptsSms): ?>
      <label class="form-consent-item">
        <input type="checkbox" name="sms_opt_in" value="yes">
        <span>I consent to receive SMS text messages. Consent is not required. Message and data rates may apply. Reply STOP to unsubscribe.</span>
      </label>
      <?php endif; ?>
      <label class="form-consent-item">
        <input type="checkbox" name="terms_accepted" value="yes" required>
        <span>I agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms</a>. *</span>
      </label>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Send Request</button>

    <!-- Hidden fields -->
    <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
    <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you/">
    <input type="hidden" name="_captcha" value="false">
    <input type="hidden" name="consent_version" value="v2.1">
    <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
    <?php echo p1_attribution_fields('dialog'); ?>
  </form>
</dialog>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
