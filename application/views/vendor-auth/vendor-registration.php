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
                                <a href="<?php echo base_url() ?>/vendor/login"><button class="vend-btn">Sign In</button></a>
                            </div>
                            
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="vend-background">
                                <div class="head-tile">
                                    <h6>Vendor Registration</h6>
                                   
                                    <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                                </div>
                                <div class="form-vendor-reg">
                                    <form action="<?php echo base_url('vendor/register-insert') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-input-vendor-reg">
                                            <div class="row">
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="brandname" type="text" class="validate  in-l" @change="brandCheck"  v-model="brand" placeholder="Brand Name" name="name" required="required">
                                                            <span class="helper-text red-text" >{{ brandError }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input sele-ty">
                                                        <div class="input-field m0">
                                                            <select id="citys" name="city" class="form-control js-example-tags" required="required">
                                                            <option value="">City</option>
                                                            <?php if (!empty(cities())) {foreach (cities() as $citys => $cities) { ?>
                                                            <option value="<?php echo $cities->id ?>" > <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                                            <?php   } } ?>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input sele-ty">
                                                        <div class="input-field m0">
                                                            <select id="vendor-type" name="category" class="form-control js-example-tags" required="required">
                                                            <option value="">Vendor Type</option>
                                                            <?php if (!empty(vendor_category())) {
                                                                foreach (vendor_category() as $categorys => $categories) { 
                                                                 ?>
                                                                    <option value="<?php echo $categories->id ?>" > <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                                            <?php   } }?>
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="email" type="email" class="validate  in-l" @change="emailCheck" v-model="email" placeholder="Email" name="email" required="">
                                                            <span class="helper-text red-text" >{{ emailError }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="phone" type="text" class="validate  in-l" v-model="phone" @change="mobileCheck" placeholder="Mobile No" name="phone" required="">
                                                            <span class="helper-text red-text" >{{ phoneError }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="password" type="password" class="validate  in-l" v-model="passw" placeholder="Password" name="password" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m6 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0">
                                                            <input id="confpassword" type="password" class="validate  in-l" v-model="copassw" @change="checkCpsw" placeholder="Confirm Password" name="cpassword" required="">
                                                            <span class="helper-text red-text">{{ cpswerror }}</span>
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
    <script>
        var demo = new Vue({
            el: '#app',
            data: {
                name: '',
                phoneError: '',
                email: '',
                phone: '',
                brand :'',
                passw: '',
                copassw: '',
                emailError:'',
                cpswerror: '',
                nameError: '',
                phoneError: '',
                brandError:''
            },

            methods: {
                // mobile number check on database
                mobileCheck(){
                    this.phoneError = '';
                    const formData = new FormData();
                        formData.append('phone', this.phone);
                        axios.post('<?php echo base_url() ?>vendor/phone_check', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.phoneError = 'This Phone number already exist!';
                        }else if(response.data == '2'){
                            this.emailError = 'This Phone number already exist with shaadibaraati user!';
                        }{
                            this.phoneError = '';
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

                

                // email check on database
                emailCheck(){

                    this.emailError = '';
                    const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>vendor/emailcheck', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.emailError = 'This email id is already exist!';
                        }else if(response.data == '2'){
                            this.emailError = 'This email id is already exist with shaadibaraati user!';
                        }else{
                            this.emailError = '';
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

                // email check on database
                brandCheck(){

                this.brandError = '';
                const formData = new FormData();
                    formData.append('brand', this.brand);
                    axios.post('<?php echo base_url() ?>vendor/brandcheck', formData)
                .then(response => {
                    if(response.data == '1'){
                        this.brandError = 'Brand name already Exist!';
                    }else{
                        this.brandError = '';
                    }
                })
                .catch(error => {
                    if (error.response) {
                        this.errormsg = error.response.data.error;
                    }
                })
                },

                // check psw
                checkCpsw(){
                    if(this.passw != this.copassw){
                        this.cpswerror = 'Password must match with previous entry!';

                    }else{
                        this.cpswerror = '';
                    }
                },
                checkForm(){
                   if((this.cpswerror == '') && (this.phoneError == '') && (this.emailError =='')){

                       
                        this.$refs.form.submit()
                   }else{
                   }
                }
            },
        });
    </script>
</body>

</html>