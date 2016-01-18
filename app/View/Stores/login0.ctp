 <div style="padding-top:25px;"></div>
 <?php
              echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'))); ?>
                Username:<br>
                    <input type="text"  placeholder="Username" required="" id="UserUsername" name="data[User][username]">
                <br/><br/>
                Password:<br>
                    <input type="password"  placeholder="Password" required="" id="UserPassword" name="data[User][password]">
                          <br><br>
                 <?  echo $this->Form->input('log_pistole',  array('type'=>'hidden', 'value'=>1));
				 $opt = array('label'=>__('Login').' &#8250;', 'escape'=>false);//options
echo $this->Form->end($opt);

?>
