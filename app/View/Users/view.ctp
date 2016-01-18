<div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                        <div class="m-b-md">
                                        <a data-toggle="ajaxModal" href="<?php echo $this->webroot; ?>users/edit/<?php echo $user['User']['id']; ?>" class="btn btn-white btn-xs pull-right"><?php echo __('Edit'); ?></a>
                                        <h2><?php echo h($user['User']['username']); ?></h2>
                                    </div>

    <div><span class='data_label'><?php echo __('Username'); ?></span><?php echo h($user['User']['username']); ?></div>
    <div>		<span class='data_label'><?php echo __('Group'); ?></span>
		
	<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
&nbsp;
</div><div><span class='data_label'><?php echo __('Telefono'); ?></span><?php echo h($user['User']['phone']); ?></div><div><span class='data_label'><?php echo __('Email'); ?></span><?php echo h($user['User']['email']); ?></div><div><span class='data_label'><?php echo __('Ultimo Login'); ?></span><?php echo $this->Time->format('d/m/Y H:i', h($user['User']['last_login'])); ?></div><div><span class='data_label'><?php echo __('Created'); ?></span><?php echo $this->Time->format('d/m/Y H:i', h($user['User']['created'])); ?></div><div><span class='data_label'><?php echo __('Modified'); ?></span><?php echo $this->Time->format('d/m/Y H:i', h($user['User']['modified'])); ?></div>	

<br /><br /><br />







<ul class='nav nav-tabs'> 
 <li><a href="#related0" data-toggle="tab"><h5><?php echo __('Relative ').'operazioni eseguite su preventivi'; ?></h5></a></li>
 <li><a href="#related1" data-toggle="tab"><h5><?php echo __('Relativi ').'Offerte Create'; ?></h5></a></li>
 <li><a href="#related2" data-toggle="tab"><h5><?php echo __('Relativi ').'Clienti Creati'; ?></h5></a></li>
</ul><!-- nav-tabs --><div class='tab-content'>
<div class="related tab-pane" id="related0">


	
</div>

<div class="related tab-pane" id="related1">
	

	
</div>
            <div class="related tab-pane" id="related2">               
            </div>
</div>



                </div>
            </div>
        </div>
    </div>
</div>
