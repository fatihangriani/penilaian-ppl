<<<<<<< HEAD
<?php
session_start();
require "funtions.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// jika role suplier coba akses halaman lain → redirect ke barang.php
if ($_SESSION['role'] == 'suplier') {
    header("Location: barang.php");
    exit;
}
include "navbar.php";

// ambil keyword pencarian kalau ada
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

// query data pembelian + filter pencarian
if ($keyword) {
    $pembelian = query("SELECT 
            pembeli.nama_pembeli,
            pembeli.no_hp,
            pembeli.alamat,
            barang.nama_barang,
            pembelian.jml_beli,
            pembelian.total_harga,
            pembelian.tanggal_pembelian
        FROM pembelian
        JOIN pembeli ON pembelian.id_pembeli = pembeli.id_pembeli
        JOIN barang ON pembelian.id_barang = barang.id_barang
        WHERE pembeli.nama_pembeli LIKE '%$keyword%'
           OR barang.nama_barang LIKE '%$keyword%'
        ORDER BY pembelian.id_pembalian DESC
    ");
} else {
    $pembelian = query("SELECT 
            pembeli.nama_pembeli,
            pembeli.no_hp,
            pembeli.alamat,
            barang.nama_barang,
            pembelian.jml_beli,
            pembelian.total_harga,
            pembelian.tanggal_pembelian
        FROM pembelian
        JOIN pembeli ON pembelian.id_pembeli = pembeli.id_pembeli
        JOIN barang ON pembelian.id_barang = barang.id_barang
        ORDER BY pembelian.id_pembalian DESC
    ");
}

$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="fw-bold mb-3">🛒 Data Penjualan</h2>
    <form method="get" class="d-flex mb-3" style="max-width: 400px;">
        <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama pembeli / barang" value="<?= htmlspecialchars($keyword); ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="d-flex justify-content-end mb-3">
        <a href="tambah.php" class="btn btn-success">+ Tambah Penjualan</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pembelian)): ?>
                        <?php foreach ($pembelian as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['nama_pembeli']); ?></td>
                                <td><?= htmlspecialchars($row['no_hp']); ?></td>
                                <td><?= htmlspecialchars($row['alamat']); ?></td>
                                <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                                <td><?= $row['jml_beli']; ?></td>
                                <td>Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_pembelian'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-muted">Belum ada data pembelian.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
=======
<?php
require "funtions.php";
include "navbar.php";

// ambil keyword pencarian kalau ada
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

// query data pembelian + filter pencarian
if ($keyword) {
    $pembelian = query("SELECT 
            pembeli.nama_pembeli,
            pembeli.no_hp,
            pembeli.alamat,
            barang.nama_barang,
            pembelian.jml_beli,
            pembelian.total_harga,
            pembelian.tanggal_pembelian
        FROM pembelian
        JOIN pembeli ON pembelian.id_pembeli = pembeli.id_pembeli
        JOIN barang ON pembelian.id_barang = barang.id_barang
        WHERE pembeli.nama_pembeli LIKE '%$keyword%'
           OR barang.nama_barang LIKE '%$keyword%'
        ORDER BY pembelian.id_pembalian DESC
    ");
} else {
    $pembelian = query("SELECT 
            pembeli.nama_pembeli,
            pembeli.no_hp,
            pembeli.alamat,
            barang.nama_barang,
            pembelian.jml_beli,
            pembelian.total_harga,
            pembelian.tanggal_pembelian
        FROM pembelian
        JOIN pembeli ON pembelian.id_pembeli = pembeli.id_pembeli
        JOIN barang ON pembelian.id_barang = barang.id_barang
        ORDER BY pembelian.id_pembalian DESC
    ");
}

$no = 1;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="fw-bold mb-3">🛒 Data Penjualan</h2>
    <form method="get" class="d-flex mb-3" style="max-width: 400px;">
        <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama pembeli / barang" value="<?= htmlspecialchars($keyword); ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="d-flex justify-content-end mb-3">
        <a href="tambah.php" class="btn btn-success">+ Tambah Penjualan</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pembelian)): ?>
                        <?php foreach ($pembelian as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['nama_pembeli']); ?></td>
                                <td><?= htmlspecialchars($row['no_hp']); ?></td>
                                <td><?= htmlspecialchars($row['alamat']); ?></td>
                                <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                                <td><?= $row['jml_beli']; ?></td>
                                <td>Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_pembelian'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-muted">Belum ada data pembelian.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
>>>>>>> 09c9695149b97245e66d3b766e5947ca1aacd97b
