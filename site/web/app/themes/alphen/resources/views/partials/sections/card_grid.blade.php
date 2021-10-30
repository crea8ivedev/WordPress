@if(isset($content->card_type) && $content->card_type)
<section class="img-grid-content lg:py-150 py-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <?php 
            $card_main_heading = $content->card_main_heading;
            $cards = $content->global_card;
            if($content->card_type == 'custom') {
                $card_main_heading = $content->main_heading;
                $cards = $content->card;
            }
        ?>
        @if($card_main_heading)
        <div class="title-black wow fadeInUp" data-wow-delay="0.2s">
            <h2 class="h1">{!! $card_main_heading !!}</h2>
        </div>
        @endif
        @if($cards)
        <div class="img-grid-content-inner relative">
            <div class="flex flex-wrap relative mx-minus_10">
                
                @foreach ($cards as $card)
                <div class="md:w-4/12 w-full px-10 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="img-grid-bx lg:mt-50 mt-20 relative">
                        @if($card['image'])
                        <div class="img overflow-hidden relative">
                            <img data-src="{!! $card['image']['url'] !!}" alt="{!! $card['image']['title'] !!}" class="lozad w-full object-cover">
                        </div>
                        @endif
                        <div class="caption-text text-center">
                            <div class="title-white">
                                @if($card['heading'])
                                <h2 class="h2">{!! $card['heading'] !!}</h2>
                                @endif
                                <div class="line-pattern">
                                    <img src="@asset('images/line-pattern.svg')" alt="line-pattern" class="m-auto">
                                </div>
                            </div>
                            <div class="content">
                                @if($card['description'])
                                <p>{!! $card['description'] !!}</p>
                                @endif
                                @if($card['button'])
                                <div class="btn-custom">
                                    <a href="{!! $card['button']['url'] !!}" class="button button-outline button-white" target="{!! $card['button']['target'] !!}">
                                        {!! $card['button']['title'] !!}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        @endif
    </div>
</section>
@endif