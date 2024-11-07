<?php
session_start();
include 'connection.php';
include 'auth1.php';
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
// $msg=0;
// if (isset($_POST['sign'])) {
//   $email =mysqli_real_escape_string($connection, $_POST['email']);
//   $password =mysqli_real_escape_string($connection, $_POST['password']);
 
//   // $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
//   // $sanitized_password =  mysqli_real_escape_string($connection, $password);

//   $sql = "select * from login where email='$email'";
//   $result = mysqli_query($connection, $sql);
//   $num = mysqli_num_rows($result);
 
//   if ($num == 1) {
//     while ($row = mysqli_fetch_assoc($result)) {
//       if (password_verify($password, $row['password'])) {
//         $_SESSION['email'] = $email;
//         $_SESSION['name'] = $row['name'];
//         $_SESSION['gender'] = $row['gender'];
//         header("location:home.html");
//       } else {
//         $msg = 1;
   
//       }
//     }
//   } else {
//     echo "<h1><center>Account does not exists </center></h1>";
//   }

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script type="text/javascript">
      function preventBack(){window.history.forward();};
      setTimeout("preventBack()", 0);
      window.onload=function(){null;}

    </script>
    <style>
      .loader_bg {
    position: fixed;
    z-index: 9999999;
    background: #fff;
    width: 100%;
    height: 100%;
}
.loader {
    height: 100%;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.loader img {
    width: 180px;
}
    
    </style>

</head>

<body>
    <style>
    .uil {

        top: 42%;
    }
    </style>
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="loading-green-loading.gif" alt="#" /></div>
     </div>
     <!-- end loader -->
    <div class="container">
        <div class="regform">

            <form action=" " method="post">

                <p class="logo">Food <b style="color:#06C167; ">Donate</b></p>
                <p id="heading" style="padding-left: 1px;"> Welcome back ! <img src="" alt=""> </p>

                <div class="input">
                    <input type="email" placeholder="Email address" name="email" value="" required />
                </div>
                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password" required />

                  
                    <i class="uil uil-eye-slash showHidePw"></i>
                  
                    <?php
                    if($msg==1){
                        echo ' <i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error">Password not match.</p>';
                    }
                    ?>
                
                </div>


                <div class="btn">
                    <button type="submit" name="login"> Sign in</button>
                </div>
                <div class="signin-up">
                    <p id="signin-up">Don't have an account? <a href="signup.php">Register</a></p>
                    <p id="signin-up"> <a href="forgot-password.php">Forgot Password</a></p>
                </div>
            </form>
        </div>


    </div>
    <script src="login.js"></script>
    <script src="admin/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(function () {

"use strict";

setTimeout(function () {
$('.loader_bg').fadeToggle();
}, 1500);

});
</script>
</body>

</html>
