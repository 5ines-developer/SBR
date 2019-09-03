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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- bar -->
    <style>
    .ck-editor__editable {
        min-height: 300px;
    }

    .currencyinput {
        border: 1px inset #ccc;
    }

    .currencyinput input {
        border: 0;
    }

    .input-field .prefix~input,
    .input-field .prefix~label {
        margin-left: 10rem;
    }

    .input-field .prefix {
        font-size: 1rem;
    }

    #youtube-link,
    #fb-link {
        display: none;
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
                                <p class="h5-para black-text  m0">Update Vendor</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('vendors/view/'.$result->id)  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable ">view
                                    Vendor</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Profile</p>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="name" name="name" class="validate" required
                                                    value="<?php echo (!empty($result->name)?$result->name:'') ?>">
                                                <label for="name">Name <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                            </div>
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="email" name="email" class="validate" required
                                                    value="<?php echo (!empty($result->email)?$result->email:'') ?>">
                                                <label for="email">Email <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="phone" name="phone" class="validate" required
                                                    value="<?php echo (!empty($result->phone)?$result->phone:'') ?>">
                                                <label for="phone">Phone No.<span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price" name="price" class="validate" required
                                                    value="<?php echo (!empty($result->price)?$result->price:'') ?>">
                                                <label for="price">Starting Price <span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('price'); ?></span></p>
                                                <?php if (!empty($result)) { ?>
                                                <input type="hidden" value="1" name="edit">
                                                <?php } ?>
                                                <input type="hidden"
                                                    value="<?php echo (!empty($result->uniq)?$result->uniq:random_string('alnum',10)) ?>"
                                                    name="uniq">
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Profile Image</span>
                                                    <input type="file" name="vimage" accept=".png, .jpg, .jpeg, .gif"
                                                        <?php echo (!empty($result)?'':'required') ?>>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <span class="helper-text"><b>Note</b>: Please select only image file
                                                    (eg: .jpg, .png, .jpeg etc.) <br> <span class="bold">Max file
                                                        size:</span> 512kb <span class="red-text">*</span></span>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <select name="category">
                                                    <option value="">Choose a category</option>
                                                    <?php
                                                                if (!empty($category)) {
                                                                foreach ($category as $key => $value) { ?>
                                                    <option value="<?php echo $value->id ?>"
                                                        <?php echo $value->id == $result->category?"selected":''; ?>>
                                                        <?php echo $value->category ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <label>Category</label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <select name="city">
                                                    <option value="">Choose a City</option>
                                                    <?php
                                                                if (!empty($city)) {
                                                                foreach ($city as $key => $value) { ?>
                                                    <option value="<?php echo $value->id ?>"
                                                        <?php echo $value->id == $result->city?"selected":''; ?>>
                                                        <?php echo $value->city ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <label>City</label>
                                                <p><span class="error"><?php echo form_error('city'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php
                                                        echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                        ?>
                                            <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id"
                                            value="<?php echo random_string('alnum',10) ?>">
                                        <div class="col s12 center mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large"
                                                type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="overflow: auto;">
                            <div class="card-content">
                                <div class="form-container">
                                    <div class="row m0">
                                        <p class="bold  black-text  mb10 h6">Information and Service</p>
                                    </div>
                                    <form action="<?php echo base_url() ?>vendors/service" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data" class="col l12">
                                        <div class="row m0">
                                            <?php if (!empty($service)) {
                                                        foreach ($service as $key => $value) { ?>
                                            <div class="input-field col s6 l4">
                                                <p>
                                                    <label>
                                                        <input id="indeterminate-checkbox" type="checkbox"
                                                            name="service[]" value="<?php echo $value->id; ?>"  <?php 

                                                            foreach ($vendor_info as $key1 => $value1) {
                                                                echo ($value->id == $value1->information_id)?'checked="true"':'';
                                                            }

                                                            ?>/>
                                                        <span><?php echo $value->service; ?></span>
                                                    </label>
                                                </p>
                                            </div>
                                            <?php } } ?>
                                        </div>
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' ?>
                                        </div>
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Add New</a>
                                        <div class="col s12 center mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large"
                                                type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                    <!-- Modal Trigger -->

                                    <!-- Modal Structure -->
                                    <div id="modal1" class="modal" style="width: 35%;">
                                        <div class="modal-content">
                                            <h6>New Information and Services</h6>
                                            <form action="<?php echo base_url() ?>vendors/new-service" method="post"
                                                enctype="multipart/form-data">
                                                <div class="col l12">
                                                    <div class="row m0">
                                                        <div class="input-field col s12">
                                                            <input type="hidden" value="<?php echo $result->id ?>"
                                                                name="id">
                                                            <input id="serv" type="text" class="validate" name="serv">
                                                            <label for="serv">Service</label>
                                                        </div>
                                                    </div>
                                                    <div class="row m0">
                                                        <div class="input-field col s12">
                                                            <input id="sr_subtitle" type="text" class="validate"
                                                                name="sr_subtitle">
                                                            <label for="sr_subtitle">Subtitle</label>
                                                        </div>
                                                    </div>
                                                    <div class="row m0">
                                                        <div class="file-field input-field col s12">
                                                            <div class="btn btn-small black-text grey lighten-3">
                                                                <i class="far fa-image left  "></i>
                                                                <span class="">Icon</span>
                                                                <input type="file" name="sr_icon"
                                                                    accept=".png, .jpg, .jpeg, .gif"
                                                                    <?php echo (!empty($result)?'':'required') ?>>
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                            <span class="helper-text"><b>Note</b>: Please select only
                                                                image file
                                                                (eg: .jpg, .png, .jpeg, etc.) <br> <span
                                                                    class="bold">Max file
                                                                    size:</span> 512kb <span
                                                                    class="red-text">*</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <button
                                                            class="btn waves-effect waves-light green darken-4 hoverable btn-small"
                                                            type="submit">Submit </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/insert_about" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-about"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">About Vendor and Policy </p>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l12">
                                                <label for="description" class="mb10">About Vendor<span
                                                        class="red-text">*</span></label>
                                                <div id="toolbar-container"></div>
                                                <div id="editor">
                                                    <?php echo (!empty($result->detail)?$result->detail:'') ?> </div>
                                                <textarea name="about" id="description" style="display:none"></textarea>
                                                <p><span class="error"><?php echo form_error('about'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l12">
                                                <label for="specific" class="h5-para-p2 mb10">Specification</label>
                                                <div id="toolbar-container1"></div>
                                                <div id="editor1">
                                                    <?php echo (!empty($result->specification)?$result->specification:'') ?>
                                                </div>
                                                <textarea name="specific" id="specific" style="display:none"></textarea>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l12">
                                                <label for="tags" class="mb10">Tags<span
                                                        class="red-text">*</span></label>
                                                <div class="chips">
                                                    <input class="custom-class" name="tags"
                                                        value="<?php echo (!empty($result->tags)?$result->tags:'') ?>">
                                                </div>
                                                <p><span class="error"><?php echo form_error('tags'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l12">
                                                <label for="policy" class="h5-para-p2 mb10">Policy<span
                                                        class="red-text">*</span></label>
                                                <div id="toolbar-container2"></div>
                                                <div id="editor2">
                                                    <?php echo (!empty($result->policy)?$result->policy:'') ?> </div>
                                                <textarea name="policy" id="policy" style="display:none"></textarea>
                                                <p><span class="error"><?php echo form_error('policy'); ?></span></p>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <div class="col s12">
                                            <?php
                                                                echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                                ?>
                                            <?php ?>
                                        </div>
                                        <div class="col s12 center mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large"
                                                type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/portfolio_insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Portfolio Images</p>
                                        </div>
                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l12">
                                                <div class="input-images"></div>
                                                <span class="helper-text" data-error="wrong"
                                                    data-success="right"><b>Note</b>: Please select only image file (eg:
                                                    .jpg, .png, .jpeg, .gif etc.) <br> <span class="bold">Max file
                                                        size:</span> 512kb <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <div class="col s12">
                                            <?php
                                                                        echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                                        ?>
                                            <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id"
                                            value="<?php echo random_string('alnum',10) ?>">
                                        <div class="col s12 center mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large"
                                                type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/add-video" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Video Links</p>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <select name="vd_category" required="" id="vd_category">
                                                    <option value="">Choose a category</option>
                                                    <option value="1">Youtube</option>
                                                    <option value="2">Facebook</option>
                                                </select>
                                                <label>Category</label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                                <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                            </div>
                                        </div>
                                        <div class="row m0" id="youtube-link">
                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vd_link" id="autocomplete-input"
                                                    class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://youtu.be/<span
                                                        style="background-color: cadetblue; color: white; padding: 5px; font-size: 14px;">4GuiHfZDjtc</span>
                                                </p>
                                                <label for="autocomplete-input">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('vd_link'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0" id="fb-link">

                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vdfb_link" id="autocomplete-input1"
                                                    class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.facebook.com/<span
                                                        style="background-color: cadetblue; color: white; padding: 5px; font-size: 14px;">countychampionship/videos/349068499381369/</span>
                                                </p>
                                                <label for="autocomplete-input1">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('vd_link'); ?></span></p>
                                            </div>

                                        </div>
                                        <div class="col s12">
                                            <?php
                                                                        echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                                        ?>
                                            <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id"
                                            value="<?php echo random_string('alnum',10) ?>">
                                        <div class="col s12 center mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large"
                                                type="submit">Submit
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
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
    < ? php $this - > load - > view('include/message.php'); ? >
    </script>
    <script>
    $(document).ready(function() {
        $('select').formSelect();
        $('.input-images').imageUploader();
        $('#vendor-about').submit(function() {
            var text = $('#editor').html();
            $('#description').val(text);
            var text1 = $('#editor1').html();
            $('#specific').val(text1);
            var text2 = $('#editor2').html();
            $('#policy').val(text2);
        });
        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'https://placehold.it/250x250'
            },
        });
        $("#vendor-form").validate({
            rules: {
                about: {
                    required: true,
                },
                email: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                category: {
                    required: true,
                },
                city: {
                    required: true,
                },
            },
            messages: {
                about: "Please enter a vendor Name",
                email: "Please enter a vendor Email",
                phone: "Please enter a vendor Phone Number",
                category: "Please Select the Category",
                city: "Please Select the City",
            }
        });
        // $("#vendor-about").validate({
        // rules: {
        // about: {
        // required: true,
        // },
        // policy: {
        // required: true,
        // },
        // tags: {
        // required: true,
        // },
        // },
        // messages: {
        // about: "Please enter the about details",
        // policy: "Please enter the vendor policy",
        // tags: "Please enter the tags",
        // }
        // });
    });
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
    DecoupledEditor
        .create(document.querySelector('#editor1'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container1');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    DecoupledEditor
        .create(document.querySelector('#editor2'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container2');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    $(document).ready(function() {
        $('.modal').modal();
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
</body>

</html>