<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------- Page-level setup (homepage) ---------- */
$currentPage     = 'home';
$pageType        = 'home';                       // v6.3 attribution page identity
$pageTitle       = "Dog Boarding & Grooming in Franklin, OH | Dog Lady's Pet Camp";
$pageDescription = "Dog Lady's Pet Camp is a dogs-only boarding and grooming facility in Franklin, OH, owner-operated by April Davidson and caring for local pups since 2000. Call (937) 743-9956.";
$metaDescription = $pageDescription;   // head.php reads $metaDescription
$canonicalUrl    = $siteUrl . '/';

/* ---------------------------------------------------------------------------
 * PHOTOS — CLIENT PHOTO SLOT (read this before adding images)
 * The client supplied ONE usable photo (the two GBP cover files
 * gbp-6-4622-… and gbp-6-4da1-… are byte-identical copies of the same dog on
 * grass). It is used exactly ONCE on this page: the hero below. The service
 * cards and the about split deliberately use branded icon panels instead of
 * repeating it. When April sends real photos, see the "CLIENT PHOTO SLOT"
 * comments at the service cards and the about split, and the PHOTOS block in
 * includes/config.php.
 * ------------------------------------------------------------------------- */
$heroImage    = 'gbp-6-4622-9af7-147f52a3bb34.jpg';
$heroImageAlt = "A freshly groomed dog sitting on the grass at Dog Lady's Pet Camp in Franklin, OH";
$heroPreload  = [
    'srcset' => '/assets/images/gbp-6-4622-9af7-147f52a3bb34-480.avif 480w, /assets/images/gbp-6-4622-9af7-147f52a3bb34-960.avif 960w',
    'sizes'  => '(max-width: 900px) 100vw, 50vw',
];

/* Homepage FAQs — grounded in this business's real services & intake (no invented features) */
$homeFaqs = [
    [
        'q' => "What services does Dog Lady's Pet Camp offer in Franklin, OH?",
        'a' => "Dog Lady's Pet Camp offers overnight kennel boarding and full-service dog grooming in Franklin, Ohio. Grooming includes bath and blow dry, brush-out and undercoat removal, and nail trimming for dogs of every breed and coat type.",
    ],
    [
        'q' => "Do you board and groom dogs of all breeds and sizes?",
        'a' => "Yes. Dog Lady's Pet Camp cares for dogs of all breeds and sizes, from small companions to large double-coated breeds. Grooming is tailored to each dog's coat, and boarding is matched to the individual dog's routine and comfort.",
    ],
    [
        'q' => "Is Dog Lady's Pet Camp a dogs-only facility?",
        'a' => "Yes. Dog Lady's Pet Camp is a dogs-only boarding and grooming facility. Focusing solely on dogs keeps the environment calmer and more predictable, and lets April give each guest the personal attention that keeps them relaxed.",
    ],
    [
        'q' => "Which areas around Franklin do you serve?",
        'a' => "Dog Lady's Pet Camp serves Franklin, Ohio and the surrounding communities of Springboro, Middletown, Carlisle, Lebanon, and Miamisburg. The facility is located at 4265 Pennyroyal Rd in Franklin, an easy drive from anywhere in southern Warren County.",
    ],
    [
        'q' => "How do I book boarding or a grooming appointment?",
        'a' => "Call Dog Lady's Pet Camp at (937) 743-9956 or send a request through the form on this page. Booking ahead is recommended for grooming and strongly encouraged for boarding around holidays and busy travel weeks, when kennel space fills quickly.",
    ],
    [
        'q' => "Who will be caring for my dog?",
        'a' => "Your dog is cared for by owner April Davidson, who has decades of hands-on grooming and veterinary-aide experience and has run Dog Lady's Pet Camp since 2000. It is an owner-operated business, so the person you meet is the person looking after your dog.",
    ],
];

