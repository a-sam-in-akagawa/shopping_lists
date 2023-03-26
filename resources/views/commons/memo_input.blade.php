<div class="prose mx-auto grid grid-cols-6 gap-2">
    <div class="col-span-3">
        <form method="POST" action="">
            @csrf
            
            <label class="label">
                <span class="label-text">商品名</span>
            </label>
            <input name="name" type="text" class="input input-bordered input-accent w-full max-w-xs" />
        </div>
        <div class="col-span-1">
            <label class="label">
                <span class="label-text">優先度</span>
            </label>
            <select class="select select-accent w-full max-w-xs" name="priority_id">
                <option disabled selected>-</option>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-1">
            <label class="label">
                <span class="label-text">種類</span>
            </label>
            <select class="select select-accent w-full max-w-xs" name="category_id">
                <option disabled selected>-</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-1">
            <label class="label">
                <span class="label-text">&nbsp;</span>
            </label>
            <button type="submit" class="btn btn-neutral btn-block normal-case">登録</button>
        </div>
    </form>
</div>