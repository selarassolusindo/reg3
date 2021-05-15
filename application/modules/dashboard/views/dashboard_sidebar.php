<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <?php if ($this->ion_auth->logged_in()) { ?>
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="text-center">
            <?php echo $this->ion_auth->user()->row()->first_name . ' - ' . $this->ion_auth->user()->row()->email ?>
        </div>
    </div>
    <?php } ?>

    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form> -->
    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

        <!-- <li class="header">MAIN NAVIGATION</li> -->

        <!-- dashboard -->
        <li class="<?php echo ($this->uri->segment(1) == '' ? 'active' : ($this->uri->segment(1) == 'dashboard' ? 'active' : '')) ?>">
            <a href="<?php echo site_url() ?>">
                <i class="fa fa-circle"></i> <span>Dashboard</span>
            </a>
        </li>

        <?php if ($this->ion_auth->logged_in()) { ?>

        <!-- setup -->
        <li class="treeview
            <?php
            switch ($this->uri->segment(1)) {
                case 'auth':
                    echo 'active menu-open';
                    break;
                default:
                    echo '';
            }
            ?>
        ">
            <a href="#">
                <i class="fa fa-circle"></i> <span>Setup</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php echo $this->uri->segment(1) == 'auth' ? 'class="active"' : '' ?>><a href="<?php echo site_url() ?>auth"><i class="fa fa-circle-o"></i> Users</a></li>
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
                <!-- <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Level One
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
            </ul>
        </li>
        <!-- /setup -->

        <!-- utility -->
        <li class="treeview
            <?php
            switch ($this->uri->segment(1)) {
                case 'change_password':
                    echo 'active menu-open';
                    break;
                default:
                    echo '';
            }
            ?>
        ">
            <a href="#">
                <i class="fa fa-circle"></i> <span>Utility</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php echo $this->uri->segment(1) == 'change_password' ? 'class="active"' : '' ?>><a href="<?php echo site_url() ?>change_password"><i class="fa fa-circle-o"></i> Change Password</a></li>
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
                <!-- <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Level One
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
            </ul>
        </li>
        <!-- /utility -->

        <?php } ?>

        <!-- login logout -->
        <li>
            <?php if ($this->session->userdata('user_id') != "") { ?>
                <a href="<?php echo site_url() ?>auth/logout">
                    <i class="fa fa-circle"></i> <span>Logout</span>
                </a>
            <?php } else { ?>
                <a href="<?php echo site_url() ?>auth/login">
                    <i class="fa fa-circle"></i> <span>Login</span>
                </a>
            <?php }?>
        </li>

    </ul>

</section>
<!-- /.sidebar -->
