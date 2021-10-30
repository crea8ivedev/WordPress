@if(isset($content->stay_data) && $content->stay_data)
<section class="image-grid bg-lightyellow lg:pt-150 pt-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        @if($content->heading)
        <div class="title-black lg:pl-80 lg:pb-80 pl-0 pb-30">
            <h2 class="h2">{!! $content->heading !!}</h2>
        </div>
        @endif
        <div class="flex flex-wrap mr-minus_20">

            @foreach ($content->stay_data as $stay)
            <div class="lg:w-6/12 w-full lg:pr-20 pr-0 lg:mb-150 mb-80">
                <div class="image-grid-row">
                    <div class="img wow fadeInUp" data-wow-delay="0.2s">
                        <img src="{!! $stay['fea_img'] !!}" class="w-full block object-cover" alt="{!! $stay['title'] !!}">
                    </div>
                    <div class="image-slider-item-info lg:pt-50 pt-30 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="title-black">                                
                            <h2 class="h2">{!! $stay['title'] !!}</h2>
                        </div>                            
                        <div class="link pt-20 inline-block" data-wow-delay="0.8s">
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
            @endforeach

        </div>            

    </div>
</section>
@endif