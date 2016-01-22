<h5>Scegli un articolo</h5>

<?php
$magazzini = CakeSession::read('Carrello');
echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'cercapezzo'),
												'inputDefaults' => array('label' => false,'div' => false),
												'id'=>'form1',
												'name' =>'form1'
												)
										);
echo $this->Form->input('code', array('id'=>'code', 'onChange'=>'loadDoc()'));
echo $this->Form->input('magazzino', array('type'=>'hidden', 'value'=>$magazzini['magaz_partenza']));
echo $this->Form->end();
?>

    <? if(!empty($articoli)){ ?>
        <table>
		<tr>
			<td class="row_head">Cod</td>
			<td class="row_head">Dscr</td>
			<td class="row_head">Qt</td>
			<td class="row_head">Ubc</td>
			<?php if(($causale=='TRASFR') || ($causale=='RET-IN')){ ?>
				<td class="row_head"></td>
			<?php } ?>
		</tr>

       <?php $i=0;
	   foreach($articoli as $key=>$val){
				$elimina = $this->Form->postLink(__('Elimina'), array('action' => 'delete', $key), null, __('Sicuro di eliminare #%s?', $val['codice']));
				$i++; ?>
                <tr>
                    <td>
                        <?php echo $val['codice'] ?>
                    </td>
                    <td>
                        <?php echo $val['descrizione'] ?>
                    </td>
                    <td>
                        <?php echo $val['qta'] ?>
                        <?php if($causale=='SCR-AS'){ echo "/".$val['qta_ord']; } ?>
                    </td>
                    <td class="row_head">
                        <?php echo $val['ubicazione']?>
                    </td>
                    <?php if(($causale=='TRASFR') || ($causale=='RET-IN')){ ?>
                        <td class="azione">
                            <?php echo $elimina ?>
                        </td>
                        <?php } ?>
                </tr>
                <?php }//fine foreach
				echo '</table>';

	 echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'scrivieam'),
												'inputDefaults' => array('label' => false,'div' => false),
												'id'=>'form_okcarrello',
												'name' =>'form_okcarrello')
												);
	 echo "<center>".$this->Form->end('Esegui '.$causale)."</center>";
 }//empty ?>
 <?
    //-- form ANNULLA
	 echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'index'),
											'inputDefaults' => array('label' => false,'div' => false),
											'id'=>'form_annulla',
											'name' =>'form_annulla'
											)
										);
	echo "<hr />".$this->Form->end('Annulla');
 ?>

                        <script type="text/javascript">
                            alwaysFocus();

                            function alwaysFocus() {
                                document.getElementById("code").focus();
                                document.getElementById("code").value = '';
                            }

                            function loadDoc() {
                                var x = document.getElementById("code").value;
                                document.form1.submit();
                                document.getElementById("code").value = '';
                                document.getElementById("code").focus();
                            }
                        </script>
