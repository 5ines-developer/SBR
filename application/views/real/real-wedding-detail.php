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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/slimselect.min.css">
    <?php $this->load->view('includes/favicon.php');  ?>
    <style>
        .img-box{
            max-height:235px;
            min-height:235px;
            width:100%;
            overflow: hidden;
        }
        .wed-detail p{
            color:black;
        }
        .real-weading {
        padding: 5% 0px;
        }
        @media (max-width:991px) and (min-width:768px){
            .img-box{
                min-height:144px;
                width:100%;
                overflow: hidden;
            }
            .card-wed {
                height: 236px;
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('includes/header.php'); ?>
    <div id="app">
        <section class="real-weading">
            <div class="container-wedding">
                <div class="row">
                    <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Real Wedding</h5>
                        <p class="tc white-text pad0-11">Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of templates.</p>
                    </div>
                        <!-- <div class="">
                            <div class="wedding-name">
                                <h5>Jashan & Karan</h5>
                                <p>Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of template</p>
                                <div class="line-weadd"></div>
                                
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
        </section>
        <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12 m112 s12">
                        <h5 class="nh-name">Photo Gallery</h5>
                        <div class="bg-depth1 ven-10p" id="gallery">
                            <div class="row">
                                <div v-for="(src, index) in imgs" :key="index" class="pic pic-over col l3 m4 s12" @click="() => showImg(index)">
                                    <img :src="src" class="img-responsive responsive-pp">
                                    <div class="icon-zoom">
                                        <i class="material-icons">zoom_in</i>
                                    </div>
                                </div>
                                <vue-easy-lightbox :visible="visible" :imgs="imgs" :index="index" @hide="handleHide"></vue-easy-lightbox>
                            </div>
                        </div>
                    </div>
        </section>

        <form action="" style="display: none">
            <input id="gal_id" ref="myTestField" type="text" class="validate in-l"name="gal_id"value="<?php echo $this->uri->segment(3); ?>"> 
        </form>

         <?php if(!empty($related)){ ?>
        <section class="sec #fafafa grey lighten-5">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12 s12 m12">
                        <h5 class="nh-name">Related Weddings</h5>
                    </div>
                    <?php
                        foreach($related as $row){
                        ?>
                         <a href="<?php echo base_url('real-wedding/detail/'.$row->id.'') ?>" >
                    <div class="col l4 s12 m4">
                        <div class="card-wed">
                        <div class="img-box img-real">
                            <img src="<?php echo base_url().'/'.$row->image;?>" class="img-responsive" alt="">
                            </div>
                            <div class="wed-detail">
                                <p><b><?php echo $row->name;?></b> | <?php echo $row->city;?></p>
                            </div>
                        </div>
                    </div>
                        </a>
                    <?php }?>

                   
                </div>
                
            </div>
        </section>
    <?php } ?>
        </div>

        <?php $this->load->view('includes/footer'); ?>

        <!-- script -->
        <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/vue-easy-lightbox.umd.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/script.js"></script>
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    visible: false,
                    index: 0, // default: 0
                    imgs: [],
                    gal_id:'',
                },
                methods: {
                    // mobile number check on database
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
                    showImg(index) {
                        this.index = index
                        this.visible = true
                    },
                    handleHide() {
                        this.visible = false
                    },
                    getData: function() {
                        const formData = new FormData();
                        formData.append('gal_id', this.$refs.myTestField.value);
                        axios.post('<?php echo base_url() ?>real_wedding/gallery',formData)
                        .then(response => {
                            if (response.data != '') {
                                this.imgs = response.data;
                            }
                        })
                        .catch(error => {
                            console.log(response);

                        })

                    },
                    
                },
                mounted: function() {
                    this.getData();
                }
            })
        </script>



</body>

</html>