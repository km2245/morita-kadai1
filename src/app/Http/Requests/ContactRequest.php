<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ContactRequest extends FormRequest
{
    /**
     * 認可（今回は全員OK）
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            'last_name'   => ['required', 'string', 'max:8'],
            'first_name'  => ['required', 'string', 'max:8'],
            'gender'      => ['required'],
            'email'       => ['required', 'email'],
            'tel'         => ['required', 'numeric', 'digits_between:1,5'],
            'address'     => ['required'],
            'category_id' => ['required'],
            'detail'      => ['required', 'max:120'],
        ];
    }

    /**
     * エラーメッセージ（※文言完全一致）
     */
    public function messages(): array
    {
        return [
            // お名前
            'last_name.required'  => '姓を入力してください',
            'first_name.required' => '名を入力してください',

            // 性別
            'gender.required'     => '性別を選択してください',

            // メール
            'email.required'     => 'メールアドレスを入力してください',
            'email.email'        => 'メールアドレスはメール形式で入力してください',

            // 電話番号
            'tel.required'       => '電話番号を入力してください',
            'tel.regex'           => '電話番号は 半角英数字で入力してください',
            'tel.max'            =>  '電話番号は 5桁まで数字で入力してください',

            // 住所
            'address.required'   => '住所を入力してください',

            // お問い合わせの種類
            'category_id.required' => 'お問い合わせの種類を選択してください',

            // お問い合わせ内容
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max'      => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
