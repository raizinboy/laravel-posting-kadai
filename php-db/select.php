<?php
    //データソース名
    $dsn='mysql:dbname=php_db;host=localhost;charset=utf8mb4';
    //ユーザー名
    $user ='root';
    //パスワード
    $password = "";

    try {
        //PDOクラスのインスタンス化
        $pdo = new PDO($dsn, $user, $password);

        //usersテーブルからidカラムとnameカラムのデータを取得するためのSQL文を変数$sqlに代入する。
        $sql = 'SELECT id, name FROM users';

        //SQLを実行する
        //$pdo->query($sql);

        $stmt = $pdo->query($sql);

        //SQL文の実行結果を配列で取得する(キーのみ)
        $results1 = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //キーとインデックス両方の配列を取得する
        //$results2 = $stmt->fetchALL(PDO::FETCH_BOTH);
        
        //配列の中身を出力する
        //print_r($results1);
        //print_r($results2);
    } catch (PDOException $e) {
        exit($e->getmessage());
    }
?>
<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>PHP+DB</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body> 
        <table>
            <tr>
                <th>ID</th>
                <th>氏名</th>
            <tr>
            <?php 
            //配列の中身を順番に取り出し、表形式で出力する
            foreach ($results1 as $result){
                echo "<tr><td>{$result["id"]}</td><td>{$result["name"]}</td></tr>";
            }
            ?>
        </table>
    </body>
</html>
