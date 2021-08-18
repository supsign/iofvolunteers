<?php

namespace App\View\Components\Orienteering;

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\View\Component;

class SkillsForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $skilltypes;
    public $skills;

    public function __construct(public $volunteer = null)
    {
        $this->skilltypes = SkillType::all();
        $this->skills = Skill::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orienteering.skills-form');
    }
}
