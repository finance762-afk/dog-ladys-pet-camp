<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Brush-Out & Undercoat Removal service page) ---------- */
$currentPage     = 'services';
$pageType        = 'service';
$serviceSlug     = 'brush-out-undercoat-removal';
$pageTitle       = "Dog Brush-Out & Undercoat Removal in Franklin, OH | Dog Lady's Pet Camp";
$pageDescription = "Deep brush-out and undercoat removal for double-coated dogs in Franklin, Ohio. Reduces shedding at home. Call (937) 743-9956 to book.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/brush-out-undercoat-removal/';

/* Hero image */
/* CLIENT PHOTO SLOT — this page uses the photo-free .hero--interior variant
   (only one client photo exists and it is used once, on the homepage hero).
   When a photo for this service arrives, add it to /assets/images/ with
   -480/-960/-1600 webp+avif variants and switch the hero to .hero-grid--visual
   with a <picture> (loading="eager" fetchpriority="high", alt mentioning Franklin, OH). */

/* Service-specific FAQs */
$serviceFaqs = [
    [
        'q' => "What is undercoat removal?",
        'a' => "Undercoat removal is a deep brush-out that removes the loose, dead undercoat from double-coated breeds like Golden Retrievers, Huskies, and German Shepherds. It cuts down on shedding at home and keeps your dog cooler and more comfortable.",
    ],
    [
        'q' => "How much does brush-out and undercoat removal cost?",
        'a' => "Brush-out and undercoat removal starts at $25 and varies based on your dog's size, coat condition, and how much undercoat needs to be removed. Call (937) 743-9956 for a quote.",
    ],
    [
        'q' => "Which dog breeds need undercoat removal?",
        'a' => "Double-coated breeds like Golden Retrievers, Labs, Huskies, Malamutes, German Shepherds, Corgis, and Australian Shepherds benefit most from undercoat removal. Any breed with a thick undercoat that sheds heavily will see less shedding after this service.",
    ],
    [
        'q' => "How often should I have my dog's undercoat removed?",
        'a' => "Most double-coated dogs benefit from undercoat removal every 6 to 8 weeks during shedding season (spring and fall), and every 8 to 12 weeks the rest of the year. April will recommend a schedule based on your dog's coat and shedding pattern.",
    ],
];

