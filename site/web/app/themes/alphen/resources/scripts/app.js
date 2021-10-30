/**
 * External Dependencies
 */
import 'jquery';
import 'lity';
import lozad from 'lozad';
import slick from 'slick-carousel';
import { WOW } from 'wowjs';
import { gsap, Power2, ScrollTrigger } from 'gsap/all';
import { each } from 'jquery';

$(() => {
    // console.log('Hello world');
    var wow = new WOW({
        live: false
    });
    wow.init();

    const observer = lozad();
    observer.observe();

    gsap.install(window);

    gsap.registerPlugin(ScrollTrigger);

    var appHeight = () => {
        var doc = document.documentElement
        doc.style.setProperty('--app-height', `${window.innerHeight}px`)
    }
    window.addEventListener('resize', appHeight)
    appHeight();

    if ($('[data-slick]').length) {
        $('[data-slick]').slick();
    }

    // Menu Start //
    function menuOpen() {
        $('body').addClass('menu-open');
        $('.hamburger').addClass('active');
        $('.navbar-nav').addClass('menuhide');
    }
    function menuClose() {
        $('body').removeClass('menu-open');
        $('.hamburger').removeClass('active');
        $('.navbar-nav').removeClass('menuhide');
    }

    /** Menu **/
    let t1 = gsap.timeline({
        paused: true,
        onStart: menuOpen,
        onReverseComplete: menuClose,
    });

    t1.to(".nav-container", {
        duration: 0.8,
        clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
        right: 0,
        ease: "Power3.InOut",
    });

    t1.from(".leftMenu  ", {
        stagger: 0.05,
        opacity: 0,
        y: 20,
        ease: "Power3.InOut",
    }, "-=0");
    t1.from(".mainNav__col--right ul", {
        stagger: 0.05,
        opacity: 0,
        y: 20,
        ease: "Power3.InOut",
    }, "-=0");

    t1.reverse();

    $('.menu-open-test').on('click', function () {
        t1.reversed(!t1.reversed());
    });

    // Menu End //

    $(".signup-title").click(function () {
        var $header = $(this);
        //getting the next element
        $header.toggleClass('title-active');
        var $content = $header.next('.gform_wrapper');
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(500, function () {
            //execute this after slideToggle is done
            //change text of header based on visibility of content div
        });

    });

    // Tabs Start
    $('ul.tabs li').click(function () {
        var $this = $(this);
        var $theTab = $(this).attr('id');
        if ($this.hasClass('active')) {
            // do nothing
        } else {
            $this.closest('.tabs_wrapper').find('ul.tabs li, .tabs_container .tab_content').removeClass('active');
            $('.tabs_container .tab_content[data-tab="' + $theTab + '"], ul.tabs li[id="' + $theTab + '"]').addClass('active');
        }
    });

    // load more posts 
    if ($('#post-list-div').length) {
        var ppp = $('#ppp').val();
        var pageNumber = 0;
        loadmore_posts();
    }

    $('body').on('click', '#post-lm-btn a', function () {
        loadmore_posts();
    });

    function loadmore_posts() {
        pageNumber++;
        var activecat_id = '';
        var activeauthor_id = '';
        var search_by = '';
        if ($('#ppp').length) {
            activecat_id = $('#activecat_id').val();
            activeauthor_id = $('#activeauthor_id').val();
            search_by = $('#search_by').val();
        }
        $("#post-lm-btn a").text('Loading...');
        var str = '&search_by=' + search_by + '&activecat_id=' + activecat_id + '&activeauthor_id=' + activeauthor_id + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_object.ajaxurl,
            data: str,
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data['result'] != '') {
                    $("#post-list-div").append($data['result']);
                } else {
                    $("#post-list-div").html('<h2 class="lg:pb-80 pb-50 h2 text-center w-full">No post found</h2>');
                }
                if (($data['load_more'] == '1') && ppp != '-1') {
                    $("#post-lm-btn a").text('Load More');
                    $("#post-lm-btn").show();
                } else {
                    $("#post-lm-btn a").text('Load More');
                    $("#post-lm-btn").hide();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#post-list-div").html('<h3>Something went wrong</h3>');
            }

        });
        return false;
    }
});
