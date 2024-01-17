<?php

//クラスの住所(Postcontroller.phpはApp\Http\controllersフォルダの中にあることを示している)
namespace App\Http\Controllers;

//このファイルではこのクラスを使いますと宣言すること
//このファイルはilluminate\Httpフォルダの中にあるRequestクラスを使うよということを示しています。(宣言しておくとrequestと記述するだけでRequestクラスを呼び出せる)

use Illuminate\Http\Request;
//データベースとやりとりするためにPostモデルを使うので、use宣言を行う
use App\Models\Post;

//Controllerというクラスを継承　（このクラスの中に各種アクション(メソッド)を作成する
//class 子クラス extends　親クラス
class PostController extends Controller
{
    //一覧ページ
    public function index(){
        //postsテーブルの全データを新しい順から取得する　all()メソッドやget()メソッドはcollectionというインスタンスを返す。
        $posts = post::latest()->get();
        //viewヘルパー 表示したいビューを引数として指定する。かき方は (フォルダ名.ファイル名) resource/viewフォルダを基準とする
        //第二引数はcompact()関数を指定し、引数には変数名を指定する。$は不要
        //compact関数=引数として渡された変数とその値から配列を作成し、戻り値として返す関数
        return view('posts.index', compact('posts'));
    }

    //作成ページ
    //viewヘルパー 表示したいビューを引数として指定する。かき方は (フォルダ名.ファイル名) resource/viewフォルダを基準とする
    public function create(){
        return view('posts.create');
    }

    //作成機能
    //Requestクラスを使ってフォームから送信された入力内容を取得する。こうしておくと、$request->input('name属性の値')と記述することで各フォームの入力内容を取得できる
    public function store(Request $request){
        //バリデーションを行う
        $request->validate([
            'title'=> 'required|max:20',
            'content'=> 'required|max:200'
        ]);

        //Postモデルをインスタンス化する　※テーブルにレコードを追加したいときはまずアクションの中でモデルをインスタンス化する
        $post = new Post();
        //input name="title”で送られてきた内容を代入する
        $post->title = $request->input('title');
        //input name="content"で送られた内容を代入する
        $post->content =$request->input('content');
        //save()メソッドを使ってpostsテーブルにデータを保存する
        $post->save();

        //redirect()ヘルパーパターン
        //return redirect('URL) URLを直接指定する
        //return redirect()->to('URL)   toメソッドを使ってURLを直接指定する
        //return redirect(route('ルート名'));   ヘルパーを使って名前付きルートを指定する
        //return redirect()->route('ルート名');  rediect()ヘルパーは引数が空だとRedirectorというクラスのインスタンスを返し、そのクラスのrouteメソッドを使う
        //return redirect()->action([コントローラ名::class, 'アクション名']); actionメソッドを使ってコントローラとアクションを指定する。
    
        //with()メソッドは第一引数にキー、第二引数に値を指定することでセッションにデータを保存できる
        return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました');
    }

    //引数の$postにはPostモデルのインスタンスが自動的に代入される
    public function show(Post $post){
        //第一引数はルート名ではなくファイル名.フォルダ名
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        //バリデーションを行う 失敗するとエラーメッセージはMessageBagというクラスのインスタンスとして変数$errorsに代入される
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200'
        ]);


        //requestで受け取った値をpostインスタンスのtitleに再代入
        $post->title = $request->input('title');
        //requestで受け取った値をpostインスタンスのcontentに再代入
        $post->content = $request->input('content');
        //テーブルにデータを保存
        $post->save();

        //sessionにflash_messageを保存させ、詳細ページに戻る
        return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました');
    }

    public function destroy(Post $post){
        $post->delete();

        return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました');
    }
}
