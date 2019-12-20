<?php 
$this->ci =& get_instance();
$this->load->model('m_account'); 

?>
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
                                <p class="truncate">Manage User Details</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <form class="" action="" method="POST">
                                        <div class="row">
                                            <div class="col l4">
                                                <div class="input-field">
                                                    <input type="text" name="wed_date" class="datepicker">
                                                    <label for="wed_date">Wedding Date <span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Bride Details</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <div class="row">
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="brd_name" type="text" name="brd_name" class="validate">
                                                            <label for="brd_name">Bride Name  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 s12 m6">
                                                        <div class="feedback-input">
                                                            <div class="file-field input-field">
                                                                <div class="btn hh-file"><span>File</span> <input type="file" name="file"></div>
                                                                <div class="file-path-wrapper"><input required="required" type="text" placeholder="Choose Bride Image" class="file-path validate if-file"></div>
                                                                <p><b>Note :</b>PNG , JPG image accepted for better view use 1MB</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col l8 m5 s12">
                                                        <div class="input-field ">
                                                            <textarea id="textarea1" name="brd_dec" class="materialize-textarea hh-text"></textarea>
                                                            <label for="brd_dec">Bride Bio  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Groom Details</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <div class="row">
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="gro_name" type="text" name="gro_name" class="validate">
                                                            <label for="gro_name">Groom Name  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 s12 m6">
                                                        <div class="feedback-input">
                                                            <div class="file-field input-field">
                                                                <div class="btn hh-file"><span>File</span> <input type="file" name="gro_file"></div>
                                                                <div class="file-path-wrapper"><input required="required" type="text" placeholder="Choose Groom Image" class="file-path validate if-file"></div>
                                                                <p><b>Note :</b>PNG , JPG image accepted for better view use 1MB</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col l8 m5 s12">
                                                        <div class="input-field ">
                                                            <textarea id="textarea1" name="gro_dec" class="materialize-textarea hh-text"></textarea>
                                                            <label for="gro_dec">Groom Bio  <span class="red-text">*</span></label>
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
    <!-- <script src="<?php echo base_url()?>/assets/js/jquery-3.4.1.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('.tabs').tabs();
        });
    </script> -->
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                list: [{
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    },

                ]
            }
        });
    </script>
</body>

</html>