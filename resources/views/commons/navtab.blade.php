<div class="tabs">
    {{-- 買い物リストタブ --}}
    <a href="/" class="tab tab-lifted grow {{ Request::is('/') ? 'tab-active' : '' }}{{ Request::routeIs('dashboard') ? 'tab-active' : '' }}">
        お買い物メモ
    </a>
    {{-- 購入済みリストタブ --}}
    <a href="{{ route('purchase') }}" class="tab tab-lifted grow {{ Request::routeIs('purchase') ? 'tab-active' : '' }}">
        購入済みリスト
    </a>
</div>