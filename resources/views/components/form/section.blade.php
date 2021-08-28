<div class="formSection">
    @isset($title)
        <h3 class="formSectionTitle">{{ $title }}
            @isset($subtitle)
                <div class="formSubtitle2">
                    {{ $subtitle }}
                </div>
            @endisset
        </h3>
    @endisset

    {{ $slot }}
</div>
