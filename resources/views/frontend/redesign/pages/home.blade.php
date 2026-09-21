@extends('frontend.redesign.layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/front/redesign/css/home.css') }}">
@endpush

@section('content')
@php
    $featuredCourses = collect(data_get($data ?? [], 'all', []))->take(6);
    $placementRecords = collect(data_get($data ?? [], 'placement', []))->take(6);
    $testimonials = collect(data_get($data ?? [], 'testimonial', []))->take(3);

    $interestAreas = [
        ['title' => 'Animation & VFX', 'query' => 'animation'],
        ['title' => 'Graphic Design', 'query' => 'graphic design'],
        ['title' => 'UI/UX Design', 'query' => 'ui ux'],
        ['title' => 'Video & Filmmaking', 'query' => 'video editing'],
        ['title' => 'Digital Marketing', 'query' => 'digital marketing'],
        ['title' => 'Data, AI & Coding', 'query' => 'data analytics'],
    ];

    $careerPaths = [
        ['role' => 'Graphic Designer', 'skills' => 'Brand systems, layouts and visual communication', 'query' => 'graphic design'],
        ['role' => 'UI/UX Designer', 'skills' => 'Research, product flows and interface design', 'query' => 'ui ux'],
        ['role' => 'Video Editor', 'skills' => 'Editing, motion and visual storytelling', 'query' => 'video editing'],
        ['role' => 'VFX Artist', 'skills' => 'Compositing, effects and production workflows', 'query' => 'vfx'],
        ['role' => 'Data Analyst', 'skills' => 'Data tools, reporting and business questions', 'query' => 'data analytics'],
        ['role' => 'Digital Marketer', 'skills' => 'Campaigns, content and performance channels', 'query' => 'digital marketing'],
    ];
@endphp

<section class="tgc-hero">
    <div class="tgc-container tgc-hero__grid">
        <div class="tgc-hero__content">
            <p class="tgc-eyebrow">Creative • Digital • Data • AI</p>
            <h1>Build skills for the work you want to do.</h1>
            <p class="tgc-hero__lead">Find practical courses for creative, technology and business careers—then speak with a counsellor to choose the right path.</p>
            <div class="tgc-hero__actions">
                <a class="tgc-button tgc-button--primary" href="#course-discovery">Find your course</a>
                <a class="tgc-button tgc-button--secondary" href="#counselling">Talk to a counsellor</a>
            </div>
            <ul class="tgc-hero__signals" aria-label="Learning options">
                <li>Course guidance</li>
                <li>Project-led learning</li>
                <li>Centre and online options</li>
            </ul>
        </div>

        <div class="tgc-hero__visual" aria-hidden="true">
            <div class="tgc-orbit tgc-orbit--one"></div>
            <div class="tgc-orbit tgc-orbit--two"></div>
            <div class="tgc-skill-panel">
                <span class="tgc-skill-panel__index">01</span>
                <p>Choose an interest</p>
                <strong>Creative, digital, data or AI</strong>
            </div>
            <div class="tgc-skill-panel tgc-skill-panel--offset">
                <span class="tgc-skill-panel__index">02</span>
                <p>Build practical skills</p>
                <strong>Tools, assignments and projects</strong>
            </div>
            <div class="tgc-hero__stamp">TGC<br>India</div>
        </div>
    </div>
</section>

