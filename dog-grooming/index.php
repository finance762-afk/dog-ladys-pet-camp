<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Dog Grooming service page) ---------- */
$currentPage     = 'services';
$pageType        = 'service';
$serviceSlug     = 'dog-grooming';
$pageTitle       = "Dog Grooming in Franklin, OH | Professional Groomer | Dog Lady's Pet Camp";
$pageDescription = "Full-service dog grooming for every breed and coat type in Franklin, Ohio. Decades of hands-on grooming experience. Call (937) 743-9956 to book.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/dog-grooming/';

/* Hero image */
$heroImage    = 'gbp-6-4da1-8c25-669a111603aa.jpg';
$heroImageAlt = "Professional dog grooming at Dog Lady's Pet Camp in Franklin, Ohio";

/* Service-specific FAQs */
$serviceFaqs = [
    [
        'q' => "How much does dog grooming cost in Franklin, OH?",
        'a' => "Dog grooming at Dog Lady's Pet Camp starts at $45 and varies based on your dog's breed, coat type, and the services you need. Call (937) 743-9956 for a quote tailored to your dog.",
    ],
    [
        'q' => "What's included in a full-service dog grooming?",
        'a' => "Full-service grooming includes a bath, blow dry, brush-out, nail trimming, ear cleaning, and breed-specific styling or clipping. Every grooming is shaped to your dog's coat type and your preferences.",
    ],
    [
        'q' => "Do you groom all dog breeds?",
        'a' => "Yes. Dog Lady's Pet Camp grooms dogs of every breed and coat type, from short-haired breeds to long double coats, curly coats, and wiry terrier coats. Owner April Davidson has 29 years of grooming experience and has worked with every breed.",
    ],
    [
        'q' => "How long does a grooming appointment take?",
        'a' => "A full grooming typically takes 2 to 3 hours, depending on your dog's size, coat condition, and temperament. April works at a pace that keeps your dog calm and lets her do the job right, not rushed.",
    ],
    [
        'q' => "Can you groom anxious or reactive dogs?",
        'a' => "Yes. April has decades of experience working with anxious, fearful, and reactive dogs. She uses calm handling, takes breaks when needed, and never forces a dog through the process. Let her know your dog's triggers when you book.",
    ],
    [
        'q' => "How often should I have my dog groomed?",
        'a' => "Most dogs with medium to long coats benefit from grooming every 6 to 8 weeks. Short-haired dogs may only need grooming a few times a year. April will recommend a schedule based on your dog's coat and how quickly it mats or sheds.",
    ],
];

