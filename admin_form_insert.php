<?php
// 入力チェック（受信確認処理の追加）
// セットされていない　または空の場合はエラーを返す
    if(
    !isset($_POST["p_name"]) ||$_POST["p_name"] ==""||
    !isset($_POST["f_name"]) ||$_POST["f_name"] ==""||
    !isset($_POST["season"]) ||$_POST["season"] ==""||
    !isset($_POST["category"]) ||$_POST["category"] ==""||
    !isset($_POST["comment"]) ||$_POST["comment"] ==""||
    !isset($_POST["image"]) ||$_POST["image"] ==""
    ){
        exit('ParamError');
    }

//１:POSTデータの取得

$p_name = $_POST["p_name"];
$f_name = $_POST["f_name"];
$season = $_POST["season"];
$category = $_POST["category"];
$comment = $_POST["comment"];
$image = $_POST["image"];


// ２:DBに接続する（エラー処理の追加）

    try {
        $pdo = new PDO('mysql:dbname=camp_plantdb; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }


//３ :データ登録のSQL作成　　:●は変数が入れられないので置き換え用　Bind関数
    $sql="INSERT INTO camp_plant_table(id, p_name, f_name, season, category, comment, image,likes)
        VALUES( NULL,:p_name,:f_name,:season,:category,:comment,:image,DEFAULT )"; 
    
    $stmt = $pdo->prepare($sql);

    // bindValue関連付け
    $stmt->bindValue(':p_name', $p_name, PDO::PARAM_STR); //Integer 数値の場合はPDO::PARAM_INT　にする
    $stmt->bindValue(':f_name',$f_name, PDO::PARAM_STR);
    $stmt->bindValue(':season',$season, PDO::PARAM_STR);
    $stmt->bindValue(':category',$category, PDO::PARAM_STR);
    $stmt->bindValue(':comment',$comment, PDO::PARAM_STR);
    $stmt->bindValue(':image',$image, PDO::PARAM_STR);

    //bindValue(バインド変数, 変数, dataType);


    // SQLの実行
    $status = $stmt->execute();


// 4:データ登録処理後

    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //5:index.phpへリダイレクト
        header("Location: admin_form.php"); //Location: この後半角スペースを必ず入れる
        exit;
    }
?>