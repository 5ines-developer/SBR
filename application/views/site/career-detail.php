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
                            <h5 class="white-text">CAREER DETAIL</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-top">
                <div class="container">
                    <div class="career-detail">
                        <div class="row">
                            <div class="col l12 m12 s12">
                                <div class="career-detail-list">
                                    <h5>Key Account Manager</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                                    </p>
                                    <p><span style="color:#d0021b">Qualification </span>: Graduate and above</p>
                                    <p><span style="color:#d0021b">Experience </span>: 1 year and above</p>
                                    <p><span style="color:#d0021b">Language </span>: Kannada / English / Hindi</p>
                                </div>
                                <div class="respon-det">
                                    <h6>Responsibilitiesities</h6>
                                    <ul>
                                        <li><span class='li-sp'>Lead & execute new business initiatives within Shaadi Baraati right from product idealization to on ground execution</span></li>
                                        <li><span class='li-sp'>Be responsible for developing new strategies for new launches</span></li>
                                        <li><span class='li-sp'>Develop channel, content & communication plan with marketing team</span></li>
                                        <li><span class='li-sp'>Conceptualize and launch offerings for niche target segments</span></li>
                                        <li><span class='li-sp'>0-1 years of experience</span></li>
                                        <li><span class='li-sp'>Strong verbal and written communication skills</span></li>
                                        <li><span class='li-sp'>Provide ideas & Leadership skill</span></li>
                                        <li><span class='li-sp'>Generate Revenue & Build relationship with vendors.</span></li>
                                    </ul>
                                    <h6>Key Roles</h6>
                                    <ul>
                                        <li><span class='li-sp'>Research & Sales Planning</span></li>
                                        <li><span class='li-sp'>Relationship & Client Management</span></li>
                                        <li><span class='li-sp'>Strategy & Thought Leadership</span></li>
                                        <li><span class='li-sp'>Inside sales as well as meetings to liaison with prospective clients</span></li>
                                    </ul>
                                    <p class="locati">Location : Bangalore / Delhi / Hydrabad</p>
                                    <h5 class="apply-email">To apply any of above mentioned position, mail us at hr@shaadibaraati.com with your full resume </h5>
                                </div>
                                <div class="career-form">
                                    <h4>Submit Your Details</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col l4 s12 m4">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="fn" name="fname" type="text" class="validate" required="">
                                                        <label for="fn">Name <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l4 s12 m4">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="fn" name="email" type="text" class="validate" required="">
                                                        <label for="fn">Email <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l4 s12 m4">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="fn" name="phone" type="text" class="validate" required="">
                                                        <label for="fn">Phone<span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12 m6">
                                                <div class="feedback-input">
                                                    <div class="file-field input-field">
                                                        <div class="btn hh-file">
                                                            <span>File</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate if-file" type="text" placeholder="Upload Your Resume">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12 m6">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed ">
                                                        <select>
                                                            <option value="" disabled selected>Position</option>
                                                            <option value="1">Option 1</option>
                                                            <option value="2">Option 2</option>
                                                            <option value="3">Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l12 s12 m12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" name="feedback" requred class="materialize-textarea hh-height"></textarea>
                                                        <label for="textarea1">Type your message here....</label>
                                                    </div>
                                                </div>
                                                <button class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
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
            // option
            var sel = document.querySelectorAll('select');
            var instances = M.FormSelect.init(sel);
        });
    </script>
</body>

</html>