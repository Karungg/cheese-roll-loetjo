<?php
include '../models/product.php';
include 'partials/modal-product.php';
$product = new Product($connection);

if (@$_POST['tambah']) {
    $nama = $connection->conn->real_escape_string($_POST['nama']);
    $harga = $connection->conn->real_escape_string($_POST['harga']);
    $stok = $connection->conn->real_escape_string($_POST['stok']);
    $description = $connection->conn->real_escape_string($_POST['description']);
    $extensi = explode('.', $_FILES['gambar']['name']);
    $gambar = "product-" . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['gambar']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/img/product/". $gambar);

    if ($upload) {
        $product->tambah($nama, $harga, $stok, $description, $gambar);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Produk Berhasil Ditambahkan!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        echo "<script>
        alert('Tambah Produk Gagal!');
        </script>";
    }
}

if (@$_GET['action'] == '') {

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                        <button class="btn btn-success mb-2" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Produk</button>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="table-responsive p-3">
                                    <table class="table table-bordered table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $tampil = $product->tampil();
                                        while ($data = $tampil->fetch_object()) : ?>
                                        <tbody>
                                            <tr>
                                            <td align="center"><?= $no++. "."; ?></td>
                                            <td><?= $data->nama_produk; ?></td>
                                            <td><?= $data->harga_produk; ?></td>
                                            <td><?= $data->deskripsi_produk; ?></td>
                                            <td align="center"><img src="../assets/img/product/<?= $data->foto_produk; ?>" alt="" width="70"></td>
                                            <td><?= $data->stok_produk; ?></td>
                                            <td align="center">
                                                <a href="" class="text-decoration-none" id="edit" data-bs-toggle="modal" data-bs-target="#modal-edit" data-id="<?= $data->id_produk; ?>" data-nama="<?= $data->nama_produk; ?>" data-harga="<?= $data->harga_produk; ?>" data-foto="<?= $data->foto_produk; ?>" data-deskripsi="<?= $data->deskripsi_produk; ?>" data-stok="<?= $data->stok_produk; ?>">
                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                            </a>
                                                <a href="?page=product&action=delete&id=<?= $data->id_produk; ?>" class="text-decoration-none" onclick="return confirm('Delete?')">
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </a>
                                        </td>
                                            </tr>
                                        </tbody>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                <script>
                    $(document).on("click", "#edit", function(){
                        var id = $(this).data('id');
                        var nama = $(this).data('nama');
                        var harga = $(this).data('harga');
                        var stok = $(this).data('stok');
                        var deskripsi = $(this).data('deskripsi');
                        var foto = $(this).data('foto');

                        $("#modal-edit #id").val(id);
                        $("#modal-edit #nama").val(nama);
                        $("#modal-edit #harga").val(harga);
                        $("#modal-edit #stok").val(stok);
                        $("#modal-edit #description").val(deskripsi);
                        $("#modal-edit #gambar").attr("src", "../assets/img/product/" + foto);
                    });

                    $(document).ready(function(e) {
                        $("#form").on("submit", (function(e){
                            e.preventDefault();
                            $.ajax({
                                url : '../models/edit-product.php',
                                type : 'POST',
                                data : new FormData(this),
                                contentType : false,
                                cache : false,
                                processData : false,
                                success : function(msg) {
                                    $('.table').html(msg);
                                }
                            });
                        }));
                    });
                </script>
                <!-- /.container-fluid -->
                <?php  
    }elseif($_GET['action'] == 'delete'){
        $gambarLama = $product->tampil($_GET['id'])->fetch_object()->foto_produk;
        unlink("../assets/img/product/". $gambarLama);

        $product->delete($_GET['id']);
        echo "<script>
        alert('Delete Success!');
        window.location = '?page=product';
        </script>";
    }
    ?>