/* Service schema */
$serviceData = [
    'name' => 'Brush-Out & Undercoat Removal',
    'description' => 'Deep brush-out and undercoat removal that cuts shedding at home and keeps double-coated dogs comfortable.',
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
            'name' => 'Brush-Out & Undercoat Removal',
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
<style id="brushout-page-styles">
  .brushout-hero { background: var(--color-surface); }
  .brushout-benefits .benefit-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-lg); margin-top: var(--space-2xl); }
  .brushout-benefits .benefit-card { background: var(--color-paper); padding: var(--space-lg); border-radius: var(--radius-lg); border-left: 3px solid var(--color-accent); }
  .brushout-benefits .benefit-card h3 { font-size: var(--fs-base); font-weight: 700; margin-bottom: var(--space-sm); color: var(--color-ink); display: flex; align-items: center; gap: var(--space-sm); }
  .brushout-benefits .benefit-card p { color: var(--color-ink-2); font-size: var(--fs-sm); line-height: 1.6; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior brushout-hero section">
    <div class="container">
      <div class="hero-grid hero-grid--form">

        <div class="hero-copy">
          <p class="eyebrow">De-Shedding Service</p>
          <h1>Brush-Out & Undercoat Removal in <span class="text-accent">Franklin, OH</span></h1>
          <p class="hero-answer">
            Dog Lady's Pet Camp offers deep brush-out and undercoat removal for double-coated dogs in Franklin, Ohio. The service removes loose undercoat, cuts down on shedding at home, and keeps your dog cooler and more comfortable.
          </p>

          <div class="hero-actions">
            <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>
              <?php icon('layers', 20); ?>
              Book Service
            </button>
            <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
              <?php icon('phone', 20); ?>
              Call <?php echo $phone; ?>
            </a>
          </div>

          <div class="hero-chips">
            <span class="chip">Less Shedding at Home</span>
            <span class="chip">Great for Double Coats</span>
            <span class="chip">Keeps Dogs Comfortable</span>
          </div>
        </div>

        <!-- Hero form card (desktop) -->
        <aside class="hero-form-card">
          <h3>Book De-Shedding Service</h3>
          <form action="<?php echo $formAction; ?>" method="POST" class="hero-form">
            <div class="form-row">
              <div class="form-field">
                <input type="text" name="name" id="brushout-name" required autocomplete="name">
                <label for="brushout-name">Your Name</label>
              </div>
              <div style="display:contents">
                <div class="form-field">
                  <input type="tel" name="phone" id="brushout-phone" required autocomplete="tel">
                  <label for="brushout-phone">Phone</label>
                </div>
                <div class="form-field">
                  <input type="email" name="email" id="brushout-email" required autocomplete="email">
                  <label for="brushout-email">Email</label>
                </div>
              </div>
            </div>
            <div class="form-row" style="grid-template-columns: 1.2fr 1fr">
              <div class="form-field">
                <select name="service" id="brushout-service" required>
                  <option value="" disabled selected></option>
                  <option value="Brush-Out & Undercoat Removal" selected>Brush-Out & Undercoat Removal</option>
                  <?php foreach ($services as $svc): if ($svc['slug'] !== 'brush-out-undercoat-removal'): ?>
                  <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                  <?php endif; endforeach; ?>
                </select>
                <label for="brushout-service">Service Needed</label>
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
  <section class="section brushout-details">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">How It Works</p>
        <h2>What does undercoat removal do?</h2>
        <p class="answer-block">
          Undercoat removal is a deep brush-out that pulls out the loose, dead undercoat that would otherwise shed all over your home. It cuts shedding dramatically, helps your dog stay cooler in warm weather, and prevents mats from forming in the undercoat.
        </p>
      </div>

      <div class="prose" style="margin-top:var(--space-xl)">
        <p>
          Double-coated breeds like Golden Retrievers, Huskies, German Shepherds, and Labs have two layers of fur: a soft, dense undercoat and a longer, coarser outer coat. The undercoat sheds heavily in spring and fall, and that shedding can cover your floors, furniture, and clothes if it's not removed at the source.
        </p>
        <p>
          April uses professional de-shedding tools to pull out the loose undercoat without cutting or damaging the outer coat. The process takes time, but it works. You'll see a noticeable reduction in shedding at home, and your dog will feel cooler and lighter.
        </p>
        <p>
          Undercoat removal is often combined with a bath and blow dry, which loosens the undercoat and makes it easier to remove. Ask April about combining services when you book.
        </p>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="section brushout-benefits" style="background:var(--color-surface)">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Why It Matters</p>
        <h2>Why should I have my dog's undercoat removed?</h2>
        <p class="answer-block">
          Undercoat removal cuts shedding at home, keeps your dog cooler in warm weather, and prevents mats from forming in the thick undercoat. It's especially important for double-coated breeds during shedding season.
        </p>
      </div>

      <div class="benefit-grid">
        <div class="benefit-card">
          <h3>
            <?php icon('home', 20); ?>
            Less Shedding at Home
          </h3>
          <p>
            The loose undercoat that would end up on your floors and furniture is removed at Dog Lady's Pet Camp instead. You'll notice a big difference in how much your dog sheds after undercoat removal.
          </p>
        </div>

        <div class="benefit-card">
          <h3>
            <?php icon('sun', 20); ?>
            Keeps Dogs Cooler
          </h3>
          <p>
            A thick, dead undercoat traps heat against your dog's skin. Removing it lets air reach the skin and helps your dog regulate body temperature, especially in summer.
          </p>
        </div>

        <div class="benefit-card">
          <h3>
            <?php icon('shield', 20); ?>
            Prevents Mats
          </h3>
          <p>
            Loose undercoat can mat against the skin, causing discomfort and trapping moisture. Regular undercoat removal keeps the coat healthy and prevents painful mats from forming.
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
        <h2>Undercoat Removal FAQs</h2>
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
        <h2 style="color:var(--color-paper)">Ready to Reduce Shedding at Home?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> to schedule undercoat removal for your dog.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Book Service</button>
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
    <h3>Book De-Shedding Service</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-brushout-name" required autocomplete="name">
      <label for="dialog-brushout-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-brushout-phone" required autocomplete="tel">
      <label for="dialog-brushout-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-brushout-email" required autocomplete="email">
      <label for="dialog-brushout-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-brushout-service" required>
        <option value="" disabled selected></option>
        <option value="Brush-Out & Undercoat Removal" selected>Brush-Out & Undercoat Removal</option>
        <?php foreach ($services as $svc): if ($svc['slug'] !== 'brush-out-undercoat-removal'): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endif; endforeach; ?>
      </select>
      <label for="dialog-brushout-service">Service Needed</label>
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
