@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<div>
    <a href="{{ route('item.index') }}">在庫一覧へ</a>
</div>
<div>
    <a href="{{ route('item.edit', $current_item->id) }}">この在庫データを編集する</a>
</div>
<div>
    <form method="post" name="form1" action="{{ route('item.delete', $current_item->id) }}">
        @csrf
        <input type="hidden">
        <a href="javascript:form1.submit()" class="confirmation">この在庫データを削除する</a>
    </form>
</div>
<h1>在庫データ詳細</h1>
<table>
    <tbody>
        <tr>
            <th>在庫ID</th>
            <td>{{ $current_item->id }}</td>
        </tr>
        <tr>
            <th>物品名</th>
            <td>{{ $current_item->title }}</td>
        </tr>
        <tr>
            <th>数量</th>
            <td>{{ $current_item->quantity }}</td>
        </tr>
        <tr>
            <th>カテゴリ</th>
            <td>
                @foreach ($current_item->categories as $category)
                {{ $category->name }}
                @endforeach
            </td>
        </tr>
        <tr>
            <th>保管場所</th>
            <td>
                @foreach ($current_item->places as $place)
                {{ $place->name }}
                @endforeach
            </td>
        </tr>
        <tr>
            <th>在庫データ更新日</th>
            <td>{{ $current_item->formatted_show_item_updated_at }}</td>
        </tr>
        <tr>
            <th>在庫データ作成日</th>
            <td>{{ $current_item->formatted_show_item_created_at }}</td>
        </tr>
    </tbody>
</table>
<div>
    <img src="{{ Storage::url($current_item->file_path) }}" alt="{{ $current_item->title }}">
</div>
@endsection

@section('scripts')
@include('share.scripts')
@endsection
