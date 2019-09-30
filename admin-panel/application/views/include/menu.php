
 <div class="col l3 m12 s12">

   <div class="side-bar white z-depth-1">
      <ul class="li-list ">
        <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'users'?'active':'' ?>"><a href="<?php echo base_url('users/manage') ?>"><i class="fas fa-users li-icon"></i>Manage Users</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'cities'?'active':'' ?>"><a href="<?php echo base_url('cities/manage') ?>"><i class="fas fa-city li-icon"></i>Cities</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a href="<?php echo base_url('category/manage') ?>"><i class="fas fa-th-list li-icon"></i>Category</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'vendors'?'active':'' ?>"><a href="<?php echo base_url('vendors/manage') ?>"><i class="fas fa-handshake li-icon"></i>Vendors</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'enquiries'?'active':'' ?>"><a href="<?php echo base_url('enquiries') ?>"><i class="fas fa-comments li-icon"></i>Enquiries</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'vendor-enquiry'?'active':'' ?>"><a href="<?php echo base_url('vendor-enquiry') ?>"><i class="fas fa-comments li-icon"></i>Vendor Enquiry</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'free-quote'?'active':'' ?>"><a href="<?php echo base_url('free-quote') ?>"><i class="fas fa-file-alt li-icon"></i>Free Quote Request</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'newsletter-subcribers'?'active':'' ?>"><a href="<?php echo base_url('newsletter-subcribers') ?>"><i class="fas fa-user-plus li-icon"></i>Newsletter subcribers</a></li>
        

        
        <!-- <li class=""><a href=""><i class="fas fa-briefcase li-icon"></i>Form</a></li>
        <li class=""><a href=""><i class="fab fa-black-tie li-icon"></i>Manage Jobs</a></li>
        <li class=""><a href=""><i class="fas fa-hand-holding-usd li-icon"></i>Manage Price</a></li>
        <li class=""><a href=""><i class="fas fa-search li-icon"></i>Candidate Search</a></li>
        <li class=""><a href=""><i class="fas fa-file-signature li-icon"></i>Cv Writing</a></li>
        <li class=""><a href=""><i class="fas fa-file-alt li-icon"></i>Psychometric Test</a></li>
        <li class=""><a href=""><i class="fas fa-share-alt li-icon"></i>Blog</a></li>
        <li class=""><a href=""><i class="far li-icon fa-comments"></i>Testimonial</a></li>
        <li class=""><a href=""><i class="fas  li-icon fa-handshake"></i>Partners enquiry</a></li>
        <li class=""><a href=""><i class="fas fa-user-plus li-icon"></i>Add New Admin</a></li>  -->
       
      </ul>
   </div>
</div>