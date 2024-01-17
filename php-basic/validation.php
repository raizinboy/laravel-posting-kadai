<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
</head>
<body>
    <p>
        <?php
        //入力データを設定(今回はPHPで直接指定)
        $name='侍太郎';
        $password = 12345678;
        $email = 'samuraitarou@example.com';
        $age = '20';
        $gender = '男性';

        //氏名が入力されているか　empty()は変数の中身が空のときにtrueを返す
        if(empty($name)){
            //exit()メッセージを出力し、PHP処理を終了させる
            exit('氏名を入力してください。');
        }

        //パスワードの文字数条件を満たしているか　mb_strlen()は変数の中身のlengthを取得する
        if(mb_strlen($password) < 8){
            exit('パスワードは8文字以上にしてください。');
        }

        //メールアドレスの形式になっているか filter_var(チェックしたい変数名, フィルタID)　フィルタIDはFILTER_VALIDATE_EMAILやFILTER_VALIDATE_URLなど
        if(!filter_var( $email, FILTER_VALIDATE_EMAIL)){
            exit('メールアドレスの入力形式が正しくありません。');
        }
        //正規表現でも可能
        //if(!preg_match_all('/\A[a-zA-Z0-9.]+@[a-zA-Z0-9.]+\z/', $email )){exit('メールアドレスの表示が正しくありません');}

        //is_numeric()で中身が数値形式かチェックする　数値だとtrue
        if(!is_numeric($age)){
            exit('年齢には数値を入力してください。');
        }


        //リスト内の性別が指定されているか　
        //in_array(チェックしたい変数, チェックしたい配列)はチェックしたい配列が変数のなかに入っていた場合trueを返す
        if(!in_array($gender, ['男性', '女性', 'その他'])){
            exit ('正しい性別を指定してください。');
        }

        echo 'バリデーションの結果、問題ありませんでした';
        ?>
    </p>
</body>
</html>
