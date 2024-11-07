<?php
include 'connection.php';
include 'auth1.php';
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
// if(isset($_POST['sign']))
// {

//     $username=$_POST['name'];
//     $email=$_POST['email'];
//     $password=$_POST['password'];
//     $gender=$_POST['gender'];

//     $pass=password_hash($password,PASSWORD_DEFAULT);
//     $sql="select * from login where email='$email'" ;
//     $result= mysqli_query($connection, $sql);
//     $num=mysqli_num_rows($result);
//     if($num==1){

//         echo "<h1><center>Account already exists</center></h1>";
//     }
//     else{
    
//     $query="insert into login(name,email,password,gender) values('$username','$email','$pass','$gender')";
//     $query_run= mysqli_query($connection, $query);
//     if($query_run)
//     {
      
       
//         header("location:signin.php");
       
//     }
//     else{
//         echo '<script type="text/javascript">alert("data not saved")</script>';
        
//     }
// }


   
// }
?>




<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
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
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="loading-green-loading.gif" alt="#" /></div>
     </div>
     <!-- end loader -->

    <div class="container">
    <div class="regform">
       
        <form action=" " method="post">
            <p class="logo">Food <b style="color: #06C167;">Donate</b></p>

            <?php
                                if ($otp_screen == false) {
                                    echo "<p id='heading'>Create your account</p>";
                                } else {
                                    echo "<p id='heading'>Otp Verification</p>";
                                } ?>
            
            

            <?php

                    if ($otp_screen == false) {
                        ?>
            
            <div class="input">
                <label class="textlabel" for="name">Name</label><br>
                
                <input type="text" id="name" name="name" value="<?php echo $username ?>" required/>
             </div>
             <div class="input">
                <label class="textlabel" for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email ?>" required/>
             </div>
             <label class="textlabel" for="password">Password</label>
             <div class="password">
                <input type="password" name="password" id="password" value="<?php echo $password ?>" required/>
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
             </div>
             <div class="input">
             <select id="name" name="user_type" style="width: 100%; font-size:20px;
  border:.5px solid #63707E;
  
  border-radius: 6px;
  padding:14px 15px;
  box-sizing:border-box;
  margin:5px 0px 15px;
  color:black;" >
             <option value="">Select a type</option>
             <option value="donor">Donor</option>
             <option value="receiver">Receiver</option>
                          
             </select> 
             </div>
    
             <div class="radio">
                
                <input type="radio" name="gender" id="male" value="male" value="<?php echo $gender ?>" required/>
                <label for="male" >Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female" >Female</label>

             </div>
             <div class="btn">
                <button type="submit" name="sign">Register</button>
             </div>
            
           <!-- <button type="submit" style="background-color:white ;color: #000; margin-top:5px;  padding: 10px 25px;">
                 <img src="google.svg" style="width:22px" >
                 Continue With  Google </button>  -->
                
            <div class="signin-up">
                 <p style="font-size: 20px; text-align: center;">Already have an account? <a href="signin.php"> Sign in</a></p>
             </div>
        </form>
        <form action="" method="post">

             <?php
                    } else {
                        ?>
                        <div class="input">
                <input type="hidden" name="name" value="<?php echo $username ?>"/>
                <input type="hidden" name="password" id="password" value="<?php echo $password ?>"/> 
                <input type="hidden" name="gender" id="male" value="male" value="<?php echo $gender ?>"/>
                </div>
                <div class="input">
             <select id="name" name="user_type" hidden >
             <option value="<?php echo $user_type?>"><?php echo $user_type?></option>
             <!-- <option value="donor">Donor</option>
             <option value="receiver">Receiver</option> -->
                          
             </select> 
             </div>
                        <div class="input">
                <label class="textlabel" for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email ?>"/>
                        </div>
                        <div class="input">
                            <input placeholder="Enter OTP" name="otp" type="number" required>
                        </div>
                        <!-- <div class="radio">
                            <div class="">
                                <label class="white" for="remember">Resend Otp</label>
                            </div>
                            <div class="">
                                <a href="login.php" class="right">Back To Login</a>
                            </div>
                        </div> -->
                        <div class="btn">
                        <button type="submit" name="Verify">Verify</button>
                        </div>












<?php }
                    ?>
         

        </form>
        </div>
        <!-- <div class="right">
            <img src="cover.jpg" alt="" width="800" height="700">
        </div> -->
       
    </div>
  

    <!-- <script src="login.js"></script> -->
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