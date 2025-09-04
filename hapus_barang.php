<?php
require "funtions.php";
$id = $_GET['id'];

// cek apakah barang dipakai di tabel pembelian
$cek = query("SELECT COUNT(*) as total FROM pembelian WHERE id_barang=$id")[0]['total'];

if ($cek > 0) {
    echo "<script>alert('Barang tidak bisa dihapus karena sudah ada transaksi pembelian!'); window.location.href='barang.php';</script>";
    exit;
}

// kalau aman baru hapus
$hapus = execute("DELETE FROM barang WHERE id_barang=$id");

if ($hapus) {
    header("Location: barang.php");
} else {
    echo "Gagal hapus barang";
}
?>