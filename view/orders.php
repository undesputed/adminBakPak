<?php
    require_once '../model/notification.model.php';
    require_once '../model/item.model.php';
    require_once '../model/user.model.php';
    require_once '../model/order.model.php';
    require_once '../model/cart.model.php';
    if ($_SESSION) {
        $notif = new Notification();
        $item = new Item();
        $user = new User();
        $order = new Order();
        $cart = new Cart(); ?>
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
          <li class="nav-item active">
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
          <li class="nav-item">
            <a class="nav-link" href="bundle.php">
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
            <a class="navbar-brand" href="#">Orders</a>
          </div>
          <?php include 'templates/navbar.php'; ?>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
            <div class="col-md-13">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title text-center">Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Name</th>
                                    <th>Item Name</th>
                                    <th>Item Code</th>
                                    <th>Quantity</th>
                                    <th>Total Payment</th>
                                    <th>Payment Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $getOrder = $order->getAllOrders();
        foreach ($getOrder as $get) {
            ?>
                                <tr style="text-align: center;">
                                    <td><?php $getUser = $user->getUserById($get['user_id']);
            echo $getUser['user_fname'].' '.$getUser['user_lname']; ?></td>
                                    <td><?php $getItem = $item->getItemById($get['item_id']);
            echo $getItem['item_name']; ?></td>
                                    <td><?php echo $getItem['item_code']; ?></td>
                                    <td><?php $getQty = $cart->getCartById($get['user_id']);
            echo $getQty['quantity']; ?></td>
                                    <td></td>
                                    <td><?php echo $get['payment_status']; ?></td>
                                    <td><?php echo $get['order_date']; ?></td>
                                    <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editProduct<?php echo $get['order_id']; ?>">
                                          <i class="fas fa-edit"></i>
                                        </button></td>
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
<script>
    $(document).ready(function(){
        $('.table').DataTable({
            "pageLength": 20,
            dom: 'Bfrtip',
            buttons: ['print']
        });
    });
</script>
    <?php
    }?>