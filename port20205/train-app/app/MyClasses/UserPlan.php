<?php
  namespace App\MyClasses;

  require '../../vendor/autoload.php';

  use Carbon\Carbon;
  use App\Plan;
  use Illuminate\Support\Facades\Auth;

  class UserPlan
  {
    // プロパティ
    protected $plans;
    protected $contents;
    protected $content;
    protected $today;
    protected $diff = [];
    protected $max_page;

    public function __construct()
    {
      $this->plans = Plan::where('user_id',Auth::id());
    }

    // メソッド
    public function contents(){
      $this->contents = $this->plans->get();
      return $this->contents;
    }

    public function limit(){
      $this->contents =  $this->plans->where('type','book')->get();
      $this->today = new Carbon();
      foreach($this->contents as $this->content){
        $this->diff[] = $this->today->diffInDays($this->content->limit);
      }
      return $this->diff;
    }

    public function select_content($id){
      $this->contents =  $this->plans->where('content_id',$id)->get();
      return $this->contents;
    }

    public function max_page($id){
      $this->contents =  $this->plans->where('content_id',$id)->get(['rule']);
      $this->content = $this->contents->toArray();
      $this->max_page = $this->content[0]['rule'];
      return $this->max_page;
    }

    public function type(){
      $this->contents = $this->plans->get();
      $this->content = $this->contents->toArray();
      $this->type = $this->content[0]['type'];
      return $this->type;
    }

  }