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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            th {background-color: #343a40; color: white;}
            th, td {border-bottom: 1px solid #ddd;}
            tr:hover {background-color: #f5f5f5;}
            td{background-color:white;}
        </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <img src="../images/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
            <a class="navbar-brand ps-3" href="">Hello! <span id="admin_name"></span></a>
            <script src="js/getAdmin.js"></script> 
            <!-- Sidebar Toggle-->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form >
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
                            <a class="nav-link" href="report.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Reports
                            </a>
                            
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
                        <h1 class="mt-4">Total Complaints</h1>
                        <?php
                            $pdo= new PDO("mysql:host=localhost;dbname=lecodb","root","");
                            $query = "select * from complaint";
                            $d=$pdo->query($query);
                        ?>
                        
                        <table  class="com_table" style="text-align:center" id="comp_table">
                            <tr>
                                <th>Complaint ID</th>
                                <th>User ID</th>
                                <th>Complaint Type</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Date Filed</th>
                            </tr>
                            <?php
                                foreach($d as $data){
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $data['CID'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $data['UID'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $data['comp_type'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $data['description'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $data['Loaction'];
                                    ?>
                                </td>
                                <td>
                                <form action="updateStatus.php" method="POST">
                                    <?php
                                    if($data['status']==0){
                                        echo "Not Attended";
                                    }elseif($data['status']==1){
                                        echo "Processing";
                                    }elseif($data['status']==2){
                                        echo "Finished";
                                    }
                                    ?>
                                   
                                </td>
                                <td>
                                    <?php
                                    echo $data['comp_date'];
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <div class="row">
                        <div class="col-lg-7">
                                
                               
                            </div>
                        </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
