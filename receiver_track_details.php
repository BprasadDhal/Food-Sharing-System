<?php
session_start();
include 'auth1.php';
include 'connection.php';
$id = $_SESSION['id'];
if(isset($_GET['track_id'])){
    $track_id=$_GET['track_id'];
    $sql="select * from receive_food where rid=$track_id";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
    $food_name=$row['food'];
    
}

if (isset($_POST['food']) && isset($_POST['delivery_person_id'])) {
  $order_id = $_POST['order_id'];
  $delivery_person_id = $_POST['delivery_person_id'];
  echo $order_id;

$sql = "UPDATE receive_food SET received_by = $delivery_person_id WHERE rid = $order_id";
  // $result = mysqli_query($conn, $sql);
  $result=mysqli_query($connection, $sql);


  if (!$result) {
      die("Error assigning order: " . mysqli_error($connection));
      
  }

  // Reload the page to prevent duplicate assignments
   header('Location: ' . $_SERVER['REQUEST_URI']);
  // // exit;
  // ob_end_flush();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap CSS -->
    <!-- <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    />-->
    <link rel="stylesheet" href="css/style.css" /> 
    <style>
      button, input{
    font-size: 18px;
  background:#06C167;
  padding: 5px;
  /* text-transform: uppercase; */
  text-decoration: none;
  font-weight: 500;
  margin:10px auto 10px auto;
  color: #fff;
  letter-spacing: 2px;
  transition: 0.2s;
  border: #06C167;
  }
    </style>


</head>
<body>
<header>
        <div class="logo">Food <b style="color: #06C167;">Donate</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="home1.html">Home</a></li>
                <li><a href="about.html" >About</a></li>
                <li><a href="contact.html"  >Contact</a></li>
                <li><a href="receiver_profile.php"  class="active">Profile</a></li>
            </ul>
        </nav>
    </header>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
    </div>

 <div class="container">
      <div class="track-order">
        <div class="col-md-12 col-12 order-header p-2">
          <div class="row">
            <div class="col-md-4 col-12">
              Split Order ID: <span>123456789</span>
            </div>
            <div class="col-md-3 col-12">Package was Delivered on</div>
            <div class="col-md-5 col-12">09-Nov-2018:09:35 AM</div>
          </div>
           <!-- <p><a href="#">See order detail</a></p>  -->
         </div>
        <div class="col-md-12 col-12 order-body">
          <div class="sim-card">
            <ul class="list-ic vertical">
              <li>
                <span class="ststus-box-ed"></span>
                <span class="ststus-text">Order for <?php echo $food_name?> created</span>
              </li>
              <?php
                if($row['assigned_to']!==NULL){
                  //  echo  "<script>const form = document.getElementById('admin');</script>"; 
                  // echo "sucess";
                   echo  "
                   <li>
                   <span class='ststus-box-ed' id='admin'></span>
                   <span class='ststus-text'>Accepted by admin</span>
                 </li>
                 "; 
                }
                else{
                  echo  "
                  <li>
                   <span class='ststus-box' id='admin'></span>
                   <span class='ststus-text'>Accepted by admin</span>
                 </li>
                 "; 

                }
                
                ?>
              
              <?php
                if($row['delivery_by']!==NULL){
                  //  echo  "<script>const form = document.getElementById('admin');</script>"; 
                  // echo "sucess";
                   echo  "
                   <li>
                   <span class='ststus-box-ed' id='admin'></span>
                   <span class='ststus-text'>Delivery Partner Assigned</span>
                 </li>
                 "; 
                }
                else{
                  echo  "
                  <li>
                   <span class='ststus-box' id='admin'></span>
                   <span class='ststus-text'>Delivery Partner Assigned</span>
                 </li>
                 "; 

                }
                
                ?>
              <?php
                if($row['picked_by']!==NULL){
                  //  echo  "<script>const form = document.getElementById('admin');</script>"; 
                  // echo "sucess";
                   echo  "
                   <li>
                   <span class='ststus-box-ed' id='admin'></span>
                   <span class='ststus-text'>Order is out for delivery</span>
                 </li>
                 "; 
                }
                else{
                  echo  "
                  <li>
                   <span class='ststus-box' id='admin'></span>
                   <span class='ststus-text'>Order is out for delivery</span>
                 </li>
                 "; 

                }
                
                ?>
              <?php
                if($row['received_by']!==NULL){
                 
                   echo  "
                   <li>
                   <span class='ststus-box-ed' id='admin'></span>
                   <span class='ststus-text'>Order Received</span>
                 </li>
                 "; 
                }
                else{
                  echo  "
                  <li>
                   <span class='ststus-box' id='admin'></span>
                   <span class='ststus-text'>Order Received</span>
                 </li>
                 "; 

                }
                
                ?>
                
            </ul>
          </div>
          
        </div>
        
      </div>
      
    </div>  
    <form method="post" action=" ">
                        <input type="hidden" name="order_id" value="<?= $track_id ?>">
                        <input type="hidden" name="delivery_person_id" value="<?= $id ?>">
                        <button type="submit" name="food">Order Received</button>
                    </form>

    <script type="text/javascript" src="index.js"></script>
  </body>
</html>

  
              