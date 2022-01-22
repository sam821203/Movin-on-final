<?php require_once 'db.inc.php'; ?>
<?php session_start() ?>
<?php require_once './tpl/head.php' ?>

<style>
    <?php require_once './css/member-center-page.css' ?>

    body {
        background: url("images/member_center_page/bg_img.jpg") top center no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%;
    }

    .boards-section .container {
        margin-top: 200px;
    }

    /* -------------------------member l info------------------------- */
    .member-l-info {
        padding: 16px 0 32px 0;
        margin-bottom: 32px;
        font-size: 14px;
    }

    .member-l-info,
    .member-l-setting,
    .member-r-board {
        background-color: rgba(18, 18, 18, 0.9);
        border-radius: var(--border-radius-8);
        box-shadow: var(--box-shadow-card-lg);
    }

    .member-l-info .img-wrap {
        width: 208px;
        margin: 32px 0 16px 0;
        padding: 0 40px;
    }

    .member-l-info .img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        border-radius: var(--border-radius-50-percent);
    }

    .member-l-info .name {
        margin-bottom: 8px;
        padding: 0 40px;
    }

    .member-l-info .membership {
        margin-bottom: 24px;
        display: flex;
        justify-content: center;
    }

    .member-l-info .inner-content {
        padding: 4px 12px;
        margin-bottom: 24px;
        border: 0.75px solid white;
        border-radius: var(--border-radius-50);
        margin: 0 auto;
    }

    .member-l-info .inner-content i {
        margin-right: 8px;
    }

    .member-l-info p.body2-r {
        line-height: 170%;
        opacity: var(--opacity-75);
    }

    .member-l-info .social-media {
        display: flex;
        justify-content: space-between;
        padding: 0 72px;
        font-size: 32px;
        opacity: var(--opacity-50);
    }

    /* -------------------------setting row------------------------- */
    .member-l-setting .setting-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 32px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.25);
    }

    .member-l-setting div:nth-child(6) {
        border-bottom: none;
    }

    .member-l-setting .fa-chevron-right {
        margin-top: 2px;
    }

    .member-l-setting .setting-row .img-wrap {
        width: 28px;
        margin-right: 12px;
        display: flex;
    }

    .member-l-setting .setting-row .img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 50% 50%;
    }

    .member-l-setting .setting-row .body2-r {
        opacity: var(--opacity-50);
    }

    .member-l-setting .setting-row .ticket-count {
        margin-right: 12px;
    }

    .member-l-setting .setting-row .fa-chevron-right {
        opacity: var(--opacity-75);
    }


    /* -------------------------member r board------------------------- */
    .member-r-board {
        background-color: rgba(18, 18, 18, 0.9);
        height: 768px;
        overflow: auto;
        display: flex;
        flex-wrap: wrap;
        padding: 48px 38px 24px 38px;
    }

    /* -------------0113-ticket---------------- */
    .myticket {
        position: relative;
        margin: 0 16px 32px 16px;
    }

    .myticket .ticket-img-wrap {
        width: 256px;
        border-radius: 50px;
        box-shadow: var(--box-shadow-black);
    }

    .myticket .ticket-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
    }

    .myticket .poster-img-wrap {
        width: 256.1px;
        position: absolute;
        top: 42px;
        left: 0;
    }

    .myticket .poster-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
    }

    .myticket .ticket-card {
        width: 100%;
    }

    .myticket .content {
        position: absolute;
        top: 16px;
        left: 0px;
        padding: 0 24px;
        max-width: 256px;
        color: #121212;
        font-family: 'Roboto Condensed', sans-serif;
    }

    .myticket .content .body2-r {
        opacity: var(--opacity-50);
    }

    .myticket .content .section-header-b {
        margin-bottom: 4px;
        font-size: 20px;
        font-weight: 700;
    }

    .myticket .content .order-num {
        color: rgba(18, 18, 18, 0.5);
        font-size: 14px;
        margin-bottom: 200px;
    }

    .myticket .content .title-en {
        opacity: var(--opacity-50);
    }

    .myticket .content .col-12 {
        padding: 0;
    }

    .myticket .content-row {
        width: 208px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .myticket .qrcode{
        position: absolute;
        top:108%;
        left:18%
    }

    .myticket .content-row .sub-title-b {
        font-size: 16px;
        font-weight: 400;
        opacity: .9;
    }

    .myticket .pg-rate {
        font-size: 14px;
        padding: 2px 8px;
        border-radius: var(--border-radius-50);
        border: 1px solid rgba(18, 18, 18, 0.5);
        color: rgba(18, 18, 18, 0.5);
    }
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
                                        <img src="images/ticket.svg" alt="">
                                    </div>
                                    <span>我的票夾</span>
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
                    
                    <?php if (isset($_GET['order_id_parent'])) { ?>
                        <div class="col-9">
                            <div class="member-r-board">
                                <!-- 票券 -->
                                <?php
                                $sql = "SELECT * FROM `orders` WHERE `order_id_parent` = {$_GET['order_id_parent']}";
                                $arr = $pdo->query($sql)->fetchAll();
                                foreach ($arr as $obj) {
                                ?>
                                    <div class="myticket">
                                        <div class="ticket-img-wrap">
                                            <img src="images/ticket_code.svg" alt="">
                                        </div>
                                        <div class="ticket-card">
                                            <div class="poster-img-wrap">
                                                <img src="images/payment_page/<?= $obj['ticket_poster'] ?>.jpg" alt="">
                                            </div>
                                            <div class="content">

                                                <p class="order-num">訂單編號：<?= $obj['order_id'] ?></p>

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
                                                    <div>
                                                        <div class="body2-r mb-1">影城</div>
                                                        <div class="sub-title-b"><?= $obj['cinema'] ?></div>
                                                    </div>
                                                    <div>
                                                        <div class="body2-r mb-1">座位</div>
                                                        <div class="sub-title-b"><?= $obj['seat'] ?></div>
                                                    </div>
                                                </div>

                                                <div class="content-row">
                                                    <div>
                                                        <div class="body2-r">日期</div>
                                                        <div class="body2-b">2022年<?= $obj['date'] ?></div>
                                                    </div>
                                                    <div>
                                                        <div class="body2-r">場次</div>
                                                        <div class="body2-b"><?= $obj['showtime'] ?></div>
                                                    </div>
                                                    <div>
                                                        <div class="body2-r">類型</div>
                                                        <div class="body2-b"><?= $obj['screen'] ?></div>
                                                    </div>
                                                </div>
                                                <div class="content-row qrcode">
                                                    <div class="body2-b">
                                                        <img src="<?= $obj['qrcode'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- 票券 -->
                            </div>
                        </div>
                    <?php } ?>
                </div>
        </section>
    </main>

    <?php require_once './tpl/foot.php' ?>

    <script src=""></script>

</body>

</html>