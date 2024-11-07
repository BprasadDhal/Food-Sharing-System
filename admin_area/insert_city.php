<?php
include('../connection.php');
if(isset($_POST['insert_city'])) { 
    $city = $_POST['city'];
    // select data from database
    $select_query = "select * from `city` where city_name = '$city'";
    $result_select =  mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
     if ($number > 0) {
      echo "<script>alert('City already exists')</script>";
        
         } else{
            $insert_query="INSERT INTO `city`(city_name) VALUES ('$city')";
            $result = mysqli_query($connection,$insert_query );
             if($result){
              echo "<script>alert('City has been insertd sucessfully')</script>";
             }
            }

}

?>
<h2 class="text-center">Insert City</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="city" placeholder="Insert City" aria-label="catagories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-3">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_city" value="insert City">
  
</div>


</form>