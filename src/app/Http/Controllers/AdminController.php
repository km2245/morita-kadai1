<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    // 管理画面一覧
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }



    // 🔍 検索処理
    public function search(Request $request)
    {
        $query = Contact::with('category');

        // 🔍 名前 or メール検索
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {

                // 姓
                $q->where('last_name', 'like', "%{$keyword}%")

                    // 名
                    ->orWhere('first_name', 'like', "%{$keyword}%")

                    // メール
                    ->orWhere('email', 'like', "%{$keyword}%")

                    // ⭐ フルネーム（姓 + 名）
                    ->orWhereRaw(
                        "CONCAT(last_name, first_name) LIKE ?",
                        ["%{$keyword}%"]
                    )
                    ->orWhereRaw(
                        "CONCAT(last_name, ' ', first_name) LIKE ?",
                        ["%{$keyword}%"]
                    );
            });
        }


        // 性別検索
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        // カテゴリ検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 日付検索（created_at）
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }



        $contacts = $query->paginate(7);
        $contacts->appends($request->query());
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    // 詳細（あとでモーダル用）
    public function show(Contact $contact)
    {
        $contact->load('category');
        return view('admin.show', compact('contact'));
    }

    // 削除
    public function destroy(Request $request)
    {
        Contact::findOrFail($request->id)->delete();
        return redirect()->route('admin.index');
    }

    public function export(Request $request)
    {
        $query = Contact::query()->with('category');

        // 🔍 検索条件（indexと同じ）
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();



        // 📄 CSV出力
        $response = new StreamedResponse(function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            // ヘッダー
            fputcsv($handle, [
                '名前',
                '性別',
                'メール',
                'お問い合わせ種別',
                '作成日'
            ]);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    match ($contact->gender) {
                        1 => '男性',
                        2 => '女性',
                        3 => 'その他',
                        default => '',
                    },
                    $contact->email,
                    $contact->category->content ?? '',
                    $contact->created_at->format('Y-m-d'),
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set(
            'Content-Disposition',
            'attachment; filename="contacts.csv"'
        );

        return $response;
    }
}
