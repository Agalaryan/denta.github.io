<?php

function medpluswp_header_title_breadcrumbs(){

    $html = '';
    $html .= '<div class="header-title-breadcrumb relative">';
        $html .= '<div class="header-title-breadcrumb-overlay text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 text-left">';
                                    if (is_single()) {
                                        $html .= '<h1>'.esc_html__( 'Blog', 'medpluswp' ) .'</h1>';
                                    }elseif (is_home()) {
                                        $html .= '<h1>'.esc_html__( 'Latest Posts', 'medpluswp' ) .'</h1>';
                                    }elseif (is_page()) {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }elseif (is_search()) {
                                        $html .= '<h1>'.esc_html__( 'Search Results for: ', 'medpluswp' ) . get_search_query().'</h1>';
                                    }elseif (is_category()) {
                                        $html .= '<h1>'.esc_html__( 'Category: ', 'medpluswp' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                    }elseif (is_tag()) {
                                        $html .= '<h1>'.esc_html__( 'Tag Archives: ', 'medpluswp' ) . single_tag_title( '', false ).'</h1>';
                                    }elseif (is_author() || is_archive() || is_home()) {
                                        $html .= '<h1>'.get_the_archive_title() . get_the_archive_description().'</h1>';
                                    }else {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }
                      $html .= '</div>
                                <div class="col-md-5">
                                    <ol class="breadcrumb text-right">'.medpluswp_breadcrumb().'</ol>                    
                                </div>
                            </div>
                        </div>
                    </div>';

    $html .= '</div>';
    $html .= '<div class="clearfix"></div>';

    return $html;
}
?>