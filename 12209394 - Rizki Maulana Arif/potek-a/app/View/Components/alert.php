<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type,$message;
    public function __construct($type,$message)
    {
        $this->type = $type;
        $this->message = $message;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
