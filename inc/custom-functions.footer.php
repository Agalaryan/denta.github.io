<?php
	/**
	CUSTOM FOOTER FUNCTIONS
	*/


    // SITE PRELOADER ANIMATION: From theme options panel
    function medpluswp_loader_animation(){

        $html = '';

        $html .= '<div class="loader-pulsate">
                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-466.4 259.6 280.2 47.3" enable-background="new -466.4 259.6 280.2 47.3" xml:space="preserve">
                            <polyline class="animation-pulsate"   points="-465.4,281 -436,281 -430.9,291 -423.9,281 -348.2,281 -340.2,269 -330.2,303 -320.2,263 -310.2,291 -305.2,281 -187.2,281 "></polyline>
                        </svg>
                    </div>';

        return $html;
    }


	/**
	Function name: 				medpluswp_footer_row1()
	Function description:		Footer row 1
	*/
	function medpluswp_footer_row1(){

		global  $medpluswp_redux;

        // if ($medpluswp_redux['mt_footer_row_1'] == 1) {

            echo '<div class="row">';
                echo '<div class="col-md-12 footer-row-1">';
                    echo '<div class="row">';

                    $footer_row_1_layout = $medpluswp_redux['mt_footer_row_1_layout'];
                    $nr = array("1", "2", "3", "4", "6");

                    if (in_array($footer_row_1_layout, $nr)) {
                        $columns    = 12/$footer_row_1_layout;
                        $class = 'col-md-'.$columns;
                        for ( $i=1; $i <= $footer_row_1_layout ; $i++ ) { 

                            echo '<div class="'.$class.' sidebar-'.$i.'">';
                                dynamic_sidebar( 'footer_row_1_'.$i );
                            echo '</div>';
                        }
                    }elseif($footer_row_1_layout == '5'){
                        echo '<div class="col-md-2 col-md-offset-1 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_1_4' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-5">';
                            dynamic_sidebar( 'footer_row_1_5' );
                        echo '</div>';
                    }elseif($footer_row_1_layout == 'column_half_sub_half'){
                        echo '<div class="col-md-6 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';
                    }elseif($footer_row_1_layout == 'column_sub_half_half'){
                        echo '<div class="col-md-3 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';

                        echo '<div class="col-md-6 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';
                    }elseif($footer_row_1_layout == 'column_sub_fourth_third'){
                        echo '<div class="col-md-2 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_1_4' );
                        echo '</div>';
                        echo '<div class="col-md-4 sidebar-5">';
                            dynamic_sidebar( 'footer_row_1_5' );
                        echo '</div>';
                    }elseif($footer_row_1_layout == 'column_third_sub_fourth'){
                        echo '<div class="col-md-4 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_1_4' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-5">';
                            dynamic_sidebar( 'footer_row_1_5' );
                        echo '</div>';
                    }elseif($footer_row_1_layout == 'column_sub_third_half'){
                        echo '<div class="col-md-2 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';
                        echo '<div class="col-md-6 sidebar-4">';
                            dynamic_sidebar( 'footer_row_1_4' );
                        echo '</div>';
                    }elseif($footer_row_1_layout == 'column_half_sub_third'){
                        echo '<div class="col-md-6 sidebar-1">';
                            dynamic_sidebar( 'footer_row_1_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_1_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_1_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_1_4' );
                        echo '</div>';
                    }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        // }
	}


	/**
	Function name: 				medpluswp_footer_row2()
	Function description:		Footer row 2
	*/
	function medpluswp_footer_row2(){

		global  $medpluswp_redux;

        // if ($medpluswp_redux['mt_footer_row_2'] == 1) {

            echo '<div class="row">';
                echo '<div class="col-md-12 footer-row-2">';
                    echo '<div class="row">';

                    $footer_row_2_layout = $medpluswp_redux['mt_footer_row_2_layout'];
                    $nr = array("1", "2", "3", "4", "6");

                    if (in_array($footer_row_2_layout, $nr)) {
                        $columns    = 12/$footer_row_2_layout;
                        $class = 'col-md-'.$columns;
                        for ( $i=1; $i <= $footer_row_2_layout ; $i++ ) { 
                            echo '<div class="'.$class.' sidebar-'.$i.'">';
                                dynamic_sidebar( 'footer_row_2_'.$i );
                            echo '</div>';
                        }
                    }elseif($footer_row_2_layout == '5'){
                        echo '<div class="col-md-2 col-md-offset-1 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_2_4' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-5">';
                            dynamic_sidebar( 'footer_row_2_5' );
                        echo '</div>';
                    }elseif($footer_row_2_layout == 'column_half_sub_half'){
                        echo '<div class="col-md-6 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';
                    }elseif($footer_row_2_layout == 'column_sub_half_half'){
                        echo '<div class="col-md-3 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';

                        echo '<div class="col-md-6 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';
                    }elseif($footer_row_2_layout == 'column_sub_fourth_third'){
                        echo '<div class="col-md-2 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_2_4' );
                        echo '</div>';
                        echo '<div class="col-md-4 sidebar-5">';
                            dynamic_sidebar( 'footer_row_2_5' );
                        echo '</div>';
                    }elseif($footer_row_2_layout == 'column_third_sub_fourth'){
                        echo '<div class="col-md-4 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_2_4' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-5">';
                            dynamic_sidebar( 'footer_row_2_5' );
                        echo '</div>';
                    }elseif($footer_row_2_layout == 'column_sub_third_half'){
                        echo '<div class="col-md-2 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';
                        echo '<div class="col-md-6 sidebar-4">';
                            dynamic_sidebar( 'footer_row_2_4' );
                        echo '</div>';
                    }elseif($footer_row_2_layout == 'column_half_sub_third'){
                        echo '<div class="col-md-6 sidebar-1">';
                            dynamic_sidebar( 'footer_row_2_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_2_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_2_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_2_4' );
                        echo '</div>';
                    }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        // }
	}


	/**
	Function name: 				medpluswp_footer_row3()
	Function description:		Footer row 3
	*/
	function medpluswp_footer_row3(){

		global  $medpluswp_redux;
		//$html = '';

        // if ($medpluswp_redux['mt_footer_row_3'] == 1) {

            echo '<div class="row">';
                echo '<div class="col-md-12 footer-row-3">';
                    echo '<div class="row">';

                    $footer_row_3_layout = $medpluswp_redux['mt_footer_row_3_layout'];
                    $nr = array("1", "2", "3", "4", "6");

                    if (in_array($footer_row_3_layout, $nr)) {
                        $columns    = 12/$footer_row_3_layout;
                        $class = 'col-md-'.$columns;
                        for ( $i=1; $i <= $footer_row_3_layout ; $i++ ) { 

                            echo '<div class="'.$class.' sidebar-'.$i.'">';
                                dynamic_sidebar( 'footer_row_3_'.$i );
                            echo '</div>';

                        }
                    }elseif($footer_row_3_layout == '5'){
                        echo '<div class="col-md-2 col-md-offset-1 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_3_4' );
                        echo '</div>';

                        echo '<div class="col-md-2 sidebar-5">';
                            dynamic_sidebar( 'footer_row_3_5' );
                        echo '</div>';
                    }elseif($footer_row_3_layout == 'column_half_sub_half'){
                        echo '<div class="col-md-6 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';
                    }elseif($footer_row_3_layout == 'column_sub_half_half'){
                        echo '<div class="col-md-3 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';

                        echo '<div class="col-md-3 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';

                        echo '<div class="col-md-6 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';
                    }elseif($footer_row_3_layout == 'column_sub_fourth_third'){
                        echo '<div class="col-md-2 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_3_4' );
                        echo '</div>';
                        echo '<div class="col-md-4 sidebar-5">';
                            dynamic_sidebar( 'footer_row_3_5' );
                        echo '</div>';
                    }elseif($footer_row_3_layout == 'column_third_sub_fourth'){
                        echo '<div class="col-md-4 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_3_4' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-5">';
                            dynamic_sidebar( 'footer_row_3_5' );
                        echo '</div>';
                    }elseif($footer_row_3_layout == 'column_sub_third_half'){
                        echo '<div class="col-md-2 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';
                        echo '<div class="col-md-6 sidebar-4">';
                            dynamic_sidebar( 'footer_row_3_4' );
                        echo '</div>';
                    }elseif($footer_row_3_layout == 'column_half_sub_third'){
                        echo '<div class="col-md-6 sidebar-1">';
                            dynamic_sidebar( 'footer_row_3_1' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-2">';
                            dynamic_sidebar( 'footer_row_3_2' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-3">';
                            dynamic_sidebar( 'footer_row_3_3' );
                        echo '</div>';
                        echo '<div class="col-md-2 sidebar-4">';
                            dynamic_sidebar( 'footer_row_3_4' );
                        echo '</div>';
                    }

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        // }
	}
?>