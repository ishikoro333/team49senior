<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'site_name' => 'required|max:20',
            'site_url' => 'required|max:255',
            'memo' => 'max:20'
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => trans('サイト名は必須です。'),
            'site_name.max' => trans('サイト名は20文字以内で入力してください。'),
            'site_url.required' => trans('urlは必須です。'),
            'site_url.max' => trans('urlは255文字以内で入力してください。'),
            'memo.max' => trans('20文字以内でメモしてください。'),
        ];
    }

}
