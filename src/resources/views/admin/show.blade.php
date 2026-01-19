<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>詳細</title>
</head>

<body>

    <h1>お問い合わせ詳細</h1>

    <ul>
        <li>名前：{{ $contact->last_name }} {{ $contact->first_name }}</li>
        <li>性別：{{ $contact->gender }}</li>
        <li>メール：{{ $contact->email }}</li>
        <li>電話：{{ $contact->tel }}</li>
        <li>住所：{{ $contact->address }}</li>
        <li>建物：{{ $contact->building }}</li>
        <li>種別：{{ $contact->category->content }}</li>
        <li>内容：{{ $contact->detail }}</li>
    </ul>

    <form action="{{ route('admin.destroy', $contact->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button>削除</button>
    </form>

</body>

</html>