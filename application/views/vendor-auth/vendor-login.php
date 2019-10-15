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
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <section class="vendor-sig">
            <div class="container">
                <div class="vendor-reg">
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <div class="vendor-cont vcl">
                                <h4>"Grow your Businedd With Shaadi Baraathi"</h4>
                                <p>Sign In to acess your Dashboard</p>
                                <p>If You Don't have an Account ?</p>
                                <a href="http://localhost/shaadibaraati/vendor/registration"><button class="vend-btn">Sign Up</button></a>
                            </div>
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="vend-background">
                                <div class="head-tile">
                                    <h6>Vendor Sign in</h6>
                                    <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                                </div>
                                <div class="form-vendor-reg">
                                    <form action="#" method="post" enctype="">
                                        <div class="form-input-vendor-login">
                                            <div class="row">
                                                <div class="col l12 m12 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0 pb">
                                                            <input id="name" type="text" class="validate  in-l" placeholder="Enter Your Name" name="vendorname" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m12 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0 pb">
                                                            <input id="passsword" type="text" class="validate  in-l" placeholder="Enter Your Password" name="vendorpass" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m12 s12">
                                                    <p class="m0 tl"><a class="fp">Forgot Password ?</a></p>
                                                </div>
                                            </div>
                                            <button class="sub-reg z-depth-1 tl" type="submit" value="Submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
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
    </script>
</body>

</html>