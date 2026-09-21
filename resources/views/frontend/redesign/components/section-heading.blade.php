<div class="tgc-section-heading {{ ($align ?? 'left') === 'center' ? 'tgc-section-heading--center' : '' }}">
    @if (!empty($eyebrow))
        <p class="tgc-eyebrow">{{ $eyebrow }}</p>
    @endif
    <h2>{{ $title }}</h2>
    @if (!empty($copy))
        <p>{{ $copy }}</p>
    @endif
</div>
