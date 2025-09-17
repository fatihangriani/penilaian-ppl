<?php
session_start();
require "funtions.php";

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['role'] == 'kasir') {
    header("Location: index.php");
    exit;
}
include "navbar.php";
$id = $_GET['id'];

// Ambil data pembelian, kalau ada barang sama dijumlahkan
$pembelian = query("SELECT id_barang, SUM(jml_beli) as total_beli 
                    FROM pembelian 
                    WHERE id_pembeli = $id 
                    GROUP BY id_barang");

if ($pembelian) {
    foreach ($pembelian as $p) {
        $id_barang = $p['id_barang'];
        $jumlah    = $p['total_beli'];

        // Kembalikan stok barang sesuai jumlah beli
        $update = execute("UPDATE barang SET stok = stok + $jumlah WHERE id_barang = $id_barang");

        if (!$update) {
            echo "❌ Gagal mengembalikan stok barang!";
            exit;
        }
    }

    // Hapus pembelian
    $hapus_pembelian = execute("DELETE FROM pembelian WHERE id_pembeli = $id");

    if ($hapus_pembelian) {
        // Hapus pembeli
        $hapus_pembeli = execute("DELETE FROM pembeli WHERE id_pembeli = $id");

        if ($hapus_pembeli) {
            header("Location: pembeli.php?status=deleted");
            exit;
        } else {
            echo "❌ Gagal menghapus data pembeli!";
        }
    } else {
        echo "❌ Gagal menghapus data pembelian!";
    }
} else {
    echo "❌ Data pembelian tidak ditemukan!";
}
?>
