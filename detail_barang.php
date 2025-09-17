<?php
require "funtions.php";
session_start(); // pastikan session dimulai
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['role'] == 'kasir') {
    header("Location: index.php");
    exit;
}
include "navbar.php";
$id = $_GET['id'];

// ambil data barang
$data = query("SELECT * FROM barang WHERE id_barang=$id");

if (!$data) {
    echo "Data barang tidak ditemukan!";
    exit;
}

$barang = $data[0];
$role = $_SESSION['role'] ?? ''; // ambil role dari session
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- Judul Halaman -->
    <h2 class="text-center fw-bold mb-5">📦 Detail Barang</h2>

    <!-- Card Detail Barang -->
    <div class="card shadow-lg mx-auto border-0" style="max-width: 600px;">
        <div class="card-header bg-dark text-white fw-bold">
            Informasi Barang
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th style="width: 150px;">ID Barang</th>
                    <td><?= $barang['id_barang']; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?= htmlspecialchars($barang['nama_barang']); ?></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td class="text-success fw-bold">Rp <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>
                        <span class="badge bg-primary fs-6"><?= $barang['stok']; ?></span>
                    </td>
                </tr>
            </table>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-center gap-2 mt-4">
                <a href="barang.php" class="btn btn-outline-primary">⬅ Kembali</a>
                <a href="edit_barang.php?id=<?= $barang['id_barang']; ?>" class="btn btn-success">✏ Edit</a>
                <a href="hapus_barang.php?id=<?= $barang['id_barang']; ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Yakin hapus barang ini?')">🗑 Hapus</a>
            </div>
        </div>
    </div>

    <!-- Form Tambah Stok (Khusus Suplier) -->
    <?php if (strtolower($role) === 'suplier'): ?>
    <div class="card shadow-lg mx-auto border-0 mt-5" style="max-width: 600px;">
        <div class="card-header bg-success text-white fw-bold">
            ➕ Tambah Stok Barang
        </div>
        <div class="card-body">
            <form method="POST" action="update_stok.php">
                <div class="mb-3">
                    <label class="form-label">Jumlah Stok</label>
                    <input type="number" name="stok" class="form-control" min="1" placeholder="Masukkan jumlah stok" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Opsional (contoh: stok baru)">
                </div>
                <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                <button type="submit" name="tambah" class="btn btn-success w-100">
                    ➕ Tambahkan Stok
                </button>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
