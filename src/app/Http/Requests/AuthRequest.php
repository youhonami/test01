<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255/',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|regex:/^[a-zA-Z0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください。',
            'name.max' => ':attributeは:max文字以内で入力してください。',
            'name.regex' => ':attributeは半角英数字のみで入力してください。',

            'email.required' => ':attributeを入力してください。',
            'email.email' => ':attributeは「ユーザー名@ドメイン」形式で入力してください。',
            'email.unique' => 'この:attributeは既に使用されています。',
            'email.max' => ':attributeは:max文字以内で入力してください。',

            'password.required' => ':attributeを入力してください。',
            'password.min' => ':attributeは:min文字以上で入力してください。',
            'password.regex' => ':attributeは半角英数字のみで入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}


return [
    'required' => ':attributeは必須項目です。',
    'max' => [
        'string' => ':attributeは:max文字以下で指定してください。',
    ],
    'min' => [
        'string' => ':attributeは:min文字以上で指定してください。',
    ],

];
