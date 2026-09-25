<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Bath & Blow Dry service page) ---------- */
$currentPage     = 'services';
$pageType        = 'service';
$serviceSlug     = 'bath-blow-dry';
$pageTitle       = "Dog Bath & Blow Dry in Franklin, OH | Dog Lady's Pet Camp";
$pageDescription = "Professional dog bath and blow dry service in Franklin, Ohio. Leaves your dog clean, fresh, and comfortable. Call (937) 743-9956 to book.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/bath-blow-dry/';

/* Hero image */
/* CLIENT PHOTO SLOT — this page uses the photo-free .hero--interior variant
   (only one client photo exists and it is used once, on the homepage hero).
   When a photo for this service arrives, add it to /assets/images/ with
   -480/-960/-1600 webp+avif variants and switch the hero to .hero-grid--visual
   with a <picture> (loading="eager" fetchpriority="high", alt mentioning Franklin, OH). */

/* Service-specific FAQs */
$serviceFaqs = [
    [
        'q' => "How much does a dog bath and blow dry cost?",
        'a' => "Dog bath and blow dry at Dog Lady's Pet Camp starts at $30 and varies based on your dog's size and coat type. Call (937) 743-9956 for an exact quote for your dog.",
    ],
    [
        'q' => "What's included in a bath and blow dry?",
        'a' => "The service includes a deep-clean bath with professional dog shampoo, a thorough rinse, and a full blow dry that leaves your dog's coat clean, fresh, and fully dry. Nails are not trimmed unless you add that service.",
    ],
    [
        'q' => "Do you offer bath and blow dry without a haircut?",
        'a' => "Yes. Bath and blow dry is a standalone service for dogs who don't need a full grooming or haircut. It's perfect for short-haired breeds or dogs between full grooming appointments.",
    ],
    [
        'q' => "How long does a bath and blow dry take?",
        'a' => "A bath and blow dry typically takes 1 to 1.5 hours, depending on your dog's size, coat thickness, and how much they tolerate the blow dryer. April works at a pace that keeps your dog calm.",
    ],
];

/* Service schema */
$serviceData = [
    'name' => 'Bath & Blow Dry',
    'description' => 'Professional dog bath and blow dry service that leaves your dog clean, fresh, and comfortable.',
];
$schemaMarkup = generateServiceSchema($serviceData);

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
            'name' => 'Bath & Blow Dry',
            'item' => $canonicalUrl
        ]
    ]
];
$schemaMarkup .= '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

