@if(isset($content->card) && $content->card)
<section class="image-slider lg:py-150 py-50 lg:mb-100 mb-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        @if(isset($content->main_heading) && $content->main_heading)
        <div class="title-black lg:pl-80 pl-0">
            <h2 class="h1">{!! $content->main_heading !!}</h2>
        </div>
        @endif
        <div class="image-slider-block lg:pt-60 pt-50">
            <div class="instagram-slider-inner top-arrow default-arrow arrow-down" data-slick='{ "slidesToShow": 2, "infinite": false, "fade": false, "arrows": true, "speed": 1000, "dots": false,
                        "responsive": [ 
                        {
                            "breakpoint": 992, 
                            "settings": {
                                "slidesToShow": 2, 
                                "slidesToScroll": 1
                            }
                        }, 
                        {
                            "breakpoint": 768, 
                            "settings": {
                                "slidesToShow": 1, 
                                "slidesToScroll": 1,
                                "autoplay": false,
                                "speed": 1500
                            }
                        }
                        ]
                    }'>
                @foreach ($content->card as $card)
                <div class="image-slider-item !block">
                    <div class="img wow fadeInUp" data-wow-delay="0.2s">
                        <img src="{!! $card['image']['url'] !!}" class="w-full block object-cover" alt="{!! $card['image']['title'] !!}">
                    </div>
                    @if((isset($card['heading']) && $card['heading']) || (isset($card['year']) && $card['year']))
                    <div class="image-slider-item-info lg:pt-50 pt-30 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="title-black">
                            @if(isset($card['year']) && $card['year'])
                            <h6 class="h6">{!! $card['year'] !!}</h6>
                            @endif
                            @if(isset($card['heading']) && $card['heading'])
                            <h2 class="h2">{!! $card['heading'] !!}</h2>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif