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
      'training_content' => 'required|string|max:30',
      'training_limit' => 'required|string|max:100',
      'training_rule' => 'required|string|max:100',
      'type' => 'required|string',
    ];
  }

  public function messages()
  {
    return[
      'training_content.required' => '入力必須です',
      'training_content.string' => '文字を入力してください',
      'training_content.max' => '30字内で入力してください',
      'training_limit.required' => '入力必須です',
      'training_limit.string' => '文字を入力してください',
      'training_limit.max' => '100字内で入力してください',
      'training_rule.required' => '入力必須です',
      'training_rule.string' => '文字を入力してください',
      'training_rule.max' => '100字内で入力してください',
    ];
  }
}
