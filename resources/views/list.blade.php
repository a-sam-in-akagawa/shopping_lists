@extends('layouts.app')

@section('content')

    @include('commons.memo_input')

    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">メールアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-neutral btn-block normal-case">ログイン</button>
        </font>

        {{-- ユーザ登録ページへのリンク --}}
        <p class="mt-2">初めて利用される方は <a class="link link-hover text-info" href="{{ route('register') }}">新規登録</a>しましょう！</p>
    </div>
@endsection