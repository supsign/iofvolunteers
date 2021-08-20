<?php

namespace App\View\Components\Base;

use Illuminate\View\Component;

class InputField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(public $value, public $name, public $label, public $type)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.input-field'); 
    }
}
