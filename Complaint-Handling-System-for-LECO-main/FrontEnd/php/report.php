<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LECO Admin Dashboard</title>
        <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico"/> 
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles1.css" rel="stylesheet" />
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
        <script src="../js/report.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>

            span::before {
                content: "Report";
                animation: animate infinite 3s;
                
            }
      
            @keyframes animate {
                10% {
                    content: "R";
                }  
               20% {
                    content: "Re";
                }
    
                30% {
                    content: "Rep";
                }
      
                40% {
                    content: "Repo";
                }
                50% {
                    content: "Repor";
                }
                60% {
                    content: "Report";
                }
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <img src="../images/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
            <a class="navbar-brand ps-3" href="../index.html">Admin Dashboard</a>
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../index.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../adminDash.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="statistics.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Statistics
                            </a>
                            <div class="bg-danger">
                                <a class="nav-link active" href="report.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    <span> </span>
                                </a>
                                </div>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                </nav>
                            </div>
                            
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-9">
                                <h1 class="mt-4">Type the Complaint Number Here...</h1>
                                </div>
                                <div class="input-group">
                                <form action="" method="POST">
                                <input class="form-control" type="text" placeholder="CID"  name="getCID" />
                                <input class="btn btn-primary" id="btnNavbarSearch" type="submit" name="search">
                                </div>
                                </form>
                             
                            <div class="col-3">
                                
                            </div>
                        </div>
                        
                        
                            <div class="row" >
                                <div class="col-12">
                                    <div class="card mb-4">
                                    <div id="aaabb">
                                            <h1><center>Complaint Process Report</center></h1>
                                            <div class="mx-3">
                                        <?php
                                        $connection=mysqli_connect("localhost","root","");
                                        $db=mysqli_select_db($connection,"lecodb");
                                        if(isset($_POST['search'])){
                                            $id=$_POST['getCID'];
                                            $query="SELECT * FROM `complaint` WHERE CID='$id'";
                                            $query_run=mysqli_query($connection,$query);
                                            

                                            while($row=mysqli_fetch_array($query_run)){
                                                ?>
                                                Complaint Number:<?php echo $row['CID'];
                                                ?><br>
                                                 Title:<?php
                                                    if($row['comp_type']==1){
                                                        echo "Break Down";
                                                    }elseif($row['comp_type']==2){
                                                        echo "Connection Innteruption";
                                                    }elseif($row['comp_type']==3){
                                                        echo "Weak Power Supply";
                                                    }elseif($row['comp_type']==4){
                                                        echo "Other";
                                                    }
                                                 ?><br>
                                            <hr>
                                            Filed Date:<?php
                                                echo $row['comp_date'];
                                            ?><br>
                                             Description:<?php
                                                echo $row['description'];
                                             ?><br>
                                             Status:<?php
                                                if($row['status']==0){
                                                    echo "Not Attended";
                                                }elseif($row['status']==1){
                                                    echo "Processing";
                                                }elseif($row['status']==2){
                                                    echo "Finished";
                                                }
                                             ?></div>
                                             <?php   
                                             
                                            }
                                        }
                                        ?>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="400"></canvas></div>
                                        </div>
                                    </div>
                                    
                                    <button type="button" onclick="generatePDF()" class="btn btn-secondary">Download PDF</button>
                                </div>
                            </div>
                        
                    </div>
                </main> 
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>