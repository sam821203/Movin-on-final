<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<style>
    <?php require_once './css/booking-movie-page.css' ?>
</style>

<body>

    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <!-- -----------top five section----------- -->
        <section class="top-five-section">
            <div class="container">
                <div class="row subtitle g-subtitle-mb">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="red-line"></div>
                            <span class="section-header-b">訂票排行榜</span>
                        </div>
                    </div>
                </div>

                <div class="row d-none d-md-flex d-flex">
                    <!-- 1/6更改 電影資料提取與輸出 -->
                    <?php
                    $sql = "SELECT `movie_id`, `poster`, `mName_TC`,  `mName_EN`, `movinon_rate` FROM `movie`WHERE `ov_id`='1' LIMIT 5 ";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $obj) {
                    ?>
                        <div class="top-five-card col-md-4 col-lg-4 col-xl">
                            <a href="booking-time-page.php?movie_id=<?= $obj['movie_id']?>&sub_date_id=D1&sub_division_id=DV1">
                                <div class="img-wrap">
                                    <img src=".\images\movies_overview_page\現正熱映\<?= $obj['poster'] ?>.jpg ">
                                </div>
                            </a>
                            <a href="booking-time-page.php?movie_id=<?= $obj['movie_id']?>&sub_date_id=D1&sub_division_id=DV1">
                                <div class="card-info">
                                    <div class="d-flex justify-content-between">
                                        <div class="movie-title">
                                            <p class="title-tc">
                                                <span class="sub-title-r"><?= $obj['mName_TC'] ?></span>
                                            </p>
                                            <p class="italic-16"><?= $obj['mName_EN'] ?></p>
                                        </div>
                                        <div class="rating d-flex">
                                            <i class="fas fa-star"></i>
                                            <span><?= $obj['movinon_rate'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- -----------other movies section----------- -->
        <section class="other-movies-section g-section-mb">
            <div class="container">
                <div class="row subtitle g-subtitle-mb">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="red-line"></div>
                            <span class="section-header-b">現正熱映中</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT `poster`, `mName_TC`,  `mName_EN`, `pg_rate` FROM `movie`WHERE `ov_id`='1' ";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $obj) {
                    ?>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                            <a href="#">
                                <div class="mov-card">
                                    <div class="img-wrap">
                                        <img src=".\images\movies_overview_page\現正熱映\<?= $obj['poster'] ?>.jpg">
                                    </div>
                                    <p>
                                        <span class="sub-title-r"><?= $obj['mName_TC'] ?></span>
                                    </p>
                                    <p class="italic-16"><?= $obj['mName_EN'] ?></p>
                                    <div class="pg-rate "><?= $obj['pg_rate'] ?></div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </section>
    </main>

    <?php require_once './tpl/movinon-footer.php' ?>

    <?php require_once './tpl/foot.php' ?>

    <script>
        // 判斷英文標題字數
        const len = 42;
        const ellipsisTopFive = document.querySelectorAll('.top-five-card .movie-title .italic-16');

        ellipsisTopFive.forEach((item) => {
            if (item.innerHTML.length > len) {
                let txt = item.innerHTML.substring(0, len) + '...';
                item.innerHTML = txt;
            }
        })
    </script>

    <!-- booking-ratingcolor js -->
    <script src="./js/booking-ratingcolor.js"></script>

</body>

</html>