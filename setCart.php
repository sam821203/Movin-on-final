<?php
session_start();

$obj['success'] = false;
$obj['info'] = "加入失敗";

if( isset($_POST['movie_TC']) &&
    isset($_POST['movie_EN']) &&
    isset($_POST['movie_poster']) &&
    isset($_POST['movie_date']) &&
    isset($_POST['division'])&&
    isset($_POST['movie_cat']) &&
    isset($_POST['showtime'])&&
    isset($_POST['cinema'])&&
    isset($_POST['ticket_poster'])&&
    isset($_POST['pg_rate'])&&
    isset($_POST['length'])&&
    isset($_POST['director']) ){

        if( !isset($_SESSION['cart']) ) $_SESSION['cart'] = [];


        $hasProductId = false;


        if($hasProductId == false){
            $_SESSION['cart'][] = [
                    "movie_TC" => $_POST['movie_TC'],
                    "movie_EN" => $_POST['movie_EN'],
                    "movie_poster" => $_POST['movie_poster'],
                    "movie_date" => $_POST['movie_date'],
                    "division" => $_POST['division'],
                    "movie_cat" => $_POST['movie_cat'],
                    "cinema" => $_POST['cinema'],
                    "showtime" => $_POST['showtime'],
                    "ticket_poster" => $_POST['ticket_poster'],
                    "pg_rate" => $_POST['pg_rate'],
                    "length" => $_POST['length'],
                    "director" => $_POST['director']
            ];
        }

        //設定訊息
    $obj['success'] = true;
    $obj['info'] = "加入成功";
    $obj['count_products'] = count($_SESSION['cart']);


}

//告訴前端，回傳格式為 json
header("Content-Type: application/json");

//輸出 json 格式，供 ajax 取得 response 的資訊
echo json_encode($obj, JSON_UNESCAPED_UNICODE);