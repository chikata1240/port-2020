<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchiveTrainingRequest extends FormRequest
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
      'day' => 'required|date|before_or_equal:"now"',
      'progress' => 'required|string|max:100',
      'memo' => 'sometimes|max:100',
    ];
  }

  public function messages()
  {
    return[
      'day.required' => '入力必須です',
      'day.date' => '日付を入力してください',
      'day.before_or_equal' => '本日以前の日付を入力してください',
      'progress.required' => '入力必須です',
      'progress.string' => '文字を入力してください',
      'progress.max' => '100字内で入力してください',
      'memo.max' => '100字内で入力してください',
    ];
  }
}
