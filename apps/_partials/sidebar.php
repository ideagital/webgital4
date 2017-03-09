<div class="sidebar app-aside" id="sidebar">
  <div class="sidebar-container perfect-scrollbar">
    <nav>
      <!-- start: SEARCH FORM -->
      <div class="search-form">
        <a class="s-open" href="#">
          <i class="ti-search"></i>
        </a>
        <form class="navbar-form" role="search">
          <a class="s-remove" href="#" target=".navbar-form">
            <i class="ti-close"></i>
          </a>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search...">
            <button class="btn search-button" type="submit">
              <i class="ti-search"></i>
            </button>
          </div>
        </form>
      </div>
      <!-- end: SEARCH FORM -->
      <!-- start: MAIN NAVIGATION MENU -->
      <div class="navbar-title">
        <span>Main Navigation</span>
      </div>
      <ul class="main-navigation-menu">
      <?php if($uri[0] == '' or $app == 'index'){ ?>
        <li class="active open">
      <?php }else{ ?>
        <li >
      <?php } ?>
          <a href="<?php echo $site_url;?>/">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-home"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Dashboard </span>
              </div>
            </div>
          </a>
        </li>


        <?php if($uri[0] == 'pos'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li>
        <?php } ?>
          <a href="<?php echo $site_url;?>/pos">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-receipt"></i>
              </div>
              <div class="item-inner">
                <span class="title"> POS </span>
              </div>
            </div>
          </a>
        </li>



        <?php if($uri[0] == 'invoices'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li>
        <?php } ?>
          <a href="<?php echo $site_url;?>/invoices">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-receipt"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Invoices </span>
              </div>
            </div>
          </a>
        </li>



        
        <?php if($uri [0] == 'products' || $uri[0] == 'product'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li>
        <?php } ?>
          <a href="<?php echo $site_url;?>/products">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-package"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Products </span>
              </div>
            </div>
          </a>
        </li>

        




        <?php if($uri [0] == 'packages'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li>
        <?php } ?>
          <a href="<?php echo $site_url;?>/packages">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-package"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Packages </span>
              </div>
            </div>
          </a>
        </li>




        <?php if($uri [0] == 'members' || $uri[0] == 'member'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li>
        <?php } ?>
          <a href="javascript:void(0)">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-user"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Members </span><i class="icon-arrow"></i>
              </div>
            </div>
          </a>
          <ul class="sub-menu">
            <?php if($app == 'members' && $action==''){ ?>
              <li class="active">
            <?php }else{ ?>
              <li class="">
            <?php } ?>
              <a href="<?php echo $site_url;?>/members">
                <span class="title"> All Member <small>(<?php echo $count_member;?>)</small></span>
              </a>
            </li>



            <?php if($app == 'members' && $action=='unapprove'){ ?>
              <li class="active">
            <?php }else{ ?>
              <li class="">
            <?php } ?>
              <a href="<?php echo $site_url;?>/member/unapprove">
                <span class="title"> Unapprove <small>(<?php echo $count_members_unapprove?>)</small></span>
              </a>
            </li>




            <?php if($app == 'members' && $action=='ranking'){ ?>
              <li class="active">
            <?php }else{ ?>
              <li class="">
            <?php } ?>
              <a href="<?php echo $site_url;?>/members/ranking">
                <span class="title"> Ranking </span>
              </a>
            </li>



            <?php if($app == 'members' && $action=='binary'){ ?>
              <li class="active">
            <?php }else{ ?>
              <li class="">
            <?php } ?>
              <a href="<?php echo $site_url;?>/members/binary">
                <span class="title">Binary Tree</span>
              </a>
            </li>
          </ul>
        </li>




        <?php if($app == 'finance'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li>
        <?php } ?>
          <a href="javascript:void(0)">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-money"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Finance </span><i class="icon-arrow"></i>
              </div>
            </div>
          </a>
        </li>





        <?php if($uri[0] == 'settings'){ ?>
          <li class="active open">
        <?php }else{ ?>
          <li class="">
        <?php } ?>
          <a href="javascript:void(0)">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-settings"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Settings </span><i class="icon-arrow"></i>
              </div>
            </div>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo $site_url;?>/settings">
                <span class="title"> Genaral </span>
              </a>
            </li>
            <li>
              <a href="<?php echo $site_url;?>/bankaccount">
                <span class="title"> Bank Account </span>
              </a>
            </li>

            <?php if($uri[0] == 'settings' && $uri[1]=='rank'){ ?>
              <li class="active">
            <?php }else{ ?>
              <li class="">
            <?php } ?>
              <a href="<?php echo $site_url;?>/settings/rank">
                <span class="title"> Rank </span>
              </a>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="<?php echo $site_url;?>/login">
            <div class="item-content">
              <div class="item-media">
                <i class="ti-lock"></i>
              </div>
              <div class="item-inner">
                <span class="title"> Lock Out </span>
              </div>
            </div>
          </a>
        </li>
      </ul>
      <!-- end: MAIN NAVIGATION MENU -->
      <!-- start: CORE FEATURES -->
      <div class="navbar-title">
        <span>Core Features</span>
      </div>
      <ul class="folders">
        <li>
          <a href="pages_calendar.html">
            <div class="item-content">
              <div class="item-media">
                <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
              </div>
              <div class="item-inner">
                <span class="title"> Calendar </span>
              </div>
            </div>
          </a>
        </li>
        <li>
          <a href="pages_messages.html">
            <div class="item-content">
              <div class="item-media">
                <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i> </span>
              </div>
              <div class="item-inner">
                <span class="title"> Messages </span>
              </div>
            </div>
          </a>
        </li>
      </ul>
      <!-- end: CORE FEATURES -->
      <!-- start: DOCUMENTATION BUTTON -->
      <div class="wrapper">
        <a href="documentation.html" class="button-o">
          <i class="ti-help"></i>
          <span>Documentation</span>
        </a>
      </div>
      <!-- end: DOCUMENTATION BUTTON -->
    </nav>
  </div>
</div>
