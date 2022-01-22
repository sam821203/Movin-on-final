// ======================================ranking-section======================================

    // 1------ranking-section hover 電影海報，跑出電影資訊
    $('.rank1').hover(function() {
        $('.rank-hover-content1').css('opacity', '1');
        $('.rank1').css('margin-right', '0px').css('margin-left', '32px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content1').css('opacity', '0');
        $('.rank1').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 2------ranking-section hover 電影海報，跑出電影資訊
    $('.rank2').hover(function() {
        $('.rank-hover-content2').css('opacity', '1');
        $('.rank2').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content2').css('opacity', '0');
        $('.rank2').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 3------ranking-section hover 電影海報，跑出電影資訊
    $('.rank3').hover(function() {
        $('.rank-hover-content3').css('opacity', '1');
        $('.rank3').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content3').css('opacity', '0');
        $('.rank3').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 4------ranking-section hover 電影海報，跑出電影資訊
    $('.rank4').hover(function() {
        $('.rank-hover-content4').css('opacity', '1');
        $('.rank4').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content4').css('opacity', '0');
        $('.rank4').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 5------ranking-section hover 電影海報，跑出電影資訊
    $('.rank5').hover(function() {
        $('.rank-hover-content5').css('opacity', '1');
        $('.rank5').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content5').css('opacity', '0');
        $('.rank5').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 6------ranking-section hover 電影海報，跑出電影資訊
    $('.rank6').hover(function() {
        $('.rank-hover-content6').css('opacity', '1');
        $('.rank6').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content6').css('opacity', '0');
        $('.rank6').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 7------ranking-section hover 電影海報，跑出電影資訊
    $('.rank7').hover(function() {
        $('.rank-hover-content7').css('opacity', '1');
        $('.rank7').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content7').css('opacity', '0');
        $('.rank7').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 8------ranking-section hover 電影海報，跑出電影資訊
    $('.rank8').hover(function() {
        $('.rank-hover-content8').css('opacity', '1');
        $('.rank8').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content8').css('opacity', '0');
        $('.rank8').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 9------ranking-section hover 電影海報，跑出電影資訊
    $('.rank9').hover(function() {
        $('.rank-hover-content9').css('opacity', '1');
        $('.rank9').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content9').css('opacity', '0');
        $('.rank9').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // 10------ranking-section hover 電影海報，跑出電影資訊
    $('.rank10').hover(function() {
        $('.rank-hover-content10').css('opacity', '1');
        $('.rank10').css('margin-right', '0px').css('margin-left', '0px').css('z-index', 3000).css('transition', '0.6s');
    }, function() {
        $('.rank-hover-content10').css('opacity', '0');
        $('.rank10').css('margin-right', '16px').css('margin-left', '16px').css('z-index', 1).css('transition', '0.6s');
    });

    // ranking-section 輪播牆
    let nowIndex = $(this).index() + 1;

    $('.next-btn').click(function() {
        
        nowIndex += 1
        if (nowIndex > 4) {
            nowIndex = 4
        }
        
        const nowX = nowIndex * -312 + 'px';
        $('.carousel-wrap').css('transform', `translateX(${nowX})`).css('transition', '.5s');

        // 問題：如何判斷是否已經經過排行第一了，如果有，就將 prev-btn 上層漸層

        // if (nowX = -312) {
        //     $('.prev-btn').css('background-image','linear-gradient(to right, rgba(18,18,18,1), rgba(18,18,18,0))').css('transition','.8s');
        // } else if (nowX = 0) {
        //     $('.prev-btn').css('background-image','linear-gradient(to right, rgba(18,18,18,0), rgba(18,18,18,0))').css('transition','1s');
        // } else if (nowX = -3120) {
        //     $('.next-btn').css('background-image','linear-gradient(to right, rgba(18,18,18,0), rgba(18,18,18,0))').css('transition','1s');
        // }
    });

    $('.prev-btn').click(function() {

        nowIndex -= 1
        if (nowIndex < 0) {
            nowIndex = 0
        }

        const nowX = nowIndex * -312 + 'px';
        $('.carousel-wrap').css('transform', `translateX(${nowX})`).css('transition', '.5s');
    });

    $('.dropdown-toggle').click( function () {
        $('.dropdown-menu.show').css({ top: '30px' });
    });

    // -------------------- word limits --------------------
    // const len = 6;
    // const ellipsis = document.querySelectorAll('.hero .dropdown-menu li a');

    // ellipsisLight.forEach((item) => {
    //     if(item.innerHTML.length > len) {
    //         let txt = item.innerHTML.substring(0, len) + '...';
    //         item.innerHTML = txt;
    //     }
    // })

    $('.tag').click( function () {
        console.log('hi');
     });

    $('#tag_immortal').click( function () {
       console.log('hi1');
    });

    $('#tag_sao').click( function () {
        console.log('hi2');
     });

     $('#tag_trick').click( function () {
        console.log('hi3');
     });

     $('#tag_mha').click( function () {
        console.log('hi4');
     });

     $('#tag_soho').click( function () {
        console.log('hi5');
     });