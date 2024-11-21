<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tel_0' => 'required|max:5',
            'tel_1' => 'required|max:5',
            'tel_2' => 'required|max:5',
            'address' => 'required',
            'detail' => 'required|max:120',
        ];
    }

    public function messages()
    {

        return [
            'category_id.required' => 'カテゴリーを選択してください',
            'first_name.required' => '性を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required'=> '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel_0.required' => '電話番号を入力してください',
            'tel_0.max' => '電話番号は5文字以内で入力してください',
            'tel_1.required' => '電話番号を入力してください',
            'tel_1.max' => '電話番号は5文字以内で入力してください',
            'tel_2.required' => '電話番号を入力してください',
            'tel_2.max' => '電話番号は5文字以内で入力してください',
            'address.required' => '住所を入力してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
