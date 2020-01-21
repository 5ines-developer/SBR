<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/button/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">

    <style>
        #experience .material-placeholder {
    margin-bottom: 23px;
}
.table-box.hide-on-med-and-down {
    overflow-x: auto;
}   


    </style>
</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->

    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
                <div class="row">
                    <div id="sidemenu-include">
                        <?php $this->load->view('include/menu.php'); ?>
                    </div>
                    <div class="col m12 s12 l9">
                        <?php $this->load->view('include/pre-loader'); ?>
                        <div class="row">
                            <div class="col 12 m6">
                                <p class="h5-para black-text  m0">Vendor Upgrade Details
                                <a href="<?php echo base_url('vendors/proposal-detail/'.$result['id'])  ?>" class="waves-effect waves-light btn blue darken-1 white-text hoverable ">View Proposal</a> </p>
                            </div>
                            <?php
                            if ($this->session->userdata('sha_type') == '1') { ?>
                              <div class="col 12 m6 right-align">
                                  <a onclick="return confirm('Are you sure you want to Approve?');" href="<?php echo base_url('vendors-discount/approve/'.$result['id'].'') ?>"  class="waves-effect waves-light btn white-text  green hoverable">Approve</a>
                                  <!-- view vendors -->
                                  <!-- edit vendors -->
                                  <a onclick="return confirm('Are you sure you want to Reject?');" href="<?php echo base_url('vendors-discount/reject/'.$result['id'].'') ?>"  class="waves-effect waves-light btn white-text red hoverable">Reject</a>
                              </div>
                            <?php } ?> 

                            
                        </div><!-- end row1 -->
                        <div class="row">
                          <div class="col 16 m6">
                          
                            <div class="card scrollspy" id="personal-detail">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Vendor Details</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="w205">Name</th>
                                                <td><?php echo (!empty($result['name']))?$result['name']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">City</th>
                                                <td><?php echo (!empty($result['city']))?$result['city']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Category</th>
                                                <td><?php echo (!empty($result['category']))?$result['category']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Package</th>
                                                <td><?php echo (!empty($result['title']))?$result['title']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Category Banner</th>
                                                <td><?php echo (!empty($result['cat_banner']))?'Yes':'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">City Banner</th>
                                                <td><?php echo (!empty($result['city_banner']))?'Yes':'---'  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                           
                            
                            <div class="col 16 m6">
                          
                            <div class="card scrollspy" id="personal-detail">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Listing Details</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="w205">Listing Name</th>
                                                <td><?php echo (!empty($result['lname']))?$result['lname']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Mobile Number</th>
                                                <td><?php echo (!empty($result['city']))?$result['city']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Email Id</th>
                                                <td><?php echo (!empty($result['ld_email']))?$result['ld_email']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">City</th>
                                                <td><?php echo (!empty($result['city']))?$result['city']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">GSTIN Number</th>
                                                <td><?php echo (!empty($result['gstno']))?$result['gstno']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Address</th>
                                                <td><?php echo (!empty($result['laddress']))?$result['laddress']:'---'  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col 16 m6">
                            <div class="card scrollspy" id="personal-detail">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Invoice Details</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="w205">Invoice Name</th>
                                                <td><?php echo (!empty($result['in_name']))?$result['in_name']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Mobile Number</th>
                                                <td><?php echo (!empty($result['in_mobile']))?$result['in_mobile']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Landline Number</th>
                                                <td><?php echo (!empty($result['landline']))?$result['landline']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Email Id</th>
                                                <td><?php echo (!empty($result['in_email']))?$result['in_email']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">City</th>
                                                <td><?php echo (!empty($result['incity']))?$result['incity']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">State</th>
                                                <td><?php echo (!empty($result['state']))?$result['state']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Postcode</th>
                                                <td><?php echo (!empty($result['postode']))?$result['postode']:'---'  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="bold mb10 h6">Employee Details</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="w205">Employee Name</th>
                                                <td><?php echo (!empty($emp->name))?$emp->name:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Employee ID</th>
                                                <td><?php echo (!empty($emp->id))?$emp->id:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Manager Name</th>
                                                <td><?php echo (!empty($emp->manager->name))?$emp->manager->name:'---'  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>


                            <div class="col 16 m6">
                            <div class="card scrollspy" id="personal-detail">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Package Details</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="w205">Net Amount</th>
                                                <td><?php echo (!empty($result['namopunt']))?$result['namopunt']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">GST</th>
                                                <td><?php echo (!empty($result['gst']))?$result['gst']:'---'  ?></td>
                                            </tr>
                                            <?php 
                                              $amount = $result['namopunt'] + $result['gst'];
                                              if (!empty($result['discount'])) {
                                                $discount =  ($amount * $result['discount']) / 100;
                                              }else{
                                                $discount =  0;
                                              }
                                              $total = $amount - $discount;
                                            ?>

                                            <tr>
                                                <th class="w205">Discount</th>
                                                <td><?php echo (!empty($result['discount']))?$result['discount'].'% - '.$discount:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205"> Total Amount</th> 
                                                <td><?php echo (!empty($result['total']))?$result['total']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Payment Type</th>
                                                <td><?php echo (!empty($result['pay_type']))?$result['pay_type']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Payment Mode</th>
                                                <td><?php echo (!empty($result['pay_mode']))?$result['pay_mode']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Order id/ Cheque No</th>
                                                <td><?php echo (!empty($result['or_id']))?$result['or_id']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Payment Date/ Cheque Date</th> 
                                                <td><?php echo (!empty($result['pay_date']))?$result['pay_date']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Reciept No</th> 
                                                <td><?php echo (!empty($result['rec_no']))?$result['rec_no']:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205">Drawee Bank</th> 
                                                <td><?php echo (!empty($result['dr_bank']))?$result['dr_bank']:'---'  ?></td>
                                            </tr>
                                             <tr>
                                                <th class="w205">PDC</th> 
                                                <td><?php echo (!empty($result['pdc']))?$result['pdc']:'---'  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>

                            

                        </div><!-- end row2 -->






                    </div><!-- end right side content -->
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Trigger -->
    <!-- Modal Structure -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/short.js"></script>
    <!-- data table -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/vfs_fonts.js"></script>
        <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
</body>

</html>