<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
</head>

<body >
    <div id="app">

        <?php $this->load->view('includes/header.php'); ?>

        <section class="contact-back sec">
            <div class="row">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">CONTACT US</h5>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluide">
                <div class="contact-form">
                    <div class="row m0">
                        <div class="col l7 back-con">
                            <div class="padd-con">
                                <div class="hch">
                                    <h6 class="white-text">How can we help you ?</h6>
                                    <p class="white-text">if you have any question about the site or need support,
                                        please fill out the form
                                    </p>
                                </div>
                                <div class="form-contact">
                                    <form action="<?php echo base_url('contact-us/insert') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="name" type="text" class="validate in-l con-us"
                                                            placeholder="Name" v-model="name" name="name" required="true" <?php echo (!empty($user['su_name']))?'value="'.$user['su_name'].'" readonly':'' ?>>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="email" type="text" class="validate in-l con-us"
                                                            placeholder="Email" v-model="name" name="email" required="true" <?php echo (!empty($user['su_email']))?'value="'.$user['su_email'].'" readonly':'' ?>>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="phone" type="text" class="validate in-l con-us"
                                                            placeholder="Phone" v-model="name" name="phone" required="true" <?php echo (!empty($user['su_phone']))?'value="'.$user['su_phone'].'" readonly':'' ?>>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="subject" type="text" class="validate in-l con-us"
                                                            placeholder="Subject" v-model="name" name="subject">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="uniq" value="<?php echo random_string('alnum',16); ?>">
                                            <div class="col l12 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" class="materialize-textarea con-us"
                                                            placeholder="Textarea" name="message"></textarea>
                                                        <!-- <label for="textarea1 white-text">Textarea</label> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l12 s12">
                                                <button class="whit-btn" type="submit" value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="back-add">
                            <div class="col l5">
                                <div class="address-detail">
                                    <div class="row m0 bor-bot">
                                        <div class="col l12 s12">
                                            <div class="padd-li">
                                                <div class="row m0">
                                                        <div class="col l1 s1">
                                                        <i class="material-icons">location_on</i>
                                                    </div>
                                                    <div class="col l11 s11">
                                                        <p class="m0">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing
                                                            elit.Aenen</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l12 s12">
                                            <div class="padd-li">
                                                <div class="row m0">
                                                    <div class="col l1 s1">
                                                        <i class="material-icons">mail</i>
                                                    </div>
                                                    <div class="col l11 s11">
                                                        <p class="m0">
                                                            support@shaadibaraati.com<br>info@shaadhibaraati.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l12 s12">
                                            <div class="padd-li">
                                                <div class="row m0">
                                                        <div class="col l1 s1">
                                                        <i class="material-icons">phone</i>
                                                    </div>
                                                    <div class="col l11 s11s">
                                                        <p class="m0">Toll Free : 18004199456</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="sec">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="col-tabs">
                        <ul class="collapsible">
                            <li class="active">
                                <div class="collapsible-header" style="font-weight: 600;">Vendors</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. .</span>

                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Marketing Collaborations</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. </span></div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Wedding Submissions</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. </span></div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Careers</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. </span></div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Customer</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. </span></div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec bg-col">
            <div class="container">
                <div class="row">
                    <div class="col l12">
                        <div class="vender-detail">
                            <h4>Get In Touch</h4>
                            <img src="assets/img/saprator.png" class="img-responsive " alt="">
                            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. </p>
                        </div>
                    </div>
                </div>
                <div class="touch-email">
                    <div class="row">
                        <div class="col l9 push-l2 m9 push-m2 s12">
                            <div class="row">
                                <div class="col l8 m8 s8">
                                    <div class="input-field if-mail">
                                        <input id="email" type="email" name="email" class="validate email-si"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col l4 m4 s4">
                                    <button class="btn-find-get">Get Start</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l7 push-l4 m7 push-m4 s12">
                                <div class="social-media ">
                                    <ul>
                                        <li><img src="assets/img/svg/facebook-brands.svg" class="img-responisve socil-icon"
                                                alt=""></li>
                                        <li><img src="assets/img/svg/twitter-brands.svg" class="img-responisve socil-icon"
                                                alt=""></li>
                                        <li><img src="assets/img/svg/pinterest-brands.svg" class="img-responisve socil-icon"
                                                alt=""></li>
                                        <li><img src="assets/img/svg/instagram-brands.svg" class="img-responisve socil-icon"
                                                alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>
</body>

</html>