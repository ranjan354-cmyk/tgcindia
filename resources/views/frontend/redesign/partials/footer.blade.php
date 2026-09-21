<footer class="tgc-site-footer">
    <div class="tgc-container tgc-site-footer__grid">
        <div class="tgc-site-footer__brand">
            <img src="{{ asset('assets/front/img/logo-tgc.png') }}" width="166" height="58" loading="lazy" alt="TGC India">
            <p>Training for creative, digital, data and technology careers.</p>
            <div class="tgc-site-footer__contact">
                <a href="tel:18001020418">1800 102 0418</a>
                <a href="https://wa.me/919582786407" rel="noopener" target="_blank">WhatsApp: +91 95827 86407</a>
            </div>
        </div>

        <div>
            <h2 class="tgc-site-footer__title">Courses</h2>
            <ul class="tgc-footer-links">
                <li><a href="{{ route('coursesnew') }}">All courses</a></li>
                <li><a href="{{ route('certification_courses') }}">Certification courses</a></li>
                <li><a href="{{ route('calendar_new_batches') }}">New batches</a></li>
                <li><a href="{{ route('download_brochure') }}">Download brochure</a></li>
            </ul>
        </div>

        <div>
            <h2 class="tgc-site-footer__title">TGC India</h2>
            <ul class="tgc-footer-links">
                <li><a href="{{ route('about_us') }}">About</a></li>
                <li><a href="{{ route('why_tgc') }}">Why TGC</a></li>
                <li><a href="{{ route('placement') }}">Placements</a></li>
                <li><a href="{{ route('student_reviews') }}">Student reviews</a></li>
            </ul>
        </div>

        <div>
            <h2 class="tgc-site-footer__title">Centres & support</h2>
            <ul class="tgc-footer-links">
                <li><a href="{{ route('south_delhi_center') }}">South Delhi</a></li>
                <li><a href="{{ route('east_delhi_center') }}">East Delhi</a></li>
                <li><a href="{{ route('location') }}">All locations</a></li>
                <li><a href="{{ route('contact_us') }}">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="tgc-container tgc-site-footer__bottom">
        <p>&copy; {{ date('Y') }} TGC India. All rights reserved.</p>
        <div>
            <a href="{{ route('privacy_policy') }}">Privacy</a>
            <a href="{{ route('terms_conditions') }}">Terms</a>
            <a href="{{ route('refund_policy') }}">Refund policy</a>
        </div>
    </div>
</footer>
