$('input#birthdate').datepicker({
    dateFormat: "yy-mm-dd"
});

$('button#btn_register').click(function (event) {
    event.preventDefault();

    // console.log('hi');

    let input_email = $('input#email');
    let input_pwd = $('input#pwd');
    let input_name = $('input#name');
    let input_birthdate = $('input#birthdate');
    let input_address = $('input#address');

    let re = /\S+@\S+(\.\S+)+/;
    if (!re.test(input_email.val())) {
        input_email
            .addClass("border border-danger border-2")
            .tooltip({
                title: "請填寫完整的 E-mail",
                placement: "top"
            })
            .tooltip('show');

        return false;
    } else {
        input_email
            .removeClass("border border-danger border-2")
            .tooltip()
            .tooltip('dispose');
    }
    //檢查 密碼 是否輸入
    if (input_pwd.val() == '') {
        alert(`請輸入密碼`);
        return false;
    }

    //檢查 姓名 是否輸入
    if (input_name.val() == '') {
        alert(`請輸入姓名`);
        return false;
    }

    //檢查 生日 是否輸入
    if (input_birthdate.val() == '') {
        alert(`請輸入生日`);
        return false;
    }

    //檢查 地址 是否輸入
    if (input_address.val() == '') {
        alert(`請輸入地址`);
        return false;
    }
    let objUser = {
        email: input_email.val(),
        pwd: input_pwd.val(),
        name: input_name.val(),
        birthdate: input_birthdate.val(),
        address: input_address.val()
    };
    $.post("insertUser.php", objUser, function (obj) {
        if (obj['success']) {
            //關閉 modal
            $('div#exampleModal').hide();

            //成功訊息(notification)
            alert(`${obj['info']}`);

            //當成功訊息執行時，等1秒後，執行自訂程式
            setTimeout(function () {
                location.reload();
            }, 1000);
            //如果有用動畫要改秒數配合
        } else {
            alert(`${obj['info']}`);
        }
        console.log(obj);
    }, 'json');
});

$('button#btn_login').click(function (event) {
    event.preventDefault();


    //各自將 input 帶入變數中
    let input_email = $('input#email_login');
    let input_pwd = $('input#pwd_login');

    //檢查 email 是否輸入
    if (input_email.val() == '') {
        alert(`請輸入 E-mail`);
        return false;
    }

    //檢查 密碼 是否輸入
    if (input_pwd.val() == '') {
        alert(`請輸入 密碼`);
        return false;
    }

    //送出 post 請求
    let objUser = {
        email: input_email.val(),
        pwd: input_pwd.val()
    };

    $.post("login.php", objUser, function (obj) {
        if (obj['success']) {
            //關閉浮動視窗
            $('div#exampleModalLogin').hide();

            //成功訊息
            alert(`${obj['info']}`);

            //當成功訊息執行時，等數秒，執行自訂程式
            setTimeout(function () {

                location.reload();
            }, 1000)

        } else {
            alert(`${obj['info']}`);
        }

    }, 'json');

});

