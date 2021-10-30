@if(isset($content->tab) && $content->tab)
<section class="tabs-grid lg:py-150 py-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="tabs_wrapper">
            <ul class="tabs lg:pl-80 pl-0 lg:mb-30 wow fadeInUp" data-wow-delay="0.2s">
                <li class="active" id="award-tab-all">All</li>
                @php $tabCount = 1; @endphp
                @foreach ($content->tab as $tab)
                <li id="award-tab-{!! $tabCount !!}">{!! $tab['heading'] !!}</li>
                @php $tabCount++; @endphp
                @endforeach
            </ul>
            <div class="tabs_container wow fadeInUp" data-wow-delay="0.2s">
                <div class="tab_content active" data-tab="award-tab-all">
                    <div class="tabs-img-grid flex flex-wrap lg:mr-minus_15 md:mr-minus_15 mr-0">
                        @foreach ($content->tab as $tab)
                            @if($tab['award'])
                                @foreach ($tab['award'] as $award)
                                <div class="lg:w-3/12 md:w-6/12 w-full lg:pr-15 md:pr-15 pr-0">
                                    <div class="tabs_container_bx lg:pt-80 pt-30">
                                        @if($award['image'])
                                        <div class="img">
                                            <img data-src="{!! $award['image']['url'] !!}" alt="{!! $award['image']['title'] !!}" class="lozad w-full">
                                        </div>
                                        @endif
                                        <div class="tabs-content-info pt-10 wow fadeInUp" data-wow-delay="0.1s">
                                            @if($award['heading'])
                                            <div class="title-black">
                                                <h2 class="h2">{!! $award['heading'] !!}</h2>
                                            </div>
                                            @endif
                                            @if($award['description'])
                                            <div class="content lg:pr-50 pr-0">
                                                <p>{!! $award['description'] !!}</p>
                                            </div>
                                            @endif
                                            @if($award['button'])
                                            <div class="link pt-20 inline-block">
                                                <a href="{!! $award['button']['url'] !!}" class="flex" target="{!! $award['button']['target'] !!}">
                                                    <div class="link-btn">
                                                        <span></span>
                                                    </div>
                                                    <span>{!! $award['button']['title'] !!}</span>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>     
                @php $tabCount = 1; @endphp
                @foreach ($content->tab as $tab)
                <div class="tab_content" data-tab="award-tab-{!! $tabCount !!}">
                    <div class="tabs-img-grid flex flex-wrap lg:mr-minus_15 md:mr-minus_15 mr-0">
                        @if($tab['award'])
                            @foreach ($tab['award'] as $award)
                            <div class="lg:w-3/12 md:w-6/12 w-full lg:pr-15 md:pr-15 pr-0">
                                <div class="tabs_container_bx lg:pt-80 pt-30">
                                    @if($award['image'])
                                    <div class="img">
                                        <img data-src="{!! $award['image']['url'] !!}" alt="{!! $award['image']['title'] !!}" class="lozad w-full">
                                    </div>
                                    @endif
                                    <div class="tabs-content-info pt-10">
                                        @if($award['heading'])
                                        <div class="title-black">
                                            <h2 class="h2">{!! $award['heading'] !!}</h2>
                                        </div>
                                        @endif
                                        @if($award['description'])
                                        <div class="content lg:pr-50 pr-0">
                                            <p>{!! $award['description'] !!}</p>
                                        </div>
                                        @endif
                                        @if($award['button'])
                                        <div class="link pt-20 inline-block">
                                            <a href="{!! $award['button']['url'] !!}" class="flex" target="{!! $award['button']['target'] !!}">
                                                <div class="link-btn">
                                                    <span></span>
                                                </div>
                                                <span>{!! $award['button']['title'] !!}</span>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>   
                @php $tabCount++; @endphp
                @endforeach        
            </div>
        </div>
    </div>
</section>
@endif