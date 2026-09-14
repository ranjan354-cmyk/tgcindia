<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ $post->title }}",
  "image": "{{ $post->featured_image }}",
  "datePublished": "{{ $post->published_at->toW3cString() }}",
  "author": {
    "@type": "Person",
    "name": "{{ $post->author->name }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "TGC India",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('assets/front/img/logo-tgc.png') }}"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  }
}
</script>
