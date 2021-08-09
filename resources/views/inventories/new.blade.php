<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>新規在庫データの追加</title>
</head>
<body>
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
    <form action="{{ route('inventories.new') }}" method="post">
        @csrf
        <div>
            <label for="inventory_title">物品名</label>
            <input id="inventory_title" name="inventory_title" type="text" value="{{ old('inventory_title')}}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label for="inventory_quantity">数量</label>
            <input id="inventory_title" name="inventory_quantity" type="number" min="0" max="100" value="{{ old('inventory_quantity') ? old('inventory_quantity') : 0 }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <input type="submit" value="この内容で登録する">
        </div>
    </form>
</body>
</html>