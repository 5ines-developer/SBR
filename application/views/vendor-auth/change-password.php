<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $title ?>
    </title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body class="#fafafa grey lighten-5">
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <?php $this->load->view('includes/vendor-sidebar.php'); ?>
                    <div class="col l9 m9 s12">
                        <div class="vendor-detail-inputs b-sho white">
                            <div class="vendor-head">
                                <h6>Change Password</h6>
                            </div>
                            <form action="" method="post">
                                <div class="vendor-inputs wid-50">
                                    <div class="row">
                                        <div class="col l12 m5 s12">
                                            <div class="input-field">
                                                <input id="curtpasword" type="password" v-model="curtpassw" name="curtpassword" required="">
                                                <label for="curtpassword">Current Password<span class="red-text">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col l12 m5 s12">
                                            <div class="input-field">
                                                <input id="newpassword" type="password" class="validate" v-model="newpassw"  name="newpassword" required="">
                                                <label for="newpassword">New Password<span class="red-text">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col l12 m5 s12">
                                            <div class="input-field">
                                                <input id="confpassword" type="password" class="validate  in-l" v-model="copassw" v-on:keyup="checkCpsw"  name="cpassword" required="">
                                                <span class="helper-text red-text">{{ cpswerror }}</span>
                                            
                                                <label for="confpassword">Confirm Password<span class="red-text">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="sub-reg z-depth-1" type="submit" value="Submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
        </div>
        <!-- script -->
        <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/script.js"></script>
        <script>
            <?php $this->load->view('includes/message'); ?>
        </script>
        <script>
            var demo = new Vue({
                el: '#app',
                data: {
                    newpassw: '',
                    copassw: '',
                    curtpassw: '',
                    cpswerror: '',
                },

                methods: {

                    // check psw
                    checkCpsw() {
                        if (this.newpassw != this.copassw) {
                            this.cpswerror = 'Password must match with previous entry!';

                        } else {
                            this.cpswerror = '';
                        }
                    },
                    checkForm() {
                        if ((this.cpswerror == '')) {


                            this.$refs.form.submit()
                        } else {}
                    }
                },
            });
        </script>
</body>

</html