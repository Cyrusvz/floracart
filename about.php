<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <title>Flora Cart – About Us | Fresh Blooms, Delivered with Love</title>
  <!-- Google Fonts: consistent with Products & Index (Cormorant + DM Sans) -->
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* ---------- DESIGN SYSTEM (aligned with index & products) ---------- */
    :root {
      --sage: #7a9c80;
      --sage-light: #b5cdb9;
      --sage-dark: #4d6e53;
      --blush: #f2a8c8;
      --blush-dark: #d97daa;
      --cream: #faf5f0;
      --cream-deep: #f0e8df;
      --bark: #3a2f2a;
      --bark-mid: #7a5f52;
      --bark-light: #c8b0a0;
      --white: #ffffff;
      --shadow-sm: 0 2px 10px rgba(58,47,42,0.08);
      --shadow-md: 0 8px 30px rgba(58,47,42,0.12);
      --transition: all 0.25s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: var(--cream);
      font-family: 'DM Sans', sans-serif;
      color: var(--bark);
      min-height: 100vh;
      scroll-behavior: smooth;
      display: flex;
      flex-direction: column;
    }

    /* SVG Sprite Icons */
    .ico {
      display: inline-block;
      width: 16px;
      height: 16px;
      vertical-align: middle;
      flex-shrink: 0;
    }
    .ico-sm { width: 13px; height: 13px; }
    .ico-lg { width: 20px; height: 20px; }

    /* ----- NAVBAR (identical to products & index) ----- */
    .navbar {
      background: var(--white);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 48px;
      height: 72px;
      position: sticky;
      top: 0;
      z-index: 100;
      border-bottom: 1px solid var(--cream-deep);
      box-shadow: var(--shadow-sm);
      flex-wrap: wrap;
    }

    .logo-wrap {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .logo-icon {
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 22px;
      font-weight: 600;
      letter-spacing: 4px;
      color: var(--sage-dark);
      text-transform: uppercase;
    }

    .logo-divider {
      width: 1px;
      height: 30px;
      background: var(--cream-deep);
      margin: 0 4px;
    }

    .logo-sub {
      font-size: 11px;
      color: var(--bark-mid);
      letter-spacing: 1px;
      line-height: 1.5;
      text-transform: uppercase;
    }

    .nav-links {
      display: flex;
      gap: 36px;
      list-style: none;
      align-items: center;
      flex-wrap: wrap;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--bark-mid);
      font-size: 13px;
      font-weight: 500;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .nav-links a:hover,
    .nav-links a.active {
      color: var(--sage-dark);
    }

    .nav-links a.active {
      border-bottom: 2px solid var(--blush);
      padding-bottom: 2px;
    }

    /* Cart badge styling */
    .cart-badge {
      background: var(--blush);
      color: white;
      border-radius: 50%;
      padding: 2px 8px;
      font-size: 11px;
      margin-left: 2px;
    }

    /* ----- HERO / PAGE HEADER (consistent with product page hero) ----- */
    .page-hero {
      background: linear-gradient(135deg, var(--sage-dark) 0%, var(--sage) 60%, var(--sage-light) 100%);
      padding: 56px 48px 44px;
      position: relative;
      overflow: hidden;
      text-align: center;
    }

    .page-hero::before {
      content: '';
      position: absolute;
      right: 40px;
      top: 20px;
      width: 110px;
      height: 110px;
      opacity: 0.12;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='35' r='20' fill='white'/%3E%3Cellipse cx='30' cy='60' rx='14' ry='22' fill='white' transform='rotate(-30 30 60)'/%3E%3Cellipse cx='70' cy='60' rx='14' ry='22' fill='white' transform='rotate(30 70 60)'/%3E%3C/svg%3E") no-repeat center/contain;
      pointer-events: none;
    }

    .page-hero::after {
      content: '';
      position: absolute;
      left: 40px;
      bottom: -10px;
      width: 90px;
      height: 90px;
      opacity: 0.1;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='35' r='20' fill='white'/%3E%3Cellipse cx='30' cy='60' rx='14' ry='22' fill='white' transform='rotate(-30 30 60)'/%3E%3Cellipse cx='70' cy='60' rx='14' ry='22' fill='white' transform='rotate(30 70 60)'/%3E%3C/svg%3E") no-repeat center/contain;
      pointer-events: none;
    }

    .hero-eyebrow {
      font-size: 12px;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.7);
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .hero-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 54px;
      font-weight: 700;
      color: var(--white);
      line-height: 1.1;
      margin-bottom: 12px;
    }

    .hero-sub {
      font-size: 16px;
      color: rgba(255,255,245,0.85);
      max-width: 600px;
      margin: 0 auto;
      font-weight: 400;
    }

    /* ----- MAIN CONTENT CONTAINER (elegant cards) ----- */
    .about-wrapper {
      max-width: 1200px;
      margin: 50px auto 40px;
      padding: 0 32px;
      flex: 1;
    }

    /* intro blossom card */
    .intro-card {
      background: var(--white);
      border-radius: 32px;
      padding: 32px 40px;
      text-align: center;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--cream-deep);
      margin-bottom: 56px;
      transition: var(--transition);
    }

    .intro-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-3px);
    }

    .intro-card p {
      font-size: 17px;
      line-height: 1.6;
      color: var(--bark-mid);
      font-weight: 450;
    }

    .section-block {
      margin-bottom: 64px;
    }

    .section-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 36px;
      font-weight: 600;
      color: var(--bark);
      text-align: center;
      margin-bottom: 28px;
      letter-spacing: -0.3px;
      position: relative;
      display: inline-block;
      width: 100%;
    }

    .section-title:after {
      content: '';
      display: block;
      width: 70px;
      height: 3px;
      background: var(--blush);
      margin: 12px auto 0;
      border-radius: 4px;
    }

    .alternating-layout {
      display: flex;
      align-items: center;
      gap: 48px;
      background: var(--white);
      border-radius: 32px;
      padding: 32px 40px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--cream-deep);
      transition: var(--transition);
    }

    .alternating-layout.reverse {
      flex-direction: row-reverse;
    }

    .alternating-layout:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }

    .about-text {
      flex: 1;
      font-size: 16px;
      line-height: 1.65;
      color: var(--bark-mid);
    }

    .about-text p {
      margin-bottom: 12px;
    }

    .image-circle {
      flex-shrink: 0;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      overflow: hidden;
      border: 4px solid var(--blush);
      background: var(--cream-deep);
      box-shadow: var(--shadow-sm);
      transition: transform 0.3s;
    }

    .alternating-layout:hover .image-circle {
      transform: scale(1.02);
    }

    .image-circle img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* mission box (special highlight) */
    .mission-box {
      background: linear-gradient(125deg, #ffffff, #fef8f4);
      border-radius: 32px;
      padding: 44px 40px;
      text-align: center;
      border: 1px solid var(--cream-deep);
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
    }

    .mission-box:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-3px);
    }

    .mission-items {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 28px;
      margin-top: 28px;
    }

    .mission-item {
      background: var(--cream);
      padding: 16px 24px;
      border-radius: 60px;
      font-weight: 500;
      color: var(--sage-dark);
      font-size: 15px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      border: 1px solid var(--cream-deep);
    }

    .mission-item span {
      font-size: 20px;
    }

    /* features strip (exactly as other pages) */
    .features-strip {
      max-width: 1280px;
      margin: 20px auto 60px;
      padding: 0 32px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
    }

    .feat {
      background: var(--white);
      border-radius: 20px;
      padding: 20px 18px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--cream-deep);
      transition: var(--transition);
    }

    .feat:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }

    .feat-icon {
      width: 52px;
      height: 52px;
      background: var(--cream-deep);
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .feat h4 {
      font-size: 15px;
      font-weight: 700;
      color: var(--bark);
      margin-bottom: 4px;
    }

    .feat p {
      font-size: 12px;
      color: var(--bark-mid);
    }

    /* Quick links / info row (optional but cohesive) */
    .quick-links-row {
      max-width: 1280px;
      margin: 0 auto 50px;
      padding: 0 32px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 28px;
    }

    .info-card {
      background: var(--white);
      border-radius: 24px;
      padding: 24px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--cream-deep);
    }

    .info-card h3 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 22px;
      margin-bottom: 16px;
      color: var(--bark);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-card iframe {
      width: 100%;
      height: 200px;
      border-radius: 16px;
      border: none;
    }

    .link-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 12px;
    }

    .link-tag {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--cream);
      border: 1.5px solid var(--cream-deep);
      color: var(--sage-dark);
      padding: 8px 16px;
      border-radius: 40px;
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      transition: var(--transition);
    }

    .link-tag:hover {
      background: var(--sage-dark);
      color: var(--white);
      border-color: var(--sage-dark);
    }

    /* FOOTER */
    .footer {
      background: var(--white);
      border-top: 1px solid var(--cream-deep);
      padding: 40px 32px 30px;
      margin-top: 40px;
    }

    .footer-content {
      max-width: 1280px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 24px;
    }

    .footer-logo {
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      font-weight: 600;
      color: var(--sage-dark);
      text-transform: uppercase;
      letter-spacing: 3px;
    }

    .social-links {
      display: flex;
      gap: 20px;
    }

    .social-link {
      width: 40px;
      height: 40px;
      background: var(--cream);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
      text-decoration: none;
      color: var(--sage-dark);
    }

    .social-link:hover {
      background: var(--sage);
      transform: translateY(-3px);
    }

    .social-link:hover svg {
      stroke: white;
    }

    .footer-copyright {
      font-size: 12px;
      color: var(--bark-light);
      text-align: center;
      padding-top: 24px;
      margin-top: 24px;
      border-top: 1px solid var(--cream-deep);
    }

    /* responsive */
    @media (max-width: 1024px) {
      .navbar { padding: 0 24px; }
      .page-hero { padding: 44px 28px; }
      .about-wrapper { padding: 0 24px; }
      .alternating-layout { gap: 32px; padding: 28px 30px; }
      .image-circle { width: 170px; height: 170px; }
      .features-strip { gap: 18px; }
      .footer-content { flex-direction: column; text-align: center; }
    }

    @media (max-width: 800px) {
      .navbar { flex-direction: column; height: auto; padding: 14px 20px; gap: 12px; }
      .logo-wrap { justify-content: center; }
      .nav-links { justify-content: center; }
      .hero-title { font-size: 38px; }
      .alternating-layout, .alternating-layout.reverse { flex-direction: column; text-align: center; }
      .image-circle { width: 150px; height: 150px; margin-bottom: 8px; }
      .features-strip { grid-template-columns: repeat(2, 1fr); }
      .quick-links-row { grid-template-columns: 1fr; }
      .section-title { font-size: 30px; }
      .intro-card { padding: 24px 28px; }
    }

    @media (max-width: 500px) {
      .features-strip { grid-template-columns: 1fr; }
      .mission-items { flex-direction: column; align-items: center; }
      .hero-eyebrow { font-size: 10px; }
    }
  </style>
