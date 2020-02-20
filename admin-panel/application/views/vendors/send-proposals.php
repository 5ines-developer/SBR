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
                            <p class="h5-para black-text ">Package and Discount Proposal</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                      
                                        <form action="<?php echo base_url() ?>vendors/convertpdf" method="post"  id="admin-form" enctype="multipart/form-data">
                                          <p class="m-15">Billing Details</p>
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="i_name" name="i_name" class="validate" required 
                                                  value="<?php echo (!empty($result->name))?$result->name:''; ?>">
                                                  <label for="i_name">Invoicing name </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="i_email" name="i_email" class="validate" required value="<?php echo (!empty($result->email))?$result->email:''; ?>">
                                                  <label for="i_email">Email </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="gst_no" name="gst_no" class="validate" value="<?php echo (!empty($result->gst_no))?$result->gst_no:''; ?>">
                                                  <label for="gst_no">GST Number</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="p_date" name="p_date" class="datepicker validate" value="<?php echo (!empty($result->p_date))?$result->p_date:''; ?>">
                                                  <label for="p_date">Proposal Date</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <select id="p_type" name="p_type">
                                                    <option value="New" <?php if (!empty($result->p_type) && ($result->p_type== 'New')) { echo "selected"; } ?> >New</option> 
                                                    <option value="Existing" <?php if (!empty($result->p_type ) && $result->p_type== 'Existing') { echo "selected"; } ?>>Existing</option>
                                                  </select>
                                                  <label for="p_type">Proposal Type</label>
                                                </div>
                                                <div class="input-field col s12 l12">
                                                  <textarea id="i_address" class="materialize-textarea" name="i_address"><?php echo (!empty($result->address))?$result->address:''; ?></textarea>
                                                  <label for="i_address">Invoicing Address</label>
                                                </div>
                                            </div>



                                            <p class="m-15">Listing Details</p>

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="l_name" name="l_name" class="validate" required value="<?php echo (!empty($result->name))?$result->name:''; ?>">
                                                  <label for="l_name">Listing name </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="package" name="package" class="validate" required value="<?php echo (!empty($result->package))?$result->package:''; ?>">
                                                  <label for="package">Package </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ld_email" name="ld_email" class="validate" value="<?php echo (!empty($result->email))?$result->email:''; ?>">
                                                  <label for="ld_email">Lead Email Id</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ld_phone" name="ld_phone" class="validate" value="<?php echo (!empty($result->phone))?$result->phone:''; ?>">
                                                  <label for="ld_phone">Lead Mobile Number</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="landmark" name="landmark" class="validate" value="<?php echo (!empty($result->city))?$result->city:''; ?>">
                                                  <label for="landmark">Landmark</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="c_person" name="c_person" class="validate" value="<?php echo (!empty($result->cont_person))?$result->cont_person:''; ?>">
                                                  <label for="c_person">Contact Person</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="li_city" name="li_city" class="validate" value="<?php echo (!empty($result->city))?$result->city:''; ?>">
                                                  <label for="li_city">Listing City</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="w_since" name="w_since" class="validate" value="<?php echo (!empty($result->work_since))?$result->work_since:''; ?>">
                                                  <label for="w_since">Working Since</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="a_service" name="a_service" class="validate" value="<?php echo (!empty($result->area_service))?$result->area_service:''; ?>">
                                                  <label for="a_service">Area of Service</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="gender" name="gender" class="validate" value="<?php echo (!empty($result->gender))?$result->gender:''; ?>">
                                                  <label for="gender">Gender</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="charge" name="charge" class="validate" value="<?php echo (!empty($result->charges))?$result->charges:''; ?>">
                                                  <label for="charge">Charges</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="facility" name="facility" class="validate" value="<?php echo (!empty($result->facility))?$result->facility:''; ?>">
                                                  <label for="facility">Facility</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="o_service" name="o_service" class="validate" value="<?php echo (!empty($result->other_service))?$result->other_service:''; ?>">
                                                  <label for="o_service">Other Services</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="on_facility" name="on_facility" class="validate" value="<?php echo (!empty($result->onsite_facility))?$result->onsite_facility:''; ?>">
                                                  <label for="on_facility">Onsite Facility</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="t_require" name="t_require" class="validate" value="<?php echo (!empty($result->time_require))?$result->time_require:''; ?>">
                                                  <label for="t_require">Timing Requirements</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="p_mode" name="p_mode" class="validate" value="<?php echo (!empty($result->pay_mode))?$result->pay_mode:''; ?>">
                                                  <label for="p_mode">Payment Mode</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="website" name="website" class="validate" value="<?php echo (!empty($result->website))?$result->website:''; ?>">
                                                  <label for="website">Website</label>
                                                </div>
                                                <div class="input-field col s12 l12">
                                                  <textarea id="li_address" class="materialize-textarea" name="li_address"><?php echo (!empty($result->address))?$result->address:$result->list_address; ?></textarea>
                                                  <label for="li_address">Listing Address</label>
                                                </div>
                                            </div>


                                            <p class="m-15">Online Space Selling Package Information</p>
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ct_name" name="ct_name" class="validate" required  value="<?php echo (!empty($result->category))?$result->category:''; ?>">
                                                  <label for="ct_name">Category Name </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="city" name="city" class="validate" value="<?php echo (!empty($result->city))?$result->city:''; ?>">
                                                  <label for="city">City</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="duration" name="duration" class="validate" value="<?php echo (!empty($result->duration))?$result->duration:''; ?>">
                                                  <label for="duration">Duration</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="amount" name="amount" class="validate" value="<?php echo (!empty($result->amount))?$result->amount:''; ?>">
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>

                                            <p class="m-15">Package Cost</p>
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="nt_amnt" name="nt_amnt" class="validate" required  value="<?php echo (!empty($result->net_amount))?$result->net_amount:''; ?>">
                                                  <label for="nt_amnt">Net Amount</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="gst_amount" name="gst_amount" class="validate" value="<?php echo (!empty($result->gst_amount))?$result->gst_amount:''; ?>">
                                                  <label for="gst_amount">GST Amount</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="t_amnt" name="t_amnt" class="validate" value="<?php echo (!empty($result->tot_amount))?$result->tot_amount:''; ?>">
                                                  <label for="t_amnt">Total Amount</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="amount" name="amount" class="validate" value="<?php echo (!empty($result->amount))?$result->amount:''; ?>">
                                                  <label for="amount">Amount</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="w_amount" name="w_amount" class="validate" value="<?php echo (!empty($result->amnt_words))?$result->amnt_words:''; ?>">
                                                  <label for="w_amount">Total Amount paid for online selling package (In words)</label>
                                                </div>
                                            </div>

                                             <p class="m-15">Cheque / DD details / online</p>
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pay_mode" name="pay_mode" class="validate" required  value="<?php echo (!empty($result->pay_mode))?$result->pay_mode:''; ?>">
                                                  <label for="pay_mode">Payment Mode </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ord_id" name="ord_id" class="validate" value="<?php echo (!empty($result->ord_id))?$result->ord_id:''; ?>">
                                                  <label for="ord_id">Order id/ Cheque No</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pay_date" name="pay_date" class="datepicker validate" value="<?php echo (!empty($result->o_date))?$result->o_date:''; ?>">
                                                  <label for="pay_date">Payment Date/ Cheque Date</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="uniq_id" value="<?php echo random_string('alnum',10) ?>">
                                            <input type="hidden" name="v_id" value="<?php echo $result->vid; ?>">
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