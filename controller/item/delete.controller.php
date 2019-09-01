<?php
    require_once '../../model/item.model.php';
    $item = new Item();
    $id = $_GET['id'];
    $item->deleteItem($id);
    // header('location: ../../view/item_setup.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);
    header('location: ../../view/item.setup.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);
