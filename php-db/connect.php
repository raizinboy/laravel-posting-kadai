<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP+DB</title>
    </head>
    <body>
        <p>
            <?php
            //データソース名
            $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';

            //エラーを発生させる
            //$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';

            //ユーザー名 デフォルトがroot
            $user = 'root';

            //パスワード　デフォルトは''
            $password = '';

            try {

                //PDOクラスのインスタンス化 new PDO ('データソース名,'ユーザー名','パスワード'）
                //データソース名(データホーム名; ホスト名; 文字コード)
                $pdo = new PDO($dsn, $user, $password);
                echo 'データベースの接続に成功しました。';
            }   catch (PDOException $e) {
                //データベースの接続に失敗したときの処理(例)
                exit('データベースの接続に失敗しました' . $e->getMessage());
            }
            ?>
        </p>
    </body>
</html>