<?php
    require_once '../../model/log.model.php';
    require_once '../../model/user.model.php';

    $log = new Log();
    $users = new User();
    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $data = array($user, $pass);
        $ok = $log->login($data);
        if ($ok) {
            header('location:../../view/dashboard.php?id='.$_SESSION['user_id'].'?info='.$_SESSION['user']);
        } else {
            header('location:../../index.php?Failed_to_login');
        }
    }

    if (isset($_POST['register'])) {
        $flag = true;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['street'].' '.$_POST['barangay'].' '.$_POST['city'];
        $birthdate = $_POST['birthdate'];
        $postal_code = $_POST['postal_code'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $data = array($fname, $lname, $address, $birthdate, $postal_code, $email, $phone, $user, $pass);

        for ($i = 0; $i < count($data); ++$i) {
            if ($data[$i] == '') {
                $flag = false;
                break;
            }
        }

        if ($flag) {
            $users->addUser($data);
            header('location:../../view/user.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);
        } else {
            $message = 'Invalid Credentials';
            header('location:../../view/user.php?Failed_user_Registration');
        }
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $flag = true;
        $first = $_POST['fname'];
        $last = $_POST['lname'];
        $addr = $_POST['address'];
        $birth = $_POST['birthdate'];
        $postal = $_POST['postal_code'];
        $mail = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $status = $_POST['status'];

        $data = array($first, $last, $addr, $birth, $postal, $mail, $phone, $username, $password);

        for ($i = 0; $i < count($data); ++$i) {
            // echo $data[$i].' ';
            if ($data[$i] == '') {
                $flag = false;
                break;
            }
        }

        if ($flag) {
            $users->updateUser($data, $id);
            header('location:../../view/user.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);
        } else {
            $message = 'Invalid Credentials';
            header('location:../../view/user.php?Failed_user_Registration');
        }
    }
