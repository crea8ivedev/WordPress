@if (isset($content->offer_data) && $content->offer_data)
    <section class="tabs-img-grid lg:pt-100 pt-50 {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
        <div class="container">
            <div class="tabs_wrapper">
                <ul class="tabs lg:pl-80 pl-0 wow fadeInUp" data-wow-delay="0.2s">
                    <li class="active" id="offer-tab-all">All</li>
                    @if ($content->offer_category)
                        @foreach ($content->offer_category as $offer_cat)
                            <li id="offer-tab-{!! $offer_cat['slug'] !!}">{!! $offer_cat['title'] !!}</li>
                        @endforeach
                    @endif
                </ul>
                <div class="tabs_container">
                    <div class="tab_content active" data-tab="offer-tab-all">
                        <div class="flex flex-wrap lg:mr-minus_20 mr-0">
                            @foreach ($content->offer_data as $offer)
                                <div class="lg:w-6/12 w-full lg:pr-20 pr-0 lg:mb-150 mb-50 wow fadeInUp"
                                    data-wow-delay="0.4s">
                                    <div class="tabs_container_bx">
                                        <div class="img relative">
                                            <img data-src="{!! $offer['fea_img'] !!}" alt="{!! $offer['title'] !!}"
                                                class="lozad w-full">
                                            @if ($offer['offer_name'])
                                                <div class="absolute bottom-0 left-0 px-30 py-5 bg-black2"><span
                                                        class="text-white font-heading text-15 tracking-0.05 font-normal">{!! $offer['offer_name'] !!}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tabs-content-info wow fadeInUp" data-wow-delay="0.6s">
                                            <div class="title-black2">
                                                <h2 class="h2">{!! $offer['title'] !!}</h2>
                                            </div>
                                            @if ($offer['excerpt'])
                                                <div class="content">
                                                    <p>{!! $offer['excerpt'] !!}</p>
                                                </div>
                                            @endif
                                            <div class="link pt-20 inline-block">
                                                <a href="{!! $offer['url'] !!}" class="flex">
                                                    <div class="link-btn">
                                                        <span></span>
                                                    </div>
                                                    <span>Explore</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    @if ($content->offer_category)
                    @foreach ($content->offer_category as $offer_cat)
                    <?php 
                        $offer_args = array(
                            'post_type' => 'offer',
                            'posts_per_page' => '-1',
                            'post_status' => 'publish',
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'offer_category',
                                    'field'    => 'slug',
                                    'terms'    => $offer_cat['slug'],
                                ),
                            ),
                        );
                        $offer_query = new \WP_Query(  $offer_args );
                    ?>
                    @if($offer_query->have_posts()) 
                    <div class="tab_content" data-tab="offer-tab-{!! $offer_cat['slug'] !!}">
                        <div class="flex flex-wrap mr-minus_20">
                            <?php 
                                while ( $offer_query->have_posts() ) : $offer_query->the_post(); 
                                $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                                if(get_the_post_thumbnail_url())
                                {
                                    $fea_img = get_the_post_thumbnail_url();
                                }
                            ?>
                            <div class="lg:w-6/12 w-full lg:pr-20 pr-0 lg:mb-150 mb-50">
                                <div class="tabs_container_bx">
                                    <div class="img relative">
                                        <img data-src="{!! $fea_img !!}" alt="{!! get_the_title() !!}"
                                            class="lozad w-full">
                                        <div class="absolute bottom-0 left-0 px-30 py-5 bg-black2"><span
                                                class="text-white font-heading text-15 tracking-0.05 font-normal">{!!  $offer_cat['title'] !!}</span>
                                        </div>
                                    </div>
                                    <div class="tabs-content-info wow fadeInUp" data-wow-delay="0.2s">
                                        <div class="title-black2">
                                            <h2 class="h2">{!! get_the_title() !!}</h2>
                                        </div>
                                        <div class="content">
                                            <p>{!! get_the_excerpt() !!}</p>
                                        </div>
                                        <div class="link pt-20 inline-block">
                                            <a href="{!! get_the_permalink() !!}" class="flex">
                                                <div class="link-btn">
                                                    <span></span>
                                                </div>
                                                <span>Explore</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?> 
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
@endif
