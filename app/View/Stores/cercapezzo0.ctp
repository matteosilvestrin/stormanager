<style>
.not_found{background-color:#E10C0F;
font-weight:bold;
	}
</style>
<?php
if(!empty($eam)){
	    //print_r($eam); //debug
	   echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'carrello'),
											'inputDefaults' => array(
													'label' => false,
													'div' => false
												),
											'id'=>'form1',
											'name' =>'form1'
												)
										);
		echo '[ '.$eam[0]['ARTICOLO'].' ] '.htmlspecialchars($eam[0]['DESCRIZIONE']).' Giac: '.$eam[0]['QTA'].'<br><br />';

		echo $this->Form->input('codice', array('type'=>'hidden', 'value'=>$eam[0]['ARTICOLO']));
		echo $this->Form->input('descr', array('type'=>'hidden', 'value'=>htmlspecialchars($eam[0]['DESCRIZIONE'])));
		echo $this->Form->input('giacenza', array('type'=>'hidden', 'value'=>$eam[0]['QTA'], 'id'=>'giacenza'));
		//inserisco causale per regole javascript non posso ripassare la causale al form carrello
		echo $this->Form->input('caus', array('type'=>'hidden', 'value'=>$causale, 'id'=>'causale'));
		echo 'Qta:'. $this->Form->input('qta', array('id'=>'qta', 'size'=>'5px', 'onChange'=>'formValid()')).'<br>';
	    echo 'Scomp:'.$this->Form->input('ubicazione', array('id'=>'ubicazione', 'size'=>'10px', 'value'=>$eam[0]['SCOMPARTO']));
		echo $this->Form->end('Procedi con scansione');

	 }else{ echo '<div class="not_found">Articolo non trovato</div>';}
?>

<script type="text/javascript">
 alwaysFocus();

 function alwaysFocus(){
         document.getElementById("qta").focus();
		 document.getElementById("qta").value = '';
 }


 function formValid() {
	   var qta = document.getElementById("qta").value;
	   var giac = document.getElementById("giacenza").value;
	   var causale =document.getElementById("causale").value;
    	if ( qta.length == 0) {
    		alert("Inserire Quantita");
			document.getElementById("qta").focus();
    		return false;
    	}
		else if (isNaN(qta) || parseInt(qta)<0 || parseInt(qta) > 9999){
			alert("Inserire solo numeri");
			document.getElementById("qta").focus();
			 document.getElementById("qta").value = '';
					return false;
			}
		else if (parseInt(qta) > parseInt(giac) ) {
			  if(causale != 'RET-IN'){
					alert("Quantita maggiore della giacenza");
					document.getElementById("qta").focus();
					 document.getElementById("qta").value = '';
					return false;
				}
				else{
					return true;
					}
    	}
		return true;
    }


</script>
