<?php
    require_once '../model/item.model.php';
    require_once '../model/sub.category.model.php';
    require_once '../model/category.model.php';
    require_once '../model/supplier.model.php';
    date_default_timezone_set('Asia/Manila');
    if ($_SESSION) {
        $date = date('Y-m-d');
        $item = new Item();
        $category = new Category();
        $subCat = new Sub_Category();
        $supplier = new Supplier(); ?>

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
          <li class="nav-item active">
            <a class="nav-link" href="#">
              <i class="fab fa-product-hunt"></i>
              <p>Promos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="fas fa-undo-alt"></i>
              <p>Returns</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="inventory.php">
              <i class="fas fa-warehouse"></i>
              <p>Inventory Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
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
            <a class="navbar-brand" href="#">Promo Management</a>
          </div>
          <?php include 'templates/navbar.php'; ?>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Add Promo
            </button>
            <!-- add product modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Promo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" enctype="">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <input id="file" type="file" name="file" class="form-control">
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control" data-style="btn btn-link" required="true" name="sub_category" id="subCategory">
                                            <option value="selected">----- [SELECT SUBCATEGORY] -----</option>
                                            <?php $getCat = $subCat->getAllSubCat();
        foreach ($getCat as $cat) {
            ?>
                                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['sub_category_name']; ?></option>
                                            <?php
        } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Code</label>
                                            <input type="text" name="item_code" id="item_code" require="required" class="form-control">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control date" name="date" value="<?php echo $date; ?>" hidden>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <?php include 'templates/footer.php'; ?>

    <?php
    }?>