/* Service schema */
$serviceData = [
    'name' => 'Dog Grooming',
    'description' => 'Full-service professional dog grooming for every breed and coat type, including bath, blow dry, brush-out, nail trimming, and breed-specific styling.',
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
            'name' => 'Dog Grooming',
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
<style id="grooming-page-styles">
  .grooming-hero { background: var(--color-surface); min-height: 460px; }
  .grooming-hero .hero-visual__img { object-position: 50% 35%; }
  .grooming-services .services-breakdown { display: grid; gap: var(--space-lg); margin-top: var(--space-2xl); }
  .grooming-services .service-row { background: var(--color-paper); border-radius: var(--radius-lg); padding: var(--space-xl); display: grid; grid-template-columns: auto 1fr; gap: var(--space-lg); align-items: start; }
  .grooming-services .service-row svg { color: var(--color-accent); flex-shrink: 0; margin-top: 0.2rem; }
  .grooming-services .service-row h3 { font-size: var(--fs-lg); margin-bottom: var(--space-xs); color: var(--color-ink); }
  .grooming-services .service-row p { color: var(--color-ink-2); line-height: 1.6; }
  .grooming-experience .exp-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-xl); margin-top: var(--space-2xl); }
  .grooming-experience .stat-card { text-align: center; padding: var(--space-xl); background: var(--color-surface); border-radius: var(--radius-lg); }
  .grooming-experience .stat-card .stat-num { font-family: var(--font-heading); font-weight: 800; font-size: clamp(2.5rem, 5vw, 3.5rem); color: var(--color-accent); line-height: 1; }
  .grooming-experience .stat-card .stat-label { margin-top: var(--space-sm); color: var(--color-ink); font-weight: 600; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior grooming-hero section">
    <div class="container">
      <div class="hero-grid hero-grid--form">

        <div class="hero-copy">
          <p class="eyebrow">Professional Dog Grooming</p>
          <h1>Dog Grooming in <span class="text-accent">Franklin, Ohio</span></h1>
          <p class="hero-answer">
            Dog Lady's Pet Camp offers full-service dog grooming for every breed and coat type in Franklin, Ohio. Owner April Davidson brings 29 years of hands-on grooming experience to every appointment, from bath and blow dry to breed-specific styling.
          </p>

          <div class="hero-actions">
            <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>
              <?php icon('scissors', 20); ?>
              Book Grooming
            </button>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
              <?php icon('phone', 20); ?>
              Call <?php echo $phone; ?>
            </a>
          </div>

          <div class="hero-chips">
            <span class="chip">All Breeds & Coat Types</span>
            <span class="chip">29 Years Experience</span>
            <span class="chip">Owner-Operated</span>
          </div>
        </div>

        <!-- Hero form card (desktop) -->
        <aside class="hero-form-card">
          <h3>Book Grooming Appointment</h3>
          <form action="<?php echo $formAction; ?>" method="POST" class="hero-form">
            <div class="form-row">
              <div class="form-field">
                <input type="text" name="name" id="grooming-name" required autocomplete="name">
                <label for="grooming-name">Your Name</label>
              </div>
              <div style="display:contents">
                <div class="form-field">
                  <input type="tel" name="phone" id="grooming-phone" required autocomplete="tel">
                  <label for="grooming-phone">Phone</label>
                </div>
                <div class="form-field">
                  <input type="email" name="email" id="grooming-email" required autocomplete="email">
                  <label for="grooming-email">Email</label>
                </div>
              </div>
            </div>
            <div class="form-row" style="grid-template-columns: 1.2fr 1fr">
              <div class="form-field">
                <select name="service" id="grooming-service" required>
                  <option value="" disabled selected></option>
                  <option value="Dog Grooming" selected>Dog Grooming</option>
                  <?php foreach ($services as $svc): if ($svc['slug'] !== 'dog-grooming'): ?>
                  <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                  <?php endif; endforeach; ?>
                </select>
                <label for="grooming-service">Service Needed</label>
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

  <!-- Grooming Services Section -->
  <section class="section grooming-services">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">What's Included</p>
        <h2>What does full-service dog grooming include?</h2>
        <p class="answer-block">
          Full-service dog grooming at Dog Lady's Pet Camp includes a bath, blow dry, brush-out, nail trimming, ear cleaning, and breed-specific styling or clipping. Every grooming is tailored to your dog's coat type, and April works with you to get the look and length you want.
        </p>
      </div>

      <div class="services-breakdown">
        <div class="service-row">
          <?php icon('droplets', 28); ?>
          <div>
            <h3>Bath & Blow Dry</h3>
            <p>
              A deep-clean bath with professional dog shampoo removes dirt, oil, and odors. The blow dry follows, leaving the coat fully dry and fluffy so April can see the coat structure and cut cleanly.
            </p>
          </div>
        </div>

        <div class="service-row">
          <?php icon('layers', 28); ?>
          <div>
            <h3>Brush-Out & Undercoat Removal</h3>
            <p>
              Every grooming includes a full brush-out to remove loose fur, mats, and undercoat. This step is especially important for double-coated breeds like Golden Retrievers, Huskies, and German Shepherds.
            </p>
          </div>
        </div>

        <div class="service-row">
          <?php icon('scissors', 28); ?>
          <div>
            <h3>Breed-Specific Styling</h3>
            <p>
              April cuts and styles to your dog's breed standard or your personal preference. Whether you want a full trim, a puppy cut, or a show-quality style, she has the experience to do it right.
            </p>
          </div>
        </div>

        <div class="service-row">
          <?php icon('check-circle', 28); ?>
          <div>
            <h3>Nail Trimming & Ear Cleaning</h3>
            <p>
              Nails are trimmed to a comfortable length, and ears are gently cleaned to remove wax and debris. These finishing touches are part of every full-service grooming.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Experience Section -->
  <section class="section grooming-experience" style="background:var(--color-paper)">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Experience Matters</p>
        <h2>Why does grooming experience matter?</h2>
        <p class="answer-block">
          Grooming experience matters because every breed has different coat needs, and every dog has different temperament and tolerance. April Davidson has 29 years of hands-on grooming and veterinary-aide experience, which means she knows how to handle anxious dogs, read body language, and get the job done safely and calmly.
        </p>
      </div>

      <div class="exp-stats">
        <div class="stat-card">
          <div class="stat-num">29</div>
          <div class="stat-label">Years Grooming Experience</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">26</div>
          <div class="stat-label">Years Serving Franklin</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">100%</div>
          <div class="stat-label">Owner-Operated</div>
        </div>
      </div>

      <div class="prose" style="margin-top:var(--space-2xl);max-width:65ch;margin-left:auto;margin-right:auto">
        <p>
          When you bring your dog to Dog Lady's Pet Camp, they are groomed by April herself—not a rotating staff member, but the owner with decades of experience. April has worked with every coat type, from smooth short coats to thick double coats, wiry terrier coats, and curly poodle coats. She knows what works for each breed and how to adjust the grooming to your dog's comfort level.
        </p>
        <p>
          Anxious or reactive dogs are welcome. April uses calm handling, takes breaks when the dog needs them, and never rushes through the process. If your dog has specific triggers or fears, let April know when you book so she can plan the grooming around what keeps your dog calm.
        </p>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section faq-section">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">Common Questions</p>
        <h2>Dog Grooming FAQs</h2>
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
        <h2 style="color:var(--color-paper)">Ready to Book a Grooming Appointment?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> or fill out the form above. April will answer your questions and find a time that works for you.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Book Grooming</button>
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
    <h3>Book Grooming Appointment</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-grooming-name" required autocomplete="name">
      <label for="dialog-grooming-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-grooming-phone" required autocomplete="tel">
      <label for="dialog-grooming-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-grooming-email" required autocomplete="email">
      <label for="dialog-grooming-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-grooming-service" required>
        <option value="" disabled selected></option>
        <option value="Dog Grooming" selected>Dog Grooming</option>
        <?php foreach ($services as $svc): if ($svc['slug'] !== 'dog-grooming'): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endif; endforeach; ?>
      </select>
      <label for="dialog-grooming-service">Service Needed</label>
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
