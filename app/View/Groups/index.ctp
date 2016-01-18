<div class="actions">	
	<ul>
		<li><?php echo $this->Html->link(__('Nuovo').' '.__('Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuovo').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
	<div style="clear:both"></div><!-- end:clear -->
</div>

<div class="groups index">
	<h2><?php echo __('Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0" class='tbl_dati'>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('descrizione'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['descrizione']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizza'), array('action' => 'view', $group['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Modifica'), array('action' => 'edit', $group['Group']['id'])); ?>
			<?php echo $this->Form->postLink(__('Elimina'), array('action' => 'delete', $group['Group']['id']), null, __('Sicuro di eliminare # %s?', $group['Group']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p class='note'>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} di {:pages}, visualizzati {:current} records di {:count} totali, inizio su record {:start}, fine con {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('precedente'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('successiva') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

