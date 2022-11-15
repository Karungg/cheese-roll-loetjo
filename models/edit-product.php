<?php

require_once '../config/connection.php';
require_once '../models/database.php';
include '../models/product.php';

$connection = new Database($host, $user, $pass, $database);
$product = new Product($connection);

$id = $_POST['id'];
$nama = $connection->conn->real_escape_string($_POST['nama']);
$harga = $connection->conn->real_escape_string($_POST['harga']);
$stok = $connection->conn->real_escape_string($_POST['stok']);
$description = $connection->conn->real_escape_string($_POST['description']);

$img = $_FILES['gambar']['name'];
$extensi = explode('.', $_FILES['gambar']['name']);
$gambar = "product-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['gambar']['tmp_name'];

if ($img == '') {
    $product->edit("UPDATE produk SET nama_produk = '$nama', harga_produk = '$harga', stok_produk = '$stok', deskripsi_produk = '$description' WHERE id_produk = '$id'");
    echo "<script>
    window.location='?page=product';
    </script>";
}else{
    $gambarLama = $product->tampil($id)->fetch_object()->foto_produk;
    unlink("../assets/img/product/". $gambarLama);
    $upload = move_uploaded_file($sumber, "../assets/img/product/" . $gambar);

    if ($upload) {
        $product->edit("UPDATE produk SET nama_produk = '$nama', harga_produk = '$harga', stok_produk = '$stok', foto_produk = '$gambar', deskripsi_produk = '$description' WHERE id_produk = '$id'");
        echo "<script>
        window.location = '?page=product';
        </script>";
    }
}

?>