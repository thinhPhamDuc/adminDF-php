<?php
session_start();

if (isset($_SESSION['user'])) {
  header('Location: ../main/index.php');
}

if (isset($_POST['login'])) {
  include '../../../../database/database.php';
  include '../../../../function/function.php';
  $email = ($_POST['email']);
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password' && active = 1 ";
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) > 0) {
    $user = $query->fetch_assoc();

    $_SESSION['user'] = [
      'id' => $user['id'],
      'email' => $user['email']
    ];
    if (isset($_POST['remember_me'])) {
      setcookie('email', $email, time() + (3600 * 24 * 30));
      setcookie('password', $_POST["password"], time() + (3600 * 24 * 30));
    }
    header('Location: ../main/index.php');
  } else {
    echo '<script>alert("Invalid Email ID/Password");</script>';
  }
} else {
  $email = '';
  $password = '';
  if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDF_php|| Đăng nhập</title>
    <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../../public/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                name="email" value="<?php echo $email?>"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name="password" value="<?php echo $password?>"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                name="remeber">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgotPassword.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
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