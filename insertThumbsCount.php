<?php
//匯入資料庫
require_once 'db.inc.php';

//預設訊息
$obj['success'] = false;
$obj['info'] = "發送失敗";

//確認所有傳過來的表單資料是否完整 

if( isset($_POST['count_like']) && isset($_POST['comment_id']) ){

    try{
        //新增使用者的 SQL 語法
        $sql = "UPDATE `comment` 
                SET `like_num_cm` = '{$_POST['count_like']}'
                WHERE `comment_id` = '{$_POST['comment_id']}'";

        $user_like = "UPDATE `user_like` 
                SET `like` = '{$_POST['like']}'
                WHERE `comment_id` = '{$_POST['comment_id']}'
                AND `member_id`='{$_POST['member_id']}'";
                
        
        //執行 SQL 語法
        $stmt=$pdo->query($sql);
        $stmt1=$pdo->query($user_like);

        //判斷是否寫入資料
        if($stmt->rowCount() > 0){
            //修改預設訊息
            $obj['success'] = true;
            $obj['info'] = "發送成功";}

         

         
        } catch(PDOException $e){
        /**
         * $pdo->errorInfo() 內容
         * [
         *     "23000", 
         *     1062, 
         *     "Duplicate entry 'abc@abc.abc' for key 'PRIMARY'"
         * ]
         * 
         * 參考連結
         * https://mariadb.com/kb/en/mariadb-error-codes/
         */
        switch($pdo->errorInfo()[1]){
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