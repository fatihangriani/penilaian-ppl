<?php
require "funtions.php";
session_start(); // pastikan session dimulai

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
    <h2 class="text-center fw-bold mb-4">📦 Detail Barang</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th scope="row" style="width: 150px;">ID</th>
                    <td><?= $barang['id_barang']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nama</th>
                    <td><?= htmlspecialchars($barang['nama_barang']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Harga</th>
                    <td>Rp <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th scope="row">Stok</th>
                    <td><?= $barang['stok']; ?></td>
                </tr>
            </table>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <a href="barang.php" class="btn btn-primary">⬅ Kembali</a>
                <a href="edit_barang.php?id=<?= $barang['id_barang']; ?>" class="btn btn-success">✏ Edit</a>
                <a href="hapus_barang.php?id=<?= $barang['id_barang']; ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Yakin hapus barang ini?')">🗑 Hapus</a>
            </div>
        </div>
    </div>
</div>

<?php if (strtolower($role) === 'suplier'): ?>
<div class="container py-4">
    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="fw-bold mb-3">➕ Tambah Stok</h4>
            <form method="POST" action="update_stok.php">
                <div class="mb-3">
                    <label class="form-label">Jumlah Stok</label>
                    <input type="number" name="stok" class="form-control" min="1" placeholder="Jumlah" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Opsional">
                </div>
                <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                <button type="submit" name="tambah" class="btn btn-success">
                    ➕ Tambah
                </button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
