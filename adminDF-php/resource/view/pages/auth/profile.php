<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user'])) {
    header('Location:  ../auth/login.php');
}

include '../../../../database/database.php';
include '../../../../function/function.php';
$sql = "SELECT * FROM employees WHERE status = '1' ";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>AdminDF_php||Tài khoản</title>
    <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Custom styles for this template-->
    <link href="../../../../public/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include '../../partial/sideBar.php'; ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <?php include '../../partial/topBar.php'; ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="profile__user">
                                    <div class="profile__user-inner">
                                        <div class="inner__image">
                                            <img src="<?php
                                                        if ($user['images']) {
                                                            echo $user['images'];
                                                        } else {
                                                            echo '../../../../public/backend/assets/images/defaultImages.png';
                                                        }
                                                        ?>" alt="avatar" style="width: 100px; height:100px">
                                        </div>
                                        <div class="inner__title">
                                            <a href="#" class="inner__title-name">
                                                <?php
                                                echo $user['lastname'] . " " . $user['firstname'];
                                                ?>
                                            </a>
                                            <div class="inner__title-role">Admin</div>
                                        </div>
                                    </div>
                                    <ul class="profile__user-list">
                                        <li class="list__item">
                                            <span>Email:</span>
                                            <a href="#" class="list__item-link">
                                                <?php
                                                echo $user['email'];
                                                ?>
                                            </a>
                                        </li>
                                        <li class="list__item">
                                            <span>Phone Number:</span>
                                            <a href="#" class="list__item-link"><?php
                                                                                if ($user['phone']) {
                                                                                    echo $user['phone'];
                                                                                } else {
                                                                                    echo '0329060633';
                                                                                }
                                                                                ?></a>
                                        </li>
                                        <li class="list__item">
                                            <span>Address:</span>
                                            <a href="#" class="list__item-link"><?php
                                                                                if ($user['address']) {
                                                                                    echo $user['address'];
                                                                                } else {
                                                                                    echo 'Hà Nội';
                                                                                }
                                                                                ?></a>
                                        </li>
                                    </ul>
                                    <div class="profile__user-button">
                                        <a class="button__link button-info active">
                                            <span class="button__link-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <span class="button__link-desc">Basic Profile</span>
                                        </a>
                                        <a class="button__link button-pass">
                                            <span class="button__link-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000"></path>
                                                        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <span class="button__link-desc">Change Password</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="profile__info fade show active">
                                    <h3>Basic Profile</h3>
                                    <div class="profile__form">
                                        <form action="../user/editProfile.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" name="userId_pro" id="userId_pro" value="<?php echo $_SESSION['user']['id'] ?>">
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="">Avatar :</label>
                                                <div class="profile__form-avatar">
                                                    <img id="avatar_pro" src="<?php
                                                                                if ($user['images']) {
                                                                                    echo $user['images'];
                                                                                } else {
                                                                                    echo '../../../../public/backend/assets/images/defaultImages.png';
                                                                                }
                                                                                ?>" alt="avatar" style="border-radius: 5px;" width="120" height="120">
                                                    <label for="fileProduct" class="form__label">
                                                            <input type="file" style="color:transparent;;" name="fileProduct" id="fileProfile">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">First Name :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-user-secret"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" value="<?php echo $user['firstname']; ?>" aria-describedby="basic-addon1" type="text" name="firstname_pro" id="firstname_pro">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Last Name :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-user-secret"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" value="<?php echo $user['lastname']; ?>" aria-describedby="basic-addon1" type="text" name="lastname_pro" id="lastname_pro">
                                                </div>
                                                <label for="">Phone :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-user-secret"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" value="<?php echo $user['phone']; ?>" aria-describedby="basic-addon1" type="text" name="phone_pro" id="phone_pro">
                                                </div>
                                            </div>
                                            <label for="">Address :</label>
                                            <div class="profile__form-input input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fas fa-user-secret"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" value="<?php echo $user['address']; ?>" aria-describedby="basic-addon1" type="text" name="address_pro" id="address_pro">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input class="form-control" value="<?php echo $user['email'] ?>" aria-describedby="basic-addon1" type="email" name="email_pro" id="email_pro">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" name="editUser">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="profile__pass">
                                    <h3>Change Password</h3>
                                    <div class="profile__form">
                                        <form action="../user/changePassword.php" method="POST">
                                            <div class="form-group">
                                                <label for="">Recent Password :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-unlock-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" aria-describedby="basic-addon1" type="password" name="recentPass_pro" id="recentPass_pro">
                                                    <span class="input__forgot"><a href="forgotPassword.php">Forgot Password?</a></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">New Password :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-unlock-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" aria-describedby="basic-addon1" type="password" name="newPass_pro" id="newPass_pro">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm Password :</label>
                                                <div class="profile__form-input input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-unlock-alt"></i></span>
                                                    </div>
                                                    <input class="form-control" aria-describedby="basic-addon1" type="password" name="confirmPass_pro" id="confirmPass_pro">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" name="changePassword">Change Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <?php include '../../partial/footer.php'; ?>


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->



        <!-- Bootstrap core JavaScript-->
        <script src="../../../../public/backend/assets/js/jquery.min.js"></script>
        <script src="../../../../public/backend/assets/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../../../public/backend/assets/js/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../../../public/backend/assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../../../public/backend/assets/js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../../../public/backend/assets/js/chart-area-demo.js"></script>
        <script src="../../../../public/backend/assets/js/chart-pie-demo.js"></script>
        <script src="../../../../public/backend/assets/js/main.js"></script>
    </body>
</body>

</html>