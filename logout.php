<?php

// Session_start()は必ず一番最初に書く
    session_start();

// SESSIONを初期化（空にする）$_SESSIONのすべてを初期化
    $_SESSION = array();

// Cookieに保存してある"SessionIDの保存期間を過去にして破棄する「ブラウザ側」
    //session_name()はセッションID名を返す関数
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-42000,'/');
    }

// 「サーバー側」でのセッションIDの破棄
    session_destroy();

// 処理後にindex.phpなどへリダイレクト
    header("Location: index.php");
    exit();


?>