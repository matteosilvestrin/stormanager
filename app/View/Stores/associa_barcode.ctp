
<?php
//se è stata effettuata ricerca visualizzo il pezzo altrimenti il form di ricerca
if(!empty($eam)){
	    //print_r($eam); //debug
   	?>
    <table>
        <?php foreach($eam as $articolo): ?>
            <tr>
                <td class='row_head'>Cod.:</td>
                <td>
                    <?php   
                            $ricorda =array('art'=>$articolo['ARTICOLO']);
                            echo $articolo['ARTICOLO']; ?>
                </td>
            </tr>
            <tr>
                <td class='row_head'>Dsc.:</td>
                <td>
                    <?php echo htmlspecialchars($articolo['DESCRIZIONE']); ?>
                </td>
            </tr>
            <tr>
                <td class='row_head'>Giac.:</td>
                <td>
                    <?php echo $articolo['QTA']; ?>
                </td>
            </tr>
            <tr>
                <td class='row_head'>Mag.:</td>
                <td>
                    <?php echo $articolo['MAGAZZINO']; ?>
                </td>
            </tr>
            <tr>
                <td class='row_head'>Scm.:</td>
                <td>
                    <?php echo $articolo['SCOMPARTO']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>    
<?php 
     //inserisco modulo di associazione barcode
    echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'associa_barcode'),
                                                        'inputDefaults' => array(													
                                                                'div' => false
                                                            ),
                                                        'id'=>'form2',
                                                        'name' =>'form2',
                                                        'onsubmit'=>"return formValid();"
                                                            )
                                                    );
            echo $this->Form->input('barcode', array('label'=>'Scannerizza barcode','id'=>'barcode', 'onChange'=>'loadDoc()'));
            echo $this->Form->input('sendbrc', array('type'=>'hidden','id'=>'sndbrc'));
            echo $this->Form->input('causale', array('type'=>'hidden','value'=>'ASS-BC'));
            echo $this->Form->input('codice', array('type'=>'hidden','value'=>$ricorda['art']));            
            
            echo '<div id="divbrc"></div>';
            echo '<br /><br />';
            echo $this->Form->end('Associa Barcode');
?>    
  <script type="text/javascript">
 alwaysFocus();

 function alwaysFocus(){
         document.getElementById("barcode").focus();         
		 document.getElementById("barcode").value = '';
 }

function loadDoc() {
  var x=document.getElementById("barcode").value;
 // alert(x); 
    document.getElementById("divbrc").innerHTML  = x;
    document.getElementById("sndbrc").value  = x;    
    document.getElementById("barcode").value = '';
    document.getElementById("barcode").focus();    
}
 
function formValid(){ 
    var sendbrcode = document.getElementById("sndbrc").value;   
    if((sendbrcode.length==0) || (sendbrcode=="")) {
    		alert("Inserire Barcode");
			document.getElementById("barcode").focus();
    		return false;
    		}
}      

</script>  

<? } //fine if cerca 
    else{

            echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'associa_barcode'),
                                                        'inputDefaults' => array(													
                                                                'div' => false
                                                            ),
                                                        'id'=>'form1',
                                                        'name' =>'form1'
                                                            )
                                                    );
            echo $this->Form->input('code', array('label'=>'Inserisci codice articolo','id'=>'code'));
            echo '<br /><br />';
            echo $this->Form->end('Cerca');
        }
?>
<hr /><a href="<?php echo $this->webroot?>stores/index">Torna</a>
