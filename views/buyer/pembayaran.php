                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <?php
                    $id_pembelian = $_GET['id'];

                    $ambil = $connection->conn->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
                    $detail = $ambil->fetch_object();
                    ?>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
  <div class="card">
<div class="card-header">
<h2>Data Pembayaran</h2>
</div>
<div class="card-body">
<div class="row mb-4">
    <div class="col-sm-6">
    <div>
    <strong>Tanggal : <?= $detail->tanggal; ?></strong>
    </div>
    </div>
<div class="col-sm-6">
<h6 class="mb-3">Pelanggan :</h6>
<div>
<strong><?= $detail->nama; ?></strong>
</div>
<div>Bank : <?= $detail->bank; ?></div>
<div>Jumlah : Rp.<?= number_format($detail->jumlah); ?></div>
</div>

<div class="col-sm-12 my-5">
    <img class="img-fluid" src="../assets/img/bukti/<?= $detail->bukti; ?>" alt="">
</div>

<form method="POST">
 	<div class="form-group">
 		<label>No Resi Pengiriman</label>
 		<input type="text" name="resi" class="form-control">
 	</div>
 	<div class="form-group">
 		<label>Status</label>
 		<select name="status" class="form-control">
 			<option value="">Pilih status</option>
 			<option value="Barang Sudah Sampai">Barang Sudah Sampai</option>
 			<option value="barang dikirim">Barang dikirim</option>
 			<option value="batal">Pesanan Batal</option>
 		</select>
 	</div>
 	<button class="btn btn-primary" name="proses">Proses</button>
 </form>

 <?php 
if (isset($_POST['proses'])) {

$resi = $_POST['resi'];
$status = $_POST['status'];

	$connection->conn->query("UPDATE pembelian SET resi_pembelian='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
	echo "<script>
    alert('Data Pembelian Sudah Diupdate');
    window.location.href = '?page=buyer';
    </script>";

}
  ?>

</div>

</div>
</div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->