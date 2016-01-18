<!-- Mainly scripts -->
    <script src="<?php echo $this->webroot; ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot; ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $this->webroot; ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Data Tables -->
    <script src="<?php echo $this->webroot; ?>js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $this->webroot; ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo $this->webroot; ?>js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo $this->webroot; ?>js/plugins/dataTables/dataTables.tableTools.min.js"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="<?php echo $this->webroot; ?>js/inspinia.js"></script>
    <script src="<?php echo $this->webroot; ?>js/plugins/pace/pace.min.js"></script>
    
    
    
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo $this->webroot; ?>js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
             //------------------------MODALE-------------------
            $('[data-toggle="ajaxModal"]').on('click',
              function(e) {
                $('#ajaxModal').remove();
                e.preventDefault();
                var $this = $(this)
                  , $remote = $this.data('remote') || $this.attr('href')
                  , $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
                $('body').append($modal);
                $modal.modal({backdrop: 'static', keyboard: false});
                $modal.load($remote);
              }
            );
            //---------------------------------stili form        
                	/*- aggiungo gli stili bootstrap ai forms -*/
                	$('form select').addClass('form-control');
                	$('form input').addClass('form-control');
                	$('form input[type=checkbox]').removeClass('form-control');
                	$('form input.btn').removeClass('form-control');
                	$('form textarea').addClass('form-control');

        });        
    </script>    
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>