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
                            <p class="h5-para black-text ">Invoice Detail</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                      
                                        <form action="<?php echo base_url() ?>vendor_discount/insert_invoice" method="post"  id="admin-form" enctype="multipart/form-data">

                                            <p class="m-15">Billing Details</p>

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="c_name" name="c_name" class="validate" required value="<?php echo (!empty($invoice->c_name))?$invoice->c_name:''; ?>">
                                                  <label for="c_name">Client name </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="c_gstin" name="c_gstin" class="validate" required value="<?php echo (!empty($invoice->c_gstin))?$invoice->c_gstin:''; ?>">
                                                  <label for="c_gstin">Client GSTIN </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="invoice_no" name="invoice_no" class="validate" required value="<?php echo (!empty($invoice->invoice_no))?$invoice->invoice_no:''; ?>">
                                                  <label for="invoice_no">Invoice No.</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="in_date" name="in_date" class="datepicker validate" required value="<?php echo (!empty($invoice->in_date))?$invoice->in_date:''; ?>">
                                                  <label for="in_date">Invoice Date</label>
                                                </div>
                                                
                                                <div class="input-field col s12 l12">
                                                  <textarea id="c_address" class="materialize-textarea" required name="c_address"><?php echo (!empty($invoice->c_address))?$invoice->c_address:''; ?></textarea>
                                                  <label for="c_address">Client Address</label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="package" name="package" class="validate" required 
                                                  value="<?php echo (!empty($invoice->package))?$invoice->package:''; ?>">
                                                  <label for="package">package</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pa_cost" name="pa_cost" class="validate" required 
                                                  value="<?php echo (!empty($invoice->pa_cost))?$invoice->pa_cost:''; ?>">
                                                  <label for="pa_cost">package Cost</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="discount" name="discount" class="validate" required 
                                                  value="<?php echo (!empty($invoice->discount))?$invoice->discount:''; ?>">
                                                  <label for="discount">Discount</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="cgst" name="cgst" class="validate" required 
                                                  value="<?php echo (!empty($invoice->cgst))?$invoice->cgst:''; ?>">
                                                  <label for="cgst">CGST @9%</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="sgst" name="sgst" class="validate" required 
                                                  value="<?php echo (!empty($invoice->sgst))?$invoice->sgst:''; ?>">
                                                  <label for="sgst">SGST @9%</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="igst" name="igst" class="validate" required 
                                                  value="<?php echo (!empty($invoice->igst))?$invoice->igst:''; ?>">
                                                  <label for="igst">IGST @9%</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="total" name="total" class="validate" required 
                                                  value="<?php echo (!empty($invoice->total))?$invoice->total:''; ?>">
                                                  <label for="total">Total (Rs.)</label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="w_amount" name="w_amount" class="validate" required value="<?php echo (!empty($invoice->w_amount))?$invoice->w_amount:''; ?>">
                                                  <label for="w_amount">Total Amount in words</label>
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