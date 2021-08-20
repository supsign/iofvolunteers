
<x-base.orienteering.skill-form> 
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="subtitle">
        {{ $subtitle }}
    </x-slot>
    <x-slot name="additionalFields">
        <textarea placeholder=" " rows="2" cols="30" name="skill_other" id="skill_other" value="">{{ old('skill_other') ?? $volunteer?->skill_other }}</textarea>
        <label class="formGroupLabel" for="skill_other">* Other skills? Please explain...</label>
    </x-slot>
</x-base.orienteering.skill-form>
