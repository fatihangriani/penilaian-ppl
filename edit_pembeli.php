<<<<<<< HEAD
<?php
require "funtions.php";
$id= $_GET['id'];
$data = query("SELECT * FROM pembeli WHERE id_pembeli=$id");

if(isset($_POST['update'])){
    $nama = $_POST['nama_pembeli'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $edit = execute("UPDATE pembeli SET nama_pembeli='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id_pembeli=$id");

    if($edit){
        header("location:pembeli.php");
        exit;
    }else{
        echo "gagal update data: " . mysqli_error($conn);
    }
}

$pembeli = $data[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">✏ Edit Pembeli</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="nama_pembeli" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" value="<?= htmlspecialchars($pembeli['nama_pembeli']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= htmlspecialchars($pembeli['alamat']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= htmlspecialchars($pembeli['no_hp']); ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="detail.php?id=<?= $id ?>" class="btn btn-secondary">⬅ Kembali</a>
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
$data = query("SELECT * FROM pembeli WHERE id_pembeli=$id");

if(isset($_POST['update'])){
    $nama = $_POST['nama_pembeli'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $edit = execute("UPDATE pembeli SET nama_pembeli='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id_pembeli=$id");

    if($edit){
        header("location:pembeli.php");
        exit;
    }else{
        echo "gagal update data: " . mysqli_error($conn);
    }
}

$pembeli = $data[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">✏ Edit Pembeli</h2>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="nama_pembeli" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" value="<?= htmlspecialchars($pembeli['nama_pembeli']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= htmlspecialchars($pembeli['alamat']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= htmlspecialchars($pembeli['no_hp']); ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="detail.php?id=<?= $id ?>" class="btn btn-secondary">⬅ Kembali</a>
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
