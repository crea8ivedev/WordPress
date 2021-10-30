@if(isset($content->tab) && $content->tab)
<section class="gallery-tabs tabs-grid lg:pt-150 pt-50 pb-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
    <div class="container">
        <div class="tabs_wrapper">
            <ul class="tabs lg:pl-80 pl-0 lg:mb-30 wow fadeInUp" data-wow-delay="0.2s">
                <li class="active" id="gallery-tab-all">All</li>
                @php $galleryCount = 1; @endphp
                @foreach ($content->tab as $tab)
                <li id="gallery-tab-{!! $galleryCount !!}">{!! $tab['heading'] !!}</li>
                @php $galleryCount++; @endphp
                @endforeach
            </ul>
            <div class="tabs_container lg:pt-80 pt-30 wow fadeInUp" data-wow-delay="0.2s">
                <div class="tab_content active" data-tab="gallery-tab-all">
                    <div class="tabs-img-grid tabs-img-grid-all flex flex-wrap lg:mr-minus_15 md:mr-minus_15 mr-0">
                        @foreach ($content->tab as $tab)
                            @if($tab['gallery'])
                                @foreach ($tab['gallery'] as $gallery)
                                <div class="lg:w-6/12 md:w-6/12 w-full lg:pr-15 md:pr-15 pr-0  tabs-md">
                                    <div class="img gal-img hidden mb-15">
                                        <a data-fancybox="gallery-all" data-src="{!! $gallery['url'] !!}">
                                            <img src="{!! $gallery['url'] !!}" alt="{!! $gallery['title'] !!}" class="w-full" >
                                        </a>                                                                                                          
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        @endforeach
                        <div class="load-more w-full text-center mt-15">
                            <a class="button" href="javascript:void(0)" id="loadmoreall">Load More</a>
                        </div>
                        <script>
                            jQuery(".tabs-img-grid-all .gal-img").slice(0,8).show();
                            if(jQuery(".tabs-img-grid-all .gal-img").length <= 8) {
                                jQuery("#loadmoreall").hide();
                            }
                            jQuery("#loadmoreall").click(function(e){
                                e.preventDefault();
                                jQuery(".tabs-img-grid-all .gal-img:hidden").slice(0,8).fadeIn("slow");
                                
                                if(jQuery(".tabs-img-grid-all .gal-img:hidden").length == 0){
                                    jQuery("#loadmoreall").hide();
                                }
                            });
                        </script>
                    </div>
                </div>    
                @php $galleryCount = 1; @endphp
                @foreach ($content->tab as $tab)
                <div class="tab_content" data-tab="gallery-tab-{!! $galleryCount !!}">
                    <div class="tabs-img-grid tabs-img-grid-{!! $galleryCount !!} flex flex-wrap lg:mr-minus_15 md:mr-minus_15 mr-0">
                        @if($tab['gallery'])
                            @foreach ($tab['gallery'] as $gallery)
                            <div class="lg:w-6/12 md:w-6/12 w-full lg:pr-15 md:pr-15 pr-0 tabs-md">
                                <div class="img gal-img hidden mb-15">
                                    <a data-fancybox="gallery-{!! $galleryCount !!}" data-src="{!! $gallery['url'] !!}">
                                        <img src="{!! $gallery['url'] !!}" alt="{!! $gallery['title'] !!}" class="w-full" >
                                    </a>                                                                                                          
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="load-more w-full text-center mt-15">
                        <a class="button" href="javascript:void(0)" id="loadmore-{!! $galleryCount !!}">Load More</a>
                    </div>
                    <script>
                        jQuery(".tabs-img-grid-{!! $galleryCount !!} .gal-img").slice(0,8).show();
                        if(jQuery(".tabs-img-grid-{!! $galleryCount !!} .gal-img").length <= 8) {
                            jQuery("#loadmore-{!! $galleryCount !!}").hide();
                        }
                        jQuery("#loadmore-{!! $galleryCount !!}").click(function(e){
                            e.preventDefault();
                            jQuery(".tabs-img-grid-{!! $galleryCount !!} .gal-img:hidden").slice(0,8).fadeIn("slow");
                            
                            if(jQuery(".tabs-img-grid-{!! $galleryCount !!} .gal-img:hidden").length == 0){
                                jQuery("#loadmore-{!! $galleryCount !!}").hide();
                            }
                        });
                    </script>
                </div>  
                
                @php $galleryCount++; @endphp
                @endforeach       
            </div>
        </div>
    </div>
</section>
@endif