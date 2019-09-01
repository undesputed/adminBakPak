<?php
    require_once '../../model/user.model.php';

    $user = new User();
    if (isset($_POST['register'])) {
        $flag = true;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $birthdate = $_POST['birthdate'];
        $postal_code = $_POST['postal_code'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $data = array($fname, $lname, $street, $barangay, $city, $birthdate, $postal_code, $email, $phone, $user, $pass);

        for ($i = 0; $i < count($data); ++$i) {
            if ($data[$i] == '') {
                $flag = false;
                break;
            }
        }

        if ($flag) {
            $user->addUser($data);
            header('location:../../view/index.php?id='.$_SESSION['admin_id'].'?info='.$_SESSION['admin']);
        } else {
            $message = 'Invalid Credentials';
            header('location:../../view/index.php?Failed_user_Registration');
        }
    }
