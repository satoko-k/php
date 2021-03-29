<?php
session_start();
include("function.php");
loginCheck();

// /１:POSTデータの取得
$plant_id = $_POST["plant_id"];
echo "雑草d".$plant_id;
$member_id = $_SESSION["id"];
echo "メンバーid".$member_id;

// DBに接続する（エラー処理の追加）
$pdo = db_connect();

// //既ににいいね済みであるかの確認

$pressed = $pdo->prepare('SELECT COUNT(*) AS cnt FROM likes_table WHERE plant_id=:plant_id AND member_id=:member_id');
    $pressed ->bindValue(':plant_id',$plant_id, PDO::PARAM_INT);
    $pressed ->bindValue(':member_id',$member_id, PDO::PARAM_INT);
    // executeでクエリを実行
   $pressed->execute();
   $count = $pressed->fetchColumn();
   
//    echo "結果".$count;




    //1-5. いいねのデータを挿入or削除
    if ($count == 0) {

        //データ登録のSQL作成　　:●は変数が入れられないので置き換え用　Bind関数
        $sql="INSERT INTO likes_table(id, plant_id, member_id, createtime)
            VALUES( NULL,:plant_id,:member_id,sysdate())"; 
        
        $stmt = $pdo->prepare($sql);

        // bindValue関連付け
        $stmt->bindValue(':plant_id', $plant_id, PDO::PARAM_INT); //Integer 数値の場合はPDO::PARAM_INT　にする
        $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
        // SQLの実行
        $status = $stmt->execute();

     // 4:データ登録処理後
        if($status==false){
            //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
            $error=$stmt->errorInfo();
            exit("QueryError:".$error[2]);
        }else{
            //5:index.phpへリダイレクト
            header("Location: zukan.php"); //Location: この後半角スペースを必ず入れる
            exit;
        }

    }else{
        $delete = $pdo->prepare('DELETE FROM likes_table WHERE plant_id=:plant_id AND member_id=:member_id');
            $delete ->bindValue(':plant_id',$plant_id, PDO::PARAM_INT);
            $delete ->bindValue(':member_id',$member_id, PDO::PARAM_INT);
            $delete ->execute();
        header("Location: zukan.php");

        exit();
    }









?>