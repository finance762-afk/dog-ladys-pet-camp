<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Thank You page) ---------- */
$currentPage     = 'thank-you';
$pageType        = 'other';
$pageTitle       = "Thank You | Dog Lady's Pet Camp";
$pageDescription = "Thank you for contacting Dog Lady's Pet Camp. We'll be in touch within 24 hours.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/thank-you/';
$noindex         = true;  // Do not index thank-you pages

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="thankyou-page-styles">
  .thankyou-hero { background: var(--color-surface); min-height: 520px; display: flex; align-items: center; }
  .thankyou-icon { width: 80px; height: 80px; background: var(--color-accent); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-xl); color: white; }
  .thankyou-actions { display: flex; flex-wrap: wrap; gap: var(--space-md); justify-content: center; margin-top: var(--space-2xl); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <section class="hero thankyou-hero section">
    <div class="container">
      <div class="hero-copy" style="max-width:600px;margin:0 auto;text-align:center">

        <div class="thankyou-icon">
          <?php icon('check', 48); ?>
        </div>

        <h1>Thank You for Contacting Us!</h1>

        <p style="margin-top:var(--space-lg);font-size:var(--fs-lg);color:var(--color-ink-2)">
          Your message has been received. April or a member of the Dog Lady's Pet Camp team will contact you within 24 hours to answer your questions and schedule your appointment.
        </p>

        <div style="background:var(--color-paper);padding:var(--space-xl);border-radius:var(--radius-lg);margin-top:var(--space-2xl);text-align:left">
          <h2 style="font-size:var(--fs-lg);margin-bottom:var(--space-md)">What happens next?</h2>
          <ul style="list-style:none;padding:0;display:grid;gap:var(--space-md)">
            <li style="display:flex;gap:var(--space-md)">
              <?php icon('clock', 20); ?>
              <span>We'll review your request and call you within 24 hours</span>
            </li>
            <li style="display:flex;gap:var(--space-md)">
              <?php icon('calendar', 20); ?>
              <span>We'll confirm availability and schedule your service</span>
            </li>
            <li style="display:flex;gap:var(--space-md)">
              <?php icon('info', 20); ?>
              <span>We'll answer any questions you have about boarding or grooming</span>
            </li>
          </ul>
        </div>

        <div class="thankyou-actions">
          <a href="/" class="btn btn-primary btn-lg">
            <?php icon('home', 20); ?>
            Return to Homepage
          </a>
          <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-secondary btn-lg">
            <?php icon('phone', 20); ?>
            Call <?php echo $phone; ?>
          </a>
        </div>

        <?php if (!empty($reviewRequestUrl)): ?>
        <div style="margin-top:var(--space-3xl);padding-top:var(--space-2xl);border-top:1px solid var(--color-line)">
          <p style="font-size:var(--fs-sm);color:var(--color-muted);margin-bottom:var(--space-md)">
            Have you used our services before? We'd love to hear about your experience.
          </p>
          <a href="<?php echo $reviewRequestUrl; ?>" target="_blank" rel="noopener" class="btn btn-outline">
            <?php icon('star', 18); ?>
            Leave a Google Review
          </a>
        </div>
        <?php endif; ?>

      </div>
    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
