<?php require_once './db.inc.php' ?>
<?php require_once './tpl/head.php' ?>
<?php session_start() ?>
<?php require_once 'phpqrcode.php' ?>

<style>
    .payment-success {
        margin-top: 200px;
        font-size: 34px;
        font-weight: 500;
    }
</style>

<?php
//如果這個階段沒有購物車，就將頁面轉到商品確認頁
if (!isset($_SESSION['seat'])) {
    header("Location: new-booking-time-page.php");
    exit();
}

//將表單資訊寫入 session，之後建立訂單時，一起變成訂單資訊
foreach ($_SESSION['seat'] as $key => $obj) {
    $_SESSION['form'] = [];
    $_SESSION['form']['ticket_poster'] = $obj['ticket_poster'];
    $_SESSION['form']['movie_TC'] = $obj['movie_TC'];
    $_SESSION['form']['movie_EN'] = $obj['movie_EN'];
    $_SESSION['form']['pg_rate'] = $obj['pg_rate'];
    $_SESSION['form']['count'] = $obj['seatTotal'];
    $_SESSION['form']['total'] = $obj['payTotal'] + 20;
};
$_SESSION['form']['payment_type'] = $_POST['payment_type'];
$_SESSION['form']['payment_name'] = $_POST['payment_name'];



$card_number = $_POST['card_number_1'] . $_POST['card_number_2'] . $_POST['card_number_3'] . $_POST['card_number_4'];
$card_valid_date = $_POST['expire-date'];
$card_ccv = $_POST['ccv-code'];
$card_holder = $_POST['holder_name'];


$sql = "INSERT INTO `orders_pay`( `email`, `ticket_poster`, `movie_TC`, `movie_EN`, `pg_rate`,`invoice_type`, `invoice_name`, `card_number`, `card_valid_date`, `card_ccv`, `card_holder`, `count`, `total`) 
VALUES ('{$_SESSION['email']}','{$_SESSION['form']['ticket_poster']}','{$_SESSION['form']['movie_TC']}','{$_SESSION['form']['movie_EN']}','{$_SESSION['form']['pg_rate']}',
'{$_POST['payment_type']}','{$_POST['payment_name']}','$card_number','$card_valid_date','$card_ccv','$card_holder',
'{$_SESSION['form']['count']}','{$_SESSION['form']['total']}')";
$stmt = $pdo->query($sql);
//取得新增資料時的自動編號
$lastInsertId = $pdo->lastInsertId();

//建立訂單編號
$order_id_parent = date("Ymd") . sprintf("%05d", $lastInsertId);

if ($stmt->rowCount() > 0) {


    //將訂單編號更新回 orders 資料表
    $sqlUpdate = "UPDATE `orders_pay` SET `order_id_parent` = '{$order_id_parent}' WHERE `id` = {$lastInsertId}";
    $pdo->query($sqlUpdate);
};

foreach ($_SESSION['seat'] as $key => $obj) {
    foreach ($obj['seatName'] as $objSeatName) {
        $sql = "INSERT INTO `orders`( `email`,`ticket_poster`,`movie_TC`, `movie_EN`, `pg_rate`, `cinema`, `seat`, `date`, `showtime`, `screen`)
                VALUES ('{$_SESSION['email']}','{$obj['ticket_poster']}','{$obj['movie_TC']}','{$obj['movie_EN']}','{$obj['pg_rate']}',
                '{$obj['cinema']}','{$objSeatName}','{$obj['movie_date']}',
                '{$obj['showtime']}','{$obj['movie_cat']}')";

        $stmt = $pdo->query($sql);

        /**
         * 若訂單成立，則取得新增資料的 ID (Auto Increment)
         * 透過 ID 來建立訂單資料表的訂單編號 (order_id)
         */

        if ($stmt->rowCount() > 0) {
            //取得新增資料時的自動編號
            $lastInsertId = $pdo->lastInsertId();

            //建立訂單編號
            $order_id = sprintf("%05d", $lastInsertId);



            //將訂單編號更新回 orders 資料表

            $value = sha1($objSeatName); //二維碼內容 
            $errorCorrectionLevel = 'L'; //容錯級別 
            $matrixPointSize = 5; //生成圖片大小 
            QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
            $QR = 'qrcode.png'; //已經生成的原始二維碼圖 
            $QR = imagecreatefromstring(file_get_contents($QR));
            imagepng($QR, $value . '.png');
            $sqlUpdateQr = "UPDATE `orders` SET `order_id_parent` = '{$order_id_parent}',`order_id` = '{$order_id}',`qrcode` = '{$value}.png' WHERE `id` = {$lastInsertId}";
            $pdo->query($sqlUpdateQr);
        }

        //刪除購物車 和 表單資訊
        unset($_SESSION['cart'], $_SESSION['seat'], $_SESSION['form']);
    }
}
?>

<body>
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <div class="g-section-mb d-flex flex-column justify-content-center">
            <div class="payment-success text-center mb-5">付款成功！</div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn-white-outline mr-2">
                    <a href="main-page.php">
                        <div class="d-flex align-items-center">
                            <span>返回首頁</span>
                        </div>
                    </a>
                </button>

                <button type="button" class="btn-brand ml-2">
                <?php if (isset($_SESSION['name'])) { ?>

                    <a href="member-center-page.php">
                        <div class="d-flex align-items-center">
                            <span>我的票夾</span>
                        </div>
                    </a>
                <?php } ?>
                </button>
            </div>
        </div>
    </main>

    <?php require_once './tpl/movinon-footer.php' ?>

    <?php require_once './tpl/foot.php' ?>
</body>