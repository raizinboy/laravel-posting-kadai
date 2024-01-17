<?php
//セッションを開始
//session_start(['gc_maxlifetime'=> 1800])でセッション有効期限(30分)を設定できる
session_start();

//クッキーがあれば氏名を取得
if(isset($_COOKIE['name'])){
    $user_name = $_COOKIE['name'];
} else {
    //ユーザー名はまだ不明のため「名無し」とする
    $user_name = '名無し';
    //$user_name ='侍太郎';

    //クッキーがなければ登録(今回は固定)
    //setcookie(クッキー名, 保存するデータ, 有効期限);
    setcookie('name', '侍太郎', time()+3600);
    echo 'クッキーを追加します。有効期限は1時間です。';
}

//ユーザー名を設定(今回は固定)
//$user_name = '侍太郎';

//セッションにデータを保存 $_SESSION[$user_name]は$user_nameの中身のセッション変数である（中身が変わるとセッション変数が切り替わる)
//issetは変数の中身があればtrueを返す
if (isset($_SESSION[$user_name])){
    //セッション変数があれば、訪問回数を1加算
    $_SESSION[$user_name]++;

    //訪問回数が3回を超えたらクッキーを削除
    if( $_SESSION[$user_name] > 3){
        //有効期限を過去にすることでクッキーを削除
        setcookie('name', '', time()-100);
    }
} else {
    //セッション変数がなければ、1(初回訪問をセット)
    $_SESSION[$user_name] = 1;
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
    </head>
    <body>
        <p>
            <?php
            echo 'ようこそ'. $user_name .'さん、'. $_SESSION[$user_name].'回目の訪問です';

            //訪問回数が3回を超えたらセッション終了
            if($_SESSION[$user_name] > 3) {
                echo 'セッションを終了します。';
                $_SESSION = array();
                session_destroy();
            }
            ?>
        </p>
    </body>
</html>




