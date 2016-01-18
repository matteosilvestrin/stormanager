<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">Sm+</h1>

            </div>
            <h3><?php echo __('Welcome to Sman+'); ?></h3>
            <p>Perfectly designed and precisely prepared.
             
            </p>
            <p><?php __('Login in. To see it in action'); ?>.</p>
             <?php
              echo $this->Form->create('User', array('action' => 'login'), array('class'=>'m-t','role="form"')); ?>            
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" id="UserUsername" name="data[User][username]">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" id="UserPassword" name="data[User][password]">
                </div>                              
                 <?  $opt = array('label'=>__('Login').' &#8250;', 'class'=>'btn btn-primary block full-width m-b', 'escape'=>false);//options
echo $this->Form->end($opt); ?>
               
                
            
            <p class="m-t"> <small>CloudGroup &copy; 2015</small> </p>
        </div>
    </div>
<div style="text-align:right">
</div>