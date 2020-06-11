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
    protected $plan_counts;

    // public function __construct()
    // {
    //   $this->plans = Plan::where('user_id',Auth::id());
    // }

    // メソッド

    public function plans()
    {
      return Plan::where('user_id',Auth::id());
    }

    public function contents(){
      $this->plans = $this->plans();
      $this->contents = $this->plans->get();
      return $this->contents;
    }

    public function limit(){
      $this->plans = $this->plans();
      $this->contents =  $this->plans->paginate(9);
      $this->today = new Carbon();
      foreach($this->contents as $content){
        if($content['type'] == 'book'){
          $this->diff[] = $this->today->diffInDays($content->limit);
        }
      }
      $this->plan_counts = 0;
      foreach($this->contents as $content){
        if($content['type'] == 'book'){
          $content['diff'] = $this->diff[$this->plan_counts];
          $this->plan_counts ++;
        }
      }
      return $this->contents;
    }

    public function select_content($id){
      $this->plans = $this->plans();
      $this->contents =  $this->plans->where('content_id',$id)->get();
      return $this->contents;
    }

    public function max_page($id){
      $this->plans = $this->plans();
      $this->contents =  $this->plans->where('content_id',$id)->get(['rule']);
      $this->content = $this->contents->toArray();
      $this->max_page = $this->content[0]['rule'];
      return $this->max_page;
    }

    public function type(){
      $this->plans = $this->plans();
      $this->contents = $this->plans->get();
      $this->content = $this->contents->toArray();
      $this->type = $this->content[0]['type'];
      return $this->type;
    }
  }