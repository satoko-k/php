<?php

session_start();
include("function.php");
loginCheck();

// echo $_SESSION["chk_ssid"];
// echo $_SESSION["u_name"] ;
// echo $_SESSION["rank_flg"];
$member_id = $_SESSION["id"];

$date_start = $_POST["date_start"];
$date_end = $_POST["date_end"];

// echo $date_start;
/////////////////////////
// データの抽出
///////////////////////

// 1:DBに接続する（エラー処理の追加）
$pdo = db_connect();


//2：データ登録のSQL作成[選択]

    $stmt = $pdo->prepare("SELECT * FROM likes_table JOIN camp_plant_table ON likes_table.plant_id = camp_plant_table.id 
    WHERE member_id=:member_id AND likes_table.createtime BETWEEN '$date_start' AND '$date_end' ORDER BY likes_table.createtime DESC");
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT); 
    // $stmt->bindValue(':date_start', $date_start, PDO::PARAM_STR); 
    // $stmt->bindValue(':date_end', $date_end, PDO::PARAM_STR); 


    // SQLの実行
    $status = $stmt->execute();



// 3.データの表示
$view = "";
if($status==false){
    //execute (SQL実行時にErrorがある場合）
    $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);   //"ErrorQuery:"を日本語にしてもＯＫ「sqlエラーです」
} else {
    //Selectデータの数だけ自動でループして$resultに入れてくれる
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
           $view .='<div id="favorite">';
           $view .='<img class="plantImg" src="img/';
           $view .=$result["image"];
           $view .='">';
           $view .='<p>';
           $view .= $result["p_name"];
           $view .=' : ';
           $view .= $result["f_name"];
           $view .='<br>';
           $view .='見つけた日：';
           $view .= $result["createtime"];
           $view .='</p>';
           $view .='</div>';


   
   

    }
}
    // ＄viewを表示したいところでechoする。



?>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>雑草アプリ</title>
    <link rel="stylesheet" href="css/reset.css /">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/favorite.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
    
  </head>
  <body>
    <header>
    <div class="log">
        <p class="loginPlace"><?php echo h($_SESSION["u_name"]);?> <span style="font-size:14px;">さん</span><a href="logout.php" class="btn_logout">ログアウト</a></p>
      </div>
    <div class="header">
      <h1>雑草アプリ</h1>
      <p>身近にすごす草花たちに会いに行こう。</p>

    </div>
    </header>
    <div class="cp_breadcrumb" id="nav">
      <ul class="breadcrumbs">
      <li><a href="top.php">Home</a></li>
      <li><a href="favorite.php">Myfaorite</a></li>
      <li class="lastList">見つけた日で検索</li>
      </ul>
  </div>

    <main>
     <h2><?php echo h($_SESSION["u_name"]);?>さんが見つけた雑草たち</h2>
     <p class="dateResult"><?php echo $date_start; ?>　～　<?php echo $date_end; ?>　の検索結果</p>

     <!-- 登録日で検索 -->
      <form class="searchArea" method="post" action="favorite_day.php#nav">
          <input type="date" name="date_start" value="<?php echo date('Y-m-d'); ?>">
          ～
          <input type="date" name="date_end" value="<?php echo date('Y-m-d'); ?>">
          <button type="submit">見つけた日で検索</button>
      </form>


     <div id="favoriteArea">
     <?php echo ($view) ?>
      </div>
     


      <p id="page-top"><a href="#nav">PAGE TOP</a></p>

    </main>

    <footer></footer>
    <!-- jQueryを読み込む！必ず先に！ -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- slicknojsはiQueryの次に読み込む
    <script src="js/slick.js"></script> -->
    <!-- jsを読み込む -->
    <script src="js/app.js"></script>
  <script>


</script>
    
  </body>
</html>
