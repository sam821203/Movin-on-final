// 0110 按讚變色、取值、改寫SQL

$(document).ready(function () {

    $("a.thumb-on").css("color", "rgb(245, 61, 61)")
    
    })
    
$(".thumb").click(function (event) {
    event.preventDefault()

    let thumb_color = $(this);
    let comment_index = $(this).index(".thumb")

    //取消讚
    if (thumb_color.css("color") == "rgb(245, 61, 61)") {

        thumb_color.css("color", "#fff")
        thumb_color.css("none")

        let count_like = parseInt($(".like-count").eq(comment_index).text(), 10) - 1
        $(".like-count").eq(comment_index).text(count_like)
        let comment_id = $(this).attr('href')
        let like = "off"
        let member_id = $(".user_identify").attr('id')
        // console.log (count_like)
        // console.log (comment_id)

        let objComment = {
            count_like: count_like,
            comment_id: comment_id,
            like: like,
            member_id: member_id
        };
        console.log(objComment)
        $.post("insertThumbsCount.php", objComment, function (obj) {
            // if (obj['success']) {
            //     alert('送出成功');

            // } else {
            //     alert(`${obj['info']}`);
            // }
        }, 'json')

    } else {
        // 按讚    
        thumb_color.css("color", "#F53D3D")
        thumb_color.css("box-shadow", "0px 0px 32px rgba(245, 61, 61, 0.2)")

        let count_like = parseInt($(".like-count").eq(comment_index).text(), 10) + 1
        $(".like-count").eq(comment_index).text(count_like)
        let comment_id = $(this).attr('href')
        let like = "on"
        let member_id = $(".user_identify").attr('id')
        // console.log (count_like)
        // console.log (comment_id)

        let objComment = {
            count_like: count_like,
            comment_id: comment_id,
            like: like,
            member_id: member_id
        };
        console.log(objComment)
        $.post("insertthumbscount.php", objComment, function (obj) {
            // if (obj['success']) {
            //     alert('送出成功');

            // } else {
            //     alert(`${obj['info']}`);
            // }
        }, 'json')

    }
})





