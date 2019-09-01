<?php
    require_once '../model/item.model.php';

    if ($_SESSION) {
        $item = new Item(); ?>

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
          <li class="nav-item ">
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
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#">Inventory</a>
          </div>
          <?php include 'templates/navbar.php'; ?>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
            <div class="col-md-13">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title text-center">Inventory</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Bundled Price</th>
                                    <th>Discount Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $get = $item->getAllItem();
        foreach ($get as $g) {
            ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $g['item_name']; ?></td>
                                    <td style="text-align: center;"><?php echo $g['item_quantity']; ?></td>
                                    <td style="text-align: center;"><?php echo $g['unit_price']; ?></td>
                                    <td style="text-align: center;"><?php echo $g['bundled_price']; ?></td>
                                    <td style="text-align: center;"><?php echo $g['discount_price']; ?></td>
                                    <td style="text-align: center;"><a type="button" rel="tooltip" title="View Item" class="btn btn-primary btn-sm" style="color: white;">
                                        <i class="fas fa-eye"></i>
                                    </a></td>
                                </tr>
                            <?php
        } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <?php include 'templates/footer.php'; ?>

<?php
    } ?>