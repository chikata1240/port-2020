<?php
  namespace App\MyClasses;

  use App\User;
  use App\Plan;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Storage;

  class UserRegistration
  {
    // プロパティ
    public $user_registration_information;
    public $arrival;
    public $user_file;
    public $path;
    public $update_file_name;
    public $user_update;

    // メソッド
    public function file_name()
    {
      // ユーザー情報
      $this->user_registration_information =  User::where('id',Auth::id())->get(['name','file_name']);
      foreach($this->user_registration_information as $user_information){
        if(empty($user_information->file_name)){
          $user_information->file_name = 'no_image.png';
        }
      }
      // 終了コンテンツの数取得
      $this->arrival = Plan::where('user_id',Auth::id())->where('arrival',true)->get('arrival');
      return [$this->user_registration_information,count($this->arrival)];
    }

    public function file_update($file_name)
    {
      $this->user_file = User::where('id',Auth::id())->get('file_name');
      if(!empty($this->user_file[0]->file_name)){
        Storage::delete('public/img/' . $this->user_file[0]->file_name);
      }
      $this->path = $file_name->file('file_name')->store('public/img');
      $this->update_file_name = basename($this->path);
      $this->user_update = User::find(Auth::id());
      $this->user_update->file_name = $this->update_file_name;
      return $this->user_update->save();
    }
  }