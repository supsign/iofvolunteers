<?php

namespace App\View\Components\Base;

use App\Models\BaseModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
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
        public BaseModel|null $value = null,
        public string|null $iconName = null,
        public bool $required = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.base.select');
    }
}
