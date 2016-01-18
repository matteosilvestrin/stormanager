<style>
.not_found{background-color:#E10C0F;
font-weight:bold;
	}
</style>
<?php
echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'verifica_pezzo'),
											'inputDefaults' => array(
													'label' => false,
													'div' => false
												),
											'id'=>'form1',
											'name' =>'form1'
												)
										);
echo $this->Form->input('code', array('id'=>'code', 'onChange'=>'loadDoc()'));

echo $this->Form->end();
if(!empty($eam)){
	    //print_r($eam); //debug
   	?>
    <table>
        <?php foreach($eam as $articolo): ?>
            <tr>
                <td class='row_head'>Cod.:</td>
                <td>
                    <?php echo $articolo['ARTICOLO']; ?>
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
	 }
?><hr /><a href="<?php echo $this->webroot?>stores/index">Torna</a>

<script type="text/javascript">
 alwaysFocus();

 function alwaysFocus(){
         document.getElementById("code").focus();
		 document.getElementById("code").value = '';
 }


 function loadDoc() {
  var x=document.getElementById("code").value;
 // alert(x);
  document.form1.submit();
    document.getElementById("code").value = '';
    document.getElementById("code").focus();
}

</script>
