


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/form.css" />
    <title>ログイン||雑草アプリ</title>
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
      <form method="post" action="login_act.php">

        <div class="form">
          <p><label for="">ログインID<br><input type="text" name="lid" /></label></p>
          <p><label for="">ログインPW<br><input type="password" name="lpw" /></label></p>
        </div><!--/.form--->
          <input type="submit" class="form-Btn" value="ログイン" /></buttom>
      </form>
    

      <p><a href="membership.php">メンバー登録がまだの方はこちら</a></p>
      </div><!--/.formArea--->
      </div><!--/.wrapper--->
    </main>

   <footer></footer>
  </body>
</html>
