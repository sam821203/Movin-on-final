<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<!-- <?php
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        ?> -->

<?php
//如果這個階段沒有購物車，就將頁面轉到商品確認頁
if (!isset($_SESSION['seat'])) {
    header("Location: booking-time-page.php");
    exit();
} ?>
<style>
    <?php require_once './css/payment-page.css' ?>
</style>

<body>
    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <section class="payment-section">
            <div class="container">
                <div class="row">
                    <div class="col-4 payment-section-l">
                        <div class="section-header-b g-subtitle-mb">票根明細</div>
                        <div class="body1-r"><i class="fas fa-info-circle"></i>&nbsp&nbsp請檢查票根明細，如顯示的資訊有物，<br>請洽客服中心尋求幫助，謝謝</div>

                        <div class="ticket-wrap">
                            <?php foreach ($_SESSION['seat'] as $key => $obj) {
                                $arrNew[] = $obj['seatName']; ?>
                                <?php foreach ($arrNew as $objSeat) { ?>
                                    <?php foreach ($objSeat as $objSeatName) {
                                        // echo"<pre>";
                                        // print_r($objSeatName);
                                        // echo"</pre>";
                                    ?>
                                        <div class="myticket">
                                            <div class="ticket-img-wrap">
                                                <img src="images/ticket_single.svg" alt="">
                                            </div>
                                            <div class="ticket-card">
                                                <div class="poster-img-wrap">
                                                    <img src="images/payment_page/<?= $obj['ticket_poster'] ?>.jpg" alt="">
                                                </div>
                                                <div class="content">

                                                    <p class="order-num">訂單編號：xxxxxxxxxxxxx</p>

                                                    <div class="content-row col-12 d-flex justify-content-between">
                                                        <div>
                                                            <div class="section-header-b"><?= $obj['movie_TC'] ?></div>
                                                            <div class="title-en"><?= $obj['movie_EN'] ?></div>
                                                        </div>
                                                        <div class="d-flex align-items-start">
                                                            <span class="pg-rate"><?= $obj['pg_rate'] ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="content-row">
                                                        <div class="mycinema">
                                                            <div class="body2-r">影城</div>
                                                            <div class="sub-title-b"><?= $obj['cinema'] ?></div>
                                                        </div>
                                                        <div class="myseat">
                                                            <div class="body2-r">座位</div>
                                                            <div class="sub-title-b"><?= $objSeatName ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="content-row">
                                                        <div>
                                                            <div class="body2-r">日期</div>
                                                            <div class="body2-b">2022年<?= $obj['movie_date'] ?></div>
                                                        </div>
                                                        <div>
                                                            <div class="body2-r">場次</div>
                                                            <div class="body2-b"><?= $obj['showtime'] ?></div>
                                                        </div>
                                                        <div>
                                                            <div class="body2-r">類型</div>
                                                            <div class="body2-b"><?= $obj['movie_cat'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="col-8 payment-section-r">
                        <?php foreach ($_SESSION['seat'] as $key => $obj) { ?>
                            <div class="payment-section-r-top">
                                <div class="section-header-b g-subtitle-mb">交易明細</div>
                                <div class="col-12 detail-head">
                                    <div class="col-6 detail-head-l d-flex justify-content-between">
                                        <div class="col-4 head1">票種</div>
                                        <div class="col-4 head2">價格</div>
                                        <div class="col-4 head3">數量</div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="detail-head-r">合計</div>
                                    </div>
                                </div>

                                <div class="col-12 detail-inline">
                                    <div class="col-6 detail-inline-l d-flex justify-content-between">
                                        <div class="col-4 ticket-type">全票</div>
                                        <div class="col-4 ticket-price">$ 230</div>
                                        <div class="col-4 ticket-quan"><?= $obj['seatTotal'] ?></div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="detail-inline-r total">$<?= $obj['payTotal'] ?></div>
                                    </div>
                                </div>
                                <div class="col-12 detail-fee">
                                    <div class="fee"><span class="body2-r">訂票手續費</span>$ 20</div>
                                </div>

                                <div class="col-12 detail-total">
                                    <div class="col-6 detail-total-l d-flex justify-content-between">
                                        <div class="body2-r">＊ 網路訂票每章需加收 NT$ 20 手續費</div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="detail-total-r total">$<?= $obj['payTotal'] + 20 ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="payment-section-r-bottom g-section-mb">
                            <form name="myForm" method="post" action="make-order.php">

                                <div>
                                    <div class="section-header-b g-subtitle-mb col-12">付款方式</div>

                                    <!-- 信用卡付款 -->
                                    <div class="credit-card">
                                        <div class="col-12 credit-card-subtitle">信用卡<span>請輸入卡號</span></div>
                                        <div class="card-number d-flex">
                                            <div class="col-3">
                                                <input type="text" placeholder="1234" name="card_number_1">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" placeholder="1234" name="card_number_2">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" placeholder="1234" name="card_number_3">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" placeholder="1234" name="card_number_4">
                                            </div>
                                        </div>

                                        <div class="card-holder">
                                            <div class="col-12 credit-card-subtitle">持卡者姓名<span>請輸入信用卡背後的姓名</span></div>
                                            <div class="col-12">
                                                <input type="text" placeholder="1234" name="holder_name">
                                            </div>
                                        </div>

                                        <div class="card-extra-info d-flex">
                                            <div class="col-6">
                                                <div class="credit-card-subtitle">到期年限</div>
                                                <div>
                                                    <input type="text" placeholder="00/00" name="expire-date">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="credit-card-subtitle ccv-code">CCV code</div>
                                                <div>
                                                    <input type="text" placeholder="123" name="ccv-code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 電子發票 -->
                                <div class="e-invoice">
                                    <div class="section-header-b g-subtitle-mb col-12">電子發票</div>
                                    <div class="e-invoice-select d-flex justify-content-between">

                                        <div class="e-invoice-group1 form-group d-flex">
                                            <select class="form-control custom-select" id="exampleFormControlSelect1" name="payment_type">
                                                <option value="捐贈">捐贈</option>
                                                <option value="寄送">寄送</option>
                                            </select>
                                        </div>
                                        <div class="e-invoice-group2 form-group">
                                            <select class="form-control custom-select" id="exampleFormControlSelect1" name="payment_name">
                                                <option value="創世基金會">創世基金會</option>
                                                <option value="公益協會">公益協會</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- 同意條款 -->
                                <div class="agreement-check d-flex justify-content-between">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            我已同意<span class="agreement-alert">購票規定事項</span><i class="fas fa-info-circle"></i>
                                        </label>
                                    </div>

                                    <button type="submit" class="btn-area" id="pay">
                                        <div class="btn">
                                            <span class="sub-title-b">結帳</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once './tpl/movinon-footer.php' ?>

    <?php require_once './tpl/foot.php' ?>

    <script>
        $('#pay').on('click', function(event) {
            if (!$('.form-check-input').is(':checked')) {

                event.preventDefault();

                alert('請勾選同意購票規定');
            }
        });
    </script>

</body>

</html>