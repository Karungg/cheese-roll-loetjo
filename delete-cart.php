<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['keranjang'][$id]);
echo "<script>
window.location.href = 'cart.php';
</script>";

?>