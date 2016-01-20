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

<?php echo "<?php echo \$this->element('breadcrumbs', array('cont'=>\$this->request['controller'])); ?>"; ?>
  <div class="wrapper wrapper-content animated fadeInRight">
                		
                	     <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                       <div class="ibox-title">
                                                <h5><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h5>
                                                <div class="ibox-tools">
                                                        <a class="collapse-link">
                                                        <i class="fa fa-chevron-up"></i>
                                                        </a>
                                                </div>
                                                                                                
                                           </div>
                                                        
                                           <div class="ibox-content">
                                             <div class="table-responsive">
                                                  <table class="table dataTables-example" >
                                                    	<thead>
                                                    	<tr>
                                                    	<?php foreach ($fields as $field): ?>
                                                    		<th><?php echo "<?php echo __('{$field}'); ?>"; ?></th>
                                                    	<?php endforeach; ?>
                                                    		<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                                                    	</tr>
                                                    	</thead>
                                                    	<tbody>
                                                    	<?php
                                                    	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                                                    	echo "\t<tr>\n";
                                                    		foreach ($fields as $field) {
                                                    			$isKey = false;
                                                    			if (!empty($associations['belongsTo'])) {
                                                    				foreach ($associations['belongsTo'] as $alias => $details) {
                                                    					if ($field === $details['foreignKey']) {
                                                    						$isKey = true;
                                                    						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                                    						break;
                                                    					}
                                                    				}
                                                    			}
                                                    			if ($isKey !== true) {
                                                    				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                                                    			}
                                                    		}
                                                    
                                                    		echo "\t\t<td class=\"actions\">\n";
                                                        
                                                        echo "\t\t<div class=\"btn-group\">\n";
                                                                               echo "\t\t<button data-toggle=\"dropdown\" class=\"btn btn-white dropdown-toggle \">"; 
                                                                                    echo "<?php echo __('Actions'); ?>"; 
                                                                                   echo "\t\t<span class=\"caret\"></span>
                                                                                    </button>\n";
                                                                                    echo  "\t\t <ul class=\"dropdown-menu\">\n";                                   
                                                                                       
                                                                                  		echo "\t\t\t<li><?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
                                                                                  		echo "\t\t\t<li><?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('data-toggle'=>'ajaxModal')); ?></li>\n";
                                                                                  		echo "\t\t\t<li><?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('confirm' => __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?></li>\n";
                                                                                  		
                                                                                 echo  "\t\t </ul>\n";
                                                       echo  "\t\t</div>\n";
                                                        echo "\t\t</td>\n";
                                                    	echo "\t</tr>\n";
                                                    
                                                    	echo "<?php endforeach; ?>\n";
                                                    	?>
                                                    	</tbody>                                                      
                                                  </table>
                                                </div> <!-- chiudo table responsive -->
                                              </div>  <!-- chiudo ibox-content --> 
                                           </div>   <!-- chiudo float e margin -->  
                                      </div>           <!-- lg12 -->
                                  </div>  <!-- row -->
                            </div>  
