<!DOCTYPE html>
<html>

<head>
    <title>Shaadi Baraati</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slimselect.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/landing.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/swiper.css">
    <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <!-- header -->
    <?php $this->load->view('includes/landing-header.php'); ?>
    <!-- end header -->

    <!-- banner -->
    <section class="landing-banner">
        <div class="container-fluide">
            <div class="row">
                <div class="col l5 m5 s12">
                    <div class="title-landing">
                        <h5>Find the Perfect WEDDING PLANER in Bangalore</h5>
                        <p>Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of templates. </p>
                    </div>
                    <div class="title-answer">
                        <h3>Answer 3 Questions & see best suitable planners</h3>
                    </div>
                </div>
                <div class="col l6 m6 s12">
                    <div class="form-slider">
                        <div class="filter-boxs">
                            <div class="slides">
                                <div id="slide-1" style="opacity: 1; width: 480px;" class="active">
                                    <div class="slide-header"><span class="point-no">1</span>
                                        <h2>What type of planning is required?</h2>
                                    </div>
                                    <span class="input-options next-one " data-option="1,2,3" data-field="#planning_options"><div class="filter-p1 type-label border-bottom vndr-ct-filtrflw-0-nxt-web"><h6>Full Wedding Planning</h6><span class="sub-text" style="pointer-events: none;">Booking all services + coordination + execution, etc.</span>
                                    <i class="material-icons">chevron_right</i>
                                </div>
                                </span>
                                <span class="input-options next-one" data-option="1,2,4" data-field="#planning_options"><div class="filter-p1 type-label border-bottom vndr-ct-filtrflw-0-nxt-web"><h6>Partial Planning</h6><span class="sub-text" style="pointer-events: none;">Booking 2-3 services OR just coordination OR just execution</span>
                                <i class="material-icons">chevron_right</i></div>
                            </span>
                        </div>
                        <div id="slide-2" class="" style="opacity: 1; width: 480px;">
                            <div class="slide-header">
                                <span class="point-no">2</span>
                                <h2>Your total wedding budget?</h2>
                            </div>
                            <span class="input-options next-two" data-option="1" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options border-bottom vndr-ct-filtrflw-1-nxt-web">Less than ₹ 15L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <span class="input-options next-two" data-option="2" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options border-bottom vndr-ct-filtrflw-1-nxt-web">₹ 15L - 30L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <span class="input-options next-two" data-option="3" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options border-bottom vndr-ct-filtrflw-1-nxt-web">₹ 30L - 60L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <span class="input-options next-two" data-option="4" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options vndr-ct-filtrflw-1-nxt-web">More than ₹ 60L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <div class="slide-footer">
                                <span class="input-options back-one" data-option="" data-field="#budget_options"><button class="action-back vndr-ct-filtrflw-1-bck-web"> <i class="material-icons arrow-btn">chevron_left</i> Back </button></span>
                            </div>
                        </div>
                        <div id="slide-3">
                            <div class="slide-header">
                                <span class="point-no">3</span>
                                <h2>Choose your event date</h2>
                            </div>
                            <div class="third-slide-container">
                                <div class="calender-container cc-date">
                                    <input type="text" id="datep" placeholder="Select Your Event Date">
                                    <span class="next-three"><div class="budget-label no-border third-slide-next-but pad-left but-slide-3-next input-options vndr-ct-filtrflw-2-nxt-web" data-option="" data-field="#event_dates">Dates not decided yet <i class="material-icons checker-btn">chevron_right</i></div></span>
                                </div>
                                <div class="slide-footer">
                                    <span class="back-two"><button class="action-back vndr-ct-filtrflw-2-bck-web"><i class="material-icons arrow-btn">chevron_left</i> Back </button></span>
                                    <span class="next-three"><button class="action-pink third-slide-next-but show-on-select vndr-ct-filtrflw-2-nxt-web">Submit</button></span>
                                </div>
                            </div>
                        </div>
                        <div id="slide-4" style="opacity: 0; width: 0px;" class="">
                            <div class="form-container">
                                <span class="result-found">
                            <span style="font-weight:400;">We have found</span>
                                <br>Lots of WEDDING PLANNERS
                                <span class="wow flip center" data-wow-iteration="100" data-wow-duration="1s">🎊</span>
                                <br>matching your requirements!
                                </span>
                                <p class="hide-on-phone">Signup to view them &amp; get quotes</p>
                                <form action="#" method="post" class="jqueryform2">
                                    <div class="field">
                                        <input type="text" name="fullname" id="fullname" required="">
                                        <label for="fullname">Name</label>
                                    </div>
                                    <div class="field">
                                        <input type="email" name="email" id="email" required="">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="field">
                                        <input type="tel" name="number" id="number" required="">
                                        <label for="number">Mobile Number</label>
                                    </div>
                                    <button class="action-pink-form" type="submit" value="submit">See Planners</button>
                                </form>
                                <p class="hide-on-phone">Want to change your requirements? - <button class="back-three action-empty-form back-slide-3 vndr-ct-filtrflw-edtrqmt-web">Go Back</button></p>
                                <!-- <button class="action-empty-form back-slide-3 vndr-ct-filtrflw-edtrqmt-web"><i class="fa left fa-angle-left"></i>Go Back &amp; Change</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        </div>
    </section>

    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="vender-detail">
                        <h4>About Us</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Shaadi Baraati was established to bring a real, high quality Online Wedding Market to Pan India Level. Our passion for excellence is what inspired us in the beginning and it continues to drive us today. We pride ourselves in the
                            superior experience of shopping in our Wedding Store and in the long-term relationships we’ve built with our customers. People come back to Shaadibaraati.com because they know they’ll find what they’re looking for on our shelves
                            - and if they don’t, we’ll help them find it. Getting a customer's satisfaction is very hard. But all the customers in Shaadi Bharaati gives a most satisfied feedback in their wedding. We provide a service based on the customers
                            need is a best thing we follow.</p>
                        <h2>" Because it’s your wedding, it should be unique! "</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec bg-col">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="vender-detail">
                        <h4>Wedding Vogue</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l4 m4 s12">
                    <div class="wed-dd">
                        <img src="assets/img/vender/wp3.jpg" class="img-responsive" alt="">
                        <div class="wed-pare">
                            <h3>Different Types of Bridal Makeup Looks to Bring</h3>
                            <p>Shaadi Baraati was established to bring a real, high quality Online Wedding Market to Pan India Level.</p>
                        </div>
                    </div>

                </div>
                <div class="col l4 m4 s12">
                    <div class="wed-dd">
                        <img src="assets/img/vender/wp3.jpg" class="img-responsive" alt="">
                        <div class="wed-pare">
                            <h3>Different Types of Bridal Makeup Looks to Bring</h3>
                            <p>Shaadi Baraati was established to bring a real, high quality Online Wedding Market to Pan India Level.</p>
                        </div>
                    </div>

                </div>
                <div class="col l4 m4 s12">
                    <div class="wed-dd">
                        <img src="assets/img/vender/wp3.jpg" class="img-responsive" alt="">
                        <div class="wed-pare">
                            <h3>Different Types of Bridal Makeup Looks to Bring</h3>
                            <p>Shaadi Baraati was established to bring a real, high quality Online Wedding Market to Pan India Level.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="center-align get-land">
                        <h4>Get In Touch</h4>
                        <p>Subscribe to Shaadi Baraati and Get access to our latest Blogs, Wedding Ideas and get the best quotes from trusted Wedding Vendors. </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="contatct-item">
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
                </div>
            </div>
        </div>
    </section>


    <div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
    <div id="div2" style="width:80px;height:80px;display:none;background-color:green;"></div><br>
    <div id="div3" style="width:80px;height:80px;display:none;background-color:blue;"></div>





















    <?php $this->load->view('includes/landing-footer.php'); ?>

    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/js/vue.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/swiper.js"></script>

    <script>
        $(function() {
            $("#datep").datepicker();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".datepicker-done").click(function() {
                $(".action-pink").css("display", "block");
            });
            $(".datepicker-cancel").click(function() {
                $(".action-pink").css("display", "none");
            });
        });
    </script>
</body>

</html>