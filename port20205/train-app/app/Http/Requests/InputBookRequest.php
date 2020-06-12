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
      'book_content' => 'required|string|max:30',
      'book_limit' => 'required|date|after:"now"',
      'book_rule' => 'required|integer|max:10000',
      'type' => 'required|string',
    ];
  }

  public function messages()
  {
    return[
      'book_content.required' => '入力必須です',
      'book_content.string' => '文字を入力してください',
      'book_content.max' => '30字内で入力してください',
      'book_limit.required' => '入力必須です',
      'book_limit.date' => '日付を入力してください',
      'book_limit.after' => '本日以降の日付を入力してください',
      'book_rule.required' => '入力必須です',
      'book_rule.integer' => 'ページ数を入力してください',
      'book_rule.max' => '10000ページ以内で入力してください',
    ];
  }
}
