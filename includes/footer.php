  </main>
  <!-- End main content -->

  <!-- Site Footer -->
  <footer class="site-footer">

    <div class="footer-top">
      <div class="container">
        <div class="footer-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:3rem 2.5rem;padding:clamp(3rem,6vw,5rem) 0 2.5rem">

          <!-- Column 1: Brand & Description -->
          <div class="footer-col">
            <a href="/" class="footer-logo" style="display:inline-flex;flex-direction:column;gap:.4rem;text-decoration:none;margin-bottom:1rem">
              <span style="font-family:var(--font-heading);font-weight:800;font-size:1.3rem;color:var(--color-ink)">
                Dog Lady's Pet Camp
              </span>
              <span style="font-family:var(--font-accent);font-size:.68rem;letter-spacing:.14em;text-transform:uppercase;color:var(--color-muted)">
                <?php echo htmlspecialchars($tagline); ?>
              </span>
            </a>

            <p style="margin-bottom:1.5rem;color:var(--color-ink-2);font-size:.95rem;line-height:1.6">
              <?php echo htmlspecialchars($description); ?>
            </p>

            <!-- Trust badges -->
            <div class="footer-trust" style="display:flex;flex-wrap:wrap;gap:.6rem">
              <div style="display:inline-flex;align-items:center;gap:.4rem;font-size:.82rem;font-weight:500;color:var(--color-ink-2);background:var(--color-surface);border:1px solid var(--color-line);border-radius:999px;padding:.38rem .8rem .38rem .6rem">
                <?php icon('check-circle', 16); ?>
                Serving Since <?php echo $yearEstablished; ?>
              </div>
              <div style="display:inline-flex;align-items:center;gap:.4rem;font-size:.82rem;font-weight:500;color:var(--color-ink-2);background:var(--color-surface);border:1px solid var(--color-line);border-radius:999px;padding:.38rem .8rem .38rem .6rem">
                <?php icon('award', 16); ?>
                <?php echo $yearsInBusiness; ?>+ Years Experience
              </div>
            </div>
          </div>

          <!-- Column 2: Services -->
          <div class="footer-col">
            <h4 style="font-family:var(--font-heading);font-weight:800;font-size:1rem;margin-bottom:1.2rem;color:var(--color-ink)">Services</h4>
            <nav aria-label="Services">
              <ul style="list-style:none;margin:0;padding:0;display:grid;gap:.5rem">
                <?php foreach ($services as $footSvc): ?>
                <li>
                  <a href="/<?php echo $footSvc['slug']; ?>/" style="color:var(--color-ink-2);text-decoration:none;font-size:.92rem;transition:color .15s">
                    <?php echo htmlspecialchars($footSvc['name']); ?>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </nav>
          </div>

          <!-- Column 3: Service Areas (if applicable) / Quick Links -->
          <div class="footer-col">
            <?php if (!empty($serviceAreas)): ?>
            <h4 style="font-family:var(--font-heading);font-weight:800;font-size:1rem;margin-bottom:1.2rem;color:var(--color-ink)">Service Areas</h4>
            <nav aria-label="Service Areas">
              <ul style="list-style:none;margin:0;padding:0;display:grid;gap:.5rem">
                <?php
                $displayAreas = array_slice($serviceAreas, 0, 5);
                foreach ($displayAreas as $footArea):
                  $areaSlug = getAreaSlug($footArea);
                  $areaPath = $_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug;
                  // Only link if the area page exists
                  if (is_dir($areaPath)):
                ?>
                <li>
                  <a href="/areas/<?php echo $areaSlug; ?>/" style="color:var(--color-ink-2);text-decoration:none;font-size:.92rem;transition:color .15s">
                    <?php echo htmlspecialchars($footArea); ?>
                  </a>
                </li>
                <?php endif; endforeach; ?>
                <?php if (count($serviceAreas) > 5): ?>
                <li>
                  <a href="/service-areas/" style="color:var(--color-primary);font-weight:600;text-decoration:none;font-size:.92rem">View All Areas →</a>
                </li>
                <?php endif; ?>
              </ul>
            </nav>
            <?php else: ?>
            <h4 style="font-family:var(--font-heading);font-weight:800;font-size:1rem;margin-bottom:1.2rem;color:var(--color-ink)">Quick Links</h4>
            <nav aria-label="Quick Links">
              <ul style="list-style:none;margin:0;padding:0;display:grid;gap:.5rem">
                <li><a href="/about/" style="color:var(--color-ink-2);text-decoration:none;font-size:.92rem">About</a></li>
                <li><a href="/contact/" style="color:var(--color-ink-2);text-decoration:none;font-size:.92rem">Contact</a></li>
                <?php if ($tier === 'premium'): ?>
                <li><a href="/faq/" style="color:var(--color-ink-2);text-decoration:none;font-size:.92rem">FAQ</a></li>
                <li><a href="/blog/" style="color:var(--color-ink-2);text-decoration:none;font-size:.92rem">Blog</a></li>
                <?php endif; ?>
              </ul>
            </nav>
            <?php endif; ?>
          </div>

          <!-- Column 4: Contact Info -->
          <div class="footer-col">
            <h4 style="font-family:var(--font-heading);font-weight:800;font-size:1rem;margin-bottom:1.2rem;color:var(--color-ink)">Contact Us</h4>

            <div style="display:grid;gap:1rem">
              <a href="tel:<?php echo $phoneDigits; ?>" class="link-call" style="display:inline-flex;align-items:center;gap:.5rem;font-weight:600;color:var(--color-ink);text-decoration:none">
                <?php icon('phone', 20); ?>
                <?php echo formatPhone($phone); ?>
              </a>

              <a href="mailto:<?php echo $email; ?>" style="display:inline-flex;align-items:center;gap:.5rem;color:var(--color-ink-2);text-decoration:none;font-size:.92rem">
                <?php icon('mail', 18); ?>
                <?php echo htmlspecialchars($email); ?>
              </a>

              <div style="display:flex;align-items:flex-start;gap:.5rem;color:var(--color-ink-2);font-size:.92rem">
                <?php icon('map-pin', 18); ?>
                <address style="font-style:normal;line-height:1.5">
                  <?php if ($address['street'] !== ''): ?>
                  <?php echo htmlspecialchars($address['street']); ?><br>
                  <?php endif; ?>
                  <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?>
                </address>
              </div>

              <?php if ($businessHours): ?>
              <div style="display:flex;align-items:flex-start;gap:.5rem;color:var(--color-ink-2);font-size:.92rem">
                <?php icon('clock', 18); ?>
                <div style="line-height:1.5"><?php echo htmlspecialchars($businessHours); ?></div>
              </div>
              <?php endif; ?>

              <a href="/contact/" class="btn btn-primary" style="margin-top:.5rem">Get Free Estimate</a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- AEO Entity Block -->
    <div class="footer-entity" style="border-top:1px solid var(--color-line);padding:1.5rem 0" itemscope itemtype="https://schema.org/LocalBusiness">
      <div class="container">
        <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
        <meta itemprop="url" content="<?php echo $siteUrl; ?>">
        <meta itemprop="telephone" content="<?php echo $phone; ?>">

        <p style="margin:0;font-size:.9rem;line-height:1.6;color:var(--color-ink-2);max-width:75ch">
          <strong><?php echo htmlspecialchars($siteName); ?></strong> is a dogs-only boarding and grooming facility located in <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?>, serving Franklin-area pet owners since <?php echo $yearEstablished; ?>. We offer professional dog grooming, overnight kennel boarding, bath and blow dry services, and specialized care for dogs of all breeds and sizes throughout <?php echo implode(', ', array_slice($serviceAreas, 0, 3)); ?>, and surrounding communities.
        </p>
      </div>
    </div>

    <!-- Footer Legal Row (v6.1 compliance) -->
    <div class="footer-legal-row" style="border-top:1px solid var(--color-line);padding:1.2rem 0">
      <div class="container">
        <nav aria-label="Legal" style="display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:.4rem 1rem;font-size:.82rem">
          <a href="/privacy-policy/" style="color:var(--color-ink-2);text-decoration:none">Privacy Policy</a>
          <span style="color:var(--color-line)">|</span>
          <a href="/terms/" style="color:var(--color-ink-2);text-decoration:none">Terms of Service</a>
          <span style="color:var(--color-line)">|</span>
          <a href="/cookie-policy/" style="color:var(--color-ink-2);text-decoration:none">Cookie Policy</a>
          <span style="color:var(--color-line)">|</span>
          <a href="/accessibility/" style="color:var(--color-ink-2);text-decoration:none">Accessibility</a>
          <span style="color:var(--color-line)">|</span>
          <a href="/privacy-policy/#ccpa-rights" style="color:var(--color-ink-2);text-decoration:none">Do Not Sell or Share My Personal Information</a>
          <span style="color:var(--color-line)">|</span>
          <a href="/sitemap.xml" style="color:var(--color-ink-2);text-decoration:none">Sitemap</a>
        </nav>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom-bar" style="padding:1.5rem 0;background:var(--color-paper-2)">
      <div class="container" style="display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:.8rem;font-size:.85rem;color:var(--color-muted)">
        <p style="margin:0">
          &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.
        </p>
        <p style="margin:0">
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank" style="color:var(--color-primary);font-weight:600;text-decoration:none">Web Design & Hosting by Page One Insights, LLC</a>
        </p>
      </div>
    </div>

    <?php
    // Verified Local Partner badge (2026-09-17 — auto-include on every build)
    include __DIR__ . '/partner-badge.php';
    ?>

  </footer>

  <!-- Back to Top Button -->
  <button id="back-to-top" class="back-to-top" style="position:fixed;right:1.5rem;bottom:1.5rem;width:48px;height:48px;border-radius:50%;background:var(--color-primary);color:#fff;border:0;cursor:pointer;opacity:0;visibility:hidden;transition:opacity .25s,visibility .25s,transform .2s;z-index:920;display:grid;place-items:center;box-shadow:var(--shadow-lg)" aria-label="Back to top">
    <?php icon('upload', 24); ?>
  </button>

  <!-- Mobile Sticky CTA Bar -->
  <div class="mobile-cta-bar" id="mobile-cta">
    <a href="tel:<?php echo $phoneDigits; ?>" class="mobile-cta-bar__call">
      <?php icon('phone', 20); ?>
      Call Now
    </a>
    <a href="/contact/" class="mobile-cta-bar__estimate">
      <?php icon('clipboard-list', 20); ?>
      Free Estimate
    </a>
  </div>

  <!-- Cookie Banner (v6.1) -->
  <div class="cookie-bar" id="cookie-bar" role="status" aria-live="polite">
    <p class="cookie-banner__text">
      We use cookies to improve your experience. By continuing, you accept our <a href="/cookie-policy/">Cookie Policy</a>.
    </p>
    <button class="cookie-banner__dismiss" id="cookie-dismiss" aria-label="Dismiss cookie notice">
      Got it
    </button>
  </div>

  <!-- Scripts (all defer, v6.3) -->
  <script src="/assets/js/main.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>
  <script src="/assets/js/effects.js" defer></script>

  <!-- Back to top inline script -->
  <script>
    // Back to top button
    const backToTop = document.getElementById('back-to-top');
    if (backToTop) {
      window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
          backToTop.style.opacity = '1';
          backToTop.style.visibility = 'visible';
        } else {
          backToTop.style.opacity = '0';
          backToTop.style.visibility = 'hidden';
        }
      });

      backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    // Cookie banner dismissal
    const cookieBar = document.getElementById('cookie-bar');
    const cookieDismiss = document.getElementById('cookie-dismiss');

    if (cookieBar && cookieDismiss) {
      // Check if user has dismissed the banner
      if (!localStorage.getItem('cookieBarDismissed')) {
        // Show banner after first scroll
        let scrolled = false;
        window.addEventListener('scroll', function showCookies() {
          if (!scrolled && window.scrollY > 100) {
            scrolled = true;
            cookieBar.classList.add('is-visible');
            window.removeEventListener('scroll', showCookies);
          }
        }, { passive: true });
      }

      // Dismiss handler
      cookieDismiss.addEventListener('click', () => {
        cookieBar.classList.remove('is-visible');
        localStorage.setItem('cookieBarDismissed', 'true');
      });
    }

    // Mobile CTA bar — show after hero leaves viewport
    const mobileCta = document.getElementById('mobile-cta');
    if (mobileCta) {
      const hero = document.querySelector('.hero, .hero-v7, .hero--interior');
      if (hero) {
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (!entry.isIntersecting) {
              mobileCta.classList.add('is-visible');
            } else {
              mobileCta.classList.remove('is-visible');
            }
          });
        }, { threshold: 0.1 });
        observer.observe(hero);
      }
    }
  </script>

</body>
</html>
