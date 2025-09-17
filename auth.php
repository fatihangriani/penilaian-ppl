<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$role = strtolower($_SESSION['role']);
$page = basename($_SERVER['PHP_SELF']); // nama file sekarang

// aturan role
switch ($role) {
    case 'kasir':
        // kasir hanya boleh index.php
        if ($page !== 'index.php') {
            header("Location: index.php");
            exit;
        }
        break;

    case 'suplier':
        // suplier hanya boleh barang.php dan detail_barang.php
        if (!in_array($page, ['barang.php','detail_barang.php'])) {
            header("Location: barang.php");
            exit;
        }
        break;

    case 'admin':
    case 'owner':
        // boleh semua, tidak perlu redirect
        break;

    default:
        // role tidak dikenal
        header("Location: login.php");
        exit;
}
?>