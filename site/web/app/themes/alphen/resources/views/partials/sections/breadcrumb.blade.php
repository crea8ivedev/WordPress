@if(isset($content->image) && $content->image)
@if($content->breadcrumb_style == 'full')
<section class="banner relative {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="banner-top">
        <div class="container">
            <div class="banner-img relative z-9 h-700 bg-cover lozad" data-background-image="{!! $content->image['url'] !!}">
            </div>
        </div>
    </div>
    <div class="banner-info relative z-9 bg-lightyellow">
        <div class="container">
            <div class="banner-info-inner lg:py-150 lg:px-80 px-0">
                @if((isset($content->pre_heading) && $content->pre_heading) || (isset($content->heading) && $content->heading))
                <div class="title title-black wow fadeInUp" data-wow-delay="0.4s">
                    @if(isset($content->pre_heading) && $content->pre_heading)
                    <h6 class="h6">{!! $content->pre_heading !!}</h6>
                    @endif
                    @if(isset($content->heading) && $content->heading)
                    <h2 class="h2">{!! $content->heading !!}</h2>
                    @endif
                </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10 lg:gap-24 gap-y-0">
                    @if(isset($content->description) && $content->description)
                    <div class="content wow fadeInUp" data-wow-delay="0.4s">
                        {!! $content->description !!}
                    </div>
                    @endif
                    <div class="content flex flex-col lg:items-end items-start wow fadeInUp" data-wow-delay="0.4s">
                        <div class="btn-info">
                            @if(isset($content->button) && $content->button)
                                @if($content->button_type == 'button')
                                <div class="btn-custom">
                                    <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="button button-outline button-black">
                                        {!! $content->button['title'] !!}
                                    </a>
                                </div>
                                @else
                                <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                                    <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="flex">
                                        <div class="link-btn">
                                            <span></span>
                                        </div>
                                        <span>{!! $content->button['title'] !!}</span>
                                    </a>
                                </div>
                                @endif
                            @endif
                            @if(isset($content->other_button) && $content->other_button)
                                @if($content->other_button_type == 'button')
                                <div class="btn-custom">
                                    <a href="{!! $content->other_button['url'] !!}" target="{!! $content->other_button['target'] !!}" class="button button-outline button-black">
                                        {!! $content->other_button['title'] !!}
                                    </a>
                                </div>
                                @else
                                <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                                    <a href="{!! $content->other_button['url'] !!}" target="{!! $content->other_button['target'] !!}" class="flex">
                                        <div class="link-btn">
                                            <span></span>
                                        </div>
                                        <span>{!! $content->other_button['title'] !!}</span>
                                    </a>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="inner-banner {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="inner-banner-row bg-lightyellow">
            <div class="flex flex-wrap items-center">
                <div class="lg:w-6/12 w-full lg:order-2">
                    <div class="inner-banner-img">
                        <img data-src="{!! $content->image['url'] !!}" alt="{!! $content->image['title'] !!}" class="lozad w-full block">
                    </div>
                </div>
                <div class="lg:w-6/12 w-full">
                    <div class="inner-banner-left lg:pl-100 lg:pr-200 pl-50 pr-50 py-50 wow fadeInUp" data-wow-delay="0.8s">
                        @if((isset($content->pre_heading) && $content->pre_heading) || (isset($content->heading) && $content->heading))
                        <div class="title-black" data-wow-delay="0.4s">
                            @if(isset($content->pre_heading) && $content->pre_heading)
                            <h6 class="h6">{!! $content->pre_heading !!}</h6>
                            @endif
                            @if(isset($content->heading) && $content->heading)
                            <h2 class="h2">{!! $content->heading !!}</h2>
                            @endif
                        </div>
                        @endif
                        @if(isset($content->description) && $content->description)
                        <div class="content">
                            {!! $content->description !!}
                        </div>
                        @endif
                        <div class="content flex flex-col wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-info">
                                @if(isset($content->button) && $content->button)
                                    @if($content->button_type == 'button')
                                    <div class="btn-custom">
                                        <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="button button-outline button-black">
                                            {!! $content->button['title'] !!}
                                        </a>
                                    </div>
                                    @else
                                    <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                                        <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="flex">
                                            <div class="link-btn">
                                                <span></span>
                                            </div>
                                            <span>{!! $content->button['title'] !!}</span>
                                        </a>
                                    </div>
                                    @endif
                                @endif
                                @if(isset($content->other_button) && $content->other_button)
                                    @if($content->other_button_type == 'button')
                                    <div class="btn-custom">
                                        <a href="{!! $content->other_button['url'] !!}" target="{!! $content->other_button['target'] !!}" class="button button-outline button-black">
                                            {!! $content->other_button['title'] !!}
                                        </a>
                                    </div>
                                    @else
                                    <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                                        <a href="{!! $content->other_button['url'] !!}" target="{!! $content->other_button['target'] !!}" class="flex">
                                            <div class="link-btn">
                                                <span></span>
                                            </div>
                                            <span>{!! $content->other_button['title'] !!}</span>
                                        </a>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>            
    </div>
</section>
@endif
@endif