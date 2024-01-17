<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
    </head>
    <body>
        <p>
            <?php
            //独自のエラーハンドラ関数
            //$errnoはエラーレベルの内部値(E_ERRORなら1)
            //$errstrはエラーメッセージ
            //$errfileはエラーが発生したファイル
            //$errlineはエラーが発生した行番号
            function myErrorHandler( $errno, $errstr, $errfile, $errline ){
                //エラーメッセージをログに記録する
                error_log( "[$errno] $errstr $errfile($errline)\n", 3, 'C:\xampp\php\logs\error.log');

                //エラーを画面に表示しない(php標準エラーハンドラを利用しない)
                return TRUE;
            }
            //エラーハンドラ関数の登録
            set_error_handler('myErrorHandler');



            //error(記録したいメッセージ, メッセージタイプ(メール送信やファイルに出力など), 送信先, 追加ヘッダー（メッセージのみ))
            //通常のテキストファイルでは<br>ではなく"\n"を使う
            //error_log( 'エラー'. "\n", 3, 'C:\xampp\php\logs\error.log');

            error_reporting(0);
            echo '全エラー無効' . '<br>';

            //すべて無効のため警告がでない
            echo $dummy1;

            error_reporting(E_ALL);
            echo '全エラー有効';

            //すべて有効のため警告が出る
            echo $dummy2;
            ?>
        </p>
    </body>
