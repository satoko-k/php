<?php

session_start();
include("function.php");
loginCheck();

// echo $_SESSION["chk_ssid"];
// echo $_SESSION["u_name"] ;
// echo $_SESSION["rank_flg"];
// echo $_SESSION["id"];

// var_dump($_SESSION);

$id = $_SESSION["id"];

if(isset($_SESSION["imagerr"])) {
  $imagerr=$_SESSION["imagerr"];
  // unset($_SESSION['imagerr']);
}

// echo $id;

// ここから追加

// 1:DBに接続する（エラー処理の追加）
$pdo = db_connect();



//2：データ登録のSQL作成[選択]

  $stmt = $pdo->prepare("SELECT * FROM camp_member_table WHERE id=:id");
  $stmt->bindValue(':id', $id, PDO::PARAM_INT); //取得したいidを渡す

  // SQLの実行
  $status = $stmt->execute();

// 3.データの表示
$view = "";
if($status==false){
  //execute (SQL実行時にErrorがある場合）
  $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);   //"ErrorQuery:"を日本語にしてもＯＫ「sqlエラーです」
} else {
  $val = $stmt->fetch(); //レコードを１つだけ取得する方法
  }

  // echo $val["rank_flg"] ;
  // echo $val["image_name"] ;
  // echo $val["image_path"] ;

 




?>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>雑草アプリ|||トップページ</title>
    <link rel="stylesheet" href="css/reset.css /">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/top.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
    
  </head>
  <body>
    <header>
      <div class="log">
        <p class="loginPlace"><a href="logout.php" class="btn_logout">ログアウト</a></p>
      </div>
    <div class="header">
      <h1>雑草アプリ</h1>
      <p>身近にすごす草花たちに会いに行こう。</p>
    </div>
    </header>
    <div class="cp_breadcrumb" id="nav">
      <ul class="breadcrumbs">
      <li class="lastList">Home</li>
      </ul>
     </div>

    <main>
        <div class="profile">
            <div class="proimgArea">
              <img class="plofileImg" src="<?php echo $val["image_path"] ;?>">
              <form enctype="multipart/form-data" method="post" action="file_upload.php">
                  <input type ="hidden" name="MAX_FILE_SIZE" value="1048576" />
                  プロフィール画像を変更できます<br><input name="img" type="file" accept="image/*"/>
                  <!-- accept　画像だけ選択 -->
                  <input type="submit" value="変更"　class="btn" />
              </form>

      


               <!-- アップロード画像のバリデーションエラー部分 -->
                <?php if(isset($_SESSION["imagerr"])) :?>
                    <p class="err"><?php foreach($imagerr as $er){ echo $er."<br>";};?></p>
                    <?php unset($_SESSION['imagerr']);?>
                    <?php else: ?>
                      <p></p>
                      <?php endif; ?>


            </div>
            <div class="nameArea">
              <p>こんにちは！</p>
              <h2><?php echo h($_SESSION["u_name"]);?> <span style="font-size:18px;">さん</span></h2>
              <h3 class="rankArea"><span style="font-size:16px;">メンバーランク：</span><?php echo $val["rank_flg"] ;?></h3>
              <p><a href="favorite.php">みつけた雑草をみる</a></p>
            </div>

        </div><!--/.profile--->
  <div class="content">
    <div class="categoryBox">
      <div class="categoryZukan">
        <h2>雑草ずかん</h2>
        <p>身近な雑草を見つけにいこう！<br>
      まずはここで雑草のチェック！</p>
        <p>＞＞　CLICK　＜＜</p>
        <a href="zukan.php"></a>
      </div>
      <div class="categoryQuize">
        <h2>雑草クイズ</h2>
        <p>クイズにチャレンジ！！<br>
      雑草メンバーランクがUPするよ！</p>
        <p>＞＞　CLICK　＜＜</p>
        <a href="quize.php"></a>
      </div>
    </div>
  </div>

    </main>
    
    <footer></footer>
    <!-- jQueryを読み込む！必ず先に！ -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- slicknojsはiQueryの次に読み込む
    <script src="js/slick.js"></script> -->
    <!-- jsを読み込む -->
    <script src="js/app.js"></script>
    <script>
    // ふわっとでるところ
  $("body").hide().fadeIn(1000);

  </script>
    


  </body>
</html>
