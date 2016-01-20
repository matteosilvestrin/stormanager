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

<?php echo $this->element('breadcrumbs', array('cont'=>$this->request['controller'])); ?>
 <div class="wrapper wrapper-content animated fadeInRight">
                		
                	     <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                       <div class="ibox-title">
                                                <h5><?php echo __('User'); ?></h5>
                                                <div class="ibox-tools">
                                                        <a class="collapse-link">
                                                        <i class="fa fa-chevron-up"></i>
                                                        </a>
                                                </div>
                                                                                                
                                           </div>             
                                           <div class="ibox-content">
                                              <h5><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?></h5>
                                              	<dl>
                                              <?php
                                              foreach ($fields as $field) {
                                              	$isKey = false;
                                              	if (!empty($associations['belongsTo'])) {
                                              		foreach ($associations['belongsTo'] as $alias => $details) {
                                              			if ($field === $details['foreignKey']) {
                                              				$isKey = true;
                                              				echo "\t\t<dt><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
                                              				echo "\t\t<dd>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
                                              				break;
                                              			}
                                              		}
                                              	}
                                              	if ($isKey !== true) {
                                              		echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
                                              		echo "\t\t<dd>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
                                              	}
                                              }
                                              ?>
                                              	</dl>
                                            </div>
                                          </div> 



          <?php
          if (!empty($associations['hasOne'])) :
          	foreach ($associations['hasOne'] as $alias => $details): ?>
          	<div class="ibox float-e-margins">
                  <div class="ibox-title">
                        <h5><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h5>
                        <div class="ibox-tools">
                                <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                                </a>
                        </div>                                                     
                   </div>
          		<div class="ibox-content">
          	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
          		<dl>
          	<?php
          			foreach ($details['fields'] as $field) {
          				echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
          				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
          			}
          	?>
          		</dl>
          	<?php echo "<?php endif; ?>\n"; ?>		
          	</div>
           </div> 
          	<?php
          	endforeach;
          endif;
          if (empty($associations['hasMany'])) {
          	$associations['hasMany'] = array();
          }
          if (empty($associations['hasAndBelongsToMany'])) {
          	$associations['hasAndBelongsToMany'] = array();
          }
          $relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
          foreach ($relations as $alias => $details):
          	$otherSingularVar = Inflector::variable($alias);
          	$otherPluralHumanName = Inflector::humanize($details['controller']);
          	?>
          <div class="ibox float-e-margins">
                  <div class="ibox-title">
                        <h5><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h5>
                        <div class="ibox-tools">
                                <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                                </a>
                        </div>                                                     
                   </div>
           <div class="ibox-content">        	
          	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
          	<table class="table">
          	<tr>
          <?php
          			foreach ($details['fields'] as $field) {
          				echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
          			}
          ?>
          		<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
          	</tr>
          <?php
          echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
          		echo "\t\t<tr>\n";
          			foreach ($details['fields'] as $field) {
          				echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
          			}
          
          			echo "\t\t\t<td class=\"actions\">\n";
          			echo "\t\t\t\t<?php echo \$this->Html->link('<span class="glyphicon glyphicon-eye-open"><span>', array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape' => false, 'class' => 'btn btn-default btn-xs')); ?>\n";
          			echo "\t\t\t\t<?php echo \$this->Html->link('<span class="glyphicon glyphicon-pencil"><span>', array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape' => false, 'class' => 'btn btn-default btn-xs', 'data-toggle'=>'ajaxModal')); ?>\n";
          			echo "\t\t\t\t<?php echo \$this->Form->postLink('<span class="glyphicon glyphicon glyphicon-remove"><span>', array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape' => false, 'class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
          			echo "\t\t\t</td>\n";
          		echo "\t\t</tr>\n";
          
          echo "\t<?php endforeach; ?>\n";
          ?>
          	 </table>
          <?php echo "<?php endif; ?>\n\n"; ?>	
            </div>
          </div>
          <?php endforeach; ?>

    </div>
   </div>
</div>