<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shopping_list;

class Shopping_listsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの商品一覧を優先度順で取得
            $shopping_lists = $user->shopping_lists()->orderBy('priority_id', 'asc')->get();
            // 優先度と商品種類を取得
            $priorities = \DB::table('priorities')->get();
            $categories = \DB::table('categories')->get();

            $data = [
                'user' => $user,
                'shopping_lists' => $shopping_lists,
                'priorities' => $priorities,
                'categories' => $categories,
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }
}
