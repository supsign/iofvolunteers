<div class="formSection">
    @isset($title)
        <h3 class="formSectionTitle">{{ $title }}</h3>
        
        @isset($subtitle)
            {{ $subtitle }}
        @endisset
    @endisset

    @isset($body)
        {{ $body }}
    @endisset
</div>