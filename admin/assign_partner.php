
<?php
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
include '../connection.php';
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:signin.php");
}
$id=$_SESSION['Aid'];
$location=$_SESSION['location'];
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    
<?php
 $connection=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($connection,'demo');
 


?>
<style>
    button, input{
    font-size: 18px;
  background:white;
  padding: 5px;
  /* text-transform: uppercase; */
  text-decoration: none;
  font-weight: 500;
  margin:10px auto 10px auto;
  color: black;
  letter-spacing: 2px;
  transition: 0.2s;
  border: #06C167;
  }
  select{
    font-size: 18px;
    padding: 5px;
    /* text-transform: uppercase; */
    text-decoration: none;
    font-weight: 500;
    margin:10px auto 10px auto;
    /* color: #fff; */
    letter-spacing: 2px;
    transition: 0.2s;
    /* border: #06C167; */
  }
</style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
                <li><a href="adminprofile.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >Assign <b style="color: #06C167; ">Partner</b></p>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <br><br><br>
        <div class="activity">
        <form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="name" placeholder="Name" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="email" class="form-control" name="email" placeholder="email" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="password" placeholder="password" aria-label="brands" aria-describedby="basic-addon1">
</div>
<!-- city -->
<div class="input-group w-90 mb-3">
<select name="city" id="" class="form-select">
            <option value="<?php echo $location?>"><?php echo $location?></option>
        
           
           </select>
</div>
<div class="input-group w-10 mb-3">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_admin" value="insert Admin">
</div>


</form>
        </div>
    </section>

    <script src="admin.js"></script>
</body>
</html>
<?php
if(isset($_POST['insert_admin'])) { 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $city = $_POST['city'];
    $user_type="delivery";
    // select data from database
    $select_query = "select * from `login` where email = '$email' and user_type='$user_type' ";
    $result_select =  mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
     if ($number > 0) {
      echo "<script>alert('Delivery Partner already exists')</script>";
        
         } else{
            $insert_query="INSERT INTO `login`(name,email,password,city,user_type) VALUES ('$name','$email','$hash_password','$city','$user_type')";
            $result = mysqli_query( $connection , $insert_query );
             if($result){
              echo "<script>alert('Delivery partner inserted sucessfully')</script>";
             }else{
                echo mysqli_error($connection,$insert_query);
             }
            }

}

?>