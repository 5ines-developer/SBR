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
</head>

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
            <section class="contact-back sec">
                <div class="row">
                    <div class="col l12 s12">
                        <div class="banner-up ">
                            <h5 class="white-text">CAREER</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-top">
                <div class="container">
                    <div class="row">
                        <div class="col l12">
                      <div class="vender-detail">
                            <h4>Current Opening</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
                        </div>
                        </div>
                    </div>
                    <div class="career-top">
                        <div class="row">
                            <div class="col l6 m6 s12">
                            <a href=""><div class="care-detail">
                            <h3>Key Account Manager</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            <p><span style="color:red">Experience </span>: 1 Year and above</p>
                            </div>
                            </a>
                            </div>
                            <div class="col l6 m6 s12">
                            <a href=""><div class="care-detail">
                            <h3>Tele Marketing</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            <p><span style="color:red">Experience </span>: 1 Year and above</p>
                            </div>
                            </a>
                            </div>
                            <div class="col l6 m6 s12">
                            <a href=""><div class="care-detail">
                            <h3>Sales Manager</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            <p><span style="color:red">Experience </span>: 1 Year and above</p>
                            </div>
                            </a>
                            </div>
                            <div class="col l6 m6 s12">
                            <a href=""><div class="care-detail">
                            <h3>Key Account Manager</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            <p><span style="color:red">Experience </span>: 1 Year and above</p>
                            </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>
</body>

</html>