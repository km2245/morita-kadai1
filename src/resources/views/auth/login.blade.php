<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

    <h1>ログイン</h1>

    <form method="POST" action="/login">
        @csrf


        <div>
            <label>メール</label><br>
            <input type="email" name="email">
        </div>

        <div>
            <label>パスワード</label><br>
            <input type="password" name="password">
        </div>

        <button type="submit">ログイン</button>
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