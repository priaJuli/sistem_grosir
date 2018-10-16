            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container-fluid">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <form class="search-form" action="page_general_search.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <?php 
                                $nav1="";$nav2="";$nav3="";$nav4="";$nav5="";$nav6="";$nav7="";$nav8="";

                                $s_master1="";$s_master2="";$s_master3="";$s_master4="";$s_master5="";$s_master6="";
                                $s_setting1="";$s_setting2=""; $s_barang1=""; $s_barang2="";
                                $nav_top1="";$nav_top2="";

                                if ($nav==1) {$nav1="active";
                                    if ($s_master==1 && $nav_top == 1) {
                                        $s_master1="active";
                                        $nav_top1="active";
                                    }
                                }
                                if ($nav==2) {$nav2="active";
                                    if ($s_master==2 && $nav_top == 1) {
                                        $s_master2="active";
                                        $nav_top1="active";
                                    }
                                }
                                if ($nav==3) {$nav3="active";
                                    if ($s_master==3 && $nav_top == 1) {
                                        $s_master3="active";
                                        $nav_top1="active";
                                    }
                                }
                                if ($nav==4) {$nav4="active";
                                    if ($s_master==4 && $nav_top == 1) {
                                        $s_master4="active";
                                        $nav_top1="active";
                                    }
                                }
                                if ($nav==5) {$nav5="active";
                                    if ($s_master==5 && $nav_top == 1) {
                                        $s_master5="active";
                                        $nav_top1="active";
                                    }
                                }
                                if ($nav==6) {$nav6="active";
                                    if ($s_master==6 && $nav_top == 1) {
                                        $s_master6="active";
                                        $nav_top1="active";
                                    }
                                }
                                if ($nav==7) {$nav7="active";
                                    if ($s_barang==1 && $nav_top == 2) {
                                        $s_barang1="active";
                                        $nav_top2="active";
                                    }
                                }
                                if ($nav==8) {$nav8="active";
                                    
                                    
                                }
                            ?>
                            

                            <li class=" <?= $nav8; ?>">
                                <a href="<?=base_url()?>Transaksi" class="nav-link  <?= $nav8; ?>"> Transaksi </a>
                            </li>

                            <li class="menu-dropdown classic-menu-dropdown <?= $nav_top2;?>">
                                <a href="javascript:;"> Data Barang
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" <?= $nav7; ?>">
                                        <a href="<?=base_url()?>data_barang" class="nav-link  <?= $s_barang1; ?>"> Input Barang </a>
                                    </li>
                                    <!-- <li class=" <?= $nav8; ?>">
                                        <a href="layout_disabled_menu.html" class="nav-link <?= $s_barang2; ?> "> Stok Barang </a>
                                    </li> -->
                                </ul>

                            </li>

                            <li class="menu-dropdown mega-menu-dropdown <?= $nav_top1; ?>">
                                <a href="javascript:;"> Master Data
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu" style="min-width: 350px">
                                    <li>
                                        <div class="mega-menu-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="mega-menu-submenu">
                                                        <li class=" <?= $nav2; ?> ">
                                                            <a href="<?=base_url()?>Master_kategori" class="nav-link <?= $s_master2;?> ">  Kategori </a>
                                                        </li>
                                                        <li class="<?= $nav3; ?> ">
                                                            <a href="<?=base_url()?>Master_satuan" class="nav-link <?= $s_master3;?>  ">  Satuan </a>
                                                        </li>
                                                        <li class=" <?= $nav4; ?>">
                                                            <a href="<?=base_url()?>Master_supplier" class="nav-link  <?= $s_master4; ?>">  Supplier </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="mega-menu-submenu">
                                                        
                                                        <li class=" <?= $nav5; ?> ">
                                                            <a href="<?=base_url()?>Master_pelanggan" class="nav-link <?= $s_master5;?> ">  Pelanggan </a>
                                                        </li>
                                                        <li class="<?= $nav6; ?> ">
                                                            <a href="<?=base_url()?>Master_admin" class="nav-link <?= $s_master6;?>  ">  Admin </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-dropdown classic-menu-dropdown <?php ?>">
                                <a href="javascript:;"> Setting
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" <?= $s_setting1; ?>">
                                        <a href="<?=base_url()?>Setting_profile" class="nav-link  <?= $s_setting1; ?>"> Profile </a>
                                    </li>
                                    <li class=" ">
                                        <a href="layout_disabled_menu.html" class="nav-link  "> Password </a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
<!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container" >
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->

                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb" hidden="">
                            <li>
                                <a href="<?=base_url()?>Welcome">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><?=$title;?></span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->