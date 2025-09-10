<<<<<<< HEAD
<?php
require "funtions.php";
include "navbar.php";

// Ambil data pembeli dan barang untuk dropdown
$pembeli = query("SELECT * FROM pembeli");
$barang = query("SELECT * FROM barang");

if (isset($_POST['simpan'])) {
    $id_pembeli = $_POST['id_pembeli'];
    $id_barang = $_POST['id_barang'];
    $jml_beli = (int)$_POST['jml_beli'];

    // Ambil harga barang
    $barangData = query("SELECT harga, stok FROM barang WHERE id_barang = $id_barang")[0];
    $harga = $barangData['harga'];
    $stok = $barangData['stok'];

    if ($jml_beli > $stok) {
        echo "<script>alert('Stok tidak cukup! Stok tersedia: $stok');</script>";
    } else {
        $total_harga = $harga * $jml_beli;
        $tanggal = date('Y-m-d H:i:s');

        // Insert ke tabel pembelian
        $insert = execute("INSERT INTO pembelian 
            (id_barang, id_pembeli, tanggal_pembelian, total_harga, jml_beli)
            VALUES ($id_barang, $id_pembeli, '$tanggal', $total_harga, $jml_beli)");

        if ($insert) {
            // Kurangi stok barang
            execute("UPDATE barang SET stok = stok - $jml_beli WHERE id_barang = $id_barang");

            echo "<script>
                alert('Pembelian berhasil ditambahkan!');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>alert('Gagal menambahkan pembelian!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white fw-bold">
            + Tambah Pembelian
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Pembeli</label>
                    <select name="id_pembeli" class="form-select" required>
                        <option value="">-- Pilih Pembeli --</option>
                        <?php foreach ($pembeli as $p): ?>
                            <option value="<?= $p['id_pembeli']; ?>">
                                <?= htmlspecialchars($p['nama_pembeli']); ?> - <?= htmlspecialchars($p['no_hp']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Barang</label>
                    <select name="id_barang" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach ($barang as $b): ?>
                            <option value="<?= $b['id_barang']; ?>">
                                <?= htmlspecialchars($b['nama_barang']); ?> (Stok: <?= $b['stok']; ?>) - Rp <?= number_format($b['harga'], 0, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Beli</label>
                    <input type="number" name="jml_beli" class="form-control" min="1" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
=======
<?php
require "funtions.php";
include "navbar.php";

// Ambil data pembeli dan barang untuk dropdown
$pembeli = query("SELECT * FROM pembeli");
$barang = query("SELECT * FROM barang");

if (isset($_POST['simpan'])) {
    $id_pembeli = $_POST['id_pembeli'];
    $id_barang = $_POST['id_barang'];
    $jml_beli = (int)$_POST['jml_beli'];

    // Ambil harga barang
    $barangData = query("SELECT harga, stok FROM barang WHERE id_barang = $id_barang")[0];
    $harga = $barangData['harga'];
    $stok = $barangData['stok'];

    if ($jml_beli > $stok) {
        echo "<script>alert('Stok tidak cukup! Stok tersedia: $stok');</script>";
    } else {
        $total_harga = $harga * $jml_beli;
        $tanggal = date('Y-m-d H:i:s');

        // Insert ke tabel pembelian
        $insert = execute("INSERT INTO pembelian 
            (id_barang, id_pembeli, tanggal_pembelian, total_harga, jml_beli)
            VALUES ($id_barang, $id_pembeli, '$tanggal', $total_harga, $jml_beli)");

        if ($insert) {
            // Kurangi stok barang
            execute("UPDATE barang SET stok = stok - $jml_beli WHERE id_barang = $id_barang");

            echo "<script>
                alert('Pembelian berhasil ditambahkan!');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>alert('Gagal menambahkan pembelian!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white fw-bold">
            + Tambah Pembelian
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Pembeli</label>
                    <select name="id_pembeli" class="form-select" required>
                        <option value="">-- Pilih Pembeli --</option>
                        <?php foreach ($pembeli as $p): ?>
                            <option value="<?= $p['id_pembeli']; ?>">
                                <?= htmlspecialchars($p['nama_pembeli']); ?> - <?= htmlspecialchars($p['no_hp']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Barang</label>
                    <select name="id_barang" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach ($barang as $b): ?>
                            <option value="<?= $b['id_barang']; ?>">
                                <?= htmlspecialchars($b['nama_barang']); ?> (Stok: <?= $b['stok']; ?>) - Rp <?= number_format($b['harga'], 0, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Beli</label>
                    <input type="number" name="jml_beli" class="form-control" min="1" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> 09c9695149b97245e66d3b766e5947ca1aacd97b
