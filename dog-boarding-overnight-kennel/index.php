<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Dog Boarding service page) ---------- */
$currentPage     = 'services';
$pageType        = 'service';
$serviceSlug     = 'dog-boarding-overnight-kennel';
$pageTitle       = "Dog Boarding in Franklin, OH | Overnight Kennel | Dog Lady's Pet Camp";
$pageDescription = "Comfortable overnight kennel boarding for dogs of all breeds and sizes in Franklin, Ohio. Owner-operated by April Davidson since 2000. Call (937) 743-9956 to book.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/dog-boarding-overnight-kennel/';

/* Hero image */
$heroImage    = 'gbp-6-4622-9af7-147f52a3bb34.jpg';
$heroImageAlt = "Dog boarding facility at Dog Lady's Pet Camp in Franklin, Ohio";

/* Service-specific FAQs */
$serviceFaqs = [
    [
        'q' => "How much does overnight dog boarding cost in Franklin, OH?",
        'a' => "Overnight kennel boarding at Dog Lady's Pet Camp starts at $25 per night for most dogs. Pricing may vary based on the dog's size and any special needs. Call (937) 743-9956 for an exact quote tailored to your dog.",
    ],
    [
        'q' => "What's included in overnight kennel boarding?",
        'a' => "Overnight boarding includes a comfortable sleeping space, fresh water, regular potty breaks, and a quiet evening routine. Dogs are supervised by owner April Davidson, who has decades of experience caring for dogs of every breed and temperament.",
    ],
    [
        'q' => "Do you board dogs of all breeds and sizes?",
        'a' => "Yes. Dog Lady's Pet Camp welcomes dogs of all breeds and sizes, from small companions to large working breeds. The kennel is designed to keep every dog safe and comfortable, and boarding routines are matched to each dog's needs.",
    ],
    [
        'q' => "Can I tour the kennel before booking?",
        'a' => "Yes. Call (937) 743-9956 to schedule a visit. Seeing the facility firsthand helps you feel confident, and it lets April meet your dog and understand what keeps them calm and happy during their stay.",
    ],
    [
        'q' => "How do I prepare my dog for boarding?",
        'a' => "Bring your dog's food, any medications with clear instructions, and a familiar item like a blanket or toy if it helps them settle. Make sure your dog is up to date on vaccinations. Call ahead if your dog has any health or behavior concerns so April can prepare.",
    ],
    [
        'q' => "What are your boarding hours?",
        'a' => "Drop-off and pick-up times are arranged when you book. Dog Lady's Pet Camp works with your schedule to make boarding as smooth as possible. Call (937) 743-9956 to confirm availability and set your drop-off time.",
    ],
];

