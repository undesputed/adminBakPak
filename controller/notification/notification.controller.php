<?php
    require_once '../../model/notification.model.php';

    $notif = new notification();
    $id = $_GET['id'];
    $status = 'READ';
    $data = array($status);
    $notif->updateNotification($data, $id);
    header('location: ../../view/notifications.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);
