<?php

//セッションの確認
session_start();

include("function.php");
loginCheck();

// 今のセッションのidを取得する
$id     = $_SESSION["id"];
// echo $id;

// 1:DBに接続する（エラー処理の追加）

try {
  $pdo = new PDO('mysql:dbname=camp_testdb; charset=utf8; host=localhost','root','');
}catch (PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}


//2：データ登録のSQL作成[選択]

  $stmt = $pdo->prepare("SELECT * FROM camp_user_table WHERE id=:id");
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

  



//POSTされてきた?値が存在するか確認する。なければquestionNumber=0(=第１問）にする。
if(isset($_POST['questionNumber'])){
  $questionNumber = $_POST['questionNumber'];
}else{
  $questionNumber= 0;
}
  // echo $questionNumber;

//POSTされてきた?値が存在するか確認する。なければ正解数correctAnswer=0にする。
if(isset($_POST['correctAnswer'])){
  $correctAnswer = $_POST['correctAnswer'];
}else{
  $correctAnswer= 0;
}
// echo $correctAnswer;

// 
// 問題の配列を作る部分
// 
$quiztitle01 = ["このお花の科名は何でしょう？","img/quize01.jpg"];
$quizChoice01 = ["キク科","バラ科","タンポポ科","イネ科"];

$quiztitle02 = ["このお花が咲く季節はなに？","img/quize02.jpg"];
$quizChoice02 = ["夏","春","秋","冬"];

$quiztitle03 = ["この雑草の名前は何でしょう？","img/quize03.jpg"];
$quizChoice03 = ["ホトケノザ","セリ","ナズナ","ハコベラ"];



// 答えはquizChoiceの配列の一番最初0番目にする
$answer01 = $quizChoice01[0];
$answer02 = $quizChoice02[0];
$answer03 = $quizChoice03[0];


// 選択肢の並び順をシャッフルさせる
shuffle($quizChoice01);
shuffle($quizChoice02);
shuffle($quizChoice03);

//問題文と選択肢の配列を結合する
$quiz01 = array_merge($quiztitle01 ,$quizChoice01) ;
$quiz02 = array_merge($quiztitle02 ,$quizChoice02) ;
$quiz03 = array_merge($quiztitle03 ,$quizChoice03) ;

// print_r($quiz01);
// echo $answer;

$quizArray = [$quiz01,$quiz02,$quiz03];

// var_dump ($quizArray);


// 2次元配列にする
$quetionName = $quizArray[$questionNumber][0];
$quetionImage = $quizArray[$questionNumber][1];
$answerA = $quizArray[$questionNumber][2];
$answerB = $quizArray[$questionNumber][3];
$answerC = $quizArray[$questionNumber][4];
$answerD = $quizArray[$questionNumber][5];

// $quetionName = $quiz01[0];
// $quetionImage = $quiz01[1];
// $answerA = $quiz01[2];
// $answerB = $quiz01[3];
// $answerC = $quiz01[4];
// $answerD = $quiz01[5];


// 問題番号に合わせた「答え」の指定
$answerArray=[$answer01,$answer02,$answer03];
// var_dump ($answerArray);
$answer = $answerArray[$questionNumber];



// echo $quetionName;
// echo $quetionImage;
// echo $answerA;
// echo $answerB;
// echo $answerC;
// echo $answerD;
// echo $answer;


?>


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>雑草アプリ｜｜雑草クイズ</title>
    <link rel="stylesheet" href="css/reset.css /">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/quize.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
    
  </head>
  <body>
  <header>
    <div class="log">
        <p class="loginPlace"><?php echo h($_SESSION["u_name"]);?> <span style="font-size:14px;">さん</span><a href="logout.php" class="btn_logout">ログアウト</a></p>
      </div>
    <div class="header">
    <p>雑草アプリ</p>
      <h1>目指せ！雑草博士クイズ</h1>

    </div>
    </header>
    <div class="cp_breadcrumb" id="nav">
      <ul class="breadcrumbs">
      <li><a href="top.php">Home</a></li>
      <li class="lastList">Quize</li>
      </ul>
  </div>

    <main id="mainTop">
      <div class="quesionArea">
        <p class="questionNumber">問題<?php echo $questionNumber+1; ?></p>
        <h2><?php echo $quetionName;?></h2>
        <img src="<?php echo $quetionImage;?>" alt="" />
      </div>
      <p>答えを下から１つ選んでね。</p>
      <form method="post" action="answer.php#mainTop">
        <input
          type="radio"
          id="choice01"
          class="radio_input"
          name="choice"
          value="<?php echo $answerA;?>"
        /><label class="radio_label" for="choice01"><?php echo $answerA;?></label>
        <input
          type="radio"
          id="choice02"
          class="radio_input"
          name="choice"
          value="<?php echo $answerB;?>"
        /><label class="radio_label" for="choice02"><?php echo $answerB;?></label>
        <input
          type="radio"
          id="choice03"
          class="radio_input"
          name="choice"
          value="<?php echo $answerC;?>"
        /><label class="radio_label" for="choice03"><?php echo $answerC;?></label>
        <input
          type="radio"
          id="choice04"
          class="radio_input"
          name="choice"
          value="<?php echo $answerD;?>"
        /><label class="radio_label" for="choice04"><?php echo $answerD;?></label><br>
      
        <!--こっそり送る部分  -->
        <input type="hidden" name="answer" value="<?php echo $answer ?>">
        <input type="hidden" name="quetionName" value=<?php echo $quetionName;?>>
        <input type="hidden" name="quetionImage" value=<?php echo $quetionImage;?>>
        <input type="hidden" name="questionNumber" value=<?php echo $questionNumber;?>>
        <input type="hidden" name="correctAnswer" value=<?php echo $correctAnswer;?>>
        <p><input id="send" type="submit" value="これで決定" /></p>
      </form>


        
    </main>

    <footer></footer>
  </body>
</html>
