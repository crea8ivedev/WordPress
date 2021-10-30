<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
        'partials.header-travel',
        'partials.footer',
        'index',
        '404',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'headerLogo' => get_field('logo', 'option'),
            'menuBgImg' => get_field('menu_background_image', 'option'),
            'enquiryButton' => get_field('enquiry_button', 'option'),
            'enquiryContent' => get_field('enquiry_content', 'option'),
            'contactLink' => get_field('contact_link', 'option'),
            'instagramShortcode' => get_field('instagram_shortcode', 'option'),
            'instagramTitle' => get_field('instagram_title', 'options'),
            'instagramDescription' => get_field('instagram_description', 'options'),
            'nlTitle' => get_field('newsletter_title', 'option'),
            'nlShortcode' => get_field('newsletter_shortcode', 'option'),
            'footerLogo' => get_field('footer_logo', 'option'),
            'copyrightImage' => get_field('copyright_image', 'options'),
            'copyrightURL' => get_field('copyright_url', 'options'),
            'socialMedia' => get_field('social_media', 'options'),
            'footerContactDetails' => get_field('footer_contact_details', 'options'),
            'bannerBackgroundImage' => get_field('banner_background_image', 'options'),
            'bannerPreHeading' => get_field('banner_pre_heading', 'options'),
            'bannerHeading' => get_field('banner_heading', 'options'),
            'bannerButton' => get_field('banner_button', 'options'),
            'bannerDescription' => get_field('banner_description', 'options'),
            'blogGallery' => get_field('blog_gallery', 'options'),
            'blogCategories' => get_categories(array('hide_empty' => true)),
        ];
    }
}
