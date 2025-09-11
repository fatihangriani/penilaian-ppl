<?php
session_start();
require 'funtions.php';

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Anda harus login dulu!'); document.location.href='../login/index.php';</script>";
    exit;
}

// Ambil role user
$role = $_SESSION['role'] ?? '';

// Validasi parameter id
if (!isset($_GET['id'])) {
    echo "<script>alert('Barang tidak ditemukan!'); document.location.href='barang.php';</script>";
    exit;
}

$id = (int)$_GET['id'];
$barang = tampil("SELECT * FROM barang WHERE id_barang = $id");

if (!$barang) {
    echo "<script>alert('Barang tidak ditemukan di database!'); document.location.href='barang.php';</script>";
    exit;
}

$barang = $barang[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Barang | Inventory System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1e40af;
        --secondary: #3b82f6;
        --light: #f0f7ff;
        --accent: #ffd700;
        --text: #1e293b;
        --border: #dbeafe;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
    }
    * {margin: 0;padding: 0;box-sizing: border-box;font-family: "Segoe UI", sans-serif;}
    body {background: #f8fafc;color: var(--text);line-height: 1.6;}
    .container {max-width: 1000px;margin: 40px auto;padding: 0 20px;}
    .card {background: white;border-radius: 16px;overflow: hidden;box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);}
    .card-header {background: linear-gradient(135deg, var(--primary), var(--primary-dark));color: white;padding: 20px 30px;display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;gap: 15px;}
    .page-title {display: flex;align-items: center;gap: 12px;font-size: 24px;font-weight: 600;}
    .card-body {padding: 30px;}
    .detail-content {display: grid;grid-template-columns: 1fr 2fr;gap: 30px;margin-bottom: 25px;}
    @media (max-width: 768px) {.detail-content {grid-template-columns: 1fr;}}
    .product-image {border-radius: 12px;overflow: hidden;box-shadow: 0 5px 15px rgba(0,0,0,0.08);}
    .product-image img {width: 100%;height: 280px;object-fit: cover;display: block;}
    .product-info {display: flex;flex-direction: column;gap: 20px;}
    .info-section {background: #f8fafc;border-radius: 12px;padding: 20px;border: 1px solid var(--border);}
    .info-section h3 {color: var(--primary-dark);margin-bottom: 15px;font-size: 18px;display: flex;align-items: center;gap: 10px;}
    .info-row {display: flex;margin-bottom: 12px;}
    .info-label {flex: 0 0 120px;font-weight: 600;color: var(--text);}
    .info-value {flex: 1;color: #64748b;}
    .price {font-weight: 700;font-size: 20px;color: var(--success);}
    .actions {display: flex;flex-wrap: wrap;gap: 12px;margin: 25px 0;}
    .btn {display: inline-flex;align-items: center;gap: 8px;padding: 12px 20px;border-radius: 10px;color: white;text-decoration: none;font-weight: 600;transition: all 0.2s ease;}
    .btn:hover {transform: translateY(-2px);box-shadow: 0 4px 12px rgba(0,0,0,0.15);}
    .btn-edit {background: var(--primary);}
    .btn-edit:hover {background: var(--primary-dark);}
    .btn-delete {background: var(--danger);}
    .btn-delete:hover {background: #dc2626;}
    .btn-back {background: var(--secondary);}
    .btn-back:hover {background: #2563eb;}
    .stock-form {background: #f8fafc;border-radius: 12px;padding: 25px;margin-top: 20px;border: 1px solid var(--border);}
    .stock-form h3 {margin-bottom: 15px;color: var(--primary-dark);display: flex;align-items: center;gap: 10px;}
    .form-row {display: grid;grid-template-columns: 1fr 1fr auto;gap: 15px;align-items: end;}
    @media (max-width: 576px) {.form-row {grid-template-columns: 1fr;}}
    .form-group {display: flex;flex-direction: column;gap: 8px;}
    .form-group label {font-weight: 600;font-size: 14px;color: var(--text);}
    .form-control {padding: 12px 15px;border: 1px solid var(--border);border-radius: 10px;font-size: 15px;background: white;}
    .form-control:focus {outline: none;border-color: var(--primary);box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);}
    .btn-add {background: var(--success);border: none;cursor: pointer;height: fit-content;padding: 12px 20px;border-radius: 10px;color: white;font-weight: 600;display: flex;align-items: center;gap: 8px;transition: all 0.2s ease;}
    .btn-add:hover {background: #059669;transform: translateY(-2px);box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);}
    .stok-info {font-weight: 600;padding: 6px 12px;border-radius: 20px;display: inline-block;font-size: 14px;}
    .stok-high {background: #dcfce7;color: #166534;}
    .stok-low {background: #fef3c7;color: #92400e;}
    .stok-empty {background: #fee2e2;color: #b91c1c;}
  </style>
</head>
<body>
<?php include '../navbar.php'; ?>

<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="page-title">
        <i class="fas fa-box"></i>
        <span>Detail Barang</span>
      </div>
    </div>
    
    <div class="card-body">
      <div class="detail-content">
        <div class="product-image">
          <img src="../uploads/<?= $barang['gambar']; ?>" alt="<?= $barang['nama_barang']; ?>">
        </div>
        
        <div class="product-info">
          <div class="info-section">
            <h3><i class="fas fa-info-circle"></i> Informasi Barang</h3>
            <div class="info-row">
              <div class="info-label">ID Barang</div>
              <div class="info-value"><?= $barang['id_barang']; ?></div>
            </div>
            <div class="info-row">
              <div class="info-label">Nama</div>
              <div class="info-value"><?= $barang['nama_barang']; ?></div>
            </div>
          </div>
          
          <div class="info-section">
            <h3><i class="fas fa-chart-bar"></i> Stok & Harga</h3>
            <div class="info-row">
              <div class="info-label">Stok</div>
              <div class="info-value">
                <?php
                $stok_class = '';
                if ($barang['stok'] == 0) {
                    $stok_class = 'stok-empty';
                } elseif ($barang['stok'] < 10) {
                    $stok_class = 'stok-low';
                } else {
                    $stok_class = 'stok-high';
                }
                ?>
                <span class="stok-info <?= $stok_class ?>">
                  <?= $barang['stok']; ?> Unit
                </span>
              </div>
            </div>
            <div class="info-row">
              <div class="info-label">Harga</div>
              <div class="info-value price">Rp <?= number_format($barang['harga'],0,',','.'); ?></div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="actions">
        <a href="edit_barang.php?id=<?= $barang['id_barang']; ?>" class="btn btn-edit">
          <i class="fas fa-edit"></i> Edit
        </a>
        <a href="hapus_barang.php?id=<?= $barang['id_barang']; ?>" class="btn btn-delete" onclick="return confirm('Hapus barang ini?')">
          <i class="fas fa-trash"></i> Hapus
        </a>
        <a href="barang.php" class="btn btn-back">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>
      
      <?php if ($role === 'Suplier'): ?>
      <div class="stock-form">
        <h3><i class="fas fa-plus-circle"></i> Tambah Stok</h3>
        <form method="POST" action="update_stok.php">
          <div class="form-row">
            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="number" name="stok" class="form-control" min="1" placeholder="Jumlah" required>
            </div>
            
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control" placeholder="Opsional">
            </div>
            
            <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
            <button type="submit" name="tambah" class="btn btn-add">
              <i class="fas fa-plus"></i> Tambah
            </button>
          </div>
        </form>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>