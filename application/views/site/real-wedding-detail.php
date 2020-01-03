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
</head>

<body>
    <?php $this->load->view('includes/header.php'); ?>
    <div id="app">
        <section class="contact-weadding ">
            <div class="container-wedding">
                <div class="row">
                    <div class="col l12 s12">
                        <div class="real-weading">
                            <div class="wedding-name">
                                <h5>Jashan & Karan</h5>
                                <p>Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of template</p>
                                <div class="line-weadd"></div>
                                <p class="location-wedding"><i class="material-icons">location_on</i> Bhubaneswar</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section>
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12 m112 s12">
                        <h5 class="nh-name">Project Gallery</h5>
                        <div class="bg-depth1 ven-10p" id="gallery">
                            <div class="row">
                                <div v-for="(src, index) in imgs" :key="index" class="pic col l3 m4 s12" @click="() => showImg(index)">
                                    <img :src="src" class="img-responsive res-pp">
                                    <div class="icon-zoom">
                                        <i class="material-icons">zoom_in</i>
                                    </div>
                                </div>
                                <vue-easy-lightbox :visible="visible" :imgs="imgs" :index="index" @hide="handleHide"></vue-easy-lightbox>
                            </div>
                        </div>
                    </div>
        </section>
        <section>
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12 s12 m12">
                        <h5 class="nh-name">Related Weddings</h5>
                    </div>

                    <div class="col l4 s12 m4">
                        <div class="card-wed">
                            <img src="assets/img/s3.png" class="img-responsive" alt="">
                            <div class="wed-detail">
                                <p><a><b>Naveen & Janu</b></a> | <a>Banglore</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 s12 m4">
                        <div class="card-wed">
                            <img src="assets/img/s2.png" class="img-responsive" alt="">
                            <div class="wed-detail">
                                <p><a><b>Naveen & Janu</b></a> | <a>Banglore</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 s12 m4">
                        <div class="card-wed">
                            <img src="assets/img/s2.png" class="img-responsive" alt="">
                            <div class="wed-detail">
                                <p><a><b>Naveen & Janu</b></a> | <a>Banglore</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="class-pagi">
                    <ul class="pagination">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div>
            </div>
        </section>
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
                    imgs: [
                        'assets/img/vender/wp.jpg',
                        'assets/img/vender/wp1.jpg',
                        'assets/img/vender/wp2.jpg',
                        'assets/img/vender/wp3.jpg',
                        'assets/img/vender/wp4.jpg',
                        'assets/img/vender/wp5.jpg',
                        'assets/img/vender/wp6.jpg',
                    ]
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
                    }
                }
            })
        </script>



</body>

</html>