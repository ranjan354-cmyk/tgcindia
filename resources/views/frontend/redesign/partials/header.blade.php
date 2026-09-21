<header class="tgc-site-header" data-site-header>
    <div class="tgc-utility-bar">
        <div class="tgc-container tgc-utility-bar__inner">
            <p>Career-focused creative and technology education</p>
            <div class="tgc-utility-bar__links">
                <a href="tel:18001020418">1800 102 0418</a>
                <a href="https://wa.me/919582786407" rel="noopener" target="_blank">WhatsApp</a>
            </div>
        </div>
    </div>

    <div class="tgc-container tgc-header-row">
        <a class="tgc-brand" href="{{ url('/') }}" aria-label="TGC India home">
            <img src="{{ asset('assets/front/img/logo-tgc.png') }}" width="166" height="58" alt="TGC India">
        </a>

        <nav class="tgc-desktop-nav" aria-label="Primary navigation">
            @include('frontend.redesign.partials.navigation-links', ['listClass' => 'tgc-nav-list'])
        </nav>

        <div class="tgc-header-actions">
            <a class="tgc-button tgc-button--ghost tgc-header-counselling" href="#counselling">Book counselling</a>
            <a class="tgc-button tgc-button--primary tgc-header-enquire" href="#counselling">Enquire now</a>
            <button class="tgc-menu-button" type="button" aria-haspopup="dialog" aria-controls="redesign-mobile-navigation" aria-expanded="false" data-menu-open>
                <span class="tgc-menu-button__label">Menu</span>
                <span class="tgc-menu-button__icon" aria-hidden="true"><span></span><span></span></span>
            </button>
        </div>
    </div>

    @include('frontend.redesign.partials.mobile-navigation')
</header>
