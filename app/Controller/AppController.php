<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),			
        ),
        'Session',
        'Security',
        'Cookie'
    );
    public $helpers = array('Html', 'Form', 'Session');
    public $scaffold;
 
    public function beforeFilter() {
       $this->Auth->allow('view_pdf');
	  // $this->Auth->allow(); //tt i permessi
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'agenti');        
		$this->Auth->authError = 'Non hai i privilegi di accesso';
    Configure::write('Config.language', 'ita');


		/*________________________ indicizzazione funzioni e variabili personalizzate CloudGroup  ________________________________*/
	//	define('APP_HOMEPAGE',		"http://".$_SERVER['SERVER_NAME'].$this->webroot.'rents/index');
	//	define('APP_PATH',			"http://".$_SERVER['SERVER_NAME'].$this->webroot);
	 //	$this->icona_stato;
   
   /*  ______________ Impostazioni SSL_______________ */
   $this->Security->validatePost=false;
   $this->Security->csrfCheck=false;
   $this->Security->csrfUseOnce=false;
   //lista di url da impostare nei quali nn serve chek ssl
   $sslnotallowed_url  = array('beta_user','terms','privacy','security');
   $this->Security->blackHoleCallback = 'forceSSL';
                if(!in_array($this->params['action'],$sslnotallowed_url)){
          //  $this->Security->requireSecure('*');
            }//if
	}//beforeFilter 
  
  function forceSSL() {
 $this->redirect('https://localhost' . $this->here);
  }   
}//AppController