<!DOCTYPE html>
<html lang="en">
<?php session_start();
include('process.php');
?>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>System Garage Management</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
  <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
  </script>
  <style>
    div.a {
      font-size: 12px;
      color: #7B113A;
      color: rgba(0, 0, 0, 0.5);
    }
    .form_error span {
      width: 80%;
      height: 35px;
      margin: 3px 10%;
      font-size: 1.1rem;
      color: #7B113A;
    }

    .form_error input {
      border: 1px solid #7B113A;
    }

    .form_success span {
      width: 80%;
      height: 35px;
      margin: 3px 10%;
      font-size: 1.1rem;
      color: green;
    }

    .form_success input {
      border: 1px solid green;
    }

    #error_msg {
      color: red;
      text-align: center;
      margin: 10px auto;
    }

  </style>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container-xl px-4">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <!-- Basic registration form-->
              <div class="card shadow-lg border-0 rounded-lg mt-3">
                <div class="card-header justify-content-center">
                  <h3 class="fw-bold my-4 text-blue ">ลงทะเบียนผู้ใช้อู่/ศูนย์บริการ</h3>
                  <?php if (isset($_SESSION['error_register'])) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert" align="center">
                      <h6>
                        <?php
                        echo $_SESSION['error_register'];
                        unset($_SESSION['error_register']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </h6>
                    </div>
                  <?php endif ?>
                </div>
                <div class="card-body">
                  <!-- Registration form-->
                  <form class="was-validated">
                    <!-- One "tab" for each step in the form: -->
                    <div  class="mb-3">
                    <label class="fs-2 mb-1 text-black" for="infname">ชื่อผู้ใช้งาน:</label>
                      <input class="form-control" id="RegUser" type="text" name="username" placeholder="Username"/ onBlur="checkAvailability()">
                      <div id="name_error"></div>
                                    <span id="user-availability-status" style="color: #edc540"  ></span>
                      <div class="a">
                                            เช่น "บริษัท รุ่งเรืองการช่าง จำกัด"
                                            ชื่อนี้จะถูกพิมพ์ในหัวเอกสารต่างๆ เช่น ใบแจ้งหนี้
                                            ใบเสร็จรับเงิน
                                        </div>
                    </div>
                    <div  class="mb-3">
                      <label class="fs-2 mb-1 text-black" for="infname">รหัสผ่าน:</label>
                      <input type="text" name="password" placeholder="Password" id="password" class="form-control is-invalid">
                    </div>
                    <div >
                      <button type="button" class="btn" name="register" id="reg_btn">bb</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center">
                  <div class="fs-3"><a href="login.php">คลิ๊กที่นี่หากคุณมีบัญชีผู้ใช้แล้ว
                      กรุณาเข้าสู่ระบบ</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="footer-admin mt-auto footer-dark">
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
  <script src="js/scripts.js"></script>
  <script type="text/javascript">

  function checkAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "process.php",
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
  <script>
    function autoTab(obj) {
      /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
      หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
      4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
      รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
      หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
      ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
      */
      var pattern = new String("___-___-____"); // กำหนดรูปแบบในนี้
      var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText = new String("");
      var obj_l = obj.value.length;
      var obj_l2 = obj_l - 1;
      for (i = 0; i < pattern.length; i++) {
        if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
          returnText += obj.value + pattern_ex;
          obj.value = returnText;
        }
      }
      if (obj_l >= pattern.length) {
        obj.value = obj.value.substr(0, pattern.length);
      }
    }

    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')

    function alert(message, type) {
      var wrapper = document.createElement('div')
      wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

      alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
      alertTrigger.addEventListener('click', function() {
        alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาใส่อีกครั้ง!', 'error')
      })
    }
  </script>
  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>
  <script>
    var password = document.getElementById("password"),
      confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
</body>

</html>
