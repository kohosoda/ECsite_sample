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

        $items = $user->soldItems->map(function ($soldItem) {
            return $soldItem->item;
        });
        
        // $soldItems = $user->soldItems;
        // foreach($soldItems as $soldItem){
        //     $items[] = $soldItem->item;
        // }
        // dd($soldItems, $items);

        return view('users.history', ['items' => $items, 'user' => $user]);
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
            
            return redirect()->view('users.show', ['user' => $user])->with('flash_message', '登録情報を更新しました');
        }
    }
}
