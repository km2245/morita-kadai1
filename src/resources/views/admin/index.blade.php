<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>

<body>

    <h1>管理画面</h1>

    <form method="get">
        <input type="text" name="keyword" placeholder="名前 or メール">
        <select name="gender">
            <option value="">性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
        </select>
        <button>検索</button>
    </form>

    <table border="1">
        <tr>
            <th>名前</th>
            <th>性別</th>
            <th>メール</th>
            <th>種別</th>
            <th>詳細</th>
        </tr>

        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>
            <td>
                <a href="{{ route('admin.show', $contact->id) }}">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
    
    <div>
        {{ $contacts->links('vendor.pagination.default') }}
    </div>

</body>

</html>