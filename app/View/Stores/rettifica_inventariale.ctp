<?php echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'carrello'),
											'inputDefaults' => array(
													'label' => false,
													'div' => false
												),
											'id'=>'form1',
											'name' =>'form1'
												)
										);
										$opt = $magazzini['liste'];
										//print_r($magazzini['tutti']); //debug
echo 'Scegli magazzino:<br>';
echo $this->Form->input('magaz_partenza', array('id'=>'mgpart', 'options'=>$opt));
echo $this->Form->input('magaz_destino', array('type'=>'hidden', 'value'=>''));
echo $this->Form->input('causale', array('type'=>'hidden', 'value'=>'RET-IN'));
echo '<br><br>';
echo $this->Form->end('Avanti');


 ?>
 <hr /><a href="<?php echo $this->webroot?>stores/index">Torna</a>
