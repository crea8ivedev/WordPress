@if(isset($content->image) && $content->image)
<section class="banner relative {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="banner-top">
        <div class="container">
            <div class="banner-img relative z-9 h-700 bg-cover lozad" data-background-image="{!! $content->image['url'] !!}">
                @if(isset($content->video_url) && $content->video_url)
                <div class="video-icon h-full flex items-center justify-center">
                    <a href="{!! $content->video_url !!}" class="w-80 h-80 md:w-140 md:h-140 border border-solid border-white border-opacity-80 rounded-50 flex items-center justify-center text-white text-24 md:text-38 transition-all duration-300" data-lity>
                        <i class="fas fa-play pt-3 pl-3"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="banner-info relative z-9 bg-lightyellow">
        <div class="container">
            <div class="banner-info-inner lg:py-150 lg:px-80 px-0">
                @if((isset($content->heading) && $content->heading) || (isset($content->pre_heading) && $content->pre_heading))
                <div class="title title-black wow fadeInUp" data-wow-delay="0.2s">
                    @if(isset($content->pre_heading) && $content->pre_heading)
                    <h6 class="h6">{!! $content->pre_heading !!}</h2>
                    @endif
                    @if(isset($content->heading) && $content->heading)
                    <h2 class="h1">{!! $content->heading !!}</h2>
                    @endif
                </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10 lg:gap-24 gap-y-0">
                    @if(isset($content->description) && $content->description)
                    <div class="content global-list wow fadeInUp" data-wow-delay="0.4s">
                        {!! $content->description !!}
                    </div>
                    @endif

                    @if(isset($content->other_description) && $content->other_description)
                    <div class="content global-list wow fadeInUp" data-wow-delay="0.6s">
                        {!! $content->other_description !!}
                    </div>
                    @endif
                </div>
                @if(isset($content->button) && $content->button)
                <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                    <a href="{!! $content->button['url'] !!}" class="flex" target="{!! $content->button['target'] !!}">
                        <div class="link-btn">
                            <span></span>
                        </div>
                        <span>{!! $content->button['title'] !!}</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif