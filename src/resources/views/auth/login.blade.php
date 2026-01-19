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
            @error('email')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>パスワード</label><br>
            <input type="password" name="password">
            @error('password')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">ログイン</button>
    </form>


</body>

</html>