<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Run The Theme
|--------------------------------------------------------------------------
|
| Once we have the theme booted, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/bootstrap/app.php';

/*** Admin Login ***/
function login_logo(){
    echo '<style type="text/css">
        #login { padding: 10% 0 0; position: relative; z-index: 9;}
        body{background-image: url('.get_bloginfo('template_directory') .'/resources/images/login-bg.jpg) !important;background-size: cover !important; position: relative; background-position: 45%; background-repeat: no-repeat; }
        body::before { content: ""; position: absolute; left: 0; top: 0; width: 100%; height: 100%;background: linear-gradient(180deg, #ffffff 0%, rgba(0, 0, 0, 0) 100%); opacity: 0.8; }
        p a{color:#ffffff;}
        .privacy-policy-page-link a{color:#ffffff;}
        h1 a{background-image: url('.get_bloginfo('template_directory') .'/resources/images/logo.png) !important;background-size: 75% !important; width:100% !important;margin: 0 auto !important; box-shadow: none !important; height: 70px !important;}
        #nav a{color:#ffffff !important;}
        #backtoblog a{color:#ffffff !important;}
        .wp-core-ui .button-primary {
            background: #535335;
            border-color: #535335;
            color: #ffffff;
            text-decoration: none;
            text-shadow: none;
        }.wp-core-ui .button-secondary {
            color: #002158;}
        .wp-core-ui .button-primary:hover {
            background: #ffffff;
            border-color: #535335;
            color: #535335;
        }input[type=password]:focus,input[type=text]:focus,input[type=checkbox]:focus{border-color: #535335;
            box-shadow: 0 0 0 1px #535335;
            outline: 2px solid transparent;}
        </style>';
}
add_action('login_head','login_logo');

function my_login_logo_url() {
    return esc_url( home_url( '/' ) );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function override_mce_options($initArray) 
{
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');

function custom_excerpt_more($more) {
   global $post;
   return '…';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : '5';
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $activecat_id = (isset($_POST['activecat_id'])) ? $_POST['activecat_id'] : '';
    $activeauthor_id = (isset($_POST['activeauthor_id'])) ? $_POST['activeauthor_id'] : '';
    $search_by = (isset($_POST['search_by'])) ? $_POST['search_by'] : '';
    $load_more = 0;

    header("Content-Type: text/html");

    $ajax_main_args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    if($activecat_id != 'undefined') {
        $ajax_main_args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $activecat_id
            )
        ); 
    }
    
    if($activeauthor_id != 'undefined') {
        $ajax_main_args['author__in'] = $activeauthor_id;
    }
    
    if($search_by != 'undefined') {
        $ajax_main_args['s'] = $search_by;
    }
    
    $main_loop = new WP_Query($ajax_main_args);
    $total_posts = $main_loop->post_count;

    if($total_posts > ($ppp*$page)) {
        $load_more = 1;
    }

    $lm_post_args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
    );

    if($activecat_id != 'undefined') {
        $lm_post_args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $activecat_id
            )
        ); 
    }

    if($activeauthor_id != 'undefined') {
        $lm_post_args['author__in'] = $activeauthor_id;
    }

    if($search_by != 'undefined') {
        $lm_post_args['s'] = $search_by;
    }

    $loop = new WP_Query($lm_post_args);

    $out = '';
    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();

        $de_img = get_template_directory_uri().'/resources/images/login-bg.jpg';

        if(get_the_post_thumbnail_url()) {
            $de_img = get_the_post_thumbnail_url();
        }

        $out .= '<div class="lg:w-6/12 w-full lg:pr-20 pr-0 lg:mb-150 mb-50">
                    <div class="tabs_container_bx">
                        <div class="img">
                            <img src="'.$de_img.'" alt="'.get_the_title().'" class="lozad w-full">
                        </div>
                        <div class="tabs-content-info">
                            <div class="title-black">
                                <h6 class="h6">Stays</h6>
                                <h2 class="h2">'.get_the_title().'</h2>
                            </div>
                            <div class="content">
                                <p>'.get_the_excerpt().'</p>
                            </div>
                            <div class="link pt-20 inline-block">
                                <a href="'.get_the_permalink().'" class="flex">
                                    <div class="link-btn">
                                        <span></span>
                                    </div>
                                    <span>Read more</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    $respo_array = json_encode(array('load_more' => $load_more, 'result' => $out));
    die($respo_array);
}