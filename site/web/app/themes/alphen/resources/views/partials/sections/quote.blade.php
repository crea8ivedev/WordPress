@if(isset($content->description) && $content->description)
<section class="content-block lg:pt-150 pt-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="lg:w-8/12 m-auto content-block-row">
            <div class="text-center">
                <div class="line-pattern wow fadeInUp" data-wow-delay="0.2s">
                    <img src="@asset('images/line-pattern.svg')" alt="line-pattern" class="m-auto">
                </div>
                <div class="content-text-inner lg:px-30 wow fadeInUp" data-wow-delay="0.4s">
                    {!! $content->description !!}
                    @if(isset($content->sub_heading) && $content->sub_heading)
                    <span>{!! $content->sub_heading !!}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif