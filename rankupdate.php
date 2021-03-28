<?php

    session_start();

    include("function.php");
    loginCheck();

        echo $_SESSION["chk_ssid"];

        echo $_SESSION["u_name"] ;
        echo $_SESSION["rank_flg"];
        echo $_SESSION["id"];

    
// 1.POSTで新しいランクを取得
// 　今のrankとこのセッションのidを取得
    $id     = $_SESSION["id"];
    $rank_flg   =  $_POST["rank_flg"];
    $rank = $_POST["rank"]; 

    echo $id;
    echo $rank_flg;
    echo $rank;




// 1:DBに接続する（エラー処理の追加）
$pdo = db_connect();

// UPDATE
    $sql="UPDATE camp_member_table SET rank_flg=:rank_flg WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); //更新したいidを渡す
    $stmt->bindValue(':rank_flg', $rank, PDO::PARAM_STR);


    $status = $stmt->execute();

// データ登録処理後
    if($status==false){
        //SQL実行時にエラーがある場合（
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //select.phpへリダイレクト
        header("Location: top.php");
        exit;

    }



?>