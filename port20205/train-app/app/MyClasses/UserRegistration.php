<?php
  namespace App\MyClasses;

  use App\User;
  use Illuminate\Support\Facades\Auth;

  class UserRegistration
  {
    // プロパティ
    public $user_image;
    public $no_image;
    public $path;
    public $update_file_name;
    public $user_update;

    // メソッド
    public function file_name(){
      $this->user_registration_information =  User::where('id',Auth::id())->get(['name','file_name']);
      foreach($this->user_registration_information as $user_information){
        if(empty($user_information->file_name)){
          $user_information->file_name = 'no_image.png';
          return $this->user_registration_information;
        }else{
          return $this->user_registration_information;
        }
      }
    }

    public function file_update($file_name){
        $this->path = $file_name->file('file_name')->store('public/img');
        $this->update_file_name = basename($this->path);
        $this->user_update = User::find(Auth::id());
        $this->user_update->file_name = $this->update_file_name;
        return $this->user_update->save();
    }
}