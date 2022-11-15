                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Telepon</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    $ambil = $connection->conn->query("SELECT * FROM pelanggan");

                                    while ($pecah = $ambil->fetch_object()) :
                                    ?>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $pecah->nama_pelanggan; ?></td>
                                        <td><?= $pecah->email_pelanggan; ?></td>
                                        <td><?= $pecah->alamat_pelanggan; ?></td>
                                        <td><?= $pecah->telepon_pelanggan; ?></td>
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