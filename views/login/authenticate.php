<?php
session_start();
require_once '../../config/connection.php';
require_once '../../models/database.php';

if (!isset($_POST['login'])) {
  echo "<script>
  window.location.href = 'index.php';
  </script>";
}

$connection = new Database($host, $user, $pass, $database);
if(isset($_POST['login'])) {
  $ambil = $connection->conn->query("SELECT * FROM admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
  $cocok = $ambil->num_rows;
  if ($cocok==1) {
    $_SESSION['admin'] = $_POST['username'];
    echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
  } else {
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
  }
}
?>