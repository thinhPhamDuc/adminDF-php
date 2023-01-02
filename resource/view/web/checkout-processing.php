<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../vendor/phpmailer/phpmailer/src/SMTP.php';
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

$externalId = '#' . rand(1000, 9999);
$total = $_SESSION['total'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date('Y-m-d H:i:s');
$deleted_at = null;
$infoMail = '';

if ($externalId !== "" && $total !== "") {
    $sql = "INSERT INTO orders (external_id, created_at, deleted_at, total) VALUES ('$externalId', '$time', '$deleted_at','$total')";
    $sql1 = '';
    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        $orderId = $conn->insert_id;
        $value = '';
        $valueInventory = '';
        $valueStock = '';
        $count = count($_SESSION['cart']) - 1;
        foreach ($_SESSION['cart'] as $key => $orderItem) {
            $productName = $orderItem['name'];            
            $product_id = $orderItem['product_id'];
            $itemPrice = $orderItem['price'];
            $stock = $orderItem['stock'];
            $total = $orderItem['total'];
            $client_id = $_SESSION['client']['id'];
            $value .= "('$orderId','$product_id' ,'$stock','$total','$client_id',$itemPrice),";
            $valueInventory .= "$product_id,";
            $valueStock .= $stock . ',';
            $infoMail .= 'Sản phẩm ' . $productName . ' có số lượng' . $stock . ' có tổng' . $total . ',';  
        }
        $content = 'Chúc mừng bạn đã thanh toán thành công<br>
                Tài khoản của bạn là :<br>
                username: ' . $_SESSION['client']['name'] . '<br>' . 'Tổng giá trị đơn hàng'. $_SESSION['total'] . $infoMail;
        sendEmail($_SESSION['client']['email'], $_SESSION['client']['name'], 'Thanh toán thành công!', $content);
        $newvalueStock = rtrim($valueStock, ",");
        $arraynewvalueStock = (explode(",", $newvalueStock));

        $newValue = rtrim($value, ",");
        $newValueInventory = rtrim($valueInventory, ",");
        $sql1 = "INSERT INTO order_item (order_id,product_id, stock,total,client_id,item_price) VALUES $newValue";
        $sql2 = "SELECT * FROM inventory WHERE product_id IN ($newValueInventory)";
        if ($conn->query($sql1) === TRUE) {
            $query = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($query) > 0) {
                $inventories = $query->fetch_all();
                foreach ($inventories as $key => $inventory) {
                    foreach ($arraynewvalueStock as $keyStock => $arrayStock) {
                        if ($key == $keyStock) {
                            if ($inventory[2] - $arrayStock <= 0) {
                                $sql3 = "UPDATE inventory SET stock = ($inventory[2]-$arrayStock)   WHERE product_id = '$inventory[5]'";
                                if ($conn->query($sql3) === true) {
                                    echo "Success";
                                } else {
                                    echo "Lỗi";
                                }
                            } else {
                                echo "<script>alert('Sản phẩm '. $inventory[1] .' hiện đã hết!');</script>";
                            }
                        }
                    }
                }
            }
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            echo "<script>alert('Hoàn tất thanh toán'); window.location='checkout-success.php';</script>";
        } else {
            echo 'aaaaaaa';
        }
    } else {
        echo "Error : " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<script>alert('Please Enter Information'); window.location='../main/manage-products.php';</script>";
}
