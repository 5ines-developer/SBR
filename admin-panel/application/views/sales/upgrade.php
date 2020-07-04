<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        #pdcs{
          display: none;
        }
        #nt_amnt, #gst_amount, #t_amnt {
          cursor: no-drop;
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
                            <p class="h5-para black-text ">Renewel Vendor Plan</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                      
                                        <form action="<?php echo base_url('vendors/upgrade-submit') ?>" method="post"  id="admin-form" enctype="multipart/form-data">
                                          <p class="m-15">Renew Vendor Plan</p>
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="id" name="vid" class="validate" required value="<?php echo (!empty($result->vId))?$result->vId:''; ?>">
                                                  <label for="id">Vendor Id <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <select name="vcity" required="">
                                                      <option value="">Choose a City</option>
                                                      <?php if (!empty($city)) { foreach ($city as $key => $value) {  ?>
                                                        <option value="<?php echo $value->id ?>" <?php if($result->citId == $value->id){ echo 'selected'; } ?> ><?php echo $value->city ?> </option>
                                                      <?php } }?>
                                                  </select>
                                                  <label for="city">Vendor City <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <select name="vcategory" required="">
                                                      <option value="">Choose a Category</option>
                                                      <?php if (!empty($category)) { foreach ($category as $key => $value) {  ?>
                                                        <option value="<?php echo $value->id ?>" <?php if($result->catId == $value->id){ echo 'selected'; } ?> ><?php echo $value->category ?> </option>
                                                      <?php } }?>
                                                  </select>
                                                  <label for="city">Vendor Category <span class="red-text">*</span></label>
                                                </div>
                                                
                                                <div class="input-field col s12 l6">
                                                  <select name="vpackage" required="" id="package" >
                                                      <option value="">Choose a Package</option>
                                                      <?php if (!empty($package)) { foreach ($package as $key => $value) {  ?>
                                                        <option value="<?php echo $value->id ?>"><?php echo $value->title ?> </option>
                                                      <?php } }?>
                                                  </select>
                                                  <label for="package">Package <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <select name="c_bnr">
                                                      <option value="">No</option>
                                                      <option value="1">Yes</option>
                                                  </select>
                                                  <label for="package">City Banner</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <select name="cat_bnr" id="cat_bnr">
                                                      <option value="">No</option>
                                                      <option value="1">Yes</option>
                                                  </select>
                                                  <label for="cat_bnr">Category Banner</label>
                                                </div>
                                            </div>
                                            <div class="divider"> </div>



                                            <p class="m-15">Billing Details</p>

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="i_name" name="i_name" class="validate" required value="<?php echo (!empty($result->name))?$result->name:''; ?>">
                                                  <label for="i_name">Invoicing name <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="gstno" name="gstno" class="validate" value="<?php echo (!empty($invoice->gstno))?$invoice->gstno:''; ?>">
                                                  <label for="gstno">GSTIN Number </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="l_name" name="l_name" class="validate" required value="<?php echo (!empty($result->name))?$result->name:''; ?>">
                                                  <label for="l_name">Listing name <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="email" id="ld_email" name="ld_email" class="validate" value="<?php echo (!empty($result->email))?$result->email:''; ?>">
                                                  <label for="ld_email">Email Id <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ld_phone" name="ld_phone" class="validate" value="<?php echo (!empty($result->phone))?$result->phone:''; ?>">
                                                  <label for="ld_phone">Mobile Number <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l12">
                                                  <textarea id="invoice_address" class="materialize-textarea" required name="invoice_address"><?php echo (!empty($result->address))?$result->address:''; ?></textarea>
                                                  <label for="invoice_address">Invoicing Address <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="ord_type" name="ord_type" required class="validate"  value="<?php echo (!empty($invoice->ord_type))?$invoice->ord_type:''; ?>">
                                                  <label for="ord_type">Order Type <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="c_person" name="c_person" required class="validate"  value="<?php echo (!empty($invoice->c_person))?$invoice->c_person:''; ?>">
                                                  <label for="i_landl">Contact Person <span class="red-text">*</span></label>
                                                </div>
                                                
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="alt_phone" name="alt_phone" class="validate" value="<?php echo (!empty($invoice->alt_phone))?$invoice->alt_phone:''; ?>">
                                                  <label for="alt_phone">Alternate Mobile Number</label>
                                                </div>
                                                
                                                <div class="input-field col s12 l6">
                                                  <select name="lcity" required="">
                                                      <option value="">Choose a City</option>
                                                      <?php if (!empty($city)) { foreach ($city as $key => $value) { ?>
                                                      <option value="<?php echo $value->id ?>" <?php if($value->id == $result->citId){ echo 'selected'; } ?>><?php echo $value->city ?></option> 
                                                    <?php } } ?>
                                                  </select>
                                                  <label>City <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="tenure" name="tenure" required class="validate" value="<?php echo (!empty($invoice->tenure))?$invoice->tenure:''; ?>">
                                                  <label for="tenure">Tenure <span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                          
                                            <div class="divider"> </div>

                                            <p class="m-15">Payment Details</p>
                                        
                                          <div class="row m0">

                                                <div class="input-field col s12 l6">
                                                  <input type="text" autofocus="" id="nt_amnt" required name="nt_amnt" class="validate" >
                                                  <label class="ntam" for="nt_amnt">Net Amount <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" autofocus="" required id="discount" name="discount" class="validate">
                                                  <label for="discount">Total Discount in Percentage <span class="red-text">*</span></label>
                                                </div>
                                                
                                                <div class="input-field col s12 l6">
                                                  <input type="text" autofocus="" required id="gst_amount" name="gst_amount" class="validate">
                                                  <label  class="active" for="gst_amount">18% GST Amount : <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" autofocus="" required id="amt_after_disc" name="amt_after_disc" class="validate">
                                                  <label class="amt_after_disc" for="amt_after_disc">Amt Payable After Disc : <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" autofocus="" id="tds" name="tds" class="validate">
                                                  <label  class="active" for="tds">TDS If Applicable: </label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" autofocus="" required id="t_amnt" name="t_amnt" class="validate">
                                                  <label for="t_amnt">Total Amount <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l12">
                                                  <input type="text" autofocus="" required id="am_words" name="am_words" class="validate">
                                                  <label for="am_words">Amount in words <span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                            <div class="divider"> </div>

                                             <p class="m-15">Payment Mode : </p>
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                   <select id="pay_mode" name="pay_mode" required="">
                                                    <option value="">Choose the Payment Mode</option>
                                                      <option value="cheque">Cheque</option>
                                                      <option value="cash">Cash</option>
                                                      <option value="Online">Online NEFT/IMPS</option>
                                                      <option value="GoglePay/PhonePe">GoglePay/PhonePe/Paytm</option>
                                                      <option value="razorpay">Razor Pay</option>
                                                   </select>
                                                  <label for="pay_mode">Payment Mode <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="inst_no" required name="inst_no" class="validate" >
                                                  <label for="inst_no">Instrument No <span class="red-text">*</span></label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pay_date" required name="pay_date" class="datepicker validate" >
                                                  <label for="pay_date">Payment Date <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="amount" required name="amount" class="validate" >
                                                  <label for="amount">Amount <span class="red-text">*</span></label>
                                                </div> 
                                            </div>

                                            <p class="m-15">PDC Details : </p>
                                        
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                    <input type="text" id="pdc_mode" name="pdc_mode" class="validate" >
                                                  <label for="pdc_mode">Payment Mode </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pdc_instrmnt" name="pdc_instrmnt" class="validate" >
                                                  <label for="pdc_instrmnt">Instrument No </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pdc_pay_date" name="pdc_pay_date" class="datepicker validate">
                                                  <label for="pdc_pay_date">Payment Date </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pdc_amount" name="pdc_amount" class="validate" >
                                                  <label for="pdc_amount">Amount </label>
                                                </div>
                                            </div>

                                            <p class="m-15">Employee Detail</p>
                                        
                                            <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                <select id="emp" name="emp" required="">
                                                  <option value="">Choose the Employee</option>
                                                  <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {

                                                    switch ($emps->admin_type) {
                                                      case '2':
                                                        $tp = 'Manager';
                                                        break;
                                                      case '3':
                                                        $tp = 'Sales Executive';
                                                        break;
                                                      case '4':
                                                        $tp = 'Area Sales Manager';
                                                        break;
                                                      case '5':
                                                        $tp = 'Sales Manager';
                                                        break;
                                                      case '6':
                                                        $tp = 'Tele Caller';
                                                        break;
                                                      case '7':
                                                        $tp = 'Finance Executive';
                                                        break;

                                                      default:
                                                        $tp = 'Sales Executive';
                                                        break;
                                                    }
                                                  if ($emps->admin_type != '1' && $emps->admin_type != '2') { ?>
                                                  <option value="<?php echo $emps->id ?>"><?php echo $emps->name .'&nbsp;-&nbsp;'.$tp; ?></option>
                                                  <?php  }}} ?>
                                                </select>
                                                <label for="emp">Select Employee <span class="red-text">*</span></label>
                                              </div>
                                              
                                              <div class="input-field col s12 l6">
                                                <select id="mang" name="mang" required="">
                                                  <option value="">Choose the Manager</option>
                                                  <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {
                                                  if ($emps->admin_type == '2') { ?>
                                                  <option value="<?php echo $emps->id ?>"><?php echo $emps->name ?></option>
                                                  <?php  }}} ?>
                                                </select>
                                                <label for="mang">Select Manager <span class="red-text">*</span></label>
                                              </div>
                                              
                                            </div>

                                            
                                            
                                            <input type="hidden" name="uniq" value="<?php echo random_string('alnum',16) ?>">
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
      $("select").css({display: "inline", height: 0, padding: 0, width: 0});

        // $("#admin-form").validate({
        //     rules: {
        //         name: {required: true, }, 
        //         email: {required: true, }, 
        //         Ad_type:{required:true,},
        //       },             
        //     messages: {
                
        //         name: "Please enter a name",
        //         email: "Please enter a email",
        //         ad_type:"Please select the Employee type",
        //     }
        // });

        $(document).on('change', '#package', function(){
          var pack = $(this).val();
          $.ajax({
            url: '<?php echo base_url() ?>vendors_upgrade/getPrice',
            type: 'GET',
            dataType: 'json',
            data: {package: pack},
            success:function(data)  
              {
                $('#nt_amnt').val(data.price);
                $('#gst_amount').val(data.gst);
                $(".ntam").addClass("active");
                var tot = parseInt(data.price) + parseInt(data.gst);
                $('#t_amnt').val(tot);
              }
          });
          
        });

        $(document).on('change', '#discount', function(){
          var discount  = $(this).val();
          var netam     = $("#nt_amnt").val();
          var gst       = $("#gst_amount").val();
          if ((netam !='') && (gst !='')) {
            var tot = parseInt(netam) + parseInt(gst);
            var amount =  (parseInt(tot) * parseInt(discount)) / 100;
            if (amount > tot) {
              var total = amount - tot;
            }else{
              var total = tot - amount;
            }
            $('#amt_after_disc').val(total);
            $('#t_amnt').val(total);
          }
        });


        $(document).on('change', '#tds', function(){
          var tds   = $(this).val();
          if (tds =='') { tds=0; }
          var tot   = $("#amt_after_disc").val();
          if (tot =='') { tot=0; }
          var total = parseInt(tds)+ parseInt(tot);
            $('#t_amnt').val(total);
        });

        

        $(document).on('change', '#pay_mode', function(){
          var payMode  = $(this).val();
           if(payMode == 'cheque'){
            $('#pdcs').css('display','block');
           }else{
            $('#pdcs').css('display','none');
           }
        });
    });
    </script>
        
    </body>
</html>