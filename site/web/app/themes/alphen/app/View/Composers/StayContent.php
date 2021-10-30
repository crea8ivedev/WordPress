<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class StayContent extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-stay',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'stayContetData' => $this->stayContetData(),
        ];
    }

    public function stayContetData()
    {
        $data = [];
        $flexible_content = get_field('stay_content');
        if($flexible_content){
            foreach($flexible_content as $content) {
                if($content['acf_fc_layout']=='video_banner'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],
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
                else if($content['acf_fc_layout']=='image_tab_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],
                        'image_position' => $content['image_position'],
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'],
                        'tab' => $content['tab'],
                        'price' => $content['price'],
                        'button' => $content['button'],
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
                else if($content['acf_fc_layout']=='other_stay'){

                    $stay_final_array = array();
                    $stay_args = array(
                        'post_type' => 'stay',
                        'posts_per_page' => '-1',
                        'post__not_in' => array(get_the_ID()),
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
                                'excerpt' => get_the_excerpt(),
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'stay_data' => $stay_final_array,
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