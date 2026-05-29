<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <title>Flora Cart – Fresh Blooms, Delivered with Love</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
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

    * { margin: 0; padding: 0; box-sizing: border-box; }

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
    .nav-links a.active { color: var(--sage-dark); }
    .nav-links a.active { border-bottom: 2px solid var(--blush); padding-bottom: 2px; }

    .cart-badge {
      background: var(--blush);
      color: white;
      border-radius: 50%;
      padding: 2px 8px;
      font-size: 11px;
      margin-left: 2px;
    }

    /* Logout Button */
    .logout-link {
      color: var(--bark-mid);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .logout-link:hover {
      color: var(--sage-dark);
    }

    .hero-section {
      background: linear-gradient(135deg, var(--sage-dark) 0%, var(--sage) 60%, var(--sage-light) 100%);
      padding: 56px 48px 44px;
      position: relative;
      overflow: hidden;
    }
    .hero-section::before {
      content: '';
      position: absolute;
      right: 60px;
      top: 20px;
      width: 130px;
      height: 130px;
      opacity: 0.1;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='35' r='20' fill='white'/%3E%3Cellipse cx='30' cy='60' rx='14' ry='22' fill='white' transform='rotate(-30 30 60)'/%3E%3Cellipse cx='70' cy='60' rx='14' ry='22' fill='white' transform='rotate(30 70 60)'/%3E%3Ccircle cx='50' cy='70' r='6' fill='white'/%3E%3Crect x='47' y='70' width='6' height='20' rx='3' fill='white'/%3E%3C/svg%3E") no-repeat center/contain;
      pointer-events: none;
    }
    .hero-flex {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
    }
    .hero-text { flex: 1; min-width: 260px; }
    .hero-eyebrow {
      font-size: 11px;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.7);
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .hero-text h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 54px;
      font-weight: 700;
      color: var(--white);
      line-height: 1.1;
      margin-bottom: 16px;
    }
    .hero-text h1 span {
      display: block;
      color: rgba(255,245,235,0.85);
      margin-left: 12px;
    }
    .hero-divider { margin: 20px 0 16px; font-size: 20px; letter-spacing: 6px; color: rgba(255,255,255,0.6); }
    .hero-text p {
      font-size: 15px;
      color: rgba(255,255,245,0.85);
      max-width: 480px;
      margin-bottom: 28px;
    }
    .btn-primary {
      display: inline-block;
      background: var(--white);
      color: var(--sage-dark);
      padding: 12px 32px;
      border-radius: 40px;
      text-decoration: none;
      font-weight: 700;
      font-size: 14px;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-primary:hover { background: var(--blush); color: white; transform: translateY(-3px); }
    .hero-image {
      flex-shrink: 0;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: rgba(255,255,245,0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid rgba(255,255,245,0.5);
      overflow: hidden;
    }
    .hero-image img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }

    .features-strip {
      max-width: 1280px;
      margin: 48px auto 20px;
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
      padding: 28px 20px;
    }
    .feat:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .feat-icon {
      width: 52px;
      height: 52px;
      background: var(--cream-deep);
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .feat h4 { font-size: 15px; font-weight: 700; color: var(--bark); margin-bottom: 4px; }
    .feat p { font-size: 12px; color: var(--bark-mid); }

    .category-showcase {
      max-width: 1280px;
      margin: 30px auto 20px;
      padding: 0 32px;
    }
    .section-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 11px;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--sage);
      font-weight: 600;
      margin-bottom: 10px;
    }
    .section-heading {
      font-family: 'Cormorant Garamond', serif;
      font-size: 36px;
      font-weight: 600;
      color: var(--bark);
      margin-bottom: 28px;
    }
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
    }
    .category-card {
      background: var(--white);
      border-radius: 24px;
      overflow: hidden;
      border: 1px solid var(--cream-deep);
      cursor: pointer;
      transition: var(--transition);
    }
    .category-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .card-img-wrapper { aspect-ratio: 1/1; background: var(--cream-deep); overflow: hidden; }
    .category-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
    .category-card:hover .category-img { transform: scale(1.05); }
    .card-content {
      padding: 20px 18px 22px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .card-content h3 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 20px;
      font-weight: 700;
      color: var(--bark);
    }
    .arrow-icon {
      width: 40px;
      height: 40px;
      border-radius: 30px;
      background: linear-gradient(135deg, var(--sage-light), var(--sage));
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
    }

    .picks-wrapper {
      max-width: 1280px;
      margin: 40px auto 20px;
      padding: 0 32px;
    }
    .picks-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
      margin: 28px 0 50px;
    }
    .pick-card {
      background: var(--white);
      border-radius: 24px;
      overflow: hidden;
      border: 1px solid var(--cream-deep);
      cursor: pointer;
      transition: var(--transition);
    }
    .pick-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .pick-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      background: var(--cream-deep);
    }
    .pick-body { padding: 16px; }
    .pick-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      font-weight: 600;
      color: var(--bark);
      margin-bottom: 8px;
    }
    .pick-price { color: var(--blush-dark); font-weight: 700; font-size: 16px; }

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

    @media (max-width: 1024px) {
      .cards-grid, .picks-grid, .features-strip { grid-template-columns: repeat(2, 1fr); }
      .footer-content { flex-direction: column; text-align: center; }
    }
    @media (max-width: 800px) {
      .navbar { flex-direction: column; height: auto; padding: 14px 20px; gap: 12px; }
      .nav-links { justify-content: center; }
      .hero-flex { flex-direction: column; text-align: center; }
      .hero-text h1 span { margin-left: 0; }
      .hero-image { width: 240px; height: 240px; }
      .cards-grid { grid-template-columns: 1fr; }
      .features-strip { grid-template-columns: 1fr; }
      .picks-grid { grid-template-columns: repeat(2, 1fr); }
    }
  </style>
