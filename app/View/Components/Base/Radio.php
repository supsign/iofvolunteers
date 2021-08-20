<?php

namespace App\View\Components\Base;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(
        public Collection $options, 
        public BaseModel $value
    ) {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.radio');
    }
}
