<?php
require "funtions.php";
if (isset($_POST['simpan'])){
    $nama   = $_POST['nama_pembeli'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    execute("INSERT INTO pembeli (nama_pembeli, alamat, no_hp) 
             VALUES ('$nama','$alamat','$no_hp')");
    header("location:pembeli.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">➕ Tambah Pembeli</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama_pembeli" class="form-label">Nama</label>
                            <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                            <a href="pembeli.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
