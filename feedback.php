<?php
include "connection.php";
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $sql = "insert into user_feedback (name,email,message) values ('$name','$email','$message')";
    $result = mysqli_query($connection,$sql);
if($result){
    echo "<script>alert('Feedback sent sucessfully')</script>";
    header( 'Location:contact.html' ); 
}


}



?>