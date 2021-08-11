@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<h1>在庫データの更新</h1>
<form action="{{ route('inventories.edit', [ 'item' => $current_item->id ]) }}" method="post">
    @csrf
    <div>
        <label for="inventory_title">物品名</label>
        <input id="inventory_title" name="title" type="text" value="{{ old('title') ?? $current_item->title }}"
            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div>
        <label for="inventory_quantity">数量</label>
        <input id="inventory_title" name="quantity" type="number" min="0" max="100"
            value="{{ old('quantity') ?? $current_item->quantity }}"
            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div>
        <input type="submit" value="この内容で更新する">
    </div>
</form>
@endsection
