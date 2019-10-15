<!DOCTYPE html>
<html>

<head>
    <title>Shaadi Baraati</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
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
                            <div class="vendor-cont">
                                <h4>"Grow your Businedd With Shaadi Baraathi"</h4>
                                <p>Sign Up to acess your Dashboard</p>
                                <p>Already have an Account ?</p>
                                <a href="http://localhost/shaadibaraati/vendor/login"><button class="vend-btn">Sign In</button></a>
                            </div>
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="vend-background">
                                <div class="head-tile">
                                    <h6>Vendor Registration</h6>
                                    <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                                </div>
                                <div class="form-vendor-reg">
                                    <form action="#" method="post" enctype="">
                                        <div class="form-input-vendor-reg">
                                            <div class="row">
                                                <div class="col l6 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="brandname" type="text" class="validate  in-l" placeholder="Brand Name" name="brandname" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l6 m6 s12">
                                                    <div class="d-input sele-ty">
                                                        <div class="input-field m0">
                                                            <select id="citys" name="sel_city" class="form-control js-example-tags" required="required">
                                                                        <option value="" disabled selected >City</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                           =</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input sele-ty">
                                                        <div class="input-field m0">
                                                            <select id="vendor-type" name="vendor_type" class="form-control js-example-tags" required="required">
                                                                <option value="" disabled selected >Vendor Type</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="email" type="email" class="validate  in-l" placeholder="Email" name="email" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="phone" type="text" class="validate  in-l" placeholder="Mobile No" name="phone" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="password" type="text" class="validate  in-l" placeholder="Password" name="password" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="confpassword" type="text" class="validate  in-l" placeholder="Confirm Password" name="cpassword" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="sub-reg z-depth-1" type="submit" value="Submit">Submit</button>
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
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
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