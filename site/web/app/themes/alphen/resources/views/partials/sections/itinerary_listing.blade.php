@if (isset($content->itinerary_data) && $content->itinerary_data)
<section class="image-grid lg:pt-150 py-50 pb-0">
    <div class="container">
        <div class="flex flex-wrap mr-minus_20">
            @foreach ($content->itinerary_data as $itinerary)
            <div class="lg:w-6/12 w-full lg:pr-20 pr-0 lg:mb-150 mb-80">
                <div class="image-grid-row">
                    <div class="img wow fadeInUp" data-wow-delay="0.2s">
                        <img src="{!! $itinerary['fea_img'] !!}" class="w-full block object-cover" alt="{!! $itinerary['title'] !!}">
                    </div>
                    <div class="image-slider-item-info lg:pt-50 pt-30 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="title-black">
                            @if($itinerary['pre_heading'])
                            <h6 class="h6">{!! $itinerary['pre_heading'] !!}</h6>
                            @endif
                            <h2 class="h2">{!! $itinerary['title'] !!}</h2>
                        </div>
                        <div class="content">
                            <p>{!! $itinerary['excerpt'] !!}</p>
                        </div>
                        <div class="link pt-20 inline-block" data-wow-delay="0.8s">
                            <a href="{!! $itinerary['url'] !!}" class="flex">
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