@extends('layouts.app')

@section('content')
@if($bannerBackgroundImage )
    <section class="banner relative">
        <div class="banner-top">
            <div class="container">
                <div class="banner-img relative z-9 h-700 bg-cover lozad" data-background-image="{!! $bannerBackgroundImage['url'] !!}">
                </div>
            </div>
        </div>
        <div class="banner-info relative z-9 bg-lightyellow">
            <div class="container">
                <div class="banner-info-inner lg:py-150 lg:px-80 px-0">
                    <div class="title title-black wow fadeInUp" data-wow-delay="0.4s">
                        <h6 class="h6">404</h6>
                        <h1 class="h1 banner-title text-white">Page Not Found</h1>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10 lg:gap-24 gap-y-0">
                        <div class="content wow fadeInUp" data-wow-delay="0.4s">
                            <p>oops, sorry we can't find that page!</p>
                        </div>
                    </div>
                    <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                        <a href="{!! esc_url(home_url()) !!}" class="flex">
                            <div class="link-btn">
                                <span></span>
                            </div>
                            <span>Home Page</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
