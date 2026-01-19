<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    // 入力画面
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

    // 確認画面
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->validated();
        $category = Category::find($inputs['category_id']);

        return view('contact.confirm', compact('inputs', 'category'));
    }



    // 保存処理
    public function store(ContactRequest $request)
    {
        // 修正ボタンが押された場合
        if ($request->has('back')) {
            return redirect()->route('contact.index')->withInput();
        }

        // contacts テーブルに保存
        Contact::create([
            'last_name'   => $request->last_name,
            'first_name'  => $request->first_name,
            'gender'      => $request->gender,
            'email'       => $request->email,
            'tel'         => $request->tel,
            'address'     => $request->address,
            'building'    => $request->building,
            'category_id' => $request->category_id,
            'detail'      => $request->detail,
        ]);

        // サンクスページへ
        return redirect()->route('contact.thanks');
    }
    public function thanks()
    {
        return view('contact.thanks');
    }
}
