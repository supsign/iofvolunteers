<div class="formSection">
    @isset($title)
        <h3 class="formSectionTitle">{{ $title }}</h3>
        
        @isset($subtitle)
            <div class="warn">{{ $subtitle }}</div>
        @endisset
    @endisset

    @isset($body)
        {{ $body }}
    @endisset
</div>