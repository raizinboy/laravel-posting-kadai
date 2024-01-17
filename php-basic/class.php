<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset='UTF-8'>
        <title>PHP基礎編</title>
    </head>
    <body>
        <p>
            <?php
            //クラスを定義する
            class Product {
                //プロパティを定義する
                public $name;

                //メソッドを定義する
                public function set_name(string $name){
                    $this->name =$name;
                }
                public function show_name(){
                    echo $this->name . '<br>';
                }
            }

            //インスタンス化する
            $coffee = new Product();

            //メソッドにアクセスして実行する
            $coffee->set_name('コーヒー');
            $coffee->show_name();

            //インスタンス化する
            $shampoo = new Product();

            //プロパティにアクセスし、値を代入する
            $shampoo->name = 'シャンプー';

            //プロパティにアクセスし、値を出力する
            echo $shampoo->name;
            ?>
        </p>
        <p>
            <?php
            //クラスを定義する
            class User {
                //プロパティを定義する
                private $name;
                private $age;
                private $gender;

                //コンストラクタ（インスタンス化するときに自動で処理を行う)を定義する(_は２つ)
                public function __construct(string $name, int $age, string $gender){
                    $this->name = $name;
                    $this->age = $age;
                    $this->gender = $gender;
                }
            }

            //インスタンス化する
            $user = new User( '侍太郎', 36, '男性');

            //インスタンス$userの各プロパティの値を出力する
            print_r($user);
            ?>
        </p>
    </body>
</html>

