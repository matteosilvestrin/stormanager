

<div class="col-sm-12">
  <div class="row">
	<? echo $this->Html->image('pulsante_neutro.png', array('alt' => 'Preventivi', 'class'=>'img-responsive col-sm-4')); ?> 
    <? $lnk1 = $this->Html->image('pulsante_fatturazione.png', array('alt' => 'Fatturazione', 'class'=>'img-responsive col-sm-4')); 
       echo $this->Html->link($lnk1, array('controller' => 'bills', 'action' => 'index'), array('escape'=>false));
    ?>
    <? echo $this->Html->image('pulsante_neutro.png', array('alt' => 'Nessuna Azione', 'class'=>'img-responsive col-sm-4')); ?><br />
</div>
<div class="row">
			<?      $lnk =  $this->Html->image('pulsante_area_spese.png', array('alt' => 'Area Spese', 'class'=>'img-responsive col-sm-4'));
                    echo $this->Html->link($lnk, array('controller' => 'outgoings', 'action' => 'index'), array('escape'=>false));
             
                  /*  $link = $this->Html->image('pulsante_preventivi.png', array('alt' => 'Preventivi','width'=>'300'));
                    echo $this->Html->link($link, array('controller' => 'quotations', 'action' => 'index'), array('escape'=>false)); 
                    */
                    echo $this->Html->image('pulsante_neutro.png', array('alt' => 'Preventivi', 'class'=>'img-responsive col-sm-4'));
                      $link2 =   $this->Html->image('pulsante_esci.png', array('alt' => 'Preventivi', 'class'=>'img-responsive col-sm-4'));
            echo $this->Html->link($link2, array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); ?>
 </div>
</div>
