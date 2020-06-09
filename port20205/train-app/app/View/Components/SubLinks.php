<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubLinks extends Component
{
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subLinks)
    {
        $this->link = $subLinks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sub-links');
    }
}
