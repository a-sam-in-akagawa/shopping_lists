@extends('layouts.app')

@section('content')
    @if (Auth::check())
    
        @include('commons.memo_input')
        @include('commons.navtab')
    
    
    <!--dashboard.blead-->
    
        @if ($flg==='shopping')
        <!--shopping-->
            @include('shopping_lists.shopping_lists')
        @else
        <!--purchase-->
            @include('shopping_lists.purchased_list')
        @endif

    @else
        <!--dashboard2-->
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
    @endif
@endsection