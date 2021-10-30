<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FluxContent extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'fluxContetData' => $this->fluxContetData(),
        ];
    }

    public function fluxContetData()
    {
        $data = [];
        $flexible_content = get_field('page_content');
        if($flexible_content){
            foreach($flexible_content as $content) {
                if($content['acf_fc_layout']=='video_banner'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'],
                        'button' => $content['button'],
                        'video_url' => $content['video_url'],
                        'description' => $content['description'],
                        'other_description' => $content['other_description'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='breadcrumb'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],
                        'breadcrumb_style' => $content['breadcrumb_style'],
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'button' => $content['button'],
                        'button_type' => $content['button_type'],
                        'other_button' => $content['other_button'],
                        'other_button_type' => $content['other_button_type'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='image_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],
                        'image_position' => $content['image_position'],
                        'image_size' => $content['image_size'],
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'button' => $content['button'],
                        'other_button' => $content['other_button'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='map_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'map' => $content['map'],
                        'map_position' => $content['map_position'],
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'button' => $content['button'],
                        'other_button' => $content['other_button'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='quote'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'description' => $content['description'],
                        'sub_heading' => $content['sub_heading'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='facility_details'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='gallery_slider'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'gallery' => $content['gallery'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='card_grid'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'card_type' => $content['card_type'],
                        'main_heading' => $content['main_heading'],
                        'card' => $content['card'],
                        'card_main_heading' => get_field('card_main_heading', 'options'),
                        'global_card' => get_field('global_card', 'options'),
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='card_slider'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'main_heading' => $content['main_heading'],
                        'card' => $content['card'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='award_tab'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'tab' => $content['tab'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='gallery_tab'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'tab' => $content['tab'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='general_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='contact_details'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'description' => $content['description'],
                        'other_description' => $content['other_description'],
                        'form_heading' => $content['form_heading'],
                        'form_shortcode' => $content['form_shortcode'],
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='stay_listing'){

                    $stay_final_array = array();
                    $stay_args = array(
                        'post_type' => 'stay',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    );
                    $stay_query = new \WP_Query(  $stay_args );

                    if($stay_query->have_posts()) {
                        while ( $stay_query->have_posts() ) : $stay_query->the_post();

                            $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                            if(get_the_post_thumbnail_url())
                            {
                                $fea_img = get_the_post_thumbnail_url();
                            }

                            $stay_final_array[] = array(
                                'title' => get_the_title(),
                                'fea_img' => $fea_img,
                                'gallery' => get_field('gallery'),
                                'excerpt' => get_the_excerpt(),
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'stay_data' => $stay_final_array,
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='itinerary_listing'){

                    $itinerary_final_array = array();
                    $itinerary_args = array(
                        'post_type' => 'itinerary',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    );
                    $itinerary_query = new \WP_Query(  $itinerary_args );

                    if($itinerary_query->have_posts()) {
                        while ( $itinerary_query->have_posts() ) : $itinerary_query->the_post();

                            $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                            if(get_the_post_thumbnail_url())
                            {
                                $fea_img = get_the_post_thumbnail_url();
                            }

                            $itinerary_final_array[] = array(
                                'title' => get_the_title(),
                                'fea_img' => $fea_img,
                                'pre_heading' => get_field('pre_heading'),
                                'excerpt' => get_the_excerpt(),
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'itinerary_data' => $itinerary_final_array,
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='events_listing'){

                    $special_event_final_array = array();
                    $special_event_args = array(
                        'post_type' => 'special_event',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    );
                    $special_event_query = new \WP_Query(  $special_event_args );

                    if($special_event_query->have_posts()) {
                        while ( $special_event_query->have_posts() ) : $special_event_query->the_post();

                            $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                            if(get_the_post_thumbnail_url())
                            {
                                $fea_img = get_the_post_thumbnail_url();
                            }

                            $special_event_final_array[] = array(
                                'title' => get_the_title(),
                                'fea_img' => $fea_img,
                                'pre_heading' => get_field('pre_heading'),
                                'excerpt' => get_the_excerpt(),
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'special_event_data' => $special_event_final_array,
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='offer_listing'){

                    $offer_final_array = array();
                    $offer_category = array();
                    $offer_category_list = get_terms([
                        'taxonomy' => 'offer_category',
                        'hide_empty' => false,
                    ]);

                    if($offer_category_list) {
                        foreach ( $offer_category_list as $offer_cat) {
                            $offer_category[] = array(
                                'title' => $offer_cat->name,
                                'slug' => $offer_cat->slug,
                                'id' => $offer_cat->term_id
                            );
                        }
                    }

                    $offer_args = array(
                        'post_type' => 'offer',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    );
                    $offer_query = new \WP_Query(  $offer_args );

                    if($offer_query->have_posts()) {
                        while ( $offer_query->have_posts() ) : $offer_query->the_post();

                            $fea_img = get_template_directory_uri().'/resources/images/login-bg.jpg';
                            if(get_the_post_thumbnail_url())
                            {
                                $fea_img = get_the_post_thumbnail_url();
                            }
                            $offer_name = '';
                            $offer_terms = get_the_terms( get_the_ID() , 'offer_category' );
                            if($offer_terms)
                            {
                                foreach ( $offer_terms as $offer_term ) {
                                    $offer_name = $offer_term->name;
                                }
                            }

                            $offer_final_array[] = array(
                                'title' => get_the_title(),
                                'fea_img' => $fea_img,
                                'offer_name' => $offer_name,
                                'excerpt' => get_the_excerpt(),
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'offer_data' => $offer_final_array,
                        'offer_category' => $offer_category,
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                else if($content['acf_fc_layout']=='experience_listing'){

                    $experience_category = array();
                    $experience_category_list = get_terms([
                        'taxonomy' => 'experience_category',
                        'hide_empty' => false,
                    ]);

                    if($experience_category_list) {
                        foreach ( $experience_category_list as $experience_cat) {
                            $experience_category[] = array(
                                'title' => $experience_cat->name,
                                'slug' => $experience_cat->slug,
                                'id' => $experience_cat->term_id
                            );
                        }
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'listing_type' => $content['listing_type'],
                        'heading' => $content['heading'],
                        'experience' => $content['experience'],
                        'experience_category' => $experience_category,
                        'extra_class' => $content['extra_class'],
                        'id' => $content['id']
                    ];
                    array_push($data, $this_content);
                }
                
            }
        }
        return $data;
    }
}