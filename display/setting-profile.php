<?php
include('../backend/connect.php');
include('header.php');
$id = $_SESSION['id'];
?>
<div id="layoutSidenav_content">
    <main>
    <?php
            $idweb = $_SESSION['id'];
            $sql_color = "SELECT * FROM user WHERE user_id = '$idweb'";
            $qty_color = mysqli_query($mysqli,$sql_color);
            while($color = mysqli_fetch_array($qty_color)){ 
                    $type = $color['web_type'];
            }
        ?>
        <?php 
            if($type == 1){
                echo "<header class='page-header page-header-dark bg-gradient-default pb-10'>";
            }
            if($type == 2){
                echo "<header class='page-header page-header-dark bg-gradient-sunset pb-10'>";
            }
            if($type == 3){
                echo "<header class='page-header page-header-dark bg-gradient-subtle pb-10'>";
            }
            if($type == 4){
                echo "<header class='page-header page-header-dark bg-gradient-emerald pb-10'>";
            }
        ?>
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                ตั้งค่าผู้ใช้งาน - โปรไฟล์
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php if (isset($_SESSION['succ_info'])) :?>
        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert" align="center">
            <h6>
                <?php
                    echo $_SESSION['succ_info'];
                    unset($_SESSION['succ_info']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h6>
        </div>
        <?php endif ?>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="setting-profile.php">โปรไฟล์</a>
                <a class="nav-link" href="security.php">ความปลอดภัย</a>
                <a class="nav-link" href="account-notifications.html"></a>
            </nav>
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">รูปภาพโปรไฟล์</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <?php
                                $sql = "SELECT * FROM user WHERE user_id = '$id'";
                                $qty = mysqli_query($mysqli,$sql);
                                while ($row = mysqli_fetch_array($qty)){
                            ?>
                            <img class="img-account-profile rounded-circle mb-2"
                                src="assets/img/illustrations/profiles/<?=$row['user_pic'];?>" alt="" />
                            <?php
                                }
                            ?>
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG หรือ PNG มีขนาดไม่เกิน 5 MB</div>
                            <!-- Profile picture upload button-->
                            <!-- <a href="edit_profile.php?user_id=<?=$id;?>" class="btn btn-warning shadow iift" type="submit"></a> -->
                            <!-- Button trigger modal -->
                            <button class="btn btn-warning shadow lift" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">อัพโหลดรูปภาพ</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">รายละเอียดผู้ใช้งาน <label for=""
                                class="text-sm text-red">หมายเหตุ:สามารถแก้ไขในช่องด้านล่างได้เลย</label></div>
                        <div class="card-body">
                            <form action="edit_infoprofile.php?user_id=<?=$id;?>" method="post">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <?php
                                        $sql_info = "SELECT * FROM user WHERE user_id = '$id'";
                                        $qty_info = mysqli_query($mysqli,$sql_info);
                                        while ($info = mysqli_fetch_array($qty_info)){
                                    ?>
                                    <div class="col">
                                        <label class="small mb-1" for="inputFirstName">ชื่ออู่หรือศูนย์บริการ</label>
                                        <input class="form-control" id="inputFirstName" type="text"
                                            value="<?=$info['name'];?>" name="nameser" />
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col">
                                        <label class="small mb-1" for="inputOrgName">ที่อยู่อู่หรือศูนย์บริการ</label>
                                        <input class="form-control" id="inputOrgName" type="text"
                                            value="<?=$info['address'];?>" name="address" />
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">อีเมล์</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Enter your email address" value="<?=$info['email'];?>"
                                        name="email" />
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <?php
                                        }
                                    ?>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-warning shadow lift" type="submit">แก้ไข</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer-admin mt-auto footer-light">
        <div class="container-xl px-4">
            <div class="row">
                <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
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

<!-- Modal -->
<form action="edit_profile.php?user_id=<?=$id;?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="" class="small mb-1">รูปภาพโปรไฟล์</label>
                    <?php
                    $sql_pic = "SELECT * FROM user WHERE user_id = '$id'";
                    $qty_pic = mysqli_query($mysqli,$sql_pic);
                    while($pic = mysqli_fetch_array($qty_pic)){
                ?>
                    <img src="asset/img/illustrations/profiles/<?=$pic['user_pic'];?>" alt=""
                        style="width: 100px; height:auto;">
                    <?php
                    }
                ?>
                    <div class="custom-file md-3">
                        <input type="file" class="custom-file-input" id="pic" name="pic">
                        <label for="pic" class="custom-file-label">เลือกรูปภาพ</label>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button"
                        data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadow iift"
                        type="submit">บันทึก</button>
</form>
</div>
</div>
</div>
</div>