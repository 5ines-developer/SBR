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
        .bt-red{border-top: 4px solid red; }
        .p-image {width: 260px;}
        .m-10{ margin: 10px !important; }
        .prop-title{
          background-color:
          #D0021B !important;
          line-height: 22px;
          padding: 4px 10px 4px 10px;
          font-size: 20px;
          font-weight: 500;
        }
        .b-none{
          border: none;
        }
        #billing th{width: 150px;}

        .col-befor{
          position: relative;
          padding-right: 15px;
        }
        .col-befor::after{
          content: ":";
          position: absolute;
          right: 7px;
        }
        #billing td{
          padding: 4px 5px;
          
        }
        #billing th{
          font-size: 12px;
        }
        #billing .t-title {
    padding-bottom: 10px;
}
        .t-title {font-size: 16px !important; } 
        .listing{border-bottom: 3px solid black; }
        .listing tr{border-bottom: 2px solid rgba(0,0,0,0.12); }
        .terms tr{border: none; }
        .term-sub{padding: 5px; }
        .terms ul:not(.browser-default) > li {list-style-type: decimal; }
        .terms ul{padding-left: 20px; margin: 0; }
        .sell th{font-size: 12px; } 
        .package th{font-size: 12px; }
        .cheque th{font-size: 12px; } 
        .company-repr tbody > tr > th{font-size: 12px; width: 200px; }
        .no-borders tr, .no-borders td , .no-borders th{border: none !important; } 
        .no-borders td , .no-borders th{padding: 0; } 
        .no-borders {margin-top: 30px; margin-bottom: 10px; } 
        .borders tr, .borders td , .borders th{border: 1px solid #80808075; } 
        .borders{margin-bottom: 20px;}
        .outer-borders{border: 1px solid #80808075; }
        .outer-borders tr,.outer-borders th,.outer-borders td{border: none !important; }
        .two-table .outer-borders th, .two-table .outer-borders td{ padding: 8px !important; }
        .two-table .borders th, .two-table .borders td{ padding: 6px !important; }


     </style>
   </head>
   <body>
    
      <!-- first layout -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <div class="col m12 s12 l9 offset-l2">

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container bt-red">

                                      
      <table>
        <thead>
          <tr >
              <th class="center-align" colspan="2"><img class="p-image" src="<?php echo $_SERVER["DOCUMENT_ROOT"] ?>/shaadibaraati/assets/img/logo.png" alt=""></th>
          </tr>
        </thead>        
      </table>

      <table class="no-borders">
        <thead>
          <tr>
            <td><b>Baraati Media and Entertainment Private Limited</b></td>
            <th class="right-align">Support : <span class="red-text">1800 4199 456</span></th>
            
          </tr>
          <tr>
            <td>No 60, Old no, 32/1, 2nd Floor St. John Road, Ulsor.</td>
            <th class="right-align">Email : <span ><a class="red-text" href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a></span> </th>
          </tr>
          <tr>
            <td>Bangalore, Karnataka 560042 IN</td>
          </tr>
          <tr>
            <td><b>GSTIN</b> : 89AAICB5254GIZJ </td>
          </tr>
        </thead>        
      </table>
      <div class="divider"></div>


      <table class="no-borders" id="billing">
        <thead>
          <tr>
              <th class="red-text t-title">Billing Details</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th class="col-befor">Client name </th>
            <td><?php echo (!empty($result['c_name']))?$result['c_name']:''; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Client Address</th>
            <td><?php echo (!empty($result['c_address']))?$result['c_address']:''; ?></td>
          </tr>
            <tr>
            <th class="col-befor">GSTIN Number   </th>
            <td><?php echo (!empty($result['c_gstin']))?$result['c_gstin']:''; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Invoice No.    </th>
            <td><?php echo (!empty($result['invoice_no']))?$result['invoice_no']:''; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Invoice Date    </th>
            <td><?php echo (!empty($result['in_date']))?$result['in_date']:''; ?></td>
          </tr>
          
        </tbody>
      </table>

      <table class="borders">
        
        <tbody>
          <tr>
            <th>Package</th>
            <th>Package Cost</th>
            <th>Discount</th>
            <th>CGST @9%</th>
            <th>SGST @9%</th>
            <th>IGST @18%</th>
            <th>Total (Rs.)</th>
          </tr>
          <tr>
            <td><?php echo (!empty($result['package']))?$result['package']:''; ?></td>
            <td><?php echo (!empty($result['pa_cost']))?$result['pa_cost']:''; ?></td>
            <td><?php echo (!empty($result['discount']))?$result['discount']:''; ?></td>
            <td><?php echo (!empty($result['cgst']))?$result['cgst']:''; ?></td>
            <td><?php echo (!empty($result['sgst']))?$result['sgst']:''; ?></td>
            <td><?php echo (!empty($result['igst']))?$result['igst']:''; ?></td>
            <td><?php echo (!empty($result['total']))?$result['total']:''; ?></td>
          </tr>
          <tr>
            <th>Total</th>
            <td><?php echo (!empty($result['pa_cost']))?$result['pa_cost']:''; ?></td>
            <td><?php echo (!empty($result['discount']))?$result['discount']:''; ?></td>
            <td><?php echo (!empty($result['cgst']))?$result['cgst']:''; ?></td>
            <td><?php echo (!empty($result['sgst']))?$result['sgst']:''; ?></td>
            <td><?php echo (!empty($result['igst']))?$result['igst']:''; ?></td>
            <td><?php echo (!empty($result['total']))?$result['total']:''; ?></td>
          </tr>
        </tbody>
      </table>


      

      <table class="two-table">
        <tbody>
          <tr>
            <td>
              <table>
                <thead>
                  <th>Total Amount paid in words </th>
                  <td><?php echo (!empty($result['w_amount']))?$result['w_amount']:''; ?>  </td>
                </thead>
                <tbody>
                  <tr>
                    <th class="col-befor">Client Address</th>
                    <td><?php echo (!empty($result['c_address']))?$result['c_address']:''; ?></td>
                  </tr>
                  <tr>
                    <th class="col-befor">GSTIN Number   </th>
                    <td><?php echo (!empty($result['c_gstin']))?$result['c_gstin']:'NA'; ?></td>
                  </tr>
                  <tr>
                    <th class="col-befor">Invoice No.    </th>
                    <td><?php echo (!empty($result['invoice_no']))?$result['invoice_no']:''; ?></td>
                  </tr>
                  <tr>
                    <th class="col-befor">Invoice Date    </th>
                    <td><?php echo (!empty($result['in_date']))?$result['in_date']:''; ?></td>
                  </tr>
                  
                </tbody>
              </table>
            </td>
            <td>
              <table class="borders">
                
                <tbody>
                  <tr>
                    <th>Amount Before Tax</th>
                    <td><?php echo (!empty($result['pa_cost']))?$result['pa_cost']:''; ?></td>
                  </tr>
                  <tr>
                    <td>ADD CGST</td>
                    <td><?php echo (!empty($result['cgst']))?$result['cgst']:''; ?></td>
                  </tr>
                  <tr>
                    <td>ADD SGST</td>
                    <td><?php echo (!empty($result['sgst']))?$result['sgst']:''; ?></td>
                  </tr>
                  <tr>
                    <td>ADD IGST</td>
                    <td><?php echo (!empty($result['igst']))?$result['igst']:''; ?></td>
                  </tr>
                  <tr>
                    <td>Tax Amount GST</td>
                    <td><?php echo (!empty($result['cgst']))?$result['cgst']:''; ?></td>
                  </tr>
                  <tr>
                    <td>Total Amount With GST</td>
                    <td><?php echo (!empty($result['total']))?$result['total']:''; ?></td>
                  </tr>
                  <tr>
                    <td>GST Payable on Reverse Charge</td>
                    <td><?php echo (!empty($result['total']))?$result['total']:''; ?></td>
                  </tr>
                 
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="terms">
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
      </table>


      



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
        $("#city-form").validate({
            rules: {
                city: {
                    required: true,
                },
            },
            messages: {
                
                city: "Please enter a city",
            }
        });
    });
    </script>
        
    </body>
</html>