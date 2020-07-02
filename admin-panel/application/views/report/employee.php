<?php $this->ci =& get_instance(); $this->load->model('m_report'); ?>
<!DOCTYPE html>
<html>

   <head>
      <title><?php echo $title ?></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      
      <style type="text/css">
         .dash-list a .list-dashboard{transition: 0.5s}
         .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
         .patabl{ padding: 27px 27px 13px 0px; }
      
      </style>
   </head>
   <body>
      <!-- headder -->
         <div id="header-include">
           <?php $this->load->view('include/header.php'); ?>
         </div>
      <!-- end headder -->
      <!-- main layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="row">
              <!-- menu  -->

              <div id="sidemenu-include">
                <?php $this->load->view('include/menu.php'); ?>
              </div>


               <div class="col m12 s12 l9">
                  <div class="main-bar"> 
                    <div class="row">
                                <div class="col 12 m6">
                                    <p class="h5-para black-text m0">Employee Report - <?php echo date('M-y') ?></p>
                                </div>
                            </div>
                            <div class="row">
                                      <div class="col l3 m6">
                                          <select id="year"  fname="year" name="year" class="select-list" required="">
                                            <option value="">Choose a year</option>
                                            <?php for($i=2010; $i <=date('Y'); $i++ ){
                                               ?>
                                              <option value="<?php echo $i; ?>" <?php if($this->input->get('year') == $i){ echo 'selected'; } ?>><?php echo $i; ?></option>
                                            <?php }?>
                                          </select>
                                        </div>

                                        <div class="col l3 m6">
                                          <select id="month"  fname="month" name="month" class="select-list" required="">
                                            <option value="">Choose a month</option>
                                            <?php
                                            $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December',);
                                            foreach ($months as $key => $value) { ?>
                                             <option value="<?php echo $key+1; ?>" <?php if($this->input->get('month') == $key+1){ echo 'selected'; } ?>><?php echo $value; ?></option>
                                            <?php }?>
                                          </select>
                                        </div>

                                       <div class="col l3 m6">
                                          <select id="city"  fname="city" class="select-list" name="city">
                                            <option value="">Choose a city</option>
                                            <?php if (!empty($city)) { 
                                              foreach ($city as $cit => $cits) { ?>
                                                <option value="<?php echo $cits->id ?>" <?php if($this->input->get('city') == $cits->id){ echo 'selected'; } ?> ><?php echo $cits->city ?></option> 
                                            <?php  } } ?>
                                          </select>
                                        </div>
                                  <div class="row">
                                    <div class="clearfix"></div>

                     
                     <!-- end dash -->
                     

                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                <div class="row">
                                  <div class="">
                                  <div class="col l4 m6">
                                    <p class="h5-para-p2">Manage Employee Report</p>
                                  </div>
                                    </div>
                                  </div>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Employee Branch</th>
                                          <th id="a" class="h5-para-p2" width="130px">Employee Name</th>
                                          <th id="a" class="h5-para-p2" width="130px">Manager</th>
                                          <th id="a" class="h5-para-p2" width="130px">Target</th>
                                          <th id="c" class="h5-para-p2" width="120px">Cleared</th>
                                          <th id="c" class="h5-para-p2" width="120px">Pending</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($result)) {
                                      $yrs='';
                                      $mnt='';
                                      foreach ($result as $key => $value) {
                                        $yr = $this->input->get('year');
                                        $mn = $this->input->get('month');
                                        if (!empty($yr)) {$yrs = $yr; }else{$yrs = date('Y'); }
                                        if (!empty($mn)) {$mnt = $mn; }else{$mnt = date('m'); }
                                        $cleared = $this->ci->m_report->emp_clear($value->id,$mnt,$yrs);
                                        
                                        $target = str_replace(",","",$value->target);
                                        if ($cleared > $target) { $pending = 0; }else{ $pending = $target - $cleared; } 

                                        $manager = $this->ci->m_report->manager($value->id);

                                        ?>
                                        <tr>
                                            <td ><?php echo (!empty($value->city))?$value->city:'---'  ?></td>
                                            <td ><?php echo (!empty($value->name))?$value->name:'---'  ?></td>
                                            <td ><?php echo $manager; ?></td>
                                            <td ><?php echo (!empty($value->target))?$value->target:'---'  ?></td>
                                            <td ><?php echo   $cleared  ?></td>
                                            <td ><?php echo $pending  ?></td>
                                        </tr>
                                    <?php } 

                                  } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/chart.min.js"></script>
      <!-- data table -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
       <script>
  <?php $this->load->view('include/message.php'); ?>
    
  </script>

      <script>
          $(document).ready( function () {
              $('table').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf'
                  ], 
              });
              $('select').formSelect();


              $('.select-list').change(function(){

                if(window.location.href.indexOf("?") < 0){
                    var windowUrl = window.location.href+'?';
                } else{
                    var windowUrl = window.location.href;
                }

                var val = $(this).val();
                var name = '&'+$(this).attr('fname')+'=';
                var names=$(this).attr('fname');
                var url = windowUrl+name+val;
                var originalURL = windowUrl+name+val;
                var alteredURL = removeParam(names, originalURL);
                window.location = alteredURL+name+val;
            });

              function removeParam(key, sourceURL) {
                var rtn = sourceURL.split("?")[0],
                    param,
                    params_arr = [],
                    queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
                if (queryString !== "") {
                    params_arr = queryString.split("&");
                    for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                        param = params_arr[i].split("=")[0];
                        if (param === key) {
                            params_arr.splice(i, 1);
                        }
                    }
                    rtn = rtn + "?" + params_arr.join("&");
                }
                return rtn;
            }


          } );
      </script>
      
</body>
</html>
