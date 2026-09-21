@php
    $navigationItems = [
        ['label' => 'Courses', 'url' => route('coursesnew')],
        ['label' => 'Career paths', 'url' => url('/').'#career-paths'],
        ['label' => 'Student work', 'url' => route('galleryData')],
        ['label' => 'Placements', 'url' => route('placement')],
        ['label' => 'Centres', 'url' => route('location')],
        ['label' => 'Workshops', 'url' => route('upcoming_events')],
        ['label' => 'About', 'url' => route('about_us')],
        ['label' => 'Contact', 'url' => route('contact_us')],
    ];
@endphp
<ul class="{{ $listClass ?? 'tgc-nav-list' }}">
    @foreach ($navigationItems as $navigationItem)
        <li><a href="{{ $navigationItem['url'] }}">{{ $navigationItem['label'] }}</a></li>
    @endforeach
</ul>
