<?php
    include_once('./Database/Database.php');
    session_start();
    $name = $_SESSION['name'];
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barangay Database</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">DASHBOARD</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Services</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="currentBarangay_Official.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Current Barangay Officials
                            </a>
                            <a class="nav-link" href="residentinfo.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Resident Information
                            </a>

                            <a class="nav-link" href="officialRegister.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Register Barangay Official
                            </a>
                            <div class="sb-sidenav-menu-heading">Documents</div>

                            <a class="nav-link" href="Certificate.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Certificate Issuance
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: TANG INA MO</div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Resident Information</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Resident Information
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Resident ID</th>
                                            <th>First Name </th>
                                            <th>Last Name </th>
                                            <th>Alias </th>
                                            <th>Gender </th>
                                            <th>Birthdate</th>
                                            <th>Civil Status</th>
                                            <th>Voter Status</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        include_once("./database/connection.php");
                                        $getResident = "SELECT * FROM officials";
                                        $result = mysqli_query($conn, $getResident);
                                        if (mysqli_num_rows($resident) > 0) {
                                            while ($resident = mysqli_fetch_assoc($resident)) 
                                            {
                                            echo "<tr>"
                                                . "<td>" . $resident['idNumber']
                                                . "</td><td>" . $resident['position']
                                                . "</td><td name='tdLastName' value=".$resident['nameLast'].">" . $resident['nameLast']
                                                . "</td><td name='tdFirstName' value=".$resident['nameFirst'].">" . $resident['nameFirst']
                                                . "</td><td name='tdMiddleName' value=".$resident['nameMiddle'].">" . $resident['nameMiddle']
                                                . "</td><td>" . $resident['nameAlias']
                                                . "</td><td>" . $resident['purok']
                                                . "</td><td><button name='btnView' type='submit' value=" . $resident['idNumber'] . " class='btn btn-success text-dark bg-gradient fa fa-eye'></button>
                                                    <button name='btnDelete' type='submit' value=" . $resident['idNumber'] . " class='btn btn-danger text-dark bg-gradient fa fa-trash'></button></td>"
                                                . "</tr>";
                                            }
                                        }
                                        ?>
                                          
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ALWAYS STRIVE AND PROSPER</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
