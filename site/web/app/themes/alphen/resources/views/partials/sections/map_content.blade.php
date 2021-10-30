@if(isset($content->map) && $content->map)
<section class="zigzag lg:pt-150 pt-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="zigzag-inner flex flex-wrap items-center">
            <div class="lg:w-6/12 w-full @if($content->map_position == 'right') lg:order-2 @endif">
                <div class="zigzag-image lg:pt-0 lg:pb-0 pb-30 wow fadeInUp" data-wow-delay="0.2s">
                    <iframe src="{!! $content->map !!}" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"></iframe>
                </div>
            </div>
            <div class="lg:w-6/12 w-full @if($content->map_position == 'right') lg:order-1 @endif">
                <div class="zigzag-content @if($content->map_position == 'right') lg:pr-120 lg:pl-50 @else lg:pl-120 lg:pr-50 @endif">
                    @if((isset($content->pre_heading) && $content->pre_heading) || (isset($content->heading) && $content->heading))
                    <div class="title-black wow fadeInUp" data-wow-delay="0.4s">
                        @if(isset($content->pre_heading) && $content->pre_heading)
                        <h6 class="h6">{!! $content->pre_heading !!}</h6>
                        @endif
                        @if(isset($content->heading) && $content->heading)
                        <h2 class="h2">{!! $content->heading !!}</h2>
                        @endif
                    </div>
                    @endif
                    @if(isset($content->description) && $content->description)
                    <div class="content global-list lg:pt-20 pt-10 wow fadeInUp" data-wow-delay="0.6s">
                        {!! $content->description !!}
                    </div>
                    @endif
                    @if((isset($content->button) && $content->button) || (isset($content->other_button) && $content->other_button))
                    <div class="btn-group flex flex-col">
                        @if(isset($content->button) && $content->button)
                        <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                            <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="flex">
                                <div class="link-btn">
                                    <span></span>
                                </div>
                                <span>{!! $content->button['title'] !!}</span>
                            </a>
                        </div>
                        @endif
                        @if(isset($content->other_button) && $content->other_button)
                        <div class="link wow fadeInUp pt-30 inline-block opacity-40" data-wow-delay="0.8s">
                            <a href="{!! $content->other_button['url'] !!}" target="{!! $content->other_button['target'] !!}" class="flex">
                                <div class="link-btn">
                                    <span></span>
                                </div>
                                <span>{!! $content->other_button['title'] !!}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif