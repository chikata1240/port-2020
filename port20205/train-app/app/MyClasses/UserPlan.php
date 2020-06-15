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
    protected $arrival;
    protected $content;
    protected $today;
    protected $diff = [];
    protected $max_page;
    protected $plan_counts;
    protected $check_arrival;
    protected $limit;

    // メソッド
    public function plans()
    {
      return Plan::where('user_id',Auth::id());
    }

    public function contents()
    {
      $this->plans = $this->plans();
      $this->contents = $this->plans->get();
      return $this->contents;
    }

    public function limit()
    {
      $this->plans = $this->plans();
      $this->contents =  $this->plans->paginate(9);
      foreach($this->contents as $content){
        if($content['type'] == 'book'){
          $this->limit = new Carbon($content->limit);
          if($this->limit->isPast()){
            $this->diff[] = 'Time Up!';
          }else{
            $this->diff[] = Carbon::today()->diffInDays($this->limit);
          }
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

    public function select_content($id)
    {
      $this->plans = $this->plans();
      $this->contents =  $this->plans->where('content_id',$id)->get();
      return $this->contents;
    }

    public function max_page($id)
    {
      $this->plans = $this->plans();
      $this->contents =  $this->plans->where('content_id',$id)->get(['rule']);
      $this->content = $this->contents->toArray();
      $this->max_page = $this->content[0]['rule'];
      return $this->max_page;
    }

    public function type($content_id)
    {
      $this->plans = $this->plans();
      $this->content = $this->plans->where('content_id',$content_id)->get()->toArray();
      $this->type = $this->content[0]['type'];
      return $this->type;
    }

    public function plan_record($content_id)
    {
      $this->plans = $this->plans()->where('content_id',$content_id)->get('type')->toArray();
      return $this->plans;
    }

    public function arrival($content_id)
    {
      $this->check_arrival = Plan::find($content_id);
      $this->check_arrival->arrival = 1;
      return $this->check_arrival->save();
    }

    public function release($content_id)
    {
      $this->check_arrival = Plan::find($content_id);
      $this->check_arrival->arrival = 0;
      return $this->check_arrival->save();
    }

    public function check_arrival($content_id)
    {
      $this->arrival = $this->plans->where('content_id',$content_id)->get('arrival')->toArray();
      return $this->arrival[0];
    }
  }