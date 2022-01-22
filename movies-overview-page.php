<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

    <style>
        <?php require_once './css/movies-overview-page.css' ?>
    </style>
</head>

<body>
    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <div class="movies-tab-bar g-section-mb">
            <div class="container">
                <div class="row justify-content-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">現正熱映</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">本週上映</a> 
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">即將上映</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <!-- 修改這裡的 bug，在大螢幕看原因 -->
                    <div class="tab-content flex-grow-1" id="myTabContent">

                        <!-- 現正熱映 -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="content-section g-section-mb">
                                <div class="d-flex justify-content-between position-relative px-0">
                                    <div class="row mb-3">

                                        <!-- 1/5更改 電影資料提取與輸出 -->
                                        <?php
                                        $sql = "SELECT `movie_id`, `poster`, `mName_TC`,  `mName_EN`, `movinon_rate` FROM `movie`WHERE `ov_id`='1' ";
                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                        ?>
                                            <div class="mycard-height col-xl-2 col-lg-3 col-md-4 col-md-4 col-sm-6 col-xs-6 col-6">
                                                <div class="mycard">
                                                    <a href="detail-page.php?movie_id=<?= $obj['movie_id'] ?>">
                                                        <div class="img-wrap">

                                                            <!-- 1/5更改 海報資料輸出 -->
                                                            <img src=".\images\movies_overview_page\現正熱映\<?= $obj['poster'] ?>.jpg ">
                                                        </div>
                                                    </a>

                                                    <div class="mycard-info">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="movie-title">
                                                                <!-- 1/5更改 中文名資料輸出 -->
                                                                <p><span class="sub-title-r"><?= $obj['mName_TC'] ?></span></p>
                                                            </div>

                                                            <div class="rating d-flex">
                                                                <i class="fas fa-star"></i>

                                                                <!-- 1/5更改 評分資料輸出 -->
                                                                <span><?= $obj['movinon_rate'] ?></span>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- 1/5更改 英文名資料輸出 -->
                                                        <p class="italic-16"><?= $obj['mName_EN'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <!-- ---------------------------End--------------------------- -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 本週上映 -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <div class="content-section g-section-mb">
                                <!-- 1/5 class增加container -->
                                <div class="d-flex justify-content-between position-relative px-0">
                                    <div class="d-flex flex-wrap mb-3">

                                        <!-- 1/5更改 電影資料提取與輸出 -->
                                        <?php
                                        $sql = "SELECT `movie_id`, `poster`, `mName_TC`,  `mName_EN`, `movinon_rate` FROM `movie`WHERE `ov_id`='2' ";
                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                        ?>
                                            <div class="mycard-height col-xl-2 col-lg-3 col-md-4 col-md-4 col-sm-6 col-xs-6 col-6">
                                                <div class="mycard">
                                                    <a href="detail-page.php?movie_id=<?= $obj['movie_id'] ?>">
                                                        <div class="img-wrap">

                                                            <!-- 1/5更改 海報資料輸出 -->
                                                            <img src=".\images\movies_overview_page\本週新片\<?= $obj['poster'] ?>.jpg">
                                                        </div>
                                                    </a>

                                                    <div class="mycard-info">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="movie-title">
                                                                <!-- 1/5更改 中文名資料輸出 -->
                                                                <p><span class="sub-title-r"><?= $obj['mName_TC'] ?></span></p>
                                                            </div>

                                                            <div class="rating d-flex">
                                                                <i class="fas fa-star"></i>

                                                                <!-- 1/5更改 評分資料輸出 -->
                                                                <span><?= $obj['movinon_rate'] ?></span>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- 1/5更改 英文名資料輸出 -->
                                                        <p class="italic-16"><?= $obj['mName_EN'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <!-- ---------------------------End--------------------------- -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 即將上映 -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="home-tab">
                            <div class="content-section g-section-mb">
                                <div class="d-flex justify-content-between position-relative px-0">
                                    <div class="row mb-3">
                                        <!-- 1/5更改 電影資料提取與輸出 -->
                                        <?php
                                        $sql = "SELECT `movie_id`, `poster`, `mName_TC`,  `mName_EN`, `movinon_rate` FROM `movie`WHERE `ov_id`='3' ";
                                        $arr = $pdo->query($sql)->fetchAll();
                                        foreach ($arr as $obj) {
                                        ?>
                                            <div class="mycard-height col-xl-2 col-lg-3 col-md-4 col-md-4 col-sm-6 col-xs-6 col-6">
                                                <div class="mycard">
                                                    <a href="detail-page.php?movie_id=<?= $obj['movie_id'] ?>">
                                                        <div class="img-wrap">

                                                            <!-- 1/5更改 海報資料輸出 -->
                                                            <img src=".\images\movies_overview_page\即將上映\<?= $obj['poster'] ?>.jpg ">
                                                        </div>
                                                    </a>

                                                    <div class="mycard-info">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="movie-title">
                                                                <!-- 1/5更改 中文名資料輸出 -->
                                                                <p><span class="sub-title-r"><?= $obj['mName_TC'] ?></span></p>
                                                            </div>

                                                            <div class="rating d-flex">
                                                                <i class="fas fa-star"></i>

                                                                <!-- 1/5更改 評分資料輸出 -->
                                                                <span><?= $obj['movinon_rate'] ?></span>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- 1/5更改 英文名資料輸出 -->
                                                        <p class="italic-16"><?= $obj['mName_EN'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>           
                                        <!-- ---------------------------End--------------------------- -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php require_once './tpl/movinon-footer.php' ?>

    <?php require_once './tpl/foot.php' ?>

    <script>
        const len = 42;
        const ellipsis = document.querySelectorAll('.mycard-info p.italic-16');
        ellipsis.forEach((item) => {
            if(item.innerHTML.length > len) {
                let txt = item.innerHTML.substring(0, len) + '...';
                item.innerHTML = txt;
            }
        });
        gsap.from('.mycard', { duration: 6, opacity: 0, delay: 0.25, stagger: .1, ease: 'elastic' });

    </script>
</body>
</html>