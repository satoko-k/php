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



        $cancel = $pdo->prepare('DELETE FROM likes_table WHERE plant_id=:plant_id AND member_id=:member_id');
            $cancel ->bindValue(':plant_id',$plant_id, PDO::PARAM_INT);
            $cancel ->bindValue(':member_id',$member_id, PDO::PARAM_INT);
            $cancel ->execute();
        header("Location: favorite.php");











?>