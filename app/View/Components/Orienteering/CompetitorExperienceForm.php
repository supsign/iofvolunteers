<?php

namespace App\View\Components\Orienteering;

use Illuminate\View\Component;

class CompetitorExperienceForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(public $volunteer = null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orienteering.competitor-experience-form');
    }
}
