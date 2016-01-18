<!-- Mainly scripts -->
    <script src="<?php echo $this->webroot; ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js"></script>
    
    <!-- iCheck -->
    <script src="<?php echo $this->webroot; ?>js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>