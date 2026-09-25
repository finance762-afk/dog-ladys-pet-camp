<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (Accessibility Statement) ---------- */
$currentPage     = 'legal';
$pageType        = 'other';
$pageTitle       = "Accessibility Statement | Dog Lady's Pet Camp";
$pageDescription = "Accessibility Statement for Dog Lady's Pet Camp. Our commitment to web accessibility and WCAG compliance.";
$metaDescription = $pageDescription;
$canonicalUrl    = $siteUrl . '/accessibility/';

$webPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Accessibility Statement',
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
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Accessibility', 'item' => $canonicalUrl]
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
        <h1>Accessibility Statement</h1>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container content-narrow legal-prose">

      <p class="effective-date">Effective Date: <?php echo date('F j, Y'); ?></p>

      <p>
        Dog Lady's Pet Camp is committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone and applying the relevant accessibility standards.
      </p>

      <h2>1. Conformance Status</h2>
      <p>
        The <a href="https://www.w3.org/WAI/WCAG21/quickref/" target="_blank" rel="noopener">Web Content Accessibility Guidelines (WCAG)</a> define requirements for designers and developers to improve accessibility for people with disabilities. We aim to conform to WCAG 2.1 Level AA standards.
      </p>

      <h2>2. Accessibility Features</h2>
      <p>Our website includes the following accessibility features:</p>
      <ul>
        <li><strong>Keyboard Navigation:</strong> All interactive elements can be accessed and operated using a keyboard.</li>
        <li><strong>Screen Reader Compatibility:</strong> Our website is designed to work with screen readers and assistive technologies.</li>
        <li><strong>Skip to Main Content Link:</strong> A "Skip to main content" link appears at the top of every page for keyboard and screen reader users.</li>
        <li><strong>Alt Text for Images:</strong> All meaningful images include descriptive alternative text.</li>
        <li><strong>Color Contrast:</strong> Text and interactive elements meet WCAG 2.1 AA color contrast requirements.</li>
        <li><strong>Focus Indicators:</strong> Keyboard focus is clearly visible on all interactive elements.</li>
        <li><strong>Semantic HTML:</strong> We use proper HTML structure and ARIA landmarks for navigation.</li>
        <li><strong>Responsive Design:</strong> Our website works on all devices and screen sizes.</li>
        <li><strong>Form Labels:</strong> All form fields have associated labels for screen readers.</li>
        <li><strong>Reduced Motion:</strong> We respect the "prefers-reduced-motion" setting to minimize animations for users who prefer reduced motion.</li>
      </ul>

      <h2>3. Known Limitations</h2>
      <p>
        Despite our best efforts, some parts of our website may not be fully accessible. We are working to address these issues:
      </p>
      <ul>
        <li>Some third-party embedded content (e.g., maps, social media widgets) may not be fully accessible.</li>
        <li>Some older images may lack descriptive alt text.</li>
      </ul>
      <p>
        We are committed to fixing these issues and improving accessibility across our website.
      </p>

      <h2>4. Assistive Technologies</h2>
      <p>
        Our website is designed to work with the following assistive technologies:
      </p>
      <ul>
        <li>Screen readers (JAWS, NVDA, VoiceOver)</li>
        <li>Keyboard-only navigation</li>
        <li>Voice recognition software</li>
        <li>Screen magnifiers</li>
      </ul>

      <h2>5. Feedback & Contact</h2>
      <p>
        We welcome feedback on the accessibility of our website. If you encounter an accessibility barrier or have suggestions for improvement, please contact us:
      </p>
      <ul style="list-style:none;padding-left:0">
        <li><strong>Dog Lady's Pet Camp</strong></li>
        <li><?php echo $address['street']; ?></li>
        <li><?php echo $address['city']; ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></li>
        <li>Phone: <a href="tel:<?php echo $phoneDigits; ?>"><?php echo $phone; ?></a></li>
        <li>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
      </ul>
      <p>
        We will respond to accessibility feedback within 5 business days and work to resolve issues as quickly as possible.
      </p>

      <h2>6. Technical Specifications</h2>
      <p>
        The accessibility of our website relies on the following technologies:
      </p>
      <ul>
        <li>HTML5</li>
        <li>CSS3</li>
        <li>JavaScript (with graceful degradation for users who disable JavaScript)</li>
        <li>ARIA (Accessible Rich Internet Applications)</li>
      </ul>

      <h2>7. Assessment & Testing</h2>
      <p>
        We assess the accessibility of our website using:
      </p>
      <ul>
        <li>Automated testing tools (WAVE, axe DevTools)</li>
        <li>Manual testing with keyboard navigation</li>
        <li>Screen reader testing (NVDA, VoiceOver)</li>
        <li>Color contrast checkers</li>
      </ul>

      <h2>8. Updates to This Statement</h2>
      <p>
        We may update this Accessibility Statement from time to time. The "Effective Date" at the top indicates when it was last updated.
      </p>

      <hr style="margin:var(--space-3xl) 0;border:none;border-top:1px solid var(--color-line)">

      <p style="font-size:var(--fs-sm);color:var(--color-muted);font-style:italic">
        <strong>Disclaimer:</strong> This Accessibility Statement is provided as a general template. We recommend reviewing this document with a licensed Ohio attorney before publication.
      </p>

      <p style="margin-top:var(--space-2xl);font-size:var(--fs-sm);color:var(--color-muted)">
        <strong>Last Updated:</strong> <?php echo date('F j, Y'); ?>
      </p>

    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
