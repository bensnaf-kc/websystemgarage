### form page #####

              <div class="form-group">
                <label class="small" style="color: rgba(0,0,0,.72)">ชื่อผู้ใช้งาน </label>
                <input class="form-control" id="RegUser" type="text" name="username" placeholder="Username"/ onBlur="checkAvailability()">
                <div id="name_error"></div>
                              <span id="user-availability-status" style="color: #edc540"  ></span>

                 <script type="text/javascript">

function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "checkregis.php",
data:'userName='+$("#RegUser").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

############ php page  #########


  include('config.php');
  if(isset($_POST['userName']) && $_POST['userName']!="" && strlen($_POST['userName'])>=4) {
     if ($stmt = $con->prepare('SELECT Name FROM member WHERE Name = ?')) {
         $stmt->bind_param('s', $_POST['userName']);
         $stmt->execute();
         $stmt->store_result();
         $numRows = $stmt->num_rows;
         if ($numRows > 0) {
             echo "<span class=''> มีชื่อผู้ใช้นี้อยู่แล้ว</span>";
         } else {
             echo "<span class=''> สามารถใช้ชื่อนี้ได้</span>";
         }
     }
 }
