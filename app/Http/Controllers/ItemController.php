<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Place;
use App\Http\Requests\NewItem;
use App\Http\Requests\EditItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * 在庫一覧、表示
     * @param Illuminate\Http\Request
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $column = $request->column;
        $sort = $request->sort;

        $query = Item::query();

        // 物品名で検索
        if (!empty($keyword)) {
            if ($column == 'title') {
                $query->where('title', 'LIKE', "%{$keyword}%");
            } else {
                // カテゴリ、もしくは保管場所で検索
                $query->whereHas($column, function($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            }
        }

        // 昇順・降順、並べ替え
        if (!empty($column) && !empty($sort)) {
            $query->orderBy($column, $sort);
        }

        $items = $query->paginate(10);

        return view('inventories/index',[
            'items' => $items,
            'selected_column' => $column
        ]);
    }

    /**
     * 新しい在庫作成フォーム、表示
     * @return Illuminate\View\View
     */
    public function showNewForm()
    {
        $categories = Category::all();

        $places = Place::all();

        return view('inventories/new', compact("categories", "places"));
    }

    /**
     * 新しい在庫作成
     * @param App\Http\Requests\NewItem
     * @return Illuminate\Support\Facades\Redirect
     */
    public function new(NewItem $request)
    {
        $item = new Item();

        // サムネイル画像、登録
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

        // 在庫のカテゴリを保存
        $item->categories()->attach(request()->categories);

        // 在庫の保管場所を保存
        $item->places()->attach(request()->place);

        return redirect()->route('item.index');
    }

    /**
     * 在庫データ詳細、表示
     * @param App\Models\Item
     * @return Illuminate\View\View
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
     * @return Illuminate\View\View
     */
    public function showEditForm(Item $item)
    {
        $categories = $item->categories->pluck('id')->toArray();
        $places = $item->places->pluck('id')->toArray();

        $place = implode($places);

        $category_list = Category::all();
        $place_list = Place::all();

        return view('inventories/edit',[
            'current_item' => $item,
            'categories' => $categories,
            'current_place' => $place,
            'category_list' => $category_list,
            'place_list' => $place_list
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

        // サムネイル画像、更新
        $upload_image = $request->file('image');
        if ($upload_image) {
            // サーバ上の、サムネイル画像削除
            Storage::delete($item->file_path);

            $path = $upload_image->store('public/uploads');

            if ($path) {
                $item->file_name = $upload_image->getClientOriginalName();
                $item->file_path = $path;
            }
        }

        $item->title = $request->title;
        $item->quantity = $request->quantity;
        $item->save();

        // 在庫のカテゴリを更新
        $item->categories()->sync(request()->categories);

        // 在庫の保管場所を更新
        $item->places()->sync(request()->place);

        return redirect()->route('item.index');
    }

    /**
     * 在庫データの削除
     * @param App\Models\Item
     * @return Illuminate\Support\Facades\Redirect
     */
    public function delete(Item $item)
    {
        // サーバ上の、サムネイル画像削除
        Storage::delete($item->file_path);

        Item::destroy($item->id);

        return redirect()->route('item.index');
    }
}
