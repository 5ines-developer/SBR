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
    <!-- data table -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
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
                            <div class="vendor-head-review">
                                <div class="review-short">
                                    <select class="browser-default" id="short">
                                                    <option value="0" selected>10</option>
                                                    <option value="1">50</option>
                                                    <option value="2">150</option>
                                                    <option value="3">250</option>
                                        </select>
                                </div>
                                <h6>Review</h6>
                            </div>
                            <div class="vendor-inputs">
                                <div class="review-short-list">
                                    <div class="vender-v-review">
                                        <div class="vendor-review-list">
                                            <ul>
                                                <li><i class="material-icons">person</i> Joseph Vijay</li>
                                                <li class="text-rsc"><i class="material-icons">email</i> vijay@gamil.com</li>
                                                <li><i class="material-icons">date_range</i> 21-10-2019</li>
                                                <li class="green v-rev white-text"><i class="material-icons revi-i">star</i>5</li>
                                            </ul>
                                            <p class="p-rev">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                                ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                        </div>
                                        <div class="vendor-review-list">
                                            <ul>
                                                <li><i class="material-icons">person</i> Joseph Vijay</li>
                                                <li class="text-rsc"><i class="material-icons">email</i> vijay@gamil.com</li>
                                                <li><i class="material-icons">date_range</i> 21-10-2019</li>
                                                <li class="green v-rev white-text"><i class="material-icons revi-i">star</i>5</li>
                                            </ul>
                                            <p class="p-rev">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                                ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                        </div>
                                        <div class="vendor-review-list">
                                            <ul>
                                                <li><i class="material-icons">person</i> Joseph Vijay</li>
                                                <li class="text-rsc"><i class="material-icons">email</i> vijay@gamil.com</li>
                                                <li><i class="material-icons">date_range</i> 21-10-2019</li>
                                                <li class="green v-rev white-text"><i class="material-icons revi-i">star</i>5</li>
                                            </ul>
                                            <p class="p-rev">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                                ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                        </div>
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
        <!-- data table -->
        <script>
            <?php $this->load->view('includes/message'); ?>
        </script>

</body>

</html>