<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
 //aggiunta la beforeFilter per   permettere di creare utenti e gruppi iniziali
             public function beforeFilter() {
          parent::beforeFilter();
      
            $this->Auth->allow('login', 'register');
          // For CakePHP 2.1 and up
       //   $this->Auth->allow();
      }

public function login() {
	$this->layout = "inspinia_login";	
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
			//salvo dati ultimo login
				$results = $this->User->find('first', array('conditions'=>array('User.username'=> trim($this->data['User']['username'])),
															'recursive' =>-1	
															)
											);
				$this->Session->write('last_login_admin', $results['User']['last_login']);
				$this->User->updateAll(array('User.last_login'=> '"'.date("Y-m-d H:i:s").'"'), array('User.id'=>$results['User']['id']));
			//echo $this->webroot.'-'.$this->Session->read("Auth.redirect"); //debug
			if(!empty($this->request->data['User']['log_pistole'])){
    				$this->redirect(array('controller'=>'stores','action' => 'index'));
				}
				else{
					$cleanredirecturl = str_replace($this->webroot, "/", $this->Session->read("Auth.redirect"));
			$this->redirect($this->Auth->redirect($cleanredirecturl));
					}//fine if login da pistole
        } else {
            $this->Session->setFlash('Your username or password was incorrect.' , 'notifiche/warning');
			if(!empty($this->request->data['User']['log_pistole'])){
    				$this->redirect(array('controller'=>'stores','action' => 'login'));
				}
        }
    }
    if ($this->Session->read('Auth.User')) {
        $this->Session->setFlash('You are logged in!', 'notifiche/success');
        $this->redirect('/users/agenti');
    }
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0')!=false){ 	      		  
		  $this->redirect(array('controller'=>'stores','action' => 'login'));
		}
}

public function logout() {
    $this->Session->setFlash('Good-Bye', 'notifiche/success');
    $this->redirect($this->Auth->logout());
}

public function agenti() {
    $this->Session->setFlash('Benvenuto', 'notifiche/success');
    $this->layout = "inspinia_home";
}
/**
 * index method
 *
 * @return void
 */
	public function index() {
    $this->layout = "inspinia_page";
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
  $this->layout = "inspinia_page";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
     $this->layout = "ajax";
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),  'notifiche/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'notifiche/danger');
			}
		}
		//$options = array('conditions' => array('id !='=>1));
		//$groups = $this->User->Group->find('list', $options);
		//$chieftowns = $this->User->Chieftownusers->Chieftown->find('list'); 
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}
  
  	public function register() {
    $this->layout = "inspinia_login";
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data, array('validate'=>false))) {
				$this->Session->setFlash(__('The user has been saved'), 'notifiche/success');
				// $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'notifiche/danger');
			}
		}
		//$options = array('conditions' => array('id !='=>1));
		//$groups = $this->User->Group->find('list', $options);
		//$chieftowns = $this->User->Chieftownusers->Chieftown->find('list'); 
		//$groups = $this->User->Group->find('list');
		//$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
    $this->layout = "ajax";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
           if ($this->request->data['User']['nuova_password']!=''){ //echo 'ciao'; exit;
			$this->request->data['User']['password'] = $this->request->data['User']['nuova_password'];
			$salva = array('username', 'group_id', 'nome_e_cognome', 'telefono', 'email', 'password');
		   }		   
		   else{
			$salva = array('username', 'group_id', 'nome_e_cognome', 'telefono', 'email');
			   }
			if ($this->User->save($this->request->data['User'], true, $salva)) {	
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id),
							 'recursive' => -1	);
			$this->request->data = $this->User->find('first', $options);
			//unset($this->request->data['User']['password']);
			 //pr($this->request->data);
		}
		$groups = $this->User->Group->find('list');
							
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'notifiche/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'notifiche/danger');
		$this->redirect(array('action' => 'index'));
	}
}
