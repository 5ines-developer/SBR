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
      <!-- bar -->
      <style>
        /* .bordered tr{border: 1px solid gray; } 
        .brt{border-right: 1px solid gray; }
        .brb{ border-bottom: 1px solid gray; }
        .no-border-b{ border-bottom :  none !important; }
        .no-border-t{ border-top :  none !important; }
        .no-border-tb{ border-top :  none !important; border-bottom :  none !important; } */
        table tr td {font-size: 13px; font-weight: 600;}
        td, th {

    padding: 8px 5px; }


     </style>
   </head>
   <body>
    
      <!-- first layout -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <div class="col m12 s12 l8 offset-l2">

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">

                                      
      <table class="bordered">
        <tbody>
          <tr>
            <th style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray;border-right:none;" colspan="2" class="right-align">Order & Agreement Form</td>
            <th style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-right:1px solid gray;border-left: none;" class="right-align">Toll Free: 18004199456</th>
          </tr>
          <tr style="border: 1px solid gray;">
            <!-- $_SERVER["DOCUMENT_ROOT"] -->
              <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray;border-right: none;" colspan="2"><img class="p-image" src="<?php echo $_SERVER["DOCUMENT_ROOT"] ?>/assets/img/logo.png" alt=""></td>
              <td  style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: none;border-right:1px solid gray;" class="right-align">
                <b>Pan NO :</b> <span>AAICB5254G</span>
                <br>
                <b>GST NO : </b><span >29AAICB5254GIZJ</span> 
                <br>
                <b>CIN : </b><span >U92190KA2019PTC125842</span> 
                <br>
                <b>Baraati Media & Entertainment Pvt LTD.</b> 
                <br>
                <span >No. 60, Kundan Complex, 2nd Floor, St John Road, Bangalore - 560042</span>
              </td>
          </tr>
          <tr>
            <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray;border-right: none;" colspan="2">Vendor Listing Name : <?php echo (!empty($result['lname']))?$result['lname']:''; ?> </td>
            <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: none;border-right: 1px solid gray;" class="right-align">Date : <?php echo (!empty($result['pay_date']))?date('d M, Y',strtotime($result['pay_date'])):''; ?></td>
          </tr>
          <tr><td style="border: 1px solid gray;" colspan="3"> Billing Name: <?php echo (!empty($result['in_name']))?$result['in_name']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray;" colspan="3">GST NO : <?php echo (!empty($result['gstno']))?$result['gstno']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray; position: relative; top: -15px; bottom: 0; height: 68px;" colspan="3" height="100px;">Address :  <?php echo (!empty($result['laddress']))?$result['laddress']:''; ?></td></tr> <tr><td style="border: 1px solid gray;" colspan="3">City : <?php echo (!empty($result['city']))?$result['city']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray;" colspan="3">Contact Person : <?php echo (!empty($result['in_name']))?$result['in_name']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray;" colspan="3">Email Id : <?php echo (!empty($result['in_email']))?$result['in_email']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray;" colspan="3">Mobile Number : <?php echo (!empty($result['in_mobile']))?$result['in_mobile']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray;" colspan="3">Landline No: <?php echo (!empty($result['landline']))?$result['landline']:''; ?></td></tr>
          <tr><td style="border: 1px solid gray;" colspan="3">Category: <?php echo (!empty($result['category']))?$result['category']:''; ?></td></tr>
          <tr>
            <th style="border: 1px solid gray;">Sr No</th>
            <th style="border: 1px solid gray;" colspan="1" >Description</th>
            <th style="border: 1px solid gray;width: 20%;">Amount in Rs.</th>
          </tr>
          <!-- <tr>
            <td style="border: 1px solid gray;">1</td>
            <td colspan="1" style="border: 1px solid gray;">Package Name: <?php echo (!empty($result['title']))?$result['title']:''; ?><br>
            <span style="float: right;">Net Amount - &nbsp;&nbsp;</span><br>
            <span style="float: right;">GST Amount - &nbsp;&nbsp;</span><br>
            <span style="float: right;">Discount - &nbsp;&nbsp;</span>
            <br><br><span><b>Note: 18% GST as applicable</b></span>
            </td>
            <td style="border: 1px solid gray;"><br>
              Net Amount - 
              <span>Net Amount - &nbsp;&nbsp;</span><br>
              <span>Net Amount - &nbsp;&nbsp;</span><br>

              <?php echo (!empty($result['total']))?$result['total']:''; ?></td>
          </tr> -->
          <tr style="border-bottom:none;">
            <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;">1</td>
             <td colspan="1" style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;">Package Name: <?php echo (!empty($result['title']))?$result['title']:''; ?>
             <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"></td>
          </tr>
          <tr style="border-bottom:none;">
            <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"></td>
             <td colspan="1" style="float:right;border:none;">Net Amount -</td>
             <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"><?php echo (!empty($result['namopunt']))?$result['namopunt']:''; ?></td>
          </tr>
          <tr style="border-bottom:none;">
            <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"></td>
             <td colspan="1" style="float:right;border:none;">GST -</td>
             <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"><?php echo (!empty($result['gst']))?$result['gst']:''; ?></td>
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
          <tr style="border-bottom:none;">
            <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"></td>
             <td colspan="1" style="float:right;border:none;">Discount -
             <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"><?php echo $discount ?></td>
          </tr>
          <tr style="border-bottom:none;">
            <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"></td>
             <td colspan="1" style="float:left;border:none;"><b>Note: 18% GST as applicable</b></td>
             <td style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"></td>
          </tr>
          <tr>
            <td  style="border: 1px solid gray;"></td>
            <td colspan="1" style="border: 1px solid gray;" class="right-align">Total</td>
            <td  style="border: 1px solid gray;"><?php echo (!empty($result['total']))?$result['total']:''; ?></td>
          </tr>
          <tr>
            <td style="border: 1px solid gray;" colspan="3">
              <span>Reciept No : <?php echo (!empty($result['rec_no']))?$result['rec_no']:''; ?></span><br>
              <span>Recieved with thanks the sum of Rs<span style="border-bottom: 1px solid gray;"><?php echo (!empty($result['total']))?$result['total']:''; ?></span></span><br>
              <span>Rupees:  <span style="border-bottom: 1px solid gray;"><?php echo (!empty($result['total']))?$result['total']:''; ?></span> as per the details given below </span><br>
              <span>NEFT/RTGS/IMPS Direct Deposit/Cheque No:<?php echo (!empty($result['or_id']))?$result['or_id']:''; ?></span><br>
              <span>Drawee Bank : <?php echo (!empty($result['dr_bank']))?$result['dr_bank']:''; ?></span><br>
              <span>GST NO : <?php echo (!empty($result['gstno']))?$result['gstno']:''; ?></span><br>
              <span>PAN NO : <?php echo (!empty($result['pan_no']))?$result['pan_no']:''; ?></span><br>
            </td>
          </tr>
          <tr><td style="border: 1px solid gray;" colspan="3"><small>I/We have read and understood the terms and conditions on the back of this order & agreement form, and I/We hereby put My/Our Signature in acceptance thereof</small></td></tr>
          <tr><th style="border: 1px solid gray;" colspan="3" class="right-align">Baraati Media & Entertainment Pvt LTD.</th></tr>
          <tr>
          <td style="border: 1px solid gray;" class="right-align" colspan="2">Employee Name:</td>
            <td style="border: 1px solid gray;" colspan="1"><?php echo (!empty($result['empname']))?$result['empname']:''; ?></td>
          </tr>
          <tr>
          <td style="border: 1px solid gray;" class="right-align" colspan="2">Employee ID:</td>
            <td style="border: 1px solid gray;" colspan="1"><?php echo (!empty($result['empid']))?$result['empid']:''; ?></td>
          </tr>
          <tr>
            <td style="border: 1px solid gray;" colspan="3">Note : Cheques / DD Should be in favour of <b>"Baraati Media & Entertainment Pvt LTD."</b></td>
          </tr>
          <tr>
            <td style="border: 1px solid gray;" colspan="3"><small>As Per section 194 C Income Tax TDS applicable for Online Advertisement is 2%</small></td>
          </tr>
            
        </tbody>        
      </table>









     


      


      

      <!-- <table class="terms">
        <thead>
          <tr>
              <th class="red-text t-title">Terms & Conditions</th>
          </tr>
          <tr>
              <td class="term-sub">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <ul>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit.onse ctetur adip isicing elitonse ctetur adip isicing elit </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, cons ectetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consec tetur adipisicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consec tetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
            </ul></td>
          </tr>
          
        </tbody>
      </table> -->


    


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

        <script>
  <?php $this->load->view('include/message.php'); ?>
    
  </script>
      <script>
    $(document).ready(function() {
        $('select').formSelect();
    });
    </script>
        
    </body>
</html>