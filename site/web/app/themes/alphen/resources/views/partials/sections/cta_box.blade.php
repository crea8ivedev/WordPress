@if(isset($content->description) && $content->description)
<section class="box-content lg:pt-150 pt-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="lg:w-8/12 w-full m-auto">
            <div class="box-content-inner text-center lg:px-100 lg:py-80 px-50 pt-40">
                <div class="title-black">
                    <div class="line-pattern lg:mb-50 mb-30 wow fadeInUp" data-wow-delay="0.2s">
                        <img data-src="@asset('images/line-pattern.svg')" alt="line-pattern" class="m-auto lozad"> 
                    </div>
                    @if(isset($content->heading) && $content->heading)
                    <h2 class="h2">{!! $content->heading !!}</h2>
                    @endif
                </div>
                <div class="content pt-10 global-list lg:px-100 px-50">
                    {!! $content->description !!}
                </div>
                @if(isset($content->button) && $content->button)
                <div class="btn-custom mt-50">
                    <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="button button-outline button-black">{!! $content->button['title'] !!}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif