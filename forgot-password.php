<?php
include 'auth1.php';

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
        <?php
        // $forgot_password = true;
        // $new_password = false;

                    if ($forgot_password == true && $new_password == false) { ?>
        <form action=" " method="post">

<p class="logo">Food <b style="color:#06C167; ">Donate</b></p>
<p id="heading" style="padding-left: 1px;"> Forgot Password! <img src="" alt=""> </p>
<?php
// $otp_password = false;
 if ($otp_password == true) { ?>
                <div class="input">
                    <input type="email" placeholder="Email address" name="email" value="<?php echo $email;?>" required />
                    <input type="hidden" placeholder="Email address" name="email" value="<?php echo $email;?>" required />
                </div>
                <div class="input">
                            <input placeholder="Enter OTP" name="otp" type="number" required>
                        </div>
                <?php } else { ?>
                <div class="input">
                    <input type="email" placeholder="Email address" name="email" value="<?php echo $email;?>" required />
                </div>
                <?php } ?>
                <?php if ($otp_password == true) { ?>
                    <div class="btn">
                    <button type="submit" name="forgot_password_otp"> Verify Otp</button>
                </div>
                <?php } else { ?>
                <div class="btn">
                    <button type="submit" name="forgot_password"> Send Otp</button>
                </div>
                <?php } ?>


        </form>
        <?php }else{?>
            <form action="" method="post">
        <div class="password">
                <input type="password" name="password" placeholder="New Password" id="password" value="<?php echo $password; ?>"  required/>
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>  
                <input type="hidden" name="email" id="" value="<?php echo $email; ?>"/>         
             </div>
             <div class="password">
                <input type="password" name="c_password" placeholder="Confirm Password" id="password" value="<?php echo $c_password; ?>" required/>
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
             </div>
             <div class="btn">
                    <button type="submit" name="set_password"> Change Password</button>
                </div>
                </form>
                <?php } ?>
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
