<div class="prose mx-auto">
    @if (isset($shopping_lists))

        <table class="table w-full my-4">
            <thead>
                <tr>
                    <th class="w-1/2">商品名</th>
                    <th>優先度</th>
                    <th>種類</th>
                    <th class="w-1/8"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shopping_lists as $shopping_list)
                    <tr>
                        <td>{{ $shopping_list->name }}</td>
                        @if (is_null($shopping_list->priority_id))
                            <td><span class="text-muted text-gray-500">なし</span></td>
                        @else    
                            <td class="{{ $shopping_list->priority->color }}">
                                <span class="text-muted text-gray-500">{{ $shopping_list->priority->name }}</span>
                            </td>
                        @endif
                        <td>@if (is_null($shopping_list->category_id))
                                <a class="link link-hover text-info" href="{{ route('filtering', ['id' => 'null', 'flg' => $flg]) }}">なし</a>
                            @else
                                <a class="link link-hover text-info" href="{{ route('filtering', ['id' => $shopping_list->category_id, 'flg' => $flg]) }}">{{ $shopping_list->category->name }}</a>
                            @endif</td>
                        <td><form method="POST" action="{{ route('shopping_lists.update', $shopping_list->id) }}">
                                @csrf
                                @method('PUT')
                                <button name="flg" value="false" type="submit" class="btn btn-error btn-sm normal-case">再メモ</button>
                            </form></td>
                        <td><form method="POST" action="{{ route('shopping_lists.destroy', $shopping_list->id) }}">
                                @csrf
                                @method('DELETE')
                                <button name="del_b" value="purchase" type="submit" class="btn btn-error btn-sm normal-case" 
                                    onclick="return confirm('Delete id = {{ $shopping_list->id }} ?')">削除</button>
                            </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>