<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
    </head>
    <body>
        <p>
            <?php
            //商品の連想配列を作成
            $item_info = ['名前' => '玉ねぎ', '値段' => 200, '産地' => '北海道'];

            //連想配列の要素を一つずつ出力する
            foreach ($item_info as $index => $value){
                echo "{$index}:{$value}<br>";
            }
            ?>
        </p>
    </body>
</html>

