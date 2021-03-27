<?php

// セッションをスタート
session_start();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


// エラーメッセージを配列に入れる
$err = [];

// バリデーション　
// 入力チェック（受信確認処理の追加）
// セットされていない　または空の場合はエラーを返す
if(
    !isset($_POST["lid"]) ||$_POST["lid"] ==""
    ){
        $err[]='IDを入力してください';
        // exit('ParamError');
    }

if(
    !isset($_POST["lpw"]) ||$_POST["lpw"] ==""
    ){
        $err[]='パスワードを入力してください';
        // exit('ParamError');
    }

 if (count($err)===0){
// エラーがなければここからログイン処理


// １．ＤＢに接続する

    try {
        $pdo = new PDO('mysql:dbname=camp_plantdb; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }

//２ :データ登録のSQL作成　user_tableのu_idとu_pwがマッチいてる人　
    $sql="SELECT * FROM camp_member_table WHERE u_id=:lid AND u_pw=:lpw";
    $stmt = $pdo->prepare($sql);
    $stmt ->bindValue(':lid',$lid);
    $stmt ->bindValue(':lpw',$lpw);
    $res = $stmt->execute();

    // SQI実行時にエラーがある場合
    if($res==false){
        $error = $stmt->errorInfo ();
        exit("QueryError:".$error[2]);
    }

// 3:抽出データ数を取得

    $val = $stmt->fetch(); //レコードを１つだけ取得する方法
    var_dump($val);
    // $count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能

// ４．該当レコードがあればSESSIONに値を代入
    // $valにidが空でなければ
    if( $val["id"] != ""){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["u_name"] = $val['u_name'];
        $_SESSION["rank_flg"] = $val['rank_flg'];
        $_SESSION["id"] = $val['id'];
        // ログイン処理OKの場合\.phpへ遷移
        header("Location: top.php");
    }else{
        // ログイン処理NGの場合はlogin.phpへ遷移
        //  header("Location: index.php");
        $err[]='IDとパスワードが一致しません';
    }

}

    // var_dump($err);


    ?>



<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/form.css" />
    <title>メンバー登録</title>
  </head>
  <body>

    <header>
      <h1>雑草アプリ</h1>
    </header>
  <main>
  <div class="wrapper">
    <div class="imgArea">
       <img src="img/tanpopo.jpg" alt="たんぽぽ">
    </div><!---/imgArea--->

    <div class="formArea">
    <h2>ログイン</h2>
        <?php if (count($err) >0) :?>
            <p class="red"><?php foreach($err as $em){
             echo $em."<br>";
            } ?>
            </p>
             <a href="index.php">ログインへ戻る</a>
            
    
        <?php endif; ?>
      


    </div><!--/.formArea--->
  </div><!--/.wrapper--->
        


    </main>
  </body>
</html>
