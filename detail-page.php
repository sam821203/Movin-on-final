<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<style>
    <?php require_once './css/detail-page.css' ?>
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
                <a href="">
                    <div class="fixed-icon-ticket">
                        <div class="img-wrap">
                            <img src="images/icon_ticket_fill.svg" alt="">
                        </div>
                    </div>
                </a>

                <!-- -----------movie detail section----------- -->
                <section class="movie-detail-section g-section-mb">
                    <div class="container">

                        <!-- social media display > 1200 -->
                        <div class="row social-media flex-column d-none d-lg-none d-xl-flex">
                            <?php
                            $sql = "SELECT * FROM `movie` WHERE `movie_id` = {$_GET['movie_id']}";
                            $arr = $pdo->query($sql)->fetchAll();
                            foreach ($arr as $obj) {
                            ?>
                                <div class="d-flex justify-content-end mb-2">
                                    <a href="#">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="#">
                                        <i class="fab fa-line"></i>
                                    </a>
                                </div>
                        </div>

                        <!-- movie info display > 1200 -->
                        <div class="row movie-info d-none d-sm-none d-lg-flex">
                            <div class="col-xl-6 d-flex">
                                <div class="col-sm-3 col-lg-6 movie-poster">
                                    <div class="img-wrap">
                                        <img src="images/poster_images/<?= $obj['poster'] ?>.jpg" alt="">
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-6 content">
                                    <div>
                                        <span class="pg-rate body2-r"><?= $obj['pg_rate_text'] ?></span>
                                    </div>
                                    <div>
                                        <span class="title-tc"><?= $obj['mName_TC'] ?></span>
                                    </div>
                                    <div>
                                        <span class="title-en"><?= $obj['mName_EN'] ?></span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <div class="reputation">
                                        <div class="img-wrap1">
                                            <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                        </div>
                                        <span class="mr-3"><?= $obj['tomato_rate'] ?>%</span>
                                        <div class="img-wrap2">
                                            <img src="./images/icon_IMDB_Logo.svg" alt="">
                                        </div>
                                        <span><?= $obj['IMDB'] ?></span>
                                    </div>

                                    <p class="release-date">日期：<span class="date-data"><?= $obj['release_time'] ?></span></p>
                                    <p class="movie-length">片長：<span class="length-data"><?= $obj['length'] ?>分鐘</span></p>
                                    <p class="movie-director">導演：<span class="director-data"><?= $obj['director_TC'] ?></span></p>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-md-12 col-lg-6">
                            <div class="cat-tags">
                                <?php
                                $sql = "SELECT `movie_id`,`cat_name` FROM `categories` WHERE `movie_id` = {$_GET['movie_id']}";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $obj) {
                                ?>
                                    <div class="cat-tag g-tag"><?= $obj['cat_name'] ?></div>
                                <?php } ?>
                            </div>

                            <div class="description-title">
                                <span class="section-header-b">劇情大綱</span>
                            </div>

                            <div class="description">
                                <?php
                                $sql = "SELECT `description` FROM `movie` WHERE `movie_id` = {$_GET['movie_id']}";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $obj) {
                                ?>
                                    <p><?= $obj['description'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="booking-trailer">
                                <button type="button" class="btn-brand">
                                    <?php
                                    $sql = "SELECT `movie_id`, `poster`, `division_id`, `date_id` FROM `movie` INNER JOIN `division` INNER JOIN `date`
                                WHERE `movie_id` = '{$_GET['movie_id']}'
                                AND `division_id` = 'DV1'
                                AND `date_id` = 'D1'";
                                    $arr = $pdo->query($sql)->fetchAll();
                                    foreach ($arr as $obj) {
                                    ?>
                                        <a href="booking-time-page.php?movie_id=<?= $obj['movie_id'] ?>&sub_date_id=<?= $obj['date_id'] ?>&sub_division_id=<?= $obj['division_id'] ?>">
                                            <div class="d-flex align-items-center">
                                                <div class="img-wrap">
                                                    <img src="images/icon_ticket_fill.svg" alt="">
                                                </div>
                                                <span>立即購票</span>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </button>

                                <button type="button" class="btn-white-outline">
                                    <div class="d-flex">
                                        <div class="img-wrap">
                                            <img src="images/icon_play_fill.svg" alt="">
                                        </div>
                                        <span>預告片</span>
                                    </div>

                                </button>
                            </div>
                        </div>
                        </div>

                        <!-- movie info display < 418 -->
                        <div class="row movie-info d-flex d-xs-flex d-sm-none d-none">
                            <?php
                            $sql = "SELECT * FROM `movie` WHERE `movie_id` = {$_GET['movie_id']}";
                            $arr = $pdo->query($sql)->fetchAll();
                            foreach ($arr as $obj) {
                            ?>
                                <div class="mycol-4 movie-poster">
                                    <div class="img-wrap">
                                        <img src="images/poster_images/<?= $obj['poster'] ?>.jpg" alt="">
                                    </div>
                                </div>

                                <div class="mycol-8 content">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div>
                                                <span class="title-tc"><?= $obj['mName_TC'] ?></span>
                                            </div>
                                            <div>
                                                <span class="title-en"><?= $obj['mName_EN'] ?></span>
                                            </div>
                                        </div>

                                        <div>
                                            <span class="pg-rate body2-r"><?= $obj['pg_rate'] ?></span>
                                        </div>
                                    </div>

                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <div class="reputation">
                                        <div class="img-wrap1">
                                            <img src="./images/icon_Rotten_Tomatoes.svg" alt="">
                                        </div>
                                        <span class="mr-3"><?= $obj['tomato_rate'] ?>%</span>
                                        <div class="img-wrap2">
                                            <img src="./images/icon_IMDB_Logo.svg" alt="">
                                        </div>
                                        <span><?= $obj['IMDB'] ?></span>
                                    </div>

                                    <p class="release-date"><i class="far fa-calendar-check"></i><span class="date-data"><?= $obj['release_time'] ?></span></p>
                                    <p class="movie-length"><i class="far fa-clock"></i><span class="length-data"><?= $obj['length'] ?>分鐘</span></p>
                                    <p class="movie-director"><i class="fas fa-video"></i><span class="director-data"><?= $obj['director_TC'] ?></span></p>

                                </div>

                                <div class="mycol-12">
                                    <div class="cat-tags">
                                        <?php
                                        $sql = "SELECT `movie_id`,`cat_name` FROM `categories` WHERE `movie_id` = {$_GET['movie_id']}";
                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                        ?>
                                            <div class="cat-tag g-tag"><?= $obj['cat_name'] ?></div>
                                        <?php } ?>
                                    </div>

                                    <div class="description-title">
                                        <span class="section-header-b">劇情大綱</span>
                                    </div>
                                    <div class="description">
                                        <?php
                                        $sql = "SELECT `description` FROM `movie` WHERE `movie_id` = {$_GET['movie_id']}";
                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                        ?>
                                            <p><?= $obj['description'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="booking-trailer">
                                        <button type="button" class="btn-brand">
                                            <?php
                                            $sql = "SELECT `movie_id`, `poster`, `division_id`, `date_id` FROM `movie` INNER JOIN `division` INNER JOIN `date`
                            WHERE `movie_id` = 1
                            AND `division_id` = 'DV1'
                            AND `date_id` = 'D1'";
                                            $arr = $pdo->query($sql)->fetchAll();
                                            foreach ($arr as $obj) {
                                            ?>
                                                <a href="booking-time-page.php?movie_id=<?= $obj['movie_id'] ?>&sub_date_id=<?= $obj['date_id'] ?>&sub_division_id=<?= $obj['division_id'] ?>">
                                                    <div class="d-flex align-items-center">
                                                        <div class="img-wrap">
                                                            <img src="images/icon_ticket_fill.svg" alt="">
                                                        </div>
                                                        <span>立即購票</span>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </button>
                                        <button type="button" class="btn-white-outline">
                                            <div class="d-flex">
                                                <div class="img-wrap">
                                                    <img src="images/icon_play_fill.svg" alt="">
                                                </div>
                                                <span>預告片</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <!-- -----------related articles section----------- -->
                <section class="related-articles-section g-section-mb">
                    <div class="container">
                        <div class="row subtitle g-subtitle-mb">
                            <div class="mycol-6 d-flex">
                                <div class="red-line my-auto"></div>
                                <span class="section-header-b">討論區文章</span>
                            </div>
                            <div class="mycol-6 d-flex justify-content-end align-items-end">
                                <a href="#">
                                    <div class="d-flex justify-content-end align-items-end">
                                        <div class="sub-title-r mt-2">前往討論區</div>
                                        <div class="ml-2"><i class="fas fa-chevron-right"></i></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="row articles-1920 d-none d-xl-flex">
                            <?php
                            $sql = "SELECT `movie_id`,`article_cat`,`title`,`spoiler_tag`,`created_at` FROM `spider_forum_article` WHERE `movie_id` = {$_GET['movie_id']} LIMIT 0,8";
                            $arr = $pdo->query($sql)->fetchAll();
                            function time_tranx($the_time)
                            {
                                $now_time = date("Y-m-d H:i:s", time() + 8 * 60 * 60);
                                $now_time = strtotime($now_time);
                                $show_time = strtotime($the_time);
                                $dur = $now_time - $show_time;
                                if ($dur < 0) {
                                    return $the_time;
                                } else {
                                    if ($dur < 60) {
                                        return $dur.'秒前';
                                    } else {
                                        if ($dur < 3600) {
                                            return floor($dur / 60).'分鐘前';
                                        } else {
                                            if ($dur < 86400) {
                                                return floor($dur / 3600).'小時前';
                                            } else {
                                                if ($dur < 604800) { 
                                                    return floor($dur / 86400).'天前';
                                                } else {
                                                    if ($dur < 15552000) {
                                                        return floor($dur / 604800).'週前';
                                                    } else {
                                                        return $the_time;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            foreach ($arr as $objArt) {
                            ?>
                                <div class="col-xl-6">
                                    <a href="#">
                                        <div class="article-light d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="spoiler-free-tag"><?= $objArt['spoiler_tag'] ?></div>
                                                <div class="arti-cat-tag g-tag"><?= $objArt['article_cat'] ?></div>
                                                <div class="sub-title-r mt-1"><?= $objArt['title'] ?></div>
                                            </div>
                                            <div class="time-stamp d-flex align-items-center"><?= time_tranx($objArt['created_at']) ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- < 1200 -->
                        <div class="row articles-xl d-none d-md-flex d-lg-flex d-xl-none">
                            <ul>
                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">討論</div>
                                                    <div class="sub-title-r">《永恆族》可惜不能是獨立電影</div>
                                                </div>
                                                <div class="time-stamp d-flex">12小時前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="article-dark d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">討論</div>
                                                    <div class="sub-title-r">《永恆族》可惜不能是獨立電影</div>
                                                </div>
                                                <div class="time-stamp d-flex">12小時前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="article-dark d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-free-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">新聞</div>
                                                    <div class="sub-title-r">《作家我就爛》逼退《永恆族》榮登...</div>
                                                </div>
                                                <div class="time-stamp d-flex">18小時前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="article-light d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-free-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">選片</div>
                                                    <div class="sub-title-r">月老 vs. 永恆族</div>
                                                </div>
                                                <div class="time-stamp d-flex">1天前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">討論</div>
                                                    <div class="sub-title-r">《永恆族》可惜不能是獨立電影</div>
                                                </div>
                                                <div class="time-stamp d-flex">12小時前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="article-dark d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">討論</div>
                                                    <div class="sub-title-r">《永恆族》可惜不能是獨立電影</div>
                                                </div>
                                                <div class="time-stamp d-flex">12小時前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="article-dark d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-free-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">新聞</div>
                                                    <div class="sub-title-r">《作家我就爛》逼退《永恆族》榮登...</div>
                                                </div>
                                                <div class="time-stamp d-flex">18小時前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="col-12">
                                        <a href="#">
                                            <div class="article-light d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="spoiler-free-tag">雷</div>
                                                    <div class="arti-cat-tag g-tag">選片</div>
                                                    <div class="sub-title-r">月老 vs. 永恆族</div>
                                                </div>
                                                <div class="time-stamp d-flex">1天前</div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- < 418 -->
                        <div class="row articles-md d-sm-flex d-md-none d-lg-none d-xl-none">
                            <ul>
                                <?php
                                $sql = "SELECT `movie_id`,`article_cat`,`title`,`spoiler_tag`, `created_at` FROM `spider_forum_article` WHERE `movie_id` = {$_GET['movie_id']}";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $objArt) {
                                ?>
                                    <li>
                                        <div class="col-12">
                                            <a href="#">
                                                <div class="extra-info">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="d-flex align-items-center align-items-center">
                                                            <div class="spoiler-free-tag"><?= $objArt['spoiler_tag'] ?></div>
                                                            <div class="arti-cat-tag mr-2"><?= $objArt['article_cat'] ?></div>
                                                        </div>
                                                        <div class="time-stamp d-flex"><?= time_tranx($objArt['created_at']) ?></div>
                                                    </div>
                                                </div>
                                                <div class="article-title">
                                                    <div class="sub-title-r"><?= $objArt['title'] ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- -----------actors list section----------- -->
                <section class="actors-list-section g-section-mb">
                    <div class="container">
                        <div class="row subtitle g-subtitle-mb">
                            <div class="mycol-12">
                                <div class="d-flex">
                                    <div class="red-line my-auto"></div>
                                    <span class="section-header-b mr-3">主要演員列表</span>
                                    <span class="sub-title-r  my-auto">共12人</span>
                                </div>
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

                                    <!-- 空照片 -->
                                    <li class="list-unstyled">
                                        <div class="img-wrap empty">
                                            <div></div>
                                        </div>
                                    </li>

                                    <!-- 第一張圖片 img-1 -->
                                    <?php
                                    $sql = "SELECT * FROM `actor_list` WHERE `movie_id` = {$_GET['movie_id']}";
                                    $arr = $pdo->query($sql)->fetchAll();
                                    foreach ($arr as $obj) {
                                    ?>
                                        <li class="list-unstyled">
                                            <div class="img-wrap actor1">
                                                <img src="images/detail_page/actors_list_section/<?= $obj['actor_img'] ?>.jpg" alt="">
                                                <div>
                                                    <img class="image-hover actor-hover-char1" src="images/detail_page/actors_list_section/<?= $obj['character_img'] ?>.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="actor-name">
                                                <span class="actor-name-tc1 sub-title-b"><?= $obj['aName_TC'] ?></span>
                                                <span class="actor-name-en1 italic-16"><?= $obj['aName_EN'] ?></span>

                                                <span class="character-name-tc1 sub-title-b"><?= $obj['character_TC'] ?></span>
                                                <span class="character-name-en1 italic-16"><?= $obj['character_EN'] ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <!-- -----------movie stills section----------- -->
                <section class="movie-stills-section g-section-mb">
                    <div class="container">
                        <div class="row subtitle g-subtitle-mb">
                            <div class="mycol-12">
                                <div class="d-flex">
                                    <div class="red-line my-auto"></div>
                                    <span class="section-header-b mr-3">電影劇照</span>
                                    <span class="sub-title-r my-auto">共10張</span>
                                </div>
                            </div>
                        </div>

                        <!-- < 1920 -->
                        <div class="row movie-stills d-none d-xs-none d-xl-flex">
                            <div class="hall-screen">
                                <?php
                                $sql = "SELECT `photo` FROM `movie_stills` WHERE `movie_id` = {$_GET['movie_id']} LIMIT 0,1";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $objSteel) {
                                ?>
                                    <img src="images/detail_page/movie_stills/<?= $objSteel['photo'] ?>.jpg" alt="">
                                <?php } ?>
                            </div>

                            <div class="movie-stills-carousel">
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


                                <div class="carousel-wrap d-flex justify-content-between list-unstyled flex-nowrap">
                                    <?php
                                    $sql = "SELECT `photo` FROM `movie_stills` WHERE `movie_id` = {$_GET['movie_id']}";
                                    $arr = $pdo->query($sql)->fetchAll();
                                    foreach ($arr as $objSteel) {
                                    ?>
                                        <li class="movie">
                                            <div class="movie-frame img-wrap"><img src="images/detail_page/movie_stills/<?= $objSteel['photo'] ?>.jpg"></div>
                                        </li>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                        <!-- < 418 -->
                        <div class="row movie-stills d-flex d-xs-flex d-sm-none d-none">
                            <div class="movie-stills-carousel">
                                <div class="carousel-wrap d-flex justify-content-between list-unstyled flex-nowrap">
                                    <?php
                                    $sql = "SELECT `photo` FROM `movie_stills` WHERE `movie_id` = {$_GET['movie_id']}";
                                    $arr = $pdo->query($sql)->fetchAll();
                                    foreach ($arr as $objSteel) {
                                    ?>
                                        <li class="movie">
                                            <div class="movie-frame img-wrap">
                                                <img src="images/detail_page/movie_stills/<?= $objSteel['photo'] ?>.jpg">
                                            </div>
                                        </li>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <?php require_once './tpl/movinon-footer.php' ?>

            <?php require_once './tpl/foot.php' ?>

            <script>
                // ----------actors list carousel----------
                let nowIndex = $(this).index() + 2;

                $('.actors-list-section .prev-btn').click(function() {

                    nowIndex -= 1
                    if (nowIndex < 0) {
                        nowIndex = 0
                    }

                    let nowX = nowIndex * -266 + 'px';
                    $('.actors-list-section .carousel-wrap').css('transform', `translateX(${nowX})`).css('transition', '.6s');
                });

                $('.actors-list-section .next-btn').click(function() {

                    nowIndex += 1
                    if (nowIndex > 6) {
                        nowIndex = 6
                    }

                    let nowX = nowIndex * -266 + 'px';
                    $('.actors-list-section .carousel-wrap').css('transform', `translateX(${nowX})`).css('transition', '.6s');
                });

                // -------------------- hall screen --------------------
                // $(document).ready(function() {
                //         // Change image on selection
                //         $(".movie-stills-carousel .carousel-wrap li img").click(function() {

                //         // Get current image source
                //         const imgSrc = $(this).attr("src");

                //         // Apply grayscale to thumbnails except selected
                //         $(".movie-stills-carousel .carousel-wrap")
                //             .find("img")
                //             .css("filter", "grayscale(1)").css('transition', '.4s');
                //         $(this).css("filter", "none");

                //         // Change image
                //         $('.movie-stills .hall-screen img').attr('src', imgSrc);
                //     });
                // });

                $(document).ready(function() {

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

                    // --------雷標籤------------
                    let sTag = $('div.spoiler-free-tag');
                    let sTagText = $('div.spoiler-free-tag').text();
                    // console.log(sTagText);
                    let spoiler = '雷'

                    sTag.each((i, v) => {
                        if ($(v).text() == spoiler) {
                            sTag.eq(i).addClass('spoiler-tag');
                        };
                    });

                    // Change image on selection
                    var foo = function() {

                        // Get current image source
                        const imgSrc = $(this).attr("src");

                        // Apply grayscale to thumbnails except selected
                        $(".movie-stills-carousel .carousel-wrap")
                            .find("img")
                            .css("filter", "grayscale(1)").css('transition', '.4s');
                        $(this).css("filter", "none");

                        // Change image
                        $('.movie-stills .hall-screen img').attr('src', imgSrc);
                    };

                    $("body").on("click", ".movie-stills-carousel .carousel-wrap li img", foo);

                    // when width() < 418, remove foo
                    $(window).resize(function() {

                        let newWidth = $(window).width();
                        if (newWidth > 418) {
                            $("body").on("click", ".movie-stills-carousel .carousel-wrap li img", foo);
                        } else {
                            $("body").off("click", ".movie-stills-carousel .carousel-wrap li img", foo);
                            $(".movie-stills-carousel .carousel-wrap li img").css("filter", "none");
                        };
                    });
                });

                // -------------------- hall screen carousel --------------------
                $('.movie-stills-carousel .prev-btn').click(function() {

                    nowIndex -= 1
                    if (nowIndex < 0) {
                        nowIndex = 0
                    }

                    let nowX = nowIndex * -232 + 'px';
                    $('.movie-stills-carousel .movie').css('transform', `translateX(${nowX})`).css('transition', '.6s');
                });

                $('.movie-stills-carousel .next-btn').click(function() {

                    nowIndex += 1
                    if (nowIndex > 5) {
                        nowIndex = 5
                    }

                    let nowX = nowIndex * -232 + 'px';
                    $('.movie-stills-carousel .movie').css('transform', `translateX(${nowX})`).css('transition', '.6s');
                });

                // -------------------- word limits --------------------
                const len = 18;
                const ellipsisLight = document.querySelectorAll('.related-articles-section .article-light .d-flex > div');
                const ellipsisDark = document.querySelectorAll('.related-articles-section .article-dark .d-flex > div');

                ellipsisLight.forEach((item) => {
                    if (item.innerHTML.length > len) {
                        let txt = item.innerHTML.substring(0, len) + '...';
                        item.innerHTML = txt;
                    }
                })

                ellipsisDark.forEach((item) => {
                    if (item.innerHTML.length > len) {
                        let txt = item.innerHTML.substring(0, len) + '...';
                        item.innerHTML = txt;
                    }
                })

                // -------------------- icon ticket appear  --------------------
                // $(window).scroll(function() {

                //     if ($(window).scrollTop() > 600) {
                //         $('.fixed-icon-ticket').css('opacity', '1');
                //     } else {
                //         $('.fixed-icon-ticket').css('opacity', '0');
                //     };
                // });

                // -------------------- youtube vedio popup --------------------
                $('.booking-trailer .btn-white-outline').magnificPopup({
                    items: {
                        src: 'https://www.youtube.com/watch?v=1Y8jIMjTP3Y'
                    },
                    type: 'iframe',
                    iframe: {
                        markup: '<div class="mfp-iframe-scaler">' +
                            '<div class="mfp-close"></div>' +
                            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                            '</div>',
                        patterns: {
                            youtube: {
                                index: 'youtube.com/',
                                id: 'v=',
                                src: '//www.youtube.com/embed/%id%?autoplay=1'
                            }
                        },
                        srcAction: 'iframe_src',
                    }
                });
            </script>
            <!-- <script src="js/detail-page.js"></script> -->
        </body>
<?php }
} ?>

</html>