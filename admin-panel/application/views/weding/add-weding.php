<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <!-- bar -->
    <style>
    .ck-editor__editable {
        min-height: 300px;
    }
    .img .error {
	position: absolute !important;
	right: 0 !important;
	text-align: right;
	text-transform: capitalize;
}
    </style>
</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->
    <!-- first layout -->
    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
                <div class="row">
                    <div id="sidemenu-include">
                        <?php $this->load->view('include/menu.php'); ?>
                    </div>

                    <div class="col m12 s12 l9">
                        <p class="h5-para black-text ">Add Wedding</p>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>weding/insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="city-form"
                                        enctype="multipart/form-data">

                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="name" name="name" class="validate" required>
                                                <label for="name">Name<span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                            </div>
                                        </div>

                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="city" name="city" class="validate" required>
                                                <label for="city">City<span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('city'); ?></span></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row m0 img">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Profile Image</span>
                                                    <input type="file" name="profile" id="upload"
                                                        accept=".png, .jpg, .jpeg" required>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file
                                                            (eg: .jpg, .png, .jpeg etc.) <br> <span class="bold">upload 400 * 600 ratio for good view</span>  </i> <span
                                                            class="red-text">*</span></small></h6>
                                            </div>
                                        </div>

                                        <div class="row m0">
                                            <div class="col s12 l12">
                                                <div class="input-field">
                                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                                </div>
                                                    <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file (eg: .jpg, .png, .jpeg etc.) <br> <span class="bold">Max file size:</span> 512kb </i> <span class="red-text">*</span></small></h6>
                                            </div>
                                        </div>

                                        <div class="col s12">
                                            <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                            <?php ?>
                                        </div>

                                        <input type="hidden" name="weding_id"
                                            value="<?php echo random_string('alnum',10) ?>">
                                        <input name="image" class="ipimg" type="hidden" value="">


                                        <div class="col s12 mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result"
                                                type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- cad end -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/image-uploader.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>

    <script>
    < ? php $this->load->view('include/message.php'); ? >
    </script>
    <script>
    $(document).ready(function() {

        $('select').formSelect();
        $("#city-form").validate({
            rules: {
                city: {
                    required: true,
                },
                name: {
                    required: true,
                },
            },
            messages: {
                city: "Please enter a city",
                name: "Please enter name",
            }
        });
    });
    
    $(function() {
            $('.input-images-1').imageUploader();
        });
    </script> 
</body>

</html>