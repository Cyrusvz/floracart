<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Flora Cart – Your Cart</title>
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
      overflow-x: hidden;
    }

    .ico {
      display: inline-block;
      width: 16px;
      height: 16px;
      vertical-align: middle;
      flex-shrink: 0;
    }
    .ico-sm { width: 13px; height: 13px; }
    .ico-lg { width: 20px; height: 20px; }

    /* NAVBAR */
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

    /* PAGE HERO */
    .page-hero {
      background: linear-gradient(135deg, var(--sage-dark) 0%, var(--sage) 60%, var(--sage-light) 100%);
      padding: 48px 48px 40px;
      text-align: center;
    }
    .hero-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 48px;
      font-weight: 700;
      color: var(--white);
    }
    .hero-sub {
      font-size: 14px;
      color: rgba(255,255,245,0.85);
      margin-top: 8px;
    }

    /* CART MAIN */
    .cart-container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 32px;
    }

    .cart-grid {
      display: flex;
      gap: 32px;
      flex-wrap: wrap;
    }

    /* CART ITEMS SECTION - LIGHTER STYLING */
    .cart-items-section {
      flex: 1.6;
      background: var(--white);
      border-radius: 24px;
      padding: 28px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--cream-deep);
    }

    .cart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--cream-deep);
    }
    .cart-header h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 24px;
      color: var(--bark);
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .clear-cart {
      background: none;
      border: none;
      color: var(--bark-light);
      cursor: pointer;
      font-size: 12px;
      font-weight: 500;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 4px;
    }
    .clear-cart:hover { color: var(--blush-dark); }

    /* Cart Item - Cleaner */
    .cart-item {
      display: flex;
      gap: 16px;
      padding: 16px 0;
      border-bottom: 1px solid var(--cream-deep);
      align-items: center;
      flex-wrap: wrap;
    }
    .cart-item-img {
      width: 70px;
      height: 70px;
      border-radius: 14px;
      background: var(--cream-deep);
      object-fit: cover;
    }
    .cart-item-details {
      flex: 2;
      min-width: 140px;
    }
    .cart-item-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 16px;
      font-weight: 600;
      color: var(--bark);
    }
    .cart-item-cat {
      font-size: 10px;
      color: var(--sage);
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .cart-item-price {
      font-weight: 600;
      color: var(--blush-dark);
      font-size: 15px;
    }
    .cart-item-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .qty-btn {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: var(--cream);
      border: 1px solid var(--cream-deep);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }
    .qty-btn:hover {
      background: var(--sage);
      color: white;
    }
    .item-qty {
      font-weight: 600;
      min-width: 28px;
      text-align: center;
      font-size: 14px;
    }
    .remove-item {
      background: none;
      border: none;
      cursor: pointer;
      color: var(--bark-light);
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .remove-item:hover { color: var(--blush-dark); }

    /* ORDER SUMMARY - Cleaner, Scrollable */
    .cart-summary {
      flex: 1;
      background: var(--white);
      border-radius: 24px;
      padding: 28px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--cream-deep);
      height: fit-content;
      position: sticky;
      top: 100px;
      max-height: calc(100vh - 120px);
      overflow-y: auto;
    }

    /* Custom scrollbar */
    .cart-summary::-webkit-scrollbar {
      width: 4px;
    }
    .cart-summary::-webkit-scrollbar-track {
      background: var(--cream-deep);
      border-radius: 4px;
    }
    .cart-summary::-webkit-scrollbar-thumb {
      background: var(--sage-light);
      border-radius: 4px;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      font-size: 14px;
    }
    .summary-total {
      border-top: 1px solid var(--cream-deep);
      margin-top: 8px;
      padding-top: 14px;
      font-size: 18px;
      font-weight: 700;
      color: var(--sage-dark);
    }

    /* Checkout Form - Minimal */
    .checkout-section {
      margin-top: 20px;
      padding-top: 16px;
      border-top: 1px solid var(--cream-deep);
    }
    .checkout-section h4 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      margin-bottom: 14px;
      color: var(--bark);
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .form-group {
      margin-bottom: 14px;
    }
    .form-group label {
      display: block;
      font-size: 11px;
      font-weight: 600;
      color: var(--bark);
      margin-bottom: 4px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .form-group input, .form-group textarea {
      width: 100%;
      padding: 10px 12px;
      border: 1.5px solid var(--cream-deep);
      border-radius: 10px;
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      background: var(--cream);
      transition: var(--transition);
      outline: none;
      color: var(--bark);
    }
    .form-group input:focus, .form-group textarea:focus {
      border-color: var(--sage);
      box-shadow: 0 0 0 2px rgba(122,156,128,0.1);
      background: var(--white);
    }
    textarea {
      resize: vertical;
    }

    /* Payment Options - Clean Horizontal */
    .payment-options {
      display: flex;
      gap: 12px;
      margin-bottom: 20px;
    }
    .payment-option {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 10px;
      border: 1.5px solid var(--cream-deep);
      border-radius: 40px;
      cursor: pointer;
      transition: var(--transition);
      background: var(--cream);
      font-size: 12px;
      font-weight: 500;
    }
    .payment-option.selected {
      border-color: var(--sage);
      background: var(--sage);
      color: white;
    }
    .payment-option.selected svg {
      stroke: white;
    }
    .payment-option svg {
      width: 16px;
      height: 16px;
    }

    .checkout-btn {
      width: 100%;
      background: var(--sage-dark);
      border: none;
      padding: 14px;
      border-radius: 40px;
      color: white;
      font-weight: 600;
      font-size: 14px;
      cursor: pointer;
      margin-top: 20px;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .checkout-btn:hover {
      background: var(--blush-dark);
      transform: translateY(-2px);
    }

    .empty-cart {
      text-align: center;
      padding: 50px 20px;
      color: var(--bark-mid);
    }
    .empty-cart svg {
      margin-bottom: 16px;
    }
    .empty-cart a {
      color: var(--sage);
      text-decoration: none;
      font-weight: 600;
    }

    /* MODALS */
    .modal, .confirm-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(58, 47, 42, 0.8);
      backdrop-filter: blur(6px);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    .modal.show, .confirm-modal.show { display: flex; }

    .modal-content, .confirm-modal-content {
      background: var(--white);
      max-width: 450px;
      width: 90%;
      border-radius: 28px;
      padding: 32px 28px;
      text-align: center;
      animation: fadeInUp 0.3s ease;
    }

    @keyframes fadeInUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .order-details {
      background: var(--cream);
      border-radius: 16px;
      padding: 16px;
      margin: 16px 0;
      text-align: left;
      font-size: 13px;
      max-height: 300px;
      overflow-y: auto;
    }
    .order-details p { margin: 6px 0; }

    .modal-btn {
      background: var(--sage-dark);
      border: none;
      padding: 12px 28px;
      border-radius: 40px;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }
    .modal-btn:hover { background: var(--blush-dark); }

    .confirm-buttons {
      display: flex;
      gap: 12px;
      justify-content: center;
      margin-top: 20px;
    }
    .btn-cancel {
      background: var(--cream);
      border: 1px solid var(--cream-deep);
      padding: 8px 20px;
      border-radius: 40px;
      cursor: pointer;
    }
    .btn-confirm-delete {
      background: #c75a8a;
      border: none;
      padding: 8px 20px;
      border-radius: 40px;
      color: white;
      cursor: pointer;
    }

    @media (max-width: 800px) {
      .navbar { flex-direction: column; height: auto; padding: 14px 20px; gap: 12px; }
      .nav-links { justify-content: center; gap: 20px; }
      .cart-grid { flex-direction: column; }
      .cart-summary { position: static; max-height: none; }
      .hero-title { font-size: 36px; }
      .page-hero { padding: 36px 24px 28px; }
      .payment-options { flex-direction: column; }
      .payment-option { justify-content: center; }
    }
  </style>
</head>
<body>

<!-- SVG SPRITE DEFINITIONS -->
<svg xmlns="http://www.w3.org/2000/svg" style="display:none">
  <symbol id="ico-cart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
  </symbol>
  <symbol id="ico-trash" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
    <line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/>
  </symbol>
  <symbol id="ico-heart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
  </symbol>
  <symbol id="ico-arrow-right" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
  </symbol>
  <symbol id="ico-minus" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <line x1="5" y1="12" x2="19" y2="12"/>
  </symbol>
  <symbol id="ico-plus" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
  </symbol>
  <symbol id="ico-flower" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M12 22v-6M12 16c0 0-4-2-4-6a4 4 0 0 1 8 0c0 4-4 6-4 6zM8 7C6 5 6 2 8 2s3 2 4 5M16 7c2-2 2-5 0-5s-3 2-4 5"/>
  </symbol>
  <symbol id="ico-bag" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/>
    <path d="M16 10a4 4 0 0 1-8 0"/>
  </symbol>
  <symbol id="ico-logout" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
  </symbol>
  <symbol id="ico-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
  </symbol>
  <symbol id="ico-cash" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <circle cx="12" cy="12" r="10"/><line x1="12" y1="2" x2="12" y2="4"/><line x1="12" y1="20" x2="12" y2="22"/>
    <line x1="2" y1="12" x2="4" y2="12"/><line x1="20" y1="12" x2="22" y2="12"/><path d="M8 12h8"/>
  </symbol>
  <symbol id="ico-ewallet" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <rect x="2" y="5" width="20" height="14" rx="2"/><line x1="16" y1="12" x2="16.01" y2="12"/>
  </symbol>
  <symbol id="ico-card" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>
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
    <li><a href="index.html">Home</a></li>
    <li><a href="products.html">Products</a></li>
    <li><a href="about.html">About</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="cart.html" class="active"><svg class="ico"><use href="#ico-cart"/></svg> Cart <span id="cartCount" class="cart-badge">0</span></a></li>
    <li><a href="#" onclick="handleLogout()"><svg class="ico"></svg> Logout</a></li>
  </ul>
</nav>

<div class="page-hero">
  <h1 class="hero-title">Your Cart</h1>
  <p class="hero-sub">Review your blooms</p>
</div>

<div class="cart-container">
  <div class="cart-grid">
    <!-- Shopping Cart Items -->
    <div class="cart-items-section">
      <div class="cart-header">
        <h2><svg class="ico"><use href="#ico-bag"/></svg> Shopping Cart</h2>
        <button class="clear-cart" onclick="showClearCartConfirmation()"><svg class="ico-sm"><use href="#ico-trash"/></svg> Clear</button>
      </div>
      <div id="cartItemsList"></div>
    </div>

    <!-- Order Summary (Scrollable) -->
    <div class="cart-summary">
      <h3 style="font-family:'Cormorant Garamond'; font-size:20px; margin-bottom:16px;">Order Summary</h3>
      <div class="summary-row"><span>Subtotal</span><span id="subtotal">₱0</span></div>
      <div class="summary-row"><span>Delivery Fee</span><span>₱50</span></div>
      <div class="summary-row summary-total"><span>Total</span><span id="totalAmount">₱0</span></div>

      <!-- Checkout Form -->
      <div class="checkout-section">
        <h4><svg class="ico"><use href="#ico-pin"/></svg> Delivery</h4>
        <div class="form-group"><input type="text" id="fullName" placeholder="Full name"></div>
        <div class="form-group"><input type="tel" id="phoneNumber" placeholder="Phone number"></div>
        <div class="form-group"><input type="text" id="streetAddress" placeholder="Street address"></div>
        <div class="form-group"><input type="text" id="city" placeholder="City / Barangay"></div>
        <div class="form-group"><textarea id="deliveryInstructions" rows="2" placeholder="Delivery instructions (optional)"></textarea></div>

        <h4 style="margin-top: 16px;"><svg class="ico"><use href="#ico-card"/></svg> Payment</h4>
        <div class="payment-options">
          <div class="payment-option" data-payment="cash"><svg width="16" height="16"><use href="#ico-cash"/></svg> Cash</div>
          <div class="payment-option" data-payment="ewallet"><svg width="16" height="16"><use href="#ico-ewallet"/></svg> E-Wallet</div>
          <div class="payment-option" data-payment="card"><svg width="16" height="16"><use href="#ico-card"/></svg> Card</div>
        </div>
        <input type="hidden" id="selectedPayment" value="cash">
      </div>

      <button class="checkout-btn" onclick="processCheckout()"><svg class="ico"><use href="#ico-heart"/></svg> Place Order</button>
    </div>
  </div>
</div>

<!-- Thank You Modal -->
<div id="thankYouModal" class="modal">
  <div class="modal-content">
    <div class="modal-icon"><svg width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#7a9c80" stroke-width="2"><circle cx="30" cy="30" r="28"/><path d="M20 30l8 8 14-16" stroke-width="2.5"/></svg></div>
    <h2>Thank You!</h2>
    <div id="orderSummary" class="order-details"></div>
    <button class="modal-btn" onclick="closeModalAndRedirect()">Continue Shopping →</button>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteConfirmModal" class="confirm-modal">
  <div class="confirm-modal-content">
    <h3>Remove Item?</h3>
    <p id="deleteMessage">Are you sure?</p>
    <div class="confirm-buttons">
      <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button class="btn-confirm-delete" id="confirmDeleteBtn">Remove</button>
    </div>
  </div>
</div>

<!-- Clear Cart Confirmation Modal -->
<div id="clearCartConfirmModal" class="confirm-modal">
  <div class="confirm-modal-content">
    <h3>Clear Cart?</h3>
    <p>Remove all items? This cannot be undone.</p>
    <div class="confirm-buttons">
      <button class="btn-cancel" onclick="closeClearCartModal()">Cancel</button>
      <button class="btn-confirm-delete" id="confirmClearCartBtn">Clear All</button>
    </div>
  </div>
</div>

<script>
  let pendingDeleteIndex = null;

  function getCart() { return JSON.parse(localStorage.getItem('floraCart') || '[]'); }
  function saveCart(cart) { localStorage.setItem('floraCart', JSON.stringify(cart)); updateCartCount(); renderCart(); }
  function updateCartCount() {
    const total = getCart().reduce((s, i) => s + i.quantity, 0);
    document.querySelectorAll('#cartCount').forEach(el => { if(el) el.textContent = total; });
  }
  function handleLogout() {
    localStorage.removeItem('floraCurrentUser');
    window.location.href = 'Login.html';
  }
  function escapeHtml(t) { const d = document.createElement('div'); d.textContent = t; return d.innerHTML; }

  function renderCart() {
    const cart = getCart();
    const container = document.getElementById('cartItemsList');
    if (!container) return;
    if (cart.length === 0) {
      container.innerHTML = `<div class="empty-cart"><svg width="60" height="60"><use href="#ico-flower"/></svg><p>Your cart is empty</p><p><a href="products.html">Browse flowers →</a></p></div>`;
      document.getElementById('subtotal').textContent = '₱0';
      document.getElementById('totalAmount').textContent = '₱50';
      return;
    }
    let subtotal = 0;
    container.innerHTML = cart.map((item, idx) => {
      subtotal += item.price * item.quantity;
      return `<div class="cart-item" data-index="${idx}">
        <img class="cart-item-img" src="${item.image || 'https://images.unsplash.com/photo-1490750967868-88df5691895c?w=80&h=80&fit=crop'}" onerror="this.src='https://images.unsplash.com/photo-1490750967868-88df5691895c?w=80&h=80&fit=crop'">
        <div class="cart-item-details">
          <div class="cart-item-name">${escapeHtml(item.name)}</div>
          <div class="cart-item-cat">${escapeHtml(item.category || 'Flowers')}</div>
          <div class="cart-item-price">₱${item.price}</div>
        </div>
        <div class="cart-item-actions">
          <button class="qty-btn" onclick="updateQuantity(${idx}, -1)"><svg width="12" height="12"><use href="#ico-minus"/></svg></button>
          <span class="item-qty">${item.quantity}</span>
          <button class="qty-btn" onclick="updateQuantity(${idx}, 1)"><svg width="12" height="12"><use href="#ico-plus"/></svg></button>
          <button class="remove-item" onclick="showDeleteConfirmation(${idx}, '${escapeHtml(item.name).replace(/'/g, "\\'")}')"><svg width="14" height="14"><use href="#ico-trash"/></svg></button>
        </div>
      </div>`;
    }).join('');
    const total = subtotal + 50;
    document.getElementById('subtotal').textContent = `₱${subtotal.toFixed(2)}`;
    document.getElementById('totalAmount').textContent = `₱${total.toFixed(2)}`;
  }

  function updateQuantity(idx, change) {
    const cart = getCart();
    if (cart[idx]) {
      cart[idx].quantity += change;
      if (cart[idx].quantity <= 0) { showDeleteConfirmation(idx, cart[idx].name); return; }
      saveCart(cart);
    }
  }

  function showDeleteConfirmation(idx, name) {
    pendingDeleteIndex = idx;
    document.getElementById('deleteMessage').innerHTML = `Remove <strong>${name}</strong> from your cart?`;
    document.getElementById('deleteConfirmModal').classList.add('show');
  }
  function executeDelete() {
    if (pendingDeleteIndex !== null) {
      const cart = getCart();
      cart.splice(pendingDeleteIndex, 1);
      saveCart(cart);
      pendingDeleteIndex = null;
    }
    closeDeleteModal();
  }
  function closeDeleteModal() { document.getElementById('deleteConfirmModal').classList.remove('show'); }

  function showClearCartConfirmation() {
    if (getCart().length === 0) { alert('Your cart is empty'); return; }
    document.getElementById('clearCartConfirmModal').classList.add('show');
  }
  function executeClearCart() { localStorage.removeItem('floraCart'); updateCartCount(); renderCart(); closeClearCartModal(); }
  function closeClearCartModal() { document.getElementById('clearCartConfirmModal').classList.remove('show'); }

  // Payment selection
  document.querySelectorAll('.payment-option').forEach(opt => {
    opt.addEventListener('click', function() {
      document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('selected'));
      this.classList.add('selected');
      document.getElementById('selectedPayment').value = this.dataset.payment;
    });
  });

  function validateAddress() {
    const fields = ['fullName', 'phoneNumber', 'streetAddress', 'city'];
    for (let f of fields) {
      if (!document.getElementById(f).value.trim()) {
        alert(`Please enter your ${f.replace(/([A-Z])/g, ' $1').toLowerCase()}`);
        return false;
      }
    }
    return true;
  }

  function processCheckout() {
    const cart = getCart();
    if (cart.length === 0) { alert('Your cart is empty'); return; }
    if (!validateAddress()) return;

    const subtotal = cart.reduce((s, i) => s + i.price * i.quantity, 0);
    const total = subtotal + 50;
    const payment = document.getElementById('selectedPayment').value;
    const paymentNames = { cash: 'Cash on Delivery', ewallet: 'E-Wallet', card: 'Credit/Debit Card' };

    const address = {
      fullName: document.getElementById('fullName').value,
      phone: document.getElementById('phoneNumber').value,
      street: document.getElementById('streetAddress').value,
      city: document.getElementById('city').value,
      instructions: document.getElementById('deliveryInstructions').value
    };

    const orderDetails = [...cart];
    const orders = JSON.parse(localStorage.getItem('floraOrders') || '[]');
    orders.push({
      id: '#ORD' + Date.now(), date: new Date().toLocaleDateString(),
      customer: address.fullName, items: orderDetails.map(i => ({ name: i.name, quantity: i.quantity, price: i.price })),
      address, paymentMethod: paymentNames[payment], subtotal, delivery: 50, total, status: 'pending'
    });
    localStorage.setItem('floraOrders', JSON.stringify(orders));
    localStorage.removeItem('floraCart');
    updateCartCount(); renderCart();

    // Clear form
    ['fullName', 'phoneNumber', 'streetAddress', 'city', 'deliveryInstructions'].forEach(id => document.getElementById(id).value = '');

    let itemsHtml = '<p><strong>Order Summary:</strong></p>';
    orderDetails.forEach(i => itemsHtml += `<p>🌸 ${i.name} x ${i.quantity} = ₱${(i.price * i.quantity).toFixed(2)}</p>`);
    itemsHtml += `<p style="margin-top:8px;padding-top:8px;border-top:1px solid #eee"><strong>Total:</strong> ₱${total.toFixed(2)}</p>`;
    itemsHtml += `<p><strong>Delivery to:</strong> ${address.fullName}, ${address.street}, ${address.city}</p>`;
    itemsHtml += `<p><strong>Payment:</strong> ${paymentNames[payment]}</p>`;
    document.getElementById('orderSummary').innerHTML = itemsHtml;
    document.getElementById('thankYouModal').classList.add('show');
  }

  function closeModalAndRedirect() {
    document.getElementById('thankYouModal').classList.remove('show');
    window.location.href = 'products.html';
  }

  document.getElementById('confirmDeleteBtn').onclick = executeDelete;
  document.getElementById('confirmClearCartBtn').onclick = executeClearCart;
  window.onclick = e => {
    if (e.target.classList.contains('modal')) closeModalAndRedirect();
    if (e.target.classList.contains('confirm-modal')) { closeDeleteModal(); closeClearCartModal(); }
  };

  renderCart(); updateCartCount();
  document.querySelector('.payment-option[data-payment="cash"]').classList.add('selected');
</script>
</body>
</html>