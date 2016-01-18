 <div style="padding-top:5px;"></div>
<h5>ETS Login</h5>


<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'))); ?>
 <table>
    <tr><td class='row_head' width='15%'>User:</td><td><input type="text"  placeholder="Username" required="" id="UserUsername" name="data[User][username]"></td></tr>
    <tr><td class='row_head'>Psw:</td><td><input type="password"  placeholder="Password" required="" id="UserPassword" name="data[User][password]"></td></tr>
</table>


<?  echo $this->Form->input('log_pistole',  array('type'=>'hidden', 'value'=>1));
$opt = array('label'=>__('Login').' &#8250;', 'escape'=>false);//options
echo $this->Form->end($opt); ?>
