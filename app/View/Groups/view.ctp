<div class="actions">	
	<ul>
		<li><?php echo $this->Html->link(__('Modifica').' '.__('Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Elimina ').' '.__('Group'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista').' '.__('Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuovo').' '.__('Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuovo').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
	<div style="clear:both"></div><!-- end:clear -->
</div>

<div class="groups view">
<h5><?php  echo __('Group'); ?></h5>
    <div><span class='data_label'><?php echo __('Id'); ?></span><?php echo h($group['Group']['id']); ?></div><div><span class='data_label'><?php echo __('Name'); ?></span><?php echo h($group['Group']['name']); ?></div><div><span class='data_label'><?php echo __('Descrizione'); ?></span><?php echo h($group['Group']['descrizione']); ?></div><div><span class='data_label'><?php echo __('Created'); ?></span><?php echo h($group['Group']['created']); ?></div><div><span class='data_label'><?php echo __('Modified'); ?></span><?php echo h($group['Group']['modified']); ?></div>	
</div>
<br /><br /><br />







<ul class='nav nav-tabs'> <li><a href="#related0" data-toggle="tab"><h5><?php echo __('Relativi '); ?></h5></a></li>
</ul><!-- nav-tabs --><div class='tab-content'><div class="related tab-pane" id="related0">
	<h5><?php echo __('Related Users'); ?></h5>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0" class='tbl_dati'>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Ultimo Login'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Azioni'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['telefono']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['ultimo_login']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizza'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Modifica'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Elimina'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuovo User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
</div>