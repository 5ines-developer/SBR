<?php  $this->ci =& get_instance();
$this->load->model('m_search'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <style>
        .fixed-action-btn {
            position: relative;
            right: 0;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->

        <!-- body  -->

        <?php if (!empty($vendor)) {
            foreach ($vendor as $key => $value) {
            ?>
        <section id="detail">
            <div class="container-fluide">
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="banner-container ">
                            <img class="responsive-img z-depth-1"
                                src="<?php echo (!empty($value->profile_file))?base_url().$value->profile_file:''; ?>"
                                alt="">
                        </div>
                        <!-- basic info -->
                        <div class="detail-bs-info">
                            <div class="card">
                                <div class="card-container">
                                    <div class="row m0">
                                        <div class="col s12">
                                            <div class="dt-card-title">
                                                <p><?php echo (!empty($value->name))?$value->name:''; ?></p>
                                            </div>
                                        </div>
                                        <div class="col s12 m7 l8">
                                            <span class="mb10 location"><?php echo (!empty($value->city))?$value->city:''; ?></span>
                                            <p><?php echo (!empty($value->address))?$value->address:''; ?> </p>
                                        </div>

                                        <form action="" style="display: none">
                                            <input id="vndr_id" ref="myTestField" type="text" class="validate in-l" name="vndr_id" value="<?php echo (!empty($value->id))?$value->id:''; ?>">
                                        </form>


                                        <div class="col s12 m5 l4">
                                            <div class="dbi-right">

                                                <div class="btn-group">
                                                    <a
                                                        class="btn-floating  waves-effect waves-red transparent z-depth-0"><i
                                                            class="fas fa-heart tiny"></i></a>
                                                    <span>Favorite</span>
                                                </div>

                                                <div class="btn-group">
                                                    <a
                                                        class="btn-floating  waves-effect waves-red transparent z-depth-0"><i
                                                            class="fas fa-star tiny"></i></a>
                                                    <span>4.5</span>
                                                </div>

                                                <div class="btn-group">
                                                    <div class="fixed-action-btn">
                                                    <a
                                                        class="btn-floating  waves-effect waves-red transparent z-depth-0"><i
                                                            class="fas fa-share-alt tiny"></i></a>
                                                    <span>Share</span>


                                                    <ul>
                                                        <li> <a href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?php echo $value->name ?>&p[url]=<?php echo current_url(); ?>&p[title]=<?php echo $value->name ?>" target="_blank" class="btn-floating blue"><i class="fab fa-facebook-f"></i></a></li>

                                                        <li><a href="http://twitter.com/home?url=<?php echo $value->name ?>+<?php echo current_url(); ?>" target="_blank" class="btn-floating blue"><i class="fab fa-twitter"></i></a></li>

                                                        <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo current_url(); ?>&description=<?php $desc = str_replace(' ', '-', $value->name); echo $desc ?>" class="btn-floating red" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>

                                                         <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;amp;url=<?php echo current_url(); ?>/&amp;amp;title=<?php echo $value->name ?>&amp;amp;source=5ineproject.com/shaadibaraati" target="_blank" class="btn-floating blue"><i class="fab fa-linkedin-in"></i></a></li>



                                                        
                                                    </ul>

                                                </div>
                                                </div>

                                                <a class="waves-effect waves-light btn red plr20 accent-4 white-text" onclick="focusMethod()">View
                                                    Contact</a>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- tabs -->
                        <div class="tab-links">
                            <ul class="tabs z-depth-1">
                                <li class="tab "><a href="#about-vendor" class="active">About <?php echo (!empty($value->name))?$value->name:''; ?></a></li>
                                <li class="tab"><a href="#!">Services</a></li>
                                <li class="tab"><a href="#!">Gallery</a></li>
                                <li class="tab"><a href="#!">Reviews</a></li>
                                <li class="tab right"><a href="#!">Privacy Policy <i
                                            class=" tiny fas fa-info-circle"></i></a></li>
                            </ul>
                        </div>

                        <!-- about vendor -->
                        <div class="about-vendor" id="about-vendor">
                            <div class="card">
                                <div class="card-container">
                                    <div class="row m0">
                                        <div class="col s12">
                                            <div class="dt-card-title">
                                                <p><?php echo (!empty($value->name))?$value->name:''; ?></p>
                                            </div>
                                            <p><?php echo (!empty($value->detail))?wordwrap($value->detail,25,"<br>\n"):''; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end about vendor -->
                    </div><!-- left -->

                    <div class="col s12 m12 l4">
                        <div class="right-form">
                            <div class="card">
                                <div class="card-container">
                                    <div class="borderbox">
                                        <div class="bbx-heading">
                                            Starting Price
                                        </div>
                                        <div class="bbx-content">
                                            <ul>
                                                <li>
                                                    <span class="bbx-name">Studio Photograpgy</span>
                                                    <span class="bbx-rate">- &#8377; <?php
                                                    $amount = (!empty($value->price))?$value->price:'';
                                                    $num =$amount;
                                                    $explrestunits ='';
                                                    if(strlen($num)>3){
                                                    $lastthree = substr($num, strlen($num)-3, strlen($num));
                                                    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
                                                    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
                                                    $expunit = str_split($restunits, 2);
                                                    for($i=0; $i < sizeof($expunit);  $i++){
                                                    // creates each of the 2's group and adds a comma to the end
                                                    if($i==0)
                                                    {
                                                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                                                    }else{
                                                    $explrestunits .= $expunit[$i].",";
                                                    }
                                                    }
                                                    $thecash = $explrestunits.$lastthree;
                                                    } else {
                                                    $thecash = $num;
                                                    }
                                                    echo $thecash; ?> per day</span>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>

                                    <div class="borderbox">
                                        <div class="bbx-heading">
                                            SEND MESSAGE
                                        </div>
                                        <form class="row m0" action="">
                                            <div class="row m0">
                                                <div class="input-field col s6">
                                                    <input  id="name" type="text" class="validate">
                                                    <label for="name">Name</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="email" type="text" class="validate">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s6">
                                                    <input  id="phone" type="text" class="validate">
                                                    <label for="phone">Mobile Number</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="date" type="text" class="validate">
                                                    <label for="date">Funcation Date</label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s6">
                                                    <input  id="guest" type="text" class="validate">
                                                    <label for="guest">Number of Guest</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="rooms" type="text" class="validate">
                                                    <label for="rooms">No of rooms</label>
                                                </div>
                                            </div>
                                            <div class="input-field">
                                                <button class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    




                                </div>
                            </div>

                            <img src="https://dummyimage.com/360x400/a81010/ffffff" class="responsive-img" alt="">
                        </div>
                    </div><!-- right -->

                    <div class="clearfix"></div>
                    <!-- Servicess -->
                    <div id="vendor-services">
                        <div class="card">
                            <div class="card-container">
                                <div class="col s12">
                                    <div class="dt-card-title">
                                        <p>Services</p>
                                    </div>
                                </div>
                                <div class="row m0">

                                    <?php if ($value->service) {
                                        foreach ($value->service as $servic => $ser) { ?>

                                            <div class="col s6 m4 l2">
                                        <div class="service-box center-align">
                                            <img class="responsive-img z-depth-1"
                                src="<?php echo (!empty($ser->image))?base_url().$ser->image:''; ?>"
                                alt="">
                                
                                            <p class="sb-title m0"><?php echo (!empty($ser->service))?$ser->service:''; ?></p>
                                            <p class="detail m0"><?php echo (!empty($ser->subtitle))?$ser->subtitle:''; ?></p>
                                        </div>
                                    </div>


                                    <?php  } } ?>
                                    
                                    <div class="clearfix"></div>

                                    <div class="col s12">
                                        <div class="vs-info-container">
                                            <div class="vs-ic-title" @click="isShow = !isShow">
                                                <span>Information Detail</span>
                                                <span class="right"><i class="fas fa-minus" v-if="isShow"></i> <i
                                                        class="fas fa-plus" v-if="!isShow"></i></span>
                                            </div>
                                            <transition name="slide">
                                                <div class="vs-contentbox" v-if="isShow">
                                                    <div class="vs-ic-content" v-for="i in 6">
                                                        <p class="vs-qtn">Total year of Experience?</p>
                                                        <p class="vs-aws">Lorem, ipsum dolor sit amet consectetur
                                                            adipisicing.</p>
                                                    </div>
                                                </div>
                                            </transition>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- end Servicess -->

                    <!-- gallery -->
                    <div id="vendor-gallery">
                        <div class="card">
                            <div class="card-container">
                                <div class="row m0">
                                    <div class="col s12">
                                        <div class="dt-card-title">
                                            <p>Project Photo Gallery</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="" onload="myFunction()">
                                        <div v-for="(src, index) in imgs" :key="index" class="pic col5s">
                                            <div @click="() => showImg(index)" v-if="index < 9">
                                                <img :src="src" class="">
                                            </div>
                                            <div v-else-if="index == 9 " @click="loadMore" class="load-more-pick">
                                                <span class="morecount">+100 more</span>
                                                <img :src="src" class="">
                                            </div>
                                            <div @click="() => showImg(index)" v-else>
                                                <img :src="src" class="">
                                            </div>
                                        </div>
                                    </div>
                                    <vue-easy-lightbox :visible="visible" :imgs="imgs" @hide="handleHide">
                                    </vue-easy-lightbox>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end gallery -->


                    <!-- video section -->
                    <div id="vendor-video">
                        <div class="card">
                            <div class="card-container">
                                <div class="row m0">
                                    <div class="col s12">
                                        <div class="dt-card-title">
                                            <p>Vendor's Videos Gallery</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <?php if (!empty($value->video)) {
                                        foreach ($value->video as $vid => $vids) { ?>
                                           <div class="col s12 m6 l4 mb15">
                                    <?php //youtube
                                        if ($vids->type == '1') { ?>
                                            <iframe width="100%" height="200"
                                            src="https://www.youtube.com/embed/<?php echo $vids->link ?>" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                            <?php }else if ($vids->type == '2'){ ?>

                                                <!-- https://www.facebook.com/oppomobileindia/videos/1333675383459276/ -->
                                                

                                                <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo str_replace("/","%2F",$vids->link); ?>&show_text=0&width=476" width="auto" height="200" style="border:none;overflow:auto" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>

                                                 <?php } ?>
                                        </div>
                                     <?php  } } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end video section -->

                    <!-- rating and review -->
                    <div id="vendor-rating">
                        <div class="card">
                            <div class="card-container">
                                <div class="row m0">
                                    <div class="col s12">
                                        <div class="dt-card-title">
                                            <p>Write a Review</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <form action="">
                                        <div class="col s12 mt20">
                                            <div class="left rateus"> Rate us : </div>
                                            <star-rating :star-size="20"></star-rating>
                                        </div>

                                        <div class="col s12 m10 l7">
                                            <div class="row m0">
                                                <div class="input-field col s12 m6">
                                                    <input id="first_name" type="text" class="validate">
                                                    <label for="first_name">Your Name</label>
                                                </div>
                                                <div class="input-field col s12 m6">
                                                    <input id="email" type="email" class="validate">
                                                    <label for="email">Email</label>
                                                </div>

                                                <div class="input-field col s12">
                                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                                    <label for="textarea1">Write Review</label>
                                                </div>
                                                <button
                                                    class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                    <div class="full-line"></div>

                                </div>

                                <div class="row m0">
                                    <div class="">
                                        <div class="">
                                            <div class="row m0">
                                                <div class="push  col m5">
                                                    <div class="rating">
                                                        <div class="title">
                                                           Rating Distribution
                                                        </div>

                                                        <div class="score">
                                                            <div class="average-score">
                                                                <p class="numb">4.5</p>
                                                            </div>
                                                            <div class="queue">
                                                                <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                <i class="fa fa-star avg-start " aria-hidden="true"></i> 
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>

                                                        <ul class="queue-box">
                                                            <li class="five-star" v-for="(i, k) in 5" :key="k">
                                                                <span>
                                                                    <i class="fa fa-star " v-for="(is, ks) in 5"  :key="is" v-bind:class="{'ratingStar': k <= ks }" aria-hidden="true"></i>
                                                                </span>
                                                                <span class="start-count">1</span>
                                                                <span class="start-progress">
                                                                    <span class="start-bar" style="width: 70%"></span>
                                                                </span>
                                                            </li>                                                            
                                                        </ul>
                                                    </div><!-- /.rating -->
                                                </div><!-- /.col-md-6 -->

                                                <div class="col m7">
                                                    <ul class="review-list">
                                                        <li v-for="i in 2">
                                                            <div class="review-metadata">
                                                                
                                                                <div class="queue">
                                                                    <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                    <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                    <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                    <i class="fa fa-star avg-start ratingStar" aria-hidden="true"></i> 
                                                                    <i class="fa fa-star avg-start " aria-hidden="true"></i>
                                                                </div>
                                                                <div class="name">
                                                                    5ine test : <span> Jul 26, 2019</span> 
                                                                </div>
                                                            </div><!-- /.review-metadata -->
                                                            <div class="review-content">
                                                                <p>
                                                                    <span class="bold">Testing</span><br>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quasi dolores iste? Repellat maiores libero, voluptates ipsam qui possimus natus maxime. Fugit dolorum corrupti quod at laboriosam eaque fuga sit!
                                                                </p>
                                                            </div><!-- /.review-content -->
                                                        </li>
                                                        <li>
                                                            <button class="waves-effect waves-light btn red plr30 accent-4 white-text">View More</button>
                                                        </li>
                                                       
                                                    </ul><!-- /.review-list -->
                                                </div><!-- /.col-md-12 -->


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
                                        placeholder="Email" required=""  >
                                        <span class="helper-text red-text" ></span>
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

    <?php } } ?>



    </div>

    <?php $this->load->view('includes/footer'); ?>

    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vue-easy-lightbox.umd.min.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
    Vue.component('star-rating', VueStarRating.default);
    var app = new Vue({
        el: '#app',
        data: {
            isShow: true,
            visible: false,
            vndr_id:'',
            imgs: [
                // 'https://image.wedmegood.com/resized/1000X/uploads/vendor_cover_pic/15084/6aebad28-3c3d-436e-a87f-ba2c70f04d46.png',
                // 'https://image.wedmegood.com/resized/1000X/uploads/member/72861/1552031350_Day2_Apula_Nikhil_81.jpg',
                // 'https://image.wedmegood.com/resized/1000X/uploads/vendor_cover_pic/15084/6aebad28-3c3d-436e-a87f-ba2c70f04d46.png',
                // 'https://image.wedmegood.com/resized/1000X/uploads/member/72861/1552031350_Day2_Apula_Nikhil_81.jpg',
                // 'https://image.wedmegood.com/resized/1000X/uploads/vendor_cover_pic/15084/6aebad28-3c3d-436e-a87f-ba2c70f04d46.png',
                // 'https://image.wedmegood.com/resized/1000X/uploads/member/72861/1552031350_Day2_Apula_Nikhil_81.jpg',
                // 'https://image.wedmegood.com/resized/1000X/uploads/vendor_cover_pic/15084/6aebad28-3c3d-436e-a87f-ba2c70f04d46.png',
                // 'https://image.wedmegood.com/resized/1000X/uploads/vendor_cover_pic/15084/6aebad28-3c3d-436e-a87f-ba2c70f04d46.png',
                // 'https://image.wedmegood.com/resized/1000X/uploads/member/72861/1552031350_Day2_Apula_Nikhil_81.jpg',
                // 'https://image.wedmegood.com/resized/1000X/uploads/vendor_cover_pic/15084/6aebad28-3c3d-436e-a87f-ba2c70f04d46.png',
            ],
        },

        methods: {
            showImg(index) {
                this.index = index
                this.visible = true
            },
            handleHide() {
                this.visible = false
            },
            // rating
            setRating: function(rating) {
                this.rating = "You have Selected: " + rating + " stars";
            },
            showCurrentRating: function(rating) {
                this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " +
                    rating + " stars"
            },
            setCurrentSelectedRating: function(rating) {
                this.currentSelectedRating = "You have Selected: " + rating + " stars";
            },
            loadMore() {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>detail/full-gallery', formData)
                .then(response => {
                    if(response.data != ''){
                        this.imgs = response.data;
                    }
                })
                .catch(error => {
                    console.log(response);
                    
                })
            },
             getData: function () {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>detail/gallery', formData)
                .then(response => {
                    if(response.data != ''){
                        this.imgs = response.data;
                    }
                })
                .catch(error => {
                    console.log(response);
                    
                })

             }
        },
        mounted: function(){
            this.getData();
        }
    });

    focusMethod = function getFocus() {           
        document.getElementById("name").focus();
    }

   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      direction: 'right'
    });
  });

    </script>

</body>

</html>