<section class="tgc-section tgc-section--soft" id="course-discovery">
    <div class="tgc-container">
        @include('frontend.redesign.components.section-heading', [
            'eyebrow' => 'Start with an interest',
            'title' => 'Which field feels right for you?',
            'copy' => 'Pick a direction to see matching courses in the current TGC catalogue.',
        ])
        <div class="tgc-interest-grid">
            @foreach ($interestAreas as $index => $area)
                <a class="tgc-interest-card" href="{{ route('coursesnew', ['keywords' => $area['query']]) }}">
                    <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3>{{ $area['title'] }}</h3>
                    <span class="tgc-interest-card__arrow" aria-hidden="true">↗</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="tgc-section">
    <div class="tgc-container">
        <div class="tgc-section-topline">
            @include('frontend.redesign.components.section-heading', [
                'eyebrow' => 'Current catalogue',
                'title' => 'Featured programs',
                'copy' => 'Programs are drawn from the active TGC course records.',
            ])
            <a class="tgc-text-link" href="{{ route('coursesnew') }}">View all courses <span aria-hidden="true">→</span></a>
        </div>

        @if ($featuredCourses->isNotEmpty())
            <div class="tgc-course-grid">
                @foreach ($featuredCourses as $course)
                    @include('frontend.redesign.components.course-card', ['course' => $course])
                @endforeach
            </div>
        @else
            <div class="tgc-empty-state">
                <p>Featured course records are not available in this preview.</p>
                <a class="tgc-button tgc-button--secondary" href="{{ route('coursesnew') }}">Browse all courses</a>
            </div>
        @endif
    </div>
</section>

<section class="tgc-section tgc-proof-section">
    <div class="tgc-container tgc-proof-section__grid">
        <div>
            @include('frontend.redesign.components.section-heading', [
                'eyebrow' => 'Student work',
                'title' => 'See skills in practice.',
                'copy' => 'Browse work and visual material already published by TGC India.',
            ])
            <a class="tgc-button tgc-button--light" href="{{ route('galleryData') }}">View student work</a>
        </div>
        <div class="tgc-proof-board" aria-hidden="true">
            <span>Design</span><span>Animation</span><span>Video</span><span>Web</span><span>Digital</span><span>Data</span>
        </div>
    </div>
</section>

<section class="tgc-section">
    <div class="tgc-container">
        @include('frontend.redesign.components.section-heading', [
            'eyebrow' => 'Why TGC',
            'title' => 'A clearer route from interest to skill.',
            'copy' => 'The new experience puts course choice, practical work and counselling in one easy flow.',
            'align' => 'center',
        ])
        <div class="tgc-value-grid">
            <article><span>01</span><h3>Start with your goal</h3><p>Choose by field, role or the skill you want to learn.</p></article>
            <article><span>02</span><h3>Learn through practice</h3><p>Focus on tools, assignments and portfolio-ready work.</p></article>
            <article><span>03</span><h3>Get course guidance</h3><p>Speak with the counselling team about fit, mode and batches.</p></article>
            <article><span>04</span><h3>Plan your next move</h3><p>Connect skills to roles and career preparation.</p></article>
        </div>
    </div>
</section>

<section class="tgc-section tgc-section--ink" id="career-paths">
    <div class="tgc-container">
        <div class="tgc-section-topline">
            @include('frontend.redesign.components.section-heading', [
                'eyebrow' => 'Career paths',
                'title' => 'Choose a role. See the skills behind it.',
                'copy' => 'Use these paths as a starting point, then compare current programs.',
            ])
            <a class="tgc-text-link tgc-text-link--light" href="#counselling">Ask a counsellor <span aria-hidden="true">→</span></a>
        </div>
        <div class="tgc-career-grid">
            @foreach ($careerPaths as $path)
                <a class="tgc-career-card" href="{{ route('coursesnew', ['keywords' => $path['query']]) }}">
                    <h3>{{ $path['role'] }}</h3>
                    <p>{{ $path['skills'] }}</p>
                    <span aria-hidden="true">View matching courses →</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="tgc-section">
    <div class="tgc-container tgc-learning-grid">
        <div>
            @include('frontend.redesign.components.section-heading', [
                'eyebrow' => 'Learning experience',
                'title' => 'From first question to course choice.',
                'copy' => 'A simple path designed to reduce guesswork.',
            ])
            <a class="tgc-button tgc-button--secondary" href="{{ route('calendar_new_batches') }}">Check new batches</a>
        </div>
        <ol class="tgc-steps">
            <li><span>01</span><div><h3>Choose your area</h3><p>Start with a subject or a job role.</p></div></li>
            <li><span>02</span><div><h3>Compare programs</h3><p>Review course focus and available learning modes.</p></div></li>
            <li><span>03</span><div><h3>Speak with TGC</h3><p>Ask about fit, schedule, centre and next steps.</p></div></li>
            <li><span>04</span><div><h3>Begin learning</h3><p>Build skills through guided practice and projects.</p></div></li>
        </ol>
    </div>