</head>
<body>

<!-- SVG SPRITE DEFINITIONS -->
<svg xmlns="http://www.w3.org/2000/svg" style="display:none">
  <!-- Facebook icon -->
  <symbol id="ico-facebook" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
  </symbol>

  <!-- Instagram icon -->
  <symbol id="ico-instagram" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
  </symbol>

  <!-- Cart icon -->
  <symbol id="ico-cart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="9" cy="21" r="1"/>
    <circle cx="20" cy="21" r="1"/>
    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
  </symbol>

  <!-- Leaf icon -->
  <symbol id="ico-leaf" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/>
    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
  </symbol>

  <!-- Truck icon -->
  <symbol id="ico-truck" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <rect x="1" y="3" width="15" height="13"/>
    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
    <circle cx="5.5" cy="18.5" r="2.5"/>
    <circle cx="18.5" cy="18.5" r="2.5"/>
  </symbol>

  <!-- Shield icon -->
  <symbol id="ico-shield" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
  </symbol>

  <!-- Heart icon -->
  <symbol id="ico-heart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
  </symbol>

  <!-- Flower icon -->
  <symbol id="ico-flower" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 22v-6"/>
    <path d="M12 16c0 0-4-2-4-6a4 4 0 0 1 8 0c0 4-4 6-4 6z"/>
    <path d="M8 7C6 5 6 2 8 2s3 2 4 5"/>
    <path d="M16 7c2-2 2-5 0-5s-3 2-4 5"/>
  </symbol>

  <!-- Logout icon -->
  <symbol id="ico-logout" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
    <polyline points="16 17 21 12 16 7"/>
    <line x1="21" y1="12" x2="9" y2="12"/>
  </symbol>
