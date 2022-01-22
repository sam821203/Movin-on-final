<?php
session_start();
session_destroy();

//預設值
$obj['success'] = true;
$obj['info'] = '登出成功';

//告訴前端，回傳格式為 json
header("Content-Type: application/json");

//輸出 json 格式，供 ajax 取得 response 的資訊
echo json_encode($obj, JSON_UNESCAPED_UNICODE);