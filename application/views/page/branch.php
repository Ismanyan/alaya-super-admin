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
                        <h1 class="h3 mb-0 text-gray-800">Branch Management</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#Branch"><i class="fas fa-plus-square fa-sm text-white-50"></i> Add Branch</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Branch</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Branch Name</th>
                                            <th>Phone Number</th>
                                            <th>Open Hour</th>
                                            <th>Address</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($branch->result as $key) : ?>
                                            <tr>
                                                <td><?= $key->branch_name ?></td>
                                                <td><?= $key->phone ?></td>
                                                <td><?= $key->open_hour ?> s/d <?= $key->closing_time ?> WIB</td>
                                                <td><a href="<?= $key->map_url ?>">Google Map</a></td>
                                                <td>
                                                    <!-- <a href=""><span class="badge badge-success"><i class="fas fa-eye"></i></span></a> -->
                                                    <a href="#" data-toggle="modal" data-target="#branchEdit<?= $key->id ?>"><span class="badge badge-warning"><i class="fas fa-edit"></i></span></a>
                                                    <a href="<?= base_url('branch/delete/') . $key->id ?>"><span class="badge badge-danger"><i class="fas fa-trash"></i></span></a>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="branchEdit<?= $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="branchEdit" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="branchEdit">Add New Branch</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('branch/edit') ?>" method="post">
                                                            <input type="hidden" name="id" value="<?= $key->id ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="branch_name">Branch Name</label>
                                                                    <input type="text" class="form-control" id="branch_name" required name="branch_name" value="<?= $key->branch_name ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone" required name="phone" value="<?= $key->phone ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="map_url">Google Map Url</label>
                                                                    <input type="text" class="form-control" id="map_url" required name="map_url" value="<?= $key->map_url ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="latitude">Latitude</label>
                                                                    <input type="text" class="form-control" id="latitude" required name="latitude" value="<?= $key->latitude ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="longitude">Longitude</label>
                                                                    <input type="text" class="form-control" id="longitude" required name="longitude" value="<?= $key->longitude ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="open_hour">Open Hour</label>
                                                                    <input type="text" class="form-control" id="open_hour" required name="open_hour" value="<?= $key->open_hour ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="closing_time">Closed Time</label>
                                                                    <input type="text" class="form-control" id="closing_time" required name="closing_time" value="<?= $key->closing_time ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="address">Address</label>
                                                                    <textarea class="form-control" id="address" rows="3" required name="address"><?= $key->address ?></textarea>
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
    <div class="modal fade" id="Branch" tabindex="-1" role="dialog" aria-labelledby="addBranch" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBranch">Add New Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('branch/add') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="branch_name">Branch Name</label>
                            <input type="text" class="form-control" id="branch_name" required name="branch_name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" required name="phone">
                        </div>
                        <div class="form-group">
                            <label for="map_url">Google Map Url</label>
                            <input type="text" class="form-control" id="map_url" required name="map_url">
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" required name="latitude">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" id="longitude" required name="longitude">
                        </div>
                        <div class="form-group">
                            <label for="open_hour">Open Hour</label>
                            <input type="text" class="form-control" id="open_hour" required name="open_hour">
                        </div>
                        <div class="form-group">
                            <label for="closing_time">Closed Time</label>
                            <input type="text" class="form-control" id="closing_time" required name="closing_time">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" rows="3" required name="address"></textarea>
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