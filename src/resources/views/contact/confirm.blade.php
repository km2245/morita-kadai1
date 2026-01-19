<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>確認</title>
</head>

<body>

    <h1>お問い合わせ確認</h1>

    <form action="{{ route('contact.store') }}" method="post">
        @csrf

        <table border="1">
            <tr>
                <th>お名前</th>
                <td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if ($inputs['gender'] == 1) 男性
                    @elseif ($inputs['gender'] == 2) 女性
                    @else その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メール</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $inputs['tel'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $inputs['address'] }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $inputs['building'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせ種別</th>
                <td>{{ $category->content }}</td>
            </tr>
            <tr>
                <th>内容</th>
                <td>{{ $inputs['detail'] }}</td>
            </tr>
        </table>

        {{-- hiddenで全部持たせる --}}
        @foreach ($inputs as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach

        <button type="submit">送信</button>
        <button type="submit" name="back" value="back">修正</button>
    </form>

</body>

</html>