<?php

include ("session.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
           <a class="navbar-brand ps-3" href="index.html"> <h3 class="text-capitalize fst-italic"><?php echo $_SESSION['f_name'] ?>&nbsp;</h3></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                       
                       usre <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                             

                            <a class="nav-link" href="display.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>
                                Display Data
                            </a>
                             
                             
                            
                           
                           
                            <a href="register.php" class="nav-link collapsed"  data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"></div>
                              <!--   Register -->
                                <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       
                        <center>
                             <h1 class="mt-4">Data Display</h1>
                             <br><br>
                        </center>
                      
                           <center>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                      
                                        <tr class="text-center">
        
                                            <th>ID</th>
                                            <th> Name</th>
                                           
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                    

                                        </tr>   

                                             <?php

                                                include "condb.php";

                                                $a = "select * from user1 order by id desc";
                                                $b = mysqli_query($con,$a);
                                                while($data = mysqli_fetch_array($b)){
                                                    // echo "<pre>";
                                                    // print_r($data);

                                            ?>

                                                <tr class="text-center">
                                                    <td><?php echo $data['id'] ?></td>
                                                    <td><?php echo $data['f_name'] ?></td>
                                                   
                                                    <td><?php echo $data['email'] ?></td>
                                                    <td><?php echo $data['password'] ?></td>

                                            <td class="text-center">

                                            <a href="view.php?you=<?php echo $data ['id'] ?>"class="btn btn-info">view</a>
                                            
                                            <a href="delete.php?i=<?php echo $data['id']?>"class="btn btn-danger">Delete</a> 

                                            </td>
                                        </tr>

                                        <?php

                                        }   

                                        ?>
    
    
                                </table>
                                </center>
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
    </body>
</html>
