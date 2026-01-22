<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

</head>

<body>

    <header class="admin-header">
        <h1 class="site-title">Fashionably Late</h1>

    </header>

    <div class="site-line"></div>



    <main class="register-main">

        <h2 class="page-title">Register</h2>


        <div class="box register-box">

            <form class="box register-box" method="POST" action="/register">
                @csrf


                <div class="form-row">
                    <label>お名前</label>
                    <div class="form-input">
                        <input type="text" name="name" placeholder="例：山田 太郎" value="{{ old('name') }}">
                        @error('name')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <label>メールアドレス</label>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
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

                <button type="submit" class="register-btn">登録</button>
            </form>
        </div>
    </main>


</body>

</html>