</svg>

<!-- NAVBAR (consistent with products & index) -->
<nav class="navbar">
  <div class="logo-wrap">
    <div class="logo-icon">
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="14" cy="11" r="5" stroke="#4d6e53" stroke-width="1.5"/>
        <ellipse cx="8" cy="16" rx="4" ry="6" stroke="#4d6e53" stroke-width="1.5" transform="rotate(-25 8 16)"/>
        <ellipse cx="20" cy="16" rx="4" ry="6" stroke="#4d6e53" stroke-width="1.5" transform="rotate(25 20 16)"/>
        <line x1="14" y1="16" x2="14" y2="26" stroke="#4d6e53" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
    </div>
    <span class="logo-text">Flora Cart</span>
    <div class="logo-divider"></div>
    <div class="logo-sub">Fresh Blooms<br>Delivered with Love</div>
  </div>
  <ul class="nav-links">
    <li><a href="index.html">Home</a></li>
    <li><a href="products.html">Products</a></li>
    <li><a href="about.html" class="active">About</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li>
      <a href="cart.html">
        <svg class="ico" aria-hidden="true"><use href="#ico-cart"/></svg>
        Cart <span id="cartCount" class="cart-badge">0</span>
      </a>
    </li>
    <li>
      <a href="#" onclick="handleLogout()">
        Logout
      </a>
    </li>
  </ul>
