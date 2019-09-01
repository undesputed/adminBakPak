<?php
    require_once '../model/user.model.php';
    if ($_SESSION) {
        $user = new User();
        $getUser = $user->getAllUser(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="register">
        <form action="../controller/user/user.controller.php" method="post">
            <input type="text" name="id" require="required" placeholder="ID" hidden>
            <input type="text" name="fname" require="required" placeholder="First name">
            <input type="text" name="lname" require="required" placeholder="Last name"><br/>
            Contact Information:
            <input type="text" name="street" require="required" placeholder="Lot# / Block# / Street#">
            <input type="text" name="barangay" require="required" placeholder="Barangay"><br/>
            <input type="text" name="city" require="required" placeholder="City">
            <input type="text" name="birthdate" require="required" placeholder="MM/DD/YY">
            <input type="text" name="postal_code" require="required" placeholder="Postal Code"><br />
            <input type="text" name="email" require="required" placeholder="Email Address">
            <input type="text" name="phone" require="required" placeholder="Telephone/Mobile Number"><br />
            Account Credentials
            <input type="text" name="user" require="required" placeholder="Username">
            <input type="password" name="pass" require="required" placeholder="Password" class="password">
            <input type="password" name="confirm" require="required" placeholder="Confirm Password" class="confirm">
            <input type="submit" name="register" value="register">
        </form>
    </div>
    <div class="update" hidden>
        <form action="../controller/user/user.controller.php" method="post">
            <input type="text" name="id" class="id" require="required" placeholder="ID" hidden>
            <input type="text" name="fname" class="fname" require="required" placeholder="First name">
            <input type="text" name="lname" class="lname" require="required" placeholder="Last name"><br/>
            Contact Information:
            <input type="text" name="address" class="address" require="required" placeholder="Address">
            <input type="text" name="birthdate" class="birth" require="required" placeholder="MM/DD/YY">
            <input type="text" name="postal_code" class="post_code" require="required" placeholder="Postal Code"><br />
            <input type="text" name="email" class="email" require="required" placeholder="Email Address">
            <input type="text" name="phone" class="phone" require="required" placeholder="Telephone/Mobile Number"><br />
            Account Credentials
            <input type="text" name="user" class="user" require="required" placeholder="Username">
            <input type="password" name="pass" class="pass" require="required" placeholder="Password" class="pass">
            <input type="password" name="confirm" class="" require="required" placeholder="Confirm Password" class="con">            
            <input type="submit" name="update" value="update">
        </form>
            <input type="submit" value="Register" class="reg">
    </div>
    <center>List Of All users</center>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>FirsName</th>
                <th>LastName</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th>Postal Code</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($getUser as $get) {
            ?>
            <tr>
                <td class="id"><?php echo $get['user_id']; ?></td>
                <td class="fname"><?php echo $get['user_fname']; ?></td>
                <td class="lname"><?php echo $get['user_lname']; ?></td>
                <td class="address"><?php echo $get['user_address']; ?></td>
                <td class="bdate"><?php echo $get['user_birthdate']; ?></td>
                <td class="postal_code"><?php echo $get['user_postal_code']; ?></td>
                <td class="email"><?php echo $get['user_email']; ?></td>
                <td class="phone"><?php echo $get['user_phone']; ?></td>
                <td class="user"><?php echo $get['user_username']; ?></td>
                <td class="pass"><?php echo $get['user_password']; ?></td>
                <td><?php echo $get['user_status']; ?></td>
                <td><button class="edit">Edit</button><a href="../controller/user/delete.controller.php?id=<?php echo $get['user_id']; ?>">Delete</a></td>
            </tr>
        <?php
        } ?>
        </tbody>
    </table>
</body>
</html>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/jszip.min.js"></script>
<script src="assets/js/pdfmake.min.js"></script>
<script src="assets/js/vfs_fonts.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
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

        $('body').on('click','.edit',function(){
            var id = $(this).closest('tr').find('.id').text();
            var fname = $(this).closest('tr').find('.fname').text();
            var lname = $(this).closest('tr').find('.lname').text();
            var addr = $(this).closest('tr').find('.address').text();
            var bdate = $(this).closest('tr').find('.bdate').text();
            var postal_code = $(this).closest('tr').find('.postal_code').text();
            var email = $(this).closest('tr').find('.email').text();
            var phone = $(this).closest('tr').find('.phone').text();
            var user = $(this).closest('tr').find('.user').text();
            var pass = $(this).closest('tr').find('.pass').text();

            $('.id').val(id);
            $('.fname').val(fname);
            $('.lname').val(lname);
            $('.address').val(addr);
            $('.birth').val(bdate);
            $('.post_code').val(postal_code);
            $('.email').val(email);
            $('.phone').val(phone);
            $('.user').val(user);
            $('.pass').val(pass);
            $('.update').prop('hidden',false);
            $('.register').prop('hidden', true);
        });

        $('.reg').on('click',function(){
            $('.register').prop('hidden', false);
            $('.update').prop('hidden',true);
        });
        
    });
</script>
    <?php
    }?>
