<div class="col l3 m4 s12">
    <div class="left-vendor-menu b-sho white">
        <ul class="vendor-dash-list">
            <li class="">
                <a href="<?php echo base_url('vendor/profile') ?>" class="<?php echo ($this->uri->segment(2) =='profile' && $this->uri->segment(1) =='vendor')?'active':'' ?>"><i class=" material-icons vender-icon">person</i> Business Profile</a>
            </li>
            <li>
                <a  href="<?php echo base_url('vendor/leads') ?>" class="<?php echo ($this->uri->segment(2) =='leads' && $this->uri->segment(1) =='vendor')?'active':'' ?>"><i class=" material-icons vender-icon">insert_drive_file</i> Leads <?php echo (!empty(leads()))?'<span class="count-badge">'.leads().'</span>':''; ?></a>
            </li>
            <li>
                <a  href="<?php echo base_url('vendor/change-password') ?>" class="<?php echo ($this->uri->segment(2) =='change-password' && $this->uri->segment(1) =='vendor')?'active':'' ?>"><i class=" material-icons vender-icon">vpn_key</i> Change Password</a>
            </li>
            <li>
                <a  href="<?php echo base_url('vendor/reviews') ?>" class="<?php echo ($this->uri->segment(2) =='reviews' && $this->uri->segment(1) =='vendor')?'active':'' ?>"><i class=" material-icons vender-icon">rate_review</i> Reviews</a>
            </li>
            <li>
                <a  href="<?php echo base_url('vendor/package') ?>" class="<?php echo ($this->uri->segment(2) =='package' && $this->uri->segment(1) =='vendor')?'active':'' ?>"><i class=" material-icons vender-icon">local_offer</i> Buy Packages</a>
            </li>

            <li class="droup-link <?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a class="droup-link-item"><i class="fas fa-user-tie li-icon"></i>Career</a>
            <ul class="droupmenu">
              <li class="<?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a href="<?php echo base_url('career') ?>">Jobs</a></li>
              <li class="<?php echo $this->uri->segment(2) == 'applications'?'active':'' ?>"><a href="<?php echo base_url('career/applications') ?>">Applications</a></li>
            </ul>
      </li>
      
        </ul>
    </div>
</div>