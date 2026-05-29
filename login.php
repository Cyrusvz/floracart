<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flora Cart – Login & Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --cream:       #fdf8f5;
      --bark:        #2a3d2e;
      --bark-mid:    #5a7260;
      --bark-light:  #9ab8a0;
      --btn-green:   #6a9a74;
      --btn-hover:   #537a5e;
      --white:       #ffffff;
      --border:      #e0ece2;
      --placeholder: #aabcae;
      --error:       #c0392b;
      --success:     #4a8c5c;
      --admin-gold:  #d4af37;
    }

    * { margin:0; padding:0; box-sizing:border-box; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: #fce8e0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* ── CARD WRAPPER ── */
    .card {
      display: grid;
      grid-template-columns: 380px 460px;
      height: 620px;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(80,40,30,0.18);
    }

    /* ── LEFT: FLORAL PHOTO SIDE ── */
    .photo-side {
      position: relative;
      background:
        radial-gradient(ellipse at 40% 85%, rgba(245,180,160,0.7) 0%, transparent 55%),
        radial-gradient(ellipse at 70% 10%, rgba(200,225,200,0.5) 0%, transparent 45%),
        radial-gradient(ellipse at 20% 30%, rgba(240,200,190,0.4) 0%, transparent 40%),
        linear-gradient(170deg, #fdeee8 0%, #f5d8cc 30%, #ecc8b8 60%, #d8b4a0 100%);
      overflow: hidden;
    }

    .flower-cluster {
      position: absolute;
      bottom: 0;
      line-height: 1;
      filter: drop-shadow(0 4px 12px rgba(100,50,30,0.2));
    }
    .fc1 { left: -15px; font-size: 110px; bottom: -5px; transform: rotate(-15deg); }
    .fc2 { left: 30px;  font-size: 80px;  bottom: 50px; transform: rotate(8deg); }
    .fc3 { left: 80px;  font-size: 95px;  bottom: 10px; transform: rotate(-5deg); }
    .fc4 { left: 140px; font-size: 70px;  bottom: 60px; transform: rotate(12deg); }
    .fc5 { right: -10px; font-size: 90px; bottom: 0;    transform: rotate(10deg); }
    .fc6 { right: 60px;  font-size: 65px; bottom: 55px; transform: rotate(-8deg); }
    .fc7 { left: 60px;   font-size: 55px; bottom: 140px; transform: rotate(5deg); opacity:0.8; }
    .fc8 { right: 80px;  font-size: 50px; bottom: 120px; transform: rotate(-12deg); opacity:0.75; }

    .petal {
      position: absolute;
      font-size: 14px;
      opacity: 0.65;
      animation: drift 7s ease-in-out infinite;
      pointer-events: none;
    }
    .p1 { top: 8%;  left: 65%; animation-delay: 0s;   animation-duration: 8s; }
    .p2 { top: 20%; left: 18%; animation-delay: 1.5s; animation-duration: 9s; font-size:10px; opacity:0.5; }
    .p3 { top: 38%; left: 78%; animation-delay: 3s;   animation-duration: 7s; font-size:11px; }
    .p4 { top: 15%; left: 50%; animation-delay: 2s;   animation-duration: 10s; font-size:9px; opacity:0.45; }
    @keyframes drift {
      0%,100% { transform: translateY(0) rotate(0deg); }
      50%      { transform: translateY(-14px) rotate(10deg); }
    }

    .sprig { position: absolute; font-size: 50px; opacity: 0.7; pointer-events: none; }
    .sprig-tl { top: -8px; left: -8px; transform: rotate(20deg); }
    .sprig-tr { top: -5px; right: 5px;  transform: rotate(-30deg) scaleX(-1); font-size: 40px; opacity: 0.6; }

    .brand {
      position: absolute;
      top: 0; left: 0; right: 0;
      padding: 36px 28px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      z-index: 2;
    }
    .brand-icon {
      width: 44px; height: 44px;
      border: 1.5px solid rgba(42,61,46,0.25);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      background: rgba(255,255,255,0.55);
      backdrop-filter: blur(4px);
      font-size: 20px;
      margin-bottom: 2px;
    }
    .brand-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 26px; font-weight: 600;
      letter-spacing: 5px; text-transform: uppercase;
      color: #2a3d2e;
    }
    .brand-hr { width: 28px; height: 1px; background: rgba(42,61,46,0.3); }
    .brand-heart { font-size: 12px; color: #5a7260; }
    .brand-sub {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic; font-size: 14px;
      color: #5a7260; text-align: center; line-height: 1.5;
    }

    /* ── RIGHT: FORM SIDE ── */
    .form-side {
      background: var(--white);
      display: flex;
      flex-direction: column;
      padding: 32px 44px 28px;
      overflow-y: auto;
      position: relative;
    }

    .tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
      gap: 36px;
    }
    .tab-btn {
      background: none; border: none;
      font-family: 'DM Sans', sans-serif;
      font-size: 12px; font-weight: 600;
      letter-spacing: 1.5px; text-transform: uppercase;
      color: #b8ccbc; cursor: pointer;
      padding-bottom: 8px;
      border-bottom: 2px solid transparent;
      transition: color 0.2s, border-color 0.2s;
    }
    .tab-btn.active { color: var(--bark); border-bottom-color: var(--btn-green); }

    .form-heading {
      font-family: 'Cormorant Garamond', serif;
      font-size: 26px; font-weight: 600;
      color: var(--bark); text-align: center; margin-bottom: 3px;
    }
    .form-sub {
      font-size: 12px; color: var(--bark-light);
      text-align: center; margin-bottom: 18px;
    }

    .form-panel { display: none; }
    .form-panel.active { display: block; }

    .field { position: relative; margin-bottom: 10px; }

    /* Left icon for non-password fields */
    .field-icon {
      position: absolute; left: 13px; top: 50%;
      transform: translateY(-50%);
      width: 16px; height: 16px;
      color: var(--bark-light);
      pointer-events: none;
      display: flex; align-items: center; justify-content: center;
    }
    .field-icon svg { width: 15px; height: 15px; stroke: var(--bark-light); fill: none; stroke-width: 1.6; stroke-linecap: round; stroke-linejoin: round; }

    /* No left icon for password fields - only eye on right */
    .field.password-field .field-icon {
      display: none;
    }

    .field input {
      width: 100%;
      padding: 11px 38px 11px 38px;
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 8px;
      font-family: 'DM Sans', sans-serif;
      font-size: 13px; color: var(--bark);
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .field input::placeholder { color: var(--placeholder); }
    .field input:focus {
      border-color: var(--btn-green);
      box-shadow: 0 0 0 3px rgba(106,154,116,0.1);
    }
    .field input.err  { border-color: var(--error); }
    .field input.good { border-color: var(--success); }

    /* REMOVE BROWSER'S NATIVE PASSWORD REVEAL BUTTON */
    .field.password-field input::-ms-reveal,
    .field.password-field input::-ms-clear,
    .field.password-field input::-webkit-credentials-auto-fill-button,
    .field.password-field input::-webkit-textfield-decoration-container,
    .field.password-field input::-webkit-outer-spin-button,
    .field.password-field input::-webkit-inner-spin-button {
      display: none !important;
      visibility: hidden !important;
      opacity: 0 !important;
      pointer-events: none !important;
    }

    /* Additional fix for Edge and Chrome */
    input[type="password"]::-ms-reveal,
    input[type="password"]::-webkit-contacts-auto-fill-button,
    input[type="password"]::-webkit-credentials-auto-fill-button {
      display: none !important;
      visibility: hidden !important;
    }

    /* Password field with only right padding (no left icon) */
    .field.password-field input {
      padding: 11px 38px 11px 16px;
    }

    .eye-btn {
      position: absolute; right: 11px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none; cursor: pointer;
      color: var(--bark-light); padding: 0;
      display: flex; align-items: center; justify-content: center;
      z-index: 10;
    }
    .eye-btn svg { width: 15px; height: 15px; stroke: var(--bark-light); fill: none; stroke-width: 1.6; stroke-linecap: round; stroke-linejoin: round; transition: stroke 0.2s; }
    .eye-btn:hover svg { stroke: var(--bark-mid); }

    .field-error {
      font-size: 10.5px; color: var(--error);
      margin-top: 2px; display: none; padding-left: 2px;
    }
    .field-error.show { display: block; }

    .strength-wrap { margin-top: 4px; }
    .strength-bar { display: flex; gap: 3px; }
    .strength-seg { flex:1; height:2px; border-radius:2px; background:#e8f0ea; transition:background 0.3s; }
    .strength-seg.weak   { background:#c0392b; }
    .strength-seg.fair   { background:#e67e22; }
    .strength-seg.good   { background:#f1c40f; }
    .strength-seg.strong { background:var(--success); }
    .strength-label { font-size:10px; color:var(--bark-light); margin-top:2px; }

    .util-row {
      display: flex; justify-content: space-between; align-items: center;
      margin-bottom: 14px; margin-top: 2px;
    }
    .remember {
      display: flex; align-items: center; gap: 7px;
      font-size: 12px; color: var(--bark-mid); cursor: pointer;
    }
    .remember input[type="checkbox"] { width:13px; height:13px; accent-color:var(--btn-green); }
    .forgot-link { font-size:12px; color:var(--bark-mid); text-decoration:none; }
    .forgot-link:hover { color:var(--bark); }

    .admin-note {
      text-align: center;
      font-size: 10px;
      color: var(--admin-gold);
      background: rgba(212, 175, 55, 0.1);
      padding: 6px;
      border-radius: 6px;
      margin: 10px 0;
    }

    .submit-btn {
      width: 100%; padding: 13px;
      background: var(--btn-green); color: var(--white);
      border: none; border-radius: 8px;
      font-family: 'DM Sans', sans-serif;
      font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;
      cursor: pointer; transition: background 0.2s;
      margin-bottom: 12px;
    }
    .submit-btn:hover { background: var(--btn-hover); }

    /* Switch link styles */
    .switch-link {
      text-align: center;
      font-size: 12px;
      color: var(--bark-mid);
      margin-top: 8px;
    }
    .switch-link a {
      color: var(--btn-green);
      text-decoration: none;
      font-weight: 600;
      cursor: pointer;
      transition: color 0.2s;
    }
    .switch-link a:hover {
      color: var(--btn-hover);
      text-decoration: underline;
    }

    /* Toast */
    .toast {
      position: fixed; bottom: 24px; left: 50%;
      transform: translateX(-50%) translateY(50px);
      background: #2a3d2e; color:#fff;
      padding: 10px 22px; border-radius: 8px;
      font-size: 12px; font-weight: 500;
      opacity: 0; transition: all 0.35s cubic-bezier(0.34,1.4,0.64,1);
      z-index: 9999;
    }
    .toast.error-toast { background: var(--error); }
    .toast.show { transform: translateX(-50%) translateY(0); opacity: 1; }

    .confirm-overlay {
      display: none; position: fixed; inset: 0;
      background: rgba(20,30,20,0.55); backdrop-filter: blur(6px);
      z-index: 500; justify-content: center; align-items: center;
    }
    .confirm-overlay.open { display: flex; }
    .confirm-box {
      background: var(--white); max-width: 360px; width: 90%;
      padding: 40px 32px; text-align: center; border-radius: 14px;
      animation: popIn 0.3s cubic-bezier(0.34,1.5,0.64,1);
      box-shadow: 0 20px 50px rgba(0,0,0,0.18);
    }
    @keyframes popIn { from{transform:scale(0.88);opacity:0;} to{transform:scale(1);opacity:1;} }
    .confirm-box .cicon { font-size: 48px; margin-bottom: 14px; }
    .confirm-box h3 { font-family:'Cormorant Garamond',serif; font-size:26px; font-weight:500; margin-bottom:8px; color:var(--bark); }
    .confirm-box p  { font-size:13px; color:var(--bark-mid); line-height:1.6; margin-bottom:24px; }
    .confirm-box button {
      background:var(--btn-green); color:#fff; border:none;
      padding:11px 32px; border-radius:8px;
      font-family:'DM Sans',sans-serif; font-size:11px; font-weight:700;
      letter-spacing:2px; text-transform: uppercase; cursor:pointer;
    }
    .confirm-box button:hover { background:var(--btn-hover); }

    /* Admin badge */
    .admin-badge {
      display: inline-block;
      background: linear-gradient(135deg, var(--admin-gold), #b8860b);
      color: #2a3d2e;
      font-size: 9px;
      font-weight: 700;
      padding: 2px 6px;
      border-radius: 12px;
      margin-left: 6px;
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="card">

  <!-- ══ LEFT: FLORAL PHOTO SIDE ══ -->
  <div class="photo-side">
    <div class="sprig sprig-tl">🌿</div>
    <div class="sprig sprig-tr">🌿</div>
    <div class="petal p1">🌸</div>
    <div class="petal p2">🌸</div>
    <div class="petal p3">🌸</div>
    <div class="petal p4">🌸</div>

    <div class="brand">
      <div class="brand-icon">🌿</div>
      <div class="brand-name">Flora Cart</div>
      <div class="brand-hr"></div>
      <div class="brand-heart">♥</div>
      <div class="brand-sub">Fresh blooms,<br>delivered with love.</div>
    </div>

    <div class="flower-cluster fc1">🌸</div>
    <div class="flower-cluster fc2">🌹</div>
    <div class="flower-cluster fc3">🌷</div>
    <div class="flower-cluster fc4">💐</div>
    <div class="flower-cluster fc5">🌸</div>
    <div class="flower-cluster fc6">🌼</div>
    <div class="flower-cluster fc7">🌿</div>
    <div class="flower-cluster fc8">🌿</div>
  </div>

  <!-- ══ RIGHT: FORM SIDE ══ -->
  <div class="form-side">

    <div class="tabs">
      <button class="tab-btn active" id="tabSignup" onclick="switchTab('signup')">Sign Up</button>
      <button class="tab-btn"        id="tabLogin"  onclick="switchTab('login')">Login</button>
    </div>

    <!-- ══ SIGN UP PANEL ══ -->
    <div class="form-panel active" id="panelSignup">
      <h2 class="form-heading">Create Your Account</h2>
      <p class="form-sub">Join Flora Cart and start your floral journey.</p>

      <form id="signupForm" novalidate onsubmit="handleSignup(event)">
        <div class="field">
          <span class="field-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg></span>
          <input type="text" id="sName" placeholder="Full Name" maxlength="80">
          <div class="field-error" id="sNameErr"></div>
        </div>
        <div class="field">
          <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></span>
          <input type="email" id="sEmail" placeholder="Email Address">
          <div class="field-error" id="sEmailErr"></div>
        </div>
        <div class="field">
          <span class="field-icon"><svg viewBox="0 0 24 24"><path d="M6.6 10.8a15.4 15.4 0 006.6 6.6l2.2-2.2a1 1 0 011-.25 11.4 11.4 0 003.6.6 1 1 0 011 1V18a1 1 0 01-1 1A17 17 0 014 5a1 1 0 011-1h3.5a1 1 0 011 1 11.4 11.4 0 00.6 3.6 1 1 0 01-.25 1L6.6 10.8z"/></svg></span>
          <input type="tel" id="sPhone" placeholder="Mobile Number">
          <div class="field-error" id="sPhoneErr"></div>
        </div>
        
        <!-- Password Field - No left icon, only custom eye on right -->
        <div class="field password-field">
          <input type="password" id="sPass" placeholder="Password" oninput="checkStrength(this.value)" autocomplete="new-password">
          <button type="button" class="eye-btn" onclick="toggleEye('sPass',this)" aria-label="Toggle password">
            <svg viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
          <div class="field-error" id="sPassErr"></div>
          <div class="strength-wrap">
            <div class="strength-bar">
              <div class="strength-seg" id="st1"></div>
              <div class="strength-seg" id="st2"></div>
              <div class="strength-seg" id="st3"></div>
              <div class="strength-seg" id="st4"></div>
            </div>
            <div class="strength-label" id="stLabel"></div>
          </div>
        </div>
        
        <!-- Confirm Password Field - No left icon, only custom eye on right -->
        <div class="field password-field">
          <input type="password" id="sConfirm" placeholder="Confirm Password" autocomplete="new-password">
          <button type="button" class="eye-btn" onclick="toggleEye('sConfirm',this)" aria-label="Toggle password">
            <svg viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
          <div class="field-error" id="sConfirmErr"></div>
        </div>
        
        <button type="submit" class="submit-btn">Create Account</button>
        
        <!-- Switch to Login link -->
        <div class="switch-link">
          Already have an account? <a onclick="switchTab('login')">Login</a>
        </div>
      </form>
    </div>

    <!-- ══ LOGIN PANEL ══ -->
    <div class="form-panel" id="panelLogin">
      <h2 class="form-heading">Welcome Back</h2>
      <p class="form-sub">Good to see you again.</p>

      <form id="loginForm" novalidate onsubmit="handleLogin(event)">
        <div class="field">
          <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></span>
          <input type="email" id="lEmail" placeholder="Email Address" autocomplete="email">
          <div class="field-error" id="lEmailErr"></div>
        </div>
        
        <!-- Password Field - No left icon, only custom eye on right -->
        <div class="field password-field">
          <input type="password" id="lPass" placeholder="Password" autocomplete="current-password">
          <button type="button" class="eye-btn" onclick="toggleEye('lPass',this)" aria-label="Toggle password">
            <svg viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
          <div class="field-error" id="lPassErr"></div>
        </div>
        
        <div class="util-row">
          <label class="remember">
            <input type="checkbox" id="lRemember"> Remember me
          </label>
          <a href="#" class="forgot-link">Forgot Password?</a>
        </div>
        <button type="submit" class="submit-btn">Log In</button>
        
        <!-- Switch to Sign Up link -->
        <div class="switch-link">
          Don't have an account? <a onclick="switchTab('signup')">Sign Up</a>
        </div>
      </form>
    </div>

  </div>
</div>

<div class="toast" id="toast"></div>
<div class="confirm-overlay" id="confirmOverlay">
  <div class="confirm-box">
    <div class="cicon" id="cIcon"></div>
    <h3 id="cTitle"></h3>
    <p id="cMsg"></p>
    <button onclick="closeConfirm()">Continue</button>
  </div>
</div>

<script>
// ========== USER DATABASE FUNCTIONS ==========
function getUsers() {
  const users = localStorage.getItem('floraUsers');
  return users ? JSON.parse(users) : [];
}

function saveUsers(users) {
  localStorage.setItem('floraUsers', JSON.stringify(users));
}

function setCurrentUser(user) {
  localStorage.setItem('floraCurrentUser', JSON.stringify(user));
}

// ========== ADMIN ACCOUNT SETUP ==========
function setupAdminAccount() {
  const users = getUsers();
  const adminExists = users.some(u => u.email === 'admin@floracart.com');
  
  if (!adminExists) {
    const adminUser = {
      id: 1,
      name: 'Administrator',
      firstName: 'Admin',
      lastName: 'User',
      email: 'admin@floracart.com',
      phone: '09123456789',
      password: 'Admin@123',
      role: 'admin',
      isAdmin: true,
      createdAt: new Date().toISOString()
    };
    users.push(adminUser);
    saveUsers(users);
    console.log('✅ Admin account created!');
  }
}

// Call this on page load
setupAdminAccount();

// ========== UI FUNCTIONS ==========
function switchTab(tab) {
  const isLogin = tab === 'login';
  document.getElementById('tabLogin').classList.toggle('active', isLogin);
  document.getElementById('tabSignup').classList.toggle('active', !isLogin);
  document.getElementById('panelLogin').classList.toggle('active', isLogin);
  document.getElementById('panelSignup').classList.toggle('active', !isLogin);
  document.querySelectorAll('.field-error').forEach(e => { e.style.display='none'; e.classList.remove('show'); });
  document.querySelectorAll('input[type=email],input[type=password],input[type=text],input[type=tel]').forEach(el => el.classList.remove('err','good'));
}

const EYE_OPEN   = `<svg viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>`;
const EYE_CLOSED = `<svg viewBox="0 0 24 24"><path d="M17.94 17.94A10.94 10.94 0 0112 19C5 19 1 12 1 12a18.1 18.1 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`;

function toggleEye(id, btn) {
  const inp = document.getElementById(id);
  const isHidden = inp.type === 'password';
  inp.type = isHidden ? 'text' : 'password';
  btn.innerHTML = isHidden ? EYE_OPEN : EYE_CLOSED;
}

function checkStrength(val) {
  const segs = [1,2,3,4].map(n => document.getElementById('st'+n));
  const lbl  = document.getElementById('stLabel');
  segs.forEach(s => s.className = 'strength-seg');
  if (!val) { lbl.textContent = ''; return; }
  let sc = 0;
  if (val.length >= 8) sc++;
  if (/[A-Z]/.test(val)) sc++;
  if (/[0-9]/.test(val)) sc++;
  if (/[^A-Za-z0-9]/.test(val)) sc++;
  const c = ['','weak','fair','good','strong'];
  const l = ['','Too weak','Fair','Good','Strong ✓'];
  for (let i=0;i<sc;i++) segs[i].classList.add(c[sc]);
  lbl.textContent = l[sc];
}

function showErr(id, msg) {
  const el = document.getElementById(id);
  el.textContent = msg; el.style.display = 'block'; el.classList.add('show');
}
function clearErr(id) {
  const el = document.getElementById(id);
  el.style.display = 'none'; el.classList.remove('show');
}
function mark(id, ok) {
  const el = document.getElementById(id);
  if (!el) return;
  el.classList.toggle('err', !ok);
  el.classList.toggle('good', ok);
}
const validEmail = v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
const validPhone  = v => /^(\+63|0)9\d{9}$/.test(v.replace(/[\s\-()]/g,''));

// ========== SIGNUP (No auto-login) ==========
function handleSignup(e) {
  e.preventDefault();
  let ok = true;
  const name    = document.getElementById('sName').value.trim();
  const email   = document.getElementById('sEmail').value.trim();
  const phone   = document.getElementById('sPhone').value.trim();
  const pass    = document.getElementById('sPass').value;
  const confirm = document.getElementById('sConfirm').value;

  ['sNameErr','sEmailErr','sPhoneErr','sPassErr','sConfirmErr'].forEach(clearErr);

  if (!name)  { showErr('sNameErr','Full name is required.'); mark('sName',false); ok=false; } else mark('sName',true);
  if (!email) { showErr('sEmailErr','Email is required.'); mark('sEmail',false); ok=false; }
  else if (!validEmail(email)) { showErr('sEmailErr','Enter a valid email.'); mark('sEmail',false); ok=false; }
  else {
    const users = getUsers();
    if (users.some(u => u.email === email)) {
      showErr('sEmailErr','Email already registered. Please login instead.');
      mark('sEmail',false);
      ok=false;
    } else mark('sEmail',true);
  }
  if (!phone) { showErr('sPhoneErr','Mobile number is required.'); mark('sPhone',false); ok=false; }
  else if (!validPhone(phone)) { showErr('sPhoneErr','Enter a valid PH number: 09XXXXXXXXX.'); mark('sPhone',false); ok=false; }
  else mark('sPhone',true);
  if (!pass) { showErr('sPassErr','Password is required.'); mark('sPass',false); ok=false; }
  else if (pass.length<8) { showErr('sPassErr','At least 8 characters required.'); mark('sPass',false); ok=false; }
  else mark('sPass',true);
  if (!confirm) { showErr('sConfirmErr','Please confirm your password.'); mark('sConfirm',false); ok=false; }
  else if (pass!==confirm) { showErr('sConfirmErr','Passwords do not match.'); mark('sConfirm',false); ok=false; }
  else if (pass.length>=8) mark('sConfirm',true);
  if (!ok) { showToast('Please fix the errors before continuing.','error-toast'); return; }

  // Create new user (regular user)
  const newUser = {
    id: Date.now(),
    name: name,
    email: email,
    phone: phone,
    password: pass,
    role: 'user',
    isAdmin: false,
    createdAt: new Date().toISOString()
  };
  
  const users = getUsers();
  users.push(newUser);
  saveUsers(users);
  
  // DO NOT auto-login - just show success message and stay on signup panel or switch to login
  showSuccessAndClearForm('🌷', 'Account Created!', `Your account has been created successfully, ${name.split(' ')[0]}! Please login to continue.`);
  
  // Clear form fields
  document.getElementById('sName').value = '';
  document.getElementById('sEmail').value = '';
  document.getElementById('sPhone').value = '';
  document.getElementById('sPass').value = '';
  document.getElementById('sConfirm').value = '';
  document.getElementById('stLabel').textContent = '';
  [1,2,3,4].forEach(n => document.getElementById('st'+n).className='strength-seg');
}

// ========== LOGIN ==========
function handleLogin(e) {
  e.preventDefault();
  let ok = true;
  const email = document.getElementById('lEmail').value.trim();
  const pass  = document.getElementById('lPass').value;

  ['lEmailErr','lPassErr'].forEach(clearErr);

  if (!email) { showErr('lEmailErr','Email is required.'); mark('lEmail',false); ok=false; }
  else if (!validEmail(email)) { showErr('lEmailErr','Enter a valid email address.'); mark('lEmail',false); ok=false; }
  else mark('lEmail',true);
  if (!pass) { showErr('lPassErr','Password is required.'); mark('lPass',false); ok=false; }
  else mark('lPass',true);

  if (!ok) { showToast('Please fix the errors before signing in.','error-toast'); return; }

  const users = getUsers();
  const user = users.find(u => u.email === email && u.password === pass);
  
  if (user) {
    setCurrentUser({ 
      name: user.name, 
      email: user.email, 
      role: user.role || 'user', 
      isAdmin: user.isAdmin || false 
    });
    
    // Remember me functionality
    if (document.getElementById('lRemember').checked) {
      localStorage.setItem('rememberedEmail', email);
    } else {
      localStorage.removeItem('rememberedEmail');
    }
    
    // Check if user is admin
    if (user.isAdmin === true || user.role === 'admin' || email === 'admin@floracart.com') {
      showConfirm('👑', 'Admin Access Granted!', `Welcome back, ${user.name || 'Admin'}! Redirecting to Admin Dashboard...`);
      setTimeout(() => { closeConfirm(); window.location.href = 'admin.html'; }, 2000);
    } else {
      showConfirm('🌸', `Welcome back, ${user.name.split(' ')[0]}!`, 'You have successfully logged in. Redirecting to homepage...');
      setTimeout(() => { closeConfirm(); window.location.href = 'index.html'; }, 2000);
    }
    
    // Clear form
    document.getElementById('lEmail').value = '';
    document.getElementById('lPass').value = '';
  } else {
    showToast('Invalid email or password. Please try again.', 'error-toast');
  }
}

// New function for signup success without auto-login
function showSuccessAndClearForm(icon, title, msg) {
  document.getElementById('cIcon').textContent = icon;
  document.getElementById('cTitle').textContent = title;
  document.getElementById('cMsg').textContent = msg;
  document.getElementById('confirmOverlay').classList.add('open');
}

let tTimer;
function showToast(msg, type='success') {
  clearTimeout(tTimer);
  const t = document.getElementById('toast');
  t.textContent = msg; t.className = `toast ${type}`;
  void t.offsetWidth; t.classList.add('show');
  tTimer = setTimeout(() => t.classList.remove('show'), 3200);
}

function showConfirm(icon, title, msg) {
  document.getElementById('cIcon').textContent  = icon;
  document.getElementById('cTitle').textContent = title;
  document.getElementById('cMsg').textContent   = msg;
  document.getElementById('confirmOverlay').classList.add('open');
}
function closeConfirm() { 
  document.getElementById('confirmOverlay').classList.remove('open');
}

// Restore remembered email
const rememberedEmail = localStorage.getItem('rememberedEmail');
if (rememberedEmail) {
  document.getElementById('lEmail').value = rememberedEmail;
  document.getElementById('lRemember').checked = true;
}
</script>
</body>
</html>