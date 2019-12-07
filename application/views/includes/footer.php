       <section class="sec footer-wed">
        <div class="container-2">
           <div class="row m0">
               <div class="col s12 m12 l6 bfrb">
               
                    <div class="left-align">
                        <h4>Wed Assistance</h4>
                        <p>Assisted Wedding Planner is Assisted wedding services brought to you by Shaadi Baraati at One-time nominal fee starting at Rs.999/- that helps you plan your wedding with a unlimited qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind and Dedicated Relationship manager is assigned for each and every queries.Your dedicated relationship expert remains your single point of contact.</p>
                    </div>
                     
                    <div class="wed-bottom">
                        <div class="wed-bottom-inner">
                            <img src="<?php echo base_url()?>assets/img/icon/c.png" alt="">
                            <span>SEARCH</span>
                        </div>
                        <div class="wed-bottom-inner">
                            <img src="<?php echo base_url()?>assets/img/icon/b.png" alt="">
                            <span>SELECT</span>
                        </div>
                        <div class="wed-bottom-inner">
                            <span><img src="<?php echo base_url()?>assets/img/icon/a.png" alt=""></span>
                            <span>BOOK</span>
                        </div>
                    </div>
                    <div class="social-media ">
                        <ul>
                            <li><a href="https://www.facebook.com/shaadibaraatiofficial" taraget="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/facebook-brands.svg"
                                        class="img-responisve socil-icon" alt=""> </a></li>
                            <li><a href="https://www.twitter.com/shaadibaraati" taraget="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/twitter-brands.svg"
                                        class="img-responisve socil-icon" alt=""></a></li>
                            <li><a href="https://www.youtube.com/channel/UCdFxvtsmbh2mUrIGE5d7Txg"
                                    taraget="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/youtube.svg"
                                        class="img-responisve socil-icon" alt=""></a></li>
                            <li><a href="https://www.instagram.com/shaadibaraatiofficial/" taraget="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/instagram-brands.svg"
                                        class="img-responisve socil-icon" alt=""></a></li>
                        </ul>
                    </div>
               </div>
               <div class="col s12 m12 l6">
                    <div class="touch-email">
                     <div class="row">
                        <div class="col l12">
                            <div class="center-align">
                                <h4>Get In Touch</h4>
                                <p>Subscribe to Shaadi Baraati and Get access to our latest Blogs, Wedding Ideas and get the best quotes from trusted Wedding Vendors. </p>
                            </div>
                        </div>
                            <div class="col  s12">
                                <div class="row m0">
                                    <form ref="form"  @submit.prevent="checkForm" action="<?php echo base_url('subscribe') ?>" method="post" id="demo">
                                        <div class="col l8 m8 s8">
                                            <div class="input-field if-mail">
                                                <input id="email" type="email" name="email" class="validate email-si"
                                                    placeholder="Email" required="" @change="emailCheck" v-model="email">
                                                <span v-if="emailError != null" class="helper-text red-text">{{ emailError }}</span>
                                            </div>
                                        </div>
                                        <div class="col l4 m4 s4">
                                            <button type="submit" class="btn-find-get">Get Start</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="row contatct-item">
                                    <div class="col s6 m4">
                                        <p> <i class="material-icons">mail</i> </p>
                                        <p>Mail</p>
                                        <p><a href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a></p>
                                    </div>
                                    <div class="col s6 m4">
                                        <p> <i class="material-icons">call</i> </p>
                                        <p>Toll Free</p>
                                        <p><a href="tel:18004199456">1800 4199 456</a></p>
                                    </div>
                                    <div class="col s12 m4 smslayout">
                                        <p> <i class="material-icons">sms</i> </p>
                                        <p>For Details TYPE <b>"BARAATI"</b> space your name and send it to 567678080</p>
                                    </div>
                                </div>

                                
                                <div class="row m0 footerbutton">
                                    <div class="col s4">
                                        <a href="<?php echo base_url('free-quote') ?>" class="b1">Get Free Quote</a>
                                    </div>
                                    <div class="col s4">
                                        <a href="<?php echo base_url('vendor/register') ?>" class="b2">Register as Vendor</a>
                                    </div>
                                    <div class="col s4">
                                        <a href="https://pages.razorpay.com/pl_Ckj0SFClrYvOzF/view" class="b3">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                           

                        </div>
                    </div>
               </div>
               <div class="clearfix"></div>
               
           </div>
            
        </div>
    </section>
 
    <section class="sec-footer">
        <div class="container-fluide">
            <div class="row">
                
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Bangalore</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/bangalore/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Bangalore' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Delhi</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/delhi/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Delhi' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Indore</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/indore/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Indore' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                 <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Kolkata</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/kolkata/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Kolkata' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div> 
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Hyderabad</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/hyderabad/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Hyderabad' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot">
                        <h6>Vendor Categories</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/all/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot">
                        <h6>Vendor Cities</h6>
                        <div class="line"></div>
                        <ul class="col-c2">
                        <?php $this->load->model('m_home');
                           $city = $this->m_home->getCity();
                            if (!empty($city)) {
                                foreach ($city as $key1 => $value1) { ?>
                                <li><a class="hov-a" href="<?php echo base_url('vendors/').str_replace(" ","-",strtolower($value1->city)) ?>"><?php echo $value1->city ?></a></li>
                               <?php } } ?>
                        </ul>
                    </div>
                </div>

                
                <div class="col l3">
                    <div class="list-foot">
                        <h6>Quick Links</h6>
                        <div class="line"></div>
                        <ul>
                            <a href="<?php echo base_url('about-us') ?>" ><li class="hov">About Us</li></a>
                            <a href="<?php echo base_url('contact-us') ?>" ><li class="hov">Contact Us</li></a>
                            <a href="<?php echo base_url('privacy-policy') ?>" ><li class="hov">Privacy Policy</li></a>
                            <a href="<?php echo base_url('terms-conditions') ?>" ><li class="hov">Terms & Conditions</li></a>
                            <a href="<?php echo base_url() ?>testimonial" ><li class="hov">Testimonial</li></a>
                            <!-- <a href="#" ><li class="hov">wedding Destination</li></a> -->
                            <!-- <a href="#" ><li class="hov">Vendor Reviews</li></a> -->
                            <!-- <a href="#" ><li class="hov">E-Invite</li></a> -->
                            <a href="<?php echo base_url() ?>feedback" ><li class="hov">Feedback / Complaints</li></a>
                            <a href="<?php echo base_url() ?>site-map" ><li class="hov">Sitemap</li></a>
                            <a href="<?php echo base_url() ?>career" ><li class="hov">Career</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="coptext">
            <p>© Shaadibaraati.com <?php echo date('Y'); ?>. All right reserved by Baraati Media & Entertainment Pvt Ltd   <a href="<?php echo base_url('terms-conditions') ?>">Terms & Conditions</a>  <a href="<?php echo base_url('privacy-policy') ?>" >Privacy Policy</a></p>
        </div>
    </section>
   