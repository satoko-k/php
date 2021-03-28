<?php
// エラーメッセージを配列に入れる
    $err = [];

// 入力チェック（受信確認処理の追加）
// セットされていない　または空の場合はエラーを返す
    if(
    !isset($_POST["u_name"]) ||$_POST["u_name"] ==""||
    !isset($_POST["u_id"]) ||$_POST["u_id"] ==""||
    !isset($_POST["u_pw"]) ||$_POST["u_pw"] ==""
    ){
        $err[]='すべての項目を入力してください';
        exit('ParamError');
    }
// パスワードの正規表現 
    $u_pw = filter_input(INPUT_POST,'u_pw');
        if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$u_pw)){
            $err[]='パスワードは英数字8文字以上100文字以下にしてください';
        }

 //バスワード　確認用と合ってるか？
    $u_pw_conf = filter_input(INPUT_POST,'u_pw_conf');
    if($u_pw !== $u_pw_conf){
        $err[]='パスワードが確認用パスワードと合ってません';
    }
        

 if (count($err)===0){
    // エラーがなければここからユーザーを登録する処理



        

//１:POSTデータの取得

$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];


// ２:DBに接続する（エラー処理の追加）
//  レンタルサーバーを借りたらhostにIPアドレスを指定する。
// rootはID(XAMPPはrootになってる　最後の''はパスワード　
    try {
        $pdo = new PDO('mysql:dbname=camp_plantdb; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }


//３ :データ登録のSQL作成　　:a1は変数が入れられないので置き換え用
    $sql="INSERT INTO camp_member_table(id, u_name, u_id, u_pw, indate)
        VALUES( NULL,:a1,:a2,:a3,sysdate())"; 
    
    $stmt = $pdo->prepare($sql);

    // これと同じ↓
    // $stmt = $pdo->prepare("INSERT INTO camp_testan_table(id, name, email, naiyou, indate)
    // VALUES( NULL,:a1,:a2,:a3,sysdate())");



    // bindValue関連付け
    $stmt->bindValue(':a1', $u_name, PDO::PARAM_STR); //Integer 数値の場合はPDO::PARAM_INT　にする
    $stmt->bindValue(':a2',$u_id, PDO::PARAM_STR);
    $stmt->bindValue(':a3',$u_pw, PDO::PARAM_STR);
    //bindValue(バインド変数, 変数, dataType);


    // SQLの実行
    $status = $stmt->execute();


// 4:データ登録処理後

    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }
    // else{
    //     //5:〇〇.phpへリダイレクト
    //     header("Location: member_isert.php"); //Location: この後半角スペースを必ず入れる
    //     exit;
    // }

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
      <h1>雑草ずかん</h1>
    </header>
  <main>
  <div class="wrapper">
    <div class="imgArea">
       <img src="img/tanpopo.jpg" alt="たんぽぽ">
    </div><!---/imgArea--->

    <div class="formArea">
    <h2>メンバー登録</h2>
        <?php if (count($err) >0) :?>
            <p class="red"><?php foreach($err as $em){
             echo $em."<br>";
            } ?>
            </p>
             <a href="membership.php">メンバー登録へ戻る</a>
            
        <?php else: ?>
        <p class="red">メンバー登録が完了しました</p>
        <div>
          <a href="index.php">ログイン画面へ戻る</a>
        </div>
        <?php endif; ?>
      


    </div><!--/.formArea--->
  </div><!--/.wrapper--->
        


    </main>
  </body>
</html>
