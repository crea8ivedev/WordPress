@if(isset($content->form_shortcode) && $content->form_shortcode)
<section class="contact-form bg-lightyellow lg:pb-100 pb-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="contact-form-inner">
            <div class="flex flex-wrap">
                <div class="lg:w-4/12 w-full">
                    <div class="contact-form-left h-full bg-black2 lg:py-60 lg:px-60 py-30 px-30">
                        <div class="flex flex-col h-full justify-around">
                            <div class="ct-top lg:mb-0 mb-20">
                                @if(isset($content->heading) && $content->heading)
                                <div class="title-white">
                                    <h2 class="h2">{!! $content->heading !!}</h2>
                                </div>
                                @endif
                                @if(isset($content->description) && $content->description)
                                <div class="content lg:mt-30 mt-10">
                                    {!! $content->description !!}
                                </div>
                                @endif
                            </div>
                            @if(isset($content->other_description) && $content->other_description)
                            <div class="ct-top">
                                <div class="content lg:mt-30 mt-10">
                                    {!! $content->other_description !!}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="lg:w-8/12 w-full">
                    <div class="contact-form-right h-full bg-white lg:py-60 lg:px-100 py-30 px-30">
                        @if(isset($content->form_heading) && $content->form_heading)
                        <div class="title-black">
                            <h2 class="h2">{!! $content->form_heading !!}</h2>
                        </div>
                        @endif
                        @if(isset($content->form_shortcode) && $content->form_shortcode)
                        <div class="contact-form-data">
                            {!! do_shortcode($content->form_shortcode) !!}
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endif