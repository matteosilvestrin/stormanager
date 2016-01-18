<div class="actions">
	<ul>

		<li><?php echo $this->Html->link(__('Lista').' '.__('Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuovo').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
	<div style="clear:both"></div><!-- end:clear -->
</div>

<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<h5><?php echo __('Add Group'); ?></h5>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('descrizione');
	?>
	
	
<?php   $options = array(
            		'label' => __('Salva').' &#8250;',
            		'class' => 'btn btn-primary',
            		'escape' => false,
            		);//options
                echo $this->Form->end($options); ?>
</div>