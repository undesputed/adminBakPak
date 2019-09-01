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
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#">Item Setup</a>
          </div>
          <?php include 'templates/navbar.php'; ?>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i> Add Product
            </button>
            <!-- add product modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="../controller/item/item.controller.php" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input id="file" type="file" name="file" class="form-control">
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Item Code</label>
                                  <input type="text" name="item_code" id="item_code" require="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" data-style="btn btn-link" required="true" name="supplier" id="supplier">
                                        <option value="selected">----- [SELECT SUPPLIER] -----</option>
                                        <?php $supp = $supplier->getAllSupplier();
        foreach ($supp as $s) {
            ?>
                                        <option value="<?php echo $s['supp_id']; ?>"><?php echo $s['supplier_name']; ?></option>
                                        <?php
        } ?>
                                    </select>
                                </div>
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
                            <input type="text" class="form-control date" name="date" value="<?php echo $date; ?>" hidden>
                            <!-- <div class="col">                           
                              <div class="form-group">
                                <select class="form-control" data-style="btn btn-link" required="true" name="category" id="category">
                                  <option value="selected">----- [SELECT SUBCATEGORY] -----</option>
                                  <?php $getCat = $subCat->getAllSubCat();
        foreach ($getCat as $cat) {
            ?>
                                      <option value="<?php echo $cat['id']; ?>"><?php echo $cat['sub_category_name']; ?></option>
                                  <?php
        } ?>
                                  </select>
                              </div>
                            </div> -->
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Item Name</label>
                                  <input type="text" id="item_name" class="form-control item_name" name="item_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">"Unit Measure PC(s)/PACKAGE</label>
                                  <input type="text" id="measure" class="form-control unit_measure" name="unit_measure">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Discount Price</label>
                                  <input type="number" id="discount" class="form-control discount_price" name="discount_price">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Unit Price</label>
                                  <input type="text" id="price" class="form-control unit_price" name="unit_price">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Bundled Price</label>
                                  <input type="text" id="bundled" class="form-control bundled_price" name="bundled_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Item Description</label>
                                  <textarea class="form-control desc" name="description" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Quantity</label>
                                  <input type="number" id="qty" class="form-control quantity" name="quantity">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Item Brand</label>
                                  <input type="text" id="brand" class="form-control item_brand" name="item_brand">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="setup" class="btn btn-primary" id="addProd">Add Product</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end of modal -->
          <div class="col-md-13">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title text-center">List of all Products</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Item ID</th>
                                <th>Item Code</th>
                                <th>Supplier</th>
                                <th>Sub Category</th>
                                <th>Image</th>
                                <th>Unit Price</th>
                                <th>Bundled Price</th>
                                <th>Item Name</th>
                                <th>Unit Measure</th>
                                <th>Item Quantity</th>
                                <th>Item Brand</th>
                                <th hidden>Category</th>
                                <th hidden>Item Description</th>
                                <th hidden>Rating</th>
                                <th hidden>Comment</th>
                                <th hidden>Discount Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $get = $item->getAllItem();
        foreach ($get as $g) {
            if ($g['status'] == 'ACTIVE') {
                $getCatById = $category->getCatById($g['category_id']);
                $getSubById = $subCat->getSubById($g['sub_category_id']);
                $getSuppById = $supplier->getSuppById($g['supp_id']); ?>
                            <tr>
                                <td class="item_id" style="text-align: center;"><?php echo $g['item_id']; ?></td>
                                <td class="item_code" style="text-align: center;"><?php echo $g['item_code']; ?></td>
                                <td class="supplier" style="text-align: center;"><?php echo $getSuppById['supplier_name']; ?></td>
                                <td class="subCat" style="text-align: center;"><?php echo $getSubById['sub_category_name']; ?></td>
                                <td style="text-align: center;" width="150"><img src="<?php echo $g['item_image']; ?>" width="80"></td>
                                <td class="unit_price" style="text-align: center;"><?php echo $g['unit_price']; ?></td>
                                <td class="bundled_price" style="text-align: center;"><?php echo $g['bundled_price']; ?></td>
                                <td class="item_name" style="text-align: center;"><?php echo $g['item_name']; ?></td>
                                <td class="unit_measure" style="text-align: center;"><?php echo $g['unit_measure']; ?></td>
                                <td class="quantity" style="text-align: center;"><?php echo $g['item_quantity']; ?></td>
                                <td class="brand" style="text-align: center;"><?php echo $g['item_brand']; ?></td>
                                <td class="category" hidden style="text-align: center;"><?php echo $g['category_id']; ?></td>
                                <td class="desc" hidden style="text-align: center;"><?php echo $g['item_description']; ?></td>
                                <td class="rating" hidden style="text-align: center;"><?php echo $g['item_rating']; ?></td>
                                <td class="comment" hidden style="text-algin: center;"><?php echo $g['item_comment']; ?></td>
                                <td class="discount" hidden style="text-align: center;"><?php echo $g['discount_price']; ?></td>
                                <td class="td-actions text-center">                                
                                <!-- <a type="button" href="../controller/item/bundle.controller.php?id=<?php echo $g['item_id']; ?>" rel="tooltip" title="Add To Promo" class="btn btn-primary btn-sm" style="color: white;">
                                  <i class="fab fa-product-hunt"></i>
                                </a> -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editProduct<?php echo $g['item_id']; ?>">
                                  <i class="fas fa-edit"></i>
                                </button>
                                  <a type="button" href="../controller/item/delete.controller.php?id=<?php echo $g['item_id']; ?>" rel="tooltip" title="Remove" class="btn btn-danger btn-sm" style="color: white;">
                                    <i class="fas fa-trash"></i>
                                  </a>                                  
                                </td>
                            </tr>     
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editProduct<?php echo $g['item_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <?php $get = $item->getItemById($g['item_id']);
                $supp = $supplier->getSuppById($get['supp_id']);
                $subctgry = $subCat->getSubById($get['sub_category_id']); ?>
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="../controller/item/item.controller.php?id=<?php echo $get['item_id']; ?>" method="post" enctype="multipart/form-data">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col">
                                          <input id="upFile" type="file" name="file" class="form-control">
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Item Code</label>
                                            <input type="text" name="item_code" value="<?php echo $get['item_code']; ?>" require="required" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <select class="form-control" data-style="btn btn-link" required="true" name="supplier">
                                                  <option value="<?php echo $get['supp_id']; ?>"><?php echo $supp['supplier_name']; ?></option>
                                                  <?php $supp = $supplier->getAllSupplier();
                foreach ($supp as $s) {
                    ?>
                                                  <option value="<?php echo $s['supp_id']; ?>"><?php echo $s['supplier_name']; ?></option>
                                                  <?php
                } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                        <div class="form-group">
                                          <select class="form-control" data-style="btn btn-link" required="true" name="sub_category">
                                            <option value="<?php echo $get['sub_category_id']; ?>"><?php echo $subctgry['sub_category_name']; ?></option>
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
                                      <input type="text" class="form-control" name="date" value="<?php echo $get['date_added']; ?>">
                                      <!-- <div class="col">                           
                                        <div class="form-group">
                                          <select class="form-control" data-style="btn btn-link" required="true" name="category" id="category">
                                            <option value="selected">----- [SELECT SUBCATEGORY] -----</option>
                                            <?php $getCat = $subCat->getAllSubCat();
                foreach ($getCat as $cat) {
                    ?>
                                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['sub_category_name']; ?></option>
                                            <?php
                } ?>
                                            </select>
                                        </div>
                                      </div> -->
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Item Name</label>
                                            <input type="text" value="<?php echo $get['item_name']; ?>" class="form-control item_name" name="item_name">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">"Unit Measure PC(s)/PACKAGE</label>
                                            <input type="text" value="<?php echo $get['unit_measure']; ?>" class="form-control unit_measure" name="unit_measure">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Discount Price</label>
                                            <input type="number" value="<?php echo $get['discount_price']; ?>" class="form-control discount_price" name="discount_price">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Unit Price</label>
                                            <input type="text" value="<?php echo $get['unit_price']; ?>" class="form-control unit_price" name="unit_price">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Bundled Price</label>
                                            <input type="text" value="<?php echo $get['bundled_price']; ?>" class="form-control bundled_price" name="bundled_price">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Item Description</label>
                                            <textarea class="form-control desc" name="description" rows="2"><?php echo $get['item_description']; ?></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Quantity</label>
                                            <input type="number" value="<?php echo $get['item_quantity']; ?>" class="form-control quantity" name="quantity">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Item Brand</label>
                                            <input type="text" value="<?php echo $get['item_brand']; ?>" class="form-control item_brand" name="item_brand">
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update" class="btn btn-primary" id="updateProd">Edit Product</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- End of Edit Modal -->
                            <?php
            } ?>
            
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
      <script type="text/javascript">
    $(document).ready(function(){

      $('#updateProd').on('click',function(){
        var file = $('#upFile').val();
        // alert(file);
        // return false;
        if(file == "")
        {
          alert("Invalid File");
          return false;
        }
      });
        $('body').on('change','#category',function(){
            var id = $('#category option:selected').val();

            // alert($('.hidden_id').val());
            $('#sub_category').prop('hidden', false);
            // document.write('<?php $sub = $subCat->getSubCatById('+id+'); ?>');
            // alert($('#sub_category option:selected').val());            
        });
    //     $('.date').daterangepicker({
    //     singleDatePicker: true,
    // }, function(start, end, label) {
    //     console.log(start.toISOString(), end.toISOString(), label);
    // });
    $('.table').DataTable({
            "pageLength": 20,
            dom: 'Bfrtip',
            buttons: ['print']
        });
        $('body').on('click','.register', function(){
            var pass = $('.password').val();
            var confirm = $('.confirm').val();

            if(pass!=confirm)
            {
                alert('Password not Match');
                return false;
            }
        });

    // $('#edit').on('click',function(){
    //     var id = $(this).closest('tr').find('.item_id').text();
    //     var code = $(this).closest('tr').find('.item_code').text();
    //     var supp = $(this).closest('tr').find('.supplier').text();
    //     var cat = $(this).closest('tr').find('.category').text();
    //     var subCat = $(this).closest('tr').find('.subCat').text();
    //     var date = $(this).closest('tr').find('.date').text();
    //     var discount = $(this).closest('tr').find('.discount').text();
    //     var unit_price = $(this).closest('tr').find('.unit_price').text();
    //     var bundle = $(this).closest('tr').find('.bundled_price').text();
    //     var name = $(this).closest('tr').find('.item_name').text();
    //     var unit_measure = $(this).closest('tr').find('.unit_measure').text();
    //     var quantity = $(this).closest('tr').find('.quantity').text();
    //     var desc = $(this).closest('tr').find('.desc').text();
    //     var brand = $(this).closest('tr').find('.brand').text();

    //     $('.item_id').val(id);
    //     $('.item_code').val(code);
    //     $('.supp').val(supp);
    //     $('.category').val(cat);
    //     $('.sub_cat').val(subCat);
    //     $('.date').val(date);
    //     $('.discount_price').val(discount); 
    //     $('.unit_price').val(unit_price);
    //     $('.item_name').val(name);
    //     $('.unit_measure').val(unit_measure);
    //     $('.bundled_price').val(bundle);
    //     $('.desc').val(desc);
    //     $('.quantity').val(quantity);
    //     $('.item_brand').val(brand);
    //     $('.edit').prop('hidden', false);
    //     $('.add').prop('hidden', true);
    // });

    // $('.setup').on('click',function(){
    //     $('.edit').prop('hidden', true);
    //     $('.add').prop('hidden', false);
    // });

      $('#addProd').on('click', function(){
          var file = $('#file').val();
          var code = $('#item_code').val();
          var supplier = $('#supplier option:selected').val();
          var subCat = $('#subCategory option:selected').val();
          var namae = $('#item_name').val();
          var unit_measure = $('#measure').val();
          var discount = $('#discount').val();
          var price = $('#price').val();
          var bundled = $('#bundled').val();
          var desc = $('.desc').val();
          var qty = $('#qty').val();
          var brand = $('#brand').val();

          if(code == "")
          {
            alert("Item Code is Required");
            return false;
          }

          if(subCat == "selected")
          {
            alert("Category is Required");
            return false;
          }

          if(price == "")
          {
            alert("Price is Required");
            return false;
          }

          if(supplier == "selected")
          {
            alert("Supplier is Required");
            return false;
          }

          if(qty = "")
          {
            alert("qty is required");
            return false;
          }

          if(file == "")
          {
            alert("File Does not Exist");
            return false;
          }
      });
    });
</script>

<?php
    } ?>