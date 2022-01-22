let canvas = document.querySelector('canvas');
let ctx = canvas.getContext('2d');
const input = document.querySelector("input");
// const send = document.getElementsByClassName("send")[0];


let tag_txtcolor = $('#dropdownMenuButton').css("color");
let tag_bgcolor = $('#dropdownMenuButton').css("background-color");

let time = 3;
let txt = '';
let color = '';
let texts = []
let f_texts = []


canvas.width = $(window).width();
canvas.height = $(window).height();

$(window).resize(function () {
    canvas.width = $(window).width();
    canvas.height = $(window).height();
})

// $('a').click(function (event) {
//     event.preventDefault();
// })

$('.tag').click(function (event) {
    event.preventDefault();
})

$('.canvas-preview').click(function (event) {
    event.preventDefault();
})


window.onload = function () {

    var f_Interval = setInterval(function () {
        // if (f_display == false) {
        for (var i = 0; i < 1; i++) {
            x = Math.floor(Math.random() * 5);
            f_tag_txtcolor = $('.tag').eq(x).css("color");
            f_tag_bgcolor = $('.tag').eq(x).css("background-color");
            f_tag = $('.tag').eq(x).text();
            arr_f_txt = ["Dumb movie", "必看，快去看", "覺得普普", "大概是今年之最了", "看的很過癮", "好看 星爆!", "兼顧劇情的爽片 ", "還不錯啊", "別再吹了 超難看的片", "搭配音樂的表現方式也令人驚豔", "不懂為什麼分數不高", "Good~~~~~", "Kevin Feige 搞爛了", "每個人的演技都相當好", "我覺得這部電影很舒壓", "微微驚恐", "腦洞開很大 挺有趣的", "覺得不錯", "我睡著三次", "娛樂性十足，瑕不掩瑜"]

            f_texts.push({
                f_tag_txtcolor: f_tag_txtcolor,
                f_tag_bgcolor: f_tag_bgcolor,
                f_id: f_tag,
                f_txt: arr_f_txt[Math.floor(Math.random() * 20)],
                x: canvas.width + (Math.random() * 500),
                y: Math.random() * (canvas.height - 250) + 250,
            })

        }

    }, Math.random() * 5000);
    f_update()
}


// 彈幕開關
$(document).ready(function () {

    $(".inputgroup input[type=checkbox]").bootstrapSwitch({

        onColor: "movieon",

        offColor: "movieoff",

        size: "small", onSwitchChange: function (event, state) {

            if (state == true) {
                $(".dm").show();
            } else {
                $(".dm").hide();
            }
        }
    })
});

// $('button').click (function () {
//     console.log('hi');
// });


// 選擇電影標籤
$('.tag').click(function () {
    tag = $(this).text();
    tag_txtcolor = $(this).css("color");
    tag_bgcolor = $(this).css("background-color");
    tag_width = ctx.measureText(tag).width;
    if (tag != '') {
        $(".send").attr("disabled", false);
        $(".inputbar").attr("placeholder", "說說你的想法吧~")

        // 改變按鈕文字
        $('.tag-selector').text(tag)
        // 改變按鈕樣式
        $('.tag-selector').css('color', tag_txtcolor)
        $('.tag-selector').css('background-color', tag_bgcolor);
    }
});

$(".send").click(function () {
    if ($(window).width() > 418) {
        let message = $("input[name=txt]").val();
        // if (message != '' && tag != '') {

        // 清空文字欄位
        $("input[name=txt]").val('');

        // 訊息加入陣列
        texts.push({
            tag_txtcolor: tag_txtcolor,
            tag_bgcolor: tag_bgcolor,
            id: tag,
            txt: message,
            x: canvas.width,
            y: Math.random() * (canvas.height - 250) + 250,
        })
        // }
        console.log(texts)
    } else {
        let message = $("input[name=txt-418]").val();
        // if (message != '' && tag != '') {

        // 清空文字欄位
        $("input[name=txt-418]").val('');

        // 訊息加入陣列
        texts.push({
            tag_txtcolor: tag_txtcolor,
            tag_bgcolor: tag_bgcolor,
            id: tag,
            txt: message,
            x: canvas.width,
            y: Math.random() * (canvas.height - 250) + 250,
        })
        // }
        console.log(texts)
    }
})


