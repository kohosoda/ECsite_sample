<?php

namespace App\Http\Controllers;

use App\Item;
use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::select('cart_items.*', 'items.name', 'items.price')
            ->where('user_id', AUth::id())
            ->join('items', 'items.id','=','cart_items.item_id')
            ->get();

        $subtotal = 0;
        foreach($cartItems as $cartItem){
            $subtotal += $cartItem->price * $cartItem->quantity;
        }

        return view('/cartitem/index', ['cartItems' => $cartItems, 'subtotal' => $subtotal]);
    }


    public function store(Request $request, Item $item)
    {
        CartItem::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'item_id' => $request->post('item_id'),
            ],
            [
                'quantity' => DB::raw('quantity +' . $request->post('quantity') ),
            ]
        );

        return redirect('/')->with('flash_message', 'カートに商品を追加しました');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect('/cartitem')->with('flash_message', 'カートから削除しました');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $cartItem->quantity = $request->post('quantity');
        $cartItem->save();
        
        return redirect('/cartitem')->with('flash_message', 'カートを更新しました');
    }
}
