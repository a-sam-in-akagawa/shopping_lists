<div class="mt-4">
    @if (isset($shopping_lists))
        <ul class="list-none">
            @foreach ($shopping_lists as $shopping_list)
                <!--ここおる？-->
                <li class="flex items-start gap-x-2 mb-4">
                    <div><!--test-->
                        <div>
                            {{-- 商品名 --}}
                            <a class="link link-hover text-info" href="">{{ $shopping_list->name }}</a>
                            {{-- 優先度とカテゴリー --}}
                            @if (is_null($shopping_list->priority_id))
                                <span class="text-muted text-gray-500">なし</span>
                            @else
                                <span class="text-muted text-gray-500">{{ $shopping_list->priority->name }}</span>
                            @endif
                            @if (is_null($shopping_list->category_id))
                                なし
                            @else
                                <a class="link link-hover text-info" href="">{{ $shopping_list->category->name }}</a>
                            @endif
                            
                            {{-- 投稿削除ボタンのフォーム --}}
                            <form method="POST" action="{{ route('shopping_lists.destroy', $shopping_list->id) }}">
                                @csrf
                                @method('DELETE')
                                <button name="del_b" value="purchase" type="submit" class="btn btn-error btn-sm normal-case" 
                                    onclick="return confirm('Delete id = {{ $shopping_list->id }} ?')">削除</button>
                            </form>
                            {{-- 購入済ボタンのフォーム --}}
                            <form method="POST" action="{{ route('shopping_lists.update', $shopping_list->id) }}">
                                @csrf
                                @method('PUT')
                                <button name="flg" value="off" type="submit" class="btn btn-error btn-sm normal-case">再購入</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    
    @if (isset($req))
        {{ $req }}
    @endif
</div>