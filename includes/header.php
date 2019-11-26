<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/main.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>



<body class="bg-secondary">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand nav-link" href= "/2019-ac32006/team2/index.php">ETWORLD<img src="/2019-ac32006/team2/img/Logo/Logo.png" alt="logo" width="80" height="80"></a>           

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href= "/2019-ac32006/team2/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href= "/2019-ac32006/team2/pages/public/about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                            Products
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href= "/2019-ac32006/team2/pages/public/Products/product_Desktops.php">Desktops</a>
                            <a class="dropdown-item" href= "/2019-ac32006/team2/pages/public/Products/product_Laptops.php">Laptops</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/2019-ac32006/team2/pages/public/Products/product_Peripherals.php">Peripherals</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href= "/2019-ac32006/team2/pages/public/contacts.php">Contact</a>
                    </li>

                    <?php
                    if (isset($_SESSION['AccountID'])) {

                        include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'. '/includes/db.inc.php');
                        include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'. '/includes/query.inc.php');
                        // query for account role
                        // if role != customer, do not display

                        if (get_type($conn, $_SESSION['AccountID']) == "customer") {
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="/2019-ac32006/team2/pages/customer/basket.php">
                                        <img src="/2019-ac32006/team2/img/ico/basket.svg" class="img-fluid" style="width: 1rem;" alt="">
                                    </a>
                                </li>';
                        }
                    }
                    ?>

                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['AccountID'])) {
                            echo '<a class="nav-link" href= "/2019-ac32006/team2/includes/logout.inc.php">Logout</a>';
                        } else {
                            echo '<a class="nav-link" href= "/2019-ac32006/team2/pages/public/login.php">Login</a>';
                        }
                        ?>
                    </li>

                    <?php
                    if (isset($_SESSION['AccountID'])) {
                        include_once($_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/db.inc.php');
                        $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountType` = "admin"';
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $role_sql)) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $role_res = mysqli_stmt_num_rows($stmt);
                            if ($role_res == 1) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href= "/2019-ac32006/team2/pages/admin/index.php">Admin Portal</a>';
                                echo '</li>';
                            }
                        }
                    }
                    
                    if (isset($_SESSION['AccountID'])) {
                        
                    }
                    if (isset($_SESSION['AccountID'])) {
                        include_once($_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/db.inc.php');
                        $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountType` = "staff"';
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $role_sql)) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $role_res = mysqli_stmt_num_rows($stmt);
                            if ($role_res == 1) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href= "/2019-ac32006/team2/pages/staff/index.php">Staff Portal</a>';
                                echo '</li>';
                            }
                            //mysqli_free_result($stmt);
                        }
                        include_once($_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/query.inc.php');
                        $sql = 'DROP VIEW IF EXISTS `StaffInformation`';
                        $result = mysqli_query($conn, $sql);
                        //$result->free_result();

                        $sql = 'SELECT * FROM Staff WHERE AccountID="'.$_SESSION['AccountID'].'"';
                        $result = mysqli_query($conn, $sql);
                        $staff_id = '';
                        $branch_id = '';
                        while ($row = $result->fetch_assoc()) {
                            $staff_id = $row['StaffID'];
                            $branch_id = $row['BranchID'];
                        }
                        
                        // $sql = 'CREATE VIEW `StaffInformation` AS SELECT
                        // Sta.AccountID,
                        // Sta.StaffID,
                        // Sta.FullName,
                        // Salary,
                        // Role,
                        // Address,
                        // Phone,
                        // PayrollID,
                        // Deductions,
                        // GrossPay,
                        // NetPay,
                        // Ni,
                        // Sta.BranchID,
                        // BranchType,
                        // BranchAddress,
                        // ContactNumber
                        // FROM Staff AS Sta, Branch AS Bran, Payroll AS Pay
                        // WHERE Sta.StaffID = Pay.StaffID and Sta.StaffID = "'.$staff_id.'" and (Sta.BranchID = Bran.BranchID and Sta.BranchID = "'.$branch_id.'"'.')';
                        // $result = mysqli_query($conn, $sql);
                        // echo mysqli_error($conn);
                        
                        
                        //$stmt = bind_query($conn, $sql, 'i', array($_SESSION['AccountID']));
                    }
                    if (isset($_SESSION['AccountID'])) {
                        include_once($_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/db.inc.php');
                        $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountType` = "customer"';
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $role_sql)) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $role_res = mysqli_stmt_num_rows($stmt);
                            if ($role_res == 1) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href= "/2019-ac32006/team2/pages/customer/index.php">Customer Portal</a>';
                                echo '</li>';
                            }
                        }

                        // $sql = 'CREATE VIEW `CustomerInformation` AS SELECT
                        // A.AccountID, 
                        // CustomerID, 
                        // CustomerFirstName,
                        // CustomerLastName,
                        // CustomerAddress,
                        // Phone,
                        // BankAccountID,
                        // CardNUmber,
                        // CVC,
                        // AccountNUmber,
                        // SortCode,
                        // ExpiryDate,
                        // FullName,
                        // CardType
                        // FROM Customer AS A , BankAccount AS B
                        // WHERE A.AccountID = B.AccountiD and A.AccountID = "'.$_SESSION['AccountID'].'"';
                        // $result = mysqli_query($conn, $sql);

                        // $sql = 'DROP VIEW IF EXISTS `CustomerOrderInformation`';
                        // $result = mysqli_query($conn, $sql);

                        $sql = 'SELECT * FROM Customer WHERE AccountID="'.$_SESSION['AccountID'].'"';
                        $result = mysqli_query($conn, $sql);
                        $customer_id = '';
                        while ($row = $result->fetch_assoc()) {
                            $customer_id = $row['CustomerID'];
                        }

                    }
                    ?>
                </ul>
            </div>
        </nav>