<!-- Custom styles for this page -->
<link href="<?= asset_url() . 'vendor/datatables/dataTables.bootstrap4.min.css' ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Import Sidebar -->
        <?php $this->load->view('layouts/sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Import Topbar -->
                <?php $this->load->view('layouts/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Treatment Management</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#Treatment"><i class="fas fa-plus-square fa-sm text-white-50"></i> Add Treatment</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Treatment</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Treatment Name</th>
                                            <th>Duration</th>
                                            <th>Price</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($treatment->result as $key) : ?>
                                            <tr>
                                                <td><?= $key->treatment_name ?></td>
                                                <td><?= $key->treatment_duration ?> Minute</td>
                                                <td>Rp.<?= $key->treatment_price ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#PriceView<?= $key->treatment_price_id ?>"><span class="badge badge-success"><i class="fas fa-eye"></i></span></a>
                                                    <a href="#" data-toggle="modal" data-target="#addPrice<?= $key->treatment_price_id ?>"><span class="badge badge-warning"><i class="fas fa-plus-square"></i></span></a>
                                                    <a href="<?= base_url('treatment/delete/') . $key->treatment_price_id ?>"><span class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></span></a>
                                                </td>
                                            </tr>


                                            <!-- Modal Add Price-->
                                            <div class="modal fade" id="PriceView<?= $key->treatment_price_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Treatment Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('treatment/add/price') ?>" method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="treatment_id" value="<?= $key->treatment_id ?>">
                                                                <div class="form-group">
                                                                    <label for="treatment_name">Treatment Name</label>
                                                                    <input type="text" class="form-control" id="treatment_name" value="<?= $key->treatment_name ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="treatment_desc">Treatment Description</label>
                                                                    <textarea class="form-control" id="treatment_desc" rows="4" readonly><?= $key->treatment_desc ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="treatment_duration">Treatment Duration</label>
                                                                    <input type="text" class="form-control" id="treatment_duration" name="treatment_duration" required value="<?= $key->treatment_duration ?> Minute">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="treatment_price">Treatment Price</label>
                                                                    <input type="text" class="form-control" id="treatment_price" name="treatment_price" required value="Rp.<?= $key->treatment_price ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Add Price-->
                                            <div class="modal fade" id="addPrice<?= $key->treatment_price_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add New Price</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('treatment/add/price') ?>" method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="treatment_id" value="<?= $key->treatment_id ?>">
                                                                <div class="form-group">
                                                                    <label for="treatment_name">Treatment Name</label>
                                                                    <input type="text" class="form-control" id="treatment_name" value="<?= $key->treatment_name ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="treatment_desc">Treatment Description</label>
                                                                    <textarea class="form-control" id="treatment_desc" rows="4" readonly><?= $key->treatment_desc ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="treatment_duration">Treatment Duration</label>
                                                                    <input type="text" class="form-control" id="treatment_duration" name="treatment_duration" required placeholder="Add new treatment duration">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="treatment_price">Treatment Price</label>
                                                                    <input type="text" class="form-control" id="treatment_price" name="treatment_price" required placeholder="Add new treatment price">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End Main Content -->

            <!-- Import Topbar -->
            <?php $this->load->view('layouts/bottom.php'); ?>
        </div>
        <!-- End Content Wrapper -->
    </div>
    <!-- End Page Wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="Treatment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Treatment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('treatment/add') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="treatment_name">Treatment Name</label>
                            <input type="text" class="form-control" id="treatment_name" name="treatment_name">
                        </div>
                        <div class="form-group">
                            <label for="treatment_desc">Treatment Description</label>
                            <textarea class="form-control" id="treatment_desc" rows="3" name="treatment_desc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CUstome JS -->
    <script src="<?= asset_url() . 'vendor/datatables/jquery.dataTables.min.js' ?>"></script>
    <script src="<?= asset_url() . 'vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>
    <script src="<?= asset_url() . 'js/demo/datatables-demo.js' ?>"></script>