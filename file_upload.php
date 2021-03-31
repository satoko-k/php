<?php

session_start();
include("function.php");
loginCheck();
echo $_SESSION["chk_ssid"];
echo $_SESSION["rank_flg"] ;
echo $_SESSION["u_name"] ;
// 今のセッションのidを取得する
$id = $_SESSION["id"];
echo $id;

//////////////////////////
///画像のアップロード準備
/////////////////////////

    $file=$_FILES['img'];
    var_dump($file);
    // 配列が５個おくられてるのを確認

        // ディレクトリトラバーサルの対策　basename関数をつかってパスの最後の名前を返す
        // $filename=$file['name'];
    $filename=basename($file['name']);

    $tmp_path=$file['tmp_name'];
    $file_err=$file['error'];
    $filesize=$file['size'];
    // 保存先の設定
    // $upload_dir='C:/xampp/htdocs/camp_kadai/plant/img/profile/';
    $upload_dir='img/profile/';
    $save_filename= date('YmdHis').$filename;
    $save_path = $upload_dir.$save_filename;
   
 // エラーメッセージを配列に入れる
    $imgerr = [];

// ファイルのバリデーション
    // ファイルサイズが１MB未満か
    if($filesize >1048576 ||$file_err==2){
        $imgerr[]='ファイルサイズは１MB未満にしてください';
    }

    // 拡張子は画像か？ allowする拡張子の指定
    $allow_ext = array('jpg','jpeg','png');
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        // in_array　配列中にあったら　引数（調べたい方,配列）strtolowerは取得した拡張子を小文字にする
    if(!in_array(strtolower($file_ext),$allow_ext)){
        $imgerr[]='画像ファイルを添付してください';
    }

    if (count($imgerr) > 0){
        // エラーがあった場合はtop画面に戻す
        $_SESSION['imagerr']=$imgerr;
    
        header("Location: top.php#nav");
        return;
    
    
     }

    // アップロードされたファイルがあるか？
        // move_uploaded_file　temporaryファイルから任意の場所に保存(tmo,保存先のパス/保存名(画像名+日付))
    if(is_uploaded_file($tmp_path)){
        if(move_uploaded_file($tmp_path,$upload_dir.$save_filename)){
            echo $filename.'を'.$upload_dir.'にアップしました';

            // DBに保存（ファイル名、ファイルパス）
            // $result = fileSave($filename,$save_path);
            // $result = False;
            // db_connect();
            try {
                $pdo = new PDO('mysql:dbname=camp_plantdb; charset=utf8; host=localhost','root','');
            }catch(PDOException $e){
                exit('データベースに接続できませんでした:'.$e->getMessage());
            }

            $sql="UPDATE camp_member_table SET image_name=:image_name ,image_path=:image_path WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); //更新したいidを渡す
            $stmt->bindValue(':image_name', $filename, PDO::PARAM_STR);

            $stmt->bindValue(':image_path', $save_path, PDO::PARAM_STR);
            
            $status = $stmt->execute();

            // データ登録処理後
            if($status==false){
                //SQL実行時にエラーがある場合（
                $error=$stmt->errorInfo();
                exit("QueryError:".$error[2]);
            }else{
                //top.phpへリダイレクト
                header("Location: top.php#nav");
                exit;

    }





        }else{
            echo 'ファイルが保存できませんでした';
        }

    }else{
        $imgerr[]='ファイルが選択されてません';
        $_SESSION=$imgerr;
        header("Location: top.php");
    }

?>