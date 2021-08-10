<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\NewItem;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    /**
     * 在庫一覧、表示
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $items = Item::all();

        return view('inventories/index',[
            'items' => $items
        ]);
    }

    /**
     * 新しい在庫作成フォーム、表示
     * @return \Illuminate\View\View
     */
    public function showNewForm()
    {
        return view('inventories/new');
    }

    /**
     * 新しい在庫作成
     * @param NewItem $request
     * @return Illuminate\Support\Facades\Redirect
     */
    public function new(NewItem $request)
    {
        $item = new Item();

        $item->title = $request->inventory_title;

        $item->quantity = $request->inventory_quantity;

        $item->save();

        return redirect()->route('inventories.index');
    }

    /**
     * 在庫データ詳細、表示
     * @return \Illuminate\View\View
     */
    public function showItem(Item $item)
    {
        $current_item = Item::find($item->id);

        return view('inventories/item',[
            'current_item' => $current_item,
        ]);
    }
}
