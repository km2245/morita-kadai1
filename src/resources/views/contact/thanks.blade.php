<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>送信完了</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">

</head>

<body>
    <div class="thanks-wrapper">
        <h1 class="thanks-title">お問い合わせありがとうございました</h1>

        <a href="{{ route('contact.index') }}" class=" thanks-link ">HOME</a>
    </div>
</body>

</html>