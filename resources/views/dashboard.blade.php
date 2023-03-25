@extends('layouts.app')

@section('content')
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                <h4>思いついたらすぐにメモ！<br>シンプルなお買い物リストを作りましょう！</h4>
                <br>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn btn-neutral btn-lg normal-case" href="{{ route('register') }}">新規登録</a>
            </div>
        </div>
    </div>
@endsection