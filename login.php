<?php
//匯入資料庫
require_once 'db.inc.php';

//預設訊息
$obj['success'] = false;
$obj['info'] = '登入失敗';

if( isset($_POST['email']) && isset($_POST['pwd']) ){

    $pwd = sha1($_POST['pwd']);

try{

    $sql = "SELECT `member_id`,`email`, `name`
            FROM `users`
            WHERE `email` = '{$_POST['email']}'
            AND`pwd` = '{$pwd}'
            ";
            //AND `isActivated` = 1 
    $stmt = $pdo->query($sql);

    if($stmt->rowCount() > 0){
        //修改預設值
        $obj['success'] = true;
        $obj['info'] = '登入成功';

        //取得使用者資料 (obj 型態)
        $objUser = $stmt->fetch();

        //開啟 session
        session_start();

        //建立 session 資料
        $_SESSION['email'] = $objUser['email'];
        $_SESSION['name'] = $objUser['name'];
        $_SESSION['member_id'] = $objUser['member_id'];
    }
    

}catch(PDOException $e){
    switch( $pdo->errorInfo()[1] ){
        case 1062:
            $obj['info'] = '此帳號已註冊';
        break;

        case 1064:
            $obj['info'] = 'SQL 語法錯誤';
        break;
    } 
  }
}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);