/* FAQ schema */
$schemaMarkup .= generateFAQSchema($serviceFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="bath-page-styles">
  .bath-hero { background: var(--color-paper); }
  .bath-details .detail-card { background: var(--color-surface); padding: var(--space-xl); border-radius: var(--radius-lg); margin-top: var(--space-lg); }
  .bath-details .detail-card h3 { font-size: var(--fs-lg); margin-bottom: var(--space-md); color: var(--color-ink); }
  .bath-details .detail-card ul { list-style: none; padding: 0; display: grid; gap: var(--space-sm); }
  .bath-details .detail-card li { display: flex; gap: var(--space-sm); align-items: start; color: var(--color-ink-2); }
  .bath-details .detail-card li svg { color: var(--color-accent); flex-shrink: 0; margin-top: 0.15rem; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior bath-hero section">
    <div class="container">
      <div class="hero-grid hero-grid--form">

        <div class="hero-copy">
          <p class="eyebrow">Dog Bath & Blow Dry</p>
          <h1>Dog Bath & Blow Dry in <span class="text-accent">Franklin, OH</span></h1>
          <p class="hero-answer">
            Dog Lady's Pet Camp offers professional dog bath and blow dry service in Franklin, Ohio. A thorough bath and full blow dry leave your dog clean, fresh, and comfortable—without a full grooming or haircut if they don't need one.
          </p>

          <div class="hero-actions">
            <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>
              <?php icon('droplets', 20); ?>
              Book Bath Service
            </button>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
              <?php icon('phone', 20); ?>
              Call <?php echo $phone; ?>
            </a>
          </div>

          <div class="hero-chips">
            <span class="chip">Professional Dog Shampoo</span>
            <span class="chip">Full Blow Dry</span>
            <span class="chip">All Breeds Welcome</span>
          </div>
        </div>

        <!-- Hero form card (desktop) -->
        <aside class="hero-form-card">
          <h3>Book Bath & Blow Dry</h3>
          <form action="<?php echo $formAction; ?>" method="POST" class="hero-form">
            <div class="form-row">
              <div class="form-field">
                <input type="text" name="name" id="bath-name" required autocomplete="name">
                <label for="bath-name">Your Name</label>
              </div>
              <div style="display:contents">
                <div class="form-field">
                  <input type="tel" name="phone" id="bath-phone" required autocomplete="tel">
                  <label for="bath-phone">Phone</label>
                </div>
                <div class="form-field">
                  <input type="email" name="email" id="bath-email" required autocomplete="email">
                  <label for="bath-email">Email</label>
                </div>
              </div>
            </div>
            <div class="form-row" style="grid-template-columns: 1.2fr 1fr">
              <div class="form-field">
                <select name="service" id="bath-service" required>
                  <option value="" disabled selected></option>
                  <option value="Bath & Blow Dry" selected>Bath & Blow Dry</option>
                  <?php foreach ($services as $svc): if ($svc['slug'] !== 'bath-blow-dry'): ?>
                  <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                  <?php endif; endforeach; ?>
                </select>
                <label for="bath-service">Service Needed</label>
              </div>
              <button type="submit" class="btn btn-primary" style="grid-row:2;margin-top:0;min-height:46px">
                Send Request
              </button>
            </div>

            <!-- TCPA consent -->
            <div class="form-consent-fieldset" style="grid-column:1/-1;margin-top:var(--space-sm)">
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

            <p class="form-footnote" style="grid-column:1/-1;margin-top:var(--space-xs)">
              We'll contact you within 24 hours to schedule your appointment.
            </p>

            <!-- Hidden fields -->
            <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
            <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you/">
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="consent_version" value="v2.1">
            <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <?php echo p1_attribution_fields('hero'); ?>
          </form>
        </aside>

      </div>
    </div>
  </section>

  <!-- Service Details Section -->
  <section class="section bath-details">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">What's Included</p>
        <h2>What does a dog bath and blow dry include?</h2>
        <p class="answer-block">
          A dog bath and blow dry at Dog Lady's Pet Camp includes a deep-clean bath with professional dog shampoo, a thorough rinse, and a full blow dry that leaves your dog's coat completely dry and fluffy. The service is perfect for dogs who need a bath but don't need a haircut.
        </p>
      </div>

      <div class="detail-card">
        <h3>The Bath</h3>
        <ul>
          <li>
            <?php icon('check', 20); ?>
            <span>Professional dog shampoo chosen for your dog's coat type and skin condition</span>
          </li>
          <li>
            <?php icon('check', 20); ?>
            <span>Deep scrub that removes dirt, oil, and odors</span>
          </li>
          <li>
            <?php icon('check', 20); ?>
            <span>Thorough rinse to remove all shampoo residue</span>
          </li>
          <li>
            <?php icon('check', 20); ?>
            <span>Gentle handling that keeps anxious dogs calm</span>
          </li>
        </ul>
      </div>

      <div class="detail-card">
        <h3>The Blow Dry</h3>
        <ul>
          <li>
            <?php icon('check', 20); ?>
            <span>Full blow dry that leaves the coat completely dry, not damp</span>
          </li>
          <li>
            <?php icon('check', 20); ?>
            <span>Brush-out during drying to remove loose fur and prevent mats</span>
          </li>
          <li>
            <?php icon('check', 20); ?>
            <span>Adjusted air pressure and temperature for your dog's comfort</span>
          </li>
          <li>
            <?php icon('check', 20); ?>
            <span>Breaks when needed for dogs who find the dryer stressful</span>
          </li>
        </ul>
      </div>

      <div class="prose" style="margin-top:var(--space-2xl)">
        <p>
          Bath and blow dry is a standalone service. It does not include nail trimming, ear cleaning, or haircuts. If you want those services, ask about full-service grooming instead.
        </p>
        <p>
          This service works well for short-haired breeds like Beagles, Boxers, and Labs, who don't need regular haircuts but benefit from a professional bath and thorough drying. It's also a good option for double-coated breeds between full grooming appointments, when they need a bath but don't need clipping.
        </p>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section faq-section" style="background:var(--color-paper)">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">Common Questions</p>
        <h2>Bath & Blow Dry FAQs</h2>
      </div>

      <div class="faq-list" style="margin-top:var(--space-2xl)">
        <?php foreach ($serviceFaqs as $faq): ?>
        <details class="faq-item">
          <summary>
            <h3><?php echo htmlspecialchars($faq['q']); ?></h3>
            <?php icon('chevron-down', 20); ?>
          </summary>
          <div class="faq-answer">
            <p><?php echo htmlspecialchars($faq['a']); ?></p>
          </div>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section cta-band" style="background:var(--color-ink);color:var(--color-paper)">
    <div class="container">
      <div class="cta-content" style="max-width:56ch;margin:0 auto;text-align:center">
        <h2 style="color:var(--color-paper)">Ready to Book a Bath & Blow Dry?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> or fill out the form above to schedule your dog's bath.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Book Bath Service</button>
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
    <h3>Book Bath & Blow Dry</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-bath-name" required autocomplete="name">
      <label for="dialog-bath-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-bath-phone" required autocomplete="tel">
      <label for="dialog-bath-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-bath-email" required autocomplete="email">
      <label for="dialog-bath-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-bath-service" required>
        <option value="" disabled selected></option>
        <option value="Bath & Blow Dry" selected>Bath & Blow Dry</option>
        <?php foreach ($services as $svc): if ($svc['slug'] !== 'bath-blow-dry'): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endif; endforeach; ?>
      </select>
      <label for="dialog-bath-service">Service Needed</label>
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
