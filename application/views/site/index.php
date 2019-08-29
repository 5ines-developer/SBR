<!DOCTYPE html>
<html>

<head>
    <title>Shaadi Baraati</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <!-- header -->
    <?php $this->load->view('includes/header.php'); ?>
    <!-- end header -->
    <section>
        <div class="row">
            <div class="banner-img">
                <img src="<?php echo base_url() ?>assets/img/banner.jpg" class="img-responsive" width="100%" alt="">
                <div class="lec-search">
                    <h5>Your Online Wedding Market</h5>
                    <p>Find the best wedding vendors with thousands of trusted reviews</p>
                    <div class="row hide-on-small-only">
                        <form action="<?php echo base_url()?>vendors" method="post" id="search-form">

                            <div class="form-search">
                                <div class="container">
                                    <div class="col l4  mp">
                                        <div class="input-field if-fil">
                                            <select class="" name="q" id="sel-city">
                                                <option value="" selected>Select City</option>
                                                <?php if (!empty($city)) {
                                                    foreach ($city as $citys => $cities) { ?>
                                                      <option value="<?php echo $cities->city ?>"><?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                                <?php   } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col l6 mp">
                                        <div class="input-field  if-fil-sel">
                                            <select name="ct" class="" id="sel-cato">
                                            <option value="" selected>Select Category</option>
                                            <?php if (!empty($category)) {
                                                    foreach ($category as $categorys => $categories) { ?>
                                                      <option value="<?php echo $categories->category ?>"><?php echo (!empty($categories->category))?$categories->category:''; ?></option>
                                                <?php   } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col l2 mp">
                                        <div class="input-field ">
                                            <button type="submit" class="btn-find">Get Start</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-col">
        <section>
            <div class="container-city">
                <div class="col 12">
                    <div class="top-cities">
                        <h4>Top Cities</h4>
                        <p>Find the best Vender Cities with thousands of trusted reviews</p>
                        <div class="top-city-slide">
                            <div class="top-citys">
                                <?php 

                                if (!empty($city)) { 
                                    foreach ($city as $key => $value) { ?>
                                <div class="top-city-sl">
                                    <center><img src="<?php echo (!empty($value->image))?$value->image:''  ?>" class="img-responsive city-icon"
                                            alt="">
                                    </center>
                                    <p><?php echo (!empty($value->city))?$value->city:''  ?></p>
                                </div>
                                <?php } }?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12">
                        <div class="vender-detail">
                            <h4>Venders Categories</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis
                                parturient montes, nascetur ridiculus mus. </p>
                        </div>
                    </div>
                </div>
                <div class="vender-list">
                    <div class="row">
                        <?php if (!empty($category)) {
                    foreach ($category as $cat => $cats) { ?>
                        <div class="col l4 s6">
                            <div class="vender-im">
                                <img src="<?php echo (!empty($cats->image))?$cats->image:''  ?>" class="img-responsive"
                                    width="100%" alt="">
                                <div class="title-ven">
                                    <p class="m0"><?php echo (!empty($cats->category))?$cats->category:''  ?></p>
                                </div>
                            </div>
                        </div>
                         <?php    } } ?>
                    </div>
                    <center><button class="btn-cate">View All Categories</button></center>

                </div>
            </div>
        </section>
    </div>
    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>How It's Works</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus. </p>
                    </div>
                </div>
            </div>
            <div class="work-detail">
                <div class="row">
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/dumm.png" class="img-responsive" alt="">
                            <h6>Find</h6>
                            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis
                                parturient montes, nascetur ridiculus mus.</p>
                            <p class="cr">1</p>
                        </div>
                    </div>
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/dumm.png" class="img-responsive" alt="">
                            <h6>Select</h6>
                            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis
                                parturient montes, nascetur ridiculus mus.</p>
                            <p class="cr">2</p>
                        </div>
                    </div>
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/dumm.png" class="img-responsive" alt="">
                            <h6>Book</h6>
                            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis
                                parturient montes, nascetur ridiculus mus.</p>
                            <p class="cr">3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec bg-col">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>E-Invite</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis
                            parturient montes, nascetur ridiculus mus. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="vender-list">
                    <div class="row">
                        <div class="col l3 s6">
                            <a href="">
                                <div class="vender-ei">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei1.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Mehndi</h6>
                                        <p class="m0">Aenean commodo ligula eget dolor. Aenean massa.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6">
                            <a href="">
                                <div class="vender-ei">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei2.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Engagement</h6>
                                        <p class="m0">Aenean commodo ligula eget dolor. Aenean massa.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6">
                            <a href="">
                                <div class="vender-ei">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei3.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Wedding</h6>
                                        <p class="m0">Aenean commodo ligula eget dolor. Aenean massa.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6">
                            <a href="">
                                <div class="vender-ei">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei4.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Reception</h6>
                                        <p class="m0">Aenean commodo ligula eget dolor. Aenean massa.</p>
                                    </div>
                                </div>
                            </a>
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
                    <div class="vender-detail">
                        <h4>Happy Couple's</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis
                            parturient montes, nascetur ridiculus mus. </p>
                    </div>
                </div>
            </div>
            <div class="test-com">
                <div class="row">
                    <div class="col l4 s12 m12">
                        <div class="happy-cop">
                            <img src="<?php echo base_url() ?>assets/img/testimonial.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col l8 s12 m12">
                        <div class="testimonial-wedd">
                            <div class="testi-coup">
                                <center><img src="<?php echo base_url() ?>assets/img/tes.png" class="img-responsive"
                                        alt=""></center>
                                <h6 class="black-text">Wedding Party</h6>
                                <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                    magnis
                                    dis
                                    parturient montes, nascetur ridiculus mus. </p>
                                <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                        class="img-responsive"> </center>
                                <p class="cr">26-07-2019</p>
                            </div>
                            <div class="testi-coup">
                                <center><img src="<?php echo base_url() ?>assets/img/tes.png" class="img-responsive"
                                        alt=""></center>
                                <h6 class="black-text">Wedding Party</h6>
                                <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                    magnis
                                    dis
                                    parturient montes, nascetur ridiculus mus. </p>
                                <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                        class="img-responsive"> </center>
                                <p class="cr">26-07-2019</p>
                            </div>
                            <div class="testi-coup">
                                <center><img src="<?php echo base_url() ?>assets/img/tes.png" class="img-responsive"
                                        alt=""></center>
                                <h6 class="black-text">Wedding Party</h6>
                                <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                    magnis
                                    dis
                                    parturient montes, nascetur ridiculus mus. </p>
                                <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                        class="img-responsive"> </center>
                                <p class="cr">26-07-2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sec bg-col">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col l12">
                        <div class="vender-detail">
                            <h4>Real Wedding Storie's</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis
                                parturient montes, nascetur ridiculus mus. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="">
                    <div class="wedding-list">
                        <div class="wedding-detail">
                            <img src="<?php echo base_url() ?>assets/img/real-wedding/rw1.jpg"
                                class="img-responsive icn-real" width="100%" alt="">
                            <div class="title-real-wedding">
                                <h6 class="white-text">Naveen </h6>
                                <p class="m0">Bangalore</p>
                            </div>
                        </div>
                        <div class="wedding-detail">
                            <img src="<?php echo base_url() ?>assets/img/real-wedding/rw2.jpg"
                                class="img-responsive icn-real" width="100%" alt="">
                            <div class="title-real-wedding">
                                <h6 class="white-text">Naveen </h6>
                                <p class="m0">Bangalore</p>
                            </div>
                        </div>
                        <div class="wedding-detail">
                            <img src="<?php echo base_url() ?>assets/img/real-wedding/rw3.jpg"
                                class="img-responsive icn-real" width="100%" alt="">
                            <div class="title-real-wedding">
                                <h6 class="white-text">Naveen </h6>
                                <p class="m0">Bangalore</p>
                            </div>
                        </div>
                        <div class="wedding-detail">
                            <img src="<?php echo base_url() ?>assets/img/real-wedding/rw4.jpg"
                                class="img-responsiveicn-real" width="100%" alt="">
                            <div class="title-real-wedding">
                                <h6 class="white-text">Naveen </h6>
                                <p class="m0">Bangalore</p>
                            </div>
                        </div>
                        <div class="wedding-detail">
                            <img src="<?php echo base_url() ?>assets/img/real-wedding/rw5.jpg"
                                class="img-responsiveicn-real" width="100%" alt="">
                            <div class="title-real-wedding">
                                <h6 class="white-text">Naveen </h6>
                                <p class="m0">Bangalore</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>Our Blogs</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive " alt="">
                        <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis parturient montes, nascetur ridiculus mus. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l4 m4 s12">
                    <div class="blog-detail">
                        <img src="<?php echo base_url() ?>assets/img/vender/wp6.jpg" alt=""
                            class="img-responsive blog-img">
                        <div class="blog-li">
                            <h6 class="black-text">15 BRILLIANT WEDDING</h6>
                            <P class="date-blog cr">3 JUN 2018</P>
                            <P>Aenean commodo ligula eget dolor. Aenean natoque penatibus et magnis
                                dis parturient montesmassa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. </P>
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s12">
                    <div class="blog-detail">
                        <img src="<?php echo base_url() ?>assets/img/vender/wp3.jpg" alt=""
                            class="img-responsive blog-img">
                        <div class="blog-li">
                            <h6 class="black-text">15 BRILLIANT WEDDING</h6>
                            <P class="date-blog cr">3 JUN 2018</P>
                            <P>Aenean commodo ligula eget dolor. Aenean natoque penatibus et magnis
                                dis parturient montesmassa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. </P>
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s12">
                    <div class="blog-detail">
                        <img src="<?php echo base_url() ?>assets/img/vender/wp.jpg" alt=""
                            class="img-responsive blog-img">
                        <div class="blog-li">
                            <h6 class="black-text">15 BRILLIANT WEDDING</h6>
                            <P class="date-blog cr">3 JUN 2018</P>
                            <P>Aenean commodo ligula eget dolor. Aenean natoque penatibus et magnis
                                dis parturient montesmassa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. </P>
                        </div>
                    </div>
                </div>
            </div>
            <center><button class="btn-cate">View All </button></center>
        </div>
    </section>
    <section class="sec bg-col">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>Get In Touch</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive " alt="">
                        <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis parturient montes, nascetur ridiculus mus. </p>
                    </div>
                </div>
            </div>
            <div class="touch-email">
                <div class="row">
                    <div class="col l9 push-l2 m9 push-m2 s12">
                        <div class="row">
                            <form action="<?php echo base_url('subscribe') ?>" method="post" id="demo">
                            <div class="col l8 m8 s8">
                                <div class="input-field if-mail">
                                    <input id="email" type="email" name="email" class="validate email-si"
                                        placeholder="Email" required="" @change="emailCheck" v-model="email">
                                        <span class="helper-text red-text" >{{ emailError }}</span>
                                </div>
                            </div>
                            <div class="col l4 m4 s4">
                                <button type="submit" class="btn-find-get">Get Start</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l7 push-l4 m7 push-m4 s12">
                            <div class="social-media ">
                                <ul>
                                    <li><img src="<?php echo base_url() ?>assets/img/svg/facebook-brands.svg"
                                            class="img-responisve socil-icon" alt=""></li>
                                    <li><img src="<?php echo base_url() ?>assets/img/svg/twitter-brands.svg"
                                            class="img-responisve socil-icon" alt=""></li>
                                    <li><img src="<?php echo base_url() ?>assets/img/svg/pinterest-brands.svg"
                                            class="img-responisve socil-icon" alt=""></li>
                                    <li><img src="<?php echo base_url() ?>assets/img/svg/instagram-brands.svg"
                                            class="img-responisve socil-icon" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('includes/footer'); ?>
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);

        // nav
        var sidenav = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(sidenav);

    });

    // top-cities
    $('.top-citys').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    // testimonial
    $('.testimonial-wedd').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: '<span class="next"><i class="Tiny material-icons ll">chevron_left</i></span>',
        prevArrow: '<span class="prev"><i class="Tiny material-icons rr">chevron_right</i></span>',


    });
    // real-wedding
    $('.wedding-list').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: false,
        prevArrow: false,
        dots: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]

    });
    </script>
    <script>
        var demo = new Vue({
            el: '#demo',
            data: {
                email: '',
                emailError:'',
            },

            methods: {
                // mobile number check on database
                // email check on database
                emailCheck(){
                    this.emailError = '';
                    const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>home/emailcheck', formData)
                    .then(response => {
                        if(response.data == '1'){
                            this.emailError = 'You are already subscribed.';
                        }else{
                            this.emailError = '';
                        }
                    })
                    .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
                    },
                checkForm(){
                   if((this.cpswerror == '') && (this.phoneError == '') && (this.emailError =='')){

                       
                        this.$refs.form.submit()
                   }else{
                   }
                }
            },
        });



        // for submit and change the url

        $(document).ready(function(){
            $(document).on('change','#sel-city,#sel-cato',function(e){
                e.preventDefault();

                var cityval = $('#sel-city').children("option:selected").val();
                var city    = cityval.toLowerCase();
                var categoryval = $('#sel-cato').children("option:selected").val();
                var cat         = categoryval.toLowerCase();
                if (city == '') {
                    var finalUrl = '<?php echo base_url()?>vendors/all/'+cat; 
                }else{
                    var finalUrl = '<?php echo base_url()?>vendors/'+city+'/'+cat; 
                }
                var url = finalUrl.replace(" ","-",);
                $("#search-form").attr('action',url);
            });

        });
    </script>
</body>

</html>