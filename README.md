# php_0331
最終制作物　雑草アプリ<br>
<br>
PHPとmySQLのデーターベースを使用したアプリ<br>
<br>
<h2>挑戦内容</h2>
<ul>
  <li>mySQLのINSERT、SELECT、UPDATE、DELATEすべての実装</li>
  <li>２つのテーブルをJOINさせてからのSELECT</li>
  <li>会員登録、ログイン時、画像アップロード時のバリデーションによるエラーの表示</li>
  <li>ログイン認証機能</li>
 
</ul>
<h3>ログイン画面とバリデーションによるエラー表示例</h3>
<img src='https://user-images.githubusercontent.com/80142169/115460471-47808880-a263-11eb-91e4-d79e9963c0fb.png'>
<p>トップページ</p>
<img src='https://user-images.githubusercontent.com/80142169/115460506-5109f080-a263-11eb-99a3-6b675e6a7bb0.png'>

<h3>図鑑ぺージ</h3>
<p>画像にマウスをあてると説明文が表示されます。</p>
<p>季節、分類で検索も可能です。</p>
<img src='https://user-images.githubusercontent.com/80142169/115461664-a5fa3680-a264-11eb-9dd9-433333e8c3fb.png'>

<h3>見つけた雑草の表示</h3>
<p>ログインユーザーが「見つけた！」ボタンを押した雑草を表示</p>
<img src="https://user-images.githubusercontent.com/80142169/115972240-29c76200-a588-11eb-87b5-b7ffbeb065a5.png" >

<h3>プロフィール画像のアップデート部分とバリデーションによるエラー表示例</h3>
<p>画像を選択していない、画像サイズが1MB上、画像以外のファイルが選択された場合にエラー表示<br>
 （一時的にセッションを持たせて表示してます）</p>
<img src="https://user-images.githubusercontent.com/80142169/115972356-cd187700-a588-11eb-860f-04e1d50b0c22.png">


