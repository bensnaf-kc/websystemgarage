<?php 
include('header.php'); 
include('../backend/connect.php');
$sql = "SELECT * FROM technician WHERE user_id = '$user'";
$query = mysqli_query($mysqli,$sql);
$qty = mysqli_query($mysqli,$sql);
while ($res = mysqli_fetch_array($qty)){
    $id = $res['id_tc'];
}
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
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
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="users"></i></div>
                                ข้อมูลพนักงาน
                            </h1>
                            <div class="page-header-subtitle">
                                พนักงานที่อยู่ในอู่หรือศูนย์บริการ</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">รายละเอียดข้อมูลพนักงาน <button class="btn btn-outline-warning shadow-lg lift"
                        type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่มพนักงาน</button></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อ</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th>แผนก</th>
                                    <th>รูปภาพ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อ</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th>แผนก</th>
                                    <th>รูปภาพ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row[0];
                                        ?>
                                <tr>
                                    <td class="text-danger">#00<?=$row[0];?></td>
                                    <td><?=$row['tc_name'];?></td>
                                    <td><?=$row['tc_address'];?></td>
                                    <td><?=$row['tc_tel'];?></td>
                                    <td>
                                        <?php 
                                            if($row['type_iddmt'] == 1){
                                                echo "<label class='text-red'>ช่างเครื่องยนต์</label>";
                                            }elseif ($row['type_iddmt'] == 2) {
                                                echo "<label class='text-blue'>ช่างไฟฟ้า</label>";
                                            }elseif ($row['type_iddmt'] == 3){
                                                echo "<label class='text-warning'>ช่างช่วงล่าง</label>";
                                            }elseif ($row['type_iddmt'] == 4){
                                                echo "<label class='text-primary'>ช่างการยาง</label>";
                                            }elseif ($row['type_iddmt'] == 5){
                                                echo "<label class='text-teal'>ช่วงตรวจสภาพ</label>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($row['tc_pic'] !== 0){ ?>
                                                <img src="assets/img/emp/<?=$row['tc_pic'];?>" alt="" width="50px"
                                            height="50px">
                                        <?php  }elseif($row['tc_pic'] == 0){ 
                                            echo "ไม่มีรูปภาพ";
                                        } ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-warning shadow lift btn-sm" type="button"
                                            data-bs-toggle="modal" data-bs-target="#edit<?=$row[0];?>">แก้ไข</button>
                                            <a href="del_emp.php?id_tc=<?= $id; ?>" class="btn btn-outline-danger btn-sm shadow lift" role="button" onclick="return confirm('ยืนยันการลบ???')"><i class='far fa-trash-alt'></i></a>
                                    </td>
                                </tr>
                                <!-- Modal edit -->
                                <div class="modal fade" id="edit<?=$row[0];?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabelz" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelz">แก้ไขข้อมูลอะไหล่</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action=edit-emp.php?id_tc=<?=$row[0];?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <?php 
                                                        $sql_edit = "SELECT * FROM technician WHERE id_tc = '".$row[0]."'";
                                                        $result_edit = mysqli_query($mysqli,$sql_edit);
                                                        $edit = mysqli_fetch_array($result_edit);
                                                    ?>
                                                    <div class="row gx-4 md-4">
                                                        <div class="col-md-6">
                                                            <label for="">ชื่อ:</label>
                                                            <input class="form-control" type="text" name="name"
                                                                value="<?=$edit['tc_name'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-4 md-4">
                                                        <div class="col-md-4">
                                                            <label for="">ที่อยู่:</label>
                                                            <input class="form-control" type="text" name="add"
                                                                value="<?=$edit['tc_address'];?>" placeholder="0.00"
                                                                required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">เบอร์ติดต่อ:</label>
                                                            <input class="form-control" type="text" name="tel"
                                                                value="<?=$edit['tc_tel'];?>"  required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">แผนก:</label>
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
                                                            <input class="form-control" type="file" name="pic" id="pic"
                                                                >
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
                                <?php } ?>
                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลพนักงาน</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_emp.php" method="post" enctype="multipart/form-data">
                        <div class="row gx-4 md-4">
                            <div class="col-md-6">
                                <label for="">ชื่อ:</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                        </div>
                        <div class="row gx-4 md-4">
                            <div class="col-md-4">
                                <label for="">ที่อยู่:</label>
                                <input class="form-control" type="text" name="add" required>
                            </div>
                            <div class="col-md-4">
                                <label for="">เบอร์ติดต่อ:</label>
                                <input class="form-control" type="text" name="tel"  required>
                            </div>
                            <div class="col-md-4">
                                <label for="">แผนก:</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="1">ช่างเครื่องยนต์</option>
                                    <option value="2">ช่างไฟฟ้า</option>
                                    <option value="3">ช่างช่วงล่าง</option>
                                    <option value="4">ช่างการยาง</option>
                                    <option value="5">ช่วงตรวจสภาพ</option>
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
<?php include('footer.php'); 
?>