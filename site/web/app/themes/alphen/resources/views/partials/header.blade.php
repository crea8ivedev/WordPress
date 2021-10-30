<!-- Header Start -->
<header class="header py-50">
    <div class="header-navbar m-auto">
        <nav class="navbar flex items-center relative flex-wrap justify-between">
            <div class="collapse navbar-collapse ml-auto flex-1 lg:flex items-center  lg:order-1 order-2">
                <div class="navbar-icon mr-0 cursor-pointer hamburger menu-open-test float-right lg:float-none lg:mr-30">
                    <span class="line w-24"></span>
                    <span class="line w-24"></span>
                    <span class="line w-24"></span>
                </div>
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'navbar-nav m-0 p-0 hover-underline-solid hidden lg:flex',
                    ]) !!}
                @endif
            </div>
            <div class="navbar-brand flex-1 lg:order-2 order-1">
                <a href="{{ esc_url(home_url()) }}" class="block ">
                    @if ($headerLogo)
                        <img src="{{ $headerLogo['url'] }}" class="block lg:mx-auto" alt="{{ $siteName }}">
                    @else
                        <img src="@asset('images/logo.png')" class="block lg:mx-auto" alt="{{ $siteName }}">
                    @endif
                </a>
            </div>
            @if ($enquiryButton)
                <div
                    class="collapse navbar-collapse justify-end flex-1 flex items-center hidden lg:flex lg:order-3 order-3">
                    <div class="navbar-button">
                        <a data-fancybox data-src="#reservation-modal"  href="javascript:void(0)" class="button button-outline button-black">{{ $enquiryButton }}</a>
                    </div>
                </div>
            @endif
        </nav>
    </div>
</header>

<div class="main-nav nav-container">
    @if ($menuBgImg)
        <div class="mainNavimg">
            <img src="{!! $menuBgImg['url'] !!}" alt="{!! $menuBgImg['title'] !!}" class="mainNavbgImg">
        </div>
    @endif
    <div class="menu-overlay h-full fixed w-full top-0 left-0 bg-lightyellow"></div>
    <div class="mainNav__wrap max-w-mobile_menu relative m-auto p-menu_mobile z-99 h-full">
        <div class="flex flex-wrap items-center justify-center h-full">
            <div class="lg:w-6/12">
                <div class="mainNav__col leftMenu mainNav__col--left flex flex-col">
                    <div class="menu-logo">
                        <a href="{{ esc_url(home_url()) }}">
                            @if ($headerLogo)
                                <img src="{{ $headerLogo['url'] }}" alt="{{ $siteName }}">
                            @else
                                <img src="@asset('images/logo.png')" alt="{{ $siteName }}">
                            @endif
                        </a>
                    </div>
                    @if (has_nav_menu('inner_navigation'))
                    {!! wp_nav_menu([
                        'theme_location' => 'inner_navigation',
                        'menu_class' => 'navMenu navMenuRight hover-underline-solid lg:pt-40 lg:pl-50 pl-0',
                        'list_item_class' => 'mb-20', 
                    ]) !!}
                    @endif
                    @if($contactLink)
                    <div class="link lg:pl-50 pl-0 wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                        <a href="{!! $contactLink['url'] !!}" class="flex" target="{!! $contactLink['target'] !!}">
                            <div class="link-btn">
                                <span></span>
                            </div>
                            <span>{!! $contactLink['title'] !!}</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @if (has_nav_menu('primary_navigation'))
            <div class="lg:w-6/12">
                <div class="mainNav__col mainNav__col--right flex flex-col">
                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'navMenu navMenuLeft visible list-none m-0 p-0',
                    ]) !!}
                    @if ($enquiryButton)
                    <div class="navbar-button lg:hidden block mt-30 mobile-btn">
                        <a data-fancybox data-src="#reservation-modal" href="javascript:void(0);"
                            class="button button-outline button-black">{{ $enquiryButton }}</a>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Header End -->
