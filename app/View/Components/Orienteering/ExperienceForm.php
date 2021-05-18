<?php

namespace App\View\Components\Orienteering;

use App\Models\Experience;
use Illuminate\View\Component;

class ExperienceForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

public $experiences;

    public function __construct()
    {
$this->experiences = Experience::all();    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orienteering.experience-form');
    }
}
