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
        .ck-editor__editable {
        min-height: 300px;
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
                            <div class="row">
                                <div class="col 12 m6">
                                    <p class="h5-para black-text m0">Edit Content</p>
                                </div>
                                <div class="col 12 m6 right-align">
                                    <a href="<?php echo base_url('content/manage')  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable "><i class="fas fa-backward"></i> Back</a>
                                </div>
                            </div>

                            
                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>c_content/update" method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form" enctype="multipart/form-data">
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                    <select id="city" name="city" required="">
                                                        <option value="">Choose a city</option>
                                                        <?php if (!empty($cities)) {
                                                        foreach ($cities as $row => $cit) { ?>
                                                        <option value="<?php echo $cit->id ?>" <?php if ($cit->id == $result->city_id) {echo "selected"; } ?> > <?php echo $cit->city ?></option>
                                                    <?php  } } ?> </select>
                                                    <label for="city">City</label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <select id="category" name="category"  required="">
                                                        <option value="">Choose a category</option>
                                                        <?php if (!empty($categories)) {
                                                        foreach ($categories as $row => $cats) { ?>
                                                        <option value="<?php echo $cats->id ?>" <?php if ($result->category_id == $cats->id) {echo "selected"; } ?>> <?php echo $cats->category ?></option>
                                                    <?php  } } ?> </select>
                                                    <label for="category">Category</label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="col s12 l12">
                                                    <label for="description" class="mb10">Content</label>
                                                    <textarea name="description" id="description" class="form-control col-md-7 col-xs-12"><?php echo (!empty($result->description))?$result->description:''; ?></textarea>
                                                    <p><span class="error"><?php echo form_error('description'); ?></span></p>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo (!empty($result->id))?$result->id:''; ?>">
                                            <input type="hidden" name="uniq" value="<?php echo (!empty($result->uniq))?$result->uniq:random_string('alnum',10); ?>">
                                            <br>
                                            <div class="row m0">
                                                <p class="pl10">SEO Data</p>
                                                <div class="input-field col s12 l6">
                                                    <input type="text" required="" id="title" name="title" class="validate"
                                                    value="<?php echo (!empty($result->title))?$result->title:''; ?>">
                                                    <label for="title">Title <span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12 l12">
                                                    <textarea id="can_url" name="can_url"
                                                    class="materialize-textarea"><?php echo (!empty($result->canoncial))?$result->canoncial:''; ?></textarea>
                                                    <label for="can_url">Canonical Url</label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12 l12">
                                                    <textarea id="keywords" required="" name="keywords"
                                                    class="materialize-textarea"><?php echo (!empty($result->keywords))?$result->keywords:''; ?></textarea>
                                                    <label for="keywords">Keywords<span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12">
                                                    <textarea id="meta_description" required="" name="meta_description"
                                                    class="materialize-textarea"><?php echo (!empty($result->meta_desc))?$result->meta_desc:''; ?></textarea>
                                                    <label for="meta_description">Meta Description</label>
                                                </div>
                                            </div>

                                            <br>
                                                <div class="row m0">
                                                    <p class="pl10">Related Search</p>
                                                    <div class="input-field col s12 l6">
                                                        <input type="text" id="key1" name="key1" class="validate" value="<?php echo (!empty($result->key1))?$result->key1:''; ?>">
                                                        <label for="key1">Keyword 1 </label>
                                                    </div>
                                                    <div class="input-field col s12 l6">
                                                        <input type="text" id="key2" name="key2" class="validate" value="<?php echo (!empty($result->key2))?$result->key2:''; ?>">
                                                        <label for="key2">Keyword 2 </label>
                                                    </div>
                                                    <div class="input-field col s12 l6">
                                                        <input type="text" id="key3" name="key3" class="validate" value="<?php echo (!empty($result->key3))?$result->key3:''; ?>">
                                                        <label for="key3">Keyword 3 </label>
                                                    </div>
                                                    <div class="input-field col s12 l6">
                                                        <input type="text" id="key4" name="key4" class="validate" value="<?php echo (!empty($result->key4))?$result->key4:''; ?>">
                                                        <label for="key4">Keyword 4 </label>
                                                    </div>
                                                    <div class="input-field col s12 l6">
                                                        <input type="text" id="key5" name="key5" class="validate" value="<?php echo (!empty($result->key5))?$result->key5:''; ?>">
                                                        <label for="key5">Keyword 5 </label>
                                                    </div>
                                                </div>
                                            
                                            <div class="col s12 mtb20">
                                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
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
        <script src="<?php echo base_url() ?>assets/ckeditor1/ckeditor.js"></script>
        <script>
        <?php $this->load->view('include/message.php'); ?>
        
        </script>
        <script>
        $(document).ready(function() {
        $('select').formSelect();
        $("select").css({display: "inline", height: 0, padding: 0, width: 0});
        $("#city-form").validate({
        rules: {
        city: { required: true, },
        category:{ required: true, }
        },
        messages: {
        city: "Please select a city",
        category: "Please select a category",
        }
        });
        });
        </script>
        <script>
        CKEDITOR.replace('description');
        </script>
    </body>
</html>