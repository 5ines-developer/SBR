<div class="navbar-fixed">
        <nav class="z-depth-1 navbar-fixed">
            <div class="nav-wrapper white">
                <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/img/logo.png" class="img-responsive brand-logo" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i
                        class="material-icons">menu</i></a>
                    <div class="right hide-on-med-and-down header-ul ">
                        <ul >
                            <li><a href="<?php echo base_url()?>">HOME</a></li>
                            <li><a href="<?php echo base_url('vendors')?>">VENDORS</a></li>
                            <li><a href="#!">SELECT CITY</a></li>
                            <li><a href="#">WED ASSISTANCE</a></li>
                            <li><a href="#">E-INVITE</a></li>
                            <li><a href="#">REAL WEDDING</a></li>
                            <li><a href="#">BLOG</a></li>
                            <?php if ($this->session->userdata('shdid') !='') { ?>
                                <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a><span class="l-d">|</span></li>
                                <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
                            <?php }else{ ?>
                            <li class="br-lo"><a href="<?php echo base_url('login') ?>">SIGN IN </a></li>
                            <li><span class="black-text">|</span></li>
                            <li class="br-lo"><a href="<?php echo base_url('register') ?>">SIGN UP</a></li>
                            <li class="tollfree" ><a href="tel:18004199456" class="tooltipped"  data-position="bottom" data-tooltip="1800 419 9456"> <i class="material-icons">local_phone</i><span>Toll Free</span></a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
               
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="<?php echo base_url()?>">HOME</a></li>
            <li><a href="<?php echo base_url('vendors')?>">VENDORS</a></li>
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
