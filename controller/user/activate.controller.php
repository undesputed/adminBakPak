<?php
    require_once '../../model/user.model.php';
    $user = new User();
    $id = $_GET['id'];
    $status = 'ACTIVE';
    $data = array($status);
    $user->deactUser($data, $id);
    header('location:../../view/user.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);