<x-base.section>
    @if($title)
        <x-slot name="title">
            {{ $title }}
        </x-slot>
    @endif

    @if($subtitle)
        <x-slot name="subtitle">
            {{ $subtitle }}
        </x-slot>
    @endif

    <x-slot name="body">
        <x-form.input name="'name'" value="{{ old('name') ?? $item?->email }}" label="Name *" />
        {{-- <x-form.country /> --}}
        <x-form.input name="'email'" value="{{ old('name') ?? $item?->email }}" label="E-mail *" type="email" />
    </x-slot>
</x-base.section>