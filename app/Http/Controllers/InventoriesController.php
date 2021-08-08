<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('inventories/index',[
            'items' => $items
        ]);
    }
}
