<?php
  namespace App\MyClasses;

  use App\Plan;
  use Illuminate\Support\Facades\Auth;

  class UseInputPlan
  {
    // プロパティ
    protected $plan_create;
    protected $plan_destroy;

    // メソッド
    public function plan_create($request){
      $this->plan_create = Plan::create([
        'content' => $request->content, 
        'limit' => $request->limit, 
        'rule' => $request->rule,
        'type' => $request->type,
        'user_id' => Auth::id(),
      ]);
      return $this->plan_create;
    }

    public function plan_destroy($request){
      $this->plan_destroy = Plan::destroy($request);
      return $this->plan_destroy;
    }
  }