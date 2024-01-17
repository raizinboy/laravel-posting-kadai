<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
</head>
<body>
    <p>
        <?php
        //使用するデフォルトのタイムゾーンを指定する
        date_default_timezone_set('Asia/Tokyo');


        //date(日時のフォーマット, UNIXタイムスタンプ(省略時は現在の日時が戻り値として返されます))

        //現在の日時を指定したフォーマットで出力する
        echo date('Y年n月j日H時i分s秒') . '<br>';


        //strtotime(日時, 基準となるUNIXタイムスタンプ(省略時は現在を基準))

        //現在を基準として1週間後の日時のUNIXタイムスタンプを出力する
        echo strtotime('+1 week') . '<br>';

        //現在を基準として3年前の日時を指定したフォーマットで出力する
        echo date('Y/m/d H:i:s', strtotime('-3 year'));
        ?>
    </p>
    <p>
        <?php
        //DateTime classを使用する(classなのでインスタンス化が必要)

        //指定した日時のインスタンスを作成する
        $date_time = new DateTime('2015-03-19 12:15:30');
        $now1 = new DateTime();

        //インスタンス$date_timeの日時を特定にフォーマットで出力する
        echo $date_time->format('Y年n月j日H時i分s秒'); 
        echo '<br>';
        echo $now1->format('Y年n月j日H時i分s秒');
        echo '<br>';

        //現在の日時のインスタンスを作成する
        $now = new DateTime();

        //diff()メソッドで2つのインスタンスの日時の差を取得し、変数$intervalに代入する(interval=間隔)
        $interval = $now->diff($date_time);
        
        //print_r($interval);

        //取得した日時の差を特定のフォーマットで出力する
        echo $interval->format('%y年と%m月と%d日の差があります。総日数は%a日です。') . '<br>';

        //加算・減算した日時を特定のフォーマットで出力する Immutable=不変
        $now = new DateTimeImmutable();

        //現在の日時に1年を加算し、変数$addに代入する
        $add = $now->modify('+1 year');

        //現在の日時から3日減算し、変数$subに代入する(sub=「減算」を意味するsubstractionの略)
        $sub = $now->modify('-3 day');

        //加算・減算した日時を特定のフォーマットで出力する
        echo $add->format('現在から1年後はY年n月j日H時i分s秒です。'). '<br>';
        echo $sub->format('現在から3日前はY年n月j日H時i分s秒です。'). '<br>';



        ?>
    </p>
</body>


