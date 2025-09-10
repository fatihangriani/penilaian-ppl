<<<<<<< HEAD
<?php
require "funtions.php";
$id= $_GET['id'];
$data = query("SELECT * FROM barang WHERE id_barang=$id");

if(isset($_POST['update'])){
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $edit = execute("UPDATE barang SET nama_barang='$nama', harga='$harga', stok='$stok' WHERE id_barang=$id");

    if($edit){
        header("location:barang.php");
        exit;
    }else{
        echo "gagal update data: " . mysqli_error($conn);
    }
}

$barang = $data[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">✏ Edit Barang</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= htmlspecialchars($barang['nama_barang']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" value="<?= htmlspecialchars($barang['harga']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" value="<?= htmlspecialchars($barang['stok']); ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="detail_barang.php?id=<?= $id ?>" class="btn btn-secondary">⬅ Kembali</a>
                    <button type="submit" name="update" class="btn btn-success">💾 Update</button>
                </div>
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
$id= $_GET['id'];
$data = query("SELECT * FROM barang WHERE id_barang=$id");

if(isset($_POST['update'])){
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $edit = execute("UPDATE barang SET nama_barang='$nama', harga='$harga', stok='$stok' WHERE id_barang=$id");

    if($edit){
        header("location:barang.php");
        exit;
    }else{
        echo "gagal update data: " . mysqli_error($conn);
    }
}

$barang = $data[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">✏ Edit Barang</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= htmlspecialchars($barang['nama_barang']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" value="<?= htmlspecialchars($barang['harga']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" value="<?= htmlspecialchars($barang['stok']); ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="detail_barang.php?id=<?= $id ?>" class="btn btn-secondary">⬅ Kembali</a>
                    <button type="submit" name="update" class="btn btn-success">💾 Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> 09c9695149b97245e66d3b766e5947ca1aacd97b
