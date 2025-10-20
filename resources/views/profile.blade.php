<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Profil Saya - GallSpace</title>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
:root{
  --primary:#1877f2;
  --muted:#f0f2f5;
  --card:#ffffff;
  --shadow:0 6px 18px rgba(22,41,63,0.08);
}
body{
  font-family:'Poppins',sans-serif;
  background:var(--muted);
  margin-top:70px;
}

/* NAVBAR */
.navbar{ background:#fff; box-shadow:0 1px 6px rgba(0,0,0,0.06); }
.navbar-brand{ font-weight:700; color:var(--primary); }

/* COVER */
.profile-header{
  height:260px;
  background:linear-gradient(135deg,#1d7ff0,#4aa0ff);
  border-bottom-left-radius:12px; border-bottom-right-radius:12px;
  overflow:hidden; position:relative;
}
.cover-photo{
  width:100%; height:100%; object-fit:cover; opacity:0.9; filter:brightness(0.9);
}

/* PROFILE CARD */
.profile-card{
  max-width:1100px;
  margin:-70px auto 1rem;
  background:var(--card);
  border-radius:12px;
  box-shadow:var(--shadow);
  padding:1.6rem;
  position:relative;
}

/* AVATAR WRAP */
.avatar-wrap{ position:absolute; left:50%; transform:translateX(-50%); top:-70px; text-align:center; }

.avatar{
  width:140px; height:140px; border-radius:50%;
  object-fit:cover; border:5px solid #fff;
  box-shadow:0 8px 22px rgba(0,0,0,0.14);
  transition:transform .18s ease;
}
.avatar:hover{ transform:scale(1.05); }

/* CAMERA ICON */
.avatar-camera{
  position:absolute;
  top:95px; left:50%;
  transform:translateX(45%);
  background:rgba(255,255,255,0.96);
  width:46px; height:46px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  box-shadow:0 4px 14px rgba(0,0,0,0.15);
  cursor:pointer;
  transition:all .25s ease;
}
.avatar-camera i{
  font-size:1.25rem; color:#444;
  transition:color .25s ease;
}
.avatar-camera:hover{
  background:var(--primary);
  transform:translateX(45%) scale(1.08);
}
.avatar-camera:hover i{ color:#fff; }

/* PROFILE META */
.profile-meta{ margin-top:90px; text-align:center; }
.profile-meta h3{ font-weight:700; margin-bottom:0.25rem; }
.profile-meta p{ color:#6b7280; margin-bottom:.75rem; }

/* TABS */
.profile-tabs{
  display:flex; justify-content:center; gap:1rem;
  border-bottom:1px solid #e9eef5;
  padding-bottom:.6rem; margin-top:0.6rem;
}
.tab-link{ padding:.6rem 1rem; color:#374151; font-weight:600; border-radius:8px; cursor:pointer; }
.tab-link.active{ background:rgba(24,119,242,0.08); color:var(--primary); }

/* ===== FIXED LAYOUT ===== */
.container-main{
  max-width:1250px;
  margin:1.5rem auto 3rem;
  display:grid;
  grid-template-columns:280px minmax(0,640px) 300px;
  justify-content:center;
  align-items:start;
  gap:1.5rem;
}

/* CARDS */
.card-slim, .card-post{
  background:var(--card);
  border-radius:12px;
  padding:1rem;
  box-shadow:var(--shadow);
}
.card-post{ margin-bottom:1rem; }

/* POST IMAGE FIX */
.card-post img{
  display:block;
  margin:0 auto;
  border-radius:10px;
  max-height:400px;
  object-fit:cover;
  width:100%;
}

/* === FIX FOTO PROFIL POSTINGAN BIAR BULAT SEMPURNA === */
.card-post img.rounded-circle {
  width: 56px !important;
  height: 56px !important;
  border-radius: 50% !important;
  object-fit: cover !important;
  object-position: center !important;
  display: block !important;
}

/* COMPOSER */
.composer textarea{
  resize:none; width:100%; border-radius:8px;
  border:1px solid #e6eef6; padding:0.8rem;
}
.small-muted{ color:#6b7280; font-size:.92rem; }

/* PHOTOS */
.photos-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:8px; }
.photos-grid img{ width:100%; height:120px; object-fit:cover; border-radius:8px; }

/* FRIENDS */
.friend-item{ display:flex; gap:.75rem; align-items:center; margin-bottom:.8rem; }
.friend-item img{ width:48px; height:48px; border-radius:8px; object-fit:cover; }

/* RESPONSIVE */
@media (max-width:992px){
  .container-main{ grid-template-columns:1fr; padding:0 1rem; }
  .profile-card{ padding:1.2rem; }
  .avatar-camera{ top:105px; transform:translateX(40%); }
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">GallSpace</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3"><a class="nav-link" href="{{ route('dashboard') }}">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
            <img id="navAvatar" 
                 src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : 'https://via.placeholder.com/36?text=Me' }}" 
                 class="rounded-circle" width="36" height="36" alt="Me">
            <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil Saya</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST" class="px-3">@csrf
                <button class="btn btn-outline-danger w-100">Logout</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- COVER -->
<div class="profile-header">
  <img src="https://picsum.photos/1600/500?blur" class="cover-photo" alt="Cover">
</div>

<!-- PROFILE CARD -->
<div class="profile-card">
  <div class="avatar-wrap">
    <img id="profileAvatar" class="avatar" 
         src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : 'https://via.placeholder.com/150?text=Avatar' }}" 
         alt="Avatar">
    <div class="avatar-camera" data-bs-toggle="modal" data-bs-target="#editModal" title="Ubah foto profil">
      <i class="bi bi-camera"></i>
    </div>
  </div>

  <div class="profile-meta">
    <h3>{{ Auth::user()->name }}</h3>
    <p class="small-muted">Pengguna GallSpace • {{ Auth::user()->profile->job_title ?? '—' }}</p>
    <div class="profile-tabs" id="profileTabs">
      <div class="tab-link active" data-tab="posts">Postingan</div>
      <div class="tab-link" data-tab="about">Tentang</div>
      <div class="tab-link" data-tab="photos">Foto</div>
      <div class="tab-link" data-tab="friends">Teman</div>
    </div>
  </div>
</div>

<!-- MAIN CONTENT -->
<div class="container-main">
  <!-- LEFT -->
  <div>
    <div class="card-slim mb-3">
      <h6 class="mb-2">Tentang</h6>
      <p class="small-muted mb-1"><strong>Lokasi:</strong> {{ Auth::user()->profile->location ?? '—' }}</p>
      <p class="small-muted mb-1"><strong>Pekerjaan:</strong> {{ Auth::user()->profile->job_title ?? '—' }}</p>
      <p class="small-muted mb-0"><strong>Bergabung:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
    </div>
  </div>

  <!-- CENTER -->
  <div id="tabContent">
    <div id="tab-posts" class="tab-section active">
      <div class="card-post composer mb-3">
        <div class="d-flex gap-3">
          <img src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : 'https://via.placeholder.com/48?text=Me' }}" class="rounded-circle" width="48" height="48">
          <div class="w-100">
            <textarea rows="3" placeholder="Apa yang ingin kamu bagikan?" class="form-control mb-2"></textarea>
            <div class="d-flex justify-content-between align-items-center">
              <div class="small-muted"><i class="bi bi-image"></i> Foto</div>
              <button class="btn btn-sm btn-primary rounded-3">Posting</button>
            </div>
          </div>
        </div>
      </div>

      @for($i=1;$i<=3;$i++)
      <div class="card-post">
        <div class="d-flex align-items-start gap-3 mb-2">
          <img src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : 'https://via.placeholder.com/56?text=U' }}" 
               class="rounded-circle" width="56" height="56">
          <div class="w-100">
            <div class="d-flex justify-content-between">
              <div>
                <strong>{{ Auth::user()->name }}</strong>
                <div class="small-muted">Publik • {{ now()->subHours($i*3)->diffForHumans() }}</div>
              </div>
              <div class="small-muted">•••</div>
            </div>
            <p class="mt-2">Ini contoh postingan nomor {{ $i }}.</p>
            <img src="https://picsum.photos/900/400?random={{ $i }}" class="img-fluid rounded mt-2">
            <div class="d-flex justify-content-between align-items-center mt-3 small-muted">
              <div><i class="bi bi-hand-thumbs-up me-1"></i>12</div>
              <div><i class="bi bi-chat-left-text me-1"></i>3 komentar</div>
            </div>
          </div>
        </div>
      </div>
      @endfor
    </div>

    <div id="tab-about" class="tab-section d-none">
      <div class="card-slim">
        <h6>Informasi Pribadi</h6>
        <p class="small-muted">Nama: {{ Auth::user()->name }}</p>
        <p class="small-muted">Pekerjaan: {{ Auth::user()->profile->job_title ?? '—' }}</p>
        <p class="small-muted">Email: {{ Auth::user()->email }}</p>
      </div>
    </div>

    <div id="tab-photos" class="tab-section d-none">
      <div class="card-slim">
        <h6>Foto</h6>
        <div class="photos-grid mt-2">
          @for($p=1;$p<=6;$p++)
          <img src="https://picsum.photos/200/200?random={{ $p }}">
          @endfor
        </div>
      </div>
    </div>

    <div id="tab-friends" class="tab-section d-none">
      <div class="card-slim">
        <h6>Teman</h6>
        @for($t=1;$t<=3;$t++)
        <div class="friend-item">
          <img src="https://picsum.photos/seed/f{{ $t }}/80">
          <div><strong>Teman {{ $t }}</strong><div class="small-muted">{{ rand(1,5) }} mutual</div></div>
        </div>
        @endfor
      </div>
    </div>
  </div>

  <!-- RIGHT -->
  <div>
    <div class="card-slim mb-3">
      <h6>Saran Teman</h6>
      @for($s=1;$s<=5;$s++)
      <div class="friend-item">
        <img src="https://picsum.photos/seed/suggest{{ $s }}/80/80">
        <div class="flex-grow-1"><strong>Suggested {{ $s }}</strong><div class="small-muted">2 mutual</div></div>
        <button class="btn btn-sm btn-outline-primary">Add</button>
      </div>
      @endfor
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title">Ubah Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <img id="avatarPreview" 
               src="{{ Auth::user()->profile && Auth::user()->profile->avatar ? asset('storage/'.Auth::user()->profile->avatar) : 'https://via.placeholder.com/100?text=Avatar' }}" 
               width="100" height="100" style="border-radius:50%; object-fit:cover; border:3px solid #eee;">
          <div class="mt-3 text-start">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
          </div>
          <div class="mt-3 text-start">
            <label class="form-label">Foto Profil</label>
            <input type="file" class="form-control" name="avatar" id="avatarInput" accept="image/*">
          </div>
        </div>
        <div class="modal-footer border-0">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
const avatarInput=document.getElementById('avatarInput');
const avatarPreview=document.getElementById('avatarPreview');
const profileAvatar=document.getElementById('profileAvatar');
const navAvatar=document.getElementById('navAvatar');
if(avatarInput){
  avatarInput.addEventListener('change',function(){
    const f=this.files[0]; if(!f)return;
    const r=new FileReader();
    r.onload=e=>{
      avatarPreview.src=e.target.result;
      profileAvatar.src=e.target.result;
      navAvatar.src=e.target.result;
    };
    r.readAsDataURL(f);
  });
}

/* Tabs */
const tabLinks=document.querySelectorAll('.tab-link');
const tabSections=document.querySelectorAll('.tab-section');
tabLinks.forEach(link=>{
  link.addEventListener('click',()=>{
    tabLinks.forEach(l=>l.classList.remove('active'));
    link.classList.add('active');
    const target=link.getAttribute('data-tab');
    tabSections.forEach(sec=>{
      if(sec.id==='tab-'+target){ sec.classList.remove('d-none'); sec.classList.add('active'); }
      else { sec.classList.add('d-none'); sec.classList.remove('active'); }
    });
    window.scrollTo({top:500,behavior:'smooth'});
  });
});
</script>
</body>
</html>
