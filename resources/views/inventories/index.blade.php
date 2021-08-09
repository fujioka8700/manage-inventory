@extends('layout')

@section('styles')
    @include('share.styles')
@endsection

@section('content')
    <a href="{{ route('inventories.new') }}">新規在庫データの追加</a>
    <h1>在庫一覧</h1>
    <table>
        <tr>
            <th>物品名</th>
            <th>数量</th>
            <th>更新日</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->formatted_updated_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection