<?php

namespace App\View\Components\Base;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(
        public Collection $options, 
        public BaseModel $value,
        public string|null $iconName = null
    ) {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.select'); 
    }
}
