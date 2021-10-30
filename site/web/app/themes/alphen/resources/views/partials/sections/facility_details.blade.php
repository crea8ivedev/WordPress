@if(isset($content->description) && $content->description)
<section class="content-list lg:pt-150 lg:pb-200 pt-50 pb-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="lg:w-8/12 m-auto w-full">
            @if(isset($content->heading) && $content->heading)
            <div class="title-black text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="line-pattern mb-20">
                    <img src="@asset('images/line-pattern.svg')" alt="line-pattern" class="m-auto">
                </div>
                <h2 class="h2">{!! $content->heading !!}</h2>
            </div>
            @endif
            <div class="global-list three-list lg:pt-80 pt-30 wow fadeInUp" data-wow-delay="0.2s">
                {!! $content->description !!}
            </div>
        </div>
    </div>
</section>
@endif