/* Service icon + copy map for the homepage services grid (icons from references/lucide-icons/) */
$homeServiceCards = [
    [
        'slug'  => 'dog-boarding-overnight-kennel',
        'name'  => 'Dog Boarding (Overnight Kennel)',
        'icon'  => 'home',
        'desc'  => 'Comfortable overnight kennel stays for dogs of every breed and size.',
        'bullets' => ['Fresh water & regular breaks', 'Quiet evening routine', 'All breeds & sizes welcome'],
    ],
    [
        'slug'  => 'dog-grooming',
        'name'  => 'Dog Grooming',
        'icon'  => 'scissors',
        'desc'  => 'Full-service grooming shaped to your dog\'s breed and coat type.',
        'bullets' => ['Breed-specific styling', 'Every coat type', 'Decades of experience'],
    ],
    [
        'slug'  => 'bath-blow-dry',
        'name'  => 'Bath & Blow Dry',
        'icon'  => 'droplets',
        'desc'  => 'A thorough bath and full blow-dry that leaves your dog fresh and clean.',
        'bullets' => ['Deep-clean bath', 'Full blow-dry finish', 'Gentle, low-stress'],
    ],
    [
        'slug'  => 'brush-out-undercoat-removal',
        'name'  => 'Brush-Out & Undercoat Removal',
        'icon'  => 'layers',
        'desc'  => 'Deep brush-out and undercoat removal that cuts shedding at home.',
        'bullets' => ['Less shedding at home', 'Great for double coats', 'Keeps dogs comfortable'],
    ],
    [
        'slug'  => 'nail-trimming',
        'name'  => 'Nail Trimming',
        'icon'  => 'check-circle',
        'desc'  => 'Quick, calm nail trims that keep your dog walking comfortably.',
        'bullets' => ['Fast & low-stress', 'Steady, gentle handling', 'Add-on or standalone'],
    ],
];

