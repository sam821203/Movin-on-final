<?php
session_start();

$obj['success'] = false;
$obj['info'] = "加入失敗";

if (
    isset($_POST['count']) &&
    isset($_POST['payTotal'])
) {

    if (!isset($_SESSION['form'])) $_SESSION['form'] = [];


    $hasProductId = false;


    if ($hasProductId == false) {
        $_SESSION['form'][] = [
            "count" => $_POST['count'],
            "payTotal" => $_POST['payTotal']
        ];
    }

    //設定訊息
    $obj['success'] = true;
    $obj['info'] = "加入成功";
}

//告訴前端，回傳格式為 json
header("Content-Type: application/json");

//輸出 json 格式，供 ajax 取得 response 的資訊
echo json_encode($obj, JSON_UNESCAPED_UNICODE);