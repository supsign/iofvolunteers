@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')

<div>
<ul>
<li>© {{ date('Y') }}</li>
<li>International Orienteering Federation</li>
<li>Drottninggatan 47 31/2 tr</li>
<li>SE-65225 Karlstad</li>
<li>SWEDEN</li>
<li><a href="mailto:iof@orienteering.org">iof@orienteering.org</a></li>
</ul>
</div>

@endcomponent
@endslot
@endcomponent
