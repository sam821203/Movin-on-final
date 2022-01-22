<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php'; ?>
<?php session_start(); ?>
<?php unset($_SESSION['seat'])?>

<style>
    <?php require_once './css/jquery.seat-charts.css' ?><?php require_once './css/booking-seat-page.css' ?>
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
            <script type="text/javascript">
                // <!--google_ad_client = "ca-pub-2783044520727903";
                // /* jQuery_demo */
                // google_ad_slot = "2780937993";
                // google_ad_width = 728;
                // google_ad_height = 90;
                //-->
            </script>
            <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>


            <?php
            $count = 0;
            $total = 0;

            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                <main>
                    <div class="movie-info-section">
                        <div class="container">
                            <div class="row movie-info">
                                <?php foreach ($_SESSION['cart'] as $key => $obj) { ?>
                                    <div class="col-9 d-flex">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <div class="d-flex">
                                                <div class="movie-poster">
                                                    <div class="img-wrap">
                                                        <img src="images/poster_images/<?= $obj['movie_poster'] ?>.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div>
                                                        <span class="pg-rate body2-r"><?= $obj['pg_rate'] ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="title-tc main-header-b"><?= $obj['movie_TC'] ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="title-en italic-20 mb-3"><?= $obj['movie_EN'] ?></span>
                                                    </div>
                                                    <div class="rating mb-5">
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>

                                                    <p><span class="movie-length"></span>片長：<span class="length-data"><?= $obj['length'] ?>分鐘</span></p>
                                                    <p><span class="movie-director"></span>導演：<span class="director-data"><?= $obj['director'] ?></span></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                    </div>

                                    <div class="col-3"></div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="booking-seat-section g-section-mb">
                        <div class="container">
                            <div class="row align-items-center mb-4">
                                <div class="col-9 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-10 d-flex align-items-center">
                                        <div>填寫座位數量：</div>
                                        <input type="number" id="Numseats" required min="1" max="10">
                                        <button id="takeData">確定</button>
                                        <p id="notification"></p>
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="col-3"></div>
                            </div>

                            <div class="row seat-dataviz w-100">
                                <div class="col-9 d-flex justify-content-between align-items-center w-100">
                                    <!-- 座位狀態 -->
                                    <div class="d-flex" id="legend"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="time-left-status">剩餘訂票時間：<span class="time-left" id="count-down-timer"></span></div>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                            </div>

                            <div class="row screen">
                                <div class="col-9">
                                    <div class="col-12">
                                        <div class="img-wrap">
                                            <img src="images/screen_line.svg" alt="">
                                            <span>Screen</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                            </div>

                            <div class="row seats-area">
                                <div class="col-9">
                                    <div id="seat-map">
                                    </div>
                                </div>
                                <?php foreach ($_SESSION['cart'] as $key => $obj) {
                                ?>
                                    <div class="col-3">
                                        <div class="sub-title-b">購票資訊</div>
                                        <div class="ticket-detail">
                                            <i class="fas fa-map-marker-alt"></i><span class="detail-title">城市：</span><span class="devision"><?= $obj['division'] ?></span>
                                        </div>
                                        <div class="ticket-detail">
                                            <i class="far fa-calendar-alt"></i><span class="detail-title">日期：</span><span class="date"><?= $obj['movie_date'] ?></span>
                                        </div>
                                        <div class="ticket-detail">
                                            <i class="fas fa-kaaba"></i><span class="detail-title">影城：</span><span class="cinema"><?= $obj['cinema'] ?></span>
                                        </div>
                                        <div class="ticket-detail">
                                            <i class="fas fa-glasses"></i><span class="detail-title">類型：</span><span class="type"><?= $obj['movie_cat'] ?></span>
                                        </div>
                                        <div class="ticket-detail">
                                            <i class="far fa-clock"></i><span class="detail-title">時間：</span><span class="showtime"><?= $obj['showtime'] ?></span>
                                        </div>
                                        <div class="ticket-detail">
                                            <div class="img-wrap">
                                                <img src="images/movie_seat_white.svg" alt="">
                                            </div>
                                            <span class="detail-title">座位：</span><span class="my-seat" id="counter">0</span>
                                        </div>
                                        <div class="divide-line"></div>
                                        <ul id="selected-seats">
                                        </ul>
                                        <div class="total-custom d-flex justify-content-between align-items-center">
                                            <span class="body1-m">
                                                Total :
                                            </span>
                                            <b><span id="total">NT$ 0</span></b>
                                        </div>

                                        <div class="btn-area">
                                            <a class="btn" href="payment-page.php" id="headtopay" data-movie-poster="<?= $obj['movie_poster'] ?>" data-movieTC="<?= $obj['movie_TC'] ?>" data-movieEN="<?= $obj['movie_EN'] ?>" data-date="<?= $obj['movie_date'] ?>" data-moviecat="<?= $obj['movie_cat'] ?>" data-showtime="<?= $obj['showtime'] ?>" data-cinema="<?= $obj['cinema'] ?>" data-ticket-poster="<?= $obj['ticket_poster'] ?>" data-pg-rate="<?= $obj['pg_rate'] ?>">
                                                <span>前往結帳</span>
                                            </a>

                                            <a class="btn btn-outline-light" href="#" id="resetSeat">
                                                <span>重新選擇</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    </div>

                </main>
            <?php } ?>


            <?php require_once './tpl/movinon-footer.php' ?>

            <?php require_once './tpl/foot.php' ?>

            <script>
                // setInterval(function() {
                //     alert("選位已逾時，請重新選擇。")
                //     location.reload();
                // }, 300000);

                $('a#resetSeat').click(function() {
                    location.reload();
                    unset($_SESSION['seat']);
                });

                $('a#headtopay').click(function(event) {
                    // event.preventDefault();
                    // let x = $('#total').text();
                    // console.log(x);
                    //取得 button 的 jQuery 物件
                    let btn = $(this);
                    //送出 post 請求，加入細節
                    let item = $('#selected-seats').children('.sentSeat').length;
                    // console.log(item);

                    let seatCount = $('input#Numseats').val();
                    if (item != seatCount) {
                        event.preventDefault();
                        alert('請選擇正確座位數量');
                        unset($_SESSION['seat']);
                        // location.reload();
                        // console.log(seatCount);
                        // console.log(item);
                    };

                    const selectSeatsArray = [];
                    $('#selected-seats').find('p').each((i, v) => {
                        selectSeatsArray.push($(v).text());
                    })

                    console.log('selectSeatsArray', selectSeatsArray);

                    let objpaydetail = {
                        movie_TC: btn.attr('data-movieTC'),
                        movie_EN: btn.attr('data-movieEN'),
                        movie_poster: btn.attr('data-movie-poster'),
                        movie_date: btn.attr('data-date'),
                        movie_cat: btn.attr('data-moviecat'),
                        showtime: btn.attr('data-showtime'),
                        cinema: btn.attr('data-cinema'),
                        ticket_poster: btn.attr('data-ticket-poster'),
                        pg_rate: btn.attr('data-pg-rate'),
                        payTotal: $('#total').text(),
                        seatTotal: $('#counter').text(),
                        seatName: selectSeatsArray
                    };

                    console.log(objpaydetail);

                    $.post('setSeat.php', objpaydetail, function(obj) {
                        if (obj['success']) {

                        }
                        console.log(obj);
                    }, 'json');
                });
            </script>

            <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
            <script src="js/jquery.seat-charts.js"></script>
            <script>
                function paddedFormat(num) {
                    return num < 10 ? "0" + num : num;
                }

                function startCountDown(duration, element) {

                    let secondsRemaining = duration;
                    let min = 0;
                    let sec = 0;

                    let countInterval = setInterval(function() {

                        min = parseInt(secondsRemaining / 60);
                        sec = parseInt(secondsRemaining % 60);

                        element.textContent = `${paddedFormat(min)}:${paddedFormat(sec)}`;

                        secondsRemaining = secondsRemaining - 1;
                        if (secondsRemaining < 0) {
                            clearInterval(countInterval)
                        };

                    }, 1000);
                }

                window.onload = function() {
                    let time_minutes = 5; // Value in minutes
                    let time_seconds = 00; // Value in seconds

                    let duration = time_minutes * 60 + time_seconds;

                    element = document.querySelector('#count-down-timer');
                    element.textContent = `${paddedFormat(time_minutes)}:${paddedFormat(time_seconds)}`;

                    startCountDown(--duration, element);
                };
            </script>
            <script>
                var firstSeatLabel = 1;

                $(document).ready(function() {
                    var $cart = $('#selected-seats'),
                        $counter = $('#counter'),
                        $total = $('#total'),
                        sc = $('#seat-map').seatCharts({
                            map: [
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_',
                                '_ffff_ffffffffff_ffff_'
                            ],
                            seats: {
                                f: {
                                    price: 230,
                                    classes: 'first-class', //your custom CSS class
                                    category: '電影票'
                                }
                            },
                            naming: {
                                top: false,
                                getLabel: function(character, row, column) {
                                    return firstSeatLabel++;
                                },
                            },
                            legend: {
                                node: $('#legend'),
                                items: [
                                    // 1/11 修改：新增您的座位
                                    ['f', 'seat-demo', '您的座位'],
                                    ['f', 'available seat-demo', '未售出'],
                                    ['f', 'unavailable seat-demo', '已售出']
                                ]
                            },
                            click: function() {

                                // console.log('hi');
                                if (this.status() == 'available') {
                                    const nrow = this.settings.row + 1;
                                    const ncolumn = this.settings.column;
                                    //let's create a new <li> which we'll add to the cart items
                                    $('<li>' + '<p>' + nrow + '排' + ncolumn + '號' + '</p>' + 'NT$ ' + this.data().price + '</li>')
                                        .attr('id', 'cart-item-' + this.settings.id)
                                        .addClass('sentSeat')
                                        .data('seatId', this.settings.id)
                                        .appendTo($cart);

                                    /*
                                     * Lets update the counter and total
                                     *
                                     * .find function will not find the current seat, because it will change its stauts only after return
                                     * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                                     */
                                    $counter.text(sc.find('selected').length + 1);
                                    $total.text(recalculateTotal(sc) + this.data().price);

                                    return 'selected';
                                } else if (this.status() == 'selected') {
                                    //update the counter
                                    $counter.text(sc.find('selected').length - 1);
                                    //and total
                                    $total.text(recalculateTotal(sc) - this.data().price);

                                    //remove the item from our cart
                                    $('#cart-item-' + this.settings.id).remove();

                                    //seat has been vacated
                                    return 'available';
                                } else if (this.status() == 'unavailable') {
                                    //seat has been already booked
                                    return 'unavailable';
                                } else {
                                    return this.style();
                                }
                            }
                        });

                    //this will handle "[cancel]" link clicks
                    $('#selected-seats').on('click', '.cancel-cart-item', function() {
                        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
                        sc.get($(this).parents('li:first').data('seatId')).click();
                    });

                    //let's pretend some seats have already been booked
                    sc.find('f.available').status('unavailable');

                    function takeData() {
                        if (($("#Numseats").val().length == 0)) {
                            alert("請選擇座位");


                        } else {
                            sc.find('f.unavailable').status('available');
                            sc.get(['1_2', '1_3', '2_18', '2_19', '2_20', '3_7', '3_8', '3_9', '3_15', '3_16', '3_17', '4_2', '4_3', '4_4', '4_5', '5_3', '5_4', '5_6', '5_7', '5_10', '5_11', '5_14', '5_15', '5_16', '5_19', '5_20', '7_2', '7_3', '7_4', '7_5', '7_6', '7_7', '7_8', '7_9', '7_10', '7_11', '7_12', '7_13', '7_14', '7_15', '7_16', '7_17', '7_18', '7_19', '7_20', '7_21', '8_3', '8_4', '8_5', '8_6', '8_10', '8_11', '8_12', '8_13', '8_14', '8_16', '8_17', '8_18', '8_19', '8_20', '9_2', '9_4', '9_6', '9_9', '9_8', '9_9', '9_10', '9_11', '9_12', '9_14', '9_15', '9_16', '9_17', '9_18', '9_19', '9_20', '9_21', '10_2', '10_3', '10_4', '10_5', '10_6', '10_8', '10_9', '10_10', '10_11', '10_12', '10_13', '10_14', '10_15', '10_16', '10_18', '10_19']).status('unavailable');
                            $(".seatCharts-cell *").prop("disabled", true);
                            $("div.wrapper *").prop("disabled", false);
                            document.getElementById("notification").innerHTML = "<b style='color:#6DF14B;'>請開始選擇座位</b>";
                        }
                    }

                    $('#takeData').click(takeData);
                });

                function recalculateTotal(sc) {
                    var total = 0;

                    //basically find every selected seat and sum its price
                    sc.find('selected').each(function() {
                        total += this.data().price;
                    });

                    return total;
                }
                
            </script>

            <script type="text/javascript">
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-36251023-1']);
                _gaq.push(['_setDomainName', 'jqueryscript.net']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript';
                    ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(ga, s);
                })();
            </script>

        </body>
<?php }
} ?>

</html>