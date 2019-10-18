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
                            <div class="vendor-head">
                                <h6>Leads</h6>
                            </div>
                            <div class="vendor-inputs">
                                <div class="table-css">
                                    <p class="h5-para-p2">Leads List</p>
                                    <div class="leads-list ">
                                        <table id="dynamic" class="striped">
                                            <thead>
                                                <tr class="tt">
                                                    <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                                    <th id="a" class="h5-para-p2" width="130px">Name</th>
                                                    <th id="b" class="h5-para-p2" width="100px">Email</th>
                                                    <th id="c" class="h5-para-p2" width="120px">Phone</th>
                                                    <th id="c" class="h5-para-p2" width="120px">Event Date</th>
                                                    <th id="c" class="h5-para-p2" width="120px">Detail</th>
                                                    <th id="g" class="h5-para-p2" width="62px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
        
                                            if (!empty($result)) {
                                              $count= 0;
                                              foreach ($result as $key => $value) { $count += 1;                                        
                                              ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>">
                                                                <?php echo (!empty($result))?$count:'---'  ?>
                                                            </a>
                                                        </td>
                                                        <td><a class="text-ext" href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>"><?php echo (!empty($value->user_name))?$value->user_name:'---'  ?></a>asdasd</td>
                                                        <td><a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>"><?php echo (!empty($value->user_email))?$value->user_email:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>"><?php echo (!empty($value->user_phone))?$value->user_phone:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>"><?php echo (!empty($value->name))?$value->name:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>"><?php echo (!empty($value->cat))?$value->cat:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>"><?php echo (!empty($value->date))?date("M d, Y ", strtotime($value->date)):'---'; ?></a></td>
                                                        <td class="action-btn  center-align">
                                                            <!-- view user -->
                                                            <a href="<?php echo base_url('vendors/view/'.$value->ids.'') ?>" class="blue hoverable"><i class="fas fa-eye "></i></i></a>
                                                            <!-- view user -->
                                                        </td>

                                                    </tr>

                                                    <?php } } ?>
                                            </tbody>
                                        </table>
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
        <!-- data table -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
        <script>
            <?php $this->load->view('includes/message'); ?>
        </script>

        <script>
            $(document).ready(function() {
                var table = $('table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'csv'
                    ]

                });
                $('select').formSelect();
            });
        </script>
</body>

</html>