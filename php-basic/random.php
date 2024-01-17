<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
</head>
<body>
    <p>
        <?php
        //mt_rand(最小値, 最大値)

        //変数$diceにさいころの出目(1~6までのランダムの整数)を代入する
        $dice = mt_rand(1, 6);

        //サイコロの出目を出力する
        echo "{$dice}の目がでました。<br>";

        //おみくじの結果を入れた配列$omikujiを作成する
        $omikuji = ['大吉', '中吉', '小吉', '吉', '末吉', '凶', '大凶'];


        //array_rand(配列, 取得するキーの数)　配列のキー(インデックス)を取得する

        //変数$keyにランダムな配列のキー(インデックス)を代入する
        $key = array_rand($omikuji);

        echo $key. '<br>';

        //取得した配列のキー(インデックス)を使ってその値を取得し、変数$resultに代入する
        $result = $omikuji[$key];

        //おみくじの結果を出力する
        echo "おみくじの結果は{$result}です";
        echo '<br>';
        echo "おみくじの結果は{$omikuji[$key]}です";
        ?>
    </p>
</body>
