<div class="actions">
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Group.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista').' '.__('Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuovo').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
	<div style="clear:both"></div><!-- end:clear -->
</div>

<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<h5><?php echo __('Edit Group'); ?></h5>
	<?php
		echo $this->Form->input('id');
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