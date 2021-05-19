<?php

namespace App\View\Components\Orienteering;

use App\Models\Discipline;
use Illuminate\View\Component;

class DisciplinesForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $disciplines;

    public function __construct(public $title = 'Disciplines of experience')
    {
        $this->disciplines = Discipline::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orienteering.disciplines-form');
    }
}
