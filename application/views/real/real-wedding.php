<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/slimselect.min.css">
    <?php $this->load->view('includes/favicon.php');  ?>
    <style>
        .img-box img {
            /* max-height:235px;
            min-height:235px; */
            width:100%;
        }
        .wed-detail p{
            color:black;
        }
        @media (max-width:991px) and (min-width:768px){
            .img-box img {
                /* min-height:144px; */
                width:100%;
            }
            /* .card-wed {
                height: 236px;
            } */
        }
    </style>
</head>

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row m0">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Real Wedding</h5>
                        <p class="tc white-text pad0-11">Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of templates.</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="e-invite-detail">
                            <h3>It is all About Real Weddings Stories</h3>
                            <p class="tc black-text pad-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(!empty($records)){
                        foreach($records as $row){ ;?>
                        <a href="<?php echo base_url('real-wedding/detail/'.$row->id.'') ?>" >
                            <div class="col l4 s12 m4">
                                <div class="card-wed">
                                    <div class="img-box">
                                    <img src="<?php echo base_url().'/'.$row->image;?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="wed-detail">
                                        <p><b><?php echo $row->name;?></b> | <?php echo $row->city;?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php }}?>
                </div>
                <div class="row m0">
                    <div class="col s12">
                        <?php echo (!empty($pagelink))?$pagelink: '' ?>
                    </div>
                </div>


                <!-- <div class="class-pagi">
                    <ul class="pagination">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div> -->
            </div>
        </section>


        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <!-- <script src="<?php echo base_url()?>/assets/js/slimselect.min.js"></script> -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('select');
            var instances = M.FormSelect.init(sel);
        });

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
</body>

</html>