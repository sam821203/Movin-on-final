<?php require_once 'db.inc.php'; ?>
<?php session_start() ?>
<?php require_once './tpl/head.php' ?>

<style>
    <?php require_once './css/member-center-page.css' ?>
</style>

<body>
    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <section class="boards-section">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="member-l-info">
                            <div class="avatar d-flex justify-content-center">
                                <?php $sql = " SELECT `avatar`,`name` FROM `users` WHERE `email` = '{$_SESSION['email']}' ";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $objMember) { ?>
                                    <div class="img-wrap">
                                        <?php if (!isset($_SESSION['name'])) { ?>
                                            <img src="images/forum_article_page/aside-avatar-1.jpg" alt="">
                                        <?php } ?>
                                        <?php if (isset($_SESSION['name'])) { ?>

                                            <img src=".\images\avatar\<?= $objMember['avatar'] ?>.jpg" >
                                        <?php } ?>
                                    </div>
                            </div>
                            <div class="name sub-title-b d-flex justify-content-center"><?= $objMember['name'] ?></div>
                        <?php } ?>
                        <div class="membership">
                            <span class="inner-content">
                                <i class="fas fa-address-card"></i><span class="body2-r">白金</span>
                            </span>
                        </div>
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
                        </div>

                        <div class="member-l-setting">
                            <div class="setting-row setting-row-select">
                                <div class="d-flex align-items-center">
                                    <div class="img-wrap">
                                        <img src="images/icon_ticket_outline.svg" alt="">
                                    </div>
                                    <span>我的票夾</span>
                                </div>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="ticket-count body2-r"><span class="count">3</span>部</div>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="setting-row">
                                <div class="d-flex align-items-center">
                                    <div class="img-wrap">
                                        <img src="images/icon_like.svg" alt="">
                                    </div>
                                    <span>文章蒐藏</span>
                                </div>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="setting-row">
                                <div class="d-flex align-items-center">
                                    <div class="img-wrap">
                                        <img src="images/icon_comment_notice.svg" alt="">
                                    </div>
                                    <span>留言追蹤</span>
                                </div>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="setting-row">
                                <div class="d-flex align-items-center">
                                    <div class="img-wrap">
                                        <img src="images/icon_article.svg" alt="">
                                    </div>
                                    <span>發文記錄</span>
                                </div>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="ticket-count body2-r"><span class="count">3</span>篇</div>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="setting-row">
                                <div class="d-flex align-items-center">
                                    <div class="img-wrap">
                                        <img src="images/icon_credit_card.svg" alt="">
                                    </div>
                                    <span>信用卡設定</span>
                                </div>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="setting-row">
                                <div class="d-flex align-items-center">
                                    <div class="img-wrap">
                                        <img src="images/icon_setting.svg" alt="">
                                    </div>
                                    <span>設定</span>
                                </div>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="member-r-board">
                            <!-- 票券 -->
                            <?php 
                            $sql = "SELECT * FROM `orders_pay` WHERE `email` = '{$_SESSION['email']}'";
                            $arr = $pdo->query($sql)->fetchAll();
                            foreach ($arr as $obj) {
                            ?>
                            <a href="member-center-page-myticket.php?order_id_parent=<?= $obj['order_id_parent']?>">
                            <div class="myticket">
                                <div class="ticket-img-wrap">
                                    <img src="images/ticket_single.svg" alt="">
                                </div>
                                <div class="ticket-card">
                                    <div class="poster-img-wrap">
                                        <img src="images/payment_page/<?= $obj['ticket_poster']?>.jpg" alt="">
                                    </div>
                                    <div class="content">

                                        <p class="order-num">訂單編號：<?= $obj['order_id_parent']?></p>

                                        <div class="content-row col-12 d-flex justify-content-between">
                                            <div>
                                                <div class="section-header-b"><?= $obj['movie_TC']?></div>
                                                <div class="title-en"><?= $obj['movie_EN']?></div>
                                            </div>
                                            <div class="d-flex align-items-start">
                                                <span class="pg-rate"><?= $obj['pg_rate']?></span>
                                            </div>
                                        </div>

                                        <div class="content-row">
                                            <div>
                                                <div class="body2-r">訂單時間</div>
                                                <div class="body2-b"><?= $obj['created_at']?></div>
                                            </div>
                                            <div>
                                                <div class="body2-r">票夾張數</div>
                                                <div class="body2-b"><?= $obj['count']?>張</div>
                                            </div>
                                            <!-- <div>
                                                <div class="body2-r">金額</div>
                                                <div class="body2-b">$NT<?= $obj['total']?></div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <?php }?>

                            <!-- 票券 -->
                        </div>
                    </div>
                </div>
        </section>
    </main>

    <?php require_once './tpl/foot.php' ?>

    <script src=""></script>

</body>

</html>