</head>
<body>

<!-- SVG SPRITE DEFINITIONS -->
<svg xmlns="http://www.w3.org/2000/svg" style="display:none">
  <symbol id="ico-flower" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 22v-6"/>
    <path d="M12 16c0 0-4-2-4-6a4 4 0 0 1 8 0c0 4-4 6-4 6z"/>
    <path d="M8 7C6 5 6 2 8 2s3 2 4 5"/>
    <path d="M16 7c2-2 2-5 0-5s-3 2-4 5"/>
  </symbol>
  <symbol id="ico-rose" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 22V12"/>
    <path d="M12 12c0 0 5-1.5 5-5.5a5 5 0 0 0-10 0C7 10.5 12 12 12 12z"/>
    <path d="M8 14c-2 1-3 3-2 4s3 .5 5-.5"/>
    <path d="M16 14c2 1 3 3 2 4s-3 .5-5-.5"/>
  </symbol>
  <symbol id="ico-sunflower" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="12" cy="12" r="3.5"/>
    <line x1="12" y1="2" x2="12" y2="5"/>
    <line x1="12" y1="19" x2="12" y2="22"/>
    <line x1="2" y1="12" x2="5" y2="12"/>
    <line x1="19" y1="12" x2="22" y2="12"/>
    <line x1="4.93" y1="4.93" x2="7.05" y2="7.05"/>
    <line x1="16.95" y1="16.95" x2="19.07" y2="19.07"/>
  </symbol>
  <symbol id="ico-bouquet" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 22v-8"/>
    <path d="M9 14H7a3 3 0 0 1 0-6h1"/>
    <path d="M15 14h2a3 3 0 0 0 0-6h-1"/>
    <path d="M9 8a3 3 0 0 1 6 0"/>
    <path d="M9 14a3 3 0 0 0 6 0"/>
  </symbol>
  <symbol id="ico-birthday" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"/>
    <path d="M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 1.5 1 2 1"/>
    <path d="M2 21h20"/>
    <path d="M7 8v2"/>
    <path d="M12 8v2"/>
    <path d="M17 8v2"/>
  </symbol>
  <symbol id="ico-heart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
  </symbol>
  <symbol id="ico-star" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
  </symbol>
  <symbol id="ico-smile" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="12" cy="12" r="10"/>
    <path d="M8 13s1.5 2 4 2 4-2 4-2"/>
    <line x1="9" y1="9" x2="9.01" y2="9"/>
    <line x1="15" y1="9" x2="15.01" y2="9"/>
  </symbol>
  <symbol id="ico-cart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="9" cy="21" r="1"/>
    <circle cx="20" cy="21" r="1"/>
    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
  </symbol>
  <symbol id="ico-leaf" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/>
    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
  </symbol>
  <symbol id="ico-truck" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <rect x="1" y="3" width="15" height="13"/>
    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
    <circle cx="5.5" cy="18.5" r="2.5"/>
    <circle cx="18.5" cy="18.5" r="2.5"/>
  </symbol>
  <symbol id="ico-shield" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
  </symbol>
  <symbol id="ico-sparkle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5z"/>
    <path d="M5 3v4"/>
    <path d="M3 5h4"/>
    <path d="M19 17v4"/>
    <path d="M17 19h4"/>
  </symbol>
  <symbol id="ico-facebook" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
  </symbol>
  <symbol id="ico-instagram" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
  </symbol>
  <symbol id="ico-logout" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
    <polyline points="16 17 21 12 16 7"/>
    <line x1="21" y1="12" x2="9" y2="12"/>
  </symbol>
