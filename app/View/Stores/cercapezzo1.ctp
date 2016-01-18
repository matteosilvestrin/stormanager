<style>
.not_found{background-color:#E10C0F;font-weight:bold;}
</style>
<?php
if(!empty($eam)){
	    //print_r($eam); //debug
		$caus = CakeSession::read('Carrello');
	   echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'carrello'),
												'inputDefaults' => array('label' => false,'div' => false),
												'id'=>'form1',
												'name' =>'form1',
												'onsubmit'=>"return formValid();"
												)
										);
										?>

			<?php
			echo $this->Form->input('codice', array('type'=>'hidden', 'value'=>$eam[0]['ARTICOLO']));
			echo $this->Form->input('descr', array('type'=>'hidden', 'value'=>htmlspecialchars($eam[0]['DESCRIZIONE'])));
			echo $this->Form->input('giacenza', array('type'=>'hidden', 'value'=>$eam[0]['QTA'], 'id'=>'giacenza'));
			echo $this->Form->input('ubicazione_partenza', array('type'=>'hidden', 'value'=>$eam[0]['SCOMPARTO'], 'id'=>'ubicazione_partenza'));
			echo $this->Form->input('caus', array('type'=>'hidden', 'value'=>$causale, 'id'=>'causale'));
			echo $this->Form->input('magazzino', array('type'=>'hidden', 'value'=>$eam[0]['MAGAZZINO'], 'id'=>'magazzino'));
	 		?>

			<table>
				<tr><td class='row_head'>Cod.:</td><td><?php echo $eam[0]['ARTICOLO']; ?></td></tr>
				<tr><td class='row_head'>Dsc.:</td><td><?php echo htmlspecialchars($eam[0]['DESCRIZIONE']); ?></td></tr>
				<tr><td class='row_head'>Giac.:</td><td><?php echo $eam[0]['QTA']; ?></td></tr>
				<tr><td class='row_head'>Qta:</td><td><?php echo $this->Form->input('qta', array('id'=>'qta', 'size'=>'5px', 'onchange'=>'formValid()')); ?></td></tr>
				<tr><td class='row_head'>Mag.:</td><td><?php
				if(!empty($caus['magaz_destino'])){
				  echo $caus['magaz_partenza'].' -> '.$caus['magaz_destino'];
				  }
				 else{
				  echo $caus['magaz_partenza'];
					 }
				  ?></td></tr>
                <tr><td class='row_head'>Ubic.:</td><td><?php echo $this->Form->input('ubicazione_destino', array('id'=>'ubicazione_destino', 'size'=>'10px', 'value'=>$eam[0]['SCOMPARTO'], 'onchange'=>'checkUbicazione()')); ?></td></tr>
			</table>
			<?php echo $this->Form->end('Avanti'); ?>

<?php }else{ echo '<div class="not_found">Articolo non trovato</div>';} ?>
<hr /><a href="<?php echo $this->webroot?>stores/carrello">Torna</a>


<script type="text/javascript">
 alwaysFocus();

 function alwaysFocus(){
      document.getElementById("qta").focus();
		document.getElementById("qta").value = '';
		}


 function formValid(){
	   var qta 		= document.getElementById("qta").value;
	   var giac 	= document.getElementById("giacenza").value;
	   var causale = document.getElementById("causale").value;

		var ctrl = checkUbicazione();
		if(ctrl==false){	return false;	}

		if((qta.length==0) || (qta=="")) {
    		alert("Inserire Quantita");
			document.getElementById("qta").focus();
    		return false;
    		}

		if (isNaN(qta) || parseInt(qta)<0 || parseInt(qta) > 9999){
			alert("Inserire solo numeri");
			document.getElementById("qta").focus();
			document.getElementById("qta").value = '';
			return false;
			}

		if(parseInt(qta) > parseInt(giac)){
			  if(causale != 'RET-IN'){
					alert("Quantita maggiore della giacenza");
					document.getElementById("qta").focus();
					document.getElementById("qta").value = '';
					return false;
					}else{
					return true;
					}
    		}

		return true;
    }

function checkUbicazione(){
	var ubicaz = "<? echo $ubicaz ?>";
	ubicaz = ubicaz.split("#");

	var ubicazione_destino = document.getElementById("ubicazione_destino").value;

	var ctrl = false;
	for(i=0; i<ubicaz.length; i++){
						if(ubicazione_destino==ubicaz[i]){		ctrl = true; i=ubicaz.length;	 }
						}

	if(ctrl==false){	alert("Ubicazione inesistente"); document.getElementById("ubicazione_destino").focus();	}
	return ctrl;
	}//checkUbicazione

</script>
