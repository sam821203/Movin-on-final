<?php
session_start();

$obj['success'] = false;
$obj['info'] = "加入失敗";

if (
    isset($_POST['Author_Avatar']) &&
    isset($_POST['Author_Name'])
) {

    if (!isset($_SESSION['Author'])) $_SESSION['Author'] = [];


    $hasProductId = false;


    if ($hasProductId == false) {
        $_SESSION['Author'][] = [
            "Author_Avatar" => $_POST['Author_Avatar'],
            "Author_Name" => $_POST['Author_Name']
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