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
echo 'Trasferisci da:<br>';
echo $this->Form->input('magaz_partenza', array('id'=>'mgpart', 'options'=>$opt));
//$opt = array('MG1'=>'Magazzino1', 'MG2'=>'Magazzino2','MG3'=>'Magazzino3',);

echo '<br>a:<br>';
echo $this->Form->input('magaz_destino', array('id'=>'mgdest', 'options'=>$opt));
echo $this->Form->input('causale', array('type'=>'hidden', 'value'=>'TRASFR'));
echo '<br><br>';
echo $this->Form->end('Scegli articoli');


 ?>

<hr /><a href="<?php echo $this->webroot?>stores/index">Torna</a>
