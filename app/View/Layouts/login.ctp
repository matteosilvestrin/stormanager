<? include("header.ctp") ?>
<div class="row">


			<div class="col-sm-offset-4 col-sm-4" style="vertical-align:middle">
            <?php echo $this->Session->flash(); ?>
            
			
			<div class="panel" style="margin-top:100px">
            <div class="panel-heading" style="text-align:center"><strong>USER LOGIN</strong></div><!-- /panel-heading -->
			<?php echo $this->fetch('content'); ?>
			<div class="panel-footer" style="text-align:center"><i>Sales manager - CloudGroup</i></div>
			</div><!-- /panel -->
			
            </div><!-- /col-sm-2 -->


</div><!-- /row -->
</div><!-- /container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
<script src="<?= $this->webroot; ?>js/vendor/bootstrap.min.js"></script>
<script src="<?= $this->webroot; ?>js/main.js"></script>
<script src="<?= $this->webroot; ?>js/cloud_funzioni_jq.js"></script>
<script src="<?= $this->webroot; ?>js/footable.js"></script>
<script src="<?= $this->webroot; ?>js/jquery.colorbox-min.js"></script>
<script src="<?= $this->webroot; ?>js/jquery.validate.min.js"></script>
<script src="<?= $this->webroot; ?>js/cloud_cake.js"></script>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
