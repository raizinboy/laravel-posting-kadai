<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='UTF-8'>
    <title>PHP基礎編</title>
</head>
<body>
    <p>
        <?php
        //ソートする配列を宣言
        $nums = [15, 4, 18, 23, 10];

        //配列の中身を出力する関数を定義
        function output($array){
            foreach($array as $value){
                echo $value . '<br>';
            };
        }

        //もとの配列を出力
        echo 'ソート前の配列です<br>';
        output($nums);

        //配列の並び替えて出力する関数を定義する
        function sort_2way ($array, $order){
            if($order === 'true'){
                echo '昇順にソートします。<br>';
                //配列を昇順に並び替える
                sort($array);
            } elseif($order === 'false'){
                echo '降順にソートします。<br>';
                //配列を降順に並び替える
                rsort($array);
            }
            //ソート後の配列を出力する
            output($array);
        }

        //配列$numsを昇順（true)で出力する
        sort_2way($nums, 'true');

        //配列$numsを降順(false)で出力する
        sort_2way($nums, 'false');
        ?>
    </p>
</body>