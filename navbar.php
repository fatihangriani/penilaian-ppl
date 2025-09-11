<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role = strtolower($_SESSION['role'] ?? '');
$username = $_SESSION['username'] ?? '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase" href="index.php">
      <i class="bi bi-shop me-1"></i> Fatih Store
    </a>
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
                <a class="nav-link" href="barang.php">
                  <i class="bi bi-box-seam me-1"></i> Barang
                </a>
              </li>
            <?php else: ?>
              <!-- Owner, Admin, Kasir -->
              <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-house me-1"></i> Home</a></li>
              <li class="nav-item"><a class="nav-link" href="pembeli.php"><i class="bi bi-people me-1"></i> Pembeli</a></li>
              <li class="nav-item"><a class="nav-link" href="barang.php"><i class="bi bi-boxes me-1"></i> Barang</a></li>
            <?php endif; ?>

            <!-- Dropdown User -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i> 
                <?= htmlspecialchars($username); ?>
                <span class="badge bg-info text-dark ms-2"><?= htmlspecialchars($role); ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person-lines-fill me-2"></i>Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
              </ul>
            </li>

        <?php else: ?>
            <!-- Jika belum login -->
            <li class="nav-item">
              <a class="btn btn-primary px-3 ms-2" href="login.php">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
              </a>
            </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
