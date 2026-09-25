<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Nail Trimming service page) ---------- */
$currentPage     = 'services';
$pageType        = 'service';
$serviceSlug     = 'nail-trimming';
$pageTitle       = "Dog Nail Trimming in Franklin, OH | Dog Lady's Pet Camp";
$pageDescription = "Quick, low-stress dog nail trimming in Franklin, Ohio. Standalone service or add-on to grooming. Call (937) 743-9956 to book.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/nail-trimming/';

/* Hero image */
/* CLIENT PHOTO SLOT — this page uses the photo-free .hero--interior variant
   (only one client photo exists and it is used once, on the homepage hero).
   When a photo for this service arrives, add it to /assets/images/ with
   -480/-960/-1600 webp+avif variants and switch the hero to .hero-grid--visual
   with a <picture> (loading="eager" fetchpriority="high", alt mentioning Franklin, OH). */

/* Service-specific FAQs */
$serviceFaqs = [
    [
        'q' => "How much does dog nail trimming cost?",
        'a' => "Dog nail trimming at Dog Lady's Pet Camp is $15 as a standalone service. If added to a grooming or bath, it's included in the full-service price. Call (937) 743-9956 to book.",
    ],
    [
        'q' => "How often should I have my dog's nails trimmed?",
        'a' => "Most dogs need nail trims every 3 to 4 weeks. Active dogs who walk on pavement may wear their nails down naturally and need trims less often. April will recommend a schedule based on how fast your dog's nails grow.",
    ],
    [
        'q' => "Can you trim nails on anxious or aggressive dogs?",
        'a' => "Yes. April has decades of experience working with anxious and reactive dogs. She uses calm handling, works at the dog's pace, and can do partial trims over multiple visits if needed. Let her know your dog's triggers when you book.",
    ],
    [
        'q' => "Do you use clippers or a grinder?",
        'a' => "April typically uses clippers for nail trimming because most dogs tolerate them better than grinders. If your dog prefers a grinder, let April know when you book and she can use one instead.",
    ],
];

