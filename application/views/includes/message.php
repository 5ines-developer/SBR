
    
    <?php if ($this->session->flashdata('error')) { ?>
    		M.toast({html: '<?php echo trim($this->session->flashdata('error')) ?>', classes: 'red'});
        <?php } ?>

        <?php if ($this->session->flashdata('success')) { ?>
            M.toast({html: '<?php echo trim($this->session->flashdata('success')) ?>', classes: 'green'});
       <?php } ?>

