    <?php
        include "config.php";
        session_start(); 
        $username = $_SESSION['username'];
        $name ="";
        $email ="";
        $roll = 0;
    
        
        if(!$_SESSION['auth'])
        {
            header('location:./Login/index.php');
        }
        else
        {
            $conn = mysqli_connect($host,$user,$pass,$db);
	        $query = "SELECT name,email,roll_no from student_details where gr_no ='$username'";
            $result = mysqli_query($conn,$query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  
                  $name = $row["name"];
                  $email = $row["email"];             
                  $roll = $row["roll_no"];
                  $_SESSION['name'] = $name;
                  $_SESSION['email'] = $email;
                  $_SESSION['roll'] = $roll;
                  
                }
              } 
	
	
        }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Student Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>

    <body class="">
        <div class="wrapper "> 
            <?php include "user_side_navbar.php" ?>
            <div class="main-panel">
                <?php include "side_navbar.php" ?>
                <!-- End Navbar -->
                <div class="panel-header panel-header-sm">
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="title">User Profile</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>College</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="BRACT's VIIT">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Username" value="<?php echo $username ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $email ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="<?php echo $name ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Last Name" value="Andrew">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="image">
                                    <img src="../assets/img//bg5.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            <img class="avatar border-gray" src="../assets/img//mike.jpg" alt="...">
                                            <h5 class="title"> <?php  echo $name ?> </h5>
                                        </a>                                   
                                        
                                        
                                        
                                    </div>
                                    <p class="description text-center">
                                        <?php
                                            echo "<p> Gr.No:  <strong>".$username."</strong></p>"
                                        ?>
                                         <?php
                                            echo "<p> Roll No: <strong> ".$roll."</strong></p>"
                                        ?>
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container">
                                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                        <i class="fab fa-google-plus-g"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav>
                            <ul>
                                <li>
                                    <a href="">
                                        NBA'S
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="">
                                        About Us
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="">
                                        Blog
                                    </a>
                                </li> -->
                            </ul>
                        </nav>
                        <div class="copyright">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, Designed by
                            <a href="" target="_blank">VIIT</a>. Coded by
                            <a href="" target="_blank">NBA'S</a>.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>

    </html>
