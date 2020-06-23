<!DOCTYPE html>
<html>

<head>
    <?php
    $seo = seo();
    $m_titl = '';
    $m_descp = '';
    $m_key = '';
    $m_can = '';

    if (!empty($seo[0])) {
        foreach ($seo as $key => $value) {
            if($value->page == 'Home' || $value->page == 'home'){
                $m_titl     = $value->title;
                $m_descp    = $value->m_desc;
                $m_key      = $value->keywords;
                $m_can      = $value->can_link; 
            }
        }
    }
    ?>

    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $m_descp ?>" />
    <link rel="canonical" href="<?php echo $m_can ?>" />
    <meta name="keywords" content="<?php echo $m_key ?>" />
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <meta name="p:domain_verify" content="14689d3a8168f4758e45146daa554c8b"/>
    <title><?php echo $m_titl ?> | Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slimselect.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
    

</head>

<body>
    <!-- header -->
    <?php $this->load->view('includes/header.php'); ?>
    <!-- end header -->
    <section class="hom-bannr">
        <div class="row">
            <div class="banner-img">
                <img src="<?php echo base_url() ?>assets/img/banner.png" class="img-responsive" width="100%" alt="">
                <div class="lec-search">
                    <h1 class="hide-on-small-only">India's Most Trusted Online Wedding Market</h1>
                    <p class="hide-on-small-only">Find the best wedding vendors with thousands of trusted reviews</p>
                    <div class="row">
                        <form action="<?php echo base_url()?>vendors" method="post" id="search-form">
                            <div class="form-search">
                                <div class="container">
                                    <div class="col  s4 m4 mp">
                                        <div class="input-field if-fil">
                                            <select class="" name="q" id="sel-city">
                                                <option value="" selected>City</option>
                                                <?php if (!empty($city)) {
                                                    foreach ($city as $citys => $cities) { ?>
                                                <option value="<?php echo $cities->city ?>"> <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                                <?php   } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col  m6 s4 mp">
                                        <div class="input-field  if-fil-sel">
                                            <select name="ct" class="" id="sel-cato">
                                                <option value="" selected>Category</option>
                                                <?php if (!empty($category)) {
                                                    foreach ($category as $categorys => $categories) { ?>
                                                <option value="<?php echo $categories->category ?>"> <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                                <?php   } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col  m2 s4 mp">
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
                        <p>Find the best Vendor Cities with thousands of trusted reviews</p>
                        <div class="top-city-slide">

                            <div class="top-citys">
                                <?php 

                                if (!empty($city)) { 
                                    foreach ($city as $key => $value) { 
                                    $ctlink = strtolower(str_replace(" ","-",$value->city));
                                    if (!empty($value->image)) {
                                ?>
                                <a href="<?php echo base_url('vendors/').$ctlink ?>" class="black-text">
                                    <div class="top-city-sl">
                                        <center><img src="<?php echo (!empty($value->image))?$value->image:''  ?>"
                                                class="img-responsive city-icon" alt="">
                                        </center>
                                        <p><?php echo (!empty($value->city))?$value->city:''  ?></p>
                                    </div>
                                </a>
                                <?php } } }?>

                                <a href="#citymodel" class="modal-trigger">
                                    <div class="top-city-sl city-more" style="height: 153px;">
                                        <div class="viewall-button">
                                            <i class="material-icons">arrow_forward</i>
                                        </div>
                                        <p>VIEW ALL</p>
                                    </div>
                                </a>


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
                        <div class="vender-detail">
                            <h4>Vendors Categories</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Find trusted wedding services in all Indian cities & Book Verified Vendors in simple steps. </p>
                        </div>
                    </div>
                </div>
                <div class="vender-list">
                    <div class="row">
                        <?php if (!empty($category)) {
                    foreach ($category as $cat => $cats) { 
                        if($cat < 6)   {
                            $clink = strtolower(str_replace(" ","-",$cats->category));
                    ?>
                        <div class="col l4 s6 ">
                            <a href="<?php echo base_url().'vendors/all/'.urlencode($clink)?>">
                                <div class="vender-im hoverable">
                                    <img src="<?php echo (!empty($cats->image))?$cats->image:''  ?>" class="img-responsive" width="100%" alt="<?php echo (!empty($cats->category))?$cats->category:''  ?>">
                                    <div class="title-ven">
                                        <p class="m0"><?php echo (!empty($cats->category))?$cats->category:''  ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php    } } }?>
                    </div>
                    <center><a href="<?php echo base_url() ?>categories"><button class="btn-cate">View All
                                Categories</button></a></center>

                </div>
            </div>
        </section>
    </div>
    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col s12">
                    <div class="vender-detail">
                        <h4>How It's Works</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Book the Best Verified Vendors according to you requirement in 3 Simple Steps.</p>
                    </div>
                </div>
            </div>
            <div class="work-detail">
                <div class="row">
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/icon/c.png" class="img-responsive" alt="">
                            <h6>SEARCH</h6>
                            <p>Get Quotations, Compare, And Book The Best Vendor For Your Wedding.</p>
                            <!-- <p class="cr">1</p> -->
                        </div>
                    </div>
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/icon/b.png" class="img-responsive" alt="">
                            <h6>SELECT</h6>
                            <p>Select The Preferred Vendors And Send Your Requirements To Them.</p>
                            <!-- <p class="cr">2</p> -->
                        </div>
                    </div>
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/icon/a.png" class="img-responsive " alt="">
                            <h6>BOOK</h6>
                            <p>Get Quotations, Compare, And Book The Best Vendor For Your Wedding.</p>
                            <!-- <p class="cr">3</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="h-wed-assistance sec bg-col pb-0">
        <div class="">
            <div class="row m0">
                <div class="col s12 l12">
                    <div class="vender-detail">
                        <h4>What is Wedz Assistance ?</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Plan your dream wedding with the help of our wedding planning experts. </p>
                    </div>
                </div>
                <div class="col s12 no-padding">
                            
                    <div class="h-wed-slider">

                        
                        <div class="hwed-item">
                            <div class="row m0" >
                                <a href="<?php echo base_url()?>wed-assistance"  class="modal-trigger">
                                    <img class="img-responsive as-img" src="<?php echo base_url('assets/img/free-assistance.png')?>" alt="">
                                </a>
                            </div>
                        </div>


                        <div class="hwed-item">
                            <div class="row m0" >
                                <a href="<?php echo base_url()?>wed-assistance"  class="modal-trigger">
                                    <img class="img-responsive as-img" src="<?php echo base_url('assets/img/assistance2.jpg')?>" alt="">
                                </a>
                            </div>
                        </div>
                           
                        <div class="hwed-item">
                            <div class="row m0" >
                                <a href="<?php echo base_url()?>wed-assistance" target="_blank" class="modal-trigger">
                                    <img class="img-responsive as-img" src="<?php echo base_url('assets/img/asistance1.jpg')?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                        
    </section>

<?php if (!empty($ban) && (count($ban) ==4 || count($ban) ==2)) {
    $img1='';
    $img2='';
    $img3='';
    $img4='';
    foreach ($ban as $bans => $bann) { 

        if ($bann->position == 'l1') {
            $img1 = (!empty($bann->img))?$bann->img:'';
        }

        if ($bann->position == 'r1') {
            $img2 = (!empty($bann->img))?$bann->img:'';
        }

        if ($bann->position == 'l2') {
            $img3 = (!empty($bann->img))?$bann->img:'';
        }

        if ($bann->position == 'r2') {
            $img4 = (!empty($bann->img))?$bann->img:'';
        }
    }

?>
    <section class="sec h_ban bg-col">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>Shaadi Baraati Inhouse Services</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <div class="row m0">
                <div class="vender-list">
                    <div class="row m0">
                        <div class="col l6 s6 p10">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img1 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                        </div>
                        <div class="col l6 s6 p10">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img2 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                        </div>
                        <div class="col l6 s6 p10">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img3 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                        </div>
                        <div class="col l6 s6 p10">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img4 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


    <section class="sec ">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>E-Invite</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of templates. </p>
                    </div>
                </div>
            </div>
            <div class="row m0">
                <div class="vender-list">
                    <div class="row m0">
                        <div class="col l3 s6 p10">
                            <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei1.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Mehndi</h6>
                                            <p class="m0">Add a Personal touch to your Mehendi Ceremony E-Invites.</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                        <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei2.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Engagement</h6>
                                            <p class="m0">Announce you Engagement with Exquisite Customized E -Invites.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                        <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei3.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Wedding</h6>
                                            <p class="m0">Brag about your wedding hassle free with our personalized E-Invites.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                        <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei4.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Reception</h6>
                                            <p class="m0">Indulged your loved once to a Lavish reception by sending them E-Invites.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div class="sec bg-col pb-0">
        <section>
            <div class="container">
                <div class="row m0">
                    <div class="col l12 m12 s12">
                        <div class="vender-detail">
                            <h4>Real Wedding Storie's</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Real Life Happy Couple’s share their touching and Sweet wedding stories. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="">
                    <div class="wedding-list">
                        <?php
                        if (!empty($real)) {
                           foreach ($real as $key => $value) {
                           $rimg = (!empty($value->image))?$value->image:''; ?>
                            <div class="wedding-detail">
                                <a href="<?php echo base_url('real-wedding/detail/').$value->id ?>">
                                    <img src="<?php echo base_url().$rimg ?>"
                                        class="img-responsive icn-real" width="100%" alt="">
                                    <div class="title-real-wedding">
                                        <h6 class="white-text"><?php echo (!empty($value->name))?$value->name:''; ?> </h6>
                                        <p class="m0"><?php echo (!empty($value->city))?$value->city:''; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php   }
                        }
                        ?>
                        

                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="sec mb30">
        <div class="container">
            <div class="row">
            <div class="col l12 m12 s12">
                    <div class="vender-detail">
                        <h4>Happy Couple's</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>What our Happy Couple's says. </p>
                    </div>
                </div>
            </div>
            <div class="test-com">
                <div class="row">
                        <div class="col l8 s12 m12 push-l2">
                    <div class=" testimonial-wedd">

                            <div class="testi-coup">
                               
                                   
                                    
                                        <center><img src="<?php echo base_url() ?>assets/img/review/Ravi-S-rathore.jpg"
                                                class="img-responsive tsimg" alt=""></center>
                                        <h6 class="black-text">Mr & Mrs. Rathore</h6>
                                        <p>"Shaadi Baraati was very professional and dedicated. They have eased my
                                            wedding smooth and all the vendors were on time and even Shaadi Baraati Team
                                            was available on my wedding to ensure the quality services"</p>
                                        <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                                class="img-responsive"> </center>
                                    
                                
                            </div>

                            <div class="testi-coup">
                                
                                        <center><img src="<?php echo base_url() ?>assets/img/review/Raj-Nandi-Testimonial.jpg"
                                                class="img-responsive tsimg" alt=""></center>
                                        <h6 class="black-text">Mr & Mrs. Nandi</h6>
                                        <p>"We never thought planning a wedding would be this easy. Thankyou Shaadi Baraati for making life easy for us. We are so happy that we found your website"</p>
                                        <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                                class="img-responsive"> </center>
                                  
                            </div>


                            <div class="testi-coup">
                                
                                        <center><img src="<?php echo base_url() ?>assets/img/review/Bharadwaj.jpg"
                                                class="img-responsive tsimg" alt="Bharadwaj"></center>
                                        <h6 class="black-text">Mr & Mrs Bhardwaj</h6>
                                        <p>"Thank you Shaadi Baraati for hassle free events and making my dream come true"</p>
                                        <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                                class="img-responsive"> </center>
                                        <!-- <p class="cr">26-07-2019</p> -->
                                  
                            </div>
                            </div>

                            
                            
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
                        <h4>Our Blogs</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive " alt="">
                        <p>Read up on these wedding Blogs while you are looking forward to your own special day. </p>
                    </div>
                </div>
            </div>
            
            <div class="row" id="blog">
            
                <div class="col l4 m6 s12" v-for="item in datas">
               
                    <a :href="item.link" class="">
                        <div class="blog-detail hoverable">
                            <div class="blog-img-box">
                                <img v-if="item.better_featured_image != null" :src="item.better_featured_image.media_details.sizes.medium.source_url" alt=""
                                class="img-responsive blog-img">
                            </div>
                            
                            <div class="blog-li">
                                <h6 class="black-text truncate">{{item.title.rendered}}</h6>
                                <P class="black-text" v-html="item.excerpt.rendered"></P>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <center><a class="btn-cate" href="<?php echo base_url() ?>blog">View All </a></center>
        </div>
    </section>

    <div class="c19-popup"><a href="https://docs.google.com/forms/d/e/1FAIpQLScT4rYiS8gIRFkuUo8xfInuceDXrVrXWxpP5DmhOSmaE3Xr3A/viewform?vc=0&c=0&w=1&usp=mail_form_link" target="_blank" class="c19-body corona-read"><div class="c19-1"><p>Planning an #IntimateWedding?</p><p>Let’s bring your dream wedding to life</p></div><div class="c19-2"><span>YES</span></div></a><span class="close-c19 corona-close">X</span></div>



    <?php $this->load->view('includes/footer'); ?>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
 

    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        
          new SlimSelect({ select: '.input-field select'});
          new SlimSelect({ select: '.input-field select#sel-cato'});
          
        // top-cities
        $('.top-citys').slick({
            slidesToShow: 5,
            slidesToScroll: 5,
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
                        slidesToScroll: 2,
                        dots: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false,
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
            arrows: true,
        });

        // wed assistence 
        $('.h-wed-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll:1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                }
            ]
            
        });

        // real-wedding
        $('.wedding-list').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<span class="material-icons larr">keyboard_arrow_left</span>',
            nextArrow: '<span class="material-icons rarr">keyboard_arrow_right</span>',
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
            emailError: '', 
           
        },
       

        methods: {
            
            // email check on database
            emailCheck() {
                this.emailError = '';
                const formData = new FormData();
                formData.append('email', this.email);
                axios.post('<?php echo base_url() ?>home/emailcheck', formData)
                    .then(response => {
                        if (response.data == '1') {
                            this.emailError = 'You are already subscribed.';
                        } else {
                            this.emailError = '';
                        }
                    })
                    .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
            },
            checkForm() {
                if (this.emailError == '') {


                    this.$refs.form.submit()
                } else {}
            }
        },
    });

    var blog = new Vue({
        el : '#blog',
        data:{
            datas: '',
        },
        mounted(){
            this.blogFetch()
        },
        methods: {
            // blog fetch
            blogFetch(){
            axios.get('<?php echo base_url() ?>blog/wp-json/wp/v2/posts?per_page=3&orderby=date&order=desc')
                .then(response => {
                    this.datas = response.data; 
                    console.log(this.datas);
                })
            },
        }
    })




    // for submit and change the url

    $(document).ready(function() {

        // var cookieArr = document.cookie.split(";");
        // var cookiePair = cookieArr[0].split("=");

        // if (cookiePair[1] == '') {
        //     $(".c19-popup").css('display', 'block');
        // }else{
        //     $(".c19-popup").css('display', 'none');

        // }






        $(document).on('change', '#sel-city,#sel-cato', function(e) {
            e.preventDefault();

            var cityval = $('#sel-city').children("option:selected").val();
            var city = cityval.toLowerCase();
            var categoryval = $('#sel-cato').children("option:selected").val();
            var cat = categoryval.toLowerCase();
            if (city == '') {
                var finalUrl = '<?php echo base_url()?>vendors/all/' + cat.replace(" ", "-", );
            } else {
                var finalUrl = '<?php echo base_url()?>vendors/' + city.replace(" ", "-", ) + '/' + cat.replace(" ", "-", );
            }
            var url = finalUrl.replace(" ", "-", );

            $("#search-form").attr('action', url);
        });

        $(document).on('click', '.corona-close', function(e) {
            e.preventDefault();
            $(".c19-popup").fadeOut();
            $(".c19-popup").css('display', 'none');
            document.cookie = "covid=Christopher; max-age=" + 7200;
        });


    });
    </script>
</body>

</html>