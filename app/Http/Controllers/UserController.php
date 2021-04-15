<?php

namespace App\Http\Controllers;

use App\SoldItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // 現在認証されているユーザーの取得

        return view('users.show', ['user' => $user]);
    }

    public function history()
    {
        $user = Auth::user();

        // sold_itemsテーブルとitemsテーブルを結合して、ユーザーの購入履歴を取得する。
        $soldItems = SoldItem::select('sold_items.*', 'items.name', 'items.price', 'items.src')
            ->where('user_id', $user->id)
            ->join('items', 'items.id','=','sold_items.item_id')
            ->get();

        return view('users.history', ['soldItems' => $soldItems, 'user' => $user]);
    }

    public function like()
    {
        $user = Auth::user();

        $items = $user->likes;

        return view('users.like', ['items' => $items, 'user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        if($request->has('confirm') || $request->has('back')){
            $request->flash(); // 値をセッションに保存
            $user = Auth::user();
            
            return view('users.show', ['user' => $user]);
        }
        if($request->has('post')){
            // 値をusersテーブルに保存する
            $user = User::find(Auth::id());
            $user->fill($request->all())->save();
            
            return redirect()->route('mypage.show')->with('flash_message', '登録情報を更新しました');
        }
    }
}
