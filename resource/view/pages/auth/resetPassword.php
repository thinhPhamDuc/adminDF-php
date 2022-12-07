<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$passwordError = "";
if (isset($_POST['resetPassword'])) {
  $email = $_GET['email'];
  $newPassword = test_input($_POST['newPassword']);
  $confirmPassword = test_input($_POST['confirmPassword']);
  $passwordOk = 1;
  if (!($newPassword) || !($confirmPassword)) {
    $passwordError = 'Please enter your password';
    $passwordOk = 0;
  }
  if ($newPassword !== $confirmPassword) {
    $passwordError = 'New Password Mismatched';
    $passwordOk = 0;
  }
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[0-9a-zA-Z\d]{8,}$/", $newPassword)) {
    $passwordError = 'Mật khẩu không hợp lệ! (ít nhất 8 ký tự, có số, chữ hoa, chữ thường)';
    $passwordOk = 0;
  }

  if ($passwordOk !== 0) {
    $newPassword = md5($newPassword);
    $sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email' ";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Password Updated!'); window.location='login.php'; </script>";
    } else {
      echo "Error Insert: " . $sql . "<br>" . $conn->error;
    }
  }
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
  <title>Reset Password - Dashboard Admin</title>
  <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>

    <!-- Custom styles for this template-->
    <link href="../../../../public/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg my-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Reset Password</h3>
                </div>
                <div class="card-body">
                  <div class="small mb-3 text-muted">Enter your new password.</div>
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="">New Password :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-lock-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" aria-describedby="basic-addon1" type="password" name="newPassword"
                          id="newPassword">
                        <span class="error w-100"><?php echo $passwordError ?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Confirm Password :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-key-skeleton"></i></span>
                        </div>
                        <input class="form-control" aria-describedby="basic-addon1" type="password"
                          name="confirmPassword" id="confirmPassword">
                        <span class="error w-100"><?php echo $passwordError ?></span>
                      </div>
                    </div>
                    <div class="form-group text-right">
                      <button class="btn btn-primary " name="resetPassword">Reset Password</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center">
                  <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
<!-- Bootstrap core JavaScript-->
<script src="../../../../public/backend/assets/js/jquery.min.js"></script>
    <script src="../../../../public/backend/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../public/backend/assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../../public/backend/assets/js/sb-admin-2.min.js"></script>
</body>

</html>