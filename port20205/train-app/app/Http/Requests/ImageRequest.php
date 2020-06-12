<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
      'file_name' => 'required|image',
    ];
  }

  public function messages()
  {
    return[
      'file_name.required' => '入力必須です',
      'file_name.image' => '画像を登録してください（jpg,png,bmp,gif,svg）',
    ];
  }
}
