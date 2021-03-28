


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/common.css" />
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
      <form method="post" action="member_insert.php">
        <div class="form">
      

            <p><label for="">お名前<span class="required">必須</span><br><input type="text" name="u_name" required/></label></p>
            <p><label for="">ログインID<span class="required">必須</span><br><input type="text" name="u_id" required /></label></p>
            <p><label for="">ログインPW<span class="required">必須</span><br><input type="password" name="u_pw" required /></label><br>
              <span style="font-size:12px;">英数字8文字以上100文字以下</span></p>
              <p><label for="">確認用PW<span class="required">必須</span><br><input type="password" name="u_pw_conf" required /></label><br>
              <span style="font-size:12px;">英数字8文字以上100文字以下</span></p>
        </div><!-- /.form -->
            <input type="submit" class="form-Btn" value="登録する" />
        </form>

        <div>
          <a class="navbar-brand" href="index.php">ログイン画面へ戻る</a>
        </div>
    </div><!--/.formArea--->
  </div><!--/.wrapper--->
        


    </main>
  </body>
</html>
