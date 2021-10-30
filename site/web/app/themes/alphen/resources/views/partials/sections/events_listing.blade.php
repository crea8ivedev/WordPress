@if(isset($content->special_event_data) && $content->special_event_data)
<div class="event-listing {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    @php $eventCount = 1; @endphp
    @foreach ($content->special_event_data as $event)
        <section class="zigzag lg:pt-150 pt-50 img-portrait">
            <div class="container">
                <div class="zigzag-inner flex flex-wrap items-center">

                    @if(isset($event['fea_img']) && $event['fea_img'])
                    <div class="lg:w-6/12 w-full @if($eventCount%2 != '0') lg:order-2 order-1 @endif">
                        <div class="zigzag-image lg:pt-0 wow fadeInUp" data-wow-delay="0.2s">
                            <img data-src="{!! $event['fea_img'] !!}" alt="{!! $event['title'] !!}" class="lozad w-full">
                        </div>
                    </div>
                    @endif

                    <div class="lg:w-6/12 w-full @if($eventCount%2 != '0') lg:order-1 order-2 @endif">
                        <div class="zigzag-content lg:pt-0 pt-30 @if($eventCount%2 != '0') lg:pr-120 lg:pl-50 @else lg:pl-120 lg:pr-50 @endif">
                            <div class="title-black wow fadeInUp" data-wow-delay="0.4s">
                                <h6 class="h6">Special Events</h6>
                                <h2 class="h2">{!! $event['title'] !!}</h2>
                            </div>
                            <div class="content lg:pt-20 pt-10 wow fadeInUp" data-wow-delay="0.6s">
                                <p>{!! $event['excerpt'] !!}</p>
                            </div>
                            <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                                <a href="{!! $event['url'] !!}" class="flex">
                                    <div class="link-btn">
                                        <span></span>
                                    </div>
                                    <span>Explore</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @php $eventCount++; @endphp
    @endforeach
</div>
@endif