<!DOCTYPE html>
<html lang="en">
<?php session_start(); 

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
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <p></p>
                        <center>
                            <p class="">
                            <h1 style="color: white;">SYSTEM GARAGE MANAGEMENT</h1>
                            </p>
                        </center>
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Login</h3>
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
                                    <form class="was-validated" method="POST" action="login-check.php">
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputuser">Username / ชื่อผู้ใช้งาน</label>
                                            <input class="form-control is-invalid" id="inputuser" name="inputuser"
                                                type="text" placeholder="Enter Username" required />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Password /
                                                รหัสการใช้งาน</label>
                                            <input class="form-control" id="inputPassword" name="inputPassword"
                                                type="password" placeholder="Enter password" required />
                                        </div>
                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary shadow-lg lift"
                                                name="btn-login">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.php">คลิ๊กที่นี่เพื่อลงทะเบียนใช้งาน</a></div>
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
    <script src="js/scripts.js"></script>
    <script>
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
    Swal.fire({
        icon: 'error',
        title: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'
    })
    </script>
</body>

</html>