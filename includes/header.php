  <!-- Skip to content (accessibility) -->
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <!-- Site Header -->
  <header class="site-header" data-header>
    <div class="header-inner container">

      <!-- Logo (text-based — no logo file) -->
      <a href="/" class="site-logo brand" aria-label="<?php echo htmlspecialchars($siteName); ?> — Home">
        <div style="display:flex;flex-direction:column;gap:.3rem">
          <span class="brand-name"><?php echo htmlspecialchars($siteName); ?></span>
          <span class="brand-sub"><?php echo htmlspecialchars($tagline); ?></span>
        </div>
      </a>

      <!-- Desktop Navigation -->
      <nav aria-label="Main navigation">
        <ul class="navbar-links">
          <li>
            <a href="/" <?php if (isActivePage('home')) echo 'aria-current="page"'; ?>>Home</a>
          </li>

          <li class="has-dropdown">
            <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true">
              Services
              <?php icon('chevron-down', 16); ?>
            </button>
            <ul class="dropdown" role="menu" style="display:none">
              <?php foreach ($services as $navSvc): ?>
              <li role="none">
                <a href="/<?php echo $navSvc['slug']; ?>/" role="menuitem">
                  <?php echo htmlspecialchars($navSvc['name']); ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </li>

          <?php
          // Basic tier: no Service Areas main page, but link placeholder for future
          // Standard/Premium: would have Service Areas dropdown
          if ($tier !== 'basic' && !empty($serviceAreas)):
          ?>
          <li class="has-dropdown">
            <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true">
              Service Areas
              <?php icon('chevron-down', 16); ?>
            </button>
            <ul class="dropdown" role="menu" style="display:none">
              <?php foreach ($serviceAreas as $navArea):
                $areaSlug = getAreaSlug($navArea);
                $areaPath = $_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug;
                // Only link if the area page exists
                if (is_dir($areaPath)):
              ?>
              <li role="none">
                <a href="/areas/<?php echo $areaSlug; ?>/" role="menuitem">
                  <?php echo htmlspecialchars($navArea); ?>
                </a>
              </li>
              <?php endif; endforeach; ?>
            </ul>
          </li>
          <?php endif; ?>

          <li>
            <a href="/about/" <?php if (isActivePage('about')) echo 'aria-current="page"'; ?>>About</a>
          </li>

          <li>
            <a href="/contact/" <?php if (isActivePage('contact')) echo 'aria-current="page"'; ?>>Contact</a>
          </li>
        </ul>
      </nav>

      <!-- Desktop CTA -->
      <div class="navbar-cta">
        <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-outline-white navbar-phone link-call">
          <?php icon('phone', 18); ?>
          <?php echo formatPhone($phone); ?>
        </a>
        <a href="/contact/" class="btn btn-primary">Free Estimate</a>
      </div>

      <!-- Mobile Hamburger -->
      <button class="hamburger" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

    </div>
  </header>

  <!-- Mobile Menu (OUTSIDE header — fixed overlay) -->
  <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <nav aria-label="Mobile navigation">
      <ul>
        <li><a href="/">Home</a></li>

        <li>
          <a href="#">Services</a>
          <ul class="mobile-submenu">
            <?php foreach ($services as $navSvc): ?>
            <li><a href="/<?php echo $navSvc['slug']; ?>/"><?php echo htmlspecialchars($navSvc['name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>

        <?php if (!empty($serviceAreas)): ?>
        <li>
          <a href="#">Service Areas</a>
          <ul class="mobile-submenu">
            <?php foreach ($serviceAreas as $navArea):
              $areaSlug = getAreaSlug($navArea);
              $areaPath = $_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug;
              if (is_dir($areaPath)):
            ?>
            <li><a href="/areas/<?php echo $areaSlug; ?>/"><?php echo htmlspecialchars($navArea); ?></a></li>
            <?php endif; endforeach; ?>
          </ul>
        </li>
        <?php endif; ?>

        <li><a href="/about/">About</a></li>
        <li><a href="/contact/">Contact</a></li>
      </ul>
    </nav>

    <div class="mobile-menu-cta">
      <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-primary btn-block">
        <?php icon('phone', 20); ?>
        Call <?php echo formatPhone($phone); ?>
      </a>
      <a href="/contact/" class="btn btn-accent btn-block">Get Free Estimate</a>
    </div>
  </div>

  <!-- Main content wrapper -->
  <main id="main-content">