/* Service schema */
$serviceData = [
    'name' => 'Nail Trimming',
    'description' => 'Quick, low-stress nail trims that keep your dog walking comfortably. Standalone service or add-on to grooming.',
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
            'name' => 'Nail Trimming',
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
<style id="nails-page-styles">
  .nails-hero { background: var(--color-paper); }
  .nails-why .why-list { display: grid; gap: var(--space-md); margin-top: var(--space-xl); }
  .nails-why .why-item { display: flex; gap: var(--space-md); align-items: start; padding: var(--space-lg); background: var(--color-surface); border-radius: var(--radius); }
  .nails-why .why-item svg { color: var(--color-accent); flex-shrink: 0; margin-top: 0.2rem; }
  .nails-why .why-item h3 { font-size: var(--fs-base); font-weight: 700; margin-bottom: var(--space-xs); color: var(--color-ink); }
  .nails-why .why-item p { color: var(--color-ink-2); font-size: var(--fs-sm); line-height: 1.6; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior nails-hero section">
    <div class="container">
      <div class="hero-grid hero-grid--form">

        <div class="hero-copy">
          <p class="eyebrow">Nail Trimming Service</p>
          <h1>Dog Nail Trimming in <span class="text-accent">Franklin, OH</span></h1>
          <p class="hero-answer">
            Dog Lady's Pet Camp offers quick, low-stress nail trims that keep your dog walking comfortably. Nail trimming is available as a standalone service or an add-on to grooming in Franklin, Ohio.
          </p>

          <div class="hero-actions">
            <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>
              <?php icon('check-circle', 20); ?>
              Book Nail Trim
            </button>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
              <?php icon('phone', 20); ?>
              Call <?php echo $phone; ?>
            </a>
          </div>

          <div class="hero-chips">
            <span class="chip">Fast & Low-Stress</span>
            <span class="chip">$15 Standalone</span>
            <span class="chip">Calm Handling</span>
          </div>
        </div>

        <!-- Hero form card (desktop) -->
        <aside class="hero-form-card">
          <h3>Book Nail Trim</h3>
          <form action="<?php echo $formAction; ?>" method="POST" class="hero-form">
            <div class="form-row">
              <div class="form-field">
                <input type="text" name="name" id="nails-name" required autocomplete="name">
                <label for="nails-name">Your Name</label>
              </div>
              <div style="display:contents">
                <div class="form-field">
                  <input type="tel" name="phone" id="nails-phone" required autocomplete="tel">
                  <label for="nails-phone">Phone</label>
                </div>
                <div class="form-field">
                  <input type="email" name="email" id="nails-email" required autocomplete="email">
                  <label for="nails-email">Email</label>
                </div>
              </div>
            </div>
            <div class="form-row" style="grid-template-columns: 1.2fr 1fr">
              <div class="form-field">
                <select name="service" id="nails-service" required>
                  <option value="" disabled selected></option>
                  <option value="Nail Trimming" selected>Nail Trimming</option>
                  <?php foreach ($services as $svc): if ($svc['slug'] !== 'nail-trimming'): ?>
                  <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                  <?php endif; endforeach; ?>
                </select>
                <label for="nails-service">Service Needed</label>
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
  <section class="section nails-details">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">Why It Matters</p>
        <h2>Why is regular nail trimming important?</h2>
        <p class="answer-block">
          Regular nail trimming keeps your dog walking comfortably and prevents long nails from splitting, cracking, or growing into the paw pads. Overgrown nails force the dog to shift their weight unnaturally, which can cause joint pain and long-term damage to the feet and legs.
        </p>
      </div>

      <div class="prose" style="margin-top:var(--space-xl)">
        <p>
          Most dogs need nail trims every 3 to 4 weeks. If you hear your dog's nails clicking on the floor when they walk, they're too long. Long nails are uncomfortable, and they can split or crack if they catch on carpet or rough ground.
        </p>
        <p>
          April uses steady, calm handling that keeps anxious dogs from panicking. She's worked with thousands of dogs over 29 years, including reactive and fearful dogs who hate having their feet touched. If your dog has specific triggers, let April know when you book so she can work around them.
        </p>
        <p>
          Nail trimming is $15 as a standalone service, or it's included when you book full-service grooming or bath and blow dry.
        </p>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="section nails-why" style="background:var(--color-surface)">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">The Difference</p>
        <h2>What makes nail trimming at Dog Lady's Pet Camp different?</h2>
        <p class="answer-block">
          Nail trimming at Dog Lady's Pet Camp is done by owner April Davidson, who has 29 years of hands-on grooming experience. She uses calm, steady handling that keeps dogs relaxed, and she works at the dog's pace—not rushed.
        </p>
      </div>

      <div class="why-list">
        <div class="why-item">
          <?php icon('user-check', 24); ?>
          <div>
            <h3>Calm, Experienced Handling</h3>
            <p>
              April has trimmed nails on thousands of dogs, including anxious, fearful, and reactive dogs. She knows how to read body language and work at a pace that keeps your dog calm.
            </p>
          </div>
        </div>

        <div class="why-item">
          <?php icon('clock', 24); ?>
          <div>
            <h3>Quick Appointments</h3>
            <p>
              Nail trimming takes 10 to 15 minutes for most dogs. You can drop your dog off or wait—whatever works best for you.
            </p>
          </div>
        </div>

        <div class="why-item">
          <?php icon('shield-check', 24); ?>
          <div>
            <h3>No Forceful Restraint</h3>
            <p>
              April never forces a dog through a nail trim. If your dog is too stressed, she'll stop and recommend partial trims over multiple visits or a sedative from your vet for future appointments.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section faq-section">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">Common Questions</p>
        <h2>Nail Trimming FAQs</h2>
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
        <h2 style="color:var(--color-paper)">Ready to Book a Nail Trim?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> or fill out the form above to schedule a nail trim.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Book Nail Trim</button>
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
    <h3>Book Nail Trim</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-nails-name" required autocomplete="name">
      <label for="dialog-nails-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-nails-phone" required autocomplete="tel">
      <label for="dialog-nails-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-nails-email" required autocomplete="email">
      <label for="dialog-nails-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-nails-service" required>
        <option value="" disabled selected></option>
        <option value="Nail Trimming" selected>Nail Trimming</option>
        <?php foreach ($services as $svc): if ($svc['slug'] !== 'nail-trimming'): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endif; endforeach; ?>
      </select>
      <label for="dialog-nails-service">Service Needed</label>
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
