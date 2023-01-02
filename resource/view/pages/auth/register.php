<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../../vendor/phpmailer/phpmailer/src/SMTP.php';

function sendEmail($email, $name, $title, $content)
{
  $mail = new PHPMailer(true);
  try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'phamducthinhbeo@gmail.com';
    $mail->Password = 'iccghlkeustsrqfy';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('phamducthinhbeo@gmail.com', 'Web Admin');

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

$firstnameError = $lastnameError = $emailError = $passwordError = $confirmError = $textError = "";
$firstname = $lastname = $email = $password = $confirm = "";
if (isset($_POST["register"])) {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  $confirm = test_input($_POST["confirm"]);
  if ($firstname === "" || $lastname === "" || $email === "" || $password === "" || $confirm === "") {
    $textError = "Please enter information";
  } else {
    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $check = mysqli_query($conn, $sql);
    if (mysqli_num_rows($check) > 0) {
      $emailError = "Account already exists";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Email is not a valid";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[0-9a-zA-Z\d]{8,}$/", $password)) {
      $passwordError = "Mật khẩu phải có 8 kí tự và chạy từ a-z, A-Z, 0-9";
    } else {
      if ($password === $confirm) {
        $password = md5($password);
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (firstname, lastname, email, password, created_at, role_id) VALUES ('$firstname', '$lastname', '$email', '$password', '$time', 3)";
        if ($conn->query($sql) === TRUE) {
          $content = 'Chúc mừng bạn đã đăng ký tài khoản thành công<br>
                Tài khoản của bạn là :<br>
                username: ' . $email . '<br>' .
            'password: ' . $password . '<br>' .
            'Click vào đây để kích hoạt tài khoản <a href="http://' . $_SERVER['HTTP_HOST'] . '/adminDF-php/resource/view/pages/auth/activeAccount.php?email=' . $email . '&time=' . $time . '">Kích hoạt tài khoản</a>';

          //  Gửi email thông báo tạo tài khoảng thành công
          sendEmail($email, $firstname, 'Đăng ký tài khoản thành công!', $content);
          echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
        } else {
          echo "Error Insert: " . $sql . "<br>" . $conn->error;
        }
      } else {
        $passwordError = "Password Error";
      }
    }
  }
}
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdminDF_php|| Đăng kí</title>
    <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>

    <!-- Custom styles for this template-->
    <link href="../../../../public/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $firstname ?>" name="firstname"
                                            placeholder="First Name">
                                            <span class="error"><?php echo $textError; ?></span>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="lastname" value="<?php echo $lastname ?>"
                                            placeholder="Last Name">
                                            <span class="error"><?php echo $textError; ?></span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    value="<?php echo $email ?>"
                                        placeholder="Email Address" name="email">
                                        <span class="error"><?php echo $textError; ?></span>
                                        <span class="error"><?php echo $emailError; ?></span>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                            <span class="error"><?php echo $textError; ?></span>
                                            <span class="error"><?php echo $passwordError; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="confirm">
                                            <span class="error"><?php echo $textError; ?></span>
                                            <span class="error"><?php echo $passwordError; ?></span>
                                    </div>
                                </div>
                                <button name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../../public/backend/assets/js/jquery.min.js"></script>
    <script src="../../../../public/backend/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../public/backend/assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../../public/backend/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
