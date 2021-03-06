@extends('layout')

@section('styles')
@include('share.styles')
@endsection

@section('content')
<a href="{{ route('item.new') }}">新規在庫データの追加</a>
<h1>在庫一覧</h1>
<form action="{{ route('item.index') }}" method="get">
    @csrf
    <select name="column">
        <option value="title" @if ($selected_column == 'title') selected @endif>物品名</option>
        <option value="categories" @if ($selected_column == 'categories') selected @endif>カテゴリ</option>
        <option value="places" @if ($selected_column == 'places') selected @endif>保管場所</option>
    </select>
    <input type="text" name="keyword"
        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    <input type="submit" value="検索">
</form>
@if ($items->count())
<table>
    <thead>
        <tr>
            <th>写真</th>
            <th>物品名</th>
            <th>カテゴリ</th>
            <th>保管場所</th>
            <th>数量</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                {{-- 数量のソート --}}
                <form action="{{ route('item.index') }}" method="get">
                    @csrf
                    <input type="hidden" name="column" value="quantity">
                    <input type="hidden" name="sort" value="asc">
                    <input type="submit" value="少ない">
                </form>
                <form action="{{ route('item.index') }}" method="get">
                    @csrf
                    <input type="hidden" name="column" value="quantity">
                    <input type="hidden" name="sort" value="desc">
                    <input type="submit" value="多い">
                </form>
            </td>
            <td>
                {{-- 更新日のソート --}}
                <form action="{{ route('item.index') }}" method="get">
                    @csrf
                    <input type="hidden" name="column" value="updated_at">
                    <input type="hidden" name="sort" value="asc">
                    <input type="submit" value="古い">
                </form>
                <form action="{{ route('item.index') }}" method="get">
                    @csrf
                    <input type="hidden" name="column" value="updated_at">
                    <input type="hidden" name="sort" value="desc">
                    <input type="submit" value="新しい">
                </form>
            </td>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td><img src="{{ Storage::url($item->file_path) }}" alt="" class="index-image_size"></td>
            <td><a href="{{ route('item.item', [ 'item' => $item->id ]) }}">{{ $item->title }}</a></td>
            <td>
                @foreach ($item->categories as $category)
                {{ $category->name }}
                @endforeach
            </td>
            <td>
                @foreach ($item->places as $place)
                {{ $place->name }}
                @endforeach
            </td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->formatted_updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $items->appends(request()->input())->links('vendor/pagination/original_pagination_view') }}
@else
<p>見つかりませんでした。</p>
@endif
@endsection

@section('scripts')
@include('share.scripts')
@endsection
