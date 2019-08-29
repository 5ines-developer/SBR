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
                     <p class="h5-para black-text  mtb-20">Dashboard</p>
                     <div class="dash-list">

                        <div class="row ">
                           <div class="col l3 m6 s12">
                              <a href="">
                                 <div class="list-dashboard white z-depth-0">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round amber accent-4"><i class="fas fa-user-alt  white-text"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0">100  <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">New Candidates</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="">
                                 <div class="list-dashboard white z-depth-0">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round deep-purple lighten-1"><i class="fas fa-users   white-text"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">500<i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">New Employeers</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="">
                                 <div class="list-dashboard white z-depth-0">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round light-green accent-4"><i class="fas fa-briefcase  white-text"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0">600 <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total Jobs</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="">
                                 <div class="list-dashboard white z-depth-0">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round brown"><i class="fas white-text fa-handshake"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0">30 <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Partners enquiry</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>


                     </div>
                     <!-- end dash -->
                     <div class="char-dashboard">
                        <div class="row">
                           <div class="col l8 m12 s12">
                              <div class="chart-border">
                                 <!-- <div class="row">
                                    <div class="col l12 m12 s12">
                                       <div class="m0 border-button">
                                            <a class="btn-flat waves-effect waves-light  btn-small">Day</a>
                                            <a class="btn-flat waves-effect waves-light btn-small">Month</a>
                                            <a class="btn-flat waves-effect waves-light active btn-small">Year</a>
                                       </div>
                                    </div>
                                 </div> -->
                                 <canvas id="myChart" width="100%" height="60"></canvas>
                              </div>
                           </div>
                           <div class="col m4 s12 l4">
                           
                              <div class="bar-line white">
                                 <p class="h5-para-p1 ">Pending Employeer Approval</p>
                                 <div class="row m0">
                                    <div class="col s12">
                                       <div class="list-height">
                                          <div class="progress-bar-set">
                                             <div class="title-bar">
                                                <span>Active</span>
                                             </div>
                                             <div class="progress progress-app ">
                                                <span class="determinate deter1" style="width: 30%"></span>
                                             </div>
                                             <div class="">
                                                <span>30</span>
                                             </div>
                                          </div>

                                          <div class="progress-bar-set">
                                             <div class="title-bar">
                                                <span>Pending</span>
                                             </div>
                                             <div class="progress progress-app ">
                                                <span class="determinate deter2" style="width: 100%"></span>
                                             </div>
                                             <div class="">
                                                <span>40</span>
                                             </div>
                                          </div>

                                          <div class="progress-bar-set">
                                             <div class="title-bar">
                                                <span>Total</span>
                                             </div>
                                             <div class="progress progress-app ">
                                                <span class="determinate deter3" style="width: 100%"></span>
                                             </div>
                                             <div class="">
                                                <span>70</span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br>
                              
                              <div class="bar-line white">
                                 <p class="h5-para-p1 ">Candidate </p>
                                 <div class="row m0" >
                                    <div class="col s12">
                                      
                                       <div class="list-height">
                                          <div class="progress-bar-set">
                                             <div class="title-bar">
                                                <span>Active</span>
                                             </div>
                                             <div class="progress progress-app ">
                                                <span class="determinate deter1" style="width:10%"></span>
                                             </div>
                                             <div class="">
                                                <span>10</span>
                                             </div>
                                          </div>

                                          <div class="progress-bar-set">
                                             <div class="title-bar">
                                                <span>Pending</span>
                                             </div>
                                             <div class="progress progress-app ">
                                                <span class="determinate deter2" style="width: 60%"></span>
                                             </div>
                                             <div class="">
                                                <span>60</span>
                                             </div>
                                          </div>

                                          <div class="progress-bar-set">
                                             <div class="title-bar">
                                                <span>Total</span>
                                             </div>
                                             <div class="progress progress-app ">
                                                <span class="determinate deter3" style="width: 100%"></span>
                                             </div>
                                             <div class="">
                                                <span>100</span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div class="row">
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">Manage Employees</p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Company Name</th>
                                          <th id="b" class="h5-para-p2" width="100px">Company Person</th>
                                          <th id="c" class="h5-para-p2" width="120px">Contact No</th>
                                          <th id="d" class="h5-para-p2">Email ID</th>
                                          <th id="e" class="h5-para-p2" width="100px">Reg Date</th>
                                          <th id="f" class="h5-para-p2" width="100px">Status</th>
                                          <th id="g" class="h5-para-p2" width="62px">Action</th>
                                       </tr>
                                    </thead>
                                    
                                        <tr>
                                            <td >5ines</td>
                                            <td >developer</td>
                                            <td >0123 456 789</td>
                                            <td >test@test.com</td>
                                            <td >12 Agu 2019</td>
                                            <td>
                                                <span class='green-text'>Active</span>
                                                    <!-- <span class='red-text'>Pending</span> 
                                                <span class='Red-text'>Remove</span> -->
                                            </td>
                                            <td class="para-sub">
                                                <a href=""><i class="fas fa-pen blue-text  darken-4"></i></a>
                                                <a href=""><i class="far fa-trash-alt red-text"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td >5ines</td>
                                        <td >developer</td>
                                        <td >0123 456 789</td>
                                        <td >test@test.com</td>
                                        <td >12 Agu 2019</td>
                                        <td>
                                           
                                             <span class='Red-text'>Remove</span>
                                        </td>
                                        <td class="para-sub">
                                           <a href=""><i class="fas fa-pen blue-text  darken-4"></i></a>
                                           <a href=""><i class="far fa-trash-alt red-text"></i></a>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td >5ines</td>
                                            <td >developer</td>
                                            <td >0123 456 789</td>
                                            <td >test@test.com</td>
                                            <td >12 Agu 2019</td>
                                            <td>
                                            <span class='green-text'>Active</span>
                                                
                                            </td>
                                            <td class="para-sub">
                                            <a href=""><i class="fas fa-pen blue-text  darken-4"></i></a>
                                            <a href=""><i class="far fa-trash-alt red-text"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >5ines</td>
                                            <td >developer</td>
                                            <td >0123 456 789</td>
                                            <td >test@test.com</td>
                                            <td >12 Agu 2019</td>
                                            <td>
                                                <span class='Red-text'>Remove</span> 
                                            </td>
                                            <td class="para-sub">
                                            <a href=""><i class="fas fa-pen blue-text  darken-4"></i></a>
                                            <a href=""><i class="far fa-trash-alt red-text"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >5ines</td>
                                            <td >developer</td>
                                            <td >0123 456 789</td>
                                            <td >test@test.com</td>
                                            <td >12 Agu 2019</td>
                                            <td>
                                                <span class='Red-text'>Remove</span> 
                                            </td>
                                            <td class="para-sub">
                                            <a href=""><i class="fas fa-pen blue-text  darken-4"></i></a>
                                            <a href=""><i class="far fa-trash-alt red-text"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >5ines</td>
                                            <td >developer</td>
                                            <td >0123 456 789</td>
                                            <td >test@test.com</td>
                                            <td >12 Agu 2019</td>
                                            <td>
                                                <span class='red-text'>Pending</span> 
                                            </td>
                                            <td class="para-sub">
                                            <a href=""><i class="fas fa-pen blue-text  darken-4"></i></a>
                                            <a href=""><i class="far fa-trash-alt red-text"></i></a>
                                            </td>
                                        </tr>
                                      
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
          $(document).ready( function () {
              $('table').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf'
                  ], 
              });
              $('select').formSelect();
              
            $('#header-include').load('include/header.html');
            $('#sidemenu-include').load('include/menu.html');

          } );
      </script>
      <!-- <script>
         var ctx = document.getElementById("myChart").getContext('2d');
            $(document).ready(function(){
                var lab = [];
                var con = [];
                var canCon = [];
                $.ajax({
                    url: '<?php echo base_url("Dashboard/newemployeeYear") ?>',
                    method: 'GET',
                    async: true,
                    dataType: 'json',
                    success: function (d) {
                        for (let i = 0; i < d.length; i++) {
                            lab.push(d[i].month);
                            con.push(d[i].valeus);
                            canCon.push(d[i].canval);
                        }
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: lab,
                                datasets: [{
                                    label: 'New  Employer',
                                    data: con,
                                    backgroundColor: "rgba(0,128,0,0.1)",
                                    borderColor: "rgba(0, 128, 0, 1)",
                                    lineTension: 0.3,
                                    borderWidth: 2,
                                }, {
                                    label: 'New  Candidate',
                                    data: canCon,
                                    backgroundColor: "rgba(126,87,194,0.1)",
                                    borderColor: "rgba(126,87,194,1)",
                                    lineTension: 0.3,
                                    borderWidth: 2,
                                }]
                            },
                            options: {
                                legend: {
                                    display: true,
                                    labels: {
                                        fontColor: 'rgb(158,158,158)',
                                        fontSize: 12,
                                        usePointStyle: true
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'New Registration',
                                    position: 'top'
                                }
                            }
                        });
                    }
                });
            });
    </script> -->
</body>
</html>
