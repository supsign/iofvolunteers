<?php

namespace App\View\Components\Volunteer;

use App\View\Components\Base\Orienteering\SkillForm as BaseSkillForm;

class SkillForm extends BaseSkillForm
{
    public function render()
    {
        return view('components.volunteer.skill-form');
    }
}
