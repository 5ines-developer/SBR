<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>

        <!-- body  -->
        <section class="dsection">
            <div class="container-1">
                <div class="row m0">
                    <!-- left menu -->
                    <div class="col s12 m4 l3">
                        <div class="sidemenu">
                            <div class="card-panel   profile-box">
                                <div class="pb-pic">
                                    <img src="assets/img/pp.jpg" class="img-responsive" alt="">
                                </div>
                                <center>
                                    <p class="white-text"><b>Rishabh</b></p>
                                </center>
                                <div class="pb-content center-align">
                                    <h6 class="white-text ">
                                        <?php echo (!empty($profile->su_name))?ucfirst($profile->su_name):'' ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="">
                                <ul class="e-invite-contain z-depth-1">
                                    <li>
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage User Details</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Event</a>
                                    </li>
                                    <li>
                                        <a href="#">Family Members</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Photos</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Information</a>
                                    </li>
                                    <li>
                                        <a href="#">My Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end left menu -->

                    <div class="col s12 m8 l9">
                        <div class="card">
                            <div class="chead">
                                <p class="truncate">Wedding Photos</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Upload Photos</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <!-- Portfolio  -->
                                                <div class="list-profile">
                                                    <div class="">
                                                        <div class="row m0">
                                                            <div class="col l4 m3 s6">
                                                                <div class="wedding-photo">
                                                                    <div class="img-wed">
                                                                        <img src="assets/img/about-oo.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="wed-hov">
                                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="">
                                                                            <i class="large material-icons">delete</i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m0">
                                                            <div class="col col l12 m10 s12">
                                                                <div class="file-field input-field mm-drop">
                                                                    <div class="input-images pad10" id="file"></div>
                                                                    <span class="helper-text-vender "><b class="notes">Note</b>: Please select only image file
                                (eg: .jpg, .png, etc.) <br> <b class="notes">Max filesiemens
                                    size:</b> 1MB <span class="red-text">*</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                        <button type="reset" class="waves-effect waves-light btn white plr30 accent-4 black-text">Reset</button>
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
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');
                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
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
    <!-- <script>
        CKEDITOR.replace('editor');
    </script> -->

    <script>
        $(document).ready(function() {
            $('.input-images').imageUploader();
        });
    </script>

    <script>
        $(document).ready(function() {
                    $('.modal').modal();
                    $('.scrollspy').scrollSpy();
    </script>

    <script>
        var demo = new Vue({
            el: '#app',
            data: {

                file: '',
            },

            methods: {

            },

        });
    </script>
</body>

</html>