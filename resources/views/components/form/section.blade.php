<div class="formSection">
    @if($title)
        <h3 class="formSectionTitle">
            {{ $title }}
        </h3>
        @isset($subtitle)
            <div class="warn"> {{ $subtitle }}</div>
        @endisset
    @endif

    @if($body)
        {{ $body }}
    @endif
</div>