<?php

namespace App\View\Components\Person;

use App\Models\Continent;
use Illuminate\View\Component;

class ContinentsForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $continents;

    public function __construct()
    {
        $this->continents = Continent::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.person.continents-form');
    }
}
