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
                                ข้อมูลอะไหล่
                            </h1>
                            <div class="page-header-subtitle">
                                อะไหล่ที่อยู่ในอู่หรือศูนย์บริการ</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">รายละเอียดข้อมูลอะไหล่ <button class="btn btn-outline-warning shadow-lg lift"
                        type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่มอะไหล่</button></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสอะไหล่</th>
                                    <th>ชื่อ</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ประเถท</th>
                                    <th>รูปภาพ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสอะไหล่</th>
                                    <th>ชื่อ</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ประเถท</th>
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
                                    <td><?=$row['s_name'];?></td>
                                    <td><?=$row['s_price'];?></td>
                                    <td><?=$row['s_amount'];?></td>
                                    <td>
                                        <?php 
                                            if($row['s_type'] == 1){
                                                echo "<label class='text-red'>เครื่องยนต์</label>";
                                            }elseif ($row['s_type'] == 2) {
                                                echo "<label class='text-blue'>ช่าวงล่าง</label>";
                                            }elseif ($row['s_type'] == 3){
                                                echo "<label class='text-warning'>ตัวถัง</label>";
                                            }elseif ($row['s_type'] == 4){
                                                echo "<label class='text-primary'>ล้อ</label>";
                                            }elseif ($row['s_type'] == 5){
                                                echo "<label class='text-teal'>อื่นๆ</label>";
                                            }
                                        ?>
                                    </td>
                                    <td><img src="assets/img/product/<?=$row['s_pic'];?>" alt="" width="50px"
                                            height="50px"></td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-warning shadow lift btn-sm" type="button"
                                            data-bs-toggle="modal" data-bs-target="#edit<?=$row[0];?>">แก้ไข</button>
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
                                                <form action="edit_store.php?store_id=<?=$row[0];?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <?php 
                                                        $sql_edit = "SELECT * FROM store WHERE store_id = '".$row[0]."'";
                                                        $result_edit = mysqli_query($mysqli,$sql_edit);
                                                        $edit = mysqli_fetch_array($result_edit);
                                                    ?>
                                                    <div class="row gx-4 md-4">
                                                        <div class="col-md-6">
                                                            <label for="">ชื่อ:</label>
                                                            <input class="form-control" type="text" name="name"
                                                                value="<?=$edit['s_name'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-4 md-4">
                                                        <div class="col-md-4">
                                                            <label for="">ราคา:</label>
                                                            <input class="form-control" type="number" name="price"
                                                                value="<?=$edit['s_price'];?>" placeholder="0.00"
                                                                required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">จำนวน:</label>
                                                            <input class="form-control" type="number" name="amo"
                                                                value="<?=$edit['s_amount'];?>" value="1" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ประเภท:</label>
                                                            <select class="form-control" name="type" id="type" required>
                                                                <option value="<?=$edit['s_amount'];?>">
                                                                    <?=$edit['s_amount'];?></option>
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
                                                                required>
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