/* Schema — FAQPage (LocalBusiness lives in head.php) */
$schemaMarkup = generateFAQSchema($homeFaqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific styles (token-only; homepage composition) -->
<style id="home-page-styles">
  .home-hero { background: var(--color-paper); }
  .home-hero .hero-visual__img { object-position: 50% 30%; }
  .home-proof .stat-item span.stat-label { max-width: 22ch; }
  .home-services .services-grid { margin-top: clamp(var(--space-lg), 3vw, var(--space-2xl)); }
  .home-about .about-right::before {
    content: ""; position: absolute; inset: calc(-1 * var(--space-md)) calc(-1 * var(--space-md)) auto auto;
    width: 62%; aspect-ratio: 1; border: 2px solid var(--color-accent); border-radius: var(--radius-lg);
    z-index: 0; pointer-events: none;
  }
  /* Branded service-card covers — one client photo on file, so a brand-coloured
     panel with the service icon stands in for a photo (same pattern as other v7 builds). */
  .home-services .svc-cover { position: absolute; inset: 0; display: grid; place-items: center; overflow: hidden; }
  .home-services .svc-cover svg { width: 76px; height: 76px; color: rgba(255,255,255,.94); position: relative; z-index: 1; }
  .home-services .svc-cover::before { content: ""; position: absolute; inset: 0; background: radial-gradient(130% 120% at 12% 0%, rgba(255,255,255,.22), transparent 55%); }
  .home-services .svc-cover::after { content: ""; position: absolute; right: -30px; bottom: -30px; width: 150px; height: 150px; border: 18px solid rgba(255,255,255,.10); border-radius: 50%; }
  .home-services .svc-cover--1 { background: linear-gradient(140deg, color-mix(in srgb, var(--color-primary) 82%, black), var(--color-primary)); }
  .home-services .svc-cover--2 { background: linear-gradient(140deg, var(--color-secondary), color-mix(in srgb, var(--color-secondary) 62%, black)); }
  .home-services .svc-cover--3 { background: linear-gradient(140deg, var(--color-accent), var(--color-accent-dark)); }
  .home-services .services-grid--featured > :first-child .svc-cover svg { width: 110px; height: 110px; }
  /* About split — branded panel stands in for a second photo until client photos arrive */
  .home-about .about-panel { position: relative; z-index: 1; border-radius: var(--radius-lg); overflow: hidden; padding: clamp(1.5rem, 3vw, 2.25rem); color: #fff; background: linear-gradient(150deg, var(--color-primary), color-mix(in srgb, var(--color-primary) 55%, black)); box-shadow: var(--shadow-lg); display: grid; gap: 1rem; }
  .home-about .about-panel__eyebrow { font-family: var(--font-accent); font-weight: 700; letter-spacing: .14em; text-transform: uppercase; font-size: .78rem; color: var(--color-accent-bright); }
  .home-about .about-panel__quote { font-family: var(--font-heading); font-weight: 800; font-size: 1.45rem; line-height: 1.25; margin: 0; color: #fff; }
  .home-about .about-panel__list { list-style: none; margin: 0; padding: .4rem 0 0; display: grid; gap: .7rem; border-top: 1px solid rgba(255,255,255,.16); }
  .home-about .about-panel__list li { display: flex; gap: .6rem; align-items: flex-start; font-size: .95rem; color: rgba(255,255,255,.9); }
  .home-about .about-panel__list svg { color: var(--color-accent-bright); flex: 0 0 auto; margin-top: 2px; }
  .home-about .about-right .about-stat-card { color: var(--color-ink); }
  @media (max-width: 900px) { .home-about .about-right .about-stat-card { position: static; margin: 1rem 0 0; width: max-content; } }
  .home-cta { background: linear-gradient(115deg, var(--color-dark) 0%, var(--color-dark-alt) 55%, var(--color-primary-deep) 130%); color: #fff; }
  .home-cta h2, .home-cta p { color: #fff; }
  .home-estimate .estimate-grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: clamp(var(--space-lg), 4vw, var(--space-3xl)); align-items: start; }
  @media (max-width: 900px) { .home-estimate .estimate-grid { grid-template-columns: 1fr; } }
  .home-hero h1, .home-services h2, .home-about h2, .home-cta h2, .home-estimate h2, .section-head h2, .faq summary { text-wrap: balance; }
  .home-services .service-card__desc, .home-about p { text-wrap: pretty; }
</style>

<?php
echo $schemaMarkup . "\n";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--light home-hero" aria-label="Introduction">
  <div class="container">
    <div class="hero-grid hero-grid--visual">

      <div class="hero-text">
        <span class="eyebrow">Franklin, OH &middot; Since 2000</span>
        <h1 class="hero-title">Dog <span class="text-accent">boarding &amp; grooming</span> in Franklin, Ohio</h1>
        <p class="hero-answer">Dog Lady's Pet Camp is a dogs-only boarding and grooming facility in Franklin, OH, owner-operated by April Davidson and caring for local pups since 2000. From overnight kennel stays while you travel to a full groom, your dog gets the personal attention of someone who treats them like their own.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneDigits; ?>"><?php icon('phone', 18); ?> or call <?php echo formatPhone($phone); ?></a>
        </div>

        <ul class="hero-chips">
          <li><?php icon('badge-check', 16); ?> Owner-operated</li>
          <li><?php icon('home', 16); ?> Dogs only</li>
          <li><?php icon('check-circle', 16); ?> All breeds &amp; sizes</li>
        </ul>
      </div>

      <div class="hero-visual">
        <div class="hero-visual__img">
          <picture>
            <source type="image/avif" srcset="/assets/images/gbp-6-4622-9af7-147f52a3bb34-480.avif 480w, /assets/images/gbp-6-4622-9af7-147f52a3bb34-960.avif 960w" sizes="(max-width: 900px) 100vw, 50vw">
            <img src="/assets/images/<?php echo $heroImage; ?>"
                 srcset="/assets/images/gbp-6-4622-9af7-147f52a3bb34-480.webp 480w, /assets/images/gbp-6-4622-9af7-147f52a3bb34-960.webp 960w"
                 sizes="(max-width: 900px) 100vw, 50vw"
                 alt="<?php echo htmlspecialchars($heroImageAlt); ?>"
                 width="408" height="482" loading="eager" fetchpriority="high">
          </picture>
        </div>
        <div class="photo-stack__tag">
          <b>Since 2000</b>
          <span>Dogs-only care in Franklin, OH</span>
        </div>

        <aside class="hero-form-card" id="estimate-form">
          <h2>Get a free estimate</h2>
          <p class="hero-form-tagline">No obligation. Same-day reply.</p>
          <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
            <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
            <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
            <input type="hidden" name="form_location" value="hero">
            <?php echo p1_attribution_fields('hero'); ?>
            <input type="hidden" name="consent_version" value="v2.1">
            <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
            <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
            <div class="form-row">
              <label class="sr-only" for="hero-service">Service</label>
              <select id="hero-service" name="service">
                <option value="">What do you need?</option>
                <?php foreach ($services as $heroSvc): ?>
                <option value="<?php echo htmlspecialchars($heroSvc['name']); ?>"><?php echo htmlspecialchars($heroSvc['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span></label>
            <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
          </form>
        </aside>
      </div>

    </div>
  </div>
</section>

<!-- ============================ TICKER STRIP ============================ -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <span><?php icon('check-circle', 18); ?> Serving Franklin since 2000</span>
    <span><?php icon('home', 18); ?> Dogs-only boarding</span>
    <span><?php icon('scissors', 18); ?> Full-service grooming</span>
    <span><?php icon('badge-check', 18); ?> Owner-operated</span>
    <span><?php icon('droplets', 18); ?> Bath &amp; blow dry</span>
    <span><?php icon('star', 18); ?> All breeds &amp; sizes</span>
    <span><?php icon('map-pin', 18); ?> Springboro &middot; Middletown &middot; Lebanon</span>
    <!-- duplicate for seamless loop -->
    <span><?php icon('check-circle', 18); ?> Serving Franklin since 2000</span>
    <span><?php icon('home', 18); ?> Dogs-only boarding</span>
    <span><?php icon('scissors', 18); ?> Full-service grooming</span>
    <span><?php icon('badge-check', 18); ?> Owner-operated</span>
    <span><?php icon('droplets', 18); ?> Bath &amp; blow dry</span>
    <span><?php icon('star', 18); ?> All breeds &amp; sizes</span>
    <span><?php icon('map-pin', 18); ?> Springboro &middot; Middletown &middot; Lebanon</span>
  </div>
</div>

<!-- ============================ PROOF STRIP ============================ -->
<section class="stats-band home-proof" aria-label="Why owners choose Dog Lady's Pet Camp">
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <span class="stat-number">Est. <span>2000</span></span>
        <span class="stat-label">Caring for Franklin-area dogs</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>Owner</span>-Operated</span>
        <span class="stat-label">Hands-on care from April Davidson</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>Dogs</span> Only</span>
        <span class="stat-label">A calmer, more focused facility</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">All <span>Breeds</span></span>
        <span class="stat-label">Grooming for every size &amp; coat type</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICES ============================ -->
<section class="section home-services" aria-label="Dog boarding and grooming services">
  <div class="container-wide">
    <div class="section-head reveal-up">
      <span class="eyebrow">What We Do</span>
      <h2>What can <span class="text-accent">Dog Lady's Pet Camp</span> do for your dog in Franklin?</h2>
      <p class="hero-answer">Dog Lady's Pet Camp handles the two things Franklin dog owners need most: safe overnight boarding while you travel and professional grooming that keeps your dog clean, comfortable, and looking their best &mdash; all under one dogs-only roof.</p>
    </div>

    <div class="services-grid services-grid--featured">
      <?php foreach ($homeServiceCards as $i => $sc):
        $tint  = ($i % 3) + 1;          // 1,2,3,1,2
        $delay = ($i % 3) + 1;
        $featured = ($i === 0) ? ' data-featured-label="Most requested"' : '';
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>"<?php echo $featured; ?>>
        <?php /* CLIENT PHOTO SLOT — service cards.
                 Only one client photo exists today, so each card shows a branded icon
                 panel. Once April sends photos, add a 'photo' key per card in
                 $homeServiceCards above (e.g. 'photo' => 'boarding-kennel.jpg', plus
                 -480/-960/-1600 webp+avif variants in /assets/images/) and replace the
                 .svc-cover span below with a <picture> (source avif srcset + img webp
                 srcset, width="600" height="360", loading="lazy" decoding="async",
                 alt "<service> at Dog Lady's Pet Camp in Franklin, OH"). */ ?>
        <div class="service-card__image">
          <span class="svc-cover svc-cover--<?php echo $tint; ?>" aria-hidden="true"><?php icon($sc['icon'], 76); ?></span>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php icon($sc['icon'], 26); ?></div>
          <h3><?php echo htmlspecialchars($sc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($sc['desc']); ?></p>
          <ul>
            <?php foreach ($sc['bullets'] as $b): ?>
            <li><?php echo htmlspecialchars($b); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/<?php echo $sc['slug']; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ ABOUT / PROCESS ============================ -->
<section class="section home-about" style="background:var(--color-paper-2)" aria-label="About Dog Lady's Pet Camp">
  <div class="container">
    <div class="about-split">

      <div class="about-content">
        <span class="eyebrow">Our Story</span>
        <h2>Who will care for your dog like it&rsquo;s their own?</h2>
        <p class="lead">Dog Lady's Pet Camp started in 2000 with a simple idea: dogs do best with someone who genuinely knows and loves them. Owner April Davidson brings decades of hands-on grooming and veterinary-aide experience to every guest at the Pennyroyal Rd facility.</p>
        <p>Because it&rsquo;s dogs-only and owner-operated, your dog isn&rsquo;t one of a crowd. April learns each dog&rsquo;s routine, quirks, and comfort level &mdash; whether they&rsquo;re here for an overnight boarding stay while you travel or a full grooming from bath to nail trim. It&rsquo;s the kind of personal attention that keeps Franklin dogs relaxed and their owners at ease.</p>

        <ol class="process-steps">
          <li>
            <b>Reach out</b>
            <span>Call or send the form with your dates and what your dog needs.</span>
          </li>
          <li>
            <b>Meet &amp; settle in</b>
            <span>We learn your dog&rsquo;s routine, diet, and personality before their stay.</span>
          </li>
          <li>
            <b>Personal daily care</b>
            <span>Boarding, grooming, or both &mdash; handled with steady, gentle attention.</span>
          </li>
          <li>
            <b>Happy pickup</b>
            <span>Your dog comes home clean, comfortable, and worn out in the best way.</span>
          </li>
        </ol>
      </div>

      <div class="about-right reveal-right">
        <?php /* CLIENT PHOTO SLOT — about split.
                 The second GBP file is a byte-identical copy of the hero photo, so this
                 column shows a branded panel rather than the same dog twice. When a
                 photo of April / the Pennyroyal Rd facility arrives, replace .about-panel
                 with <div class="about-photo"><picture>…</picture></div> (width="408"
                 height="482", loading="lazy" decoding="async", alt mentioning Franklin, OH)
                 and restore the .about-photo rules in the page <style>. */ ?>
        <div class="about-panel">
          <span class="about-panel__eyebrow">Owner-operated since 2000</span>
          <p class="about-panel__quote">One person who knows your dog by name, from drop-off to pickup.</p>
          <ul class="about-panel__list">
            <li><?php icon('users', 20); ?><span>April Davidson handles every stay and every groom herself</span></li>
            <li><?php icon('home', 20); ?><span>Dogs-only facility on Pennyroyal Rd in Franklin, OH</span></li>
            <li><?php icon('scissors', 20); ?><span>Boarding, grooming, or both in one visit</span></li>
          </ul>
        </div>
        <div class="about-stat-card">
          <span class="stat-number"><span>26</span>+ yrs</span>
          <span class="stat-label">Serving Franklin since 2000</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================ MID-PAGE CTA ============================ -->
<section class="cta-banner texture-grain slant-top home-cta" aria-label="Book your dog's stay">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow">Planning a trip?</span>
      <h2>Reserve your dog&rsquo;s spot before the calendar fills</h2>
      <p>Kennel space and grooming slots go fast around holidays and busy travel weeks in Franklin. Call April today and get your dog on the schedule.</p>
    </div>
    <div class="actions">
      <a href="tel:<?php echo $phoneDigits; ?>" class="btn btn-primary btn-lg"><?php icon('phone', 18); ?> Call <?php echo formatPhone($phone); ?></a>
      <button type="button" class="btn btn-secondary" data-open-estimate>Request a free estimate</button>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section edge-curve-top" aria-label="Frequently asked questions">
  <div class="container-narrow">
    <div class="section-head reveal-up">
      <span class="eyebrow">Good to Know</span>
      <h2>Have questions about boarding &amp; grooming in Franklin?</h2>
      <p>Straight answers about how Dog Lady's Pet Camp cares for your dog.</p>
    </div>

    <div class="faq-grid">
      <?php foreach ($homeFaqs as $i => $faq): ?>
      <details class="faq"<?php echo $i < 2 ? ' open' : ''; ?>>
        <summary><?php echo htmlspecialchars($faq['q']); ?></summary>
        <p><?php echo htmlspecialchars($faq['a']); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ ESTIMATE ============================ -->
<section class="section home-estimate" id="estimate" style="background:var(--color-paper-2)" aria-label="Request a free estimate">
  <div class="container">
    <div class="estimate-grid">

      <div class="estimate-copy">
        <span class="eyebrow">Get Started</span>
        <h2>Tell us about your dog</h2>
        <p class="lead">Send a few details and April will get back to you the same day with availability and pricing for boarding, grooming, or both.</p>

        <ol class="next-steps">
          <li><strong>Send your request</strong>We reply the same day with availability.</li>
          <li><strong>Confirm the details</strong>We go over dates, your dog&rsquo;s needs, and pricing.</li>
          <li><strong>Book the stay or groom</strong>Your dog is on the schedule and ready to go.</li>
        </ol>

        <div class="nap">
          <div><?php icon('phone', 18); ?><a href="tel:<?php echo $phoneDigits; ?>"><?php echo formatPhone($phone); ?></a></div>
          <div><?php icon('mail', 18); ?><a href="mailto:<?php echo $email; ?>"><?php echo htmlspecialchars($email); ?></a></div>
          <div><?php icon('map-pin', 18); ?><span><?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo htmlspecialchars($address['state']); ?> <?php echo htmlspecialchars($address['zip']); ?></span></div>
        </div>
        <p style="margin-top:var(--space-md);color:var(--color-muted);font-size:.9rem">Proudly serving Franklin, Springboro, Middletown, Carlisle, Lebanon, and Miamisburg.</p>
      </div>

      <div class="card estimate-card">
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('estimate-section'); ?>
          <input type="hidden" name="form_location" value="estimate-section">
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-row"><label class="sr-only" for="est-name">Your Name</label><input id="est-name" type="text" name="name" placeholder="Your name" autocomplete="name" required></div>
          <div class="form-row"><label class="sr-only" for="est-email">Email</label><input id="est-email" type="email" name="email" placeholder="Email" autocomplete="email" required></div>
          <div class="form-row"><label class="sr-only" for="est-phone">Phone</label><input id="est-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
          <div class="form-row">
            <label class="sr-only" for="est-service">Service Needed</label>
            <select id="est-service" name="service">
              <option value="">Service needed</option>
              <?php foreach ($services as $estSvc): ?>
              <option value="<?php echo htmlspecialchars($estSvc['name']); ?>"><?php echo htmlspecialchars($estSvc['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-row"><label class="sr-only" for="est-message">Message</label><textarea id="est-message" name="message" rows="4" placeholder="Tell us about your dog and the dates you need"></textarea></div>

          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>
            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from Dog Lady's Pet Camp about my inquiry. I can unsubscribe anytime.</span>
            </label>
            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>SMS/Text messages (optional):</strong> I agree to receive text messages from Dog Lady's Pet Camp at the number provided. Message and data rates may apply. Reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong></span>
            </label>
            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
            </label>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-block">Send my request</button>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- ============================ ESTIMATE DIALOG (opened by any [data-open-estimate]) ============================ -->
<dialog class="estimate-dialog" id="estimate-dialog" aria-labelledby="estimate-dialog-title">
  <div class="dialog-head">
    <div>
      <h3 id="estimate-dialog-title">Get a free estimate</h3>
      <p class="footnote">We reply the same day.</p>
    </div>
    <button type="button" class="dialog-close" aria-label="Close" data-close-estimate><?php icon('minus', 22); ?></button>
  </div>
  <div class="dialog-body">
    <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
      <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
      <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
      <?php echo p1_attribution_fields('dialog'); ?>
      <input type="hidden" name="form_location" value="dialog">
      <input type="hidden" name="consent_version" value="v2.1">
      <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

      <div class="form-row"><label class="sr-only" for="dlg-name">Your Name</label><input id="dlg-name" type="text" name="name" placeholder="Your name" autocomplete="name" required></div>
      <div class="form-row"><label class="sr-only" for="dlg-email">Email</label><input id="dlg-email" type="email" name="email" placeholder="Email" autocomplete="email" required></div>
      <div class="form-row"><label class="sr-only" for="dlg-phone">Phone</label><input id="dlg-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
      <div class="form-row">
        <label class="sr-only" for="dlg-service">Service Needed</label>
        <select id="dlg-service" name="service">
          <option value="">Service needed</option>
          <?php foreach ($services as $dlgSvc): ?>
          <option value="<?php echo htmlspecialchars($dlgSvc['name']); ?>"><?php echo htmlspecialchars($dlgSvc['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-row"><label class="sr-only" for="dlg-message">Message</label><textarea id="dlg-message" name="message" rows="3" placeholder="Tell us about your dog and the dates you need"></textarea></div>

      <fieldset class="form-consent-fieldset">
        <legend class="form-consent-legend">Communication Consent</legend>
        <label class="form-consent-item">
          <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from Dog Lady's Pet Camp about my inquiry. I can unsubscribe anytime.</span>
        </label>
        <label class="form-consent-item">
          <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label"><strong>SMS/Text messages (optional):</strong> I agree to receive text messages from Dog Lady's Pet Camp at the number provided. Message and data rates may apply. Reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong></span>
        </label>
        <label class="form-consent-item form-consent-required">
          <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
          <span class="consent-label">I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
        </label>
      </fieldset>

      <button type="submit" class="btn btn-primary btn-block">Send my request</button>
    </form>
  </div>
</dialog>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
