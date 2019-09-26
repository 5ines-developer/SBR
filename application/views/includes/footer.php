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
                                <div class="row">
                                    <form ref="form"  @submit.prevent="checkForm" action="<?php echo base_url('subscribe') ?>" method="post" id="demo">
                                        <div class="col l8 m8 s8">
                                            <div class="input-field if-mail">
                                                <input id="email" type="email" name="email" class="validate email-si"
                                                    placeholder="Email" required="" @change="emailCheck" v-model="email">
                                                <span class="helper-text red-text">{{ emailError }}</span>
                                            </div>
                                        </div>
                                        <div class="col l4 m4 s4">
                                            <button type="submit" class="btn-find-get">Get Start</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="bottom-button">
                                    <a class="b1">Submit Wedding</a>
                                    <a class="b2">Register as Vendor</a>
                                    <a class="b3">Pay Now</a>

                                </div>
                            </div>
                           

                        </div>
                    </div>
               </div>
               <div class="clearfix"></div>
               <div class="col l7 push-l4 m7 push-m4 s12">
           
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
           </div>
            
        </div>
    </section>
 
    <section class="sec-footer">
        <div class="container-fluide">
            <div class="row">
                <div class="col l2">
                    <div class="list-foot">
                        <h6>Quick Links</h6>
                        <div class="line"></div>
                        <ul>
                            <a href="" ><li class="hov">About Us</li></a>
                            <a href="<?php echo base_url('contact-us') ?>" ><li class="hov">Contact Us</li></a>
                            <a href="<?php echo base_url('privacy-policy') ?>" ><li class="hov">Privacy Policy</li></a>
                            <a href="<?php echo base_url('terms-conditions') ?>" ><li class="hov">Terms & Conditions</li></a>
                            <a href="" ><li class="hov">Testimonial</li></a>
                            <a href="" ><li class="hov">wedding Destination</li></a>
                            <a href="" ><li class="hov">Vendor Reviews</li></a>
                            <a href="" ><li class="hov">E-Invite</li></a>
                            <a href="" ><li class="hov">Feedback / Complaints</li></a>
                            <a href="" ><li class="hov">Sitemap</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col l5">
                    <div class="list-foot vl">
                        <h6>Vender Categories</h6>
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
                <div class="col l5">
                    <div class="list-foot vc">
                        <h6>Vendor Cities</h6>
                        <div class="line"></div>
                        <ul>
                        <?php $this->load->model('m_home');
                           $city = $this->m_home->getCity();
                            if (!empty($city)) {
                                foreach ($city as $key1 => $value1) { ?>
                                <li><a class="hov-a" href="<?php echo base_url('vendors/').$value1->city?>"><?php echo $value1->city ?></a></li>
                               <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="coptext">
            <p> © <?php echo date('Y'); ?> Shaadi baraati, All rights reserved. Developed by <a href="https://www.5ines.com/">5ine</a></p>
        </div>
    </section>