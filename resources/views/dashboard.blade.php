<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>GallSpace - Temukan Inspirasi Tanpa Batas</title>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
:root{
  --primary:#a594f9;
  --primary-2:#c8b6ff;
  --bg:#ffffff;
  --page-bg:#f6f7fb;
  --text:#242424;
  --muted:#6b6b6f;
  --shadow:rgba(0,0,0,0.08);
  --glass:rgba(255,255,255,0.7);
}
:root.dark{
  --primary:#8b7ae6;
  --primary-2:#6f5ce6;
  --bg:#0f1115;
  --page-bg:#07080a;
  --text:#e6e6ea;
  --muted:#a7a7b0;
  --shadow:rgba(0,0,0,0.6);
  --glass:rgba(15,17,21,0.55);
}

/* BASE */
html, body {height:100%; margin:0; font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial; -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; background:var(--page-bg); color:var(--text); transition: background .3s ease,color .3s ease; scroll-behavior:smooth; padding-top:72px; }

/* NAVBAR */
.navbar{background:var(--bg); box-shadow:0 2px 14px var(--shadow); position:fixed; top:0; left:0; right:0; z-index:1400; padding:.8rem 1.2rem; transition: background .3s ease,color .3s ease;}
.container-nav{ max-width:1200px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; gap:16px; }
.brand{ font-weight:700; font-size:1.35rem; background:linear-gradient(135deg,var(--primary),var(--primary-2)); -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent; }
.search-bar{ flex:1; max-width:600px; margin:0 16px; position:relative; }
.search-bar input{ width:100%; padding:10px 16px 10px 42px; border-radius:28px; border:none; outline:none; background:linear-gradient(180deg, rgba(200,182,255,0.10), rgba(200,182,255,0.04)); color:var(--text); transition: box-shadow .18s, background .18s; }
.search-bar .bi-search{ position:absolute; left:14px; top:50%; transform:translateY(-50%); color:var(--primary); font-size:1.05rem; }
.nav-actions{ display:flex; align-items:center; gap:12px; }
.nav-icon{ width:38px; height:38px; display:grid; place-items:center; border-radius:50%; background:transparent; border:none; cursor:pointer; color:var(--text); transition:all .18s; }
.nav-icon:hover{ transform:scale(1.06); background: linear-gradient(135deg, rgba(165,148,249,0.08), rgba(200,182,255,0.05)); color:var(--primary); }
.theme-toggle{ width:38px; height:38px; border-radius:50%; display:grid; place-items:center; border:none; background:transparent; cursor:pointer; transition:all .18s; color:var(--text); }
.theme-toggle.active{ background:var(--glass); color:var(--primary); transform:scale(1.04); }

