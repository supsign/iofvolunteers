<div class="form-group">
	<x-base.input 
       id="{{ $attributes->get('name') }}"
       type="{{ $attributes->get('type') }}"
       name="{{ $attributes->get('name') }}"
       label="{{ $attributes->get('label') }}"
       value="{{ old($attributes->get('name')) ?? $attributes->get('value') }}"
	/>
<div class="form-group">