<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <!-- header navi -->
                    <li class="nav-header">
                         <?php  echo $this->element('user_profile/user_profile_menu'); ?>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    
                    <li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo __('Users');?></span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="active"><a href="<?php echo $this->webroot;?>users/index"><?php echo __('Users');?></a></li>
                            <li><a href="<?php echo $this->webroot;?>groups/index"><?php echo __('Groups');?></a></li>                          
                        </ul>
                    </li>
                    
                    
                </ul>

            </div>
        </nav>