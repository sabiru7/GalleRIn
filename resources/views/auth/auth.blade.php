<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin | 📷 GalleRin</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Background neon gradient */
    body {
      background: radial-gradient(circle at top left, #3b82f6, transparent 40%),
                  radial-gradient(circle at bottom right, #8b5cf6, transparent 40%),
                  #0f172a;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Inter', sans-serif;
      overflow: hidden;
      color: white;
    }

    /* Glass effect card */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
      border: 1px solid rgba(255, 255, 255, 0.15);
      animation: fadeIn 0.8s ease-out;
    }

    /* FadeIn Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Input style */
    .form-control {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #fff;
    }
    .form-control:focus {
      border-color: #6366f1;
      box-shadow: 0 0 8px rgba(99,102,241,0.6);
      background: rgba(255, 255, 255, 0.15);
    }

    /* Button */
    .btn-primary {
      background: linear-gradient(90deg, #3b82f6, #8b5cf6);
      border: none;
      transition: all 0.3s ease-in-out;
    }
    .btn-primary:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(139,92,246,0.7);
    }

    /* Tabs */
    .nav-tabs .nav-link {
      border: none;
      color: #cbd5e1;
    }
    .nav-tabs .nav-link.active {
      color: #fff;
      border-bottom: 2px solid #6366f1;
      font-weight: 600;
    }

    /* Small helper text */
    .small-text {
      font-size: 0.85rem;
      color: #9ca3af;
    }
  </style>
</head>
<body>
  <div class="glass-card p-5 w-100" style="max-width: 420px;">
    <h3 class="text-center fw-bold mb-2">Login Admin</h3>
    <p class="text-center small-text mb-4">Masuk ke panel admin dengan aman 🚀</p>

    <!-- Tabs -->
    <ul class="nav nav-tabs justify-content-center mb-3" id="authTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Register</button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="authTabContent">

      <!-- LOGIN -->
      <div class="tab-pane fade show active" id="login" role="tabpanel">
        <form action="{{ route('login') }}" method="POST" class="space-y-3">
          @csrf
          <div class="mb-3">
            <label class="form-label small-text">Email</label>
            <input type="email" name="email" class="form-control rounded-3" placeholder="admin@example.com" required>
          </div>
          <div class="mb-3">
            <label class="form-label small-text">Password</label>
            <input type="password" name="password" class="form-control rounded-3" placeholder="••••••••" required>
            <div class="small-text mt-1">Contoh akun demo: admin@example.com / Admin123!</div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div><input type="checkbox" id="remember"> <label for="remember" class="small-text">Ingat saya</label></div>
            <a href="#" class="small-text text-indigo-400">Lupa sandi?</a>
          </div>
          <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
        </form>
      </div>

      <!-- REGISTER -->
      <div class="tab-pane fade" id="register" role="tabpanel">
        <form action="{{ route('register') }}" method="POST" class="space-y-3">
          @csrf
          <div class="mb-3">
            <label class="form-label small-text">Nama</label>
            <input type="text" name="name" class="form-control rounded-3" placeholder="Nama lengkap" required>
          </div>
          <div class="mb-3">
            <label class="form-label small-text">Email</label>
            <input type="email" name="email" class="form-control rounded-3" placeholder="email@example.com" required>
          </div>
          <div class="mb-3">
            <label class="form-label small-text">Password</label>
            <input type="password" name="password" class="form-control rounded-3" placeholder="••••••••" required>
          </div>
          <div class="mb-3">
            <label class="form-label small-text">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control rounded-3" placeholder="••••••••" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
        </form>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
