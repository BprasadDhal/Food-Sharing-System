<?php
include("auth1.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$name=$_SESSION['name'];
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['food_receive']))
{
$oid=$_POST['order_id'];
$select ="select * from food_donations where Fid='$oid'";
$result_select= mysqli_query($connection,$select);
$row = mysqli_fetch_assoc($result_select) ;
if($result_select){
$emailid=$_SESSION['email'];
$foodname=$row['food'];
$meal=$row['type'];
$category=$row['category'];
$name=$_SESSION['name'];
// echo $name;
$quantity_available=$row['quantity'];
$quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
$phoneno=$_POST['phoneno'];
$district=$_POST['district'];
$address=$_POST['address'];

    $query="insert into receive_food(name,email,food,type,category,quantity,adress,location,phoneno) values('$name','$emailid','$foodname','$meal','$category','$quantity','$address','$district','$phoneno')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
      if ((int) $quantity_available >= (int)$quantity){
      $rest= (int) $quantity_available - (int)$quantity;

      $update="update `food_donations` set quantity=$rest where Fid='$oid'";
      $result =  mysqli_query($connection , $update);
      if($result){
        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:home1.html");

      }
    }else{
      echo '<script type="text/javascript">alert("Enter valid quantity")</script>';

    }
        
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        echo "Error description: " . mysqli_error($connection);
        
    }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
    <style>
        table {
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    width: 100%;
    table-layout: fixed;
  }
  
  table caption {
    font-size: 1.5em;
    margin: .5em 0 .75em;
  }
  
  table tr {
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    padding: .35em;
  }
  
  table th,
  table td {
    padding: .625em;
    text-align: center;
  }
  
  table th {
    font-size: .85em;
    letter-spacing: .1em;
    text-transform: uppercase;
  }
  
  @media screen and (max-width: 600px) {
    #map-container {
      height: 200px;
    }
    table {
      border: 0;
    }
    .table-container{
      margin: 10px;
    }
    .table-container{
      margin: 10px;
    }
  
    table caption {
      font-size: 1.3em;
    }
    
    table thead {
      border: none;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px;
    }
    
    table tr {
      border-bottom: 3px solid #ddd;
      display: block;
      margin-bottom: .625em;
    }
    
    table td {
      border-bottom: 1px solid #ddd;
      display: block;
      font-size: .8em;
      text-align: right;
    }
    
    table td::before {
      /*
      * aria-label has no advantage, it won't be read inside a table
      content: attr(aria-label);
      */
      content: attr(data-label);
      float: left;
      font-weight: bold;
      text-transform: uppercase;
    }
    
    table td:last-child {
      border-bottom: 0;
    }
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /* general styling */
  body {
    font-family: "Open Sans", sans-serif;
    line-height: 1.25;
  }
      

  
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
  
  
  .log{
    /* width: 50%; */
    margin: auto;
    display:grid;
    align-items: center;
    

    /* border: 1px solid black; */
    /* align-items: center; */
    
}
a{
    /* text-align: center; */
    display: inline-block;
/* font-size: 1em; */
font-size: 20px;
background:#06C167;
padding: 10px 30px;
/* text-transform: uppercase; */
text-decoration: none;
font-weight: 500;
margin:10px auto 10px auto;
color: #fff;
letter-spacing: 2px;
transition: 0.2s;
}
    </style>
</head>
<body style="background-color: #06C167;">
<div class="container">
        <div class="regformf" >
                <form action="" method="post">
                   <p class="logo">Receive <b style="color: #06C167; ">Donate</b></p>
                   <div class="input">
        <label for="food">Check for Availability:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <div class="btn">
            <button type="submit" name="submit"> submit</button>
     
        </div>
    
        </div>
                </form>   
        </div>
</div>
<div class="container">
  <form action="" method="post">
    <table class="table table-bordered text-center">

    <?php
    if (isset($_POST['submit'])){
      $category = $_POST['image-choice'];
      $select = "select * from `food_donations` where category = '$category' ";
      $result = mysqli_query($connection,$select);
      $result_count = mysqli_num_rows($result);
      if ($result_count>0){
        echo "<thead>
                <tr>
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Available Quantity</th>
                    <th>Required Quantity</th>
                    <th>City</th>
                    <th>Receive Adress</th>
                    <th>Phone no</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
            while ($row=mysqli_fetch_assoc($result)) {
              $fid=$row['Fid'];
              $foodname=$row['food'];
              $foodtype=$row['type'];
              $quantity=$row['quantity'];
              ?>
              <tr>
              <td><?php echo $foodname?></td>
              <td><?php echo $foodname?></td>
              <td><?php echo $quantity?></td>
              <td><form action="" method="post"><div class="input"><input type="text" id="quantity" name="quantity" /></div></td>
              <td><div class="input"><select id="district" name="district" style="padding:10px;">
  <!-- <option value="Keonjhar">Keonjhar</option> -->
  <option value="">Select a City</option>
            <?php 
            $select_query="select * from `city`";
            $result=mysqli_query($connection,$select_query);
            while($row=mysqli_fetch_assoc($result)){
                $city_name=$row['city_name'];
                $city_id=$row['city_id'];
                echo "<option value='$city_name'> $city_name </option>";
            }
            
            ?>
        
</select></div> </td>
              <td><div class="input"><input type="text" id="address" name="address" /></div></td>
              <td><div class="input"><input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}"  /></div></td>
              <td>
                        <input type="hidden" name="order_id" value="<?= $fid ?>">
                        <button type="submit" name="food_receive"> order</button>
                      
                        </form>
              </td>
              </tr>
    <?php          
            }
    }else{
      echo "<h2 class='text-center text-danger'>No food available for this category</h2>";
    }
  }

    
    ?>
    </table>
  </form>
</div>
     
    
</body>
</html>

<!-- <?php
if (isset($_POST['food_receive'])){
  $fid=$_POST['order_id'];
  echo  $fid;
  $phoneno=$_POST['phoneno'];
  echo "<script>alert('order for  ".$phoneno." created')</script>";

}


?> -->