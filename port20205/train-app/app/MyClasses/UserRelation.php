<?php
  namespace App\MyClasses;

  use App\Execution;
  use App\Plan;
  use App\User;
  use App\Reply;

  class UserRelation
  {
    // プロパティ
    public $records;
    public $users;
    public $user;
    public $images;
    public $image;
    public $set_user;
    public $array_items;
    public $array_keys;
    public $arrays;
    public $reply_record;
    public $replies;
    public $plans;

    // メソッド
    public function record()
    {
      $this->records = Execution::orderBy('created_at','DESC')->paginate(5);
      $this->users = plan::get(['content_id','content','user_id',]);
      $this->user = $this->users->toArray();
      $this->images = User::get(['id','file_name']);
      $this->image = $this->images->toArray();

      // ユーザー画像の追加
      foreach($this->user as $user_items){
        foreach($this->image as $images){
          if($user_items['user_id'] == $images['id']){
            if(empty($images['file_name'])){
              $images['file_name'] = 'no_image.png';
            }
            $this->set_image = ['file_name' => $images['file_name']];
            $user_items = array_merge($user_items,$this->set_image);
          }
        }
        $this->set_user[] = $user_items;
      }

      // ユーザーIDの追加
      foreach($this->records as $record_items){
        foreach($this->set_user as $user_items){
          if($record_items['content_id'] == $user_items['content_id']){
            $this->array_keys = array_keys($user_items);
            $this->array_items = array_values($user_items);
            $this->arrays = [
              $this->array_keys[1] => $this->array_items[1],
              $this->array_keys[2] => $this->array_items[2],
              $this->array_keys[3] => $this->array_items[3],
            ];
            foreach($this->arrays as $array => $items){
              $record_items->$array = $items;
            }
          }
        }
      }
      return $this->records;
    }

    public function reply_record($progress_id)
    {
      // コンテンツ情報の取得
      $this->records = Execution::find($progress_id);
      $this->plans = plan::where('content_id',$this->records->content_id)->get();
      $this->images = User::where('id',$this->plans[0]->user_id)->get(['id','file_name']);
      foreach($this->plans as $plan){
        foreach($this->images as $image){
          if(empty($image['file_name'])){
            $image['file_name'] = 'no_image.png';
          }
          $this->records['file_name'] = $image['file_name'];
          $this->records['content'] = $plan['content'];
          $this->records['user_id'] = $plan['user_id'];
        }
      }
      // リプライ情報の取得
      $this->replies = Reply::where('progress_id',$progress_id)->orderBy('created_at','DESC')->paginate(10);
      $this->images = User::get(['id','name','file_name']);
      $this->image = $this->images->toArray();
      foreach($this->replies as $reply){
        foreach($this->image as $images){
          if(empty($images['file_name'])){
            $images['file_name'] = "no_image.png";
          }
          if($reply->user_id == $images['id']){
            $reply->name = $images['name'];
            $reply->file_name = $images['file_name'];
          }
        }
      }
      return [$this->records,$this->replies];
    }
  }