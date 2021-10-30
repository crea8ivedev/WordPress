@if(isset($content->image) && $content->image)
<section class="zigzag img-portrait lg:pt-150 pt-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="zigzag-inner flex flex-wrap items-center">
            <div class="lg:w-6/12 w-full @if($content->image_position == 'right') lg:order-2 @endif">
                <div class="zigzag-image lg:pt-0 lg:pb-0 pb-30 wow fadeInUp" data-wow-delay="0.2s">
                    <img data-src="{!! $content->image['url'] !!}" alt="{!! $content->image['title'] !!}" class="lozad w-full">
                </div>
            </div>
            <div class="lg:w-6/12 w-full @if($content->image_position == 'right') lg:order-1 @endif">
                <div class="zigzag-content lg:pt-0 pt-30 @if($content->image_position == 'right') lg:pr-120 lg:pl-50 @else lg:pl-120 lg:pr-50 @endif">
                    @if((isset($content->pre_heading) && $content->pre_heading) || (isset($content->heading) && $content->heading))
                    <div class="title-black wow fadeInUp" data-wow-delay="0.4s">
                        @if(isset($content->pre_heading) && $content->pre_heading)
                        <h6 class="h6">{!! $content->pre_heading !!}</h6>
                        @endif
                        @if(isset($content->heading) && $content->heading)
                        <h2 class="h2">{!! $content->heading !!}</h2>
                        @endif
                    </div>
                    @endif
                   
                    @if(isset($content->tab) && $content->tab)
                    
                    <div class="tabs_wrapper">
                        <ul class="tabs lg:mb-30 wow fadeInUp" data-wow-delay="0.2s">
                            @php $tabCount = 1; @endphp
                            @php $randNum = rand();  @endphp
                            @foreach ($content->tab as $tab)
                            <li @if($tabCount == '1') class="active" @endif id="tab-{!! $randNum !!}-{!! $tabCount !!}">{!! $tab['heading'] !!}</li>
                            @php $tabCount++; @endphp
                            @endforeach
                        </ul>
                        <div class="tabs_container">
                            @php $tabCount = 1; @endphp
                            @foreach ($content->tab as $tab)
                            <div class="tab_content @if($tabCount == '1') active @endif" data-tab="tab-{!! $randNum !!}-{!! $tabCount !!}">
                                <div class="content wow fadeInUp global-list" data-wow-delay="0.4s">
                                    {!! $tab['description'] !!}
                                </div>
                            </div>
                            @php $tabCount++; @endphp
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if(isset($content->price) && $content->price)
                    <div class="content wow fadeInUp" data-wow-delay="0.4s">
                        <h4 class="lg:mt-30 mt-15">{!! $content->price !!}</h4>
                    </div>
                    @endif
                    @if(isset($content->button) && $content->button)
                    <div class="btn-group flex flex-col">
                        <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.4s">
                            <a href="{!! $content->button['url'] !!}" target="{!! $content->button['target'] !!}" class="flex">
                                <div class="link-btn">
                                    <span></span>
                                </div>
                                <span>{!! $content->button['title'] !!}</span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif