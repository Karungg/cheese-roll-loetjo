<?php
class Product
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM produk";
        if ($id != null) {
            $sql .= " WHERE id_produk = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambah($nama, $harga, $stok, $deskripsi, $gambar)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO produk VALUES('', '$nama', '$harga', '$gambar', '$deskripsi', $stok)") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function delete($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM produk WHERE id_produk = '$id'") or die($db->error);
    }

    public function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}


?>