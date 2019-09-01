<?php
    require_once '../../model/item.model.php';
    require_once '../../model/sub.category.model.php';

    $item = new Item();
    $Subcat = new Sub_Category();
    if (isset($_POST['setup'])) {
        $item_code = $_POST['item_code'];
        $supplier = $_POST['supplier'];
        // $category = $_POST['category'];
        $sub_cat = $_POST['sub_category'];
        $cat = $Subcat->getSubById($sub_cat);
        $category = $cat['cat_id'];
        $date = $_POST['date'];
        $discount_price = $_POST['discount_price'];
        $unit_price = $_POST['unit_price'];
        $bundled_price = $_POST['bundled_price'];
        $item_name = $_POST['item_name'];
        $unit_measure = $_POST['unit_measure'];
        $desc = $_POST['description'];
        $quantity = $_POST['quantity'];
        $item_brand = $_POST['item_brand'];
        $rating = '';
        $comment = '';
        $status = 'ACTIVE';

        $file = $_FILES['file'];
        $filename = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).'.'.$fileActualExt;
                    $fileDestination = 'http://192.168.43.35/adminBakpak/view/assets/image/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $item_image = $fileNameNew;
                    $data = array($item_code, $supplier, $category, $sub_cat, $item_image, $date, $discount_price, $unit_price, $bundled_price, $item_name, $unit_measure, $quantity, $desc, $item_brand, $rating, $comment, $status);
                    $ok = $item->addItem($data);
                    if ($ok) {
                        header('location: ../../view/item.setup.php?success');
                    } else {
                        header('location: ../../view/item.setup.php?Failed');
                    }
                } else {
                    echo 'Your file is too big';
                }
            } else {
                echo 'There was an error uploading your file';
            }
        } else {
            echo "<script>alert('File does not Exists');</script>";
        }
    }

    if (isset($_POST['update'])) {
        $item_id = $_GET['id'];
        $item_code = $_POST['item_code'];
        $supplier = $_POST['supplier'];
        // $category = $_POST['category'];
        $sub_cat = $_POST['sub_category'];
        $cat = $Subcat->getSubById($sub_cat);
        $category = $cat['cat_id'];
        $date = $_POST['date'];
        $discount_price = $_POST['discount_price'];
        $unit_price = $_POST['unit_price'];
        $bundled_price = $_POST['bundled_price'];
        $item_name = $_POST['item_name'];
        $unit_measure = $_POST['unit_measure'];
        $desc = $_POST['description'];
        $quantity = $_POST['quantity'];
        $item_brand = $_POST['item_brand'];
        $rating = '';
        $comment = '';
        $status = 'ACTIVE';

        $file = $_FILES['file'];
        $filename = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));
        echo $date;

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).'.'.$fileActualExt;
                    $fileDestination = '../../view/assets/image/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $item_image = $fileNameNew;
                    $data = array($item_code, $supplier, $category, $sub_cat, $item_image, $date, $discount_price, $unit_price, $bundled_price, $item_name, $unit_measure, $quantity, $desc, $item_brand, $rating, $comment, $status);
                    // foreach ($data as $d) {
                    //     echo $d;
                    // }
                    $ok = $item->updateItems($data, $item_id);
                    if ($ok) {
                        // header('location: ../../view/item.setup.php?success');
                    } else {
                        // header('location: ../../view/item.setup.php?Failed');
                        echo $date;
                    }
                } else {
                    echo 'Your file is too big';
                }
            } else {
                echo 'There was an error uploading your file';
            }
        } else {
            echo "<script>alert('File does not Exists');</script>";
            header('location:../../view/item_setup.php');
        }
    }
