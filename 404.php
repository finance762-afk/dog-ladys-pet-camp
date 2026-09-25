<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (404 Error page) ---------- */
$currentPage     = '404';
$pageType        = 'other';
$pageTitle       = "Page Not Found | Dog Lady's Pet Camp";
$pageDescription = "The page you're looking for doesn't exist. Return to the homepage or call (937) 743-9956.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/404/';
$noindex         = true;  // Do not index 404 pages

http_response_code(404);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="error-page-styles">
  .error-hero { background: var(--color-paper); min-height: 500px; display: flex; align-items: center; }
  .error-code { font-family: var(--font-heading); font-weight: 800; font-size: clamp(4rem, 12vw, 8rem); color: var(--color-accent); line-height: 1; opacity: 0.2; margin-bottom: var(--space-md); }
  .error-links { display: grid; gap: var(--space-sm); margin-top: var(--space-2xl); max-width: 400px; }
  .error-links a { display: flex; align-items: center; gap: var(--space-sm); padding: var(--space-md); background: var(--color-surface); border-radius: var(--radius); color: var(--color-ink); text-decoration: none; transition: background 0.15s; }
  .error-links a:hover { background: var(--color-line); }
  .error-links svg { color: var(--color-accent); flex-shrink: 0; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <section class="hero error-hero section">
    <div class="container">
      <div class="hero-copy" style="max-width:600px;margin:0 auto;text-align:center">
        <div class="error-code" aria-hidden="true">404</div>
        <h1>Page Not Found</h1>
        <p style="margin-top:var(--space-lg);font-size:var(--fs-lg);color:var(--color-ink-2)">
          The page you're looking for doesn't exist. It may have been moved or deleted. Use the links below to find what you need, or call us at <?php echo $phone; ?>.
        </p>

        <div class="error-links" style="margin-left:auto;margin-right:auto">
          <a href="/">
            <?php icon('home', 20); ?>
            <span>Return to Homepage</span>
          </a>
          <a href="/services/">
            <?php icon('list', 20); ?>
            <span>View Our Services</span>
          </a>
          <a href="/contact/">
            <?php icon('mail', 20); ?>
            <span>Contact Us</span>
          </a>
          <a href="tel:<?php echo $phoneDigits; ?>">
            <?php icon('phone', 20); ?>
            <span>Call <?php echo $phone; ?></span>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
