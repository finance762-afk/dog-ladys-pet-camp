<?php
/**
 * includes/functions.php — Helper functions for Dog Lady's Pet Camp
 * Read by every page. DO NOT echo output here (breaks header/API responses).
 */

if (!function_exists('isActivePage')) {
    /**
     * Check if the given page slug matches the current page
     * @param string $page Page slug to check (e.g., 'home', 'about', 'services')
     * @return bool
     */
    function isActivePage($page) {
        global $currentPage;
        return isset($currentPage) && $currentPage === $page;
    }
}

if (!function_exists('formatPhone')) {
    /**
     * Format phone number for display
     * @param string $phone Raw phone number
     * @return string Formatted phone number
     */
    function formatPhone($phone) {
        // Strip non-digits
        $digits = preg_replace('/\D/', '', $phone);

        // Format as (XXX) XXX-XXXX if 10 digits
        if (strlen($digits) === 10) {
            return sprintf('(%s) %s-%s',
                substr($digits, 0, 3),
                substr($digits, 3, 3),
                substr($digits, 6, 4)
            );
        }

        return $phone; // Return as-is if not 10 digits
    }
}

if (!function_exists('getServiceSlug')) {
    /**
     * Convert service name to URL-safe slug
     * @param string $name Service name
     * @return string URL slug
     */
    function getServiceSlug($name) {
        $slug = strtolower($name);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }
}

if (!function_exists('getAreaSlug')) {
    /**
     * Convert city name to URL-safe slug
     * @param string $city City name
     * @return string URL slug
     */
    function getAreaSlug($city) {
        $slug = strtolower($city);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }
}

if (!function_exists('generateServiceSchema')) {
    /**
     * Generate JSON-LD Service schema for a specific service
     * @param array $service Service data from config
     * @return string JSON-LD script tag
     */
    function generateServiceSchema($service) {
        global $siteName, $siteUrl, $address, $phone;

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service['name'],
            'description' => $service['description'],
            'provider' => [
                '@id' => $siteUrl . '/#organization'
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => $address['city'] . ', ' . $address['state']
            ]
        ];

        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}

if (!function_exists('generateFAQSchema')) {
    /**
     * Generate JSON-LD FAQPage schema
     * @param array $faqs Array of FAQ items with 'q' and 'a' keys
     * @return string JSON-LD script tag
     */
    function generateFAQSchema($faqs) {
        $mainEntity = [];

        foreach ($faqs as $faq) {
            $mainEntity[] = [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a']
                ]
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $mainEntity
        ];

        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}

if (!function_exists('generateMetaTags')) {
    /**
     * Generate meta tags for a page (helper - head.php uses variables directly)
     * @param string $title Page title
     * @param string $description Meta description
     * @param string $canonical Canonical URL
     * @return array Meta tag data
     */
    function generateMetaTags($title, $description, $canonical) {
        return [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical
        ];
    }
}

if (!function_exists('icon')) {
    /**
     * Output an inline SVG icon from the Lucide library
     * @param string $name Icon name (e.g., 'phone', 'mail', 'check')
     * @param int $size Icon size in pixels (default 24)
     * @return void Echoes the SVG markup
     */
    function icon($name, $size = 24) {
        $iconPath = $_SERVER['DOCUMENT_ROOT'] . '/../crm/references/lucide-icons/' . $name . '.svg';

        if (file_exists($iconPath)) {
            $svg = file_get_contents($iconPath);
            // Add aria-hidden and set size
            $svg = str_replace('<svg', '<svg aria-hidden="true" width="' . $size . '" height="' . $size . '"', $svg);
            echo $svg;
        } else {
            // Fallback: empty span if icon not found
            echo '<span aria-hidden="true" style="display:inline-block;width:' . $size . 'px;height:' . $size . 'px"></span>';
        }
    }
}
