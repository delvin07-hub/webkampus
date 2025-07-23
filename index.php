<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portal Kampus Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- Breaking news ticker -->
<div class="bg-danger text-white py-2 px-3">
  <strong>BERITA TERKINI:</strong>
  <marquee>
    Pendaftaran Beasiswa | Seminar Nasional | Universitas raih penghargaan
  </marquee>
</div>

<!-- Navbar Tailwind -->
<nav class="bg-blue-900 text-white shadow-md">
  <div class="container mx-auto px-4 flex items-center justify-between h-20 py-2">
    <a href="#" class="font-bold text-lg flex items-center">
      <span class="mr-2"><i class="fas fa-university"></i></span> UNIVERSITAS DARUL ULUM
    </a>
    <div class="hidden md:flex space-x-6 items-center">
      <a href="#" class="hover:text-yellow-300 font-semibold">Beranda</a>
      <a href="#" class="hover:text-yellow-300 font-semibold">Profil</a>
      <a href="#" class="hover:text-yellow-300 font-semibold">Akademik</a>
      <a href="#" class="hover:text-yellow-300 font-semibold">Kontak</a>
      <a href="login.php" class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 px-4 py-2 rounded font-bold flex items-center">
        <i class="fas fa-sign-in-alt mr-2"></i> Login
      </a>
    </div>
    <!-- Hamburger -->
    <button id="navToggle" class="md:hidden focus:outline-none">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
  <!-- Mobile Menu -->
  <div id="navMenu" class="md:hidden hidden px-4 pb-4">
    <a href="#" class="block py-2 hover:text-yellow-300 font-semibold">Beranda</a>
    <a href="#" class="block py-2 hover:text-yellow-300 font-semibold">Profil</a>
    <a href="#" class="block py-2 hover:text-yellow-300 font-semibold">Akademik</a>
    <a href="#" class="block py-2 hover:text-yellow-300 font-semibold">Kontak</a>
    <a href="login.php" class="block py-2 bg-yellow-400 hover:bg-yellow-500 text-blue-900 rounded font-bold mt-2">
      <i class="fas fa-sign-in-alt mr-2"></i> Login Admin
    </a>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Portal Darul Ulum</h1>
            <p class="text-xl mb-8">Sumber informasi terpercaya untuk seluruh civitas akademika Universitas Teknologi Digital.</p>
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                <button class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-graduation-cap mr-2"></i>Info Akademik
                </button>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-calendar-alt mr-2"></i>Kalender Akademik
                </button>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <!-- Carousel Ilustrasi Kampus -->
            <div id="kampusCarousel" class="carousel slide w-100" data-bs-ride="carousel" data-bs-interval="3000" style="max-width:500px;">
              <div class="carousel-inner rounded-lg shadow-xl">
                <div class="carousel-item active">
                  <img src="admin/img/kampus1.jpg" class="d-block w-100" alt="Kampus 1" style="height:350px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                  <img src="admin/img/kampus2.jpg" class="d-block w-100" alt="Kampus 2" style="height:350px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                  <img src="admin/img/kampus3.jpg" class="d-block w-100" alt="Kampus 3" style="height:350px; object-fit:cover;">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#kampusCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#kampusCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <!-- End Carousel -->
        </div>
    </div>
</section>

<!-- Kartu Berita (dinamis dari database) -->
<div class="container my-5">
  <h2 class="mb-4 fw-bold">Berita Kampus</h2>
  <div class="row g-4">
    <?php
    $berita = mysqli_query($koneksi,"SELECT * FROM berita WHERE tipe='text' ORDER BY id DESC LIMIT 3");
    while($b = mysqli_fetch_array($berita)){
    ?>
    <div class="col-md-4">
      <div class="card card-hover">
        <div class="card-body">
          <h5 class="card-title">
            <a href="detail.php?id=<?= $b['id'] ?>" class="text-decoration-none text-dark">
              <?= htmlspecialchars($b['judul']) ?>
            </a>

          </h5>
          <p><?= htmlspecialchars(substr(strip_tags($b['konten']),0,60)) ?>...</p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>


<!-- Video Section -->
<div class="container my-5">
  <h2 class="mb-4 fw-bold">Berita Video</h2>
  <div class="row g-4">
    <?php
    $video = mysqli_query($koneksi,"SELECT * FROM berita WHERE tipe='video' ORDER BY id DESC LIMIT 2");
    while($v = mysqli_fetch_array($video)){
    ?>
    <div class="col-md-6">
      <div class="card card-hover">
        <img src="<?= htmlspecialchars($v['thumbnail']) ?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($v['judul']) ?></h5>
          <p><?= htmlspecialchars(substr(strip_tags($v['deskripsi']),0,60)) ?>...</p>
          <a href="<?= htmlspecialchars($v['link']) ?>" target="_blank" class="btn btn-primary">Tonton Video</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Toggle mobile menu
document.getElementById('navToggle').onclick = function() {
  var menu = document.getElementById('navMenu');
  menu.classList.toggle('hidden');
};
</script>
</body>
</html>
