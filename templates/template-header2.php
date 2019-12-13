<header class="header2">


  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="header-infos">

          <?php if(medpluswp_redux('mt_divider_header_info_1_status') == true){ ?>
            <!-- HEADER INFO 1 -->
            <div class="pull-left header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(medpluswp_redux('mt_divider_header_info_1_media_type') == true){ ?>
                  <i class="<?php echo esc_attr(medpluswp_redux('mt_divider_header_info_1_faicon')); ?>"></i>
                <?php }else{ ?>
                  <img src="<?php echo esc_attr(medpluswp_redux('mt_divider_header_info_1_image_icon','url')); ?>" alt="image_icon" />
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <h3><?php echo esc_attr(medpluswp_redux('mt_divider_header_info_1_heading1')); ?></h3>
                <div class="clearfix"></div>
                <h5><?php echo esc_attr(medpluswp_redux('mt_divider_header_info_1_heading3')); ?></h5>
              </div>
            </div>
            <!-- // HEADER INFO 1 -->
          <?php } ?>

          <?php if(medpluswp_redux('mt_divider_header_info_2_status') == true){ ?>
            <!-- HEADER INFO 2 -->
            <div class="pull-left header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(medpluswp_redux('mt_divider_header_info_2_media_type') == true){ ?>
                  <i class="<?php echo esc_attr(medpluswp_redux('mt_divider_header_info_2_faicon')); ?>"></i>
                <?php }else{ ?>
                  <img src="<?php echo esc_attr(medpluswp_redux('mt_divider_header_info_2_image_icon','url')); ?>" alt="image_icon" />
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <h3><?php echo esc_attr(medpluswp_redux('mt_divider_header_info_2_heading1')); ?></h3>
                <div class="clearfix"></div>
                <h5><?php echo esc_attr(medpluswp_redux('mt_divider_header_info_2_heading3')); ?></h5>
              </div>
            </div>
            <!-- // HEADER INFO 2 -->
          <?php } ?>

          <?php if(medpluswp_redux('mt_divider_header_info_3_status') == true){ ?>
            <!-- HEADER INFO 3 -->
            <div class="pull-left header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(medpluswp_redux('mt_divider_header_info_3_media_type') == true){ ?>
                  <i class="<?php echo esc_attr(medpluswp_redux('mt_divider_header_info_3_faicon')); ?>"></i>
                <?php }else{ ?>
                  <img src="<?php echo esc_attr(medpluswp_redux('mt_divider_header_info_3_image_icon','url')); ?>" alt="image_icon" />
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <h3><?php echo esc_attr(medpluswp_redux('mt_divider_header_info_3_heading1')); ?></h3>
                <div class="clearfix"></div>
                <h5><?php echo esc_attr(medpluswp_redux('mt_divider_header_info_3_heading3')); ?></h5>
              </div>
            </div>
            <!-- // HEADER INFO 3 -->
          <?php } ?>

        </div>
      </div>
      <!-- LOGO -->
      <div class="navbar-header col-md-3">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <?php if(medpluswp_redux('mt_logo','url')){ ?>
          <h1 class="logo">
              <a href="<?php echo get_site_url(); ?>">
                  <img src="<?php echo esc_attr(medpluswp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
              </a>
          </h1>
        <?php }else{ ?>
          <h1 class="logo no-logo">
              <a href="<?php echo esc_url(get_site_url()); ?>">
                <?php echo esc_attr(get_bloginfo()); ?>
              </a>
          </h1>
        <?php } ?>
      </div>
    </div>
  </div>


  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-12">
            <?php echo medpluswp_get_nav_menu(); ?>

            <div class="header-nav-actions">

              <?php if(medpluswp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
                <!-- MT BURGER -->
                <div class="mt-nav-burger-holder">
                  <div id="mt-nav-burger" class="menu-item">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                </div>
              <?php } ?>

              <?php if(medpluswp_redux('mt_header_is_search') == true){ ?>
                <a href="#" class="mt-search-icon menu-item">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              <?php } ?>
              
            </div>

          </div>


        </div>
    </div>
  </nav>
</header>
