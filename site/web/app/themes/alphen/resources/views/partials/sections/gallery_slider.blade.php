@if(isset($content->gallery) && $content->gallery)
<section class="galler-wrapper bg-lightyellow lg:pt-100 lg:pb-30 pt-50 pb-30 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="gallery-slider default-arrow arrow-down" data-slick='{ "slidesToShow": 1, "infinite": true, "fade": true, "arrows": true, "speed": 1000, "dots": true }'>
            @foreach ($content->gallery as $gallery)
            <div class="gallery-slider-item !block">
                <img src="{!! $gallery['image']['url'] !!}" class="w-full block object-cover lg:h-700 md:h-450 h-350" alt="{!! $gallery['image']['title'] !!}">
                @if(isset($gallery['heading']) && $gallery['heading'])
                <span>{!! $gallery['heading'] !!}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif