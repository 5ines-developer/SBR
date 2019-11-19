
 <div class="col l3 m12 s12">

   <div class="side-bar white z-depth-1">
     <?php $this->ci =& get_instance(); 

     $accs = $this->ci->preload->access();
     $accsmenu = explode (",", $accs->menu);

   if ($this->session->userdata('sha_type') == '1') { ?>


 <ul class="li-list ">
        <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'cities'?'active':'' ?>"><a href="<?php echo base_url('cities/manage') ?>"><i class="fas fa-city li-icon"></i>Cities</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a href="<?php echo base_url('category/manage') ?>"><i class="fas fa-th-list li-icon"></i>Category</a></li>

        <div class="divider"></div>

        <li class="<?php echo $this->uri->segment(1) == 'users'?'active':'' ?>"><a href="<?php echo base_url('users/manage') ?>"><i class="fas fa-users li-icon"></i>Manage Users</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'employees'?'active':'' ?>"><a href="<?php echo base_url('employees') ?>"><i class="fas fa-users-cog li-icon"></i>Employees</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'vendors'?'active':'' ?>"><a href="<?php echo base_url('vendors/manage') ?>"><i class="fas fa-handshake li-icon"></i>Vendors</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'vendor'?'active':'' && $this->uri->segment(2) == 'approval'?'active':'' ?>"><a href="<?php echo base_url('vendor/approval') ?>"><i class="far fa-check-circle li-icon"></i>Vendors Approval</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'vendors-discount'?'active':'' ?>"><a href="<?php echo base_url('vendors-discount') ?>"><i class="fas fa-tags li-icon"></i>Discount Request
          <?php if($this->ci->preload->disccount() > 0){
            echo '<span class="new badge">'. $this->ci->preload->disccount() .'</span> ';
          } ?></a></li>

        <div class="divider"></div>

        <li class="<?php echo $this->uri->segment(1) == 'package'?'active':'' ?>"><a href="<?php echo base_url('package') ?>"><i class="fas fa-ribbon li-icon"></i>Package</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'banner-package'?'active':'' ?>"><a href="<?php echo base_url('banner-package') ?>"><i class="fas fa-ribbon li-icon"></i>Banner Package</a></li>
        <div class="divider"></div>

        <li class="<?php echo $this->uri->segment(1) == 'vendor-package'?'active':'' ?>"><a href="<?php echo base_url('vendor-package') ?>"><i class="fas fa-comments-dollar li-icon"></i>Package Request 
          <?php if($this->ci->preload->bypackage() > 0){
            echo '<span class="new badge">'. $this->ci->preload->bypackage() .'</span> ';
          } ?></a></li> 
        <div class="divider"></div>
          


        <li class="<?php echo $this->uri->segment(1) == 'leads'?'active':'' ?>"><a href="<?php echo base_url('leads') ?>"><i class="fas fa-comments li-icon"></i>Lead Management</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'enquiries'?'active':'' ?>"><a href="<?php echo base_url('enquiries') ?>"><i class="fas fa-comments li-icon"></i>Enquiries</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'vendor-enquiry'?'active':'' ?>"><a href="<?php echo base_url('vendor-enquiry') ?>"><i class="fas fa-comment li-icon"></i>Vendor Enquiry</a></li>


        
               
        <li class="<?php echo $this->uri->segment(1) == 'free-quote'?'active':'' ?>"><a href="<?php echo base_url('free-quote') ?>"><i class="fas fa-file-alt li-icon"></i>Free Quote Request</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'newsletter-subcribers'?'active':'' ?>"><a href="<?php echo base_url('newsletter-subcribers') ?>"><i class="fas fa-user-plus li-icon"></i>Newsletter subcribers</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'testimonial'?'active':'' ?>">
          <a href="<?php echo base_url('testimonial') ?>"><i class="far fa-comment-dots li-icon"></i>Testimonial 
          <?php if($this->ci->preload->testimonial() > 0){
            echo '<span class="new badge">'. $this->ci->preload->testimonial() .'</span> ';
          } ?>
          </a>
        </li>

        

        <li class="<?php echo $this->uri->segment(1) == 'feedback'?'active':'' ?>">
          <a href="<?php echo base_url('feedback') ?>"><i class="fas fa-comment-slash li-icon"></i>Feedback 
          <?php if($this->ci->preload->feedback() > 0){
            echo '<span class="new badge">'. $this->ci->preload->feedback() .'</span> ';
          } ?>
          </a>
        </li>

        <li class="droup-link <?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a class="droup-link-item"><i class="fas fa-user-tie li-icon"></i>Career</a>
            <ul class="droupmenu">
              <li class="<?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a href="<?php echo base_url('career') ?>">Jobs</a></li>
              <li class="<?php echo $this->uri->segment(2) == 'applications'?'active':'' ?>"><a href="<?php echo base_url('career/applications') ?>">Applications</a></li>
            </ul>
      </li>

      <!-- <li class="<?php echo $this->uri->segment(1) == 'cache'?'active':'' ?>"><a href="<?php echo base_url('cache') ?>"><i class="far fa-check-circle li-icon"></i>Cache</a></li> -->

        
      

      </ul>
<?php }else{ ?>

     
      <ul class="li-list ">
        <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>


        <?php
        $access ='';
        foreach ($accsmenu as $key => $value) { 

          if ($value == '1') {  ?>
          <li class="<?php echo $this->uri->segment(1) == 'users'?'active':'' ?>"><a href="<?php echo base_url('users/manage') ?>"><i class="fas fa-users li-icon"></i>Manage Users</a></li>
        
       <?php } 
       if ($value == '2') { ?>
         <li class="<?php echo $this->uri->segment(1) == 'cities'?'active':'' ?>"><a href="<?php echo base_url('cities/manage') ?>"><i class="fas fa-city li-icon"></i>Cities</a></li>
       <?php }

       if ($value == '3') { ?>
         <li class="<?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a href="<?php echo base_url('category/manage') ?>"><i class="fas fa-th-list li-icon"></i>Category</a></li>
       <?php }

       if ($value == '4') { ?>
         <li class="<?php echo $this->uri->segment(1) == 'vendor'?'active':'' && $this->uri->segment(2) == 'approval'?'active':'' ?>"><a href="<?php echo base_url('vendor/approval') ?>"><i class="far fa-check-circle li-icon"></i>Vendors Approval</a></li>
       <?php }

       if ($value == '5') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'enquiries'?'active':'' ?>"><a href="<?php echo base_url('enquiries') ?>"><i class="fas fa-comments li-icon"></i>Enquiries</a></li>
       <?php }

       if ($value == '6') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'vendor-enquiry'?'active':'' ?>"><a href="<?php echo base_url('vendor-enquiry') ?>"><i class="fas fa-comment li-icon"></i>Vendor Enquiry</a></li>
       <?php }
       if ($value == '7') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'vendor-package'?'active':'' ?>"><a href="<?php echo base_url('vendor-package') ?>"><i class="fas fa-comments-dollar li-icon"></i>Package Request 
          <?php if($this->ci->preload->bypackage() > 0){
            echo '<span class="new badge">'. $this->ci->preload->bypackage() .'</span> ';
          } ?></a></li>
       <?php }
       if ($value == '8') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'free-quote'?'active':'' ?>"><a href="<?php echo base_url('free-quote') ?>"><i class="fas fa-file-alt li-icon"></i>Free Quote Request</a></li>
       <?php }
       if ($value == '9') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'newsletter-subcribers'?'active':'' ?>"><a href="<?php echo base_url('newsletter-subcribers') ?>"><i class="fas fa-user-plus li-icon"></i>Newsletter subcribers</a></li>
       <?php }
       if ($value == '10') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'testimonial'?'active':'' ?>">
          <a href="<?php echo base_url('testimonial') ?>"><i class="far fa-comment-dots li-icon"></i>Testimonial 
          <?php if($this->ci->preload->testimonial() > 0){
            echo '<span class="new badge">'. $this->ci->preload->testimonial() .'</span> ';
          } ?>
          </a>
        </li>
       <?php }
       if ($value == '11') { ?>
           <li class="<?php echo $this->uri->segment(1) == 'feedback'?'active':'' ?>">
          <a href="<?php echo base_url('feedback') ?>"><i class="fas fa-comment-slash li-icon"></i>Feedback 
          <?php if($this->ci->preload->feedback() > 0){
            echo '<span class="new badge">'. $this->ci->preload->feedback() .'</span> ';
          } ?>
          </a>
        </li>
       <?php }
       if ($value == '12') { ?>
           <li class="droup-link <?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a class="droup-link-item"><i class="fas fa-user-tie li-icon"></i>Career</a>
            <ul class="droupmenu">
              <li class="<?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a href="<?php echo base_url('career') ?>">Jobs</a></li>
              <li class="<?php echo $this->uri->segment(2) == 'applications'?'active':'' ?>"><a href="<?php echo base_url('career/applications') ?>">Applications</a></li>
            </ul>
      </li>
       <?php }
       if ($value == '13') { ?>
        <li class="<?php echo $this->uri->segment(1) == 'employees'?'active':'' ?>"><a href="<?php echo base_url('employees') ?>"><i class="fas fa-users-cog li-icon"></i>Employees</a></li>

         <?php }
         if ($value == '14') { ?>
          <li class="<?php echo $this->uri->segment(1) == 'vendors'?'active':'' ?>"><a href="<?php echo base_url('vendors/manage') ?>"><i class="fas fa-handshake li-icon"></i>Vendors</a></li>
        <?php } }?>

        <li class="<?php echo $this->uri->segment(1) == 'vendors-discount'?'active':'' ?>"><a href="<?php echo base_url('vendors-discount') ?>"><i class="fas fa-tags li-icon"></i>Discount Request
        <?php if($this->ci->preload->disccount() > 0){
            echo '<span class="new badge">'. $this->ci->preload->disccount() .'</span> ';
          } ?></a></li>



      </ul>
<?php  } ?>


   </div>
</div>