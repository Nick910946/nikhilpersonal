
<?php 

include "condb.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$n="select * from user1 where email='$email'";
$data1=mysqli_query($con,$n);
$row=mysqli_num_rows($data1);
if ($row>0) {

    ?>
    <script>
        alert("Email already exist");



    </script>
    <?php
     header('location:register.php');
}

else{


    $data = "insert into user1(f_name,l_name,email,password)value('$fname','$lname','$email','$password')";
    mysqli_query($con,$data);
    header('location:register.php');

}



 ?>