<?php
if(isset($_GET['delete_payments'])){
    $delete_id=$_GET['delete_payments'];
    $delete_payment="Delete from `user_payments` where payment_id=$delete_id";
    $result_payment=mysqli_query($con,$delete_payment);
    if($result_payment){
        echo "<script>alert('Payment List is deleted sucessfully')</script>";
            echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}


?>