<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>在庫一覧</title>
</head>
<body>
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
</body>
</html>