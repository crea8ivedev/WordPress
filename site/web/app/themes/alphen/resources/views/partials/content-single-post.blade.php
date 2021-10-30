<?php
$fea_img = get_template_directory_uri() . '/resources/images/blog-bg.jpg';
if (get_the_post_thumbnail_url()) {
    $fea_img = get_the_post_thumbnail_url();
}
?>
<section class="inner-banner">
    <div class="container">
        <div class="inner-banner-row bg-lightyellow">
            <div class="flex flex-wrap items-center">
                <div class="lg:w-6/12 w-full lg:order-2">
                    <div class="inner-banner-img">
                        <img data-src="{!! $fea_img !!}" alt="{!! get_the_title() !!}" class="lozad w-full block">
                    </div>
                </div>
                <div class="lg:w-6/12 w-full">
                    <div class="inner-banner-left lg:pl-100 lg:pr-200 pl-50 pr-50 py-50 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="title-black">
                            <h6 class="h6">Blog</h6>
                            <h2 class="h2">{!! get_the_title() !!}</h2>
                        </div>      
                        <div class="content">
                            <span class="font-heading text-14 text-black2 font-normal mt-20 inline-block">Written by {!! get_the_author_meta('nickname') !!}</span>
                        </div>                      
                    </div>
                </div>
                
            </div>
        </div>            
    </div>
</section>

<section class="general-content lg:py-100 py-50">
    <div class="container lg:px-80 px-0">
        <div class="flex flex-wrap">
            <div class="w-full">                    
                <div class="content global-list">
                    {!! the_content() !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="img-grid-content lg:pb-150 pb-50">
    <div class="container">
        <?php 
            $card_main_heading = get_field('card_main_heading', 'option');
            $cards =  get_field('global_card', 'option');
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