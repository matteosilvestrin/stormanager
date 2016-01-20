<h5>Menu principale</h5>

<?php
//------------------------------------------------TRASFR TRASFERIMENTO MAGAZZINO --------------------------------
echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'trasferisci_pezzi'),
											'inputDefaults' => array(
													'label' => false,
													'div' => false
												),
											'id'=>'form_trasf',
											'name' =>'form_trasf'
												)
										);
echo $this->Form->input('causale', array('type'=>'hidden', 'value'=>'TRASFR'));
echo $this->Form->end('Trasferimento Magazzino');
 ?>

 <?php
 //------------------------------------------------RET-IN RETTIFICA INVENTARIALE --------------------------------
 echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'rettifica_inventariale'),
											'inputDefaults' => array(
													'label' => false,
													'div' => false
												),
											'id'=>'form_rettifica',
											'name' =>'form_rettifica'
												)
										);
echo $this->Form->input('causale', array('type'=>'hidden', 'value'=>'RET-IN'));
echo $this->Form->end('Rettifica Inventariale');
?>


<?php
//------------------------------------------------  ORDINE DA AFTERSALES --------------------------------
echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'scarica_ordine_aftersales'),
												'inputDefaults' => array('label'=>false, 'div'=>false),
												'id'=>'form_ordine_afs',
												'name' =>'form_ordine_afs'
												)
											);
echo $this->Form->end('Ordine da aftersales');
?>

<?php
//------------------------------------------------  ASSOCIA BARCODE --------------------------------
echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'associa_barcode'),
												'inputDefaults' => array('label'=>false, 'div'=>false),
												'id'=>'form_associa_barcode',
												'name' =>'form_associa_barcode'
												)
											);
echo $this->Form->input('causale', array('type'=>'hidden', 'value'=>'ASS-BC'));
echo $this->Form->end('Associa Barcode');
?>

<?php
 //------------------------------------------------  VERIFICA PEZZO --------------------------------
 echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'verifica_pezzo'),
											'inputDefaults' => array(
													'label' => false,
													'div' => false
												),
											'id'=>'form_rettifica',
											'name' =>'form_rettifica'
												)
										);
echo $this->Form->end('Verifica Pezzo');
?>

<hr /><a href="<?php echo $this->webroot?>stores/logout">Esci</a>