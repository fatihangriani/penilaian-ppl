<?php
require "funtions.php";
include "navbar.php";

$keyword = isset($_GET['search']) ? $_GET['search'] : "";

if ($keyword) {
    $barang = query("SELECT * FROM barang 
                     WHERE nama_barang LIKE '%$keyword%' 
                        OR harga LIKE '%$keyword%' 
                        OR stok LIKE '%$keyword%'");
} else {
    $barang = query("SELECT * FROM barang");
}

$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">📦 Data Barang</h2>
        <a href="tambah_barang.php" class="btn btn-success">+ Tambah Barang</a>
    </div>

    <!-- Search Form -->
    <form method="get" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" 
                   placeholder="Cari nama, harga, atau stok..." 
                   value="<?= htmlspecialchars($keyword); ?>">
            <button class="btn btn-dark" type="submit">Cari</button>
            <?php if ($keyword): ?>
                <a href="barang.php" class="btn btn-secondary">Reset</a>
            <?php endif; ?>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($barang): ?>
                        <?php foreach ($barang as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                <td><?= $row['stok']; ?></td>
                                <td>
                                    <a href="detail_barang.php?id=<?= $row['id_barang']; ?>" class="btn btn-sm btn-primary">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-muted">Data tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
