@if($content->listing_type == 'all')
    @if(isset($content->experience_category) && $content->experience_category)
    <div class="exp-listing {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
        
        @foreach ($content->experience_category as $exp_cat)
        <?php 
            $experience_args = array(
                'post_type' => 'experience',
                'posts_per_page' => '-1',
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'experience_category',
                        'field'    => 'slug',
                        'terms'    => $exp_cat['slug'],
                    ),
                ),
            );
            $experience_query = new \WP_Query(  $experience_args );
            if($experience_query->have_posts()) {
        ?>
        <section class="image-slider lg:py-150 py-50">
            <div class="container">
                <div class="title-black lg:pl-80 pl-0">
                    <h2 class="h1">{!! $exp_cat['title'] !!}</h2>
                </div>
                <div class="image-slider-block lg:pt-60 pt-50">
                    <div class="instagram-slider-inner top-arrow default-arrow arrow-down" data-slick='{ "slidesToShow": 2, "infinite": false, "fade": false, "arrows": true, "speed": 2000, "dots": false,
                                "responsive": [ 
                                {
                                    "breakpoint": 992, 
                                    "settings": {
                                        "slidesToShow": 2, 
                                        "slidesToScroll": 1
                                    }
                                }, 
                                {
                                    "breakpoint": 768, 
                                    "settings": {
                                        "slidesToShow": 1, 
                                        "slidesToScroll": 1,
                                        "autoplay": false,
                                        "speed": 1500
                                    }
                                }
                                ]
                            }'>
                        <?php 
                            while ( $experience_query->have_posts() ) : $experience_query->the_post(); 
                            $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                            if(get_the_post_thumbnail_url())
                            {
                                $fea_img = get_the_post_thumbnail_url();
                            }
                        ?>
                        <div class="image-slider-item !block">
                            <div class="img wow fadeInUp" data-wow-delay="0.2s">
                                <img src="{!! $fea_img !!}" class="w-full block object-cover" alt="{!! get_the_title() !!}">
                            </div>
                            <div class="image-slider-item-info lg:pt-50 pt-30 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="title-black">
                                    <h2 class="h2">{!! get_the_title() !!}</h2>
                                </div>
                                <div class="content">
                                    <p>{!! get_the_excerpt() !!}</p>
                                </div>
                                <div class="link pt-20 inline-block" data-wow-delay="0.8s">
                                    <a data-fancybox data-src="#exp-{{ $exp_cat['slug'] }}-{!! get_post_field( 'post_name', get_post() ) !!}" href="#0"  class="flex outline-none">
                                        <div class="link-btn">
                                            <span></span>
                                        </div>
                                        <span>Explore</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        @endforeach
    </div>
    @foreach ($content->experience_category as $exp_cat)
        <?php 
            $experience_args = array(
                'post_type' => 'experience',
                'posts_per_page' => '-1',
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'experience_category',
                        'field'    => 'slug',
                        'terms'    => $exp_cat['slug'],
                    ),
                ),
            );
            $experience_query = new \WP_Query(  $experience_args );
            if($experience_query->have_posts()) {
                while ( $experience_query->have_posts() ) : $experience_query->the_post(); 
                $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                if(get_the_post_thumbnail_url())
                {
                    $fea_img = get_the_post_thumbnail_url();
                }
        ?>
        <div style="display: none;" id="exp-{{ $exp_cat['slug'] }}-{!! get_post_field( 'post_name', get_post() ) !!}" class="experience-modal-popup default-modal">
            <div class="container">
                <div class="lg:w-10/12 w-full m-auto">
                    <div class="modal-popup-inner">
                        <div class="flex flex-wrap items-center">
                            <div class="lg:w-6/12 w-full">
                                <div class="modal-img h-full">
                                    <img src="{!! $fea_img !!}" alt="{!! get_the_title() !!}" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div class="lg:w-6/12 w-full">
                                <div class="modal-content flex flex-wrap justify-center h-full lg:py-100 py-50 lg:px-80 px-50">
                                    <div class="modal-content-top">
                                        <div class="title-black">
                                            <h2 class="h2">{!! get_the_title() !!}</h2>
                                        </div>
                                        <div class="content lg:pr-150 pr-0 mt-20">
                                            <p>{!! get_the_content() !!}</p>
                                        </div>
                                        <div class="link pt-30 inline-block">
                                            <a href="{!! esc_url(home_url('/reservation-enquiry/')) !!}" class="flex">
                                                <div class="link-btn">
                                                    <span></span>
                                                </div>
                                                <span>Make an enquiry</span>
                                            </a>
                                        </div> 
                                    </div>                                                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
                endwhile; wp_reset_postdata();
            }
        ?>
    @endforeach
    @endif
