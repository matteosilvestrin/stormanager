<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>  
	<?php echo $this->Html->charset(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>		
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min', 'plugins/toastr/toastr.min', 'animate', 'style'));
             ?>
             <link href="<?php echo $this->webroot; ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    

    <!-- Gritter -->
    <link href="<?php echo $this->webroot; ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
        <?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  

    
</head>
<body>
	     <div id="wrapper">
        <?php  echo $this->element('barra_navi'); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        
         <?php  echo $this->element('barra_superiore'); ?>
        
        <?php // echo $this->element('welcome_amelia'); ?>
        
         <?php // echo $this->element('centro_e_foot'); ?>       
        

        </div>
        
        
        
    </div>
  	<?php // echo $this->element('caricoscript'); ?>
		<?php  //echo $this->element('sql_dump'); ?>	
</body>
</html>
  <?php // echo $this->Session->flash();
   ?>

			<?php // echo $this->fetch('content');
       ?>
	
  
  

  










