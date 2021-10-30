@extends('layouts.app')

@section('content')
    @if($bannerBackgroundImage )
    <section class="banner relative">
        <div class="banner-top">
            <div class="container">
                <div class="banner-img relative z-9 h-700 bg-cover lozad" data-background-image="{!! $bannerBackgroundImage['url'] !!}">
                </div>
            </div>
        </div>
        @if($bannerPreHeading || $bannerHeading || $bannerButton || $bannerDescription)
        <div class="banner-info relative z-9 bg-lightyellow">
            <div class="container">
                <div class="banner-info-inner lg:py-150 lg:px-80 px-0">
                    <div class="title title-black wow fadeInUp" data-wow-delay="0.4s">
                    <?php
                        $is_cat = '0';
                        $is_cat_slug = '';
                        if (is_category()) {
                            $is_cat = '1';
                            $activecategory = get_queried_object();
                            $is_cat_slug = $activecategory->slug;
                            echo '<h6 class="h6">Category</h6>';
                            echo '<h1 class="h1 banner-title text-white">' . $activecategory->name . '</h1>';
                        } elseif (is_author()) {
                            $author = get_user_by('slug', get_query_var('author_name'));
                            echo '<h6 class="h6">Author</h6>';
                            echo '<h1 class="h1 banner-title text-white">' . $author->display_name . '</h1>';
                        } elseif (is_archive()) {
                            $year = get_query_var('year');
                            $monthNum = get_query_var('monthnum');
                            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('F');
                            echo '<h6 class="h6">Archive</h6>';
                            echo '<h1 class="h1 banner-title text-white">' . $monthName . ' ' . $year . '</h1>';
                        } elseif (is_search()) {
                            $search_by = get_query_var('s');
                            echo '<h6 class="h6">Search</h6>';
                            echo '<h1 class="h1 banner-title text-white">' . $search_by . '</h1>';
                        } else {
                            if($bannerPreHeading) {
                                echo '<h6 class="h6">'.$bannerPreHeading.'</h6>';
                            }
                            echo '<h1 class="h1 banner-title text-white">' . $bannerHeading . '</h1>';
                        }
                    ?>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10 lg:gap-24 gap-y-0">
                        @if(isset($bannerDescription) && $bannerDescription)
                        <div class="content wow fadeInUp" data-wow-delay="0.4s">
                            {!! $bannerDescription !!}
                        </div>
                        @endif
                        
                    </div>
                    @if($bannerButton && is_home())
                    <div class="link wow fadeInUp pt-30 inline-block" data-wow-delay="0.8s">
                        <a href="{!! $bannerButton['url'] !!}" class="flex" target="{!! $bannerButton['target'] !!}">
                            <div class="link-btn">
                                <span></span>
                            </div>
                            <span>{!! $bannerButton['title'] !!}</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </section>
    @endif

    <section class="tabs-img-grid @if (!is_search()) lg:pt-100 pt-50 @endif">
        <div class="container">
            <div class="tabs_wrapper">
                @if (!is_search())
                <ul class="tabs lg:pl-80 pl-0 wow fadeInUp" data-wow-delay="0.2s">
                    <li class="@if($is_cat == '0') active @endif flex flex-wrap" >
                        <a href="{{ get_permalink( get_option( 'page_for_posts' ) ) }}">All</a>
                    </li>
                    @if($blogCategories)
                    @foreach($blogCategories as $blogCat)
                    <li class="@if($is_cat_slug == $blogCat->slug) active @endif flex flex-wrap"><a href="{{ get_category_link($blogCat) }}">{!! $blogCat->name !!}</a></li>
                    @endforeach
                    @endif
                </ul>
                @endif

                <input type="hidden" id="ppp" value="{!! get_option( 'posts_per_page' ) !!}">
                <?php
                    if(is_category())
                    {
                        $activecategory = get_queried_object();
                        $activecat_id = $activecategory->term_id;
                        echo '<input type="hidden" id="activecat_id" value="'.$activecat_id.'">';
                    }
                    if (is_author()) {
                        $author = get_user_by('slug', get_query_var('author_name'));
                        $authorId = $author->ID;
                        echo '<input type="hidden" id="activeauthor_id" value="'.$authorId.'">';
                    }
                    if (is_search()) {
                        $search_by = get_query_var('s');
                        echo '<input type="hidden" id="search_by" value="'.$search_by.'">';
                    }
                ?>

                <div class="tabs_container">
                    <div class="tab_content active">
                        
                        <div class="flex flex-wrap mr-minus_20" id="post-list-div"></div>
                        
                        <div class="text-center w-full lg:pb-150 pb-50" id="post-lm-btn" style="display: none;">
                            <a href="javascript:void(0)" class="button button-outline button-black">Load More</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($blogGallery)
    <section class="galler-wrapper bg-lightyellow lg:pt-100 lg:pb-30 pt-50 pb-30">
        <div class="container">
            <div class="gallery-slider default-arrow arrow-down" data-slick='{ "slidesToShow": 1, "infinite": true, "fade": true, "arrows": true, "speed": 1000, "dots": true }'>
                @foreach ($blogGallery as $gallery)
                <div class="gallery-slider-item !block">
                    <img src="{!! $gallery['image']['url'] !!}" class="w-full block object-cover lg:h-700 md:h-450 h-350" alt="{!! $gallery['image']['title'] !!}">
                    @if(isset($gallery['heading']) && $gallery['heading'])
                    <span>{!! $gallery['heading'] !!}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="img-grid-content lg:py-150 py-50">
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

    
@endsection