@else
    @if(isset($content->experience) && $content->experience)
    <div class="exp-listing {!! $content->extra_class !!}" @if($content->id) id="{{ $content->id }}" @endif>
        <section class="image-slider lg:py-150 py-50">
            <div class="container">
                @if($content->heading)
                <div class="title-black lg:pl-80 pl-0">
                    <h2 class="h1">{!! $content->heading !!}</h2>
                </div>
                @endif
                <div class="image-slider-block lg:pt-60 pt-50">
                    <div class="instagram-slider-inner top-arrow default-arrow arrow-down" data-slick='{ "slidesToShow": 2, "infinite": false, "fade": false, "arrows": true, "speed": 2000, "dots": false,
                                "responsive": [ 
                                {
                                    "breakpoint": 992, 
                                    "settings": {
                                        "slidesToShow": 2, 
                                        "slidesToScroll": 1
                                    }
                                }, 
                                {
                                    "breakpoint": 768, 
                                    "settings": {
                                        "slidesToShow": 1, 
                                        "slidesToScroll": 1,
                                        "autoplay": false,
                                        "speed": 1500
                                    }
                                }
                                ]
                            }'>
                        <?php 
                            foreach ($content->experience as $experience) {
                                $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                                if(get_the_post_thumbnail_url($experience))
                                {
                                    $fea_img = get_the_post_thumbnail_url($experience);
                                }
                        ?>
                        <div class="image-slider-item !block">
                            <div class="img wow fadeInUp" data-wow-delay="0.2s">
                                <img src="{!! $fea_img !!}" class="w-full block object-cover" alt="{!! get_the_title($experience) !!}">
                            </div>
                            <div class="image-slider-item-info lg:pt-50 pt-30 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="title-black">
                                    <h2 class="h2">{!! get_the_title($experience) !!}</h2>
                                </div>
                                <div class="content">
                                    <p>{!! get_the_excerpt($experience) !!}</p>
                                </div>
                                <div class="link pt-20 inline-block" data-wow-delay="0.8s">
                                    <a data-fancybox data-src="#exp-{!! get_post_field( 'post_name', get_post($experience) ) !!}" href="#0"  class="flex outline-none">
                                        <div class="link-btn">
                                            <span></span>
                                        </div>
                                        <span>Explore</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @foreach ($content->experience as $experience)
    <?php
        $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
        if(get_the_post_thumbnail_url($experience))
        {
            $fea_img = get_the_post_thumbnail_url($experience);
        }
    ?>
    <div style="display: none;" id="exp-{!! get_post_field( 'post_name', get_post($experience) ) !!}" class="experience-modal-popup default-modal">
        <div class="container">
            <div class="lg:w-10/12 w-full m-auto">
                <div class="modal-popup-inner">
                    <div class="flex flex-wrap items-center">
                        <div class="lg:w-6/12 w-full">
                            <div class="modal-img h-full">
                                <img src="{!! $fea_img !!}" alt="{!! get_the_title($experience) !!}" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="lg:w-6/12 w-full">
                            <div class="modal-content flex flex-wrap justify-center h-full lg:py-100 py-50 lg:px-80 px-50">
                                <div class="modal-content-top">
                                    <div class="title-black">
                                        <h2 class="h2">{!! get_the_title($experience) !!}</h2>
                                    </div>
                                    <div class="content lg:pr-150 pr-0 mt-20">
                                        <p>{!! get_post_field('post_content', $experience) !!}</p>
                                    </div>
                                    <div class="link pt-30 inline-block">
                                        <a href="{!! esc_url(home_url('/reservation-enquiry/')) !!}" class="flex">
                                            <div class="link-btn">
                                                <span></span>
                                            </div>
                                            <span>Make an enquiry</span>
                                        </a>
                                    </div> 
                                </div>                                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    @endif

@endif