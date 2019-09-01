<?php
    require_once '../../model/notification.model.php';

    $notif = new Notification();
    $id = $_GET['id'];
    $notif = $notif->deleteNotif($id);
    header('location: ../../view/notifications.php?id='.$_SESSION['admin_id'].'?info='.$_SESSIONO['admin']);
