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

                        <div class="col m12 s12 l9 left-align">
                          <?php $this->load->view('include/pre-loader'); ?>
                          <div class="row m0">
                            <div class="col 12 m6">
                              <p class="h5-para black-text ">Edit admin user - <?php echo (!empty($result->name))?$result->name:''; ?></p>
                            </div>
                            <div class="col 12 m6 right-align">
                            <?php
                                if ($result->is_active == '1') { ?>
                                  <a href=""
                                    class="waves-effect waves-light btn green hoverable white-text darken-4 plr40"
                                id="unblock">Unblock</a>                              
                                
                                <?php }elseif ($result->is_active == '2') { ?>

                                  <a href=""
                                    class="waves-effect waves-light btn red hoverable white-text darken-4 plr40"
                                id="block">Block</a>
                                
                                <?php } ?>
                              

                              <a href=""class="waves-effect waves-light btn red hoverable white-text darken-4 plr40"id="block" style="display: none">Block</a> 
                              <a href=""class="waves-effect waves-light btn green hoverable white-text darken-4 plr40"id="unblock" style="display: none">Unblock</a> 
                              <input type="hidden" name="userid" id="userid" value="<?php echo $result->id ?>">
                              </div>
                            
                          </div>

                            


                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>employees/update" method="post"  id="admin-form" enctype="multipart/form-data">
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="name" name="name" class="validate" required value="<?php echo (!empty($result->name))?$result->name:''; ?>">
                                                  <label for="name">Name<span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="email" name="email" class="validate" required value="<?php echo (!empty($result->email))?$result->email:''; ?>">
                                                  <label for="email">Email<span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="phone" name="phone" class="validate" value="<?php echo (!empty($result->phone))?$result->phone:''; ?>">
                                                  <label for="phone">Phone</label>
                                                  <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                                </div>
                                            
                                                <div class="input-field col s12 l6">
                                                  <select name="Ad_type" required id="Ad_type" >
                                                        <option value="2" <?php if($result->admin_type == '2') { echo'selected'; } ?> >Manager</option>
                                                        <option value="3" <?php if($result->admin_type == '3') { echo'selected'; } ?> >Executive</option>
                                                  </select>
                                                  <label>Employee Type</label>
                                                </div>
                                            </div>

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <select name="discount" required id="discount">
                                                    <option value="10" <?php if($result->discount == '10') { echo 'selected'; } ?> >10%</option>
                                                    <option value="20" <?php if($result->discount == '20') { echo 'selected'; } ?> >20%</option>
                                                    <option value="30" <?php if($result->discount == '30') { echo 'selected'; } ?> >30%</option>
                                                    <option value="40" <?php if($result->discount == '40') { echo 'selected'; } ?> >40%</option>
                                                    <option value="40+" <?php if($result->discount == '40+') { echo 'selected'; } ?> >40 +</option>
                                                  </select>
                                                  <label>Discount Percentage</label>
                                                </div>
                                                <div class="input-field col s12 l6 " id="manager_col">
                                                  <select name="manager" required id="manager">
                                                    <option value="">Choose Manager</option>
                                                    <?php if(!empty($manager)){                                                     

                                                      foreach($manager as $mang => $mangs){ ?>
                                                        <option value="<?php echo $mangs->id ?>" <?php if($mangs->id == $result->manager){ echo 'selected'; } ?> ><?php echo $mangs->name ?></option>
                                                    <?php  } } ?>                                                    
                                                  </select>
                                                  <label>Manager</label>
                                                </div>
                                            </div>

                                            <div class="row m0">
                                            <div class="ml-15">
                                              <p>Access Permission</p>
                                              <div class="input-field col s12 l12">
                                              <?php 
                                              $admenu = explode (",", $result->menu);
                                              
                                              if (!empty($menues)) {  
                                                  foreach ($menues as $mens => $men) { 
  
                                                   ?>                                                   
                                                    <div class="col l4">                                                    
                                                      <p>
                                                        <label> 
                                                        
                                                          <input type="checkbox" name="menu[]" class="filled-in" value="<?php echo $men->id ?>" <?php for ($i=0; $i < count($admenu); $i++) { if($admenu[$i] == $men->id){ echo 'Checked'; } } ?> > 
                                                          <span><?php echo $men->title ?></span> 
                                                        </label>
                                                      </p> 
                                                    </div>
                                                <?php } } ?>

                                              </div>
                                            </div>
                                              

                                            </div>


                                            
                                            
                                              <div class="col s12">
                                              <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                              <?php ?>
                                              </div>

                                              <input type="hidden" name="id" value="<?php echo $result->id; ?>">

                                            
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

        

        $(document).on('change','#Ad_type',function(){
          var adtype = $(this).val();
          if(adtype == '3'){
            $('#manager_col').css('display','block');
          }else{
            $('#manager_col').css('display','none');
          }
        })


         $("#block").on('click', function(event) {
            event.preventDefault();
            var id = $("input[name='userid']").val();
            loder(true);
            $.ajax({
                url: "<?php echo base_url();?>adminusers/block",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                    'status': '2'
                },
                success: function(data) {
                    console.log(data);
                    $('#unblock').css('display', ' inline-block ');
                    $('#block').css('display', 'none');
                    loder(false);
                }
            });
        });


         $("#unblock").on('click', function(event) {
            event.preventDefault();
            var id = $("input[name='userid']").val();
            loder(true);
            $.ajax({
                url: "<?php echo base_url();?>adminusers/block",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                    'status': '1'
                },
                success: function(data) {
                    console.log(data);
                    $('#block').css('display', ' inline-block ');
                    $('#unblock').css('display', 'none');
                    loder(false);
                }
            });
        });

         //page loader
        function loder(status) {
            if (status == true) {
                $('.preloader-verfy').css('display', 'block');
            } else {
                $('.preloader-verfy').css('display', 'none');
            }
        }


    });
    </script>
        
    </body>
</html>