// 背景更換
$(".colorDiv ul li a").click(function () {
    var img = $(this).find('img');
    var src = img.attr('src');
    var backgroundDiv = $(".bg");

    // 改變背景
    backgroundDiv.css("background-image", "url(" + src + ")");

    // 改變預覽圖
    let menu = $(".preview");
    menu.css("background-image", "url(" + src + ")");
});

let display = false;


// function part
function update() {


    for (let i = 0; i < texts.length; i++) {
        texts[i].x -= 3;
        if (texts[i].x < -500) texts.splice(i, 1);

    }

    // 讀取陣列
    texts.forEach((item) => {

        // 圓角矩形
        ctx.beginPath();
        drawRoundRect(ctx, item.x - 14, item.y - 22, ctx.measureText(item.id).width + 28, 30, 15);
        function drawRoundRect(cxt, x, y, width, height, radius) {
            cxt.beginPath();
            cxt.arc(x + radius, y + radius, radius, Math.PI, Math.PI * 3 / 2);
            cxt.lineTo(width - radius + x, y);
            cxt.arc(width - radius + x, radius + y, radius, Math.PI * 3 / 2, Math.PI * 2);
            cxt.lineTo(width + x, height + y - radius);
            cxt.arc(width - radius + x, height - radius + y, radius, 0, Math.PI * 1 / 2);
            cxt.lineTo(radius + x, height + y);
            cxt.arc(radius + x, height - radius + y, radius, Math.PI * 1 / 2, Math.PI);
            cxt.closePath();
            ctx.fillStyle = item.tag_bgcolor;
        }
        ctx.fill()

        ctx.beginPath();
        // 字體、顏色
        ctx.font = "20px Arial";
        ctx.fillStyle = item.tag_txtcolor;
        // 標籤文字內容、定位
        ctx.fillText(item.id, item.x, item.y);
        ctx.closePath();

        ctx.beginPath();
        // 字體、顏色
        ctx.font = "20px Arial";
        ctx.fillStyle = "white";
        // 訊息文字內容、定位
        ctx.fillText(item.txt, item.x + ctx.measureText(item.id).width + 30, item.y);
        ctx.closePath();

        ctx.fill()
    })
    window.requestAnimationFrame(update);
}


let isUpdated = false;

$(".send").click(function () {
    display = false;
    if (!isUpdated) {
        update();
        isUpdated = true;
    }

});

$(".clear").click(function () {
    // display = true;
    // f_display = true;
    f_texts.splice(0, f_texts.length);
    texts.splice(0, texts.length);

})

// fake part
function f_update() {


    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let i = 0; i < f_texts.length; i++) {
        f_texts[i].x -= 3;
        if (f_texts[i].x < -500) f_texts.splice(i, 1);

    }

    // 讀取陣列
    f_texts.forEach((item) => {

        // 圓角矩形
        ctx.beginPath();
        drawRoundRect(ctx, item.x - 14, item.y - 22, ctx.measureText(item.f_id).width + 28, 30, 15);
        function drawRoundRect(cxt, x, y, width, height, radius) {
            cxt.beginPath();
            cxt.arc(x + radius, y + radius, radius, Math.PI, Math.PI * 3 / 2);
            cxt.lineTo(width - radius + x, y);
            cxt.arc(width - radius + x, radius + y, radius, Math.PI * 3 / 2, Math.PI * 2);
            cxt.lineTo(width + x, height + y - radius);
            cxt.arc(width - radius + x, height - radius + y, radius, 0, Math.PI * 1 / 2);
            cxt.lineTo(radius + x, height + y);
            cxt.arc(radius + x, height - radius + y, radius, Math.PI * 1 / 2, Math.PI);
            cxt.closePath();
            ctx.fillStyle = item.f_tag_bgcolor;
        }
        ctx.fill()



        ctx.beginPath();
        // 字體、顏色
        ctx.font = "20px Arial";
        ctx.fillStyle = item.f_tag_txtcolor;
        // 標籤文字內容、定位
        ctx.fillText(item.f_id, item.x, item.y);
        ctx.closePath();

        ctx.beginPath();
        // 字體、顏色
        ctx.font = "20px Arial";
        ctx.fillStyle = "white";
        // 訊息文字內容、定位
        ctx.fillText(item.f_txt, item.x + ctx.measureText(item.f_id).width + 30, item.y);
        ctx.closePath();

        ctx.fill()
    })
    window.requestAnimationFrame(f_update);
}