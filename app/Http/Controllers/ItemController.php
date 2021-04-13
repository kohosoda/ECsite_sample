<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(6);
        return view('item.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        return view('item.show', ['item' => $item]);
    }

    public function like(Request $request, Item $item)
    {
        $item->likes()->detach($request->user()->id);
        $item->likes()->attach($request->user()->id);

        return [
            'id' => $item->id,
        ];
    }

    public function unlike(Request $request, Item $item)
    {
        $item->likes()->detach($request->user()->id);

        return [
            'id' => $item->id,
        ];
    }
}
