<section class="sec-footer">
        <div class="container-fluide">
            <div class="row">
                <div class="col l2">
                    <div class="list-foot">
                        <h6>Quick Links</h6>
                        <div class="line"></div>
                        <ul>
                            <a href="" ><li class="hov">About Us</li></a>
                            <a href="" ><li class="hov">Contact Us</li></a>
                            <a href="" ><li class="hov">Wedding Gallery</li></a>
                            <a href="" ><li class="hov">Real Wedding</li></a>
                            <a href="" ><li class="hov">Testimonial</li></a>
                            <a href="" ><li class="hov">wedding Destination</li></a>
                            <a href="" ><li class="hov">Franchise Proposal</li></a>
                            <a href="" ><li class="hov">Vendor Reviews</li></a>
                            <a href="" ><li class="hov">E-Invite</li></a>
                            <a href="" ><li class="hov">Feedbacck / Complaints</li></a>
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
                            <li class=""><a href="#" class="hov-a"><?php echo $value->category ?></a></li>
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
            <p> © <?php echo date('Y'); ?> All rights Reserved by Shaadi baraati, Developed by <a href="https://www.5ines.com/">5ine</a></p>
        </div>
    </section>