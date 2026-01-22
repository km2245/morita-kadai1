<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>


<body>



    <header class="admin-header">
        <h1 class="site-title">Fashionably Late</h1>

        <form method="POST" action="{{ route('logout') }}" class="logout">
            @csrf
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </header>

    <div class="site-line"></div>

    <main class="register-main">
        <div class="admin-container">

            <h2 class="page-title">Admin</h2>
            <form method="GET" action="{{ route('admin.search') }}">
                <div class="search-area">

                    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
                        value="{{ request('keyword') }}">
                    <select name="gender">
                        <option value="">性別</option>
                        <option value="">全て</option>
                        <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                    </select>

                    <select name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>

                    <input type="date" name="date" value="{{ request('date') }}">

                    <button type="submit">検索</button>
                    <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>
                </div>
            </form>

            <div class="admin-actions">
                <a href="{{ route('admin.export', request()->query()) }}"
                    class="export-btn">
                    エクスポート
                </a>



                <div class="pagination-wrapper">
                    {{ $contacts->links('vendor.pagination.default') }}
                </div>

            </div>

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
                        <td>
                            @if ($contact->gender == 1)
                            男性
                            @elseif ($contact->gender == 2)
                            女性
                            @else
                            その他
                            @endif
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->content }}</td>
                        <td>
                            <button
                                type="button"
                                class="detail-btn"
                                data-id="{{ $contact->id }}">
                                詳細
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </table>


                <!-- モーダル -->
                <div id="modal" class="modal">
                    <div class="modal-card">
                        <button id="modal-close" class="modal-close">×</button>
                        <div id="modal-content"></div>
                    </div>
                </div>




                <script>
                    document.querySelectorAll('.detail-btn').forEach(button => {
                        button.addEventListener('click', () => {
                            const id = button.dataset.id;

                            fetch(`/admin/${id}`)
                                .then(res => res.text())
                                .then(html => {
                                    document.getElementById('modal-content').innerHTML = html;
                                    document.getElementById('modal').classList.add('active');
                                });
                        });
                    });

                    document.getElementById('modal-close').addEventListener('click', () => {
                        document.getElementById('modal').classList.remove('active');
                    });

                    // 背景クリックで閉じる
                    document.getElementById('modal').addEventListener('click', (e) => {
                        if (e.target.id === 'modal') {
                            document.getElementById('modal').classList.remove('active');
                        }
                    });
                </script>


            </div>
    </main>
</body>

</html>