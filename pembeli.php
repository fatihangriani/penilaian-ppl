<?php
session_start();

include "funtions.php";
include "navbar.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// jika role suplier coba akses halaman lain → redirect ke barang.php
if ($_SESSION['role'] == 'suplier') {
    header("Location: barang.php");
    exit;
}
if ($_SESSION['role'] == 'kasir') {
    header("Location: index.php");
    exit;
}

$keyword = isset($_GET['search']) ? $_GET['search'] : "";

if ($keyword) {
    $pembeli = query("SELECT * FROM pembeli 
                      WHERE nama_pembeli LIKE '%$keyword%' 
                         OR no_hp LIKE '%$keyword%' 
                         OR alamat LIKE '%$keyword%'");
} else {
    $pembeli = query("SELECT * FROM pembeli");
}

$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembeli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">📋 Data Pembeli</h2>
        <a href="tambah_pembeli.php" class="btn btn-success">+ Tambah Pembeli</a>
    </div>

    <form method="get" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" 
                   placeholder="Cari nama, no HP, atau alamat..." 
                   value="<?= htmlspecialchars($keyword); ?>">
            <button class="btn btn-dark" type="submit">Cari</button>
            <?php if ($keyword): ?>
                <a href="pembeli.php" class="btn btn-secondary">Reset</a>
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
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($pembeli): ?>
                        <?php foreach ($pembeli as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_pembeli']; ?></td>
                                <td><?= $row['no_hp']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $row['id_pembeli']; ?>" class="btn btn-sm btn-primary">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