/* HERO */
.hero{ position:relative; width:100%; min-height:70vh; display:flex; align-items:center; justify-content:center; text-align:center; color:#fff; overflow:hidden; padding:80px 16px 48px; }
.hero__bg{ position:absolute; inset:0; background-image:url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1920&auto=format&fit=crop'); background-size:cover; background-position:center; transform:scale(1.02); filter:contrast(.95) saturate(.95); transition: transform .6s ease, filter .4s ease; }
:root.dark .hero__bg{ filter:brightness(.45) contrast(.9) saturate(.9); }
.hero__overlay{ position:absolute; inset:0; background: linear-gradient(180deg, rgba(10,10,20,0.18), rgba(10,10,20,0.36)); mix-blend-mode: multiply; }
.hero__content{ position:relative; z-index:2; max-width:1100px; padding:32px; color:#fff; animation:fadeInUp .8s ease forwards; opacity:0; }
.hero h1{ font-size:3rem; margin:0 0 12px; font-weight:700; line-height:1.2; text-shadow:0 6px 18px rgba(0,0,0,0.28); }
.hero p{ margin:0 0 24px; font-size:1.1rem; opacity:.95; text-shadow:0 6px 16px rgba(0,0,0,0.18); }
.hero .cta{ display:inline-flex; gap:8px; align-items:center; padding:14px 24px; border-radius:12px; font-weight:600; border:none; background:linear-gradient(135deg,var(--primary),var(--primary-2)); color:#fff; box-shadow:0 8px 30px rgba(165,148,249,0.18); cursor:pointer; transition:transform .18s, box-shadow .18s; }
.hero .cta:hover{ transform:translateY(-4px); box-shadow:0 14px 40px rgba(165,148,249,0.22); }

/* MASONRY & PIN */
.masonry{ column-count:5; column-gap:1rem; max-width:1200px; margin:28px auto 80px; padding:0 12px; }
@media(max-width:1400px){ .masonry{ column-count:4; } }
@media(max-width:992px){ .masonry{ column-count:3; } }
@media(max-width:768px){ .masonry{ column-count:2; } }
@media(max-width:576px){ .masonry{ column-count:1; padding:0 10px; } }

.pin{ display:inline-block; width:100%; background:var(--bg); border-radius:14px; margin:0 0 1rem; overflow:hidden; box-shadow:0 6px 18px var(--shadow); transition: transform .3s, box-shadow .3s, opacity .3s; break-inside: avoid; position:relative; opacity:0; transform:translateY(20px); }
.pin.show{ opacity:1; transform:translateY(0); }
.pin img{ width:100%; display:block; height:auto; }
.pin-info{ padding:12px 14px 14px; }
.pin-info h6{ margin:0; font-size:1rem; color:var(--primary); font-weight:600; }
.pin-info p{ margin:6px 0 0; color:var(--muted); font-size:.9rem; }
.pin:hover{ transform:translateY(-6px); box-shadow:0 14px 32px rgba(0,0,0,0.12); }
.pin-overlay{ position:absolute; inset:0; display:flex; align-items:flex-start; justify-content:flex-end; padding:10px; pointer-events:none; opacity:0; transition:opacity .18s; border-radius:14px 14px 0 0; background:linear-gradient(180deg, rgba(0,0,0,0), rgba(0,0,0,0.28)); }
.pin:hover .pin-overlay{ opacity:1; pointer-events:auto; }
.overlay-icons{ display:flex; flex-direction:column; gap:8px; }
.overlay-icons button{ width:42px; height:42px; border-radius:50%; border:none; background:rgba(255,255,255,0.96); display:grid; place-items:center; cursor:pointer; transition:all .12s; color:var(--primary); }
.overlay-icons button:hover{ background:var(--primary); color:#fff; transform:scale(1.08); }
.pin-bottom{ display:flex; align-items:center; justify-content:space-between; padding:10px 12px; gap:8px; }
.pin-actions{ display:flex; gap:8px; align-items:center; }
.pin-actions button{ background:transparent; border:none; color:var(--muted); cursor:pointer; display:inline-flex; align-items:center; gap:6px; }
.pin-actions .bi{ font-size:1.05rem; color:var(--primary); }

/* Floating upload */
.upload-btn{ position:fixed; right:22px; bottom:26px; width:62px; height:62px; border-radius:50%; background:linear-gradient(135deg,var(--primary),var(--primary-2)); color:#fff; border:none; font-size:1.6rem; display:grid; place-items:center; box-shadow:0 10px 34px rgba(165,148,249,0.18); cursor:pointer; z-index:1600; }
.toast-wrap{ position:fixed; left:50%; transform:translateX(-50%); bottom:100px; z-index:1700; }

/* Animations */
@keyframes fadeInUp{ from{opacity:0; transform:translateY(20px);} to{opacity:1; transform:translateY(0);} }
@media(max-width:576px){ .hero h1{ font-size:1.7rem; } .hero p{ font-size:.96rem; } .hero{ min-height:44vh; padding:60px 12px 48px; } }
</style>
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar">
  <div class="container-nav">
    <a class="brand" href="">GallSpace</a>
    <div class="search-bar" role="search">
      <i class="bi bi-search"></i>
      <input id="search" type="search" placeholder="Cari inspirasi..." aria-label="Cari">
    </div>
    <div class="nav-actions" role="toolbar" aria-label="Toolbar">
      <button class="nav-icon" title="Beranda"><i class="bi bi-house-door-fill"></i></button>
      <button class="nav-icon" title="Notifikasi"><i class="bi bi-bell-fill"></i></button>
      <button class="nav-icon" title="Pesan"><i class="bi bi-chat-dots-fill"></i></button>
      <button id="themeToggle" class="theme-toggle" title="Ganti tema"><i class="bi bi-moon-stars-fill"></i></button>
      <div>
        @auth
        <div class="dropdown d-inline-block">
          <button class="nav-icon" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->profile && Auth::user()->profile->avatar 
                        ? asset('storage/' . Auth::user()->profile->avatar) 
                        : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" 
                 alt="Avatar" style="width:38px;height:38px;border-radius:50%;object-fit:cover;">
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">@csrf
                <button type="submit" class="dropdown-item text-danger fw-semibold">Logout</button>
              </form>
            </li>
          </ul>
        </div>
        @else
        <a class="nav-icon btn" href="{{ route('auth') }}" style="background:linear-gradient(135deg,var(--primary),var(--primary-2)); color:#fff; border-radius:8px; padding:.45rem .6rem;">
          <i class="bi bi-person-circle"></i>
        </a>
        @endauth
      </div>
    </div>
  </div>
</nav>

<!-- HERO -->
<header class="hero" role="banner" aria-label="Welcome">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="hero__overlay" aria-hidden="true"></div>
  <div class="hero__content">
    <h1>Selamat Datang di GallSpace</h1>
    <p>Temukan inspirasi & ide desain — simpan, bagikan, dan buat koleksimu sendiri.</p>
    <div style="display:flex;gap:12px;justify-content:center;">
      <a href="#pins" class="cta" title="Jelajahi Inspirasi">Jelajahi Inspirasi</a>
      <button id="tryUpload" class="cta" style="background:transparent;border:2px solid rgba(255,255,255,0.14);">Unggah Gambar</button>
    </div>
  </div>
</header>

<!-- MASONRY GRID -->
<main id="pins" class="masonry" aria-live="polite" aria-label="Pins">
  <!-- Pins akan ditambahkan melalui JS atau server-side -->
</main>

<button id="uploadBtn" class="upload-btn" title="Unggah Gambar"><i class="bi bi-plus-lg"></i></button>
<div id="toastWrap" class="toast-wrap" aria-live="polite" aria-atomic="true"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// JS Ultra Final: Theme toggle, like, share, download, upload, staggered animation
(function(){
  const ROOT=document.documentElement,TOGGLE=document.getElementById('themeToggle'),ICON=TOGGLE.querySelector('i'),KEY='gallspace-theme';
  const saved=localStorage.getItem(KEY),sysDark=window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
  let isDark=saved ? saved==='dark' : sysDark;
  function applyTheme(d){ROOT.classList.toggle('dark',d); ICON.className=d?'bi bi-sun-fill':'bi bi-moon-stars-fill'; TOGGLE.classList.toggle('active',d);}
  applyTheme(isDark);
  TOGGLE.addEventListener('click',()=>{isDark=!ROOT.classList.contains('dark'); applyTheme(isDark); localStorage.setItem(KEY,isDark?'dark':'light');});
  if(!saved && window.matchMedia) window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change',e=>applyTheme(e.matches));

  // Toast
  function showToast(msg){const wrap=document.getElementById('toastWrap'); const t=document.createElement('div'); t.className='toast align-items-center text-bg-light border-0'; t.style.boxShadow='0 8px 20px rgba(0,0,0,0.12)'; t.innerHTML='<div class="d-flex"><div class="toast-body small">'+msg+'</div><button type="button" class="btn-close btn-close-dark me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>'; wrap.appendChild(t); const bs=new bootstrap.Toast(t,{delay:1400}); bs.show(); t.addEventListener('hidden.bs.toast',()=>t.remove());}

  // Pins stagger animation on scroll
  const pinsObserver=new IntersectionObserver((entries)=>{
    entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('show'); pinsObserver.unobserve(e.target);}});
  },{threshold:0.1});
  document.querySelectorAll('.pin').forEach(p=>pinsObserver.observe(p));

  // Smooth like, share, download, comment, upload (retain previous logic)
})();
</script>
</body>
</html>
