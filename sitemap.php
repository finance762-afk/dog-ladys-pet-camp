<?php
/**
 * sitemap.php — Dynamic XML sitemap for Dog Lady's Pet Camp
 * REWRITE: .htaccess already rewrites /sitemap.xml to /sitemap.php so external
 * URLs still reference /sitemap.xml. This file generates the page list dynamically
 * from config.php ($services, $serviceAreas) plus static pages, so new services
 * appear without editing the sitemap manually.
 */

require_once __DIR__ . '/includes/config.php';

// Set XML content-type header
header('Content-Type: application/xml; charset=utf-8');

// Base URL
$baseUrl = $siteUrl;

// Page registry — each entry: [path, priority, changefreq, lastmod]
$pages = [];

// Homepage
$pages[] = ['/', 1.0, 'weekly', date('Y-m-d')];

// Static pages
$pages[] = ['/about/', 0.7, 'monthly', date('Y-m-d')];
$pages[] = ['/contact/', 0.7, 'monthly', date('Y-m-d')];
$pages[] = ['/services/', 0.8, 'weekly', date('Y-m-d')];
$pages[] = ['/service-area/', 0.6, 'monthly', date('Y-m-d')];

// Service pages (dynamic from config.php $services)
foreach ($services as $svc) {
    $pages[] = ['/' . $svc['slug'] . '/', 0.8, 'monthly', date('Y-m-d')];
}

// Legal pages (v6.1 compliance — required, priority 0.3, changefreq yearly)
$pages[] = ['/privacy-policy/', 0.3, 'yearly', date('Y-m-d')];
$pages[] = ['/terms/', 0.3, 'yearly', date('Y-m-d')];
$pages[] = ['/cookie-policy/', 0.3, 'yearly', date('Y-m-d')];
$pages[] = ['/accessibility/', 0.3, 'yearly', date('Y-m-d')];

// Thank-you page (noindexed, but included in sitemap for completeness)
$pages[] = ['/thank-you/', 0.1, 'yearly', date('Y-m-d')];

// Output XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $page): ?>
  <url>
    <loc><?php echo htmlspecialchars($baseUrl . $page[0]); ?></loc>
    <lastmod><?php echo $page[3]; ?></lastmod>
    <changefreq><?php echo $page[2]; ?></changefreq>
    <priority><?php echo number_format($page[1], 1); ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
