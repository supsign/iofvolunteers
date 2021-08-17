<?php

namespace App\View\Components\Person;

use App\Models\Country;
use Illuminate\View\Component;

class CountriesForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $countries;

    public function __construct(public $volunteer = null)
    {
        $this->countries = Country::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.person.countries-form');
    }
}
