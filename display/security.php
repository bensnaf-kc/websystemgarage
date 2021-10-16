<?php
session_start();
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4 mt-n10">
            <div class="container-xl px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <!-- Basic login form-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center">
                                <h3 class="fw-light my-4">ตั้งค่าความปลอดภัย</h3>
                                <?php if (isset($_SESSION['error'])) :?>
                                    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert"
                                        align="center">
                                        <h6>
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </h6>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="card-body">
                                <!-- Login form-->
                                <form action="security-check.php" method="post">
                                    <!-- Form Group (password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPassword">รหัสผ่าน&nbsp;&nbsp;<label class="text-sm text-red">หมายเหตุ: รหัสผ่านของผู้สมัครใช้งาน</label></label>
                                        <input class="form-control" name="inputPassword" type="password" placeholder="กรุณาใส่รหัสผ่าน" />
                                    </div>
                                    <!-- Form Group (login box)-->
                                    <div class="d-flex align-items-center justify-content-between mt-6 mb-0">
                                        <button class="btn btn-primary shadow lift" type="submit" name="btn">เข้าสู่ระบบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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