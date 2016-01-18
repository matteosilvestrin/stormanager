<div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">NK+</h1>

            </div>
            <h3><?php echo __('Register to NK+'); ?></h3>
            <p><?php  echo __('Create account to see it in action'); ?>.</p>
            <?php
              echo $this->Form->create('User', array('action' => 'register'), array('class'=>'m-t','role="form"')); ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required="" id="UserName" name="data[User][name]">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" required="" id="UserUsername" name="data[User][username]">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" id="UserPassword" name="data[User][password]">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <?  $opt = array('label'=>__('Register').' &#8250;', 'class'=>'btn btn-primary block full-width m-b', 'escape'=>false);//options
echo $this->Form->end($opt); ?>

                <p class="text-muted text-center"><small><?php echo __('Already have an account?'); ?></small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo $this->webroot?>users/login">Login</a>
            
            <p class="m-t"> <small>CloudGroup & Ynnova &copy; 2015</small> </p>
        </div>
    </div>