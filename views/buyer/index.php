                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Pembelian</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="table-responsive p-3">
                                    <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Tanggal Pembelian</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    $ambil = $connection->conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");

                                    while ($pecah = $ambil->fetch_object()) :
                                    ?>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $pecah->nama_pelanggan; ?></td>
                                        <td><?= $pecah->tanggal_pembelian; ?></td>
                                        <td><?= $pecah->status_pembelian; ?></td>
                                        <td><?= number_format($pecah->total_pembelian); ?></td>
                                        <td align="center">
                                            <a href="?page=detail-buyer&id=<?= $pecah->id_pembelian; ?>" class="btn btn-primary">Detail</a>
                                            <?php if($pecah->status_pembelian !== "Pending") : ?>
                                            <a href="?page=pembayaran&id=<?= $pecah->id_pembelian; ?>" class="btn btn-success">Lihat Pembayaran</a>
                                            <?php endif; ?>
                                        </td>
                                        </tr>
                                    </tbody>
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
                <!-- /.container-fluid -->