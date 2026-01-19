<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>
</head>

<body>

    <h1>お問い合わせフォーム</h1>



    <form action="{{ route('contact.confirm') }}" method="post" novalidate>
        @csrf


        {{-- お名前 --}}
        <div>
            <label>お名前</label><br>
            <input type="text" name="last_name" placeholder="姓" value="{{ old('last_name') }}">
            @error('last_name')
            <div style="color:red;">{{ $message }}</div>
            @enderror
            <input type="text" name="first_name" placeholder="名" value="{{ old('first_name') }}">
            @error('first_name')
            <div style="color:red;">{{ $message }}</div>
            @enderror

        </div>

        {{-- 性別 --}}
        <div>
            <label>性別</label><br>
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
            @error('gender')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- メール --}}
        <div>
            <label>メールアドレス</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- 電話番号 --}}
        <div>
            <label>電話番号</label><br>
            <input type="text" name="tel" value="{{ old('tel') }}">
            @error('tel')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- 住所 --}}
        <div>
            <label>住所</label><br>
            <input type="text" name="address" value="{{ old('address') }}">
            @error('address')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- 建物名 --}}
        <div>
            <label>建物名</label><br>
            <input type="text" name="building" value="{{ old('building') }}">
        </div>

        {{-- お問い合わせ種別 --}}
        <div>
            <label>お問い合わせの種類</label><br>
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- お問い合わせ内容 --}}
        <div>
            <label>お問い合わせ内容</label><br>
            <textarea name="detail" rows="5">{{ old('detail') }}</textarea>
            @error('detail')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">確認画面</button>
        </div>

    </form>

</body>

</html>