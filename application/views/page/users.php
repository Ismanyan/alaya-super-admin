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
                        <h1 class="h3 mb-0 text-gray-800">User Management</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#User"><i class="fas fa-plus-square fa-sm text-white-50"></i> Add User</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>Photo</th> -->
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Branch</th>
                                            <th>Position</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users->result as $key) : ?>
                                            <tr>
                                                <!-- <td><?= $key->id_user ?></td> -->
                                                <td><?= $key->user_id ?></td>
                                                <td><?= $key->fullname ?></td>
                                                <td><?= $key->phone ?></td>
                                                <td><?= $key->branch_name ?></td>
                                                <td><?= $key->position_name ?></td>
                                                <td>
                                                    <!-- <a href=""><span class="badge badge-success"><i class="fas fa-eye"></i></span></a> -->
                                                    <a href="#" data-toggle="modal" data-target="#UserEdit<?= $key->id_user ?>"><span class="badge badge-warning"><i class="fas fa-edit"></i></span></a>
                                                    <a href="<?= base_url('user/delete/') . $key->id_user ?>"><span class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></span></a>
                                                </td>
                                            </tr>

                                            <!-- Modal EDIT -->
                                            <div class="modal fade" id="UserEdit<?= $key->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="UserLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="titleModal">Edit User</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                        <form action="<?= base_url('user/edit/') ?>" method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" value="<?= $key->id_user ?>" name="id">
                                                                <div class="form-group">
                                                                    <label for="user_id">User ID</label>
                                                                    <input type="text" class="form-control" id="user_id" required name="user_id" value="<?= $key->user_id ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="fullName">Name</label>
                                                                    <input type="text" class="form-control" id="fullName" required name="fullname" value="<?= $key->fullname ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone" required name="phone" value="<?= $key->phone ?>">
                                                                </div>

                                                                <!-- <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control" id="email" required name="email">
                                                                </div> -->

                                                                <div class="form-group">
                                                                    <label for="pin">Pin</label>
                                                                    <input type="text" class="form-control" id="pin" required name="pin" value="<?= $key->pin ?>">
                                                                    <small id="pin" class="form-text text-muted">a maximum of 6 digit pins</small>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" class="form-control" id="password" required name="password">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="position_id">Position</label>
                                                                    <select class="form-control" id="position_id" required name="position_id">
                                                                        <option value="2">Therapist Management</option>
                                                                        <option value="1" selected>Therapist</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="branch_id">Branch</label>
                                                                    <select class="form-control" id="branch_id" required name="branch_id">
                                                                        <?php foreach ($branch->result as $key2) : ?>
                                                                            <option value="<?= $key2->id ?>"><?= $key2->branch_name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
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
    <div class="modal fade" id="User" tabindex="-1" role="dialog" aria-labelledby="UserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModal">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="<?= base_url('users/add') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control" id="user_id" required name="user_id">
                        </div>

                        <div class="form-group">
                            <label for="fullName">Name</label>
                            <input type="text" class="form-control" id="fullName" required name="fullname">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" required name="phone">
                        </div>

                        <!-- <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" required name="email">
                        </div> -->

                        <div class="form-group">
                            <label for="pin">Pin</label>
                            <input type="text" class="form-control" id="pin" required name="pin">
                            <small id="pin" class="form-text text-muted">a maximum of 6 digit pins</small>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" required name="password">
                        </div>

                        <div class="form-group">
                            <label for="position_id">Position</label>
                            <select class="form-control" id="position_id" required name="position_id">
                                <option value="2">Therapist Management</option>
                                <option value="1" selected>Therapist</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="branch_id">Branch</label>
                            <select class="form-control" id="branch_id" required name="branch_id">
                                <?php foreach ($branch->result as $key2) : ?>
                                    <option value="<?= $key2->id ?>"><?= $key2->branch_name ?></option>
                                <?php endforeach; ?>
                            </select>
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