</svg>

<!-- NAVBAR -->
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
    <li><a href="index.html" class="active">Home</a></li>
    <li><a href="products.html">Products</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li>
      <a href="cart.html">
        <svg class="ico" aria-hidden="true"><use href="#ico-cart"/></svg>
        Cart <span id="cartCount" class="cart-badge">0</span>
      </a>
    </li>
    <li>
      <a href="#" class="logout-link" onclick="handleLogout()">
        Logout
      </a>
    </li>
  </ul>
</nav>

<!-- HERO SECTION -->
<section class="hero-section">
  <div class="hero-flex">
    <div class="hero-text">
      <div class="hero-eyebrow">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" style="opacity:0.7">
          <path d="M6 1c0 0-2.5 1.5-2.5 4S6 9 6 9s2.5-2 2.5-4-2.5-4-2.5-4z" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
          <line x1="6" y1="5" x2="6" y2="10" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
        Since 2025
      </div>
      <h1>FRESH FLOWER<br><span>FOR EVERY OCCASION</span></h1>
      <div class="hero-divider">──── ✿ ────</div>
      <p>Handpicked flowers, beautifully arranged and delivered to make every moment special. Farm-fresh elegance right to your door.</p>
      <a href="products.html" class="btn-primary">Shop now <span>→</span></a>
    </div>
    <div class="hero-image">
      <img src="flowerindex.png" alt="Fresh Flowers" onerror="this.src='https://images.unsplash.com/photo-1490750967868-88df5691895c?w=300&h=300&fit=crop';">
    </div>
  </div>
</section>

<!-- FEATURES -->
<div class="features-strip">
  <div class="feat">
    <div class="feat-icon">
      <svg width="26" height="26" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-leaf"/></svg>
    </div>
    <div><h4>Fresh Flowers</h4><p>Handpicked daily</p></div>
  </div>
  <div class="feat">
    <div class="feat-icon">
      <svg width="26" height="26" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-truck"/></svg>
    </div>
    <div><h4>Fast Delivery</h4><p>On time, every time</p></div>
  </div>
  <div class="feat">
    <div class="feat-icon">
      <svg width="26" height="26" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-shield"/></svg>
    </div>
    <div><h4>Secure Payment</h4><p>100% safe checkout</p></div>
  </div>
  <div class="feat">
    <div class="feat-icon">
      <svg width="26" height="26" style="color:var(--sage-dark)" aria-hidden="true"><use href="#ico-heart"/></svg>
    </div>
    <div><h4>Made with Love</h4><p>For your special ones</p></div>
  </div>
</div>

<!-- CATEGORY SHOWCASE -->
<div class="category-showcase">
  <div class="section-label">
    <svg class="ico-sm" style="color:var(--sage)" aria-hidden="true"><use href="#ico-sparkle"/></svg>
    shop by occasion
  </div>
  <h2 class="section-heading">Curated Collections</h2>
  <div class="cards-grid" id="categoryGrid"></div>
</div>

