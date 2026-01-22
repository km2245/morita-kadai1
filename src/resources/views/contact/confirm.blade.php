<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>確認</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">

</head>

<body>

    <h1 class="site-title">Fashionably Late</h1>
    <div class="site-line"></div>
    <form class="confirm-form" action="{{ route('contact.store') }}" method="post">
        @csrf

        <h1 class="page-title">Confirm</h1>

        <table border="1">
            <tr>
                <th>お名前</th>
                <td>{{ $inputs['last_name'] ?? '' }}　{{ $inputs['first_name'] ?? '' }}</td>
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
                <td>{{ $inputs['email'] ?? '' }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $inputs['tel1'] ?? '' }}-{{ $inputs['tel2'] ?? '' }}-{{ $inputs['tel3'] ?? '' }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $inputs['address'] ?? '' }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $inputs['building'] ?? '' }}</td>
            </tr>
            <tr>
                <th>お問い合わせ種別</th>
                <td>{{ $category->content }}</td>
            </tr>
            <tr>
                <th>内容</th>
                <td>{{ $inputs['detail'] ?? '' }}</td>
            </tr>
        </table>

        {{-- hiddenで全部保持 --}}
        @foreach ($inputs as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach

        <div class="btn-area">
            <button type="submit">送信</button>
            <button type="submit" name="back" value="1" class="edit-btn">修正</button>
        </div>
    </form>




</body>

</html>