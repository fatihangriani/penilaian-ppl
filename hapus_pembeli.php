<?php
require "funtions.php";
$id = $_GET['id'];

// Hapus pembelian dulu
execute("DELETE FROM pembelian WHERE id_pembeli = $id");

// Baru hapus pembeli
$hapus = execute("DELETE FROM pembeli WHERE id_pembeli = $id");

if ($hapus) {
    header("Location: pembeli.php");
    exit;
} else {
    echo "Gagal hapus data.";
}
?>
