<?php
include "condb.php";

if (isset($_POST['forgot_password'])) {
  $email = $_POST['email'];

    $q = "select * from user1 where email = '$email'";
    $p = mysqli_query($con,$q);
    // echo $q;
    $numrows = mysqli_num_rows($p);
    if ($numrows>0) {
        $f = mysqli_fetch_array($p);
        $db_email = $f['email'];
        $db_id = $f['id'];
        $token = uniqid(md5(time()));   //This is a Random token.

        $q2 = "insert into password_reset(email,token)value('$email','$token')";
        $p2 = mysqli_query($con,$q2);
        if ($p2) {
            $to = $db_email;
            $subject = "Password Reset Link";
            $message = "Click <a href='https://ankurloginandregistration.mantic.host/reset.php?token=$token'>here</a> to reset your Password.";
            $headers = "MIME-Version: 1.0" ."\r\n";
            $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: " .'Nikhil'. "<".'nikhil241996@gmail.com'.">". "\r\n";

            if (mail($to, $subject, $message, $headers)) {
                ?>
                <script>
                    alert("Password Reset Link has been sent to your Gmail.");
                </script>
                <?php
            }else {
                    ?>
                    <script>
                        alert("User not found.");
                    </script>
                    <?php
                }
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Recovery</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Recover Password</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-6">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-6 mb-0">
                                                
                                               <button class="btn btn-primary mt-3" type="submit" name="forgot_password">Recovery</button>
                                            </div>
                                           
                                        </form>
                                    </div>
                          

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
