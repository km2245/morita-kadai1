<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>

    <h1>会員登録</h1>

    <form method="POST" action="/register">
        @csrf


        <div>
            <label>お名前</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>メール</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>パスワード</label><br>
            <input type="password" name="password">
        </div>

        <button type="submit">登録</button>
    </form>

    @if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif


</body>

</html>