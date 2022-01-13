<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|max:255',
            'password' => 'required|max:20|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('名前は必須です。'),
            'name.max' => trans('名前は20文字以内で入力してください。'),
            'email.required' => trans('メールアドレスは必須です。'),
            'email.max' => trans('メールアドレスは255文字以内で入力してください。'),
            'password.required' => trans('パスワードは必須です。'),
            'password.max' => trans('パスワードは20文字以内で入力してください。'),
            'password.min' => trans('パスワードは8文字以上で入力してください。')
        ];
    }
}
