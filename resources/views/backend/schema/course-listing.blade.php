<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "TGC India Courses",
  "itemListElement": [
    @foreach($courses as $index => $course)
    {
      "@type": "ListItem",
      "position": {{ $index + 1 }},
      "item": {
        "@type": "Course",
        "name": "{{ $course->title }}",
        "url": "{{ route('courses.show', $course->slug) }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
