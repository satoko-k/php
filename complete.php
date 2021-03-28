    <?php 

        session_start();

        include("function.php");
        loginCheck();
        // echo $_SESSION["chk_ssid"];

        // echo $_SESSION["u_name"] ;
        // echo $_SESSION["rank_flg"];
        // echo $_SESSION["id"];

        $correctAnswer = $_POST['correctAnswer']; 
        // echo $correctAnswer;

        if ($correctAnswer == 3){
            $rank ="雑草博士";
        }elseif($correctAnswer == 2) {
            $rank ="雑草博士の助手";
        }elseif($correctAnswer == 1){
            $rank="雑草博士の弟子";
        }else {
            $rank="雑草博士みならい";
        }
        // echo $rank;

     ?>




<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>花クイズ完了画面</title>
    <link rel="stylesheet" href="css/reset.css /">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/completestyle.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
    
  </head>
  <body>
    <!-- <div class="wrapper"> -->
      <div class="start ribbon">
        <p>結果発表</p>
      </div>
      
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
   
    <main>
    <div class="start ribbon">
        <p>結果発表</p>
      </div>
    <div class="result">
    <p>正解数は・・・</p>
    <p>3問中・・<span class="correctRate"><?php echo $correctAnswer;?>問！！</span></p>
    <p>あなたは<span class="rank"><?php echo $rank;?></span>です。</p>
      </div>
      
        <!-- こっそり送る部分　メンバーランクアップ -->
        <form method="POST" class="form" action="rankupdate.php">
      <?php 
      $questionNumber = 0;
      // echo $questionNumber;
      $correctAnswer = 0;
      // echo $questionNumber;
      
      ?>
      <input type="hidden" name="questionNumber" value=<?php echo $questionNumber;?>>
      <input type="hidden" name="correctAnswer" value=<?php echo $correctAnswer;?>>
      <input type="hidden" name="rank" value=<?php echo $rank;?>>
        <p><input id="send" type="submit" value="ランクを登録する" /></p>
      </form>


        <!--こっそり送る部分 もう一回挑戦する -->

    <form method="POST" class="form" action="quize.php">
      <?php 
      $questionNumber = 0;
      // echo $questionNumber;
      $correctAnswer = 0;
      // echo $questionNumber;
      
      ?>
      <input type="hidden" name="questionNumber" value=<?php echo $questionNumber;?>>
      <input type="hidden" name="correctAnswer" value=<?php echo $correctAnswer;?>>
        <p><input id="send" type="submit" value="もう一回挑戦する" /></p>
      </form>


        
    </main>

    <footer>　</footer>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(function() {
      setTimeout(function(){
        $('.start p').fadeIn(1000);
      },500); //0.5秒後にロゴをフェードイン!フェードイン時間は１.5秒
      setTimeout(function(){
        $('.start').fadeOut(500);
      },2500); //2.5秒後にロゴ含め真っ白背景をフェードアウト！
    });
</script>

  
  </body>
</html>
