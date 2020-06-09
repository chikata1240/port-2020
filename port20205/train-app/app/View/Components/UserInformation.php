<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserInformation extends Component
{
    public $file_name;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userInformation)
    {
        foreach($userInformation as $user){
            $this->file_name = $user->file_name;
            $this->name = $user->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.user-information');
    }
}
