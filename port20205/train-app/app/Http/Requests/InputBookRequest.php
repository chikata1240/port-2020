<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputBookRequest extends FormRequest
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
            'content' => 'required|string|max:30',
            'limit' => 'required|date|after:"now"',
            'rule' => 'required|integer|max:10000',
            'type' => 'required|string',
        ];
    }

    public function messages()
    {
        return[
            'content.required' => '入力必須です',
            'content.string' => '文字を入力してください',
            'content.max' => '30字内で入力してください',
            'limit.required' => '入力必須です',
            'limit.date' => '日付を入力してください',
            'limit.after' => '本日以降の日付を入力してください',
            'rule.required' => '入力必須です',
            'rule.integer' => 'ページ数を入力してください',
            'rule.max' => '10000ページ以内で入力してください',
        ];
    }
}
