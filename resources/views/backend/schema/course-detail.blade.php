<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Course",
  "name": "{{ $course->title }}",
  "description": "{{ $course->meta_description }}",
  "provider": {
    "@type": "EducationalOrganization",
    "name": "TGC India",
    "url": "{{ url('/') }}"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "{{ $course->average_rating }}",
    "reviewCount": "{{ $course->reviews_count }}"
  }
}
</script>
