<?php
include('../connection.php');
if(isset($_POST['insert_admin'])) { 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $user_type="manager";
    // select data from database
    $select_query = "select * from `login` where city = '$city'";
    $result_select =  mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
     if ($number > 0) {
      echo "<script>alert('admin already exists')</script>";
        
         } else{
            $insert_query="INSERT INTO `login`(name,email,password,city,adress,user_type) VALUES ('$name','$email','$hash_password','$city','$adress','$user_type')";
            $result = mysqli_query( $connection , $insert_query );
             if($result){
              echo "<script>alert('Admin inserted sucessfully')</script>";
             }else{
              echo mysqli_error($connection,$insert_query);
             }
            }

}

?>
<h2 class="text-center">Insert Admin</h2>
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
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="adress" placeholder="adress" aria-label="brands" aria-describedby="basic-addon1">
</div>
<!-- city -->
<div class="input-group w-90 mb-3">
<select name="city" id="" class="form-select">
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
        
           
           </select>
</div>
<div class="input-group w-10 mb-3">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_admin" value="insert Admin">
</div>


</form>