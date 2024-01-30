<?php
session_start();
include("../actions/con.php");

if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}else{
  $username = $_SESSION["username"];
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/loader.jpg">
    <link rel="icon" type="image/png" href="../assets/images/loader.jpg">
    <title>
        DKB Warehouse
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <link href="../assets/css/datatables.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="../assets/js/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

</head>


</head>

<body class="g-sidenav-show  bg-gray-100">


    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="dashboard.php ">
                <img src="../assets/images/logo.png" class="navbar-brand-img h-100 w-100" alt="main_logo">
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="../pages/dashboard.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="../pages/materials.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Materials</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="../pages/users.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <a class="btn bg-gradient-primary mt-3 w-90" style="bottom: 0; position: absolute;"
                href="../actions/logout.php">Logout</a>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3" id="navbarBlur"
            navbar-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">

                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-warning btn-sm mb-0 me-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#orderModal">Order Request</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-success btn-sm mb-0 me-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#pickupModal">Pickup Item</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#addNewMaterialModal">Add Item</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none"><?php echo strtoupper($_SESSION['username']);?></span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 floating-element">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Item</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php 
                        $sql = "SELECT * FROM item";
                        $result = $conn->query($sql);
                        echo $result->num_rows;
                      ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 floating-element">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Waiting for deliver</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php 
                        $sql = "SELECT * FROM item WHERE item_status = 'ordered'";
                        $result = $conn->query($sql);
                        echo $result->num_rows;
                      ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-delivery-fast text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 floating-element">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Ready to pick up</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php 
                        $sql = "SELECT * FROM item WHERE item_status = 'readytopickup'";
                        $result = $conn->query($sql);
                        echo $result->num_rows;
                      ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 floating-element">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Delivered to Customer
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php 
                        $sql = "SELECT * FROM item WHERE item_status = 'completed'";
                        $result = $conn->query($sql);
                        echo $result->num_rows;
                      ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <h3>Projects</h3>
                                </div>
                                <?php
                                if($_SESSION['usertype'] == 'admin'){
                                 echo "
                                 <div class='col-6 d-flex justify-content-end'>
                                    <a class='btn btn-outline-primary btn-sm' type='button' data-bs-toggle='modal'
                                        data-bs-target='#exampleModal'>NEW PROJECT</a>
                                 </div>
                                 ";
                                }
                                ?>
                                
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive px-3">
                              <?php include("../extension/projecttable.php");?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="d-flex flex-column justify-content-between">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>,
                            made by
                            <a class="font-weight-bold">Atakan Unsal</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- Modal Order Request-->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PICK UP MATERIAL</h5>
                </div>
                <div class="modal-body">
                <form>
                        <div class="form-group">
                            <h6 for="exampleInputJobName">Choose Job Name</h6>
                            <select class="form-select" aria-label="Default select example" id="exampleInputProjectName" required>
                                <option selected disabled value="">Choose JOB</option>
                            <?php 
                            $sql = "SELECT po_name FROM purchase_order";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["po_name"] . '">' . $row["po_name"] . '</option>';
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputJobStart">ASSIGN TO</h6>
                            <select class="form-select" aria-label="Default select example"
                            id="po_pm_one" name="po_pm_one" placeholder="Project Manager" required>
                            <option selected disabled value="">Choose Project Manager</option>
                            <?php 
                                $sql = "SELECT `user_name` FROM user WHERE user_type = 'pm'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["user_name"] . '">' . $row["user_name"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputJobStart">MATERIAL NAME</h6>
                            <input type="text" class="form-control" id="exampleInputMaterialName"
                                placeholder="Material Name" required>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputQuantity">MATERIAL LINK (Optional)</h6>
                            <input type="text" class="form-control" id="exampleInputQuantity"
                                placeholder="Material Link">
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputQuantity">Description (Optional)</h6>
                            <input type="text" class="form-control" id="exampleInputQuantity"
                                placeholder="Material Description">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" style="width: 48%;"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" style="width: 48%;">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Create New Project Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW PROJECT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../actions/addproject.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <h6 for="exampleInputJobName">Project Name</h6>
                            <input type="text" class="form-control" id="po_name" name="po_name" aria-describedby="jobName"
                                placeholder="Enter JOB Name" required>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputJobStart">Project Start Date</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example" id="po_start_date_mm" name="po_start_date_mm"
                                        required>
                                        <option selected disabled value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example" id="po_start_date_dd" name="po_start_date_dd"
                                        required>
                                        <option selected disabled value="">Day</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example" id="po_start_date_yy" name="po_start_date_yy"
                                        required>
                                        <option selected disabled value="">Year</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <h6 for="exampleInputJobStart">Project Type</h6>
                        <select class="form-select" aria-label="Default select example" id="po_type" name="po_type"
                            required>
                            <option selected disabled value="">Choose Type</option>
                            <option value="kitchen">Kitchen</option>
                            <option value="bathroom">Bathroom</option>
                            <option value="basement">Basement</option>
                            <option value="homeaddition">Home Addition</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <h6 for="exampleInputProjectManager">Project Manager</h6>
                        <select class="form-select" aria-label="Default select example"
                            id="po_pm_one" name="po_pm_one" placeholder="Project Manager" required>
                            <option selected disabled value="">Choose Project Manager</option>
                            <?php 
                                $sql = "SELECT `user_name` FROM user WHERE user_type = 'pm'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["user_name"] . '">' . $row["user_name"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Project</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Pickup-->
    <div class="modal fade" id="pickupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PICK UP MATERIAL</h5>
                </div>
                <div class="modal-body">
                    <video id="qr-video" playsinline autoplay></video>
                    <div id="result"></div>
                </div>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    onclick="stopCamera()">Close</button>
            </div>
        </div>
    </div>

    <!-- Create New Item Modal -->
    <div class="modal fade" id="addNewMaterialModal" tabindex="-1" aria-labelledby="addNewMaterialModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewMaterialModal">ADD NEW MATERIAL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6 for="exampleInputJobName">Choose Job Name</h6>
                            <select class="form-select" aria-label="Default select example" id="exampleInputProjectName"
                                required>
                                <option selected disabled value="">Choose JOB</option>
                                <?php 
                                $sql = "SELECT po_name FROM purchase_order";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["po_name"] . '">' . $row["po_name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputJobStart">MATERIAL NAME</h6>
                            <input type="text" class="form-control" id="exampleInputMaterialName"
                                placeholder="Material Name" required>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputQuantity">QUANTITY</h6>
                            <input type="text" class="form-control" id="exampleInputQuantity"
                                placeholder="Material Quantity" required>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputOrderedDate">ORDER DATE</h6>
                            <input type="date" class="form-control" id="exampleInputOrderedDate"
                                placeholder="Material Name" required>
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputOffice">DELIVERED DATE</h6>
                            <input type="date" class="form-control" id="exampleInputOffice" placeholder="Material Name"
                                >
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputInvoice">UPLOAD INVOICE</h6>
                            <input class="form-control" type="file" id="materialInvoice">
                        </div>
                        <div class="form-group">
                            <h6 for="exampleInputPicture">UPLOAD PICTURE</h6>
                            <input class="form-control" type="file" id="materialPicture">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary w-100" onclick="generateId()">Create
                                ID</button>
                        </div>
                        <div class="form-group">
                            <span style="font-size: 20px ;" id="generatedId"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" style="width: 48%;"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" style="width: 48%;">Save Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="../assets/js/script.js"></script>

        <?php
        switch ($_GET['success']) {
            case "1":
                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
                ";
                break;
            case "0":
                echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 4000
                    })
                </script>
                ";
                break;
            default:;
        }
        ?>

        <script>
        function generateId() {
            // Get values from the form elements
            var projectName = document.getElementById('exampleInputProjectName').value.toUpperCase();
            var materialName = document.getElementById('exampleInputMaterialName').value.toUpperCase();
            var materialQuantity = document.getElementById('exampleInputQuantity').value.toUpperCase();

            // Remove spaces from values
            projectName = projectName.replace(/\s/g, '');
            materialName = materialName.replace(/\s/g, '');
            materialQuantity = materialQuantity.replace(/\s/g, '');

            // Check if both values are not empty
            if (projectName && materialName && materialQuantity) {
                // Generate the ID and display it
                var generatedId = 'DKB' + projectName + materialName + materialQuantity;
                document.getElementById('generatedId').innerText = 'BARCODE: "' + hashCode(generatedId) + '"';
            } else {
                alert(
                'Please choose a Job Name, enter a Material Name and Material Quantity before generating the ID.');
            }
        }

        function hashCode(str) {
            var hash = 0;
            if (str.length == 0) return hash;

            for (var i = 0; i < str.length; i++) {
                var char = str.charCodeAt(i);
                hash = (hash << 5) - hash + char;
            }

            // Ensure the hash is non-negative
            return Math.abs(hash);
        }
        </script>

        <script>
        let scanner; // Declare scanner variable at a higher scope

        document.getElementById('pickupModal').addEventListener('shown.bs.modal', function() {
            // Access the camera and start scanning when the modal is shown
            navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'environment'
                    }
                })
                .then((stream) => {
                    const video = document.getElementById('qr-video');
                    video.srcObject = stream;

                    // Use a library like Instascan for QR code scanning
                    scanner = new Instascan.Scanner({
                        video: video
                    });
                    scanner.addListener('scan', function(content) {
                        const scannedNumber = content;

                        // Check if the scanned number starts with '1244'
                        if (scannedNumber.startsWith('1244')) {
                            // Redirect to the form submission page with the scanned number
                            window.location.href =
                                'https://www.example.com/page.php?number_in_qr_code=' +
                                scannedNumber;
                        } else {
                            // Display an alert for wrong QR code
                            alert(
                                'Wrong QR code scanned. Please scan a QR code starting with "1244".');
                        }
                    });

                    Instascan.Camera.getCameras().then(function(cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                        } else {
                            console.error('No cameras found.');
                        }
                    }).catch(function(error) {
                        console.error(error);
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        });

        // Function to stop the camera when the modal is closed
        function stopCamera() {
            if (scanner) {
                scanner.stop();
            }
        }

        document.getElementById('pickupModal').addEventListener('hidden.bs.modal', function() {
            // Stop the camera when the modal is hidden
            stopCamera();
        });
        </script>


        <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        </script>
        <script>
          $(document).ready(function() {
              $('#example').DataTable();
          });
        </script>

        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quagga"></script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>