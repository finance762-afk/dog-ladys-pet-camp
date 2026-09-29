<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Cookie Policy) ---------- */
$currentPage     = 'legal';
$pageType        = 'other';
$pageTitle       = "Cookie Policy | Dog Lady's Pet Camp";
$pageDescription = "Cookie Policy for Dog Lady's Pet Camp. How we use cookies and tracking technologies on our website.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/cookie-policy/';

$webPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Cookie Policy',
    'url' => $canonicalUrl,
    'description' => $metaDescription,
    'provider' => ['@id' => $siteUrl . '/#organization']
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($webPageSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Cookie Policy', 'item' => $canonicalUrl]
    ]
];
$schemaMarkup .= '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles -->
<style id="legal-page-styles">
  .hero--legal { background: var(--color-surface); min-height: 40vh; }
  .legal-prose { max-width: 65ch; margin: 0 auto; }
  .legal-prose h2 { margin-top: var(--space-3xl); margin-bottom: var(--space-lg); font-size: var(--fs-xl); }
  .legal-prose h3 { margin-top: var(--space-2xl); margin-bottom: var(--space-md); font-size: var(--fs-lg); }
  .legal-prose p, .legal-prose li { line-height: 1.8; color: var(--color-ink-2); }
  .legal-prose ul, .legal-prose ol { margin: var(--space-md) 0; padding-left: var(--space-xl); }
  .legal-prose a { color: var(--color-accent); text-decoration: underline; }
  .legal-prose table { width: 100%; border-collapse: collapse; margin: var(--space-xl) 0; }
  .legal-prose th, .legal-prose td { padding: var(--space-sm) var(--space-md); border: 1px solid var(--color-line); text-align: left; }
  .legal-prose th { background: var(--color-surface); font-weight: 600; }
  .effective-date { display: inline-block; background: var(--color-surface); padding: var(--space-sm) var(--space-lg); border-radius: var(--radius); font-weight: 600; margin-bottom: var(--space-2xl); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <section class="hero hero--interior hero--legal section">
    <div class="container">
      <div class="hero-copy" style="max-width:65ch;margin:0 auto;text-align:center">
        <p class="eyebrow">Legal</p>
        <h1>Cookie Policy</h1>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container content-narrow legal-prose">

      <p class="effective-date">Effective Date: <?php echo date('F j, Y'); ?></p>

      <p>
        This Cookie Policy explains how Dog Lady's Pet Camp uses cookies and similar tracking technologies on our website. By using our website, you consent to the use of cookies as described in this policy.
      </p>

      <h2>1. What Are Cookies?</h2>
      <p>
        Cookies are small text files that are placed on your device (computer, tablet, or mobile phone) when you visit a website. Cookies help websites remember your preferences, improve your experience, and analyze how the site is used.
      </p>

      <h2>2. What Cookies We Use</h2>
      <p>We use the following types of cookies on our website:</p>

      <table>
        <thead>
          <tr>
            <th>Cookie Type</th>
            <th>Purpose</th>
            <th>Duration</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Google Analytics</strong></td>
            <td>Analyzes website traffic, user behavior, and page performance to improve our site</td>
            <td>Up to 2 years</td>
          </tr>
          <tr>
            <td><strong>Google Fonts</strong></td>
            <td>Loads custom fonts to improve website design and readability</td>
            <td>Session</td>
          </tr>
          <tr>
            <td><strong>Session Cookies</strong></td>
            <td>Maintains your session as you navigate the site (e.g., form data persistence)</td>
            <td>Session (deleted when you close your browser)</td>
          </tr>
        </tbody>
      </table>

      <h3>Google Analytics</h3>
      <p>
        We use Google Analytics to understand how visitors use our website. Google Analytics collects information such as:
      </p>
      <ul>
        <li>Pages you visit</li>
        <li>Time spent on each page</li>
        <li>How you arrived at our site (search engine, direct link, etc.)</li>
        <li>Device type and browser information</li>
      </ul>
      <p>
        Google Analytics does not collect personally identifiable information (PII) unless you submit it through a form. For more information, see <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google's Privacy Policy</a>.
      </p>

      <h2>3. How to Control Cookies</h2>
      <p>
        You can control and delete cookies through your browser settings. Most browsers allow you to:
      </p>
      <ul>
        <li>View what cookies are stored on your device</li>
        <li>Delete all or specific cookies</li>
        <li>Block cookies from specific websites</li>
        <li>Block all cookies (note: this may affect website functionality)</li>
      </ul>
      <p>
        To learn how to manage cookies in your browser, visit:
      </p>
      <ul>
        <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Google Chrome</a></li>
        <li><a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" rel="noopener">Mozilla Firefox</a></li>
        <li><a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener">Safari</a></li>
        <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener">Microsoft Edge</a></li>
      </ul>

      <h3>Opt Out of Google Analytics</h3>
      <p>
        You can opt out of Google Analytics tracking by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-Out Browser Add-On</a>.
      </p>

      <h2>4. Do Not Track Signals</h2>
      <p>
        Some browsers have a "Do Not Track" (DNT) feature that signals to websites that you do not want to be tracked. We do not currently respond to DNT signals, but you can disable cookies as described above.
      </p>

      <h2>5. Third-Party Cookies</h2>
      <p>
        Third-party services we use (e.g., Google Analytics, Google Fonts) may set their own cookies. We do not control these cookies. Please review the privacy policies of these third-party services for more information.
      </p>

      <h2>6. Changes to This Cookie Policy</h2>
      <p>
        We may update this Cookie Policy from time to time. The "Effective Date" at the top indicates when it was last updated. We encourage you to review this page periodically.
      </p>

      <h2>7. Contact Us</h2>
      <p>If you have questions about this Cookie Policy, contact us:</p>
      <ul style="list-style:none;padding-left:0">
        <li><strong>Dog Lady's Pet Camp</strong></li>
        <li><?php echo $address['street']; ?></li>
        <li><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></li>
        <li>Phone: <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a></li>
        <li>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
      </ul>

      <hr style="margin:var(--space-3xl) 0;border:none;border-top:1px solid var(--color-line)">

      <p style="font-size:var(--fs-sm);color:var(--color-muted);font-style:italic">
        <strong>Disclaimer:</strong> 
      </p>

      <p style="margin-top:var(--space-2xl);font-size:var(--fs-sm);color:var(--color-muted)">
        <strong>Last Updated:</strong> <?php echo date('F j, Y'); ?>
      </p>

    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
