<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Contact page) ---------- */
$currentPage     = 'contact';
$pageType        = 'contact';
$pageTitle       = "Contact Dog Lady's Pet Camp | Franklin, OH Dog Boarding & Grooming";
$pageDescription = "Contact Dog Lady's Pet Camp in Franklin, OH. Call (937) 743-9956 or fill out the form. Located at 4265 Pennyroyal Rd, Franklin, Ohio 45005.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/contact/';

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
            'name' => 'Contact',
            'item' => $canonicalUrl
        ]
    ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="contact-page-styles">
  .contact-hero { background: var(--color-surface); min-height: 360px; }
  .contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: clamp(var(--space-2xl), 5vw, var(--space-4xl)); margin-top: var(--space-2xl); }
  @media (max-width: 900px) { .contact-grid { grid-template-columns: 1fr; } }
  .contact-info .info-block { margin-bottom: var(--space-2xl); }
  .contact-info h3 { font-size: var(--fs-lg); font-weight: 700; margin-bottom: var(--space-md); color: var(--color-ink); }
  .contact-info .info-item { display: flex; gap: var(--space-md); align-items:start; margin-bottom: var(--space-md); }
  .contact-info .info-item svg { color: var(--color-accent); flex-shrink: 0; margin-top: 0.2rem; }
  .contact-info .info-item a { color: var(--color-ink); text-decoration: none; transition: color 0.15s; }
  .contact-info .info-item a:hover { color: var(--color-accent); }
  .contact-form-wrapper { background: var(--color-paper); padding: var(--space-2xl); border-radius: var(--radius-lg); box-shadow: var(--shadow); }
  .contact-form-wrapper h2 { font-size: var(--fs-xl); margin-bottom: var(--space-lg); }
  .contact-form .form-field { margin-bottom: var(--space-md); }
  .contact-form textarea { min-height: 120px; resize: vertical; padding: 1rem; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <!-- Hero Section -->
  <section class="hero hero--interior contact-hero section">
    <div class="container">
      <div class="hero-copy" style="max-width:65ch;margin:0 auto;text-align:center">
        <p class="eyebrow">Get in Touch</p>
        <h1>Contact <span class="text-accent">Dog Lady's Pet Camp</span></h1>
        <p class="hero-answer">
          Call Dog Lady's Pet Camp at (937) 743-9956 to book boarding, grooming, or any service. Located at 4265 Pennyroyal Rd in Franklin, Ohio. April will answer your questions and find a time that works for you.
        </p>
      </div>
    </div>
  </section>

  <!-- Contact Content Section -->
  <section class="section">
    <div class="container">
      <div class="contact-grid">

        <!-- Contact Information -->
        <div class="contact-info">
          <div class="info-block">
            <h3>Phone</h3>
            <div class="info-item">
              <?php icon('phone', 24); ?>
              <div>
                <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a>
                <p style="margin-top:0.25rem;font-size:var(--fs-sm);color:var(--color-muted)">
                  Call to book boarding or grooming
                </p>
              </div>
            </div>
          </div>

          <div class="info-block">
            <h3>Email</h3>
            <div class="info-item">
              <?php icon('mail', 24); ?>
              <div>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                <p style="margin-top:0.25rem;font-size:var(--fs-sm);color:var(--color-muted)">
                  Send us a message
                </p>
              </div>
            </div>
          </div>

          <div class="info-block">
            <h3>Address</h3>
            <div class="info-item">
              <?php icon('map-pin', 24); ?>
              <div>
                <a href="<?php echo $directionsUrl; ?>" target="_blank" rel="noopener">
                  <?php echo $address['street']; ?><br>
                  <?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
                </a>
                <p style="margin-top:0.25rem;font-size:var(--fs-sm);color:var(--color-muted)">
                  Get directions
                </p>
              </div>
            </div>
          </div>

          <div class="info-block">
            <h3>Service Areas</h3>
            <p style="color:var(--color-ink-2);line-height:1.6">
              Dog Lady's Pet Camp serves <?php echo implode(', ', array_slice($serviceAreas, 0, -1)); ?>, and <?php echo end($serviceAreas); ?> in southwestern Ohio.
            </p>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper">
          <h2>Send Us a Message</h2>
          <form action="<?php echo $formAction; ?>" method="POST" class="contact-form">

            <div class="form-field">
              <input type="text" name="name" id="contact-name" required autocomplete="name">
              <label for="contact-name">Your Name</label>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-md)">
              <div class="form-field">
                <input type="tel" name="phone" id="contact-phone" required autocomplete="tel">
                <label for="contact-phone">Phone</label>
              </div>
              <div class="form-field">
                <input type="email" name="email" id="contact-email" required autocomplete="email">
                <label for="contact-email">Email</label>
              </div>
            </div>

            <div class="form-field">
              <select name="service" id="contact-service" required>
                <option value="" disabled selected></option>
                <?php foreach ($services as $svc): ?>
                <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                <?php endforeach; ?>
                <option value="General Inquiry">General Inquiry</option>
              </select>
              <label for="contact-service">Service Needed</label>
            </div>

            <div class="form-field">
              <textarea name="message" id="contact-message" placeholder=" "></textarea>
              <label for="contact-message">Message (Optional)</label>
            </div>

            <!-- TCPA consent (v6.3 — THREE checkboxes) -->
            <div class="form-consent-fieldset" style="margin-bottom:var(--space-lg)">
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
                <span>I agree to the <a href="/privacy-policy/" style="color:var(--color-accent)">Privacy Policy</a> and <a href="/terms/" style="color:var(--color-accent)">Terms of Service</a>. <span style="color:var(--color-accent)">*</span></span>
              </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg">Send Message</button>

            <!-- Hidden fields -->
            <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
            <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you/">
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="consent_version" value="v2.1">
            <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <?php echo p1_attribution_fields('contact'); ?>
          </form>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
