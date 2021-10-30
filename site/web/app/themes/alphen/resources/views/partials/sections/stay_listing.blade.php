@if(isset($content->stay_data) && $content->stay_data)
<div class="stay-listing {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    @php $stayCount = 1; @endphp
    @foreach ($content->stay_data as $stay)
        <section class="zigzag lg:py-150 py-50 @if($stayCount%2 == '0') bg-lightyellow @endif">
            <div class="container">
                <div class="zigzag-inner flex flex-wrap items-center">

                    @if(isset($stay['gallery']) && $stay['gallery'])
                    <div class="lg:w-8/12 w-full @if($stayCount%2 != '0') lg:order-2 order-2 @endif">
                        <div class="zigzag-image lg:pt-0 pt-30 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="zigzag-slider arrow-none @if($stayCount%2 != '0') dots-right @else dots-left @endif default-arrow arrow-down" data-slick='{ "slidesToShow": 1, "autoplay": true, "autoplaySpeed": 5000,   "infinite": true, "fade": true, "arrows": true, "speed": 2000, "dots": true }'>
                                @foreach ($stay['gallery'] as $gallery)
                                <div class="zigzag-slider-item !block">
                                    <img src="{!! $gallery['url'] !!}" class="w-full" alt="{!! $gallery['title'] !!}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="lg:w-4/12 w-full @if($stayCount%2 != '0') lg:order-1 order-1 @endif">
                        <div class="zigzag-content @if($stayCount%2 != '0') lg:pr-120 lg:pl-50 @else lg:pl-120 lg:pr-50 @endif">
                            <div class="title-black wow fadeInUp" data-wow-delay="0.4s">
                                <h6 class="h6">Stays</h6>
                                <h2 class="h2">{!! $stay['title'] !!}</h2>
                            </div>
                            <div class="content lg:pt-20 pt-10 wow fadeInUp" data-wow-delay="0.6s">
                                <p>{!! $stay['excerpt'] !!}</p>
                            </div>
                            <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                                <a href="{!! $stay['url'] !!}" class="flex">
                                    <div class="link-btn">
                                        <span></span>
                                    </div>
                                    <span>Explore</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @php $stayCount++; @endphp
    @endforeach
</div>
@endif