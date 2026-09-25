<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Privacy Policy) ---------- */
$currentPage     = 'legal';
$pageType        = 'other';
$pageTitle       = "Privacy Policy | Dog Lady's Pet Camp";
$pageDescription = "Privacy Policy for Dog Lady's Pet Camp. How we collect, use, and protect your personal information.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/privacy-policy/';

/* WebPage + Breadcrumb schema */
$webPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Privacy Policy',
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
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Privacy Policy', 'item' => $canonicalUrl]
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
  .effective-date { display: inline-block; background: var(--color-surface); padding: var(--space-sm) var(--space-lg); border-radius: var(--radius); font-weight: 600; margin-bottom: var(--space-2xl); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <section class="hero hero--interior hero--legal section">
    <div class="container">
      <div class="hero-copy" style="max-width:65ch;margin:0 auto;text-align:center">
        <p class="eyebrow">Legal</p>
        <h1>Privacy Policy</h1>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container content-narrow legal-prose">

      <p class="effective-date">Effective Date: <?php echo date('F j, Y'); ?></p>

      <p>
        This Privacy Policy describes how Dog Lady's Pet Camp ("we," "us," or "our") collects, uses, and protects your personal information when you use our website, submit forms, or contact us about our dog boarding and grooming services.
      </p>

      <h2>1. Information We Collect</h2>
      <p>We collect the following types of information:</p>
      <ul>
        <li><strong>Contact Information:</strong> Name, phone number, email address, and mailing address when you submit a contact form or request services.</li>
        <li><strong>Service Information:</strong> Details about the services you're interested in (boarding, grooming, etc.) and information about your dog.</li>
        <li><strong>Communications:</strong> Records of your communications with us, including emails, phone calls, and form submissions.</li>
        <li><strong>Website Usage:</strong> IP address, browser type, pages visited, and time spent on our site, collected via Google Analytics.</li>
      </ul>

      <h2>2. How We Use Your Information</h2>
      <p>We use your information to:</p>
      <ul>
        <li>Respond to your inquiries and schedule appointments</li>
        <li>Provide dog boarding and grooming services</li>
        <li>Send service-related communications (appointment confirmations, reminders)</li>
        <li>Send marketing emails (only if you opt in)</li>
        <li>Send SMS text messages (only if you opt in)</li>
        <li>Improve our website and services</li>
        <li>Comply with legal obligations</li>
      </ul>

      <h2>3. Consent & Opt-In</h2>
      <p>
        <strong>Email Marketing:</strong> We will only send you marketing emails if you check the opt-in box on our contact form. You can unsubscribe at any time using the link in any email.
      </p>
      <p>
        <strong>SMS Text Messages:</strong> We will only send you SMS text messages about your service request if you check the SMS opt-in box on our contact form. Consent to receive texts is not a condition of purchase. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
      </p>
      <p>
        <strong>Terms Acceptance:</strong> By submitting a contact form, you agree to our Privacy Policy and Terms of Service.
      </p>

      <h2>4. How We Share Your Information</h2>
      <p>We do not sell, rent, or trade your personal information. We may share your information with:</p>
      <ul>
        <li><strong>Service Providers:</strong> Third-party services that help us operate our website and business (e.g., Formsubmit.co for form handling, Google Analytics for website analytics).</li>
        <li><strong>Legal Compliance:</strong> Law enforcement or regulatory authorities when required by law.</li>
      </ul>

      <h2>5. Cookies & Tracking Technologies</h2>
      <p>We use cookies and similar technologies to:</p>
      <ul>
        <li>Analyze website traffic and usage patterns via Google Analytics</li>
        <li>Remember your preferences</li>
        <li>Improve website performance</li>
      </ul>
      <p>
        You can control cookies through your browser settings. For more information, see our <a href="/cookie-policy/">Cookie Policy</a>.
      </p>

      <h2>6. Data Security</h2>
      <p>
        We take reasonable measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, no internet transmission is 100% secure, and we cannot guarantee absolute security.
      </p>

      <h2>7. Data Retention</h2>
      <p>
        We retain your personal information for as long as necessary to provide our services and comply with legal obligations. Contact form submissions are retained indefinitely unless you request deletion.
      </p>

      <h2>8. Your Rights</h2>
      <p>Depending on your location, you may have the following rights:</p>
      <ul>
        <li><strong>Access:</strong> Request a copy of the personal information we hold about you.</li>
        <li><strong>Correction:</strong> Request correction of inaccurate or incomplete information.</li>
        <li><strong>Deletion:</strong> Request deletion of your personal information.</li>
        <li><strong>Opt-Out:</strong> Opt out of marketing emails or SMS messages at any time.</li>
        <li><strong>Do Not Sell or Share:</strong> Opt out of the "sale" or "sharing" of your personal information (we do not sell or share personal information).</li>
      </ul>
      <p id="ccpa-rights">
        <strong>California Residents (CCPA/CPRA):</strong> You have the right to request disclosure of what personal information we collect, use, and share, and the right to request deletion. To exercise these rights, contact us at <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> or call <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a>.
      </p>

      <h2>9. Children's Privacy</h2>
      <p>
        Our website and services are not directed at children under 13. We do not knowingly collect personal information from children under 13. If we learn that we have collected information from a child under 13, we will delete it.
      </p>

      <h2>10. Changes to This Policy</h2>
      <p>
        We may update this Privacy Policy from time to time. The "Effective Date" at the top of this page indicates when it was last updated. We encourage you to review this page periodically.
      </p>

      <h2>11. Contact Us</h2>
      <p>If you have questions about this Privacy Policy or want to exercise your rights, contact us:</p>
      <ul style="list-style:none;padding-left:0">
        <li><strong>Dog Lady's Pet Camp</strong></li>
        <li><?php echo $address['street']; ?></li>
        <li><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></li>
        <li>Phone: <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a></li>
        <li>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
      </ul>

      <hr style="margin:var(--space-3xl) 0;border:none;border-top:1px solid var(--color-line)">

      <p style="font-size:var(--fs-sm);color:var(--color-muted);font-style:italic">
        <strong>Disclaimer:</strong> This Privacy Policy is provided as a general template. We recommend reviewing this document with a licensed Ohio attorney before publication to ensure compliance with all applicable state and federal laws.
      </p>

      <p style="margin-top:var(--space-2xl);font-size:var(--fs-sm);color:var(--color-muted)">
        <strong>Last Updated:</strong> <?php echo date('F j, Y'); ?>
      </p>

    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
