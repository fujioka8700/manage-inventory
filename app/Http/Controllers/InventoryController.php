<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\NewItem;
use App\Http\Requests\EditItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
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
     * @param App\Http\Requests\NewItem
     * @return Illuminate\Support\Facades\Redirect
     */
    public function new(NewItem $request)
    {
        $item = new Item();

        $upload_image = $request->file('image');
        if ($upload_image) {
            $path = $upload_image->store('public/uploads');

            if ($path) {
                $item->file_name = $upload_image->getClientOriginalName();
                $item->file_path = $path;
            }
        }

        $item->title = $request->title;
        $item->quantity = $request->quantity;
        $item->save();

        return redirect()->route('inventory.index');
    }

    /**
     * 在庫データ詳細、表示
     * @param App\Models\Item
     * @return \Illuminate\View\View
     */
    public function showItem(Item $item)
    {
        $current_item = Item::find($item->id);

        return view('inventories/item',[
            'current_item' => $current_item,
        ]);
    }

    /**
     * 在庫データ更新フォーム、表示
     * @param App\Models\Item
     * @return \Illuminate\View\View
     */
    public function showEditForm(Item $item)
    {
        return view('inventories/edit',[
            'current_item' => $item,
        ]);
    }

    /**
     * 在庫データの更新
     * @param App\Models\Item
     * @return Illuminate\Support\Facades\Redirect
     */
    public function edit(Item $item, EditItem $request)
    {
        $item = Item::find($item->id);

        $item->title = $request->title;
        $item->quantity = $request->quantity;
        $item->save();

        return redirect()->route('inventory.index');
    }

    /**
     * 在庫データの削除
     * @param App\Models\Item
     * @return Illuminate\Support\Facades\Redirect
     */
    public function delete(Item $item)
    {
        Storage::delete($item->file_path);

        Item::destroy($item->id);

        return redirect()->route('inventory.index');
    }
}