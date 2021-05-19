<?php

namespace App\View\Components\Orienteering;

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\View\Component;

class SkillsSearchForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $skillTypes;

    public function __construct()
    {
        $this->skillTypes = SkillType::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orienteering.skills-search-form');
    }
}
