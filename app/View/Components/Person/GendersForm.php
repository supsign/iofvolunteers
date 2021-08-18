<?php

namespace App\View\Components\Person;

use App\Models\Gender;
use App\Models\Volunteer;
use Illuminate\View\Component;

class GendersForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $genders;

    public function __construct(public bool $isSearch = false, public $volunteer = null)
    {
        $this->genders = Gender::all();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.person.genders-form');
    }
}
