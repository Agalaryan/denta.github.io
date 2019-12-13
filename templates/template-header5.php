<header class="header5">
  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          <!-- LOGO -->
          <div class="navbar-header col-md-12">
            <?php if ( !class_exists( 'mega_main_init' ) ) { ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <?php } ?>

            <h1 class="logo text-center">
              <a href="<?php echo get_site_url(); ?>">
                <?php if(medpluswp_redux('mt_logo','url')){ ?>
                  <img src="<?php echo esc_attr(medpluswp_redux('mt_logo','url')); ?>" alt="<?php echo get_bloginfo(); ?>" />
                <?php }else{ 
                  echo get_bloginfo();
                } ?>
              </a>
            </h1>
          </div>


          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-12">
              <div class="row">
                <?php echo medpluswp_get_nav_menu(); ?>
              </div>
              
              <div class="header-nav-actions">
                <div class="row">

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
    </div>
  </nav>
</header>