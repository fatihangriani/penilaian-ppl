<<<<<<< HEAD
<?php
require "funtions.php";

$id = $_GET['id'];

$data = query("SELECT * FROM pembeli WHERE id_pembeli=$id");

if (!$data) {
    echo "Data pembeli tidak ditemukan!";
    exit;
}

$pembeli = $data[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">👤 Detail Pembeli</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <p><b>ID:</b> <?= $pembeli['id_pembeli']; ?></p>
            <p><b>Nama:</b> <?= htmlspecialchars($pembeli['nama_pembeli']); ?></p>
            <p><b>Alamat:</b> <?= htmlspecialchars($pembeli['alamat']); ?></p>
            <p><b>No HP:</b> <?= htmlspecialchars($pembeli['no_hp']); ?></p>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <a href="pembeli.php" class="btn btn-primary">
                    ⬅ Kembali
                </a>
                <a href="edit_pembeli.php?id=<?= $pembeli['id_pembeli']; ?>" class="btn btn-success">
                    ✏ Edit
                </a>
                <a href="hapus_pembeli.php?id=<?= $pembeli['id_pembeli']; ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Yakin hapus pembeli ini?')">
                   🗑 Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
=======
<?php
require "funtions.php";

$id = $_GET['id'];

$data = query("SELECT * FROM pembeli WHERE id_pembeli=$id");

if (!$data) {
    echo "Data pembeli tidak ditemukan!";
    exit;
}

$pembeli = $data[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">👤 Detail Pembeli</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <p><b>ID:</b> <?= $pembeli['id_pembeli']; ?></p>
            <p><b>Nama:</b> <?= htmlspecialchars($pembeli['nama_pembeli']); ?></p>
            <p><b>Alamat:</b> <?= htmlspecialchars($pembeli['alamat']); ?></p>
            <p><b>No HP:</b> <?= htmlspecialchars($pembeli['no_hp']); ?></p>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <a href="pembeli.php" class="btn btn-primary">
                    ⬅ Kembali
                </a>
                <a href="edit_pembeli.php?id=<?= $pembeli['id_pembeli']; ?>" class="btn btn-success">
                    ✏ Edit
                </a>
                <a href="hapus_pembeli.php?id=<?= $pembeli['id_pembeli']; ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Yakin hapus pembeli ini?')">
                   🗑 Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> 09c9695149b97245e66d3b766e5947ca1aacd97b
