<div class="">
        <nav class="z-depth-1 navbar-fixed">
            <div class="nav-wrapper white">
                <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/img/logo.png" class="img-responsive brand-logo" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i
                        class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down header-ul ">
                    <li><a href="<?php echo base_url()?>">HOME</a></li>
                    <li><a href="<?php echo base_url('vendors')?>">VENDORS</a></li>
                    <li><a href="#">WED ASSISTANCE</a></li>
                    <li><a href="#">E-INVITE</a></li>
                    <li><a href="#">REAL WEDDING</a></li>
                    <li><a href="#">BLOG</a></li>
                    <?php if ($this->session->userdata('shdid') !='') { ?>
                        <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a><span class="l-d">|</span></li>
                        <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
                    <?php }else{ ?>
                    <li class="br-lo"><a href="<?php echo base_url('login') ?>">SIGN IN </a><span class="l-d">|</span></li>
                    <li class="br-lo"><a href="<?php echo base_url('register') ?>">SIGN UP</a></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="<?php echo base_url()?>">HOME</a></li>
            <li><a href="#">VENDORS</a></li>
            <li><a href="#">WED ASSISTANCE</a></li>
            <li><a href="#">E-INVITE</a></li>
            <li><a href="#">WED ASSISTANCE</a></li>
            <li><a href="#">BLOG</a></li>
            <?php if ($this->session->userdata('shdid') !='') { ?>
                    <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a><span class="l-d">|</span></li>
                    <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
            <?php }else{ ?>
                    <li class="br-lo"><a href="<?php echo base_url('login') ?>">SIGN IN </a><span class="l-d">|</span></li>
                    <li class="br-lo"><a href="<?php echo base_url('register') ?>">SIGN UP</a></li>
            <?php } ?>
        </ul>
    </div>