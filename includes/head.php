<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  /**
   * includes/head.php — <head> section for all pages
   * Pages MUST set before including this file:
   *   $pageTitle — Unique page title
   *   $metaDescription — Unique meta description (140-160 chars)
   *   $canonicalUrl — Self-referencing canonical URL
   * Optional:
   *   $noindex — Set to true to add noindex meta tag
   *   $heroPreload — Array with 'srcset' and 'sizes' for hero image preload
   */

  // Load config if not already loaded
  if (!isset($siteName)) {
      require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
  }

  // Ensure page variables are set
  $pageTitle = $pageTitle ?? $siteName . ' | ' . $tagline;
  $metaDescription = $metaDescription ?? $description;
  $canonicalUrl = $canonicalUrl ?? $siteUrl;
  ?>

  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">

  <?php if (isset($noindex) && $noindex === true): ?>
  <meta name="robots" content="noindex, nofollow">
  <?php endif; ?>

  <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
  <meta property="og:locale" content="en_US">
  <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/images/main_image.webp')): ?>
  <meta property="og:image" content="<?php echo $siteUrl; ?>/assets/images/main_image.webp">
  <?php endif; ?>

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">

  <!-- Font preload (heading face only — above the fold) -->
  <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Critical CSS (inline) -->
  <style><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/critical.css'; ?></style>

  <!-- Framework CSS (non-blocking) -->
  <link rel="preload" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>"></noscript>

  <?php
  // Hero image preload (v6.3 — only when $heroPreload is set)
  if (isset($heroPreload) && !empty($heroPreload['srcset'])):
  ?>
  <link rel="preload" as="image" type="image/avif" imagesrcset="<?php echo htmlspecialchars($heroPreload['srcset']); ?>" imagesizes="<?php echo htmlspecialchars($heroPreload['sizes']); ?>" fetchpriority="high">
  <?php endif; ?>

  <!-- Google Analytics (placeholder — replace G-XXXXXXXXXX at launch) -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo $googleAnalyticsId; ?>');
  </script> -->

  <!-- JSON-LD Schema: LocalBusiness -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "@id": "<?php echo $siteUrl; ?>/#organization",
    "name": "<?php echo htmlspecialchars($siteName); ?>",
    "description": "<?php echo htmlspecialchars($description); ?>",
    "url": "<?php echo $siteUrl; ?>",
    "telephone": "<?php echo $phone; ?>",
    "email": "<?php echo $email; ?>",
    "address": {
      "@type": "PostalAddress",
      <?php if ($address['street'] !== ''): ?>"streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",<?php endif; ?>
      "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
      "addressRegion": "<?php echo htmlspecialchars($address['state']); ?>",
      "postalCode": "<?php echo htmlspecialchars($address['zip']); ?>",
      "addressCountry": "US"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "39.5478",
      "longitude": "-84.3041"
    },
    <?php if ($gbpUrl): ?>
    "hasMap": "<?php echo htmlspecialchars($gbpUrl); ?>",
    <?php endif; ?>
    <?php if ($businessHours): ?>
    "openingHours": "<?php echo htmlspecialchars($businessHours); ?>",
    <?php endif; ?>
    <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/images/main_image.webp')): ?>
    "image": "<?php echo $siteUrl; ?>/assets/images/main_image.webp",
    <?php endif; ?>
    "priceRange": "$$",
    "areaServed": [
      <?php
      $areaCount = count($serviceAreas);
      foreach ($serviceAreas as $index => $area):
      ?>
      {
        "@type": "City",
        "name": "<?php echo htmlspecialchars($area); ?>, <?php echo $address['state']; ?>"
      }<?php echo ($index < $areaCount - 1) ? ',' : ''; ?>
      <?php endforeach; ?>
    ],
    "makesOffer": [
      <?php
      $serviceCount = count($services);
      foreach ($services as $index => $service):
      ?>
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "<?php echo htmlspecialchars($service['name']); ?>",
          "description": "<?php echo htmlspecialchars($service['description']); ?>"
        }
      }<?php echo ($index < $serviceCount - 1) ? ',' : ''; ?>
      <?php endforeach; ?>
    ]
  }
  </script>
</head>
<body>
  <?php
  // Skip-to-content link is first element in header.php, not here
  ?>
