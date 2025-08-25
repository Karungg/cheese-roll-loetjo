                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <?php
                    $ambil = $connection->conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
                    $detail = $ambil->fetch_object();
                    ?>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
  <div class="card">
<div class="card-header">
<h2>Detail Pembelian</h2>
  <span class="float-right"> <strong>Status:</strong> <?= $detail->status_pembelian; ?></span>

</div>
<div class="card-body">
<div class="row mb-4">
    <div class="col-sm-6">
    <div>
    <strong>Tanggal : <?= $detail->tanggal_pembelian; ?></strong>
    </div>
    <div>Total : Rp.<?= number_format($detail->total_pembelian); ?></div>
    </div>
<div class="col-sm-6">
<h6 class="mb-3">Pelanggan :</h6>
<div>
<strong><?= $detail->nama_pelanggan; ?></strong>
</div>
<div>Phone: <?= $detail->telepon_pelanggan; ?></div>
<div>Email: <?= $detail->email_pelanggan; ?></div>
</div>


<div class="col-sm-6">
<div>
<strong>Info Pengiriman</strong>
</div>
<div>No Resi : </div>
<div>Total Ongkos Kirim : Rp.<?= number_format($detail->tarif); ?></div>
<div>Alamat : <?= $detail->alamat_pengiriman; ?></div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">No.</th>
<th>Produk</th>
<th class="right">Harga</th>
  <th class="center">Jumlah</th>
<th class="right">Subtotal</th>
</tr>
</thead>
<tbody>
    <?php
    $no = 1;
    $ambil = $connection->conn->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'");

    while($pecah = $ambil->fetch_object()) :
    ?>
<tr>
<td class="center"><?= $no; ?></td>
<td class="left strong"><?= $pecah->nama_produk; ?></td>
<td class="left"><?= $pecah->harga_produk; ?></td>

<td class="right"><?= $pecah->jumlah; ?></td>
  <td class="center"><?= number_format($pecah->harga_produk * $pecah->jumlah); ?></td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<?php
$no++;
    endwhile;
?>
</table>

</div>

</div>

</div>
</div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->