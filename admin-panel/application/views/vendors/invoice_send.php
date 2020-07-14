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
                                                  <input type="text" id="c_name" name="c_name" class="validate" required value="<?php echo (!empty($invoice[0]->invoice_name))?$invoice[0]->invoice_name:''; ?>">
                                                  <label for="c_name">Client name </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="c_gstin" name="c_gstin" class="validate" value="<?php echo (!empty($invoice[0]->gstno))?$invoice[0]->gstno:''; ?>">
                                                  <label for="c_gstin">Client GSTIN </label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="invoice_no" name="invoice_no" class="validate" required>
                                                  <label for="invoice_no">Invoice No.</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="in_date" name="in_date" class="datepicker validate" required >
                                                  <label for="in_date">Invoice Date</label>
                                                </div>
                                                
                                                <div class="input-field col s12 l12">
                                                  <textarea id="c_address" class="materialize-textarea" required name="c_address"><?php echo (!empty($invoice[0]->invoice_address))?$invoice[0]->invoice_address:''; ?></textarea>
                                                  <label for="c_address">Client Address</label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="package" name="package" class="validate" required 
                                                  value="<?php echo (!empty($invoice[0]->title))?$invoice[0]->title:''; ?>">
                                                  <label for="package">package</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pa_cost" name="pa_cost" class="validate" required 
                                                  value="<?php echo (!empty($invoice[0]->nt_amnt))?$invoice[0]->nt_amnt:''; ?>">
                                                  <label for="pa_cost">package Cost</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="discount" name="discount" class="validate" required 
                                                  value="<?php echo (!empty($invoice[0]->discount))?$invoice[0]->discount.' %':''; ?>">
                                                  <label for="discount">Discount</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="cgst" name="cgst" class="validate" required value="<?php echo (!empty($invoice[0]->gst_amount))?$invoice[0]->gst_amount:''; ?>">
                                                  <label for="cgst">GST 18%</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="total" name="total" class="validate" required 
                                                  value="<?php echo (!empty($invoice[0]->t_amnt))?$invoice[0]->t_amnt:''; ?>">
                                                  <label for="total">Total (Rs.)</label>
                                                </div>
                                                <?php
                                              $num = $invoice[0]->t_amnt;
                                              $num    = ( string ) ( ( int ) $num );
                                     
                                              if( ( int ) ( $num ) && ctype_digit( $num ) )
                                              {
                                                  $words  = array( );
                                                 
                                                  $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
                                                 
                                                  $list1  = array('','one','two','three','four','five','six','seven',
                                                      'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                                                      'fifteen','sixteen','seventeen','eighteen','nineteen');
                                                 
                                                  $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                                                      'seventy','eighty','ninety','hundred');
                                                 
                                                  $list3  = array('','thousand','million','billion','trillion',
                                                      'quadrillion','quintillion','sextillion','septillion',
                                                      'octillion','nonillion','decillion','undecillion',
                                                      'duodecillion','tredecillion','quattuordecillion',
                                                      'quindecillion','sexdecillion','septendecillion',
                                                      'octodecillion','novemdecillion','vigintillion');
                                                 
                                                  $num_length = strlen( $num );
                                                  $levels = ( int ) ( ( $num_length + 2 ) / 3 );
                                                  $max_length = $levels * 3;
                                                  $num    = substr( '00'.$num , -$max_length );
                                                  $num_levels = str_split( $num , 3 );
                                                 
                                                  foreach( $num_levels as $num_part )
                                                  {
                                                      $levels--;
                                                      $hundreds   = ( int ) ( $num_part / 100 );
                                                      $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                                                      $tens       = ( int ) ( $num_part % 100 );
                                                      $singles    = '';
                                                     
                                                      if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); 
                                                  } 

                                                      $commas = count( $words ); 
                                                      if( $commas > 1 )
                                                  {
                                                      $commas = $commas - 1;
                                                  }
                                                 
                                                  $words  = implode( ', ' , $words );
                                                 
                                                  //Some Finishing Touch
                                                  //Replacing multiples of spaces with one space
                                                  $words  = trim( str_replace( ' ,' , ',' , trim( ucwords( $words ) ) ) , ', ' );
                                                  if( $commas )
                                                  {
                                                      $words  = str_replace( ',' , ' and' , $words );
                                                  }
                                                  
                                              }
                                              else if( ! ( ( int ) $num ) )
                                              {
                                                  $words ='';
                                              }


                                              ?>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="w_amount" name="w_amount" class="validate" required value="<?php echo $words; ?>">
                                                  <label for="w_amount">Total Amount in words</label>
                                                </div>


                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pay_mode" required name="pay_mode" class="validate" value="<?php echo (!empty($invoice[0]->pay_mode))?$invoice[0]->pay_mode:''; ?>">
                                                  <label for="inst_no">Payment Mode <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="inst_no" required name="inst_no" class="validate" value="<?php echo (!empty($invoice[0]->inst_no))?$invoice[0]->inst_no:''; ?>">
                                                  <label for="inst_no">Instrument No <span class="red-text">*</span></label>
                                                </div>

                                                
                                                <div class="clearfix"></div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pay_date" required name="pay_date" class="datepicker validate" value="<?php echo (!empty($invoice[0]->pay_date))?$invoice[0]->pay_date:''; ?>">
                                                  <label for="pay_date">Payment Date <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="amount" required name="amount" class="validate" value="<?php echo (!empty($invoice[0]->amount))?$invoice[0]->amount:''; ?>">
                                                  <label for="amount">Amount <span class="red-text">*</span></label>
                                                </div>
                                            </div>

                                            <input type="hidden" name="uniq_id" value="<?php echo random_string('alnum',10) ?>">
                                            <input type="hidden" name="rpid" value="<?php echo (!empty($rpid))?$rpid:''; ?>">
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