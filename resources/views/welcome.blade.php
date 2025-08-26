<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinterest-style Landing Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f0f2f5; }
    .navbar-brand { font-weight: 700; color: #ff6b6b !important; }
    .hero { background: linear-gradient(135deg, #ffb347, #ffcc33); color: #333; text-align: center; padding: 140px 15px 80px 15px; border-bottom-left-radius: 50% 10%; border-bottom-right-radius: 50% 10%; }
    .hero h1 { font-size: 3rem; font-weight: 700; }
    .hero p { font-size: 1.2rem; color: #444; }
    .hero .btn-light { background-color: #ff6b6b; color: white; border: none; }
    .hero .btn-light:hover { background-color: #ff4757; }
    .grid-container { column-count: 4; column-gap: 1rem; padding: 2rem; }
    @media (max-width: 1200px){ .grid-container{ column-count:3; } }
    @media (max-width: 768px){ .grid-container{ column-count:2; } }
    @media (max-width: 576px){ .grid-container{ column-count:1; } }
    .pin { break-inside: avoid; background: white; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 6px 15px rgba(0,0,0,0.08); transition: transform 0.3s, box-shadow 0.3s; }
    .pin:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(0,0,0,0.15); }
    .pin img { width: 100%; display: block; border-bottom: 1px solid #eee; }
    .pin-body { padding: 0.75rem 1rem 1rem 1rem; }
    .pin-body h5 { margin: 0.5rem 0; color: #ff6b6b; }
    .pin-body p { color: #666; font-size: 0.95rem; }
    footer { text-align: center; padding: 25px; background: #222; color: #aaa; }
    footer p { margin: 0; font-size: 0.9rem; }
    /* Style tombol login */
    .nav-btn { margin-left: 0.5rem; font-weight: 600; }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">PinPage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto" id="navbarMenu">
          <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#pins">Pins</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <!-- Button login akan di-generate oleh JS -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="hero" class="hero">
    <h1>Selamat Datang di PinPage</h1>
    <p>Temukan inspirasi, ide, dan kreativitas tanpa batas</p>
    <a href="#pins" class="btn btn-light btn-lg mt-3">Jelajahi Pins</a>
  </section>

  <!-- Pins Section -->
  <section id="pins" class="grid-container">
    <!-- Contoh gambar publik -->
    <div class="pin">
      <img src="https://source.unsplash.com/400x300/?nature" alt="Pin 1">
      <div class="pin-body">
        <h5>Keindahan Alam</h5>
        <p>Inspirasi dari alam yang menenangkan.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://source.unsplash.com/400x500/?city" alt="Pin 2">
      <div class="pin-body">
        <h5>Kota di Malam Hari</h5>
        <p>Pemandangan kota yang menakjubkan.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://source.unsplash.com/400x400/?food" alt="Pin 3">
      <div class="pin-body">
        <h5>Makanan Lezat</h5>
        <p>Ide makanan yang menggugah selera.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://source.unsplash.com/400x600/?art" alt="Pin 4">
      <div class="pin-body">
        <h5>Karya Seni</h5>
        <p>Inspirasi dari dunia seni dan lukisan.</p>
      </div>
    </div>
    <div class="pin">
      <img src="https://source.unsplash.com/400x350/?travel" alt="Pin 5">
      <div class="pin-body">
        <h5>Liburan Pantai</h5>
        <p>Destinasi liburan yang indah dan santai.</p>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5 bg-light">
    <div class="container text-center">
      <h2>Hubungi Kami</h2>
      <p>Ingin tahu lebih banyak? Kirimkan pesanmu.</p>
      <form class="mx-auto" style="max-width:400px;">
        <input type="text" class="form-control mb-2" placeholder="Nama" required>
        <input type="email" class="form-control mb-2" placeholder="Email" required>
        <textarea class="form-control mb-2" rows="3" placeholder="Pesan" required></textarea>
        <button type="submit" class="btn btn-primary w-100">Kirim</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 PinPage. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS untuk tombol login -->
  <script>
    const isLoggedIn = false; // ganti true jika user sudah login
    const navbarMenu = document.getElementById('navbarMenu');

    function createLoginButton() {
      const li = document.createElement('li');
      li.className = 'nav-item';
      const btn = document.createElement('button');
      btn.className = 'btn btn-sm nav-btn';
      btn.style.backgroundColor = '#ff6b6b';
      btn.style.color = 'white';
      btn.innerText = 'Login';
      btn.onclick = () => alert('Login clicked'); // nanti diganti ke auth route Laravel
      li.appendChild(btn);
      return li;
    }

    if(!isLoggedIn){
      const loginBtn = createLoginButton();
      navbarMenu.appendChild(loginBtn);
    }
  </script>

</body>
</html>
