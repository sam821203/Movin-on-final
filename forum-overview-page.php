<?php require_once './tpl/head.php' ?>
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<style>
    <?php require_once './css/forum-overview-page.css' ?>
</style>

<body>

    <!-- movinon-navbar -->
    <?php require_once './tpl/movinon-navbar.php' ?>

    <main>
        <!-- -----------forum info section----------- -->
        <section class="forum-info-section">
            <div class="container">
                <!-- --------------------display 大於 1200-------------------- -->
                <div class="row d-none d-xl-flex">
                    <div class="col-6">
                        <div class="forum-info-title">
                            <div class="main-header-b">影迷討論區</div>
                            <p class="sub-title-l">本討論區提供電影影評、心得或上映情報之相關分享，或國內外影展、電影獎項、推薦片單等話題討論。</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="forum-info-board">
                            <div class="board-title">
                                <div class="sub-title-m">討論區規定</div>
                            </div>
                            <div class="board-content">
                                <p class="sub-title-r">於本討論區發文，需遵守全站站規與本區規則。違者將刪除文章，累犯將停權 30 天。</p>
                                <p class="body1-r">1. 禁止發文標題爆雷，內文如有爆雷內容<br>
                                    ⚠️ 請於標題最前面加上 #有雷<br>
                                    2. 禁止於無雷文章回應爆雷<br>
                                    3. 禁止發表與本板主旨無關的內容與回應<br>
                                    4. 分享資訊時儘量以官網資訊爲主，且禁止分享營利個人頁面網址<br>
                                    5. 發文前請確認是否重複轉貼文章，若 7 日內有其他人張貼，請勿再次張貼<br>
                                    <br>
                                    ⚠️ 重要聲明：本討論區是以即時上載留言的方式運作，對所有留言的真實性、完整性及立場等，不負任何法律責任。而一切留言之言論只代表留言者個人意見，並非本網站之立場，用戶不應信賴內容，並應自行判斷內容之真實性。於有關情形下，用戶應尋求專業意見(如涉及醫療、法律或投資等問題)。 由於本討論區受到「即時上載留言」運作方式所規限，故不能完全監察所有留言，若讀者發現有留言出現問題，請聯絡我們。有權刪除任何留言及拒絕任何人士上載留言，同時亦有不刪除留言的權利。切勿上傳和撰寫 侵犯版權(未經授權)、粗言穢語、誹謗、渲染色情暴力或人身攻擊的言論，敬請自律。本網站保留一切法律權利。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- --------------------display 小於 418-------------------- -->
                <div class="row d-block d-xl-none">
                    <div class="mycol-12">
                        <div class="forum-info-title">
                            <div class="main-header-b">影迷討論區</div>
                            <p class="sub-title-r">本討論區提供電影影評、心得或上映情報之相關分享，或國內外影展、電影獎項、推薦片單等話題討論。</p>
                        </div>
                    </div>
                    <div class="mycol-12">
                        <div class="forum-info-board">
                            <div class="board-title">
                                <div class="sub-title-m">討論區規定</div>
                            </div>
                            <div class="board-content">
                                <p class="sub-title-r">於本討論區發文，需遵守全站站規與本區規則。違者將刪除文章，累犯將停權 30 天。</p>
                                <p class="body1-r">1. 禁止發文標題爆雷，內文如有爆雷內容<br>
                                    ⚠️ 請於標題最前面加上 #有雷<br>
                                    2. 禁止於無雷文章回應爆雷<br>
                                    3. 禁止發表與本板主旨無關的內容與回應<br>
                                    4. 分享資訊時儘量以官網資訊爲主，且禁止分享營利個人頁面網址<br>
                                    5. 發文前請確認是否重複轉貼文章，若 7 日內有其他人張貼，請勿再次張貼<br>
                                    <br>
                                    ⚠️ 重要聲明：本討論區是以即時上載留言的方式運作，對所有留言的真實性、完整性及立場等，不負任何法律責任。而一切留言之言論只代表留言者個人意見，並非本網站之立場，用戶不應信賴內容，並應自行判斷內容之真實性。於有關情形下，用戶應尋求專業意見(如涉及醫療、法律或投資等問題)。 由於本討論區受到「即時上載留言」運作方式所規限，故不能完全監察所有留言，若讀者發現有留言出現問題，請聯絡我們。有權刪除任何留言及拒絕任何人士上載留言，同時亦有不刪除留言的權利。切勿上傳和撰寫 侵犯版權(未經授權)、粗言穢語、誹謗、渲染色情暴力或人身攻擊的言論，敬請自律。本網站保留一切法律權利。
                                </p>
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
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="red-line"></div>
                            <span class="section-header-b">精選討論區</span>
                        </div>
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

                <!-- -------------------下------------------- -->
                <div class="row row3">
                    <div class="col-3">
                        <a href="#">
                            <div class="img-wrap card-6">
                                <img src="images/forum_overview_page/card_6.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">迷離夜蘇活</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-6-count">+<span class="count">119</span></span>
                                </div>
                                <div class="hover-gradient-card6"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-9">
                        <div class="col-12 inner-row1">
                            <div class="col-4">
                                <a href="#">
                                    <div class="img-wrap card-7">
                                        <img src="images/forum_overview_page/card_7.jpg" alt="">
                                        <div class="content">
                                            <div class="section-header-r">詭扯</div>
                                            <span class="body1-b">Today</span><span class="caption-12 com-count com-7-count">+<span class="count">45</span></span>
                                        </div>
                                        <div class="hover-gradient-card7"></div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-8 inner-row2">
                                <a href="#">
                                    <div class="img-wrap card-8">
                                        <img src="images/forum_overview_page/card_8.jpg" alt="">
                                        <div class="content">
                                            <div class="section-header-r">瀑布</div>
                                            <span class="body1-b">Today</span><span class="caption-12 com-count com-8-count">+<span class="count">102</span></span>
                                        </div>
                                        <div class="hover-gradient-card8"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="col-8">
                                <a href="#">
                                    <div class="img-wrap card-9">
                                        <img src="images/forum_overview_page/card_9.jpg" alt="">
                                        <div class="content">
                                            <div class="section-header-r">永恆族</div>
                                            <span class="body1-b">Today</span><span class="caption-12 com-count com-9-count">+<span class="count">296</span></span>
                                        </div>
                                        <div class="hover-gradient-card9"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <div class="img-wrap card-10">
                                        <img src="images/forum_overview_page/card_10.jpg" alt="">
                                        <div class="content">
                                            <div class="section-header-r">金牌特務</div>
                                            <span class="body1-b">Today</span><span class="caption-12 com-count com-10-count">+<span class="count">166</span></span>
                                        </div>
                                        <div class="hover-gradient-card10"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------display 小於 1200-------------------- -->
            <div class="container d-sm-block d-xl-none">
                <div class="row subtitle g-subtitle-mb">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="red-line"></div>
                            <span class="section-header-b">精選討論區</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_1_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">再說一次我願意</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-1-count">+<span class="count">74</span></span>
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
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-2-count">+<span class="count">189</span></span>
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
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-3-count">+<span class="count">334</span></span>
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
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-4-count">+<span class="count">138</span></span>
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
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-5-count">+<span class="count">60</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_6_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">迷離夜蘇活</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-6-count">+<span class="count">13</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_7_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">詭扯</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-7-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_8_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">瀑布</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-8-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_9_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">永恆族</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-9-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mycol-6 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/card_10_1200.jpg" alt="">
                                <div class="content">
                                    <div class="section-header-r">金牌特務</div>
                                    <span class="body1-b">Today</span><span class="caption-12 com-count com-10-count">+<span class="count">134</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- -----------forum cat section----------- -->
        <section class="forum-cat-section g-section-mb">
            <div class="container">
                <div class="row subtitle g-subtitle-mb">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="red-line"></div>
                            <span class="section-header-b my-auto">分類討論區</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_1.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">冒險</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">冒險</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_2.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">奇幻</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">奇幻</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_3.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">科幻</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">科幻</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_4.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">恐怖</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">恐怖</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_5.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">懸疑</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">懸疑</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_6.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">犯罪</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">犯罪</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_7.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">戰爭</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">戰爭</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3 card-md">
                        <a href="#">
                            <div class="img-wrap">
                                <img src="images/forum_overview_page/forum_cat_8.jpg" alt="">
                                <div class="content d-none d-lg-block d-xl-block">
                                    <div class="section-header-r">記錄</div>
                                </div>
                                <div class="content d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="sub-title-m">記錄</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once './tpl/movinon-footer.php' ?>

    <?php require_once './tpl/foot.php' ?>

    <script src="js/custom.js"></script>

    <script>
        $(".count").each(function() {
        $(this)
          .prop("Counter", 0)
          .animate(
            {
              Counter: $(this).text()
            },
            {
              duration: 4000,
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