<?php
include '../../../../database/database.php';
include '../../../../function/function.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../../vendor/phpmailer/phpmailer/src/SMTP.php';

function sendEmail($email, $name, $title, $content)
{
  $mail = new PHPMailer((true));

  try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'phamducthinhbeo@gmail.com';
    $mail->Password = 'bqqdgfftqbsvkuaz';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->setFrom('phamducthinhbeo@gmail.com', 'AdminDF-php');
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $content;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    return true;
  } catch (Exception $e) {
    return false;
  }
}

$emailError = $email = "";
if (isset($_POST["forgotBtn"])) {
  if (empty($_POST['emailForgot'])) {
    $emailError = "Please enter email address";
  } else {
    $email = test_input($_POST['emailForgot']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email = "Email Malformed";
    }
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
    $user = $sql->fetch_assoc();
    if (mysqli_num_rows($sql) === 0) {
      $emailError = "Email does not exist";
    } else {
      $content = 'Verify Account' . '<br>' .
        'Click vào đây để đăng nhập <a href="http://' . $_SERVER['HTTP_HOST'] . '/adminDF-php/resource/view/pages/auth/resetPassword.php?email=' .  $email . '">Reset Password</a>'
        . '<br>' . 'Vui lòng thay đổi mật khẩu ngay lập tức khi đăng nhập';

      sendEmail($email, $user['firstname'], "Verify Account", $content);

      session_start();
      if ($_SESSION['user']) {
        unset($_SESSION['user']);
      };
      echo
      "<script>alert('Please check Email and verify to reset password'); window.location = 'forgotPassword.php';</script>";
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
  <title>Page Title - SB Admin</title>
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
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                </div>
                <div class="card-body">
                  <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your
                    password.</div>
                  <form method="POST">
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmailAddress">Email</label>
                      <input name="emailForgot" class="form-control py-4" id="inputEmailAddress" type="email"
                        aria-describedby="emailHelp" placeholder="Enter email address" />
                      <span class="error"><?php echo $emailError ?></span>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                      <a class="small" href="login.php">Return to login</a>
                      <button name="forgotBtn" class="btn btn-primary">Reset Password</button>
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