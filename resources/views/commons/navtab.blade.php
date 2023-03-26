<div class="tabs prose mx-auto">
    {{-- 買い物リストタブ --}}
    <a href="/" class="tab tab-lifted grow {{ $flg==="shopping" ? 'tab-active' : '' }}">
        お買い物メモ
    </a>
    {{-- 購入済みリストタブ --}}
    <a href="{{ route('purchase') }}" class="tab tab-lifted grow {{ $flg==="purchase" ? 'tab-active' : '' }}">
        購入済みリスト
    </a>
</div>