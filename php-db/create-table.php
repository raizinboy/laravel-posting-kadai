<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>PHP+DB</title>
</head>
<body>
    <p>
        <?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user='root';
        $password='';

        try {
            //PDO(PHP deta Object)クラスをインスタンス化
            $pdo = new PDO($dsn, $user, $password);
            
            //userテーブルを作成するためのSQL文を変数$sqlに代入する
            $sql = 'CREATE TABLE IF NOT EXISTS users (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(60) NOT NULL, 
                furigana VARCHAR(60) NOT NULL,
                email VARCHAR(255) NOT NULL,
                age INT(11),
                address VARCHAR(255)
            )';

            //pdoクラスのメソッドquery( )でかっこの中にSQLを書く
            //prepare()メソッドはSQLが動的に変わる場合用いる
            $pdo->query($sql);
        }   catch(PDOException $e) {
            exit($e->getMessage());
        }
        ?>
    </p>
</body>
</html>