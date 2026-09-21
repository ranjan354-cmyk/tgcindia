<dialog class="tgc-mobile-nav" id="redesign-mobile-navigation" aria-labelledby="redesign-mobile-navigation-title" data-mobile-navigation>
    <div class="tgc-mobile-nav__panel">
        <div class="tgc-mobile-nav__header">
            <p id="redesign-mobile-navigation-title">Menu</p>
            <button class="tgc-icon-button" type="button" aria-label="Close menu" data-menu-close>
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <nav aria-label="Mobile navigation">
            @include('frontend.redesign.partials.navigation-links', ['listClass' => 'tgc-mobile-nav__links'])
        </nav>

        <div class="tgc-mobile-nav__actions">
            <a class="tgc-button tgc-button--primary tgc-button--block" href="#counselling">Enquire now</a>
            <a class="tgc-button tgc-button--secondary tgc-button--block" href="tel:18001020418">Call 1800 102 0418</a>
        </div>
    </div>
</dialog>
