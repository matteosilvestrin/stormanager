 <div class="wrapper wrapper-content animated fadeInRight">
                		
                	     <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                       <div class="ibox-title">
                                                <h5><?php echo __('User'); ?></h5>
                                                                                                
                                           </div>
                                           <div class="ibox-content">
                                               <?php echo $this->Html->link(__('Nuovo').' '.__('User'), array('action' => 'add'), array('class'=>"btn btn-primary", 'data-toggle'=>"ajaxModal")); ?>
                                               <div class="table-responsive">
                                               
                                                                      	<table class="table table-striped table-bordered table-hover dataTables-example">
                                                                      	<thead>
                                                                        <tr>
                                                                      			<th><?php echo $this->Paginator->sort('username'); ?></th>
                                                                                  <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('last_login'); ?></th>		                                                                      		
                                                                      			<th><?php echo $this->Paginator->sort('phone'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('email'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('created'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                                      			<th><?php echo __('Actions'); ?></th>
                                                                      	</tr>
                                                                        </thead>
                                                                        <tbody>
                                                                      	<?php foreach ($users as $user): ?>
                                                                      	<tr>
                                                                      		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                                                      		<td><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></td>
                                                                      		<td><?php echo h($this->Time->format('d/m/Y H:i', $user['User']['last_login'])); ?>&nbsp;</td>                                                                  
                                                                      		
                                                                      		<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
                                                                      		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                                                      		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                                                                      		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                                                                      		
                                                                          <td>   
                                                                                 <div class="btn-group">
                                                                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><?php echo __('Actions'); ?><span class="caret"></span></button>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a   href="<?php echo $this->webroot; ?>users/view/<?php echo $user['User']['id']; ?>" ><?php echo __('View'); ?></a></li>
                                                                                        <li><a  data-toggle="ajaxModal" href="<?php echo $this->webroot; ?>users/edit/<?php echo $user['User']['id']; ?>" ><?php echo __('Edit'); ?></a></li>                                                                                        
                                                                                        <li class="divider"></li>
                                                                                        <li><a href="#"><?php echo __('Delete'); ?></a></li>
                                                                                    </ul>
                                                                                </div>                                                                                
                                                                          </td>
                                                                      	</tr>
                                                                      <?php endforeach; ?>
                                                                      </tbody>
                                                                       
                                                                       <tfoot>
                                                                       <tr>
                                                                      			<th><?php echo $this->Paginator->sort('username'); ?></th>
                                                                                  <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('last_login'); ?></th>		                                                                      		
                                                                      			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('email'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('created'); ?></th>
                                                                      			<th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                                      			
                                                                      	</tr>
                                                                        </tfoot>
                                                                      	</table>
                                                                      	
                                                                      	<?php
                                                                      	echo $this->Paginator->counter(array(
                                                                      	'format' => __('Pagina {:page} di {:pages}, visualizzati {:current} records di {:count} totali, inizio su record {:start}, fine con {:end}')
                                                                      	));
                                                                      	?>	
                                                                      	
                                                                      	<?php
                                                                      	//	echo $this->Paginator->prev('< ' . __('precedente'), array(), null, array('class' => 'prev disabled'));
                                                                      //		echo $this->Paginator->numbers(array('separator' => ''));
                                                                      //		echo $this->Paginator->next(__('successiva') . ' >', array(), null, array('class' => 'next disabled'));
                                                                      	?>
                                                                       
                                       </div>                                  
                                </div>                                        
                        </div> 
    </div>      <!-- row -->
  </div> <!-- lg12 -->
</div>