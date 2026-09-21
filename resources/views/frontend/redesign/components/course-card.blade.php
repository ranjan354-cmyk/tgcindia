@php
    $courseName = !empty($course->display_name) ? $course->display_name : $course->name;
@endphp
<article class="tgc-course-card">
    <a class="tgc-course-card__media" href="{{ url('course/'.$course->slug) }}" tabindex="-1" aria-hidden="true">
        @if (!empty($course->image))
            <img src="{{ url('public/uploads/'.$course->image) }}" width="640" height="400" loading="lazy" decoding="async" alt="">
        @else
            <span class="tgc-course-card__media-fallback" aria-hidden="true"></span>
        @endif
    </a>
    <div class="tgc-course-card__body">
        @if (!empty($course->course_type))
            <span class="tgc-badge">{{ $course->course_type }}</span>
        @endif
        <h3><a href="{{ url('course/'.$course->slug) }}">{{ $courseName }}</a></h3>
        <a class="tgc-text-link" href="{{ url('course/'.$course->slug) }}">View course <span aria-hidden="true">→</span></a>
    </div>
</article>
