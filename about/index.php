<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (About page) ---------- */
$currentPage     = 'about';
$pageType        = 'about';
$pageTitle       = "About Dog Lady's Pet Camp | Franklin, OH Dog Boarding & Grooming";
$pageDescription = "Dog Lady's Pet Camp is owner-operated by April Davidson, serving Franklin, Ohio since 2000. Decades of grooming and veterinary-aide experience. Call (937) 743-9956.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/about/';

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
            'name' => 'About',
            'item' => $canonicalUrl
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="about-page-styles">
  .about-hero { background: var(--color-paper); min-height: 420px; }
  .about-story { background: var(--color-surface); }
  .about-values .values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-xl); margin-top: var(--space-2xl); }
  .about-values .value-card { background: var(--color-paper); padding: var(--space-xl); border-radius: var(--radius-lg); text-align: center; }
  .about-values .value-card svg { color: var(--color-accent); margin-bottom: var(--space-md); }
  .about-values .value-card h3 { font-size: var(--fs-lg); font-weight: 700; margin-bottom: var(--space-sm); color: var(--color-ink); }
  .about-values .value-card p { color: var(--color-ink-2); line-height: 1.6; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT' . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior about-hero section">
    <div class="container">
      <div class="hero-copy" style="max-width:65ch;margin:0 auto;text-align:center">
        <p class="eyebrow">About Us</p>
        <h1>Meet April Davidson, Owner of <span class="text-accent">Dog Lady's Pet Camp</span></h1>
        <p class="hero-answer">
          Dog Lady's Pet Camp is an owner-operated dogs-only boarding and grooming facility in Franklin, Ohio. April Davidson has cared for Franklin-area dogs since 2000, bringing 29 years of grooming and veterinary-aide experience to every dog she boards and grooms.
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

  <!-- Story Section -->
  <section class="section about-story">
    <div class="container content-narrow">
      <div class="section-header">
        <p class="eyebrow">Our Story</p>
        <h2>How did Dog Lady's Pet Camp start?</h2>
        <p class="answer-block">
          Dog Lady's Pet Camp was founded by April Davidson in 2000 after nearly three decades of hands-on grooming and veterinary-aide experience. April saw that Franklin-area dog owners wanted personalized, owner-operated care—not corporate kennels with rotating staff—and built a business around that need.
        </p>
      </div>

      <div class="prose" style="margin-top:var(--space-2xl)">
        <p>
          April has been working with dogs since the early 1990s. She started as a groomer and veterinary aide, learning dog behavior, health signs, and breed-specific grooming from the ground up. By 2000, she had the experience and confidence to open her own facility in Franklin, Ohio, where she could care for dogs her way: personally, patiently, and without the shortcuts that come with high-volume corporate kennels.
        </p>
        <p>
          Dog Lady's Pet Camp is a dogs-only facility. April made this decision deliberately. Dogs-only environments are calmer and more predictable than mixed-species kennels, which makes boarding less stressful for anxious dogs and gives April more control over the atmosphere. Every dog is supervised by April herself, not staff. When you board or groom your dog at Dog Lady's Pet Camp, you know exactly who is caring for them.
        </p>
        <p>
          Over two decades, April has groomed and boarded thousands of Franklin-area dogs. She's built a reputation for calm handling, expertise with every coat type, and the ability to work with anxious, fearful, and reactive dogs. Pet owners return because they trust April, and they know their dog will get the same personal attention every visit.
        </p>
        <p>
          Dog Lady's Pet Camp is not a franchise, not a chain, and not a stepping stone. It is April's life's work, and every dog she cares for reflects that commitment.
        </p>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="section about-values">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">What We Stand For</p>
        <h2>What values guide Dog Lady's Pet Camp?</h2>
        <p class="answer-block">
          Dog Lady's Pet Camp is built on personal attention, decades of hands-on experience, and a commitment to treating every dog as an individual. April doesn't cut corners, doesn't rush, and doesn't hand your dog off to someone else.
        </p>
      </div>

      <div class="values-grid">
        <div class="value-card">
          <?php icon('user', 40); ?>
          <h3>Owner-Operated</h3>
          <p>
            When you board or groom your dog at Dog Lady's Pet Camp, they are cared for by April Davidson herself. Not staff, not trainees—the owner.
          </p>
        </div>

        <div class="value-card">
          <?php icon('heart', 40); ?>
          <h3>Individual Attention</h3>
          <p>
            Every dog has their own routine, triggers, and comfort level. April learns what keeps each dog calm and adjusts her handling to fit them, not the other way around.
          </p>
        </div>

        <div class="value-card">
          <?php icon('shield-check', 40); ?>
          <h3>Decades of Experience</h3>
          <p>
            April has 29 years of grooming and veterinary-aide experience. She's worked with every breed, every coat type, and every temperament. Experience matters.
          </p>
        </div>

        <div class="value-card">
          <?php icon('home', 40); ?>
          <h3>Dogs-Only Facility</h3>
          <p>
            Dog Lady's Pet Camp is a dogs-only facility. Eliminating mixed-species stress keeps the environment calmer and more predictable for every dog.
          </p>
        </div>

        <div class="value-card">
          <?php icon('map-pin', 40); ?>
          <h3>Local & Trusted</h3>
          <p>
            Dog Lady's Pet Camp has been part of the Franklin, Ohio community since 2000. Local pet owners know April by name and trust her with their dogs.
          </p>
        </div>

        <div class="value-card">
          <?php icon('clock', 40); ?>
          <h3>Never Rushed</h3>
          <p>
            April works at a pace that keeps dogs calm. She doesn't overbook, doesn't rush through grooming, and doesn't force a dog through the process if they're too stressed.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Band Section -->
  <section class="section cta-band" id="estimate" style="background:var(--color-ink);color:var(--color-paper)">
    <div class="container">
      <div class="cta-band__inner" style="display:grid;grid-template-columns:minmax(240px,.85fr) minmax(0,1.75fr);gap:var(--space-2xl);align-items:center">

        <div class="cta-band__copy">
          <p class="eyebrow" style="color:rgba(255,255,255,0.7)">Get Started</p>
          <h2 style="color:var(--color-paper)">Ready to meet April and see the facility?</h2>
          <p style="margin-top:var(--space-md);color:rgba(255,255,255,0.9)">
            Call Dog Lady's Pet Camp at <?php echo $phone; ?> or fill out the form to schedule a visit.
          </p>
        </div>

        <aside class="hero-form-card" style="background:var(--color-paper);padding:var(--space-xl);border-radius:var(--radius-lg)">
          <h3 style="color:var(--color-ink);margin-bottom:var(--space-md)">Contact Us</h3>
          <form action="<?php echo $formAction; ?>" method="POST" class="hero-form">
            <div style="display:grid;gap:var(--space-md)">
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-md)">
                <div class="form-field">
                  <input type="text" name="name" id="about-name" required autocomplete="name">
                  <label for="about-name">Name</label>
                </div>
                <div class="form-field">
                  <input type="tel" name="phone" id="about-phone" required autocomplete="tel">
                  <label for="about-phone">Phone</label>
                </div>
              </div>
              <div class="form-field">
                <input type="email" name="email" id="about-email" required autocomplete="email">
                <label for="about-email">Email</label>
              </div>
              <div class="form-field">
                <select name="service" id="about-service" required>
                  <option value="" disabled selected></option>
                  <?php foreach ($services as $svc): ?>
                  <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                  <?php endforeach; ?>
                </select>
                <label for="about-service">Service Needed</label>
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
                  <span>I agree to the <a href="/privacy-policy/" style="color:var(--color-accent)">Privacy Policy</a> and <a href="/terms/" style="color:var(--color-accent)">Terms</a>. *</span>
                </label>
              </div>

              <button type="submit" class="btn btn-primary btn-block">Send Request</button>
            </div>

            <!-- Hidden fields -->
            <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
            <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you/">
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="consent_version" value="v2.1">
            <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <?php echo p1_attribution_fields('cta-band'); ?>
          </form>
        </aside>

      </div>
    </div>
  </section>

</main>

<!-- Estimate Dialog (mobile form) -->
<dialog id="estimate-dialog" class="estimate-dialog">
  <div class="dialog-header">
    <h3>Contact Us</h3>
    <button type="button" class="dialog-close" data-close-dialog aria-label="Close">
      <?php icon('x', 24); ?>
    </button>
  </div>
  <form action="<?php echo $formAction; ?>" method="POST" class="dialog-form">
    <div class="form-field">
      <input type="text" name="name" id="dialog-about-name" required autocomplete="name">
      <label for="dialog-about-name">Your Name</label>
    </div>
    <div class="form-field">
      <input type="tel" name="phone" id="dialog-about-phone" required autocomplete="tel">
      <label for="dialog-about-phone">Phone</label>
    </div>
    <div class="form-field">
      <input type="email" name="email" id="dialog-about-email" required autocomplete="email">
      <label for="dialog-about-email">Email</label>
    </div>
    <div class="form-field">
      <select name="service" id="dialog-about-service" required>
        <option value="" disabled selected></option>
        <?php foreach ($services as $svc): ?>
        <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
        <?php endforeach; ?>
      </select>
      <label for="dialog-about-service">Service Needed</label>
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
