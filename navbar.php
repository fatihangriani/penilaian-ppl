<?php
// navbar.php (partial)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role = strtolower($_SESSION['role'] ?? '');
$username = $_SESSION['username'] ?? '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Fatih</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <?php if (!empty($username)): ?>

            <?php if ($role === 'suplier'): ?>
              <!-- Suplier hanya boleh akses Barang -->
              <li class="nav-item">
                <a class="nav-link" href="barang.php">Barang</a>
              </li>
            <?php else: ?>
              <!-- Owner, Admin, Kasir bisa akses semua -->
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="pembeli.php">Pembeli</a></li>
              <li class="nav-item"><a class="nav-link" href="barang.php">Barang</a></li>
            <?php endif; ?>

            <!-- Dropdown User -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= htmlspecialchars($username); ?> (<?= htmlspecialchars($role); ?>)
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>

        <?php else: ?>
            <!-- Jika belum login -->
            <li class="nav-item">
              <a class="nav-link btn btn-primary text-white px-3 ms-2" href="login.php">Login</a>
            </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
