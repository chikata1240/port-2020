<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputTrainingRquest extends FormRequest
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
            'limit' => 'required|string|max:100',
            'rule' => 'required|string|max:100',
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
            'limit.string' => '文字を入力してください',
            'limit.max' => '100字内で入力してください',
            'rule.required' => '入力必須です',
            'rule.string' => '文字を入力してください',
            'rule.max' => '100字内で入力してください',
        ];
    }
}
