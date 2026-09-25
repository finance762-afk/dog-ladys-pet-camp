<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Terms of Service) ---------- */
$currentPage     = 'legal';
$pageType        = 'other';
$pageTitle       = "Terms of Service | Dog Lady's Pet Camp";
$pageDescription = "Terms of Service for Dog Lady's Pet Camp. Terms governing use of our website and services.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/terms/';

$webPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Terms of Service',
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
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms of Service', 'item' => $canonicalUrl]
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
        <h1>Terms of Service</h1>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container content-narrow legal-prose">

      <p class="effective-date">Effective Date: <?php echo date('F j, Y'); ?></p>

      <p>
        These Terms of Service ("Terms") govern your use of the Dog Lady's Pet Camp website and services. By using our website or services, you agree to these Terms. If you do not agree, do not use our website or services.
      </p>

      <h2>1. Services Provided</h2>
      <p>
        Dog Lady's Pet Camp provides dog boarding and grooming services in Franklin, Ohio. All services are subject to availability and our sole discretion. We reserve the right to refuse service to any customer or dog for any reason.
      </p>

      <h2>2. Booking & Cancellation</h2>
      <p>
        <strong>Reservations:</strong> Boarding and grooming appointments must be scheduled in advance. Reservations are confirmed upon receipt of your contact information and our verbal or written confirmation.
      </p>
      <p>
        <strong>Cancellations:</strong> Please provide at least 24 hours' notice for cancellations. Late cancellations may be subject to a cancellation fee at our discretion.
      </p>

      <h2>3. Health & Vaccination Requirements</h2>
      <p>
        Dogs must be up to date on the vaccinations Dog Lady's Pet Camp requires at the time of booking; ask when you reserve and bring current records to check-in. Dogs showing signs of illness will not be accepted for boarding or grooming.
      </p>

      <h2>4. Liability & Assumption of Risk</h2>
      <p>
        While we take every precaution to ensure the safety and well-being of your dog, you acknowledge that dog boarding and grooming carry inherent risks, including injury, illness, or escape. By using our services, you assume these risks.
      </p>
      <p>
        <strong>Limitation of Liability:</strong> Dog Lady's Pet Camp is not liable for any injury, illness, death, or loss of your dog except in cases of gross negligence or willful misconduct. Our total liability is limited to the cost of the services provided.
      </p>

      <h2>5. Payment Terms</h2>
      <p>
        Payment is due at the time of service unless otherwise agreed upon. We accept cash, check, and major credit cards. Returned checks may incur a fee.
      </p>

      <h2>6. Emergency Veterinary Care</h2>
      <p>
        In the event of a medical emergency, we will make every effort to contact you. If we cannot reach you, we reserve the right to seek veterinary care on your behalf. You agree to reimburse us for any veterinary expenses incurred.
      </p>

      <h2>7. Lost or Stolen Items</h2>
      <p>
        While we take reasonable care of your dog's belongings (leashes, toys, bedding, etc.), we are not responsible for lost, stolen, or damaged items.
      </p>

      <h2>8. Website Use</h2>
      <p>
        You may use our website for lawful purposes only. You agree not to:
      </p>
      <ul>
        <li>Use the website in any way that violates applicable laws</li>
        <li>Attempt to gain unauthorized access to our systems</li>
        <li>Transmit viruses, malware, or harmful code</li>
        <li>Harass, abuse, or harm others</li>
      </ul>

      <h2>9. Intellectual Property</h2>
      <p>
        All content on this website, including text, images, logos, and design, is the property of Dog Lady's Pet Camp and is protected by copyright and trademark laws. You may not reproduce, distribute, or use our content without permission.
      </p>

      <h2>10. Links to Third-Party Websites</h2>
      <p>
        Our website may contain links to third-party websites. We are not responsible for the content, privacy practices, or terms of those websites.
      </p>

      <h2>11. Disclaimer of Warranties</h2>
      <p>
        Our website and services are provided "as is" and "as available" without warranties of any kind, either express or implied. We do not guarantee that our website will be uninterrupted, error-free, or secure.
      </p>

      <h2>12. Indemnification</h2>
      <p>
        You agree to indemnify and hold harmless Dog Lady's Pet Camp, its owner, and employees from any claims, damages, or expenses arising out of your use of our services or website.
      </p>

      <h2>13. Governing Law & Dispute Resolution</h2>
      <p>
        These Terms are governed by the laws of the State of Ohio. Any disputes arising out of these Terms or our services will be resolved in the courts of Warren County, Ohio.
      </p>

      <h2>14. Changes to These Terms</h2>
      <p>
        We may update these Terms from time to time. The "Effective Date" at the top indicates when they were last updated. Continued use of our website or services after changes constitutes acceptance of the updated Terms.
      </p>

      <h2>15. Contact Us</h2>
      <p>If you have questions about these Terms, contact us:</p>
      <ul style="list-style:none;padding-left:0">
        <li><strong>Dog Lady's Pet Camp</strong></li>
        <li><?php echo $address['street']; ?></li>
        <li><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></li>
        <li>Phone: <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a></li>
        <li>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
      </ul>

      <hr style="margin:var(--space-3xl) 0;border:none;border-top:1px solid var(--color-line)">

      <p style="font-size:var(--fs-sm);color:var(--color-muted);font-style:italic">
        <strong>Disclaimer:</strong> These Terms of Service are provided as a general template. We recommend reviewing this document with a licensed Ohio attorney before publication to ensure compliance with all applicable state and federal laws.
      </p>

      <p style="margin-top:var(--space-2xl);font-size:var(--fs-sm);color:var(--color-muted)">
        <strong>Last Updated:</strong> <?php echo date('F j, Y'); ?>
      </p>

    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
