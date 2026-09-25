<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Service Area page) ---------- */
$currentPage     = 'service-area';
$pageType        = 'other';
$pageTitle       = "Service Areas | Dog Boarding & Grooming near Franklin, OH";
$pageDescription = "Dog Lady's Pet Camp serves Franklin, Springboro, Middletown, Carlisle, Lebanon, and Miamisburg, Ohio. Dogs-only boarding and grooming. Call (937) 743-9956.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/service-area/';

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
            'name' => 'Service Areas',
            'item' => $canonicalUrl
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="service-area-page-styles">
  .area-hero { background: var(--color-paper); min-height: 400px; }
  .areas-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-lg); margin-top: var(--space-2xl); }
  .area-card { background: var(--color-surface); padding: var(--space-xl); border-radius: var(--radius-lg); border-left: 3px solid var(--color-accent); }
  .area-card h3 { font-size: var(--fs-lg); font-weight: 700; margin-bottom: var(--space-sm); color: var(--color-ink); }
  .area-card p { color: var(--color-ink-2); font-size: var(--fs-sm); line-height: 1.6; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior area-hero section">
    <div class="container">
      <div class="hero-copy" style="max-width:65ch;margin:0 auto;text-align:center">
        <p class="eyebrow">Where We Serve</p>
        <h1>Dog Boarding & Grooming near <span class="text-accent">Franklin, Ohio</span></h1>
        <p class="hero-answer">
          Dog Lady's Pet Camp serves Franklin, Ohio and the surrounding communities of Springboro, Middletown, Carlisle, Lebanon, and Miamisburg. Located at 4265 Pennyroyal Rd in Franklin, the facility is an easy drive from anywhere in southern Warren County.
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

  <!-- Service Areas Section -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Communities We Serve</p>
        <h2>Which areas does Dog Lady's Pet Camp serve?</h2>
        <p class="answer-block">
          Dog Lady's Pet Camp serves Franklin, Springboro, Middletown, Carlisle, Lebanon, and Miamisburg in southwestern Ohio. Pet owners from across southern Warren County bring their dogs to Dog Lady's Pet Camp for overnight boarding and professional grooming.
        </p>
      </div>

      <div class="areas-grid">
        <div class="area-card">
          <h3><?php icon('map-pin', 20); ?> Franklin, OH</h3>
          <p>
            Dog Lady's Pet Camp is located at 4265 Pennyroyal Rd in Franklin, Ohio. Franklin pet owners have trusted April Davidson with their dogs since 2000.
          </p>
        </div>

        <div class="area-card">
          <h3><?php icon('map-pin', 20); ?> Springboro, OH</h3>
          <p>
            Springboro is a short drive from Dog Lady's Pet Camp. Springboro pet owners can drop off their dogs for boarding or grooming on their way to work or errands.
          </p>
        </div>

        <div class="area-card">
          <h3><?php icon('map-pin', 20); ?> Middletown, OH</h3>
          <p>
            Middletown pet owners choose Dog Lady's Pet Camp for owner-operated boarding and grooming with decades of hands-on experience.
          </p>
        </div>

        <div class="area-card">
          <h3><?php icon('map-pin', 20); ?> Carlisle, OH</h3>
          <p>
            Carlisle is minutes from Franklin. Carlisle dog owners appreciate the personal attention April gives every dog she boards and grooms.
          </p>
        </div>

        <div class="area-card">
          <h3><?php icon('map-pin', 20); ?> Lebanon, OH</h3>
          <p>
            Lebanon pet owners bring their dogs to Dog Lady's Pet Camp for calm handling and individualized care that corporate kennels don't offer.
          </p>
        </div>

        <div class="area-card">
          <h3><?php icon('map-pin', 20); ?> Miamisburg, OH</h3>
          <p>
            Miamisburg is a quick drive from Dog Lady's Pet Camp. Miamisburg dog owners trust April's 29 years of grooming and veterinary-aide experience.
          </p>
        </div>
      </div>

      <div class="prose" style="margin-top:var(--space-3xl);max-width:65ch;margin-left:auto;margin-right:auto">
        <h2>Why do pet owners choose Dog Lady's Pet Camp?</h2>
        <p class="answer-block">
          Pet owners across Franklin, Springboro, Middletown, Carlisle, Lebanon, and Miamisburg choose Dog Lady's Pet Camp because it is owner-operated by April Davidson, a groomer and veterinary aide with 29 years of hands-on experience. It is a dogs-only facility, which keeps the environment calmer than mixed-species kennels.
        </p>
        <p style="margin-top:var(--space-lg)">
          Dog Lady's Pet Camp is not a franchise or a chain. It is April's life's work. When you board or groom your dog at Dog Lady's Pet Camp, they are cared for by April herself—not rotating staff, but the owner. April knows dogs, knows behavior, and knows how to work with anxious, fearful, and reactive dogs who need extra patience.
        </p>
        <p>
          If you're looking for a Franklin-area kennel or groomer who treats your dog as an individual, call Dog Lady's Pet Camp at <?php echo $phone; ?>.
        </p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section cta-band" style="background:var(--color-ink);color:var(--color-paper)">
    <div class="container">
      <div class="cta-content" style="max-width:56ch;margin:0 auto;text-align:center">
        <h2 style="color:var(--color-paper)">Ready to Book a Service?</h2>
        <p style="margin-top:var(--space-md);font-size:var(--fs-lg);color:rgba(255,255,255,0.9)">
          Call Dog Lady's Pet Camp at <?php echo $phone; ?> to book boarding or grooming.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;margin-top:var(--space-xl)">
          <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Book Now</button>
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
      <input type="text" name="name" id="dialog-area-name" required autocomplete="name">
      <label for="dialog-area-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-area-phone" required autocomplete="tel">
      <label for="dialog-area-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-area-email" required autocomplete="email">
      <label for="dialog-area-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-area-service" required>
        <option value="" disabled selected></option>
        <?php foreach ($services as $svc): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endforeach; ?>
      </select>
      <label for="dialog-area-service">Service Needed</label>
    </div>

    <!-- TCPA consent -->
    <div class="form-consent-fieldset">
      <label class="form-consent-item">
        <input type="checkbox" name="email_opt_in" value="yes">
        <span>I'd like to receive email updates.</span>
      </label>
      <?php if ($acceptsSms): ?>
      <label class="form-consent-item">
        <input type="checkbox" name="sms_opt_in" value="yes">
        <span>I consent to receive SMS text messages. Consent is not required. Reply STOP to unsubscribe.</span>
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
