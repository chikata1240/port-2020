<?php
  namespace App\MyClasses;
  use Illuminate\Contracts\Pagination\Paginator;

  class UsePagination{
    private $paginator;

    public function __construct(Paginator $paginator)
    {
      $this->paginator = $paginator;
    }

    public function link()
    {
      // 
    }
  }