/* Service schema */
$serviceData = [
    'name' => 'Dog Boarding (Overnight Kennel)',
    'description' => 'Comfortable overnight kennel boarding for dogs of all breeds and sizes, with fresh water, regular potty breaks, and a quiet evening routine supervised by owner April Davidson.',
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
            'name' => 'Dog Boarding',
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
<style id="boarding-page-styles">
  .boarding-hero { background: var(--color-paper); min-height: 460px; }
  .boarding-hero .hero-visual__img { object-position: 50% 40%; }
  .boarding-process .process-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-xl); margin-top: var(--space-2xl); }
  .boarding-process .process-step { background: var(--color-surface); border: 1px solid var(--color-line); border-radius: var(--radius-lg); padding: var(--space-xl); position: relative; }
  .boarding-process .process-step::before {
    content: attr(data-step); position: absolute; top: calc(-1 * var(--space-md)); left: var(--space-lg);
    font-family: var(--font-heading); font-weight: 800; font-size: 2.8rem; color: var(--color-accent);
    opacity: 0.12; pointer-events: none;
  }
  .boarding-process .process-step h3 { font-size: var(--fs-lg); margin-bottom: var(--space-sm); color: var(--color-ink); }
  .boarding-process .process-step p { color: var(--color-ink-2); line-height: 1.6; }
  .boarding-why .why-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-lg); margin-top: var(--space-2xl); }
  .boarding-why .why-card { background: var(--color-surface); border-left: 3px solid var(--color-accent); padding: var(--space-lg); border-radius: var(--radius); }
  .boarding-why .why-card h3 { font-size: var(--fs-base); font-weight: 700; margin-bottom: var(--space-sm); color: var(--color-ink); display: flex; align-items: center; gap: var(--space-sm); }
  .boarding-why .why-card p { color: var(--color-ink-2); font-size: var(--fs-sm); line-height: 1.6; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior boarding-hero section">
    <div class="container">
      <div class="hero-grid hero-grid--form">

        <div class="hero-copy">
          <p class="eyebrow">Overnight Kennel Boarding</p>
          <h1>Dog Boarding in <span class="text-accent">Franklin, Ohio</span></h1>
          <p class="hero-answer">
            Dog Lady's Pet Camp offers comfortable overnight kennel boarding for dogs of all breeds and sizes in Franklin, Ohio. Owner April Davidson has cared for Franklin-area dogs since 2000, bringing decades of hands-on experience to every stay.
          </p>

          <div class="hero-actions">
            <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>
              <?php icon('calendar', 20); ?>
              Request Boarding Dates
            </button>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
              <?php icon('phone', 20); ?>
              Call <?php echo $phone; ?>
            </a>
          </div>

          <div class="hero-chips">
            <span class="chip">All Breeds & Sizes</span>
            <span class="chip">Owner-Operated Since 2000</span>
            <span class="chip">Dogs-Only Facility</span>
          </div>
        </div>

        <!-- Hero form card (desktop) -->
        <aside class="hero-form-card">
          <h3>Request Boarding Dates</h3>
          <form action="<?php echo $formAction; ?>" method="POST" class="hero-form">
            <div class="form-row">
              <div class="form-field">
                <input type="text" name="name" id="boarding-name" required autocomplete="name">
                <label for="boarding-name">Your Name</label>
              </div>
              <div style="display:contents">
                <div class="form-field">
                  <input type="tel" name="phone" id="boarding-phone" required autocomplete="tel">
                  <label for="boarding-phone">Phone</label>
                </div>
                <div class="form-field">
                  <input type="email" name="email" id="boarding-email" required autocomplete="email">
                  <label for="boarding-email">Email</label>
                </div>
              </div>
            </div>
            <div class="form-row" style="grid-template-columns: 1.2fr 1fr">
              <div class="form-field">
                <select name="service" id="boarding-service" required>
                  <option value="" disabled selected></option>
                  <option value="Dog Boarding (Overnight Kennel)" selected>Dog Boarding (Overnight Kennel)</option>
                  <?php foreach ($services as $svc): if ($svc['slug'] !== 'dog-boarding-overnight-kennel'): ?>
                  <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                  <?php endif; endforeach; ?>
                </select>
                <label for="boarding-service">Service Needed</label>
              </div>
              <button type="submit" class="btn btn-primary" style="grid-row:2;margin-top:0;min-height:46px">
                Send Request
              </button>
            </div>

            <!-- TCPA consent (v6.3 — THREE checkboxes) -->
            <div class="form-consent-fieldset" style="grid-column:1/-1;margin-top:var(--space-sm)">
              <label class="form-consent-item">
                <input type="checkbox" name="email_opt_in" value="yes">
                <span>I'd like to receive email updates and offers from <?php echo htmlspecialchars($siteName); ?>.</span>
              </label>
              <?php if ($acceptsSms): ?>
              <label class="form-consent-item">
                <input type="checkbox" name="sms_opt_in" value="yes">
                <span>I consent to receive SMS text messages from <?php echo htmlspecialchars($siteName); ?> about my request. Consent is not a condition of purchase. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.</span>
              </label>
              <?php endif; ?>
              <label class="form-consent-item">
                <input type="checkbox" name="terms_accepted" value="yes" required>
                <span>I agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span style="color:var(--color-accent)">*</span></span>
              </label>
            </div>

            <p class="form-footnote" style="grid-column:1/-1;margin-top:var(--space-xs)">
              We'll contact you within 24 hours to confirm availability and answer questions.
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

  <!-- What Dog Boarding Includes Section -->
  <section class="section boarding-details" style="background:var(--color-surface)">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">What's Included</p>
        <h2>What does overnight dog boarding include in Franklin?</h2>
        <p class="answer-block">
          Overnight kennel boarding at Dog Lady's Pet Camp includes a comfortable sleeping space, fresh water throughout the day and night, regular potty breaks, and a quiet evening routine that helps dogs settle. Every dog is supervised by owner April Davidson, who has 29 years of grooming and veterinary-aide experience and knows how to keep dogs calm and safe.
        </p>
      </div>

      <div class="prose" style="margin-top:var(--space-xl)">
        <p>
          Boarding is not just a place to leave your dog. It is a service built around each dog's needs, comfort, and routine. April works with you to understand what keeps your dog happy—whether that's extra attention, a specific feeding schedule, or a familiar blanket at bedtime.
        </p>
        <p>
          Dog Lady's Pet Camp is a dogs-only facility, which keeps the environment calmer and more predictable than mixed-species kennels. Dogs of all breeds and sizes are welcome, from small companions to large working breeds. April has decades of hands-on experience managing temperament, energy levels, and health needs, so every dog gets the individual care that makes boarding less stressful.
        </p>
        <p>
          If your dog needs medication, follows a special diet, or has health concerns, let April know when you book. Dog Lady's Pet Camp can accommodate medical needs with clear instructions and advance notice.
        </p>
      </div>
    </div>
  </section>

  <!-- Boarding Process Section -->
  <section class="section boarding-process">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">How It Works</p>
        <h2>How does dog boarding work at Dog Lady's Pet Camp?</h2>
        <p class="answer-block">
          Boarding starts with a call to confirm availability and discuss your dog's routine. You bring your dog, their food, and any medications on the drop-off date. April takes care of them during their stay, and you pick them up at the arranged time. The process is simple, and April works with your schedule.
        </p>
      </div>

      <div class="process-grid">
        <div class="process-step" data-step="1">
          <h3>Call to Book</h3>
          <p>
            Call (937) 743-9956 to check availability for your dates. Let April know your dog's breed, size, and any special needs or routines. She'll answer your questions and confirm your reservation.
          </p>
        </div>

        <div class="process-step" data-step="2">
          <h3>Drop Off Your Dog</h3>
          <p>
            Bring your dog, their food, medications (in original containers), and any familiar items like a blanket or toy. April will get your dog settled and confirm pick-up details.
          </p>
        </div>

        <div class="process-step" data-step="3">
          <h3>Your Dog's Stay</h3>
          <p>
            Your dog gets fresh water, regular potty breaks, meals on their schedule, and a quiet evening routine. April supervises every dog personally and keeps detailed notes on their behavior and health.
          </p>
        </div>

        <div class="process-step" data-step="4">
          <h3>Pick Up</h3>
          <p>
            Pick up your dog at the arranged time. April will let you know how the stay went, answer any questions, and make sure you have everything you brought.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="section boarding-why" style="background:var(--color-paper)">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Why Dog Lady's Pet Camp</p>
        <h2>Why should I choose Dog Lady's Pet Camp for dog boarding?</h2>
        <p class="answer-block">
          Dog Lady's Pet Camp is owner-operated by April Davidson, who has cared for Franklin-area dogs since 2000 and brings 29 years of grooming and veterinary-aide experience to every boarding stay. It is a dogs-only facility, which keeps the environment calm, and April supervises every dog personally—not staff, but the owner herself.
        </p>
      </div>

      <div class="why-grid">
        <div class="why-card">
          <h3>
            <?php icon('user', 20); ?>
            Owner-Operated, Not Corporate
          </h3>
          <p>
            When you board your dog at Dog Lady's Pet Camp, they are cared for by April Davidson, the owner—not rotating staff. April is on-site, personally supervising every dog and managing their routines, meals, and health.
          </p>
        </div>

        <div class="why-card">
          <h3>
            <?php icon('heart', 20); ?>
            29 Years of Hands-On Experience
          </h3>
          <p>
            April has 29 years of grooming and veterinary-aide experience. She knows dog behavior, body language, and health signs, and she can handle everything from anxious dogs to those with medical needs.
          </p>
        </div>

        <div class="why-card">
          <h3>
            <?php icon('shield-check', 20); ?>
            Dogs-Only Facility
          </h3>
          <p>
            Dog Lady's Pet Camp is a dogs-only facility, which eliminates the stress and unpredictability of mixed-species kennels. Dogs stay calmer when the environment is designed specifically for them.
          </p>
        </div>

        <div class="why-card">
          <h3>
            <?php icon('map-pin', 20); ?>
            Serving Franklin Since 2000
          </h3>
          <p>
            Dog Lady's Pet Camp has been a trusted part of the Franklin, Ohio community for over two decades. Local pet owners know April by name and trust her to care for their dogs like her own.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section faq-section">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">Common Questions</p>
        <h2>Dog Boarding FAQs</h2>
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
        <h2 style="color:var(--color-paper)">Ready to Book Your Dog's Boarding Stay?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> or fill out the form above. April will confirm availability and answer all your questions about boarding.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Request Boarding Dates</button>
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
    <h3>Request Boarding Dates</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-boarding-name" required autocomplete="name">
      <label for="dialog-boarding-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-boarding-phone" required autocomplete="tel">
      <label for="dialog-boarding-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-boarding-email" required autocomplete="email">
      <label for="dialog-boarding-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-boarding-service" required>
        <option value="" disabled selected></option>
        <option value="Dog Boarding (Overnight Kennel)" selected>Dog Boarding (Overnight Kennel)</option>
        <?php foreach ($services as $svc): if ($svc['slug'] !== 'dog-boarding-overnight-kennel'): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endif; endforeach; ?>
      </select>
      <label for="dialog-boarding-service">Service Needed</label>
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
