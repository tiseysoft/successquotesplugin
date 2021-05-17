<?php
/**
 * @package Success Quotes
 * @version 1.0.0
 */
/*
Plugin Name: Success Quotes
Plugin URI: http://twitter.com/tiseysoft
Description: This is a fun plugin that gives you success quotes at intervals, nothing too serious, Just to inspire you. every page that you click a quote will be at the top right corner, that you can randomly read.
Author: Tisey Soft
Version: 1.0.0
Author URI: http://github.com/tiseysoft
*/

function success_quotes_get_lyric(){
    /** These are the quotes for the plugin */
    $quotes = "";

    //here we split the qouttes into lines
    $quotes = explode("\n", $quotes);

    //and then randomly choose a line
    return wptexturize($quotes[ mt_rand(0, count($quotes) - 1) ] );
}

//this is just echoes the chosen line
function success_quotes(){
    $chosen = success_quotes_get_lyric();
    $lang = '';
    if ('en_' !== substr(get_user_locale(), 0, 3) ) {
        $lang = 'lang="en"';
    }

    printf(
        '<p id="quotes"><span class="sreen-reader-text">%s</span><span dir="ltr"%s</span</p>',
        __('Success Quotes by Tisey Soft'),
        $lang,
        $chosen
    );
}

add_action( 'admin_notices', 'Success_Quotes' );

    //
    function success_css() {
        echo "
        <style type='text/css'>
        #quotes {
            float: right;
            padding: 5px 10px;
            margin: 0;
            font-size: 12px;
            line-height: 1.6666;
        }
        .rtl #quotes {
            float: left;
        }
        .block-editor-page #quotes {
            display: none;
        }
        @media screen and (max-width: 782px) {
            #quotes,
            .rtl #quotes {
                float: none;
                padding-left: 0;
                padding-right: 0;
            }
        }
        </style>
        ";
    }
    
    add_action( 'admin_head', 'success_css' );