</section>

@if ($placementRecords->isNotEmpty())
<section class="tgc-section tgc-section--soft">
    <div class="tgc-container">
        @include('frontend.redesign.components.section-heading', [
            'eyebrow' => 'Published placement records',
            'title' => 'Student outcomes already listed by TGC.',
            'copy' => 'This section uses current database records only.',
        ])
        <div class="tgc-placement-grid">
            @foreach ($placementRecords as $record)
                <article class="tgc-placement-card">
                    @if (!empty($record->image))
                        <img src="{{ url('public/uploads/'.$record->image) }}" width="240" height="180" loading="lazy" decoding="async" alt="{{ $record->name }}">
                    @endif
                    <div><h3>{{ $record->name }}</h3><p>{{ $record->course_name }}</p></div>
                </article>
            @endforeach
        </div>
        <a class="tgc-text-link" href="{{ route('placement') }}">View placement information <span aria-hidden="true">→</span></a>
    </div>
</section>
@endif

<section class="tgc-section">
    <div class="tgc-container">
        @include('frontend.redesign.components.section-heading', [
            'eyebrow' => 'Centres',
            'title' => 'Find a TGC centre.',
            'copy' => 'Use the published centre pages for current contact and visit information.',
        ])
        <div class="tgc-centre-grid">
            <a class="tgc-centre-card" href="{{ route('south_delhi_center') }}"><span>Delhi</span><h3>South Delhi</h3><span>View centre →</span></a>
            <a class="tgc-centre-card" href="{{ route('east_delhi_center') }}"><span>Delhi</span><h3>East Delhi</h3><span>View centre →</span></a>
            <a class="tgc-centre-card tgc-centre-card--directory" href="{{ route('location') }}"><span>Directory</span><h3>All TGC locations</h3><span>View locations →</span></a>
        </div>
    </div>
</section>

@if ($testimonials->isNotEmpty())
<section class="tgc-section tgc-section--soft">
    <div class="tgc-container">
        @include('frontend.redesign.components.section-heading', [
            'eyebrow' => 'Student voices',
            'title' => 'Testimonials from current TGC records.',
            'copy' => 'No sample reviews are added to this preview.',
        ])
        <div class="tgc-testimonial-grid">
            @foreach ($testimonials as $testimonial)
                <figure class="tgc-testimonial-card">
                    <blockquote>{!! strip_tags($testimonial->content, '<p><br>') !!}</blockquote>
                    <figcaption>
                        <strong>{{ $testimonial->name }}</strong>
                        @if (!empty($testimonial->heading))<span>{{ $testimonial->heading }}</span>@endif
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="tgc-section tgc-counselling" id="counselling">
    <div class="tgc-container tgc-counselling__grid">
        <div>
            <p class="tgc-eyebrow">Free course guidance</p>
            <h2>Not sure which course fits?</h2>
            <p>Tell the counselling team what you want to learn. They can help you compare fields, programs, modes and centres.</p>
            <div class="tgc-counselling__contact">
                <span>Prefer to call?</span>
                <a href="tel:18001020418">1800 102 0418</a>
            </div>
        </div>
        <div class="tgc-counselling__form">
            @include('frontend.redesign.components.enquiry-form', ['formId' => 'homepage-counselling-form'])
        </div>
    </div>
</section>
@endsection
