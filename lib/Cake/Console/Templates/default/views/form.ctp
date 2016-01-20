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
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="modal-dialog">
    <div class="modal-content animated flipInY">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
		<h5><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h5>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field === $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";                
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?><br />\n";
?>
	
<?php
	echo "\t<?php 
              echo \$this->Form->end(array(
            		'label' => \__('Salva').' &#8250;',
            		'class' => 'btn btn-primary',                
            		'escape' => false,
            		)); ?>\n";
?>
</div>
        <div class="modal-footer">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>            
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->   
<script>
$(function(){
	/*- aggiungo gli stili bootstrap ai forms -*/
	$('form select').addClass('form-control');
	$('form input').addClass('form-control');
	$('form input[type=checkbox]').removeClass('form-control');
	$('form input.btn').removeClass('form-control');
	$('form textarea').addClass('form-control');
  });
</script>