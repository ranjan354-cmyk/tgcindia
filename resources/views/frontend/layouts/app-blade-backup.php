<!doctype html>
<html class="no-js" lang="en">

@php
// Get the current URL with scheme and host
$currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Parse the URL
$parsedUrl = parse_url($currentUrl);
// Reconstruct the URL without query parameters
$urlWithoutParams = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] . '://' : '';
$urlWithoutParams .= isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
$urlWithoutParams .= isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
@endphp



<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{$data['meta_title']}}</title>
    <meta name="description" content="{{$data['meta_description']}}">
    <meta name="keywords" content="{{$data['meta_keywords']}}">
    <link rel="canonical" href="{{$urlWithoutParams}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/front/img/logo/favicon.png') }}">
    <!-- CSS here -->
    <link href="{{ url('assets/front/') }}/img/fav.png" rel="shortcut icon" type="image/png">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> 
    
  

    
    <link href="{{ url('assets/front/') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!----<link href="{{ url('assets/front/') }}/css/jquery-ui.min.css" rel="stylesheet" type="text/css"> --->
   

    
     <link href="{{ url('assets/front/') }}/css/css-plugin-collections.css" rel="stylesheet" /> 
    
    
 

    <!-- CSS | menuzord megamenu skins -->

<!--    <link href="{{ url('assets/front/') }}/css/icocoom.css" rel="stylesheet" type="text/css"> --->
    

<!--
    <link rel="stylesheet" href="{{ url('assets/front/') }}//css/uikit.min.css" />
    --->
    
    


   <link  href="{{ url('assets/front/') }}/css/style-main.css" rel="stylesheet" type="text/css">  
   
   
  

  

   
   
   
   


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 


    <!-- CSS | Custom Margin Padding Collection -->

   <!-- <link href="{{ url('assets/front/') }}/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css"> ---->
    
    
    




    <link href="{{ url('assets/front/') }}/css/responsive.css" rel="stylesheet" type="text/css"> 
    
   


    <!-- CSS | Theme Color -->
    
   


     <link href="{{ url('assets/front/') }}/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.css" rel="stylesheet" type="text/css">
   
   --->
    
    

<!--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>-->

   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>  --->

  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" /> ---->

  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" /> --->

  <!--  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet"> ---->
    
    

<!---
<link rel="preload"
      href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'">

<noscript>
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
</noscript>


<link rel="preload"
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'">

<noscript>
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
</noscript>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="preload"
      href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'">

<noscript>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap">
</noscript>
---->

   <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --->
   
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W4TK6PX');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4TK6PX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!---<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet"> ---->


@if(!empty($data['slider'][0]->image))
<link rel="preload"
      as="image"
      href="{{ asset('public/uploads/'.$data['slider'][0]->image) }}"
      fetchpriority="high">
@endif


<link href="https://fonts.googleapis.com/css2?family={{ urlencode($themeFont) }}:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    .bg-theme-color-2,.support:before {
        background: {{ !empty($themeBg) ? $themeBg : '' }};
    }
    .header_offer {
        background: {{ !empty($themeTop) ? $themeTop : '' }};
    }
    .bottom_fix .d-flex .fixed {
        background: {{ !empty($themeBtn) ? $themeBtn : '' }};
    }
    .two_btn a.btn,.batch_section .batch_batchtable_tab_col__me6nJ .nav-tabs li.active a,.pop_view .modal-content .modal-body .modal-form-fill form button,.videoinfo_btn_en_dwn__3PvI4 button.videoinfo_btn_dnc__OaDX7:hover,.videoinfo_btn_en_dwn__3PvI4 .videoinfo_btn_enr_stle__G_pv9,.notifications form button,footer.footer02 .widget.subscribe form button,.footer02 .widget.subscribe form button,.top_wid .top_df,.slide_cat_list li.active, .slide_cat_list li:hover a,.left-side .placement-video a.button3,.contact-section.style-five .btn-style-one,.duq_DUQ_container__1Uh0K.duq_DUQ_container_color__2cEYj .duq_header__3Kbtt,.header_mid .search_bar .sr_ico,.duq_DUQ_container__1Uh0K.duq_DUQ_container_color__2cEYj .duq_submit__2CiBU,#fix-rig,.explore_all_btn a{
          background-color:{{ !empty($themeBtn) ? $themeBtn : '' }};
    }
    
    .key_sticky ul .swiper-slide button,.strt_mnt .btn,.aws_certificate .batch_batchtable_tab_col__me6nJ .nav-tabs li.active a,.want_to_become button,.openform_submit__1LuZc,.certification_btn_enr_stle__3hmRd,.corporatetrainingform_CorporateForm__1TN1j button.btn,.learnedu_card_over__3fj5h.card.d-flex .learnedu_drop_us_click__1KecX,.fcontrol .mobile-hidden,.batch-request button.button2 {
         background-color:{{ !empty($themeBtn) ? $themeBtn : '' }};
    }
    .videoinfo_btn_en_dwn__3PvI4 button.videoinfo_btn_dnc__OaDX7{
            color:{{ !empty($themeBtn) ? $themeBtn : '' }};
    border: 1px solid {{ !empty($themeBtn) ? $themeBtn : '' }};
    }
    .contact-section.style-five .left-column .inner-container .list li i,.batch_cant_find_batch_bx__1q6NN .batch_cant_find_batch__2FNGi {
            color: {{ !empty($themeIcon) ? $themeIcon : '' }};
    }
    footer.footer02{
            background: {{ !empty($themeFooter) ? $themeFooter : '' }} !important;
    }
   
   body {
    font-family: '{{ $themeFont }}', sans-serif;
}
h1{
     font-family: '{{ $heading_font_family }}', sans-serif;
}
h2, h1, h2, h3, h4, h5, h6, p, a, button{
     font-family: '{{$sub_heading_font}}', sans-serif;
}
p{
     font-size: '{{$pragaraph_font_size}}';
}

   .holi-bubbles {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none; /* clicks pass through */
    overflow: hidden;
    z-index: 9999; /* above content */
}

