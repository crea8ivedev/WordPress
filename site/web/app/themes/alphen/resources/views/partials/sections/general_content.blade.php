@if (isset($content->description) && $content->description)
<section class="general-content lg:py-150 py-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="flex flex-wrap">
            <div class="lg:w-7/12 w-full">
                @if (isset($content->heading) && $content->heading)
                <div class="title-black">
                    <h2 class="h2">{!! $content->heading !!}</h2>
                </div>
                @endif
                <div class="content global-list">
                    {!! $content->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endif