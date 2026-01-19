<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    // 管理画面一覧
    public function index()
    {
        $contacts = Contact::paginate(7);
        return view('admin.index', compact('contacts'));
    }

    // 詳細（あとでモーダル用）
    public function show(Contact $contact)
    {
        return view('admin.show', compact('contact'));
    }

    // 削除
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.index');
    }
}