.holi-bubbles .bubble {
    position: absolute;
    bottom: -50px;
    left: var(--x, 50%);
    width: var(--size, 20px);
    height: var(--size, 20px);
    background-color: var(--color, #FF4081);
    border-radius: 50%;
    opacity: 0.7;
    animation: rise 6s linear infinite;
    animation-delay: var(--delay, 0s);
}

@keyframes rise {
    0% {
        transform: translateY(0) scale(1);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-50vh) scale(1.2);
        opacity: 0.9;
    }
    100% {
        transform: translateY(-100vh) scale(0.8);
        opacity: 0;
    }
}
</style>


</head>



<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4TK6PX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper" class="@php if($data['cat_show'] == 1){ echo 'all_c_ourse'; } @endphp clearfix">



    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')
    @include('frontend.popup_all')



    <!-- JS here -->

   <script src="{{ url('assets/front/') }}/js/jquery-2.2.4.min.js" defer></script>

  <!--  <script src="{{ url('assets/front/') }}/js/jquery-ui.min.js"></script> --->

    <script src="{{ url('assets/front/') }}/js/bootstrap.min.js" defer></script>

<!--  <script src="{{ url('assets/front/') }}/js/jquery-3.6.0.slim.min.js"></script>-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> --->



  <!--  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --->


<!--
    <script src="{{ url('assets/front/') }}//js/uikit.min.js"></script>

    <script src="{{ url('assets/front/') }}//js/uikit-icons.min.js"></script>

--->


<!--
    <script src="{{ url('assets/front/') }}/js/intlTelInput-jquery.min.js"></script>

    <script src="{{ url('assets/front/') }}/js/intlTelInput.min.js"></script>

-->

    <script src="{{ url('assets/front/') }}/js/custom.js" defer></script>

<!--  <script src="{{ url('assets/front/') }}/js/country_codes.js"></script>  -->

<script src="{{ url('assets/front/') }}/js/menu-side-bar.js" defer></script>

    <script>
    
    
 function getAllsubmenu(id){
   // console.log(id);
   
   document.getElementsByClassName("slider")[0].style.transform = "translateX(-100%)";

    
}

        $(document).ready(function() {

            $('.leader-card').click(function() {

                let src = $(this).closest('.leader-card').find('.c_img').attr('src');

                let name = $(this).closest('.leader-card').find('.c_tt').text();

                let title = $(this).closest('.leader-card').find('.title').text();

                let bio = $(this).closest('.leader-card').find('.bio').text();

                $('#overlay').css('visibility', 'visible');

                $('#leader_modal').css('visibility', 'inherit', 'top', '0px', 'opacity', '1');

                $('#leader_modal .m_img').attr('src', src);

                $('#leader_modal .m_t').text(name);

                $('#leader_modal .leader-title').text(title);

                $('#leader_modal .bio-text').text(bio);

            });



            $('.close-btn').click(function() {

                $('#leader_modal').css('visibility', 'hidden');

            })

        });

    </script>





    


              @php
                  $results = DB::table('tbl_contact')->where('is_deleted', 0)->get();
                  foreach($results as $row){
                  @endphp
                   
    

<script>

function updateTimer() {

  
    future = Date.parse("{{$row->day}} {{$row->hour}}: {{$row->min}}: {{$row->sec}}");
        @php } @endphp

    now = new Date();

    diff = future - now;



    days = Math.floor(diff / (1000 * 60 * 60 * 24));

    hours = Math.floor(diff / (1000 * 60 * 60));

    mins = Math.floor(diff / (1000 * 60));

    secs = Math.floor(diff / 1000);



    d = days;

    h = hours - days * 24;

    m = mins - hours * 60;

    s = secs - mins * 60;



    document.getElementById("timer")

        .innerHTML =

        '<div>' + d + '<span>D</span></div>' +

        '<div>' + h + '<span>H</span></div>' +

        '<div>' + m + '<span>M</span></div>' +

        '<div>' + s + '<span>S</span></div>';

}

setInterval('updateTimer()', 1000);






</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nav = document.getElementById('nav');
        const dropdownMenu = document.getElementById('extra_me');
        const dropdownToggle = document.querySelector('.nav-item.dropdown .dropdown-toggl');

        function adjustMenu() {
            // Move all items back to main nav
            while (dropdownMenu.firstChild) {
                nav.insertBefore(dropdownMenu.firstChild, dropdownToggle.parentNode);
            }

            // Check if there's overflow
            let navWidth = nav.clientWidth;
            let itemsWidth = Array.from(nav.children).reduce((acc, item) => acc + item.clientWidth, 0);

            // Move items to dropdown until there's no overflow
            if (itemsWidth > navWidth) {
                for (let i = nav.children.length - 2; i >= 0; i--) {
                    const item = nav.children[i];
                    itemsWidth -= item.clientWidth;
                    dropdownMenu.insertBefore(item, dropdownMenu.firstChild);
                    if (itemsWidth <= navWidth) break;
                }
            }

            // Show or hide the dropdown toggle based on whether there are items in the dropdown
            dropdownToggle.style.display = dropdownMenu.children.length > 0 ? 'block' : 'none';
        }

        // Initial check
        adjustMenu();

        // Adjust on window resize
        window.addEventListener('resize', adjustMenu);

         // Prevent closing when clicking inside dropdown
        dropdownMenu.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    });
</script>




</div>

</body>



</html>