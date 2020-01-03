<div class="col s12 m4 l3">
    <div class="sidemenu">
        <div class="card-panel   profile-box">
            <a href="<?php echo base_url('profile')?>" class=" pb-edit btn-floating btn-flat waves-effect waves-light"><i
            class="material-icons">edit</i></a>
            <div class="pb-pic">
                <?php $this->load->model('m_account');
                $profile = $this->m_account->profile_pic($this->session->userdata('shdid'));
                ?>
                <img src="<?php echo (!empty($profile->su_profile_file))?$profile->su_profile_file:'https://anthemunited.com/app/uploads/2016/12/steve-lepan.jpg' ?>" alt="">
            </div>
            <div class="pb-content center-align">
                <h6 class="white-text "><?php echo (!empty($profile->su_name))?ucfirst($profile->su_name):'' ?></h6>
            </div>
        </div>
        <div class="">
            <ul class="sidemenu-list-container z-depth-1">
                <li>
                    <a href="<?php echo base_url('profile') ?>" class="<?php if( ($this->uri->segment(1)=="profile") && ($this->uri->segment(2) == '') ){echo "active";}?>"> <i class=" material-icons ">person</i> Profile</a>
                </li>
                <li>
                    <a href="<?php echo base_url('profile/shortlisted-vendor') ?>" class="<?php if(($this->uri->segment(1)=="profile") && ($this->uri->segment(2) == 'shortlisted-vendor')){echo "active";}?>"><i class=" material-icons ">favorite</i> Shortlisted Vendor's</a>
                </li>
                <li>
                    <a href="<?php echo base_url('profile/enquired-vendors') ?>" class="<?php if(($this->uri->segment(1)=="profile") && ($this->uri->segment(2) == 'enquired-vendors')){echo "active";}?>"><i class=" material-icons ">comment</i> Enquired Vendor's </a>
                </li>
                <li>
                    <ul class="collapsible sidemenu-list-container ">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">filter_drama</i> E - Invite</div>
                            <ul class="collapsible-body grey lighten-4 p0">
                                <li>
                                    <a href="<?php echo base_url('select-theme') ?>" class="<?php if(($this->uri->segment(1)=="select-theme")){echo "grey lighten-1";}?>"><i class="material-icons"> insert_invitation </i> Select theme</a> 
                                </li>
                                <li>
                                    <a href="<?php echo base_url('bide-groom') ?>" class="<?php if(($this->uri->segment(1)=="bide-groom")){echo "grey lighten-1"; }?>"><i class="material-icons"> supervised_user_circle </i> Groom & Bride Details</a> 
                                </li>
                                <li>
                                    <a href="<?php echo base_url('invite-event') ?>" class="<?php if(($this->uri->segment(1)=="invite-event")){echo "grey lighten-1";}?>"><i class="material-icons"> emoji_nature </i> Wedding Event</a> 
                                </li>
                                <li>
                                    <a href="<?php echo base_url('family-member') ?>" class="<?php if(($this->uri->segment(1)=="family-member")){echo "grey lighten-1";}?>"><i class="material-icons"> supervised_user_circle </i> Family Members</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('wedding-photo') ?>" class="<?php if(($this->uri->segment(1)=="wedding-photo")){ echo "grey lighten-1"; }?>"><i class="material-icons"> photo_library </i> Wedding Photos</a> </li>
                                <li>
                                    <a href="<?php echo base_url('wedding-information') ?>" class="<?php if(($this->uri->segment(1)=="wedding-information")){ echo "grey lighten-1";}?>"><i class="material-icons"> perm_device_information </i> RSVP</a> 
                                </li>
                                <!-- <li>
                                    <a href="<?php echo base_url('wedding-information') ?>" class="<?php if(($this->uri->segment(1)=="wedding-information")){ echo "grey lighten-1";}?>"><i class="material-icons"> settings_input_composite </i> My Website</a> 
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>