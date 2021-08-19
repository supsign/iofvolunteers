<?php

namespace App\View\Components\Orienteering;

use App\Models\BaseModel;
use App\Models\Experience;
use Illuminate\View\Component;

class CompetitorExperienceDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $experiences;

    public function __construct(public BaseModel|null $item = null)
    {
        $this->experiences = Experience::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orienteering.competitor-experience-dropdown');
    }
}
