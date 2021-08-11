@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<div>
    <a href="{{ route('inventories.index') }}">在庫一覧へ</a>
</div>
<div>
    <a href="{{ route('inventories.edit', $current_item->id) }}">この在庫データを編集する</a>
</div>
<div>
    <a href="https://www.yahoo.co.jp/" class="confirmation">この在庫データを削除する</a>
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
            <th>在庫データ更新日</th>
            <td>{{ $current_item->formatted_show_item_updated_at }}</td>
        </tr>
        <tr>
            <th>在庫データ作成日</th>
            <td>{{ $current_item->formatted_show_item_created_at }}</td>
        </tr>
    </tbody>
</table>
@endsection

@section('scripts')
@include('share.scripts')
@endsection