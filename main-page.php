<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<style>
    <?php require_once './css/bootstrap-switch.css' ?>
    <?php require_once './css/main-page.css' ?>
</style>

<body>

    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>

        <div class="hero container-fluid g-section-mb">
            <!-- ---------------background-img--------------- -->
            <div class="bg"></div>

            <!-- ---------------canvas--------------- -->
            <canvas class="dm"></canvas>

            <!-- ---------------inputgroup--------------- -->
            <div class="inputgroup row row-d-1920">

                <!-- 彈幕開關 -->
                <input type="checkbox" name="my-checkbox" checked>

                <div class="middle-bg">
                    <!-- 標籤選單 -->
                    <div class="dropup col-xs-2 col-xs-offset-1">
                        <!-- ==========修改 style="border: none;========== -->
                        <button class=" tag-selector dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none;">
                            電影標籤
                        </button>
                        <ul class="dropdown-menu tag-menu" aria-labelledby="dropdownMenu">
                            <li class="mb-3"><a id=tag_immortal class="tag" href="#">永恆族</a></li>
                            <li class="mb-3"><a id=tag_sao class="tag" href="#">刀劍神域</a></li>
                            <li class="mb-3"><a id=tag_trick class="tag" href="#">詭扯</a></li>
                            <li class="mb-3"><a id=tag_mha class="tag" href="#">我的英雄學院</a></li>
                            <li class="mb-3"><a id=tag_soho class="tag" href="#">逃離夜蘇活</a></li>
                        </ul>
                    </div>

                    <!-- 留言訊息欄 -->
                    <div>
                        <input class="inputbar " name=txt type="text" value="" maxlength="20" placeholder="選擇電影標籤後才能發言喔 !">
                    </div>
                    <button class="send btn-brand" disabled>送出</button>
                    <button class="clear btn-white-outline">清除</button>
                </div>

                <!-- 背景設定 -->
                <div class="colorDiv dropup">
                    <a id="colorDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                        <div class=preview></div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="colorDropdownMenu">
                        <li><a class="canvas-preview" href="#"><img src="images/main_page/hero-img1.jpg"></a></li>
                        <li><a class="canvas-preview" href="#"><img src="images/main_page/hero-img2.jpg"></a></li>
                        <li><a class="canvas-preview" href="#"><img src="images/main_page/hero-img3.jpg"></a></li>
                        <li><a class="canvas-preview" href="#"><img src="images/main_page/hero-img4.jpg"></a></li>
                        <li><a class="canvas-preview" href="#"><img src="images/main_page/hero-img5.jpg"></a></li>

                        <li>
                            <p>點擊更換背景圖</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ---------------inputgroup--------------- -->
            <div class="inputgroup row row-d-418">

                <!-- 彈幕開關 -->
                <!-- <input type="checkbox" name="my-checkbox" checked> -->

                <div class="middle-bg">

                    <!-- 背景設定 -->
                    <div class="colorDiv dropup d-418-row1 d-flex justify-content-end">
                        <a id="colorDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                            <div class=preview></div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="colorDropdownMenu">
                            <li><a class="canvas-preview" href="#"><img src="images/main_page/hero-img1.jpg"></a></li>
                            <li><a class="canvas-preview" href="#"><img src="images/main_page/eternals-bg-img-min.jpg"></a></li>

                            <li>
                                <p>點擊更換背景圖</p>
                            </li>
                        </ul>
                    </div>

                    <div class="d-418-row2 w-100">
                        <!-- 標籤選單 -->
                        <div class="dropup">
                            <!-- ==========修改 style="border: none;========== -->
                            <button class="dropdown-toggle tag-selector" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none;">
                                電影標籤
                            </button>
                            <ul class="dropdown-menu tag-menu" aria-labelledby="dropdownMenu">
                                <li class="mb-3"><a id=tag_immortal class="tag" href="#">永恆族</a></li>
                                <li class="mb-3"><a id=tag_sao class="tag" href="#">刀劍神域</a></li>
                                <li class="mb-3"><a id=tag_trick class="tag" href="#">詭扯</a></li>
                                <li class="mb-3"><a id=tag_mha class="tag" href="#">我的英雄學院</a></li>
                                <li class="mb-3"><a id=tag_soho class="tag" href="#">逃離夜蘇活</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- 留言訊息欄 -->
                    <div class="d-418-row3">
                        <input class="inputbar" name=txt-418 type="text" value="" maxlength="20" placeholder="選擇電影標籤後才能發言喔 !">
                    </div>

                    <div class="d-flex w-100">
                        <button class="send btn-brand" disabled>送出</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="ranking-section g-section-mb">
            <div class="container">

                <div class="row subtitle">
                    <div class="mycol-6">
                        <div class="d-flex">
                            <div class="red-line my-auto"></div>
                            <span class="section-header-b">電影排行榜</span>
                        </div>
                    </div>
                    <div class="mycol-6 d-flex justify-content-end align-items-end">
                        <a href="./forum-overview-page.php">
                            <div class="d-flex justify-content-end align-items-end">
                                <div class="sub-title-r mt-2">電影總覽頁</div>
                                <div class="ml-2"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="wrap">
                        <div class="next-btn">
                            <div class="img-wrap">
                                <img src="images/icon_arrow_right_gradient.svg" alt="">
                            </div>
                        </div>
                        <div class="prev-btn">
                            <div class="img-wrap">
                                <img src="images/icon_arrow_left_gradient.svg" alt="">
                            </div>
                        </div>
                        <div class="carousel-wrap">
                            <!-- --------------------rank1 hover-------------------- -->
                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">01</span></div>
                                <div class="img-wrap rank1">
                                    <img src="images/main_page/rank1.jpg" alt="">
                                    <div class="rank-hover-content1">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/equal_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">01</div>
                                            <div class="content-r">
                                                <p class="section-header-b"><span>永恆族</span></p>
                                                <p class="en-title">Eternals</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">56%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">6.8</span>
                                        </div>

                                        <div class="d-flex">
                                            <!-- 1/5更改: 新增php購票路徑 -->
                                            <?php
                                            $sql = "SELECT `movie_id`, `poster`, `division_id`, `date_id` FROM `movie` INNER JOIN `division` INNER JOIN `date`
                                            WHERE `movie_id` = 1
                                            AND `division_id` = 'DV1'
                                            AND `date_id` = 'D1'";
                                            $arr = $pdo->query($sql)->fetchAll();
                                            foreach ($arr as $obj) {
                                            ?>
                                                <a href="booking-time-page.php?movie_id=<?= $obj['movie_id'] ?>&sub_date_id=<?= $obj['date_id'] ?>&sub_division_id=<?= $obj['division_id'] ?>">
                                                    <div class="btn-booking">立即購票</div>
                                                </a>
                                            <?php } ?>

                                            <!-- 1/4更改: 電影介紹a連結加資料庫路徑 -->
                                            <?php
                                            $sql = "SELECT `movie_id`, `poster` FROM `movie` WHERE `movie_id` = 1";
                                            $arr = $pdo->query($sql)->fetchAll();
                                            foreach ($arr as $obj) {
                                            ?>
                                                <a href="detail-page.php?movie_id=<?= $obj['movie_id'] ?>">
                                                    <div class="btn-description">電影介紹</div>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">02</span></div>
                                <div class="img-wrap rank2">
                                    <img src="images/main_page/rank2.jpg" alt="">
                                    <div class="rank-hover-content2">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/rise_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">02</div>
                                            <div class="content-r">
                                                <p class="section-header-b"><span class="marquee">刀劍神域 –Progressive- 無星夜的詠嘆調</span></p>
                                                <p class="en-title">Sword Art Online: Progressive</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">72%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">8.7</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">03</span></div>
                                <div class="img-wrap rank3">
                                    <img src="images/main_page/rank3.jpg" alt="">
                                    <div class="rank-hover-content3">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/drop_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">03</div>
                                            <div class="content-r">
                                                <p class="section-header-b"><span>詭扯</span></p>
                                                <p class="en-title">Treat or trick</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">48%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">7.0</span>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">04</span></div>
                                <div class="img-wrap rank4">
                                    <img src="images/main_page/rank4.jpg" alt="">
                                    <div class="rank-hover-content4">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/rise_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">04</div>
                                            <div class="content-r">
                                                <p class="section-header-b"><span class="marquee">我的英雄學院劇場版：世界英雄任務</span></p>
                                                <p class="en-title">My Hero Academia The Movie : World Heores Mission</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">90%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">9.1</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">05</span></div>
                                <div class="img-wrap rank5">
                                    <img src="images/main_page/rank5.jpg" alt="">
                                    <div class="rank-hover-content5">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/rise_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">05</div>
                                            <div class="content-r">
                                                <p class="section-header-b"><span class="marquee">迷離夜蘇活</span></p>
                                                <p class="en-title">Last Night in Soho</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">67%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">8.2</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">06</span></div>
                                <div class="img-wrap rank6">
                                    <img src="images/main_page/rank6.jpg" alt="">
                                    <div class="rank-hover-content6">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/drop_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">06</div>
                                            <div class="content-r">
                                                <p class="section-header-b">梅艷芳</p>
                                                <p class="en-title">Anita Mui Yim Fong</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">59%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">7.4</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">07</span></div>
                                <div class="img-wrap rank7">
                                    <img src="images/main_page/rank7.jpg" alt="">
                                    <div class="rank-hover-content7">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/equal_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">07</div>
                                            <div class="content-r">
                                                <p class="section-header-b">瀑布</p>
                                                <p class="en-title">The Falls</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">78%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">8.4</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">08</span></div>
                                <div class="img-wrap rank8">
                                    <img src="images/main_page/rank8.jpg" alt="">
                                    <div class="rank-hover-content8">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/rise_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">08</div>
                                            <div class="content-r">
                                                <p class="section-header-b">粉紅雲</p>
                                                <p class="en-title">The Pink Cloud</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">82%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">8.0</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="rank-num-418"><span class="roboto-condensed">09</span></div>
                                <div class="img-wrap rank9">
                                    <img src="images/main_page/rank9.jpg" alt="">
                                    <div class="rank-hover-content9">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/drop_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">09</div>
                                            <div class="content-r">
                                                <p class="section-header-b">脫稿玩家</p>
                                                <p class="en-title">Free Guy</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">88%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">7.8</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <!-- rank10  -->
                                <div class="rank-num-418"><span class="roboto-condensed">10</span></div>
                                <div class="img-wrap rank10">
                                    <img src="images/main_page/rank10.jpg" alt="">
                                    <div class="rank-hover-content10">
                                        <div class="d-flex">
                                            <div class="arrow-wrap">
                                                <img src="images/rise_arrow.svg" alt="">
                                            </div>
                                            <div class="rank-num">10</div>
                                            <div class="content-r">
                                                <p class="section-header-b">心靈遊戲</p>
                                                <p class="en-title">Mind Game</p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reputation d-flex align-items-center">
                                            <div class="img-wrap1">
                                                <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                            </div>
                                            <span class="rate">82%</span>
                                            <div class="img-wrap2">
                                                <img src="./images/icon_IMDB_Logo.svg" alt="">
                                            </div>
                                            <span class="rate">6.2</span>
                                        </div>

                                        <div class="d-flex">
                                            <a href="#">
                                                <div class="btn-booking">立即購票</div>
                                            </a>
                                            <a href="#">
                                                <div class="btn-description">電影介紹</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- -----------forum cards section----------- -->
        <section class="forum-cards-section g-section-mb">
            <div class="container d-none d-xl-block">
                <div class="row subtitle g-subtitle-mb">
                    <div class="col-6 d-flex">
                        <div class="red-line my-auto"></div>
                        <span class="section-header-b">精選討論區</span>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-end">
                        <a href="#">
                            <div class="d-flex justify-content-end align-items-end">
                                <div class="sub-title-r mt-2">前往討論區</div>
                                <div class="ml-2"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- -------------------上------------------- -->
                <div class="row row1">
                    <div class="col-4 d-flex flex-column justify-content-between">
                        <div>
                            <a href="#">
                                <div class="img-wrap card-1">
                                    <img src="images/forum_overview_page/card_1.jpg" alt="">
                                    <div class="content">
                                        <div class="section-header-r">再說一次我願意</div>
                                        <span class="body1-b">Today</span><span class="caption-12 com-count com-1-count">+<span class="count">74</span></span>
                                    </div>
                                    <div class="hover-gradient-card1"></div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#">
                                <div class="img-wrap card-2">
                                    <img src="images/forum_overview_page/card_2.jpg" alt="">
                                    <div class="content">
                                        <div class="section-header-r">駭客任務</div>
                                        <span class="body1-b">Today</span><span class="caption-12 com-count com-2-count">+<span class="count">189</span></span>
                                    </div>
                                    <div class="hover-gradient-card2"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-8">
                        <a href="forum-masonry-page.php?movie_id=73">
                            <div class="img-wrap card-3">
                                <img src="images/forum_overview_page/card_3.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">蜘蛛人: 無家日</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-3-count">+<span class="count">334</span></span>
                                    <!-- <p class="text">故事接續《蜘蛛人：離家日》片尾，描述號角日報對外公佈了蜘蛛人真實身份是彼得帕克後，警察指控他利用無人機殺害神秘法師，讓彼得帕克遭到輿論攻擊、而他與親友的生活也大受影響。為了改變現況，絕望的彼得帕克找上了「奇異博士」，希望他施展法術讓大家忘記他是蜘蛛人的事實。</p> -->
                                </div>
                                <div class="hover-gradient-card3"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- -------------------中------------------- -->
                <div class="row row2">
                    <div class="col-6">
                        <a href="#">
                            <div class="img-wrap card-4">
                                <img src="images/forum_overview_page/card_4.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">魔鬼剋星未來世</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-4-count">+<span class="count">138</span></span>
                                </div>
                                <div class="hover-gradient-card4"></div>
                            </div>
                        </a>

                    </div>
                    <div class="col-6">
                        <a href="#">
                            <div class="img-wrap card-5">
                                <img src="images/forum_overview_page/card_5.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">梅艷芳</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-5-count">+<span class="count">60</span></span>
                                </div>
                                <div class="hover-gradient-card5"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- --------------------display 小於 1200-------------------- -->
            <div class="container d-sm-block d-xl-none">
                <div class="row subtitle g-subtitle-mb">
                    <div class="mycol-6">
                        <div class="d-flex">
                            <div class="red-line my-auto"></div>
                            <span class="section-header-b">電影排行榜</span>
                        </div>
                    </div>
                    <div class="mycol-6 d-flex justify-content-end align-items-end">
                        <a href="./forum-overview-page.php">
                            <div class="d-flex justify-content-end align-items-end">
                                <div class="sub-title-r mt-2">電影總覽頁</div>
                                <div class="ml-2"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- forum cards section -->
                <div class="row">
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_1_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">再說一次我願意</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-1-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_2_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">駭客任務</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-2-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="forum-masonry-page.php?movie_id=73">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_3_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">蜘蛛人: 無家日</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-3-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_4_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">魔鬼剋星未來世</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-4-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_5_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">梅艷芳</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-5-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_6_1200_more.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">更多...</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- movinon footer -->
    <?php require_once './tpl/movinon-footer.php' ?>

    <?php require_once './tpl/foot.php' ?>

    <!-- bootstrap switch js -->
    <script src='https://files.lovelong.cn/common/ui/bootstrap/bootstrap-switch/js/bootstrap-switch.min.js'></script>

    <!-- canvas js -->
    <script src="js/canvas.fin.js"></script>

    <script src="js/main-page.js"></script>

    <script src="js/custom.js"></script>

    <script>
        // forum card section number running
        $(".count").each(function() {
        $(this)
          .prop("Counter", 0)
          .animate(
            {
              Counter: $(this).text()
            },
            {
              duration: 5000,
              easing: $(this).data("esing"),
              step: function(now) {
                $(this).text(Math.ceil(now));
              }
            }
          );
      });
    </script>
</body>

</html>