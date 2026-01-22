<div class="modal-inner">
    <div class="modal-row">
        <div class="modal-label">お名前</div>
        <div class="modal-value">{{ $contact->last_name }}　{{ $contact->first_name }}</div>
    </div>

    <div class="modal-row">
        <div class="modal-label">性別</div>
        <div class="modal-value">
            @if ($contact->gender == 1) 男性
            @elseif ($contact->gender == 2) 女性
            @else その他
            @endif
        </div>
    </div>

    <div class="modal-row">
        <div class="modal-label">メールアドレス</div>
        <div class="modal-value">{{ $contact->email }}</div>
    </div>

    <div class="modal-row">
        <div class="modal-label">電話番号</div>
        <div class="modal-value">{{ $contact->tel }}</div>
    </div>

    <div class="modal-row">
        <div class="modal-label">住所</div>
        <div class="modal-value">{{ $contact->address }}</div>
    </div>

    <div class="modal-row">
        <div class="modal-label">建物名</div>
        <div class="modal-value">{{ $contact->building }}</div>
    </div>

    <div class="modal-row">
        <div class="modal-label">お問い合わせの種類</div>
        <div class="modal-value">{{ $contact->category->content }}</div>
    </div>

    <div class="modal-row">
        <div class="modal-label">お問い合わせ内容</div>
        <div class="modal-value">{{ $contact->detail }}</div>
    </div>

    <form action="{{ route('admin.delete') }}" method="post" class="modal-delete">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $contact->id }}">
        <button type="submit">削除</button>
    </form>
</div>