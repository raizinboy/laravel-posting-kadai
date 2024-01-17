<!--
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>新規投稿</title>

        @vite(['resources/js/app.js'])
    </head>
    <body style="padding: 60px 0;">
        <header>
            <nav class="navbar navbar-light bg-light fixed-top" style="height: 60px;">
                <div class="container">
                    <a href="{{ route('posts.index') }}" class="navbar-brand">投稿アプリ</a>
                </div>
            </nav>
        </header>

        <main>
            <article>
                <div class="container">
                    <h1 class="fs-2 my-3">新規投稿</h1>

                    <!-バリデーションに引っかかるとエラーメッセージがMessageBagクラスのインスタンスとして変数$errorsに代入される。　anyメソッドでエラーが一つ以上存在するときTRUEを返す->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <!- $errors-> all()メソッドは全てのエラー配列として返してくれる->
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <a href="{{ route('posts.index') }}" >&lt; 戻る</a>
                    </div>
                    
                    <form action="{{ route('posts.store') }}" method="post">
                        <!-@csrfはクロス・サイト・リクエスト・フォージリの略　サイバー攻撃からの保護コード->
                        @csrf
                        <div class="from-group mb-3">
                            <label for="title">タイトル</lavel>
                            <!-old()ヘルパーはそのフォームの直前の値を取得してくれる。　直前の入力値が存在しない場合はNULLを返す->
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group mb-3">
                            <lavel for="content">本文</lavel>
                            <textarea name="content" class="form-control" >{{ old('content') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">投稿</button>
                    </form>
                </div>
            </article>
        </main>
    
        <footer class="d-flex justify-content-certer align-items-center bg-light fixed-bottom" style="height: 60px">
            <p class="text-muted small mb-0">&copy; 投稿アプリ All rights reserved.</p>
        </footer>
    </body>
</html>
-->

@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-2">
        <a href="{{ route('posts.index') }}" class="text-decoration-none">&lt;戻る</a>
    </div>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <lable for="title">タイトル</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group mb-3">
            <label for="content">本文</label>
            <textarea class="form-control" name="content">{{ old('content') }}</textarea>"
        </div>
        <button type="submit" class="btn btn-outline-primary">投稿</button>
    </form>
@endsection
                            

