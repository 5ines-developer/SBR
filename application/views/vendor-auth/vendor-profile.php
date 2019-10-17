<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <?php if (!empty($vendor)) {
           foreach ($vendor as $key => $value) { ?>
          
         <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <?php $this->load->view('includes/vendor-sidebar.php'); ?>
                    <div class="col l9 m9 s12">
                        <div class="vendor-detail-inputs b-sho">
                            <div class="vendor-head">
                                <h6>Business Profile</h6>
                            </div>
                            <div class="vendor-inputs">
                                <div class="row">
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="cname" type="text" class="validate" readonly="" value="<?php echo (!empty($value->name))?$value->name:''; ?>">
                                            <label for="cname">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="email" type="email" class="validate" readonly="" value="<?php echo (!empty($value->email))?$value->email:''; ?>">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="phone" type="text" class="validate" readonly="" value="<?php echo (!empty($value->phone))?$value->phone:''; ?>">
                                            <label for="phone">Phone No</label>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="city" type="text" class="validate" readonly="" value="<?php echo (!empty($value->city))?$value->city:''; ?>">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="price">Price</label>
                                            <input id="price" type="text" class="validate"  v-model="price" @change="addPrice">
                                            <span class="helper-text red-text" >{{ priceError }}</span>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="per">Price Per</label>
                                            <input id="per" type="text" class="validate" @change="pricePer"  v-model="per">
                                            <span class="helper-text red-text" >{{ perError }}</span>
                                        </div>
                                    </div> 
                                    <div class="col l12 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="vaddress">Address <span class="red-text">*</span></label>
                                            <textarea id="vaddress" rows="10" class="materialize-textarea" v-on:keyup="address"  v-model="vaddress" :style="{ height: height + 'px' }"  >{{ addressError }}</textarea>
                                        </div>
                                    </div>
                                                                      
                                    <div class="col l6 m5 s12">
                                        <div class="file-field input-field">
                                            <div class="btn hh-file">
                                                <span class="banner-ioc"><i class=" material-icons vender-icon">perm_media</i>Banner Image</span>
                                                <input type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate if-file" type="text" placeholder="Upload Your Image">
                                            </div>
                                        </div>
                                        <span class="helper-text-vender"><b class="notes">Note</b>: Please select only image file
                                            (eg: .jpg, .png, .jpeg etc.) <br> <b class="notes">Max filesiemens
                                                size:</b> 512kb <span class="red-text">*</span></span>
                                    </div>

                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="category" type="text" class="validate" readonly="" value="<?php echo (!empty($value->category))?$value->category:''; ?>">
                                            <label for="category">Category</label>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>About Company</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="row">
                                        <div class="col l12 m5 s12">
                                            <div id="toolbar-container"></div>
                                                <div @ready="about"  v-model="vabout" id="editor"> {{ aboutError }}</div> 
                                                <textarea  @change="about"  v-model="vabout" name="about" id="description" style="display:none"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio  -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Portfolio</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="row m0">
                                        <div class="col l3 m3 s6">
                                            <div class="portfolio-img">
                                                <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="../assets/img/vendor-img1.jpg" style="cursor: pointer;">
                                                <div class="port-delete">
                                                    <a href="">
                                                        <i class="large material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l3 m3 s6">
                                            <div class="portfolio-img">
                                                <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="../assets/img/vendor-img1.jpg" style="cursor: pointer;">
                                                <div class="port-delete">
                                                    <a href="">
                                                        <i class="large material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l3 m3 s6">
                                            <div class="portfolio-img">
                                                <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="../assets/img/vendor-img1.jpg" style="cursor: pointer;">
                                                <div class="port-delete">
                                                    <a href="">
                                                        <i class="large material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l3 m3 s6">
                                            <div class="portfolio-img">
                                                <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="../assets/img/vendor-img1.jpg" style="cursor: pointer;">
                                                <div class="port-delete">
                                                    <a href="">
                                                        <i class="large material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m0">
                                        <div class="col col l12 m10 s12">
                                            <div class="file-field input-field mm-drop">
                                                <div class="input-images pad10"></div>
                                                <span class="helper-text-vender "><b class="notes">Note</b>: Please select only image file
                                                            (eg: .jpg, .png, .jpeg etc.) <br> <b class="notes">Max filesiemens
                                                                size:</b> 512kb <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Video -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Video Links</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="row">
                                        <div class="col l4 m3 s12">
                                            <div class="portfolio-img">
                                                <iframe width="100%" src="https://www.youtube.com/embed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <div class="vid-delete">
                                                    <a href=""><i class="material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l4 m3 s12">
                                            <div class="portfolio-img">
                                                <iframe width="100%" src="https://www.youtube.com/embed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <div class="vid-delete">
                                                    <a href="">
                                                        <i class=" material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col l8 m10 s12">
                                            <div class="input-field sele-ty">
                                                <select name="vd_category" required="" id="vd_category">
                                                            <option value="">Select Your Video category</option>
                                                            <option value="1">Youtube</option>
                                                            <option value="2">Facebook</option>
                                                        </select>
                                                <p><span class="error"></span></p>
                                                <input type="hidden" value="" name="id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="youtube-link">
                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vd_link" id="autocomplete-input" class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.youtube.com/watch?v=<span style="background-color: cadetblue; color: white; padding: 5px; font-size: 14px;">4GuiHfZDjtc</span>
                                                </p>
                                                <label for="autocomplete-input">Link<span class="red-text">*</span></label>
                                                <p><span class="error"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m0">
                                        <div id="fb-link">
                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vdfb_link" id="autocomplete-input1" class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.facebook.com/<span style="background-color: cadetblue; color: white; padding: 5px; font-size: 14px;">countychampionship/videos/349068499381369/</span>
                                                </p>
                                                <label for="autocomplete-input1">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Information & Services -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Information & Services</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="infor-ser">
                                        <div class="row">
                                            <div class="col l1 m3 s2 ">
                                                <div class="" id="edt-image">
                                                    <div class="image-information">
                                                        <img class="infor-service i-img" src="../assets/img/information-icon.png" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="title_info" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Title </label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="sub_title" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Subtitle</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-ser">
                                        <div class="row">
                                            <div class="col l1 m3 s2 ">
                                                <div class="" id="edt-image">
                                                    <div class="image-information">
                                                        <img class="infor-service i-img" src="../assets/img/information-icon.png" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="title_info" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Title </label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="sub_title" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Subtitle</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infor-ser">
                                        <div class="row">
                                            <div class="col l1 m3 s2 ">
                                                <div class="" id="edt-image">
                                                    <div class="image-information">
                                                        <img class="infor-service i-img" src="../assets/img/information-icon.png" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="title_info" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Title </label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="sub_title" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Subtitle</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>FAQ</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="faq-ser">
                                        <div class="row mb0">
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="title_info" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Question</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="sub_title" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Answer</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-ser">
                                        <div class="row mb0">
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="title_info" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Question</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="sub_title" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Answer</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-ser">
                                        <div class="row mb0">
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="title_info" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Question</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" id="info" name="sub_title" class="validate" value="">
                                                    <input type="text" readonly value="">
                                                    <label for="serv">Answer</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Offer Image-->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Offer Image</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="offer-ser">
                                        <div class="row mb0">
                                            <div class="col l7 m7 s12">
                                                <div class="file-field input-field">
                                                    <div class="btn hh-file">
                                                        <span class="banner-ioc"><i class=" material-icons vender-icon">perm_media</i>Add Image</span>
                                                        <input type="file">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate if-file" type="text" placeholder="Upload Your Image">
                                                    </div>
                                                </div>
                                                <span class="helper-text-vender"><b class="notes">Note</b>: Please select only image file
                                                            (eg: .jpg, .png, .jpeg etc.) <br> <b class="notes">Max filesiemens
                                                                size:</b> 512kb <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php  } } ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');
                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);

            // nav
            var sidenav = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(sidenav);

        });
    </script>
    <!-- <script>
        CKEDITOR.replace('editor');
    </script> -->

    <script>
        $(document).ready(function() {
            $('.input-images').imageUploader();
        });
    </script>

    <script>
         $(function() {
            ('#vendor-about').submit(function() {
                var text = $('#editor').html();
                $('#description').val(text);
            });
         });
        $(document).ready(function() {
            $('.modal').modal();
            $('.scrollspy').scrollSpy();
            $("#vd_category").change(function() {
                var cat = $(this).children("option:selected").val();
                if (cat == '2') {
                    $("#fb-link").css("display", "block");
                    $("#youtube-link").css("display", "none");
                } else if (cat == '1') {
                    $("#youtube-link").css("display", "block");
                    $("#fb-link").css("display", "none");
                }
            });
        });
    </script>
        
     <script>
        var demo = new Vue({
            el: '#app',
            data: {
                price: '',
                priceError: '',
                active:false,
                per:'',
                perError:'',
                vaddress:'',
                addressError:'',
                height:'',
                vabout :'',
                aboutError:'',



                
            },

            methods: {
                // mobile number check on database
                addPrice(){
                    this.priceError = '';
                    const formData = new FormData();
                        formData.append('price', this.price);
                        axios.post('<?php echo base_url() ?>vendor_detail/addPrice', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.priceError = 'Something went wrong, please try again!';
                        }else{
                            this.price = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                
                pricePer(){
                    this.priceError = '';
                    const formData = new FormData();
                        formData.append('per', this.per);
                        axios.post('<?php echo base_url() ?>vendor_detail/pricePer', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.priceError = 'Something went wrong, please try again!';
                        }else{
                            this.per = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                address(){
                    this.addressError = '';
                    const formData = new FormData();
                        formData.append('vaddress', this.vaddress);
                        axios.post('<?php echo base_url() ?>vendor_detail/address', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.addressError = 'Something went wrong, please try again!';
                        }else{
                            this.vaddress = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                about(){
                    console.log(this.vabout)
                    this.aboutError = '';
                    const formData = new FormData();
                        formData.append('vabout', this.vabout);
                        axios.post('<?php echo base_url() ?>vendor_detail/about', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.aboutError = 'Something went wrong, please try again!';
                        }else{
                            this.vabout = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

                

                getPrice(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getPrice')
                      .then(response => {
                        if(response.data != ''){
                            this.price = response.data;
                            this.active = true;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getPer(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getPer')
                      .then(response => {
                        if(response.data != ''){
                            this.per    = response.data;
                            this.active = true;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getAddress(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getAddress')
                      .then(response => {
                        if(response.data != ''){
                            this.vaddress       = response.data;
                            this.height         = response.data.length/2.5;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

            },
            mounted: function() {
            this.getPrice();
            this.getPer();
            this.getAddress();
            

 
        }



        });
    </script>
</body>

</html>