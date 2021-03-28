    <?php

    //セッションの確認
        session_start();

        include("function.php");
        loginCheck();
        // echo $_SESSION["chk_ssid"];

        // echo $_SESSION["u_name"] ;
        // echo $_SESSION["life_flg"];


        $choice = $_POST['choice']; 
        $answer = $_POST['answer']; 
        $questionNumber = $_POST['questionNumber']; 
        $quetionName = $_POST['quetionName']; 
        $quetionImage = $_POST['quetionImage']; 
        $correctAnswer = $_POST['correctAnswer']; 


        // echo $choice;
        // echo $answer;
        // echo $questionNumber;
        // echo $quetionName;
        // echo $quetionImage;

        if($choice == $answer){
        $result = '<span style="color: red">正解！</span>';
        $correctAnswer ++;
        }else{
            $result ='<span style="color: blue">ざんねん！不正解</span>'; 
        }
    ?>


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>花クイズ</title>

    <link rel="stylesheet" href="css/reset.css /">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/answerstyle.css" />
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
        <div class="answerArea">
            <img src="<?php echo $quetionImage;?>" alt="" />
            <div>
            <p class="result"><?php echo $result; ?></p>
            <p class="answer">答えは、<span class="answerBold"><?php echo $answer; ?></span>です。</p>
            </div>
        </div>
      </div>

      <?php if($questionNumber != 2){ ?>
      <form method="POST" class="form" action="quize.php#mainTop">
     <!-- 問題番号に+1させる questionNumberが1の時は問題2　2の時は問題3-->
      <?php  
       $questionNumber++;
      // echo $questionNumber;
      ?>
      <input type="hidden" name="questionNumber" value=<?php echo $questionNumber;?>>
      <input type="hidden" name="correctAnswer" value=<?php echo $correctAnswer;?>>
      <p><input id="send" type="submit" value="次の問題へすすむ" /></p>

      </form>

      <?php }else{ ?>
       <form method="POST" class="form" action="complete.php">
          <p><input id="send" type="submit" value="結果をみる" /></p>
          <input type="hidden" name="correctAnswer" value=<?php echo $correctAnswer;?>>
        </form>
          <?php } ?>









      

  


      
    </main>

    <footer></footer>
  </body>
</html>
