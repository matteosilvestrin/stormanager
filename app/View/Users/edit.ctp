 <div class="modal-dialog">
    <div class="modal-content animated flipInY">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
                    <?php echo $this->Form->create('User', array('class'=>"form-horizontal")); ?>
	<h5><?php echo __('Edit User'); ?></h5>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('nuova_password', array('type'=>'password', 'label'=>'Nuova password', 'size' => '20', 'value'=>''));
        //mostro il select gruppi solo se utente diverso da admin
		if($this->Form->value('User.group_id')!=1){echo $this->Form->input('group_id');}
			echo $this->Form->input('name', array('label'=>'Nome'));
		echo $this->Form->input('surname', array('label'=>'Cognome'));
		echo $this->Form->input('telefono');
		echo $this->Form->input('email');
	?>
	
<br />	
<?php   $options = array(
            		'label' => __('Salva').' &#8250;',
            		'class' => 'btn btn-primary',
            		'escape' => false,
            		);//options
                echo $this->Form->end($options); ?> 
        
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>            
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->   
<script>
$(function(){
	/*- aggiungo gli stili bootstrap ai forms -*/
	$('form select').addClass('form-control');
	$('form input').addClass('form-control');
	$('form input[type=checkbox]').removeClass('form-control');
	$('form input.btn').removeClass('form-control');
	$('form textarea').addClass('form-control');
  });
</script>  
                
                            