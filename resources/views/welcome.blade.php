<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GallSpace - Temukan Inspirasi Tanpa Batas</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #a594f9;
      --accent: #c8b6ff;
      --light-accent: #f4f2ff;
      --bg: #ffffff;
      --gray: #fafafc;
      --text: #3c3c43;
      --shadow: rgba(0, 0, 0, 0.07);
    }

    /* 🌙 Dark Mode Variables */
    :root.dark {
      --primary: #8b7ae6;
      --accent: #6f5ce6;
      --light-accent: rgba(140,125,230,0.08);
      --bg: #0f1115;
      --gray: #0b0c0e;
      --text: #e6e6ea;
      --shadow: rgba(0, 0, 0, 0.6);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--gray);
      color: var(--text);
      margin: 0;
      transition: background 0.3s, color 0.3s;
    }

    /* NAVBAR */
    .navbar {
      background-color: var(--bg);
      box-shadow: 0 1px 6px var(--shadow);
      padding: 0.5rem 1.5rem;
      position: sticky;
      top: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary);
      letter-spacing: -0.5px;
    }

    /* SEARCH BAR */
    .search-bar {
      flex: 1;
      margin: 0 1.5rem;
      max-width: 600px;
      position: relative;
    }

    .search-bar input {
      width: 100%;
      border-radius: 30px;
      border: none;
      background-color: var(--light-accent);
      padding: 10px 18px 10px 40px;
      outline: none;
      font-size: 0.95rem;
      color: var(--text);
      transition: all 0.3s ease;
    }

    .search-bar input:focus {
      background-color: #fff;
      box-shadow: 0 0 0 3px var(--accent);
    }

    .search-bar i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--primary);
      font-size: 1.1rem;
    }

    /* NAV ICONS */
    .nav-icons i {
      font-size: 1.25rem;
      margin-left: 15px;
      cursor: pointer;
      color: var(--text);
      background-color: transparent;
      padding: 10px;
      border-radius: 50%;
      transition: all 0.2s ease;
    }

    .nav-icons i:hover {
      background-color: var(--light-accent);
      color: var(--primary);
      transform: scale(1.1);
    }

    /* PROFILE ICON */
    .profile-icon a {
      color: var(--primary);
      font-size: 1.8rem;
      margin-left: 18px;
      background-color: var(--light-accent);
      border-radius: 50%;
      padding: 6px;
      transition: all 0.3s ease;
    }

    .profile-icon a:hover {
      background-color: var(--accent);
      color: #fff;
      transform: scale(1.1);
      box-shadow: 0 4px 10px rgba(165, 148, 249, 0.3);
    }

    /* 🌗 THEME TOGGLE */
    .theme-toggle {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      margin-left: 15px;
      border-radius: 50%;
      cursor: pointer;
      background: transparent;
      color: var(--text);
      border: none;
      transition: background .18s ease, transform .12s ease, color .18s ease;
    }

    .theme-toggle:hover {
      background: var(--light-accent);
      color: var(--primary);
      transform: scale(1.07);
    }

    .theme-toggle.active {
      background: var(--light-accent);
      color: var(--primary);
      transform: scale(1.07);
    }

    /* GRID (Pinterest Style) */
    .masonry {
      column-count: 5;
      column-gap: 1rem;
      padding: 1.2rem;
    }

    @media (max-width: 1400px) { .masonry { column-count: 4; } }
    @media (max-width: 992px) { .masonry { column-count: 3; } }
    @media (max-width: 768px) { .masonry { column-count: 2; } }
    @media (max-width: 576px) { .masonry { column-count: 1; } }

    .pin {
      background-color: var(--bg);
      border-radius: 16px;
      margin-bottom: 1rem;
      overflow: hidden;
      break-inside: avoid;
      box-shadow: 0 2px 8px var(--shadow);
      transition: all 0.25s ease;
      opacity: 0;
      transform: translateY(15px);
      animation: fadeInUp 0.6s forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .pin:hover {
      transform: translateY(-6px);
      box-shadow: 0 6px 16px rgba(165, 148, 249, 0.25);
    }

    .pin img {
      width: 100%;
      display: block;
      border-radius: 16px 16px 0 0;
    }

    .pin-info {
      padding: 10px 14px 14px;
    }

    .pin-info h6 {
      font-size: 0.95rem;
      font-weight: 600;
      margin: 0;
      color: var(--primary);
    }

    .pin-info p {
      font-size: 0.85rem;
      color: #666;
      margin-top: 3px;
    }

    /* FLOATING UPLOAD BUTTON */
    .upload-btn {
      position: fixed;
      bottom: 26px;
      right: 26px;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      box-shadow: 0 6px 14px rgba(165, 148, 249, 0.35);
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .upload-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 8px 20px rgba(165, 148, 249, 0.45);
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a class="navbar-brand" href="#">GallSpace</a>

    <div class="search-bar">
      <i class="bi bi-search"></i>
      <input type="text" placeholder="Cari inspirasi seperti 'dekorasi kamar pastel'...">
    </div>

    <div class="d-flex align-items-center">
      <div class="nav-icons">
        <i class="bi bi-house-door-fill"></i>
        <i class="bi bi-bell-fill"></i>
        <i class="bi bi-chat-dots-fill"></i>
      </div>

      <!-- 🌙 DARK MODE TOGGLE -->
      <button id="themeToggle" class="theme-toggle" title="Ganti tema">
        <i class="bi bi-moon-stars-fill"></i>
      </button>

      <div class="profile-icon">
        <a href="{{ route('auth') }}"><i class="bi bi-person-circle"></i></a>
      </div>
    </div>
  </nav>

  <!-- GRID CONTENT -->
  <div class="masonry">
    <div class="pin">
      <img src="https://ik.imagekit.io/tvlk/blog/2020/01/keindahan-alam-indonesia-6-Wikipedia.jpg" alt="">
      <div class="pin-info">
        <h6>Keindahan Alam</h6>
        <p>Inspirasi dari pemandangan tropis Indonesia.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://images.pexels.com/photos/169647/pexels-photo-169647.jpeg" alt="">
      <div class="pin-info">
        <h6>Kota di Malam Hari</h6>
        <p>Keindahan cahaya malam yang memukau.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://images.tokopedia.net/img/JFrBQq/2022/8/15/06fce354-78b3-4aa2-b070-efaa73343a81.jpg" alt="">
      <div class="pin-info">
        <h6>Makanan Lezat</h6>
        <p>Ide resep untuk hari yang istimewa.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://static.vecteezy.com/system/resources/previews/016/518/046/non_2x/rumah-joglo-aka-indonesian-traditional-house-free-vector.jpg" alt="">
      <div class="pin-info">
        <h6>Karya Seni</h6>
        <p>Kreativitas tanpa batas dalam desain.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb" alt="">
      <div class="pin-info">
        <h6>Gunung & Awan</h6>
        <p>Rasakan ketenangan alam di puncak.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://images.unsplash.com/photo-1522202222270-5a5e8a1ba485" alt="">
      <div class="pin-info">
        <h6>Desain Interior</h6>
        <p>Ruang sederhana penuh kehangatan.</p>
      </div>
    </div>
  </div>

  <!-- Floating Upload Button -->
  <button class="upload-btn">
    <i class="bi bi-plus-lg"></i>
  </button>

  <!-- 🌗 DARK MODE SCRIPT -->
  <script>
    (function() {
      const root = document.documentElement;
      const toggleBtn = document.getElementById('themeToggle');
      const icon = toggleBtn.querySelector('i');
      const STORAGE_KEY = 'gallspace-theme';

      function updateIcon(isDark) {
        icon.className = isDark ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
      }

      const savedTheme = localStorage.getItem(STORAGE_KEY);
      const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      let isDark = savedTheme ? savedTheme === 'dark' : systemPrefersDark;

      root.classList.toggle('dark', isDark);
      updateIcon(isDark);

      toggleBtn.addEventListener('click', () => {
        isDark = !isDark;
        root.classList.toggle('dark', isDark);
        localStorage.setItem(STORAGE_KEY, isDark ? 'dark' : 'light');
        updateIcon(isDark);
      });

      if (!savedTheme) {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
          const systemDark = e.matches;
          root.classList.toggle('dark', systemDark);
          updateIcon(systemDark);
        });
      }
    })();
  </script>
</body>
</html>
