<?php
  namespace App\MyClasses;

  use App\Execution;

  class UserExecution
  {
    // プロパティ
    protected $execution;
    protected $sum_pages;
    protected $remaining_pages;
    protected $archives;

    public function __construct($content_id)
    {
      $this->execution = Execution::where('content_id',$content_id);
    }

    // メソッド
    public function reed_pages(){
      $this->reed_pages = $this->execution->sum('progress');
      return $this->reed_pages;
    }

    public function remaining_pages($max_page){
      $this->sum_pages = $this->execution->sum('progress');
      $this->remaining_pages = floor(($this->sum_pages / $max_page) * 100);
      return $this->remaining_pages;
    }

    public function archives(){
      $this->archives = $this->execution->orderBy('day','desc')->get();
      return $this->archives;
    }
  }