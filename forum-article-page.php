<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>


<style>
    <?php require_once './css/forum-article-page.css' ?>
</style>

<body>
    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <div class="main-article">
            <div class="container">
                <div class="row">
                    <!-- 01/12 更改 文章欄資料提取  -->
                    <?php
                    if (isset($_GET['id'])) {
                        $sql = "SELECT `article_cat`, `title`, `article`,`thumb_num`, `article_photo`, `spoiler_tag`, `thumb_num`, `member_id`, `article_id`, `article_date` FROM `spider_forum_article` WHERE `id`={$_GET['id']}";
                        $arr = $pdo->query($sql)->fetch();
                    }
                    ?>

                    <div class="left-side-section col-lg-12 col-xl-9">
                        <!-- left side article -->
                        <div class="left-side-article">
                            <p class="body1-r"><span class="date body1-m"><?= $arr['article_date'] ?></span>by<a href="">
                            <?php foreach ($_SESSION['Author'] as $key => $obj) { ?>
                                <span class="author-name"><?= $obj['Author_Name']?></a>
                                <?php } ?>
                            </span></p>
                            <p class="section-header-b"><?= $arr['title'] ?></p>
                            <div class="article-extra-info d-flex align-items-center">
                                <span class="arti-cat-tag g-tag g-tag"><?= $arr['article_cat'] ?></span><span class="spoiler-free-tag"><?= $arr['spoiler_tag'] ?></span>
                            </div>

                            <div class="article-content">
                                <p class="sub-title-r"><?= nl2br($arr['article']) ?></p>

                                <div class="img-wrap">
                                    <img src="images/forum_masonry_page/<?= $arr['article_photo'] ?>.jpg" alt="">
                                </div>
                            </div>

                            <div class="comment-data d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <a href="#">
                                        <div class="thumbs-up">
                                            <i class="fas fa-thumbs-up"></i><span><?= $arr['thumb_num'] ?></span>
                                        </div>
                                    </a>

                                    <!-- 01/12 更改 留言筆數提取  -->
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $comment = "SELECT COUNT(*) FROM `comment` WHERE `title_id`={$_GET['id']}";
                                        $total = $pdo->query($comment)->fetch();
                                    }
                                    ?>

                                    <!-- 01/12 更改 留言筆數置入  -->
                                    <a href="#">
                                        <div class="comment">
                                            <span><i class="far fa-comment"></i><?= $total['COUNT(*)'] ?></span>
                                        </div>
                                    </a>
                                </div>
                                <a href="#">
                                    <div class="share">
                                        <span><i class="fas fa-share-square"></i>分享</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- left side comment -->
                        <div class="left-side-comment g-section-mb">
                            <div class="d-flex justify-content-center sub-title-r">
                                <span class="comment-count sub-title-b"><?php echo ($total['COUNT(*)']) ?></span>
                                <span class="comments">Comments</span>
                            </div>

                            <!-- 0110 更改 增加篩選選單 -->
                            <ul class="nav justify-content-end nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">時間順序</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">熱門留言</a>
                                </li>
                            </ul>

                            <!-- 0110 更改 增加篩選欄位 -->
                            <div class="tab-content flex-grow-1" id="myTabContent">

                                <!-- 0110 更改 增加時間篩選欄位 -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <!-- 01/12 更改 留言資料提取  -->
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $sql =
                                            "SELECT `comment_id`,`comment_content`,`like_num_cm`,`create_time`,`name`,`avatar` FROM `comment` 
                                            INNER JOIN `users` ON `comment`.`member_id` = `users`.`member_id` 
                                            WHERE `title_id`= {$_GET['id']}";

                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                    ?>

                                            <!-- ------------------第一則留言 comment------------------ -->
                                            <div class="comment">
                                                <div class="avatar">
                                                    <div class="img-wrap">
                                                        <img src=".\images\avatar\<?= $obj['avatar'] ?>.jpg">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="member-info">
                                                            <a href="#">
                                                                <span class="member-name sub-title-b"><?= $obj['name'] ?></span>
                                                            </a>
                                                            <i class="far fa-clock"></i><span class="timestamp"><?= $obj['create_time'] ?></span>
                                                        </div>
                                                        <a href="#">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <?= $obj['comment_content'] ?>
                                                    </p>
                                                    <div class="response d-flex justify-content-end">
                                                        <div class="icon-like d-flex align-items-end">
                                                            <!-- 01/12 更改 會員按攢紀錄資料提取  -->
                                                            <?php
                                                            if (isset($_SESSION['member_id'])) {
                                                                $like = "SELECT `like` FROM `user_like`  WHERE `title_id`={$_GET['id']} AND `comment_id`={$obj['comment_id']} AND `member_id`={$_SESSION['member_id']}";
                                                                $ab = $pdo->query($like)->fetch();
                                                            }
                                                            ?>
                                                            <a class="thumb thumb-<?= $ab['like'] ?>" href="<?= $obj['comment_id'] ?>"><i class="fas fa-thumbs-up"></i></a><span class="like-count"><?= $obj['like_num_cm'] ?></span>
                                                        </div>
                                                        <div class="reply">
                                                            <a href="#"><span>回覆</span></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <!-- 這裡 -->
                                <!-- 0110 更改 增加時間篩選欄位 -->
                                <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="home-tab">

                                    <!-- 01/12 更改 留言資料提取  -->
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $sql =
                                            "SELECT `comment_id`,`comment_content`,`like_num_cm`,`create_time`,`name`,`avatar` FROM `comment` INNER JOIN `users` ON `comment`.`member_id` = `users`.`member_id` WHERE `title_id`= {$_GET['id']} ORDER BY `like_num_cm` DESC ";

                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                    ?>

                                            <?php
                                            if (isset($_GET['id'])) {
                                                $comment = "SELECT COUNT(*) FROM `comment` WHERE `title_id`={$_GET['id']}";
                                                $total = $pdo->query($comment)->fetch();
                                            }
                                            ?>

                                            <!-- ------------------第一則留言 comment------------------ -->
                                            <div class="comment comment-1">
                                                <div class="avatar">
                                                    <div class="img-wrap">
                                                        <img src=".\images\avatar\<?= $obj['avatar'] ?>.jpg">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="member-info">
                                                            <a href="#">
                                                                <span class="member-name sub-title-b"><?= $obj['name'] ?></span>
                                                            </a>
                                                            <i class="far fa-clock"></i><span class="timestamp"><?= $obj['create_time'] ?></span>
                                                        </div>
                                                        <a href="#">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </a>
                                                    </div>

                                                    <p>
                                                        <?= $obj['comment_content'] ?>
                                                    </p>

                                                    <div class="response d-flex justify-content-end">
                                                        <div class="d-flex align-items-end">
                                                            <!-- 01/12 更改 會員按攢紀錄資料提取  -->
                                                            <?php
                                                            if (isset($_SESSION['member_id'])) {
                                                                $like = "SELECT `like` FROM `user_like`  WHERE `title_id`={$_GET['id']} AND `comment_id`={$obj['comment_id']} AND `member_id`={$_SESSION['member_id']}";
                                                                $a = $pdo->query($like)->fetch();
                                                            }
                                                            ?>
                                                            <a class="thumb thumb-<?= $a['like'] ?>" href="<?= $obj['comment_id'] ?>"><i class="fas fa-thumbs-up"></i></a><span class="like-count"><?= $obj['like_num_cm'] ?></span>
                                                        </div>
                                                        <div class="reply">
                                                            <a href="#"><span>回覆</span></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- 01/12 更改 留言欄會員資料提取  -->
                            <?php
                            if (isset($_SESSION['email'])) {
                                $sql = "SELECT `avatar`,`member_id` FROM `users`  WHERE `email`='{$_SESSION['email']}' ";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $obj) {
                            ?>
                                    <div class="write-comment">
                                        <div class="avatar">
                                            <div class="img-wrap">
                                                <img class="user_identify" id="<?= $obj['member_id'] ?>" src=".\images\avatar\<?= $obj['avatar'] ?>.jpg">

                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="form-group">
                                                <textarea class="form-control comment-txt" id="exampleFormControlTextarea1" rows="3" placeholder="寫些什麼"></textarea>
                                            </div>

                                            <div class="d-flex justify-content-end align-items-end">
                                                <button type="submit" class="comment-send btn-brand-left-comment mr-0">送出</button>
                                            </div>
                                        </div>


                                    </div>
                                <?php

                                }
                            } else { ?>
                                <div class="write-comment">

                                    <div class="form">
                                        <div class="form-group">
                                            <textarea class="form-control comment-txt" id="exampleFormControlTextarea1" rows="3" placeholder="寫些什麼"></textarea>
                                        </div>

                                        <div class="d-flex justify-content-end align-items-end">
                                            <button type="submit" class="comment-send btn-brand-left-comment mr-0 " disabled>登入後才可留言喔</button>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>


                    <div class="aside-section col-xl-3">

                        <div class="d-none d-lg-none d-xl-block col-xl-12 aside-ads">
                            <a href="#">
                                <div class="img-wrap">
                                    <img src="images/forum_article_page/ads_img.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="d-none d-lg-none d-xl-block col-xl-12 aside-member-info">
                        <?php foreach ($_SESSION['Author'] as $key => $obj) { ?>
                            <div class="avatar d-flex justify-content-center">
                                <div class="img-wrap">
                                    <img src=".\images\avatar\<?= $obj['Author_Avatar']?>.jpg" alt="">
                                </div>
                            </div>
                            <div class="name sub-title-b d-flex justify-content-center"><?= $obj['Author_Name']?></div>
                            <?php }?>
                            <div class="membership">
                                <span class="inner-content">
                                    <i class="fas fa-address-card"></i><span class="body2-r">白金</span>
                                </span>
                            </div>
                            <p class="description body2-r">
                                從早期BBS起家，之後開始經營電影部落格，並在許多媒體撰寫影評相關文章的草根寫手。從觀眾的角度出發，希望能協助大家找到適合自己的電影。
                            </p>
                            <div class="social-media">
                                <a href="#">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter-square"></i>
                                </a>
                            </div>
                            <div class="extra-info">
                                <div class="ticket">
                                    <div class="ticket-count roboto-condensed">16</div>
                                    <div class="my-ticket">我的票夾</div>
                                </div>

                                <div class="post">
                                    <div class="ticket-count roboto-condensed">5</div>
                                    <div class="my-post">發文記錄</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-lg-none d-xl-block aside-related-articles">
                            <div class="d-flex subtitle g-subtitle-mb">
                                <div class="d-flex">
                                    <div class="red-line my-auto"></div>
                                    <span class="section-header-b">相關看板文章</span>
                                </div>
                            </div>

                            <!-- ------------第一篇相關文章------------ -->
                            <?php
                            if (isset($_GET['id'])) {
                                $sql = "SELECT `id`,`article_cat`, `title`, `article_photo`, `spoiler_tag`, `article_id` FROM `spider_forum_article` WHERE `movie_id`='73' LIMIT 25,5";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $obj) {
                            ?>
                                    <a href="./forum-article-page.php?id=<?= $obj['id'] ?>">
                                        <div class="related-articles">
                                            <div class="content">
                                                <div class="d-flex tags">
                                                    <div class="spoiler-free-tag body2-r"><span><?= $obj['spoiler_tag'] ?></span></div>
                                                    <div class="arti-cat-tag g-tag body2-r"><?= $obj['article_cat'] ?></div>
                                                </div>
                                                <p><?= $obj['title'] ?></p>
                                            </div>
                                            <div class="img-wrap">
                                                <img src="images/forum_masonry_page/<?= $obj['article_photo'] ?>.jpg" alt="">
                                            </div>
                                        </div>
                                    </a>
                            <?php }
                            } ?>
                        </div>
                        <!-- 小於 418 後顯示 -->
                        <div class="d-block d-lg-block d-xl-none aside-related-articles g-section-mb">
                            <div class="subtitle g-subtitle-mb">
                                <div class="mycol-6 d-flex">
                                    <div class="red-line my-auto"></div>
                                    <span class="section-header-b">相關看板文章</span>
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

                            <!-- ------------第一篇相關文章------------ -->
                            <div class="d-flex flex-wrap">
                                <?php
                                if (isset($_GET['id'])) {
                                    $sql = "SELECT `id`,`article_cat`, `title`, `article_photo`, `spoiler_tag`, `article_id` FROM `spider_forum_article` WHERE `movie_id`='73' LIMIT 25,5";
                                    $arr = $pdo->query($sql)->fetchAll();
                                    foreach ($arr as $obj) {
                                ?>
                                        <div class="mycol-12">
                                            <a href="./forum-article-page.php?id=<?= $obj['id'] ?>">
                                                <div class="related-articles d-flex">
                                                    <div class="mycol-9 content">
                                                        <div class="d-flex tags">
                                                            <div class="spoiler-free-tag body2-r"><span><?= $obj['spoiler_tag'] ?></span></div>
                                                            <div class="arti-cat-tag g-tag body2-r"><?= $obj['article_cat'] ?></div>
                                                        </div>
                                                        <p><?= $obj['title'] ?></p>
                                                    </div>
                                                    <div class="mycol-3 img-wrap">
                                                        <img src="images/forum_masonry_page/<?= $obj['article_photo'] ?>.jpg" alt="">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- movinon footer -->
    <!-------- < 1920 -------->
    <footer class="mt-5 d-none d-md-none d-xl-block">
        <div class="movinon-footer">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="img-wrap">
                            <img src="images/logotype.svg" alt="">
                        </div>
                        <div class="our-info">
                            <p><a href="">movin'on@cinema.com</a></p>
                            <p>call us <span class="body1-r">(02) 888 899 999</span></p>
                        </div>
                        <div class="footer-icons">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <h4 class="sub-title-b">關於我們</h4>
                        <p><a href="#">集團介紹</a></p>
                        <p><a href="#">加入我們</a></p>
                        <p><a href="#">新聞中心</a></p>
                        <p><a href="#">我們的團隊</a></p>
                        <p><a href="#">FAQ</a></p>
                    </div>
                    <div class="col">
                        <h4 class="sub-title-b">條款與政策</h4>
                        <p><a href="#">隱私條款</a></p>
                        <p><a href="#">使用條款</a></p>
                        <p><a href="#">付費內容服務條款</a></p>
                        <p><a href="#">編輯獨立聲明</a></p>
                        <p><a href="#">廣告內容政策</a></p>
                    </div>
                    <div class="col">
                        <h4 class="sub-title-b">影迷互動</h4>
                        <p><a href="#">熱門討論區</a></p>
                        <p><a href="#">影迷討論區</a></p>
                        <p><a href="#">討論區規定</a></p>
                        <p><a href="#">會員中心</a></p>
                    </div>
                    <div class="col">
                        <h4 class="sub-title-b">最新電影資訊</h4>
                        <p><a href="#">查詢時刻表</a></p>
                        <p><a href="#">現正熱映</a></p>
                        <p><a href="#">本周新片</a></p>
                        <p><a href="#">即將上映</a></p>
                        <p><a href="#">新片預告</a></p>
                    </div>
                    <div class="col-12">
                        <a href="">
                            <p class="copyright body2-r">Copyright © 2021 movin'on All Rights Reserved.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-------- < 418 -------->
    <footer class="mt-5 d-block d-sm-block d-xl-none d-none">
        <div class="movinon-footer">
            <div class="container">
                <div class="row">
                    <div class="w-100">
                        <div class="img-wrap">
                            <img src="images/logotype.svg" alt="">
                        </div>

                        <div class="our-info">
                            <div class="mb-2"><a href="">movin'on@cinema.com</a></div>
                            <div>call us <span class="body1-r">(02) 888 899 999</span></div>
                        </div>

                        <div class="footer-icons">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                        </div>
                        <div class="footer-info">
                            <div class="divide-line d-flex justify-content-between align-items-center">
                                <h4>關於我們</h4>
                                <i class="fas fa-chevron-down body1-r"></i>
                            </div>
                            <div class="divide-line d-flex justify-content-between align-items-center">
                                <h4>條款與政策</h4>
                                <i class="fas fa-chevron-down body1-r"></i>
                            </div>
                            <div class="divide-line d-flex justify-content-between align-items-center">
                                <h4>影迷互動</h4>
                                <i class="fas fa-chevron-down body1-r"></i>
                            </div>
                            <div class="divide-line divide-line-bottom d-flex justify-content-between align-items-center">
                                <h4>最新電影資訊</h4>
                                <i class="fas fa-chevron-down body1-r"></i>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <p class="copyright body2-r">Copyright © 2021 movin'on All Rights Reserved.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <?php require_once './tpl/foot.php' ?>

    <!-- forum-comment -->
    <script src="./js/forum-comment.js"></script>

    <!-- thumbsup -->
    <script src="./js/thumbsup.js"></script>

    <script>
        $('.thumb').click(function() {
            if ($(this).hasClass("animate__animated animate__heartBeat")) {
                $(this).removeClass("animate__animated animate__heartBeat")
            } else {
                $(this).addClass('animate__animated animate__heartBeat');
            }
        })

        $(document).ready(function() {
            let sTag = $('.spoiler-free-tag');
            // console.log(sTagText);
            let spoiler = '雷'

            sTag.each((i, v) => {
                if ($(v).text() == spoiler) {
                    sTag.eq(i).addClass('spoiler-tag');
                };
            });
        });

        const len = 20;
                const ellipsisLight = document.querySelectorAll('.related-articles .content > p');

                ellipsisLight.forEach((item) => {
                    if (item.innerHTML.length > len) {
                        let txt = item.innerHTML.substring(0, len) + '...';
                        item.innerHTML = txt;
                    };
                });
    </script>

</body>

</html>