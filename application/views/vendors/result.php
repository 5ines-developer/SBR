<?php  $this->ci =& get_instance();
$this->load->model('m_search'); 
$this->load->model('m_vendors'); 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slimselect.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>
    <style>
        .preloader {
            display: none;
        }
        
        .main {
            position: absolute;
            width: 100%;
            top: 0px;
            background: rgba(0, 0, 0, 0);
            z-index: 2;
        }
        
        .banner-slider {
            max-height:340px;
            min-height: 340px;
            overflow: hidden;
        }
        
        @media (max-width:991px) {
            .banner-slider {
                max-height: 264px;
            }
            .slick-slide img {
                width: auto;
            }
        }
        
        @media (max-width:600px) {
            .main {
                top: 0px;
            }
            .banner-slider {
                max-height: 155px;
                height: 155px;
                min-height: 155px;
                overflow: hidden;
            }
            .slick-slide img {
                width: auto;
            }
        }
    </style>
</head>

<body>

<?php if(!empty($banner)){ 
foreach($banner as $ban => $bans){
if((strtolower($bans->city) == $this->uri->segment(2)) && (str_replace(" ","-",strtolower($bans->category)) == $this->uri->segment(3))  ){
    $back ='1';
?>
<?php }}}?>
    <!-- header -->
    <?php $this->load->view('includes/header.php'); ?>
    <!-- end header -->
    <div id="app">
        <!-- body  -->
        <!-- <section class="result-head" style="background-image:url(<?php echo $this->m_vendors->bannimage(ucwords(str_replace("-"," ",$this->uri->segment(3)))); ?>)">
            <div class="center-align container" >
                <div class="row m0">
                        <div id="searchble-container" class="row m0">
                            <h4 class="white-text">India's Most Trusted Online Wedding Market</h4>
                            <form action="<?php echo base_url()?>vendors" method="post" id="search-form">

                                <div class="col s12 m10 push-m1 l8 push-l2 mb10">
                                    <input type="search" autocomplete="off" placeholder="Search vendor..." name="vendor"
                                        v-on:keyup="vendorcheck" v-model="vendor" id="search-vend">

                                    <ul class="sg-box" :class="{'visible': visible }" v-html="autocomplete"></ul>
                                    <div class="preloader" :class="{'previsible': previsible }">
                                        <div class="preloader-wrapper big active" id="prelod">
                                            <div class="spinner-layer spinner-blue">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>

                                            <div class="spinner-layer spinner-red">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>

                                            <div class="spinner-layer spinner-yellow">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>

                                            <div class="spinner-layer spinner-green">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s12 m8 push-m2 l8 push-l2" class="serch-select">
                                    <div class="col s12 m6 ">
                                        <select name="ct" class="select-search" id="sel-cato">
                                            <option value="">All Categories</option>
                                            <?php
                                            if (!empty(vendor_category())) {
                                                        foreach (vendor_category() as $categorys => $categories) { ?>
                                            <option <?php echo (ucwords(str_replace("-"," ",$this->uri->segment(3))) == $categories->category)?'selected':''; ?> value="<?php echo $categories->category ?>" > <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                            <?php   } } ?>
                                        </select>
                                    </div>
                                    <div class="col s12 m6">
                                        <select name="q" id="sel-city">
                                            <option value="">All Cities</option>
                                            <?php if (!empty(cities())) {foreach (cities() as $citys => $cities) { ?>
                                            <option <?php echo (strtolower(str_replace("-"," ",$this->uri->segment(2))) == strtolower($cities->city))?'selected':''; ?> value="<?php echo $cities->city ?>" > <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                            <?php   } } ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </section> -->

        <section class="pb-0">
            <div class="result-heads" style="background-image:url(<?php echo
                $this->m_vendors->bannimage(ucwords(str_replace("-"," ",$this->uri->segment(3))));
             ?>);">
                <div class="banner-slider">

                    <?php if(!empty($banner)){ 
                foreach($banner as $ban => $bans){
                if((strtolower($bans->city) == $this->uri->segment(2)) && (str_replace(" ","-",strtolower($bans->category)) == $this->uri->segment(3))  ){
                    $back ='1';
                ?>
                    <div>
                        <img src="<?php echo base_url($bans->image) ?>" alt="" width="100%">
                    </div>
                    <?php }}}?>
                </div>
                <!-- <div class="row m0 search-in">
                    <h4 class="white-text">India's Most Trusted Online Wedding Market</h4>
                </div> -->
                <?php
                   
            ?>

            </div>



        </section>
        <section class="search-for">
            <div class="container-fluide">
                <div class="row m0">
                    <div class="col l12 s12 m12">
                        <div class="vendor-search">
                            <form action="<?php echo base_url()?>vendors" method="post" id="search-form">
                                <div class="row m0">
                                    <div class="col s12 m10 l6 ">
                                        <input type="search" autocomplete="off" placeholder="Search vendor..." name="vendor" v-on:keyup="vendorcheck" v-model="vendor" id="search-vend">
                                        <ul class="sg-box" :class="{'visible': visible }" v-html="autocomplete"></ul>
                                        <div class="preloader" :class="{'previsible': previsible }">
                                            <div class="preloader-wrapper big active" id="prelod">
                                                <div class="spinner-layer spinner-blue">
                                                    <div class="circle-clipper left">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="gap-patch">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="circle-clipper right">
                                                        <div class="circle"></div>
                                                    </div>
                                                </div>
                                                <div class="spinner-layer spinner-red">
                                                    <div class="circle-clipper left">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="gap-patch">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="circle-clipper right">
                                                        <div class="circle"></div>
                                                    </div>
                                                </div>
                                                <div class="spinner-layer spinner-yellow">
                                                    <div class="circle-clipper left">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="gap-patch">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="circle-clipper right">
                                                        <div class="circle"></div>
                                                    </div>
                                                </div>

                                                <div class="spinner-layer spinner-green">
                                                    <div class="circle-clipper left">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="gap-patch">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="circle-clipper right">
                                                        <div class="circle"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l3 s12 m3">
                                        <select name="ct" class="select-search" id="sel-cato">
                                            <option value="">All Categories</option>
                                            <?php if (!empty(vendor_category())) {
                                                        foreach (vendor_category() as $categorys => $categories) { ?>
                                            <option <?php echo (ucwords(str_replace("-"," ",$this->uri->segment(3))) == $categories->category)?'selected':''; ?> value="<?php echo $categories->category ?>" > <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                            <?php   } } ?>
                                        </select>
                                    </div>
                                    <div class="col l3 s12 m3">
                                        <select name="q" id="sel-city">
                                            <option value="">All Cities</option>
                                            <?php if (!empty(cities())) {foreach (cities() as $citys => $cities) { ?>
                                            <option <?php echo (ucfirst($this->uri->segment(2)) == $cities->city)?'selected':''; ?> value="<?php echo $cities->city ?>" > <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                            <?php   } } ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php if (empty($vendors)) { ?>
        <section class="no-result">

            <div class="col l12">
                <center>
                    <img src="<?php echo base_url('assets/img/no-result.png') ?>" alt="">
                </center>
            </div>

        </section>
        <?php }else{ ?>

        <section class="result-body">
            <div class="container-2">
                <div class="row m0">
                    <!-- left menu -->
                    <!-- <div class="col s12 m4 l3">
                        <a @click="isFilter = !isFilter"
                            class="btn-floating btn filter-btn waves-effect waves-light red accent-4 hide-on-med-and-up"><i
                                class="material-icons">filter_list</i></a>
                        <div class="filter-container" v-if="isFilter">
                            <div class="filter-header">
                                <span><i class="material-icons">filter_list</i></span>
                                <span>Filter by Your Choice</span>
                                <span class="right center-align hide-on-med-and-up  waves-effect waves-red"
                                    @click="isFilter = !isFilter">
                                    <i class="material-icons">close</i>
                                </span>
                            </div>
                            <div class="filter-divider"></div>
 -->
                    <!-- locality -->
                    <!-- <div class="filter-sub-head" >
                                <span >Locality</span>
                                <span class="right  waves-effect waves-red" @click="isShow = !isShow">
                                    <i class="material-icons" v-if="isShow">remove</i>
                                    <i class="material-icons" v-if="!isShow">add</i>
                                </span>
                            </div>
                            <transition name="slide" >
                                <div class="filter-item" v-if="isShow">
                                    <ul class="chekbox-item">
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </transition> -->

                    <!-- days -->
                    <!-- <div class="filter-sub-head">
                                <span >No of Days</span>
                                <span class="right  waves-effect waves-red" @click="isDay = !isDay">
                                    <i class="material-icons" v-if="isDay">remove</i>
                                    <i class="material-icons" v-if="!isDay">add</i>
                                </span>
                            </div>

                            <transition name="slide">
                                <div class="filter-item" v-if="isDay">
                                    <ul class="chekbox-item">
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="filled-in"  />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </transition> -->

                    <!-- Budget -->
                    <!-- <div class="filter-sub-head">
                                <span>Budget</span>
                                <span class="right  waves-effect waves-red" @click="isbudget = !isbudget">
                                    <i class="material-icons" v-if="isbudget">remove</i>
                                    <i class="material-icons" v-if="!isbudget">add</i>
                                </span>
                            </div>

                            <transition name="slide">
                                <div class="filter-item" v-if="isbudget">
                                    <ul class="chekbox-item">
                                        <li>
                                            <label>
                                                <input type="checkbox" name="budget" class="filled-in" value="1000" />
                                                <span>1000</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="budget" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="budget" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="budget" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="budget" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </transition> -->

                    <!-- ratings -->
                    <!-- <div class="filter-sub-head">
                                <span>Average ratings</span>
                                <span class="right  waves-effect waves-red" @click="isAvg = !isAvg">
                                    <i class="material-icons" v-if="isAvg">remove</i>
                                    <i class="material-icons" v-if="!isAvg">add</i>
                                </span>
                            </div>

                            <transition name="slide">
                                <div class="filter-item" v-if="isAvg">
                                    <ul class="chekbox-item">
                                        <li>
                                            <label>
                                                <input type="checkbox" name="rating" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="rating" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="rating" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="rating" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" name="rating" class="filled-in" />
                                                <span>Filled in</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </transition> -->




                    <!-- </div>
                    </div> -->
                    <!-- end left menu -->

                    <div class="col s12 m12 l12">
                        <div class="row  result-item-box">




                            <?php if (!empty($vendors)) {
                              
                                $lableImg = '<img src="'.base_url().'assets/img/lable.png" class="v-lable-image" />';
                                foreach ($vendors as $key => $value) { 
                                    $pack = $this->ci->m_search->packageName($value->package);
                                    if (empty($pack) || empty($value->discount_status)) {
                                        $pack = 'Free Listing';
                                    }
                                    $lable_class = strtolower(str_replace(' ', '-', $pack));
                                    
                                ?>
                            <div class="col s6 m4 l3">
                                <div class="result-items hoverable">
                                    <div class="card z-depth-0">
                                        <a href="<?php echo base_url('detail/'.str_replace(" ","- ",strtolower(!empty($value->category)?$value->category:'all-category')).'/'.urlencode(str_replace(" ","- ",strtolower($value->name))).'/'.$value->uniq)?>" target="_blank">
                                            <div class="card-image">
                                                <span class="v-lable <?php echo $lable_class ?>"><?php echo $lableImg . $pack ?></span>
                                                <img src="<?php echo (!empty($value->profile_file))? base_url().$value->profile_file:'' ?>">
                                            </div>
                                            <div class="card-content">
                                                <div class="row m0">
                                                    <div class="col s12 m12">
                                                        <p class="m0 r-crd-title tit">
                                                            <?php echo (!empty($value->name))?$value->name:'' ?>
                                                        </p>

                                                    </div>
                                                    <div class="col s12 m5">

                                                        <p class="m0 r-crd-location">
                                                            <?php echo (!empty($value->city))?$value->city:'' ?>
                                                        </p>
                                                    </div>

                                                    <div class="col s12 m7">

                                                        <p class="m0 r-crd-price">
                                                            <?php
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
                                                    echo (!empty($thecash))?'&#8377; '.$thecash:''; echo (!empty($value->price_for))?'&nbsp'.$value->price_for:' Per day'; ?>
                                                        </p>
                                                    </div>
                                                    <div class="cdivider hide-on-small-only"></div>
                                                    <div class="col s12 m6 hide-on-small-only">
                                                        <p class=" r-crd-category">
                                                            <?php echo $value->category ?>
                                                        </p>
                                                    </div>
                                                    <div class="col s12 m6 hide-on-small-only">
                                                        <p class="m0 r-crd-ratings">
                                                            <?php echo $this->ci->m_search->countReview($value->id) ?> reviews <span class="c-badge green"><i
                                                                    class="material-icons">star</i> <?php echo $this->ci->m_search->avgrating($value->id) ?> </span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php   } } ?>
                        </div>
                        <div class="row m0">
                            <div class="col s12">
                                <?php echo (!empty($pagelink))?$pagelink: '' ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php } ?>




        <?php $this->load->view('includes/footer'); ?>
    </div>


    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>

    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                listItem: '',
                isShow: true,
                isDay: true,
                isbudget: true,
                isAvg: true,
                isFilter: true,
                autocomplete: '',
                vendor: '',
                visible: false,
                previsible: false,
                email: '',
                emailError: '',

            },
            created() {
                window.addEventListener('resize', this.handleResize)
                this.handleResize();
            },
            mounted() {
                new SlimSelect({
                    select: '#sel-cato'
                });
                new SlimSelect({
                    select: '#sel-city'
                });
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
                },
                handleResize() {
                    if (window.innerWidth <= 600) {
                        this.isFilter = false;
                    }
                },


                vendorcheck() {
                    this.autocomplete = '';
                    this.visible = true;
                    this.previsible = true;
                    const formData = new FormData();
                    formData.append('vendor', this.vendor);
                    axios.post('<?php echo base_url() ?>search/vendorcheck', formData)
                        .then(response => {
                            if (response.data != '') {
                                this.previsible = false;
                                this.autocomplete = response.data;
                            } else {
                                this.previsible = false;
                                this.autocomplete = '';
                            }
                        })
                        .catch(error => {
                            this.previsible = false;
                            if (error.response) {
                                this.errormsg = error.response.data.error;
                            }
                        })
                }
            },

        });
    </script>
    <script>
        // search in reasult page
        $(document).ready(function() {


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
                $("#search-form").submit();
            });


            $('html').click(function() {
                // $('.sg-box').hide();
                $(".sg-box").removeClass("visible");
            })

            $('.sg-box').click(function(e) {
                e.stopPropagation();
            });

            $('#search-vend').keyup(function() {
                $(".sg-box").addClass("visible");
            })

        });
    </script>
    <script>
        $('.banner-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 2000,
            arrows: false,
            dots: false,


        });
    </script>
</body>

</html>