</nav>

<!-- PAGE HERO (aligned with product page style) -->
<div class="page-hero">
  <div class="hero-eyebrow">
    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" style="opacity:0.7">
      <path d="M6 1c0 0-2.5 1.5-2.5 4S6 9 6 9s2.5-2 2.5-4-2.5-4-2.5-4z" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
      <line x1="6" y1="5" x2="6" y2="10" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
    </svg>
    Our Story
  </div>
  <h1 class="hero-title">About Flora Cart</h1>
  <p class="hero-sub">Passion for petals, commitment to joy — delivering nature's finest.</p>
</div>

<main>
  <div class="about-wrapper">
    <!-- intro text card (elegant) -->
    <div class="intro-card">
      <p>Floracart is an online flower shop that offers beautiful and fresh flower bouquets for every occasion. We help people express their feelings through flowers, whether it's for birthdays, anniversaries, or just to make someone smile. Simple, heartfelt, and always fresh.</p>
    </div>

    <!-- BACKGROUND section -->
    <div class="section-block">
      <h2 class="section-title">Background</h2>
      <div class="alternating-layout">
        <div class="about-text">
          <p>Floracart was created as a simple online store project to make buying flowers easier and faster. Instead of going to a physical shop, customers can browse and order bouquets online anytime. Our goal is to provide a convenient and enjoyable shopping experience for everyone.</p>
          <p>What started as a small idea grew into a curated floral haven — where each bouquet tells a story, and every delivery is a moment of happiness. We combine modern convenience with timeless floral artistry.</p>
        </div>
        <div class="image-circle">
          <img src="../Images/LOGO/Logo.jpg" alt="Flora Cart background story" onerror="this.src='https://images.unsplash.com/photo-1490750967868-88df5691895c?w=200&h=200&fit=crop';">
        </div>
      </div>
    </div>

    <!-- VISION section (reverse layout) -->
    <div class="section-block">
      <h2 class="section-title">Vision</h2>
      <div class="alternating-layout reverse">
        <div class="about-text">
          <p>Our vision is to become a trusted online flower shop that brings happiness to people by delivering fresh and affordable flowers. We aim to become the go-to destination for flower lovers across the country — where quality meets accessibility, and beauty is never out of reach.</p>
          <p>Every bloom we deliver spreads warmth, connection, and the purest form of love. We envision a world where flowers are never just flowers — but messengers of joy.</p>
        </div>
        <div class="image-circle">
          <img src="../Images/VISION/VISION.jpg" alt="Vision of Flora Cart" onerror="this.src='https://images.unsplash.com/photo-1561181286-d3fee7d8c7b7?w=200&h=200&fit=crop';">
        </div>
      </div>
    </div>

    <!-- MISSION section (special card) -->
    <div class="section-block">
      <h2 class="section-title">Mission</h2>
      <div class="mission-box">
        <div class="mission-items">
          <div class="mission-item"><span>🌿</span> Provide fresh & high-quality bouquets</div>
          <div class="mission-item"><span>🛒</span> Make ordering easy & accessible online</div>
          <div class="mission-item"><span>⏱️</span> Deliver on time & in perfect condition</div>
          <div class="mission-item"><span>😊</span> Bring joy & smiles to every customer</div>
        </div>
        <p style="margin-top: 30px; color: var(--bark-mid); font-size: 15px;">Every petal chosen with intention, every arrangement crafted with care. We're committed to brightening your moments – one bloom at a time.</p>
      </div>
    </div>
  </div>

  <!-- FEATURE STRIP (exactly as index & products) -->
  <div class="features-strip">
    <div class="feat">
      <div class="feat-icon">
        <svg width="24" height="24" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-leaf"/></svg>
      </div>
      <div><h4>Fresh Flowers</h4><p>Handpicked daily</p></div>
    </div>
    <div class="feat">
      <div class="feat-icon">
        <svg width="24" height="24" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-truck"/></svg>
      </div>
      <div><h4>Fast Delivery</h4><p>On time, every time</p></div>
    </div>
    <div class="feat">
      <div class="feat-icon">
        <svg width="24" height="24" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-shield"/></svg>
      </div>
      <div><h4>Secure Payment</h4><p>100% safe checkout</p></div>
    </div>
    <div class="feat">
      <div class="feat-icon">
        <svg width="24" height="24" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-heart"/></svg>
      </div>
      <div><h4>Made with Love</h4><p>For your special ones</p></div>
    </div>
  </div>

  <!-- Quick links & social consistency (same as products page info row) -->
  <div class="quick-links-row">
    <div class="info-card">
      <h3>
        <svg class="ico" style="color:var(--sage)" aria-hidden="true"><use href="#ico-flower"/></svg>
        Find Our Store
      </h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.729489478739!2d121.019313!3d14.599215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9f9a2c4d8c1%3A0xbbc6c3e0f7c2d0f!2sManila%20Flower%20Market!5e0!3m2!1sen!2sph!4v1712386300000!5m2!1sen!2sph" allowfullscreen loading="lazy" style="width:100%; height:200px; border-radius:16px; border:none;"></iframe>
    </div>
    <div class="info-card">
      <p style="font-size:13px; color:var(--bark-mid); margin-bottom:14px;">Follow our floral journey or browse other pages.</p>
      <div class="link-tags">
        <a class="link-tag" href="index.html">Home</a>
        <a class="link-tag" href="products.html">Products</a>
        <a class="link-tag" href="contact.html">Contact</a>
        <a class="link-tag" href="cart.html">Cart</a>
        <a class="link-tag" href="#" id="backToTopAbout">Back to Top</a>
      </div>
    </div>
  </div>
