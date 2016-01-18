<?php
echo $this->Form->create(null, array('url' => array('controller' => 'stores', 'action' => 'carrello'),
										'inputDefaults' => array('label'=>false, 'div'=>false),
										'id' => 'form1',
										'name' =>'form1'
										)
									);

echo 'N. ordine:<br>';
echo $this->Form->input('order_num', array('id'=>'order_num', 'onChange'=>'loadDoc()'));
echo $this->Form->input('magaz_partenza', array('type'=>'hidden', 'value'=>'MC'));
echo $this->Form->input('magaz_destino', array('type'=>'hidden', 'value'=>''));
echo $this->Form->input('causale', array('type'=>'hidden', 'value'=>'SCR-AS'));

echo $this->Form->end();
?>



<!-- se carico dei dati li mostro in pagina -->
<?php if(!empty($order_num)){    echo "Num ordine: <b>".$order_num."</b><br />";    } ?>
<?php  if(!empty($arts)){ ?>
	<table>
	<tr><td class="row_head">Cod</td><td class="row_head">Dscr</td><td class="row_head">Qt</td><td class="row_head">Scp</td></tr>
	<?php foreach($arts as $articolo){ ?>
			<tr>
			<td><?php echo $articolo['COD_ARTICOLO'] ?></td>
			<td><?php echo htmlspecialchars($articolo['PAR_DESC']) ?></td>
			<td><?php echo $articolo['QTY'] ?></td>
			<td><?php echo $articolo['BIS_BIN'] ?></td>
			</tr>
			<? }//fine foreach ?>
	</table>
<?php }//$arts ?>

<hr /><a href="<?php echo $this->webroot?>stores/index">Torna</a>




<script type="text/javascript">
alwaysFocus();

function alwaysFocus(){
      document.getElementById("order_num").focus();
		document.getElementById("order_num").value = '';
      }

function loadDoc() {
      var x = document.getElementById("order_num").value;
      document.form1.submit();
      document.getElementById("order_num").value = '';
      document.getElementById("order_num").focus();
      }
</script>
