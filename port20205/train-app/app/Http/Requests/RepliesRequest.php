<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepliesRequest extends FormRequest
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
      'progress_id' => 'required|integer',
      'user_id' => 'required|integer',
      'comment' => 'sometimes|max:30',
    ];
  }

  public function messages()
  {
    return[
      'progress_id.required' => '入力必須です',
      'progress_id.integer' => '数字の入力が必須です',
      'user_id.required' => '入力必須です',
      'user_id.integer' => '数字の入力が必須です',
      'comment.max' => '30字内で入力してください',
    ];
  }
}
