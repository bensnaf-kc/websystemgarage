<?php 
include('header.php'); 
include('../backend/connect.php');

$sql = "SELECT * FROM store";
$query = mysqli_query($mysqli,$sql);
$qty = mysqli_query($mysqli,$sql);
while ($res = mysqli_fetch_array($qty)){
    $id = $res['store_id'];
}
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                ตั้งค่าเว็บไซต์
                            </h1>
                            <div class="page-header-subtitle">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <label for="" class="text-blue">สีหน้าเว็บไซต์</label>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลอะไหล่</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_store.php" method="post" enctype="multipart/form-data">
                        <div class="row gx-4 md-4">
                            <div class="col-md-6">
                                <label for="">ชื่อ:</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                        </div>
                        <div class="row gx-4 md-4">
                            <div class="col-md-4">
                                <label for="">ราคา:</label>
                                <input class="form-control" type="number" name="price" placeholder="0.00" required>
                            </div>
                            <div class="col-md-4">
                                <label for="">จำนวน:</label>
                                <input class="form-control" type="number" name="amo" value="1" required>
                            </div>
                            <div class="col-md-4">
                                <label for="">ประเภท:</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="1">เครื่องยนต์</option>
                                    <option value="2">ช่วงล่าง</option>
                                    <option value="3">ตัวถัง</option>
                                    <option value="4">ล้อ</option>
                                    <option value="5">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">รูป:</label>
                                <input class="form-control" type="file" name="pic" id="pic" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button"
                        data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary"
                        type="submit">บันทึก</button></div>
                </form>
            </div>
        </div>
    </div>

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