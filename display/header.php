<?php session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "กรุณาเข้าสู่ระบบก่อน";
    header('location: login.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');

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
        <title>System Garage Management</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <style>
            body {
                font-family: 'Sarabun', arial, sans-serif;
                font-size: 120%;
                color: #000000;
                }

            header{
                font-size: 120%;
            }
            a {
                text-decoration: none;
            }

            a:hover {
                /* color: white; */
                text-decoration: none;
                /* cursor: pointer; */
            }
        </style>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">SYSTEM GARAGE</a>
            <!-- Navbar Search Input-->
            <!-- * * Note: * * Visible only on and above the lg breakpoint-->
                <div >
                    <label for=""><?php echo $_SESSION['fname']; ?></label>
                </div>
            <div>
            
            </div>
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-5.png" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-5.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?php echo $_SESSION['username']; ?></div>
                                <div class="dropdown-user-details-email"><?php echo $_SESSION['email']; ?></div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#!">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="index.php?logout='1'">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                            </a>
                            <!-- Sidenav Link (Messages)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                            </a>
                            <p></p>
                            <!-- Sidenav Menu Heading (Core)-->
                            <p class="" align="center"><a href="insert_customer.php"><button class="btn btn-primary shadow-lg lift"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;สร้างงานติดต่อ</button></a></p>
                            <!-- หน้าหลัก -->
                            <a class="nav-link" href="index.php">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div>
                                หน้าหลัก
                            </a>
                                
                                
                            </a>
                            <div class="sidenav-menu-heading">เมนู</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                                รายการ
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                    <a class="nav-link" href="customer.php">
                                    <i class="fas fa-user"></i>&nbsp;&nbsp;ลูกค้าที่มาติดต่อ
                                    </a>
                                    <a class="nav-link" href="#"><i class="fas fa-wrench"></i>&nbsp;&nbsp;งานซ่อม</a>
                                    <a class="nav-link" href="pay.php"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;การชำระเงิน</a>
                                </nav>
                            </div>
                            <!-- Sidenav Accordion (Pages)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                                ข้อมูล
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;ข้อมูลลูกค้า</a>
                                    <a class="nav-link" href="store.php"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;ข้อมูลอะไหล่</a>
                                    <a class="nav-link" href="employee.php"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;ข้อมูลพนักงาน</a>
                                </nav>
                            </div>
                            <!-- Sidenav Heading (Addons)-->
                            <div class="sidenav-menu-heading">จัดการผู้ใช้งาน</div>
                            <!-- Sidenav Link (Charts)-->
                            <a class="nav-link" href="setting.php">
                                <div class="nav-link-icon"><i class="fas fa-cog"></i></div>
                                ตั้งค่าการใช้งาน
                            </a>
                            <!-- Sidenav Link (Tables)-->
                            <a class="nav-link" href="logout.php">
                                <div class="nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                ออกจากระบบ
                            </a>
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title"><?php echo $_SESSION['username']; ?></div>
                        </div>
                    </div>
                </nav>
            </div>