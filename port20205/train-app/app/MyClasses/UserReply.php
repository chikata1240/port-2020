<?php
  namespace App\MyClasses;

  use App\Execution;
  use App\Plan;
  use App\User;
  use App\Reply;

  class UserReply
  {
    // プロパティ
    public $reply_create;
    public $reply_delete;
    
    // メソッド
    public function reply_create($request){
      $this->reply_create = Reply::create([
        'comment' => $request->comment, 
        'progress_id' => $request->progress_id, 
        'user_id' => $request->user_id,
      ]);
      return $this->reply_create;
    }

    public function reply_delete($request){
      $this->reply_delete = Reply::destroy($request);
      return $this->reply_delete;
    }


  }