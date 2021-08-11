@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<a href="{{ route('inventories.new') }}">新規在庫データの追加</a>
<h1>在庫一覧</h1>
<table>
    <thead>
        <tr>
            <th>物品名</th>
            <th>数量</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td><a href="{{ route('inventories.item', [ 'item' => $item->id ]) }}">{{ $item->title }}</a></td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->formatted_updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
