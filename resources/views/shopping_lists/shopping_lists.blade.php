<div class="mt-4">
    @if (isset($shopping_lists))
        <ul class="list-none">
            @foreach ($shopping_lists as $shopping_list)
                <!--ここおる？-->
                <li class="flex items-start gap-x-2 mb-4">
                    <div><!--test-->
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="">{{ $shopping_list->name }}</a>
                            <span class="text-muted text-gray-500">{{ $shopping_list->priority->name }}</span>
                            <a class="link link-hover text-info" href="">{{ $shopping_list->category->name }}</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    <!--test_shopping_lists-->
</div>