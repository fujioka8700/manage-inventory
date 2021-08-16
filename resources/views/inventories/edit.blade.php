@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<div>
    <a href="{{ route('item.index') }}">在庫一覧へ</a>
</div>
<div>
    <a href="{{ route('item.item', [ 'item' => $current_item->id ]) }}">編集を中止する</a>
</div>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h1>在庫データの更新</h1>
<form action="{{ route('item.edit', [ 'item' => $current_item->id ]) }}" method="post">
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
        <h2>カテゴリ</h2>
        @foreach ($category_list as $category)
        <label>
            <input type="checkbox" name="categories[]" value="{{ $category->id }}" @if(in_array($category->id,
            $categories)) checked @endif>{{ $category->name }}
        </label>
        @endforeach
    </div>
    <div>
        <label>
            <h2>保存場所</h2>
            <select name="place[]"
                class="block mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                <option value="">保管場所を選んでください</option>
                @foreach ($place_list as $place)
                <option value="{{ $place->id }}" @if (in_array($place->id, $places)) selected @endif>{{ $place->name }}
                </option>
                @endforeach
            </select>
        </label>
    </div>
    <div>
        <input type="submit" value="この内容で更新する">
    </div>
</form>
@endsection

@section('scripts')
@include('share.scripts')
@endsection
