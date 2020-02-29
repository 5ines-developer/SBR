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
     <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body >
    <div id="app">

        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row m0">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Site Map</h5>
                        <p class="tc white-text">Shaadibaraati India's Most Trusted Online Wedding Market</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec scroll-sit">
            <div class="container-fluide">
                <div class="row">
                   <div class="col l12 m12 s12">
                        <div class="div-sitmap">
                            <ul class="mj-sitemap">
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo base_url('about-us') ?>">About Us</a></li>
                                <li><a>Vendors</a>
                                    <ul class="sitemap-sub-title">
                                      <li><a href="">Wedding Photographer</a></li>
                                      <li><a href="">Wedding Venues</a></li>
                                      <li><a href="">Wedding Planner</a></li>
                                      <li><a href="">Wedding Catering</a></li>
                                      <li><a href="">Bridal Makeup Artist</a></li>
                                      <li><a href="">Wedding Decorator</a></li>
                                      <li><a href="">Bridal Mehendi</a></li>
                                      <li><a href="">Bridal Wear</a></li>
                                      <li><a href="">Groom Wear</a></li>
                                      <li><a href="">Wedding Band</a></li>
                                      <li><a href="">Music & Entertainment</a></li>
                                      <li><a href="">Balloon Decorator</a></li>
                                      <li><a href="">Wedding Transportation</a></li>
                                      <li><a href="">Background Verification</a></li>
                                      <li><a href="">Honeymoon</a></li>
                                      <li><a href="">Astrology & Religious Services</a></li>
                                      <li><a href="">Wedding Jewellery</a></li>
                                      <li><a href="">Wedding Invitations</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url() ?>wed-assistance">Wedding Assistance</a></li>
                                <li><a>Select City</a>
                                    <ul class="sitemap-sub-title">
                                      <li><a href="">Kolkata</a></li>
                                      <li><a href="">Hyderabad</a></li>
                                      <li><a href="">Bangalore</a></li>
                                      <li><a href="">Delhi NCR</a></li>
                                      <li><a href="">Mumbai</a></li>
                                      <li><a href="">Jaipur</a></li>
                                      <li><a href="">Patna</a></li>
                                      <li><a href="">Nagpur</a></li>
                                      <li><a href="">Chandigarh</a></li>
                                      <li><a href="">Lucknow</a></li>
                                      <li><a href="">Indore</a></li>
                                      <li><a href="">Bhubaneswar</a></li>
                                      <li><a href="">Kerala</a></li>
                                      <li><a href="">Chennai</a></li>
                                      <li><a href="">Mangalore</a></li>
                                      <li><a href="">Raipur</a></li>
                                      <li><a href="">Mysore</a></li>
                                      <li><a href="">Ahmedabad</a></li>
                                      <li><a href="">Bhopal</a></li>
                                      <li><a href="">Udaipur</a></li>
                                      <li><a href="">Goa</a></li>
                                      <li><a href="">Visakhapatnam</a></li>
                                      <li><a href="">Ludhiana</a></li>
                                      <li><a href="">Visakhapatnam</a></li>
                                      <li><a href="">Coimbatore</a></li>
                                      <li><a href="">Ujjain</a></li>
                                      <li><a href="">Surat</a></li>
                                      <li><a href="">Ranchi</a></li>
                                      <li><a href="">Amritsar</a></li>
                                      <li><a href="">Surat</a></li>
                                      <li><a href="">Ranchi</a></li>
                                      <li><a href="">Amritsar</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('e-invite')?>">E-Invite</a></li>
                                <li><a href="<?php echo base_url('real-wedding') ?>">Real Wedding</a></li>
                                <li><a href="#citymodel" class="modal-trigger">Select City</a></li>
                                <li><a href="<?php echo base_url('e-invite')?>">E-Invite</a></li>
                                <li><a href="<?php echo base_url('privacy-policy') ?>">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url('terms-conditions') ?>">Terms & Condition</a></li>
                                <li><a href="<?php echo base_url() ?>testimonial">Testimonial</a></li>
                                <li><a href="<?php echo base_url() ?>feedback">Feedback / Complaints</a></li>
                                <li><a href="<?php echo base_url() ?>career">Career</a></li>
                                <li><a href="<?php echo base_url() ?>blog">Blog</a></li>
                                <li><a href="<?php echo base_url('contact-us') ?>">Coutact Us</a></li>

                                </ul>
                        </div>
                   </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script>
    var demo = new Vue({
        el: '#demo',
        data: {
            email: '',
            emailError: '',
           
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
            }
        },
    });



    
    </script>
</body>

</html>