<!-- Footer Start -->
<footer>
    <?php $get_template = basename(get_page_template()); ?>
    @if(($get_template != 'template-travel.blade.php') && ($get_template != 'template-thank-you.blade.php') && (!is_404()))
    @if(isset($instagramShortcode) && $instagramShortcode)
    <div class="instagram lg:py-80 pt-50 pb-50">
        <div class="instagram-top">
            <div class="container">
                <div class="lg:w-6/12">
                    @if(isset($instagramTitle) && $instagramTitle)
                    <div class="title-black">
                        <h2 class="h2">{!! $instagramTitle !!}</h2>
                    </div>
                    @endif
                    @if(isset($instagramDescription) && $instagramDescription)
                    <div class="content global-list">
                        {!! $instagramDescription !!}
                    </div>
                    @endif
                </div>
            </div>

            <div class="instagram-slider lg:pt-30 pt-10">
                <div class="container ">
                    {!! do_shortcode($instagramShortcode) !!}
                    @if($socialMedia)
                    <div class="sicon lg:mt-30 mt-20">
                        <ul class="flex flex-wrap">
                            @foreach ($socialMedia as $sMedia)
                            <li><a href="{!! $sMedia['url'] !!}" target="_blank"><img data-src="{!! $sMedia['icon']['url'] !!}" alt="{!! $sMedia['icon']['title'] !!}" class="lozad"></a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    
    <div class="footer-btm">
        <div class="container">
            @if(isset($nlShortcode) && $nlShortcode)
            <div class="newsletter-form lg:pt-70 lg:pb-30 pt-20">
                <div class="lg:w-8/12 m-auto newsletter-form-content">
                    <div class="newsletter-form-inner text-center wow fadeInUp" data-wow-delay="0.2s">
                        @if(isset($nlTitle) && $nlTitle)
                        <h2 class="h2 signup-title">{!! $nlTitle !!}</h2>
                        @endif
                        <div class="gform_wrapper lg:mt-50 mt-20" style="display: none">
                            {!! do_shortcode($nlShortcode) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="footer-menu lg:py-120 py-50 lg:mt-50 mt-0">
                <div class="flex flex-wrap w-full">
                    @if($footerLogo || $footerContactDetails)
                    <div class="lg:w-3/12 w-full footer-left">
                        <div class="footer-col lg:pr-60 pr-0 lg:w-auto w-full wow fadeInUp" data-wow-delay="0.2s">
                            @if($footerLogo)
                            <div class="footer-logo">
                                <a href="{{ esc_url(home_url()) }}">
                                    <img data-src="{!! $footerLogo['url'] !!}" alt="{!! $footerLogo['title'] !!}" class="lozad">
                                </a>
                            </div>
                            @endif
                            @if($footerContactDetails)
                            <div class="add-info lg:pl-30 pl-0 pt-20">
                                {!! $footerContactDetails !!}
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif


                    <div class="lg:w-9/12 w-full footer-right lg:pl-80">
                        <div class="flex flex-wrap">
                            @if(has_nav_menu('footer_navigation_1'))
                            <div class="footer-col lg:pr-60 pr-0 lg:w-auto w-full wow fadeInUp" data-wow-delay="0.4s">
                                <div class="footer-nav hover-underline-solid">
                                    {!! wp_nav_menu([
                                    'theme_location' => 'footer_navigation_1'
                                    ]) !!}
                                </div>
                            </div>
                            @endif
                            @if(has_nav_menu('footer_navigation_2'))
                            <div class="footer-col lg:pr-60 pr-0 lg:w-auto w-full wow fadeInUp" data-wow-delay="0.4s">
                                <div class="footer-nav hover-underline-solid">
                                    {!! wp_nav_menu([
                                    'theme_location' => 'footer_navigation_2'
                                    ]) !!}
                                </div>
                            </div>
                            @endif
                            @if(has_nav_menu('footer_navigation_3'))
                            <div class="footer-col lg:pr-60 pr-0 lg:w-auto w-full wow fadeInUp" data-wow-delay="0.4s">
                                <div class="footer-nav hover-underline-solid">
                                    {!! wp_nav_menu([
                                    'theme_location' => 'footer_navigation_3'
                                    ]) !!}
                                </div>
                            </div>
                            @endif
                            @if(has_nav_menu('footer_navigation_4'))
                            <div class="footer-col lg:pr-60 pr-0 lg:w-auto w-full wow fadeInUp" data-wow-delay="0.4s">
                                <div class="footer-nav hover-underline-solid">
                                    {!! wp_nav_menu([
                                    'theme_location' => 'footer_navigation_4'
                                    ]) !!}
                                </div>
                            </div>
                            @endif
                            @if(has_nav_menu('footer_navigation_5'))
                            <div class="footer-col lg:pr-60 pr-0 lg:w-auto w-full wow fadeInUp" data-wow-delay="0.4s">
                                <div class="footer-nav hover-underline-solid">
                                    {!! wp_nav_menu([
                                    'theme_location' => 'footer_navigation_5'
                                    ]) !!}
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>


            <div class="footer-copyright lg:py-30 lg:pb-60 pt-15 pb-30">
                <div class="footer-copyright-inner flex flex-wrap items-center justify-between">
                    @if($copyrightImage)
                    <div class="footer-copyright-content wow fadeInUp" data-wow-delay="0.2s">
                        @if($copyrightURL)
                        <a href="{{ $copyrightURL }}" target="_blank">
                        @endif
                        <img data-src="{!! $copyrightImage['url'] !!}" class="lozad" alt="{!! $copyrightImage['title'] !!}">
                        @if($copyrightURL)
                        </a>
                        @endif
                    </div>
                    @endif
                    <div class="footer-btm-right flex flex-wrap items-center wow fadeInUp" data-wow-delay="0.2s">
                        <p>All rights reserved {!! date('Y') !!} {!! $siteName !!}</p>
                        @if(has_nav_menu('footer_navigation_6'))
                        <div class="footer-btm-menu hover-underline-solid">
                            {!! wp_nav_menu([
                            'theme_location' => 'footer_navigation_6',
                            'menu_class' => 'flex flex-wrap',
                            ]) !!}
                        </div>
                        @endif
                        @if($socialMedia)
                        <div class="sicon">
                            <ul class=" flex-wrap flex items-center">
                                @foreach ($socialMedia as $sMedia)
                                <li><a href="{!! $sMedia['url'] !!}" target="_blank"><img data-src="{!! $sMedia['icon']['url'] !!}" alt="{!! $sMedia['icon']['title'] !!}" class="lozad"></a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@if ($enquiryContent)
<div style="display: none;" id="reservation-modal" class="reservation-modal-popup default-modal">
    <div class="container">
        <div class="lg:w-10/12 w-full m-auto">
            <div class="modal-popup-inner">
                <div class="flex flex-wrap">
                    @if($enquiryContent['enquiry_image'])
                    <div class="lg:w-6/12">
                        <div class="modal-img">
                            <img src="{{ $enquiryContent['enquiry_image']['url'] }}" alt="{{ $enquiryContent['enquiry_image']['title'] }}" class="w-full">
                        </div>
                    </div>
                    @endif
                    <div class="lg:w-6/12 w-full">
                        <div
                            class="modal-content flex flex-col justify-around h-full lg:pt-100 lg:pb-10 pt-30 pb-50 lg:px-80 px-50">
                            <div class="modal-content-top">
                                @if($enquiryContent['enquiry_heading'])
                                <div class="title-black">
                                    <h2 class="h2">{!! $enquiryContent['enquiry_heading'] !!}</h2>
                                </div>
                                @endif
                                @if($enquiryContent['enquiry_description'])
                                <div class="content lg:pr-150 pr-0 global-list">
                                    {!! $enquiryContent['enquiry_description'] !!}
                                </div>
                                @endif
                                @if($enquiryContent['enquiry_button'])
                                <div class="btn-custom mt-30">
                                    <a href="{!! $enquiryContent['enquiry_button']['url'] !!}" target="{!! $enquiryContent['enquiry_button']['target'] !!}" class="button button-black">{!! $enquiryContent['enquiry_button']['title'] !!}</a>
                                </div>
                                @endif
                            </div>
                            <div class="modal-content-bottom">
                                @if($enquiryContent['enquiry_link_label'])
                                <span class="w-full inline-block italic text-14 text-black text-opacity-40 font-light">{!! $enquiryContent['enquiry_link_label'] !!}</span>
                                @endif
                                @if($enquiryContent['enquiry_link_button'])
                                <div class="link mt-10">
                                    <a href="{!! $enquiryContent['enquiry_link_button']['url'] !!}" class="flex" target="{!! $enquiryContent['enquiry_link_button']['target'] !!}">
                                        <div class="link-btn">
                                            <span></span>
                                        </div>
                                        <span>{!! $enquiryContent['enquiry_link_button']['title'] !!}</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endif
<div class="hidden mb-20 lg:pb-150 lg:grid-cols-3"></div>
<!-- Footer End -->
