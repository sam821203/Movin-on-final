// 1/6 booking-ratingcolor 改寫購票中電影分級之背景色 



// let rating_str = "$('.pg-rate').text()";
// let rating_arr = explode("," , $str03);
// console.log(arr)

// document.ready = function () {
//     for (let i = 0; i < 30; i++) {
//         if ($(".pg-rate").text() === '限') {
//             console.log("get")
//             document.getElementsByClassName("pg-rate").classname = "age18"
//         }
//     }
// }
// var arr = 'sss@vvv'.split('@');



// var str = $(".pg-rate").text();
// console.log($(".pg-rate").text())

let arr=[]
$(".pg-rate").each((i,v) => {
    // arr.push($(v).text())
    // console.log($(v))
    if ($(v).text() =="18"){
        $(".pg-rate").eq(i).addClass("age18");

    }else if ($(v).text() =="15"){
        $(".pg-rate").eq(i).addClass("age15");

    }else if ($(v).text() =="12"){
        $(".pg-rate").eq(i).addClass("age12");

    }else if ($(v).text() =="6"){
        $(".pg-rate").eq(i).addClass("age6");

    }else{ ($(v).text() =="0")
        $(".pg-rate").eq(i).addClass("age0");
    }
})




// for(let i = str.length; i >0 ; i--){

//     if (isNaN(str.substring(i,i-1 ))) {

//         arr.push(str.substring(i,i-1 ));
    
   
//     }else{

//         arr.push(str.substring(i,i-3 ));


//     }

// }

// console.log('arr',arr);