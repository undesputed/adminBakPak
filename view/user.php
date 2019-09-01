<?php
    require_once '../model/user.model.php';
    if ($_SESSION) {
        $user = new User();
        $getUser = $user->getAllUser(); ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>
<body class="">
  <div class="wrapper "> 
<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="dashboard.php?id=<?php echo $_SESSION['admin_id']; ?>&?info=<?php echo $_SESSION['admin']; ?>" class="simple-text logo-normal">
          Bakpak
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="user.php">
              <i class="fas fa-users"></i>
              <p>User Setup</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="item.setup.php">
              <i class="fab fa-product-hunt"></i>
              <p>Item Setup</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="fas fa-undo-alt"></i>
              <p>Returns</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="orders.php">
              <i class="fa fa-shopping-cart"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="inventory.php">
              <i class="fas fa-warehouse"></i>
              <p>Inventory Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="sales.php">
              <i class="fas fa-chart-line"></i>
              <p>Sales Summary Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="fas fa-user-circle"></i>
              <p>Customer Ledger Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="delivery.report.php">
              <i class="fas fa-truck"></i>
              <p>Delivery Report</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="user.php">User Setup</a>
          </div>
          <?php include 'templates/navbar.php'; ?>
        </div>
      </nav>
      <div class="content"> 
        <div class="container-fluid">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addUserModal">
            <span class="fas fa-plus"></span> Add User
          </button>
          <!-- Add User Modal -->
          <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="../controller/user/user.controller.php" method="post">
                <div class="modal-body">
                    <input type="text" name="id" require="required" placeholder="ID" hidden>
                    <h6 style="text-align: center">User Information</h6><hr>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" name="fname" require="required" class="form-control">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" require="required" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Birthdate (MM/DD/YY)</label>
                          <input type="text" name="birthdate" require="required" class="form-control">
                        </div>
                      </div>
                    </div><hr>
                    <h6 style="text-align: center">Contact Information</h6>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lot# / Block# / Street#</label>
                          <input type="text" name="street" require="required" class="form-control">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Barangay</label>
                          <input type="text" name="barangay" require="required" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" require="required" class="form-control">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" name="postal_code" require="required" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="email" name="email" require="required" class="form-control">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telephone/Mobile Number</label>
                          <input type="text" name="phone" require="required" class="form-control">
                        </div>
                      </div>
                    </div><hr>
                    <h6 style="text-align: center">Account Credentials</h6>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="user" require="required" class="form-control">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="pass" require="required" class="form-control" id="password">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" name="confirm" require="required" class="form-control" id="confirm">
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="register" id="register">Add User</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title text-center">List of all users</h4>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FirsName</th>
                            <th>LastName</th>
                            <th class="text-center">Address</th>
                            <th>Birthdate</th>
                            <th>Postal Code</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($getUser as $get) {
            ?>
                        <tr>
                          <td class="id"><?php echo $get['user_id']; ?></td>
                          <td class="fname"><?php echo $get['user_fname']; ?></td>
                          <td class="lname"><?php echo $get['user_lname']; ?></td>
                          <td class="address"><?php echo $get['user_address']; ?></td>
                          <td class="bdate"><?php echo $get['user_birthdate']; ?></td>
                          <td class="postal_code"><?php echo $get['user_postal_code']; ?></td>
                          <td class="email"><?php echo $get['user_email']; ?></td>
                          <td class="phone"><?php echo $get['user_phone']; ?></td>
                          <td>
                            <?php if ($get['user_status'] == 'ACTIVE') {
                ?>
                              <span class="badge badge-success">
                            <?php
            } elseif ($get['user_status'] == 'INACTIVE') {
                ?>
                              <span class="badge badge-danger">
                            <?php
            } ?>
                              <?php echo $get['user_status']; ?></span>
                          </td>
                          <td class="td-actions text-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editUserModal<?php echo $get['user_id']; ?>" rel="tooltip" title="Edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <?php if ($get['user_status'] == 'INACTIVE') {
                ?>
                            <a type="button" href="../controller/user/activate.controller.php?id=<?php echo $get['user_id']; ?>" rel="tooltip" title="Activate" class="btn-act btn btn-warning btn-sm" style="color: white;">
                              <i class="fas fa-eye"></i>
                            </a>
                            <?php
            } elseif ($get['user_status'] == 'ACTIVE') {
                ?>
                            <a type="button" href="../controller/user/status.controller.php?id=<?php echo $get['user_id']; ?>" rel="tooltip" title="Deactivate" class="btn-deact btn btn-warning btn-sm" style="color: white;">
                              <i class="fas fa-eye-slash"></i>
                            </a>
                            <?php
            } ?>
                            <a type="button" href="../controller/user/delete.controller.php?id=<?php echo $get['user_id']; ?>" rel="tooltip" title="Remove" class="btn btn-danger btn-sm" style="color: white;">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                        <!-- edit user modal -->
                        <div class="modal fade" id="editUserModal<?php echo $get['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="../controller/user/user.controller.php" method="post">
                              <div class="modal-body">
                                <input type="text" name="id" require="required" value="<?php echo $get['user_id']; ?>" hidden>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">First Name</label>
                                      <input type="text" name="fname" require="required" value="<?php echo $get['user_fname']; ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Last Name</label>
                                      <input type="text" name="lname" require="required" value="<?php echo $get['user_lname']; ?>" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Birthdate (MM/DD/YY)</label>
                                      <input type="text" name="birthdate" require="required" value="<?php echo $get['user_birthdate']; ?>" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-9">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Address</label>
                                      <input type="text" name="address" require="required" value="<?php echo $get['user_address']; ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Postal Code</label>
                                      <input type="text" name="postal_code" require="required" value="<?php echo $get['user_postal_code']; ?>" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Email Address</label>
                                      <input type="email" name="email" require="required" value="<?php echo $get['user_email']; ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Telephone/Mobile Number</label>
                                      <input type="text" name="phone" require="required" value="<?php echo $get['user_phone']; ?>" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Username</label>
                                      <input type="text" name="user" require="required" value="<?php echo $get['user_username']; ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Password</label>
                                      <input type="password" name="pass" require="required" value="<?php echo $get['user_password']; ?>" class="form-control" id="password">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end of edit user modal -->
                    <?php
        } ?>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'templates/footer.php'; ?>
      <script type="text/javascript">
    $(document).ready(function(){
        $('.table').DataTable({
            "pageLength": 20,
            dom: 'Bfrtip',
            buttons: ['print']
        });
        // $('.btn-deact').on('click',function(){
        //     $('.btn-act').prop('hidden', false);
        //     $('.btn-deact').prop('hidden', true);
        // });
        $('body').on('click','#register', function(){
            var pass = $('#password').val();
            var confirm = $('#confirm').val();

            if(pass!=confirm)
            {
                alert('Password not Match');
                return false;
            }
        });
    });
</script>
<?php
    }?>