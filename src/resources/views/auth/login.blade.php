<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

</head>

<body>

    <header class="admin-header">
        <h1 class="site-title">Fashionably Late</h1>
    </header>

    <div class="site-line"></div>


    <main class="register-main">

        <h2 class="page-title">Login</h2>

        <div class="box register-box">

            <form class="login-form" method="POST" action="/login">
                @csrf


                <div class="form-row">
                    <label>メールアドレス</label>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="例：test@example.com">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <label>パスワード</label>
                    <div class="form-input">
                        <input type="password" name="password" placeholder="例：coachtech1106">
                        @error('password')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="register-btn">ログイン</button>
            </form>
        </div>
    </main>


</body>

</html>