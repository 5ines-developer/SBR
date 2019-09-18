<?php  $this->ci =& get_instance();
$this->load->model('m_search');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Shaadi Baraati</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
        <style>
        .no-result{margin-top:60px; margin-bottom:60px; }
        .preloader{display:none; }
        .preloader-wrapper.big {width: 30px; height: 30px; }
        .previsible {top: 110px; text-align: center; display:block; position: absolute; width: 100%; height: auto; background-color: rgba(0, 0, 0, 0.5); z-index: 9999; cursor: pointer; left: 12px; }
        .result-head {padding: 100px 0; }
        .card{
            box-shadow: none;
            margin: 20px 0 0 0;
        }
        .card-image1{
        position:relative;
        overflow:hidden;
        line-height: 0;
        border-radius: 3px;
        }
        .overlay{
        position: absolute;
        left: 0;
        z-index: 5;
        color: #FFF;
        width: 100%;
        bottom: 20px;
        }
        .card-image1::after{
        position: absolute;
        width: 100%;
        height:100%;
        background:rgba(0,0,0,0.5);
        content:'';
        z-index:4;
        top:0;
        }
        .card-icon{
        padding-left: 20px;
        }
        .card-icon img{
        position: absolute;
        top: 9px;
        }
        .card .card-title{
        padding-left: 37px;
        display: block;
        line-height: 25px;
        font-size: 16px;
        font-weight: 600;
        margin-left: 10px;
        }
        </style>
    </head>
    <body>
        <div id="app">
            <!-- header -->
            <?php $this->load->view('includes/header.php'); ?>
            <!-- end header -->
            <!-- body  -->
            <section class="result-head">
                <div class="container center-align">
                    <div class="row m0">
                        <div class="col s12 m8 push-m2">
                            <h4 class="white-text">India's Favourite Wedding Planning Platform</h4>
                            
                        </div>
                    </div>
                </div>
            </section>
            <?php if (empty($category)) { ?>
            <section class="no-result">
                <div class="col l12 m12 s12">
                    <center>
                    <img src="<?php echo base_url('assets/img/no-result.png') ?>" alt="">
                    </center>
                </div>
            </section>
            <?php }else{ ?>
            <section class="result-body">
                <div class="container-2">
                    <div class="row m0">
                        
                        <div class="col s12 m12 l12">
                            <div class="row  result-item-box m0">
                                <div class="title">
                                    <h5>Top Wedding Vendor Categories</h5>
                                </div>
                                
                                <div class="row m0">
                                    <?php foreach ($category as $key => $value) { ?>
                                    <div class="col l3 s12 m4">
                                        <a href="<?php echo base_url().'vendors/all/'.urlencode(strtolower(str_replace(" ","-",$value->category))) ?>" >
                                        
                                        <div class="card">
                                            <div class="card-image1">
                                                <img src="<?php echo base_url().$value->image ?>">
                                                <div class="overlay">
                                                    <div class="card-icon">
                                                        <img src="<?php echo base_url().$value->icon ?>" width="30px">
                                                        <span class="card-title"> <?php echo $value->category ?> </span>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
        </div>
        <?php $this->load->view('includes/footer'); ?>
        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/script.js"></script>

        <script>
        <?php $this->load->view('includes/message'); ?>
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
        });
        var app = new Vue({
        el: '#app',
        data: {
            listItem: '',
            isShow: true,
            isDay: true,
            isbudget: true,
            isAvg: true,
            isFilter: true,
            autocomplete: '',
            vendor: '',
            visible: false,
            previsible: false
        },
        created() {
            window.addEventListener('resize', this.handleResize)
            this.handleResize();
        },
        methods: {
        handleResize() {
            if (window.innerWidth <= 600) {
                this.isFilter = false;
            }
        },
        vendorcheck() {
            this.autocomplete = '';
            this.visible = true;
            this.previsible = true;
            const formData = new FormData();
            formData.append('vendor', this.vendor);
            axios.post('<?php echo base_url() ?>search/vendorcheck', formData)
        .then(response => {
            if (response.data != '') {
                this.previsible = false;
                this.autocomplete = response.data;
            } 
            else {
                this.previsible = false;
                this.autocomplete = '';
            }
        })
        .catch(error => {
            this.previsible = false;
            if (error.response) {
                this.errormsg = error.response.data.error;
            }
        })
        }
        },
        });
        </script>
    </body>
</html>