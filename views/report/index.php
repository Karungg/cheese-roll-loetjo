                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Pembelian</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                            <form method="POST">
                            <div class="row m-3">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label> Tanggal Mulai </label>
                                        <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label> Tanggal Selesai </label>
                                        <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label><br>
                                    <button class="btn btn-primary" name="kirim"> Lihat </button>
                                </div>
                            </div>
                        </form>
                                <!-- Card Header - Dropdown -->
                                <div class="table-responsive p-3">
                                    <table class="table table-bordered" id="dataTable">
                                    <?php
                                    $semua_data = array();
                                    $tgl_mulai = "-";
                                    $tgl_selesai = "-";
                                    if (isset($_POST['kirim'])) {
                                        $tgl_mulai = $_POST['tglm'];
                                        $tgl_selesai = $_POST['tgls'];
                                        $ambil = $connection->conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan = pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
                                    while ($pecah = $ambil->fetch_object()) {
                                        $semua_data[] = $pecah;
                                    }
                                    }
                                    ?>
                                    <thead>
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Telepon</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0; ?>
                                    <?php foreach ($semua_data as $key => $value): ?>
                                    <?php $total+= $value->total_pembelian; ?>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?= $key+1 ?></th>
                                        <td><?= $value->nama_pelanggan; ?></td>
                                        <td><?= $value->tanggal_pembelian; ?></td>
                                        <td><?= number_format($value->total_pembelian); ?></td>
                                        <td><?= $value->status_pembelian; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th>Rp. <?php echo number_format($total) ?></th>
                                    </tr>
                                </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->