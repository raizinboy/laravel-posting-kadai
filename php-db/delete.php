<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password ='';

//idをゲットする(idがあるときに処理を行う)
if(isset($_GET['id'])){
    try {
        //インスタンス化
        $pdo = new PDO($dsn, $user, $password);

        //idカラムの値をプレースホルダ(:id)に置き換えたSQL文をあらかじめ用意する
        $sql = 'DELETE FROM users WHERE id =:id';

        //prepareメソッドを使いidをプレースホルダ（:id）にしたSQL文の戻り値を得る
        $stmt = $pdo->prepare($sql);

        //S_GETで取得した値をプレースホルダ（:id）に代入する
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

        //SQL文を実行する
        $stmt->execute();

        //header関数を使ってusers.phpに移動する
        header('Location: users.php');
    } catch (PODException $e){
        exit($e->getMessage());
    }
} else {
    //idパラメータの値が存在しない場合はエラーメッセージを表示して処理を停止する
    exit('idパラメータの値が存在しません');
}