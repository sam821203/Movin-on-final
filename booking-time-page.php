<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php unset($_SESSION['cart']) ?>

<style>
    <?php require_once './css/booking-time-page.css' ?>
</style>

<?php if (isset($_GET['movie_id'])) { ?>
    <?php $sql = "SELECT `movie_bg`,`movie_bg418`FROM `movie` WHERE `movie_id` = {$_GET['movie_id']}";
    $arr = $pdo->query($sql)->fetchAll(); ?>
    <style>
        body {
            background-image: url('images/detail_page/bg_img/<?= $arr[0]['movie_bg'] ?>.jpg');
        }

        @media screen and (max-width:418px) {
            body {
                background-image: url('images/detail_page/bg_img/<?= $arr[0]['movie_bg418'] ?>.jpg');
            }
        }
    </style>
    <?php
    foreach ($arr as $objbg) {
    ?>

        <body>
            <!-- movinon-navbar -->
            <?php require_once './tpl/movinon-navbar.php' ?>

            <main>
                <!-- -----------movie selecting section----------- -->
                <section class="movie-selecting-section g-section-mb">
                    <div class="container">
                        <div class="row movie-info">

                            <div class="d-flex">
                                <?php
                                $sql = "SELECT `id`, `poster`, `ticket_poster`, `pg_rate_text`, `mName_TC` , `mName_EN`, `length`, `director_TC` FROM `movie` WHERE `movie_id` = {$_GET['movie_id']}";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $objM) {
                                ?>
                                    <div class="booking-time-poster">
                                        <div class="img-wrap">
                                            <img src="images/poster_images/<?= $objM['poster'] ?>.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="content">
                                        <div>
                                            <span class="pg-rate body2-r"><?= $objM['pg_rate_text'] ?></span>
                                        </div>
                                        <div>
                                            <span class="title-tc"><?= $objM['mName_TC'] ?></span>
                                        </div>
                                        <div>
                                            <span class="title-en"><?= $objM['mName_EN'] ?></span>
                                        </div>
                                        <div class="rating">
                                            <i class="fas fa-star "></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>

                                        <p><span class="movie-length"></span>片長：<span class="length-data"><?= $objM['length'] ?>分鐘</span></p>
                                        <p><span class="movie-director"></span>導演：<span class="director-data"><?= $objM['director_TC'] ?></span></p>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row movie-date">
                            <div class="col-12 mb-3">
                                <i class="far fa-calendar-check"></i>
                                <span class="sub-title-r" id="abc">日期</span>
                            </div>
                            <div class="col-12">
                                <div class="x d-flex">
                                    <?php if (isset($_GET['movie_id'])) { ?>
                                        <div class="x d-flex">
                                            <?php
                                            $sql = "SELECT *
                                FROM `date`";

                                            $arr1 = $pdo->query($sql)->fetchAll();
                                            foreach ($arr1 as $obj1) {
                                                $strStyleDate = "";
                                                if ($_GET['sub_date_id'] == $obj1['date_id']) {
                                                    $strStyleDate =  "style='border:1px solid #F53D3D ; opacity:1 ; box-shadow:0 0 16px 4px rgba(245, 61, 61, 0.25)'";
                                                }
                                            ?>
                                                <a href="booking-time-page.php?movie_id=<?= $_GET['movie_id'] ?>&sub_date_id=<?= $obj1['date_id'] ?>&sub_division_id=<?= $_GET['sub_division_id'] ?>#abc" class="sel">
                                                    <div class="day selected" <?= $strStyleDate ?>>
                                                        <span>星期<?= $obj1['week'] ?></span>
                                                        <span class="sub-title-r">1月</span>
                                                        <span class="roboto-condensed"><?= $obj1['date'] ?></span>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row movie-division">
                            <div class="col-12 mb-3">
                                <i class="fas fa-city"></i>
                                <span class="sub-title-r" id="abc">城市</span>
                            </div>
                            <div class="col-12">
                                <?php if (isset($_GET['sub_date_id'])) { ?>
                                    <div class="divisions">
                                        <?php
                                        $sql = "SELECT `division_id`,`division`
                            FROM `division` 
                            ";
                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj2) {
                                            $strStyleDiv = "";
                                            if ($_GET['sub_division_id'] == $obj2['division_id']) {
                                                $strStyleDiv =  "style='border:1px solid #F53D3D ; opacity:1 ; box-shadow:0 0 16px 4px rgba(245, 61, 61, 0.25)'";
                                            }
                                        ?>
                                            <a href="booking-time-page.php?movie_id=<?= $_GET['movie_id'] ?>&sub_date_id=<?= $_GET['sub_date_id'] ?>&sub_division_id=<?= $obj2['division_id'] ?>#abc" class="division" id="divisiondv1">
                                                <span class="division selected div-sel" <?= $strStyleDiv ?>><?= $obj2['division'] ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                </section>

                <!-- -----------movie showtime section----------- -->
                <section class="movie-showtime-section g-section-mb">
                    <div class="container">
                        <div class="row subtitle">
                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex">
                                    <div class="red-line my-auto"></div>
                                    <span class="section-header-b">場次時間表</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 my-auto">
                                <div class="seat-left-info">
                                    <!-- <span>座位狀態：</span>
                                <span class="dot green-dot my-auto">充足</span>
                                <span class="dot yellow-dot my-auto">緊張 (低於40%)</span>
                                <span class="dot red-dot my-auto">告急 (低於5%)</span> -->

                                    <!-- 問題：如何 overflow?  -->
                                    <div>座位狀態：</div>
                                    <div class="dot green-dot my-auto"></div><span>充足</span>
                                    <div class="dot yellow-dot my-auto"></div><span>緊張 (低於40%)</span>
                                    <div class="dot red-dot my-auto"></div><span>告急 (低於5%)</span>
                                </div>
                            </div>
                        </div>
                        <!-- 第一家電影院 -->
                        <?php if (
                            isset($_GET['sub_division_id'])
                        ) { ?>
                            <?php $sql = "SELECT `cinema_name`,`screen`,`showtime`,`seat`,`left_seat`,`date`,`division`
                            FROM `cinema` 
                            WHERE `division_id` = '$_GET[sub_division_id]'
                            AND `movie_id` = '$_GET[movie_id]'
                            AND `date_id` = '$_GET[sub_date_id]'
                             ";
                            $arr3 = $pdo->query($sql)->fetchAll();
                            // echo '<pre>';
                            // print_r($arr3);
                            // echo '</pre>';
                            foreach ($arr3 as $obj) {
                                // echo '<pre>';
                                // print_r($obj);
                                // echo '</pre>';
                                $arrNew[$obj['cinema_name']][] = $obj['showtime'];
                                $arrData[$obj['cinema_name'] . $obj['showtime']] = $obj['left_seat'];
                                $arrDataSeat[$obj['cinema_name'] . $obj['showtime']] = $obj['seat'];
                            } ?>
                            <?php foreach ($arrNew as $hall => $time) { ?>

                                <div class="row timetable">
                                    <div class="col-12">
                                        <div class="timetable-row">
                                            <div class="cinema-name sub-title-r"><?= $hall ?></div>
                                            <div class="showtime-options-wrap">
                                                <div class="showtime-options">
                                                    <div class="movie-type">
                                                        <span class="digital"><?= $arr3[0]['screen'] ?></span>
                                                    </div>
                                                    <div class="options d-flex flex-wrap">
                                                        <!-- 第一個場次 -->
                                                        <?php foreach ($time as $stime) {
                                                            $round = round(($arrData[$hall . $stime] / $arrDataSeat[$hall . $stime]) * 100);
                                                        ?>
                                                            <a href="booking-seat-page.php?movie_id=<?= $_GET['movie_id'] ?>" data-movie-poster="<?= $objM['poster'] ?>" data-movieTC="<?= $objM['mName_TC'] ?>" data-movieEN="<?= $objM['mName_EN'] ?>" data-date="1月<?= $obj['date'] ?>" data-division="<?= $obj['division'] ?>" data-moviecat="<?= $arr3[0]['screen'] ?>" data-showtime="<?= $stime ?>" data-cinema="<?= $hall ?>" data-ticket-poster="<?= $objM['ticket_poster'] ?>" data-pg-rate="<?= $objM['pg_rate_text'] ?>" data-length="<?= $objM['length'] ?>" data-director="<?= $objM['director_TC'] ?>" id="showdetail">
                                                                <div class="showtime d-flex">
                                                                    <div class="dot green-dot my-auto mr-2" data-seat-percent="<?= $round ?>"></div>
                                                                    <span class="body1-r"><?= $stime ?></span>
                                                                </div>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divide-line"></div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>
            </main>

            <?php require_once './tpl/movinon-footer.php' ?>

            <?php require_once './tpl/foot.php' ?>

            <script>
                // left seat light                                                
                $(document).ready(function(event) {
                    // event.preventDefault();
                    // console.log(seatPercent);

                    // ----------分級判斷--------
                    let pgRate = $('.pg-rate');
                    let pgRateText = $('.pg-rate').text();
                    let green = '普遍級';
                    let blue = '保護級';
                    let yellow = '輔導級';
                    let red = '限制級';
                    pgRate.each((i, v) => {
                        if ($(v).text() == green) {
                            pgRate.eq(i).addClass('green');
                        } else if ($(v).text() == blue) {
                            pgRate.eq(i).addClass('blue');
                        } else if ($(v).text() == yellow) {
                            pgRate.eq(i).addClass('yellow');
                        } else if ($(v).text() == red) {
                            pgRate.eq(i).addClass('red');
                        };
                    });

                    $('div.dot').each((i, v) => {
                        let dotSeat = parseInt($('div.dot').eq(i).attr('data-seat-percent'));
                        // console.log(dotSeat);

                        if (5 < dotSeat && dotSeat < 40) {
                            $('div.dot').eq(i).addClass('yellow-dot');
                        } else if (dotSeat < 5) {
                            $('div.dot').eq(i).addClass('red-dot');
                        } else {
                            $('div.dot').eq(i).addClass('green-dot');
                        }
                    });
                });

                // carry data to next page
                $('a#showdetail').click(function(event) {
                    // event.preventDefault();
                    //取得 button 的 jQuery 物件
                    let btn = $(this);
                    // console.log('hi');

                    //送出 post 請求，加入細節
                    let objShowdetail = {
                        movie_TC: btn.attr('data-movieTC'),
                        movie_EN: btn.attr('data-movieEN'),
                        movie_poster: btn.attr('data-movie-poster'),
                        movie_date: btn.attr('data-date'),
                        division: btn.attr('data-division'),
                        movie_cat: btn.attr('data-moviecat'),
                        showtime: btn.attr('data-showtime'),
                        cinema: btn.attr('data-cinema'),
                        ticket_poster: btn.attr('data-ticket-poster'),
                        pg_rate: btn.attr('data-pg-rate'),
                        length: btn.attr('data-length'),
                        director: btn.attr('data-director'),
                    };
                    $.post('setCart.php', objShowdetail, function(obj) {
                        if (obj['success']) {
                            alert(`您選擇的時刻為:` + objShowdetail['showtime']);
                        }
                        // console.log(obj);
                    }, 'json');
                });
            </script>
        </body>
<?php }
} ?>

</html>