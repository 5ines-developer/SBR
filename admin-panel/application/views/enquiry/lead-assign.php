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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
      <!-- bar -->
      <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        #manager_col{
          display:none;
        }
        .m-15{
          margin: 15px !important;
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
                            <p class="h5-para black-text ">Lead Assign</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                      
                                        <form action="<?php echo base_url() ?>vendor_discount/insert_invoice" method="post"  id="admin-form" enctype="multipart/form-data">

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <select>
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                  </select>
                                                  <label for="c_name">Category</label>
                                                </div>
                                                

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="b_name" name="b_name" class="validate" required value="<?php echo (!empty($invoice->b_name))?$invoice->b_name:''; ?>">
                                                  <label for="b_name">Bank Name</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="b_account" name="b_account" class="validate" required value="<?php echo (!empty($invoice->b_account))?$invoice->b_account:''; ?>">
                                                  <label for="b_account">Bank Account No.</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ifsc" name="ifsc" class="validate" required value="<?php echo (!empty($invoice->ifsc))?$invoice->ifsc:''; ?>">
                                                  <label for="ifsc">Bank IFSC Code</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <textarea id="b_address" class="materialize-textarea" name="b_address"><?php echo (!empty($invoice->b_address))?$invoice->b_address:''; ?></textarea>
                                                  <label for="b_address">Bank Address</label>
                                                </div>

                                            </div>

                                            <input type="hidden" name="uniq_id" value="<?php echo random_string('alnum',10) ?>">
                                            <input type="hidden" name="v_id" value="<?php echo (!empty($vid))?$vid:''; ?>">
                                            <div class="col s12 mtb20">
                                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result" type="submit">Submit
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
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/croppie.js"></script>

        <script>
  <?php $this->load->view('include/message.php'); ?>
    
  </script>
      <script>

        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'yyyy-mm-dd',
        });

    $(document).ready(function() {

      $('select').formSelect();

        $("#admin-form").validate({
            rules: {
                name: {required: true, }, 
                email: {required: true, }, 
                Ad_type:{required:true,},
              },             
            messages: {
                
                name: "Please enter a name",
                email: "Please enter a email",
                ad_type:"Please select the Employee type",
            }
        });

        

        

    });
    </script>
        
    </body>
</html>