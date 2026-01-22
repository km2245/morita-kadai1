<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <h1 class="site-title">Fashionably Late</h1>
    <div class="site-line"></div>

    <main class="box">
        <form action="{{ route('contact.confirm') }}" method="post" novalidate>
            @csrf

            <h1 class="page-title">Contact</h1>

            {{-- お名前 --}}
            <div class="form-row">
                <label>お名前<span class="required">※</span>
                </label>
                <!-- <div class="form-input name-row">
                        <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                        <p class="error">
                        @error('last_name'){{ $message }}@enderror
                    </p>
                        <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                        <p class="error">
                        @error('first_name'){{ $message }}@enderror
                    </p>
                </div> -->
                <div class="form-input">
                    <div class="name-row">
                        <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                        <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                    </div>

                    <p class="error">
                        @error('name'){{ $message }}@enderror
                        @error('last_name'){{ $message }}@enderror
                        @error('first_name'){{ $message }}@enderror
                    </p>
                </div>

            </div>
            {{-- 性別 --}}
            <div class="form-row">
                <label>性別<span class="required">※</span></label>
                <div class="form-input gender-row">
                    <label>
                        <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                        男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                        女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                        その他
                    </label>
                    <p class="error">
                        @error('gender'){{ $message }}@enderror
                    </p>

                </div>
            </div>
            {{-- メール --}}
            <div class="form-row">
                <label>メールアドレス<span class="required">※</span></label>
                <div class="form-input">
                    <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                    <p class="error">
                        @error('email'){{ $message }}@enderror
                    </p>
                </div>
            </div>
            {{-- 電話番号 --}}
            <div class="form-row">
                <label>電話番号<span class="required">※</span></label>
                <div class="form-input">
                    <div class="tel-row">
                        <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}" maxlength="4">
                        <span class="tel-hyphen">-</span>
                        <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}" maxlength="4">
                        <span class="tel-hyphen">-</span>
                        <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}" maxlength="4">
                    </div>
                    <p class="error">
                        @error('tel1'){{ $message }}@enderror
                    </p>



                </div>
            </div>
            {{-- 住所 --}}
            <div class="form-row">
                <label>住所<span class="required">※</span></label>
                <div class="form-input">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    <p class="error">
                        @error('address'){{ $message }}@enderror
                    </p>
                </div>
            </div>
            {{-- 建物名 --}}
            <div class="form-row">
                <label>建物名</label>
                <div class="form-input">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>
            {{-- お問い合わせ種別 --}}
            <div class="form-row">
                <label>お問い合わせの種類<span class="required">※</span></label>
                <div class="form-input">
                    <select name="category_id" required>
                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>
                    <p class="error">
                        @error('category_id'){{ $message }}@enderror
                    </p>
                </div>
            </div>
            {{-- お問い合わせ内容 --}}
            <div class="form-row">
                <label>お問い合わせ内容<span class="required">※</span></label>
                <div class="form-input">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" rows="5">{{ old('detail') }}</textarea>
                    <p class="error">
                        @error('detail'){{ $message }}@enderror
                    </p>
                </div>
            </div>
            <div>
                <button type="submit" class="submit-btn">確認画面</button>
            </div>

        </form>
    </main>

</body>

</html>