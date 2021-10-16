<?php 
include('../backend/connect.php'); 
include('header.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-cogs"></i></div>
                                ตั้งค่าการใช้งาน
                            </h1>
                            <div class="page-header-subtitle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4 mt-n10">
            <div class="row">
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card h-100 lift">
                        <a href="setting-profile.php">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-lg fw-bold text-primary">ผู้ใช้งาน</div>
                                </div>
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card  h-100 lift">
                        <a href="setting-website.php">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                <div class="text-lg fw-bold text-primary">เว็บไซต์</div>
                                </div>
                                <i class="fas fa-window-maximize"></i></i>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer-admin mt-auto footer-light">
        <div class="container-xl px-4">
            <div class="row">
                <div class="col-md-6 small">Copyright &copy; CMD25</div>
                <div class="col-md-6 text-md-end small">
                    <a href="#!">Privacy Policy</a>
                    &middot;
                    <a href="#!">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php include('footer.php'); ?>