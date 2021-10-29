<?php
session_start();

include("condb.php");
$email=$_POST['email'];

$password=md5($_POST['password']);


$data= "select * from user1 where email='$email' && password='$password'";


$result=mysqli_query($con,$data);
 

$a=mysqli_fetch_array($result);

$total= mysqli_num_rows($result);



if($total==1){
    $_SESSION['id']=$a['id'];
    $_SESSION['email']=$a['email'];
    $_SESSION['f_name']=$a['f_name'];
     
     header('location:dashboard.php');
   }
  else
      echo "<script>
              alert('Please insert the correct email and password.');
                    location.href='index.php';
            </script>";
                                 
?>
