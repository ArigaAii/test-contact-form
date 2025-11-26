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
            'name_sei' => ['required', 'string', 'max:8'],
            'name_mei' => ['required', 'string', 'max:8'],
            'gender' => ['required', 'in:male,female,other'],
            'email' => ['required', 'email'],
            'tel1' => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'],
            'tel2' => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'],
            'tel3' => ['required', 'digits_between:1,5', 'regex:/^[0-9]+$/'],
            'address' => ['required', 'max:100'],
            'category' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください',
            'name_sei.required' => '姓を入力してください',
            'name_mei.required' => '名を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を8文字以下で入力してください',
            'gender.required'   => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel1.regex' => '電話番号は半角数字で入力してください',
            'tel2.regex' => '電話番号は半角数字で入力してください',
            'tel3.regex' => '電話番号は半角数字で入力してください',
            'tel1.digits_between' => '電話番号は5桁まで数字で入力してください',
            'tel2.digits_between' => '電話番号は5桁まで数字で入力してください',
            'tel3.digits_between' => '電話番号は5桁まで数字で入力してください',
            'address.required'  => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'category.in' => 'お問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
            'content.max' => 'お問い合わせ内容は120文字以内で入力してください',

        ];
    }

}
