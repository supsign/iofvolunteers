<?php

namespace App\View\Components\Language;

use App\Models\Language;
use App\Models\LanguageProficiency;
use Illuminate\View\Component;

class ExperienceForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $languages;
    public $languageProficiencies;

    public function __construct(public $langSelection=Null)
    {
        $this->languages = Language::all();
        $this->languageProficiencies = LanguageProficiency::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.language.experience-form');
    }
}