</main>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-content">
    <div class="footer-logo">FLORA CART</div>
    <div class="social-links">
      <a href="https://www.facebook.com/share/1CysvLr7f7/" target="_blank" class="social-link" aria-label="Facebook">
        <svg width="20" height="20" style="color:currentColor" aria-hidden="true"><use href="#ico-facebook"/></svg>
      </a>
      <a href="https://www.instagram.com/floracartph/" target="_blank" class="social-link" aria-label="Instagram">
        <svg width="20" height="20" style="color:currentColor" aria-hidden="true"><use href="#ico-instagram"/></svg>
      </a>
    </div>
  </div>
  <div class="footer-copyright">
    &copy; 2025 Flora Cart. All rights reserved. Fresh Blooms, Delivered with Love.
  </div>
</footer>

<script>
  // Update cart count badge from localStorage
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('floraCart') || '[]');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const cartCountSpan = document.getElementById('cartCount');
    if (cartCountSpan) {
      cartCountSpan.textContent = totalItems;
    }
  }

  // Logout function
  function handleLogout() {
    localStorage.removeItem('floraCurrentUser');
    // Create toast notification
    const toast = document.createElement('div');
    toast.textContent = 'Logged out successfully!';
    toast.style.position = 'fixed';
    toast.style.bottom = '30px';
    toast.style.left = '50%';
    toast.style.transform = 'translateX(-50%)';
    toast.style.background = '#2e7d32';
    toast.style.color = 'white';
    toast.style.padding = '12px 24px';
    toast.style.borderRadius = '8px';
    toast.style.fontSize = '14px';
    toast.style.zIndex = '9999';
    toast.style.fontWeight = '500';
    document.body.appendChild(toast);
    setTimeout(() => {
      toast.remove();
      window.location.href = 'login.html';
    }, 1500);
  }

  // Back to top functionality consistent with other pages
  const backBtn = document.getElementById('backToTopAbout');
  if (backBtn) {
    backBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Initialize cart count
  updateCartCount();

  // Simple console greeting to match brand elegance
  console.log('🌼 Flora Cart — About page aligned with fresh design system with cart');
</script>
</body>
</html>