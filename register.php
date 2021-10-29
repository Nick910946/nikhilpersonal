
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
     <body class="sb-nav-fixed">


<?php 
include "condb.php";

if (isset($_POST['signup'])) {
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
    
}

else{


     $data = "insert into user1(f_name,l_name,email,password)value('$fname','$lname','$email','$password')";

    mysqli_query($con,$data);
    header('location:index.php');

}


}



 ?>
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <center>
                            <h1 class="mt-4">Registration</h1>
                        </center>
                        
                      <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <form method="post" action="register.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <label for="inputFirstName">First name</label>
                                                        <input class="form-control" id="fname" name="fname" type="text" placeholder="Enter your first name" />
                                                        <span id="v_fname" class="text-danger"></span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                         <label for="inputLastName">Last name</label>
                                                        <input class="form-control" id="lname" name="lname" type="text" placeholder="Enter your last name" />
                                                        <span id="v_lname" class="text-danger"></span>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputEmail">Email address</label>
                                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" />
                                                <span id="v_email" class="text-danger"></span>
                                                
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="md-3 ">
                                                         <label for="inputPassword">Password</label>
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" />
                                                        <span id="v_password" class="text-danger"></span>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="md-3 ">
                                                         <label for="inputPassword">Password</label>
                                                        <input class="form-control" id="cpassword" name="cpassword" type="cpassword" placeholder="Create a password" />
                                                        <span id="v_cpassword" class="text-danger"></span>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <center>
                                                                <button class="btn btn-primary" name="signup" id="submitbtn" type="submit">Create Account</button>
                                                            </center>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="index.php" class="btn btn-primary">Click to Login</a>
                                                        </div>

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                      </div>
                           
                            
                        </div>
                        
                    </div>
                </main>
                
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <!-- JQuery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#v_fname").hide();
            $("#v_lname").hide();
            $("#v_email").hide();
            $("#v_password").hide();
            $("#v_con_password").hide();
         

            var fname_error = true;
            var lname_error = true;
            var email_error = true;
            var password_error = true;
            var con_password_error = true;
           
        $('#fname').keyup(function(){
                fname_check();
            });
            function fname_check(){
                var fname_val = $('#fname').val();
                if (fname_val.length == '') {
                    $('#v_fname').show();
                    $('#v_fname').html("**first name is required");
                    $('#v_fname').focus();
                    $('#v_fname').css("color","red");
                    fname_error = false;
                    return false;
                }else{
                    $('#v_fname').hide();
                }
            }


            $('#submitbtn').click(function(){
                name_error = true;
                username_error = true;
                email_error = true;
                dob_error = true;
                phone_error = true;
                address_error = true;

                name_check();
                password_check();
                con_password_check();

                if ((name_error==true)&&(username_error==true)&&(email_error==true)&&(dob_error==true)&&(phone_error==true)&&(address_error==true)) {return true;
                }else{
                    return false;
                }
            });
        });
    </script>
     <script>
            function validation(){

                var password=document.getElementById('password').value;

                var cpassword=document.getElementById('cpassword').value;

                if (password=="") {

                    document.getElementById('v_password').innerHTML="password is required";
                    return false;

                }

                if (cpassword=="") {

                    document.getElementById('v_cpassword').innerHTML="Confirm password is required";
                    return false;

                }

                if (password!=cpassword) {

                    document.getElementById('v_cpassword').innerHTML="password is not match";
                    return false;

                }

            }

        </script>
    </body>

</html>