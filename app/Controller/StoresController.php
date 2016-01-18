<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Store
 */
class StoresController extends AppController {
   //aggiunta la beforeFilter per   permettere di creare utenti e gruppi iniziali
             public function beforeFilter() {
          parent::beforeFilter();


          // For CakePHP 2.1 and up
          $this->Auth->allow('login');
      }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'skorpio';
		$this->Session->delete('Carrello');
		//print_r($this->Session->read('Carrello'));
	}


	public function login(){
		   $this->layout = 'skorpio';
		}

public function logout() {
    $this->Session->setFlash('Good-Bye', 'notifiche/success');
	$this->Auth->logout();
    $this->redirect(array('controller'=>'stores','action' => 'login'));
}

    //funzione carrello della spesa
	public function carrello(){
		//print_r($this->Session->read('Carrello'));
		  $this->layout = 'skorpio';
		  if($this->request->is('post')){
            $causale = '';
            $causale = $this->request->data['Store']['causale'];


            //preparo la sessione quando scelgo causale
				 if(!empty($causale)){
                    $causale = $this->request->data['Store']['causale'];
        			  	  $this->Session->write('Carrello.causale',         $this->request->data['Store']['causale']);
   				     $this->Session->write('Carrello.magaz_partenza',  $this->request->data['Store']['magaz_partenza']);
   				     $this->Session->write('Carrello.magaz_destino',   $this->request->data['Store']['magaz_destino']);
                    if($causale!='SCR-AS'){   $this->Session->write('Carrello.articoli', array());   }
   					 }//fine causale

            //--in base alla CASUALE faccio un'operazione piuttosto che altro...
            switch($causale){
                  case 'SCR-AS':
                              //--carico la lista articoli dall'ordine (arrivo da: scarica_ordine_aftersales)
                              if(!empty($this->request->data['Store']['order_num'])){
                                 $order_num  = $this->request->data['Store']['order_num'];
                                 $arts       = $this->Session->read('Carrello.articoli');

                                 //--se nel carrello non c'è nulla...
                                 if(count($arts)==0){
                                       $arts = $this->Store->dettagli_ordine_aftersales($order_num); //carico i dati dal DB

                                       //--imposto le quantità (e le quantità ordinate nell'ordine)
                                       for($i=0; $i < count($arts); $i++){
                                                   $arts[$i]['qta_ord']    = $arts[$i]['qta'];
                                                   $arts[$i]['qta']        = 0;
                                                   }//for
                                       }//count

                                 $this->Session->write('Carrello.articoli', $arts);
                                 $this->Session->write('Carrello.causale', $causale);
                                 $this->set('order_num', $this->request->data['Store']['order_num']);
                                 $this->set('articoli', $arts);
                                 }//order_num

                              //--modifico la qta di un determianto codice (arrivo da: cercapezzo)
                              if(!empty($this->request->data['Store']['codice'])){
                                 $arts = $this->Session->read('Carrello.articoli'); //--carico da sessione

                                 for($i=0; $i < count($arts); $i++){
                                             if($this->request->data['Store']['codice']==$arts[$i]['codice']){
                                             $arts[$i]['qta'] = $this->request->data['Store']['qta']; //--imposto la quantità per questo codice
                                             }//if
                                             }//for

                                 $this->Session->write('Carrello.articoli', $arts);
                                 $this->Session->write('Carrello.causale', $causale);
                                 //$this->set('order_num', $order_num);
                                 $this->set('articoli', $arts);
                                 }//codice
                              break;
                  default:
                              //--Trasferimento MAG o Retifica Inv?
                              if(!empty($this->request->data['Store']['codice'])){
                              $art = $this->Session->read('Carrello.articoli');
                              //print_r($art); //debug
                              $con=0;
                              foreach($art as $esistente){
                                             if($this->request->data['Store']['codice']!=$esistente['codice']){
                                             }else{
                                             $con++;
                              	            }//fine if verifica
                                          }//fine foreach

                              if($con==0){
                                          $arr_articoli = array('codice' => $this->request->data['Store']['codice'], 'qta'=>$this->request->data['Store']['qta'], 'descrizione'=>$this->request->data['Store']['descr'], 'ubicazione_partenza'=>$this->request->data['Store']['ubicazione_partenza'], 'ubicazione_destino'=>$this->request->data['Store']['ubicazione_destino'], 'eseguito'=>1, 'giacenza'=>$this->request->data['Store']['giacenza']);
                                          array_push($art, $arr_articoli);
                                          }

                              $this->Session->write('Carrello.articoli', $art);
                              $this->set('articoli', $art);
                              }//empty
                              break;
                  }//switch
			  }//fine if post

      $art = $this->Session->read('Carrello.articoli');
		$this->set('articoli', $art);
		//leggo anchela causale
		$causale = $this->Session->read('Carrello.causale');
		$this->set('causale', $causale);
		}//carrello

	//funzione di ricerca pezzo ed inserimento qta
	public function cercapezzo(){
		$this->layout = 'skorpio';
		 //print_r($this->Session->read('Carrello'));
		  if($this->request->is('post')){
           $causale = $this->Session->read('Carrello.causale');
           //--in base alla CASUALE faccio un'operazione piuttosto che altro...

           switch($causale){
                 case 'SCR-AS':  //_____________ordine da AFS?_________________
                              $codice     = $this->request->data['Store']['code'];
                              $magazzino  = $this->request->data['Store']['magazzino'];
                              $eam        = $this->Store->cerca(array('codice'=>$codice, 'magazzino'=>$magazzino));

                              //--se lo trovo...
                              if(!empty($eam)){
                                             $arts = $this->Session->read('Carrello.articoli');//-carico tutti gli articoli in sessione
                                             $i    = 0;
                                             $qta  = '';

                                             //--verifico se trovo l'art in sessione...
                                             foreach($arts as $art){
                              					                   if(($eam[0]['ARTICOLO'] == $art['codice'])){
                                                                                             $qta = $art['qta_ord'];//--precarico la qta ordinata
                                                                                             $i++;
                                                                                             continue;
                                                                                             }//esistente
                                                               }//foreach

                                             //--articolo NON presente in sessione...
                                             if($i==0){
                                                $this->Session->setFlash(__('Articolo NON ordinato'), 'notifiche/gun_warning');
                                                $this->redirect(array('action' => 'carrello')); //torno in carrello
                                                }//i

                                             $this->set('eam', $eam);
                                             $this->set('qta_ordine_afs', $qta);
                                             }//empty $eam
                              break;

                  default:    //____________Trasferimento MAG o Retifica Inv?________________
                             //--ricerca pezzo in eam vista CUST_BC_ARTICOLI
                             $eam =	$this->Store->cerca(array('codice'=>$this->request->data['Store']['code'], 'magazzino'=>$this->request->data['Store']['magazzino']));

                             //--se lo trovo...
                             if(!empty($eam)){
                  				   $art = $this->Session->read('Carrello.articoli');
                  				   $i=0;

                                 foreach($art as $esistente){
                  					   if(($eam[0]['ARTICOLO']==$esistente['codice'])and($esistente['eseguito']=1)){     $i++;             }//esistente
                  					   }//fine foreach

                                  if($i>0){
                  						$this->Session->setFlash(__('Articolo gia scansionato'), 'notifiche/gun_warning');
                  				      $this->redirect(array('action' => 'carrello'));//torno in carrello
                                    }//i

                                 $this->set('eam', $eam);
                  				   //verifico ubicazione in pagina da completare
                  				   $mg2 = $this->Session->read('Carrello.magaz_destino');
                  				   if((!empty($mg2))and($mg2!='')){
                  					   $mag = $mg2;
                  					   }else{
                  						$mag = $this->Session->read('Carrello.magaz_partenza');
                                    }//mag
                  				   $ubicaz = $this->Store->scomparti(array('magazzino'=>$mag));
                  				   foreach($ubicaz['tutti'] as $ubi){ $ubc[]=$ubi['UBICAZIONE'];  }
                  				   $ubi_str = implode('#',$ubc);
                  				   $this->set('ubicaz', $ubi_str );
                  				  }else{
                  				   $this->Session->setFlash(__('Articolo non trovato'));
                  				   $this->redirect(array('action' => 'carrello'));
                                }//empty $eam
                 }//switch
			  }//post
			  //setto variabile per ricordare la causale
			 $causale = $this->Session->read('Carrello.causale');
			 //$this->set('causale', $causale);
		}

	//funzione di completamento operazione e scrittura in eam
	public function scrivieam() {
		$sess= CakeSession::read('Auth');
		$this->layout = 'skorpio';
		 if ($this->request->is('post')) {
			$art = $this->Session->read('Carrello');
				$tot_salva=array();
				  foreach($art['articoli'] as $articoli){
					  $salva=array();

                        switch($art['causale']){
                                case "RET-IN":
                                            //se è rettifica inventariale scrivo le regole di rettifica
                                            if($articoli['ubicazione_destino']==$articoli['ubicazione_partenza']){
                                                   $qta = $articoli['qta']-$articoli['giacenza'];
                                                   }else{
                                                   $qta =  $articoli['qta'];
                                                   }
                                                   $sc_1 = $articoli['ubicazione_destino'];
                                                   $sc_2 = '';
                                            break;
                                case "TRASFR":
                                            $qta  = $articoli['qta'];
                                            $sc_1 = $articoli['ubicazione_partenza'];
                                            $sc_2 = $articoli['ubicazione_destino'];
                                            break;
                                case "SCR-AS":
                                            //scarico i pezzi selezionati dalla tabella (test_mov.php)..
                                            //e l'ID ordine?
                                            $qta  = $articoli['qta'];
                                            $sc_1 = $articoli['ubicazione_destino'];
                                            $sc_2 ='';
                                            break;
                                default:
                                            $qta  = $articoli['qta'];
                                            $sc_1 = $articoli['ubicazione_destino'];
                                            $sc_2 ='';
                                            break;
                        }//switch

                        $salva['CBM_CAUSALE']   = $art['causale'];
                        $salva['CBM_DATA']      = '';
                        $salva['CBM_ARTICOLO']  = $articoli['codice'];
                        $salva['CBM_QTY']       = $qta;
                        $salva['CBM_MAGAZZINO1'] = $art['magaz_partenza'];
                        $salva['CBM_SCOMPARTO1'] = $sc_1;
                        $salva['CBM_MAGAZZINO2'] = $art['magaz_destino'];
                        $salva['CBM_SCOMPARTO2'] = $sc_2;
                        $salva['CBM_BARCODE']   = '';
                        $salva['CBM_ORDINE']    = '';
                        $salva['CBM_ELABORATO'] = '';
                        $salva['CBM_UTENTE']    = $sess['User']['username'];
                        $tot_salva[]            = $salva;
					  }//fine foreach

				// print_r($tot_salva); //debug
				$eam =	$this->Store->scrivimovimento($tot_salva);
				if($eam){
					$this->Session->setFlash(__('Movimento Salvato'), 'notifiche/gun_success');
				    $this->redirect(array('action' => 'index'));
					}else{
					$this->Session->setFlash(__('Problemi nel salvataggio'), 'notifiche/gun_danger');
				    $this->redirect(array('action' => 'carrello'));
					}//$eam
			}//post
		}//scrivieam

	//funzione rettifica inventariale
	public function rettifica_inventariale() {
		$this->layout = 'skorpio';
		//print_r($this->Session->read('Carrello'));
		//cerco i magazzini
		$magazzini =	$this->Store->magazzini();
	    $this->set('magazzini', $magazzini);
}


	//funzione trasferimento magazzino
	public function trasferisci_pezzi() {
		$this->layout = 'skorpio';
		// print_r($this->Session->read('Carrello'));
		//cerco i magazzini
		$magazzini =	$this->Store->magazzini();
	    $this->set('magazzini', $magazzini);
		}

	//funzione verifica pezzo
	public function verifica_pezzo() {
		$this->layout = 'skorpio';
		// print_r($this->Session->read('Carrello'));
		 if ($this->request->is('post')) {
			  if(!empty($this->request->data['Store']['code'])){
			  $eam =	$this->Store->cercatutti(array('codice'=>$this->request->data['Store']['code']));
			  if(!empty($eam)){
					$this->set('eam', $eam);
					}
					else{
						$this->Session->setFlash(__('Articolo non trovato'), 'notifiche/gun_danger');
						}
			  }// fine if ricerca
		  }//fine post
		}




      //funzione ordine da aftersales
   	public function scarica_ordine_aftersales(){
   		$this->layout = 'skorpio';

         if($this->request->is('post')) {
         if(!empty($this->request->data['Store']['order_num'])){
            $order_num  = $this->request->data['Store']['order_num'];
            $order_data = $this->Store->dettagli_ordine_aftersales($order_num);//--carico i dati dal DB

            $this->Session->write('Carrello.causale', $this->request->data['Store']['causale']);
            $this->Session->write('Carrello.magaz_partenza', $this->request->data['Store']['magaz_partenza']);
            $this->Session->write('Carrello.magaz_destino', $this->request->data['Store']['magaz_destino']);
            $this->Session->write('Carrello.articoli', $order_data);

            $this->set('arts', $order_data);
            $this->set('order_num', $this->request->data['Store']['order_num']);
            }//order_num
         }//post

          /*
   		 if($this->request->is('post')) {
   			 if(!empty($this->request->data['Store']['order_code'])){
             $eam =	$this->Store->cercatutti(array('codice'=>$this->request->data['Store']['code']));
   			 if(!empty($eam)){
   					$this->set('eam', $eam);
   					}else{
   					$this->Session->setFlash(__('Articolo non trovato'), 'notifiche/gun_danger');
   					}
   			  }// fine if ricerca
   		  }//fine post
           */
        }//ordine_aftersales




/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->request->onlyAllow('post', 'delete');
		$art = $this->Session->read('Carrello.articoli');
		unset($art[$id]);
		 $this->Session->write('Carrello.articoli', $art);
		 $this->Session->setFlash(__('Articolo Eliminato'));
		$this->redirect(array('action' => 'carrello'));
	}
}
