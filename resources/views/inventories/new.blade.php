@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<div>
    <a href="{{ route('inventory.index') }}">在庫一覧へ</a>
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
<h1>新しい在庫データの追加</h1>
<form action="{{ route('inventory.new') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="inventory_title">物品名</label>
        <input id="inventory_title" name="title" type="text" value="{{ old('title') }}"
            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div>
        <label for="inventory_quantity">数量</label>
        <input id="inventory_title" name="quantity" type="number" min="0" max="100" value="{{ old('quantity') ?? 0 }}"
            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div>
        @foreach ($categories as $category)
        <label>
            <input type="checkbox" name="category[]" value="{{ $category->id }}">{{ $category->name }}
        </label>
        @endforeach
    </div>
    <div>
        <input type="file" name="image" accept="image/png, image/jpeg">
    </div>
    <div>
        <input type="submit" value="この内容で登録する">
    </div>
</form>
@endsection

@section('scripts')
@include('share.scripts')
@endsection
