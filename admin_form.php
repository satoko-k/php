


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/form.css" />
    <title>雑草登録用フォーム</title>
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
        <h2>【管理者用】雑草登録フォーム</h2>
          <form method="post" action="admin_form_insert.php">
            <div class="form">
          
                <p><label for="">雑草名<span class="required">必須</span><br><input type="text" name="p_name" required placeholder="例）タンポポ"/></label></p>
                <p><label for="">科名と属名<span class="required">必須</span><br><input type="text" name="f_name" required placeholder="例）キク科 タンポポ属"/></label></p>
                <p><label for="">季節<span class="required">必須</span><br><input type="text" name="season" required placeholder="春" /></label></p>
                <p><label for="">分類<span class="required">必須</span><br><input type="radio" name="category" value="一年草" required />一年草</label>
                　<input type="radio" name="category" value="多年草" required />多年草</p>
                <p><label for="">説明<span class="required">必須</span><br><textarea name="comment" rows="10" cols="50" placeholder="ここに説明を入力"></textarea></label></p>
                <p><label for="">画像名<span class="required">必須</span><br><input type="text" name="image" required placeholder="例）image001.jpg"/></label></p>

            </div>
            <input type="submit" class="form-Btn" value="送信" />

  

        <div>

        </div>
      </form>
      </div><!--/.formArea--->
      </div><!--/.wrapper--->
    </main>

  </body>
</html>
