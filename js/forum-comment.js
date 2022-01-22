// 0110 留言寫入留言表與按讚紀錄表

$(".comment-send").click(function (event) {
    event.preventDefault();
    let comment = $(".comment-txt").val()

    console.log(comment) 
    console.log($(".comment-txt").val())

    if (comment != "") {
        $(".comment-txt").val('')

        var url = new URL(location.href)
        
        let objComment = {
            comment: comment,
            title_id: url.searchParams.get('id'),
            member_id: $(".user_identify").attr('id'),
            comment_id: parseInt($(".comment-count").text(), 10 )+1
            };

        console.log(objComment) 

        $.post("insertComment.php", objComment, function (obj) {
            if (obj['success']) {
                // alert('送出成功');
                setTimeout(function () {
                    location.reload();
                }, 100);
            } else {
                alert(`${obj['info']}`);
            }
        }, 'json')

    } else {
        alert("你還沒輸入任何留言喔~")
    }



});


