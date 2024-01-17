<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
    </head>
    <body>
        <h2>
            <?php
            $personal_data = [
                'name' => '侍太郎',
                'address' => '侍町7-77',
                'mobile' => '090-0000-0000'
            ];

            echo '検索対象:';
            print_r($personal_data);
            ?>
        </h2>
        <p>
            <?php
            echo '携帯電話番号を検索し、一致すれば-（ハイフン)を削除したものに置換します。<br>';

            //preg_replace(正規表現, 置換後の文字列, 検索対象)            


            //配列の一部を置き換えて、配列で返す
            $no_hyphen = preg_replace('/\A(0[7-9]0)-([0-9]{4})-([0-9]{4})\z/', '$1$2$3', $personal_data);

            //配列の一部を置換して、文字列として新しい変数に入れる
            $no_hyphen_mobile = preg_replace('/\A(0[7-9]0)-([0-9]{4})-([0-9]{4})\z/', '$1$2$3', $personal_data['mobile']);
            
            echo '>置換結果:';
            print_r($no_hyphen);

            echo '<br>'. 'もとの配列から電話番号だけ置換して取り出す'. '<br>';
            echo '>置換結果:'. $no_hyphen_mobile;
            ?>
        </p>
    </body>
</html>

