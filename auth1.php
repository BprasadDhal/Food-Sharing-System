<?php
@session_start();
include("connection.php");   //it will include the file i.e is database.php
require_once("./test.php");
$username = "";
$email =  "";
$password =  "";
$gender = "";
$user_type = "";
$password =  "";
$c_password = "";
// $error = "";
$otp_screen = false;
$forgot_password = true;
$otp_password = false;
$new_password = false;
$msg=0;
if (isset($_POST['sign'])) {        //it checks whether variable is set or not
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];
    $gender=$_POST['gender'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    if (isset($username) && isset($email) && isset($password) && isset($gender) && isset($user_type)) {
            $sql = "SELECT * FROM login where email='$email'";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                echo "<h1><center>Account already exists</center></h1>";
            } else {
                $sql = "DELETE FROM otp WHERE email='$email'";
                $connection->query($sql);
                $generat_otp = rand(100000, 999999);
                $mail_status = sendOTP($_POST["email"], $generat_otp);//1
                if ($mail_status == 1) {
                    $sql = "INSERT INTO otp (email, otp) VALUES ('$email','$generat_otp')";
                    if ($connection->query($sql) === TRUE) {
                        $otp_screen = true;
                    } else {
                        echo "<h1><center>Something went wrong Please try again later</center></h1>";
                        header("Location: signup.php");
                    }
                } else {
                    echo "<h1><center>Failed to send otp to email</center></h1>";
                }
            }
            $connection->close();
        
    } else {
        header("Location: signup.php"); /* Redirect browser */
    }
} else if (isset($_POST['Verify'])) {
    $username=$_POST['name'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];
    $gender=$_POST['gender'];
    $pass=password_hash($password,PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    if (isset($email) && isset($otp) && isset($username) && isset($password) && isset($gender) && isset($user_type)) {
        $otp_screen = true;
        $sql = "SELECT * FROM otp where email='$email' and otp='$otp'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $sql = "INSERT INTO login(name,email,password,gender,user_type) VALUES ('$username','$email','$pass','$gender','$user_type')";
            if ($connection->query($sql) === TRUE) {
                $username = "";
                $email =  "";
                $password =  "";
                $user_type= "";
                $gender = "";
                $error = "";
                $otp_screen = false;
                header("Location: signin.php");
            } else {
                echo "<h1><center>Something went wrong Please try again later</center></h1>";
                $otp_screen = true;
            }
        } else {
            echo "<h1><center>Incorrect Otp</center></h1>";
            $otp_screen = true;
        }
        $connection->close();
    } else {
        echo "<h1><center>Something went wrong Please try again later</center></h1>";
        // header("Location: signup.php");
    }
} else if (isset($_POST['login'])) {
    $email =mysqli_real_escape_string($connection, $_POST['email']);
    $password =mysqli_real_escape_string($connection, $_POST['password']);
  
    $sql = "select * from login where email='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    //  $row =  mysqli_fetch_assoc($result);
   
    if ($num == 1) {
      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
           
          $_SESSION['user_type']=$row['user_type'];
          if ($_SESSION['user_type'] == "donor"){
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            $_SESSION['gender'] = $row['gender'];
            header("location:home.html");

          }else if($_SESSION['user_type'] == "admin"){
            $_SESSION['username']=$row['name'];
            header("location:admin_area/index.php");

          }else if($_SESSION['user_type'] == "manager"){
            $_SESSION['name']=$row['name'];
            $_SESSION['location']=$row['city'];
            $_SESSION['Aid']=$row['id'];
            header("location:admin/admin.php");

          }else if($_SESSION['user_type'] == "delivery"){
            $_SESSION['name']=$row['name'];
            $_SESSION['city']=$row['city'];
            $_SESSION['Did']=$row['id'];
            header("location:delivery/delivery.php");

          }
          else{
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['id'] = $row['id'];
            header("location:home1.html");
          }
          
        } else {
          $msg = 1;
     
        }
      }
    } else {
      echo "<h1><center>Account does not exists </center></h1>";
    }
} else if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    if (isset($email)) {
        $sql = "SELECT * FROM login where email='$email'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $sql = "DELETE FROM otp WHERE email='$email'";
            $connection->query($sql);
            $generat_otp = rand(100000, 999999);
            require_once("./test.php");
            $mail_status = sendOTP($_POST["email"], $generat_otp);
            if ($mail_status == 1) {
                $sql = "INSERT INTO otp (email, otp) VALUES ('$email','$generat_otp')";
                if ($connection->query($sql) === TRUE) {
                    $otp_password = true;
                } else {
                    echo "<h1><center>Something Went Wrong Please try again </center></h1>";
                    header("Location: forgot-password.php");
                }
            } else {
                echo "<h1><center>Failed to send otp to email </center></h1>";
            }
        } else {
            echo "<h1><center>Email ID not found </center></h1>";
        }
        $connection->close();
    } else {
        echo "<h1><center>Something Went Wrong Please try again </center></h1>";
        header("Location: forgot-password.php");
    }
} else if (isset($_POST['forgot_password_otp'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    if (isset($email) && isset($otp)) {
        $sql = "SELECT * FROM otp where email='$email' and otp='$otp'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $new_password = true;
        } else {
            $otp_password = true;
            echo "<h1><center>Incorrect OTP </center></h1>";
        }
        $connection->close();
    } else {
        echo "<h1><center>Something Went Wrong Please try again </center></h1>";
        header("Location: forgot-password.php");
    }
} else if (isset($_POST['set_password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=password_hash($password,PASSWORD_DEFAULT);
    $c_password = $_POST['c_password'];
    $new_password = true;
    if (isset($email) && isset($password) && isset($c_password)) {
        if ($password == $c_password) {
            $sql = "UPDATE login SET password='$pass' WHERE email='$email'";
            if ($connection->query($sql) === TRUE) {
                $forgot_password = true;
                $otp_password = false;
                $new_password = false;
                header("Location: signin.php");
            } else {
                echo "<h1><center>Unable to update password </center></h1>";
            }
            $connection->close();
        } else {
            echo "<h1><center>Password Missmatch </center></h1>";
        }
    } else {
        echo "<h1><center>Something Went Wrong Please try again </center></h1>";
        header("Location: forgot-password.php");
    }
}

?>
