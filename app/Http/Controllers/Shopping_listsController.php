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
            $shopping_lists = $user->shopping_lists()->where('purchase_flg',false)->orderByRaw('priority_id is null asc')->orderBy('priority_id', 'asc')->get();
            // 優先度と商品種類を取得
            $priorities = \DB::table('priorities')->get();
            $categories = \DB::table('categories')->get();

            $data = [
                'user' => $user,
                'shopping_lists' => $shopping_lists,
                'priorities' => $priorities,
                'categories' => $categories,
                'flg' => 'shopping'
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:255',
        ]);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->shopping_lists()->create([
            'name' => $request->name,
            'priority_id' => $request->priority_id,
            'category_id' => $request->category_id,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    public function destroy(Request $request, $id)
    {
        // idの値で投稿を検索して取得
        $shopping_list = Shopping_list::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $shopping_list->user_id) {
            $shopping_list->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
    
    public function update(Request $request, $id)
    {
        // idの値で検索して取得
        $shopping_list = Shopping_list::findOrFail($id);
        // 購入済みフラグを修正
        if ($request->flg==="on") {
            $shopping_list->purchase_flg = true;
        } else {
            $shopping_list->purchase_flg = false;
        };
        
        $shopping_list->save();

        return back();
        
    }
    
    public function purchase_list()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの商品一覧を優先度順で取得
            $shopping_lists = $user->shopping_lists()->where('purchase_flg',true)->orderByRaw('priority_id is null asc')->orderBy('priority_id', 'asc')->get();
            // 優先度と商品種類を取得
            $priorities = \DB::table('priorities')->get();
            $categories = \DB::table('categories')->get();

            $data = [
                'user' => $user,
                'shopping_lists' => $shopping_lists,
                'priorities' => $priorities,
                'categories' => $categories,
                'flg' => 'purchase'
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }
    
    public function destroy_all(Request $request)
    {
        
        $user = \Auth::user();
        // ユーザの商品一覧を優先度順で取得
        if ($request->del_all==='shopping') {
            $user->shopping_lists()->where('purchase_flg',false)->delete();
            return redirect('/');
        } else {
            $user->shopping_lists()->where('purchase_flg',true)->delete();
            return redirect('purchase');
        }
    }
    
    public function filtering($id, $flg)
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            // 優先度と商品種類を取得
            $priorities = \DB::table('priorities')->get();
            $categories = \DB::table('categories')->get();
            
            // ユーザの商品一覧を優先度順で取得
            if ($id==='null') {
                $id = NULL;
            }
            if ($flg==='shopping') {
                $shopping_lists = $user->shopping_lists()->where('purchase_flg',false)->
                    where('category_id',$id)->orderByRaw('priority_id is null asc')->orderBy('priority_id', 'asc')->get();
            } else {
                $shopping_lists = $user->shopping_lists()->where('purchase_flg',true)->
                    where('category_id',$id)->orderByRaw('priority_id is null asc')->orderBy('priority_id', 'asc')->get();
            }
            
            $data = [
                'user' => $user,
                'shopping_lists' => $shopping_lists,
                'priorities' => $priorities,
                'categories' => $categories,
                'flg' => $flg,
            ];
        }
        
        return view('/dashboard', $data);

    }
}
