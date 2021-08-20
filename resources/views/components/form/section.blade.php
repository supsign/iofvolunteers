<div class="formSection">
    @isset($title)
        <h3 class="formSectionTitle">{{ $title }}</h3>
        
        @isset($subtitle)
            {{ $subtitle }}
        @endisset
    @endisset

    {{ $slot }}
</div>