<!-- FRESH PICKS -->
<div class="picks-wrapper">
  <div class="section-label">
    <svg class="ico-sm" style="color:var(--sage)" aria-hidden="true"><use href="#ico-flower"/></svg>
    handpicked for you
  </div>
  <h2 class="section-heading">Fresh Picks</h2>
  <div class="picks-grid" id="freshPicksGrid"></div>
</div>

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
  // Category icons mapping
  const CAT_ICONS = {
    birthday: 'ico-birthday',
    anniversary: 'ico-heart',
    congrats: 'ico-star',
    justbecause: 'ico-smile'
  };

  const categories = [
    { id: 'birthday', name: 'Birthday', img: 'birthday.png', fallback: 'https://images.unsplash.com/photo-1490750967868-88df5691895c?w=200&h=200&fit=crop' },
    { id: 'anniversary', name: 'Anniversary', img: 'anniversary.png', fallback: 'https://images.unsplash.com/photo-1563241527-3004b7be0eba?w=200&h=200&fit=crop' },
    { id: 'congrats', name: 'Congratulations', img: 'congrats.png', fallback: 'https://images.unsplash.com/photo-1518895949257-7621c3c786d7?w=200&h=200&fit=crop' },
    { id: 'justbecause', name: 'Just Because', img: 'justbecause.png', fallback: 'https://images.unsplash.com/photo-1583160247711-2191776b4b91?w=200&h=200&fit=crop' }
  ];

  const freshPicks = [
    { name: 'Sunflower Radiance', price: '₱490', img: '../Images/Sunflower/SUNFLOWER.jpg', fallback: 'https://images.unsplash.com/photo-1558935200-ee21d6227e43?w=300&h=200&fit=crop' },
    { name: 'Romantic Red Rose', price: '₱620', img: '../Images/Rose/Classic Red Rose.jpg', fallback: 'https://images.unsplash.com/photo-1496062031454-07b9ef6c26bd?w=300&h=200&fit=crop' },
    { name: 'Tulip Serenity', price: '₱420', img: '../Images/Tulips/TULIPS.jpg', fallback: 'https://images.unsplash.com/photo-1526047932273-341f2a7631cd?w=300&h=200&fit=crop' },
    { name: 'Carnation Dream', price: '₱350', img: '../Images/Carnation/CARNATION.jpg', fallback: 'https://images.unsplash.com/photo-1561181286-d3fee7d8c7b7?w=300&h=200&fit=crop' }
  ];

  function getCategoryIconSVG(catId, size = 18) {
    const iconId = CAT_ICONS[catId] || 'ico-flower';
    return `<svg width="${size}" height="${size}" style="color:var(--sage);flex-shrink:0" aria-hidden="true"><use href="#${iconId}"/></svg>`;
  }

  const categoryGrid = document.getElementById('categoryGrid');
  if (categoryGrid) {
    categoryGrid.innerHTML = categories.map(cat => `
      <div class="category-card" onclick="location.href='products.html?cat=${cat.id}'">
        <div class="card-img-wrapper">
          <img class="category-img" src="${cat.img}" alt="${cat.name}" onerror="this.src='${cat.fallback}';">
        </div>
        <div class="card-content">
          <h3>
            ${getCategoryIconSVG(cat.id, 18)}
            ${cat.name}
          </h3>
          <div class="arrow-icon">→</div>
        </div>
      </div>
    `).join('');
  }

  const picksContainer = document.getElementById('freshPicksGrid');
  if (picksContainer) {
    picksContainer.innerHTML = freshPicks.map(pick => `
      <div class="pick-card" onclick="location.href='products.html'">
        <img class="pick-img" src="${pick.img}" alt="${pick.name}" onerror="this.src='${pick.fallback}';">
        <div class="pick-body">
          <div class="pick-name">${pick.name}</div>
          <div class="pick-price">${pick.price}</div>
        </div>
      </div>
    `).join('');
  }

  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('floraCart') || '[]');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const cartCountSpan = document.getElementById('cartCount');
    if (cartCountSpan) cartCountSpan.textContent = totalItems;
  }

  // Logout function - clears user session and redirects to login page
  function handleLogout() {
    localStorage.removeItem('floraCurrentUser');
    // Show toast message
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
      window.location.href = 'Login.html';
    }, 1500);
  }

  // Initialize
  updateCartCount();
</script>
</body>
</html>